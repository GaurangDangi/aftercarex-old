<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Services\TwilioService;
use App\Models\ClientModel;
use App\Models\MobileOtpVerifyModel;
use App\Models\loginLogsModel;


class ClientLoginController extends Controller
{
    protected $twilio;
    public function __construct(TwilioService $twilio){
        $this->twilio = $twilio;
        \Config::set('auth.defaults.guard', 'client');
        // $this->middleware('auth:institution')->except('logout');
    }

    public function clientLoginForm(Request $request){
        $pageTitle  = 'Client Login';
        $mobileNumber = '';
        $mobile = true;
        $otp = false;
        return view('auth.client.login', compact('pageTitle','otp','mobile','mobileNumber'));
    }
    
    public function clientLoginSubmit(Request $request){
        $request->validate([
            'mobile' => 'required|digits:10', // Assuming mobile numbers are 10 digits long
        ]);
        $mobileNumber = $request->input('mobile');

        // Check if the mobile number exists in the customers table
        $client = ClientModel::where('mobile_no', $mobileNumber)->first();
        Session::put('mobile_number', $mobileNumber);
        if (!$client) {
            return back()->withErrors(['mobile' => 'Mobile number not found in records.']);
        }

        // Generate OTP (you can customize your OTP generation logic)
        $otp = rand(1000, 9999); // Example OTP generation
        $message = 'Dear Client Contact Person, OTP is '.$otp.' for login';
        $fullMobileNumber = $client->country_code.''.$mobileNumber;
        $msg = $this->twilio->sendSMS($fullMobileNumber, $message);

        // Save OTP to the database
        MobileOtpVerifyModel::create([
            'role'   =>'client',
            'user_id'=>$client->id,
            'otp'    =>$otp,
        ]);

        // Redirect to OTP verification page or handle OTP sending logic here
        return redirect()->route('client.OtpForm');
    }

    public function clientOtpForm(Request $request){
        $pageTitle  = 'Client Otp Verify';
        $mobileNumber = Session::get('mobile_number');
        $mobile = false;
        $otp = true;
        return view('auth.client.login', compact('pageTitle','otp','mobile','mobileNumber'));
    }
    
    public function clientOtpVerify(Request $request){
        $request->validate([
            'otp' => 'required|numeric',
        ]);
        $client = ClientModel::where('client.status',1)
            ->where('client.mobile_no', Session::get('mobile_number'))
            ->where('mobile_otp_verify.role', 'client')
            ->where('mobile_otp_verify.status', 0)
            ->select('mobile_otp_verify.otp','client.mobile_no')
            ->join('mobile_otp_verify', 'mobile_otp_verify.user_id', '=', 'client.id')
            ->orderBy('mobile_otp_verify.id', 'DESC')
            ->first();
        // dd($request->otp);
        if(empty($client)) {
            return redirect()->back()->with('error', 'Mobile Number Not Found in System');
        } else {
            if ($request->otp == $client->otp) {
                $client_data = ClientModel::where(['mobile_no'=> Session::get('mobile_number')])->first();
                MobileOtpVerifyModel::where(['user_id'=>$client_data->id, 'otp'=>$request->otp, 'role'=>'client'])->update(['status'=>1]);
                Auth::guard('client')->login($client_data);
                loginLogsModel::create([
                    'role'      => 'client',
                    'user_id'   => $client_data->id,
                    'login_date'=> date('Y-m-d'),
                ]);
                return redirect()->route('client.dashboard'); // Redirect to intended URL after login
            } else {
                return redirect()->back()->with('error', 'Invalid OTP');
            }
        }
    }
}
