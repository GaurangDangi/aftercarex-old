<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Services\TwilioService;
use App\Models\SpeakerModel;
use App\Models\MobileOtpVerifyModel;
use App\Models\loginLogsModel;


class SpeakerLoginController extends Controller
{
    protected $twilio;
    public function __construct(TwilioService $twilio){
        $this->twilio = $twilio;
        \Config::set('auth.defaults.guard', 'speaker');
    }

    public function speakerLoginForm(Request $request){
        $pageTitle  = 'Speaker Login';
        $mobileNumber = '';
        $mobile = true;
        $otp = false;
        return view('auth.speaker.login', compact('pageTitle','otp','mobile','mobileNumber'));
    }
    
    public function speakerLoginSubmit(Request $request){
        $request->validate([
            'mobile' => 'required|digits:10', // Assuming mobile numbers are 10 digits long
        ]);
        $mobileNumber = $request->input('mobile');

        // Check if the mobile number exists in the customers table
        $speaker = SpeakerModel::where('mobile_no', $mobileNumber)->first();
        Session::put('mobile_number', $mobileNumber);
        if (!$speaker) {
            return back()->withErrors(['mobile' => 'Mobile number not found in records.']);
        }

        // Generate OTP (you can customize your OTP generation logic)
        $otp = rand(1000, 9999); // Example OTP generation
        $message = 'Dear speaker Contact Person, OTP is '.$otp.' for login';
        $fullMobileNumber = $speaker->country_code.''.$mobileNumber;
        $msg = $this->twilio->sendSMS($fullMobileNumber, $message);

        // Save OTP to the database
        MobileOtpVerifyModel::create([
            'role'   =>'speaker',
            'user_id'=>$speaker->id,
            'otp'    =>$otp,
        ]);

        // Redirect to OTP verification page or handle OTP sending logic here
        return redirect()->route('speaker.OtpForm');
    }

    public function speakerOtpForm(Request $request){
        $pageTitle  = 'speaker Otp Verify';
        $mobileNumber = Session::get('mobile_number');
        $mobile = false;
        $otp = true;
        return view('auth.speaker.login', compact('pageTitle','otp','mobile','mobileNumber'));
    }
    
    public function speakerOtpVerify(Request $request){
        $request->validate([
            'otp' => 'required|numeric',
        ]);
        $speaker = SpeakerModel::where('speakers.status',1)
            ->where('speakers.mobile_no', Session::get('mobile_number'))
            ->where('mobile_otp_verify.role', 'speaker')
            ->where('mobile_otp_verify.status', 0)
            ->select('mobile_otp_verify.otp','speakers.mobile_no')
            ->join('mobile_otp_verify', 'mobile_otp_verify.user_id', '=', 'speakers.id')
            ->orderBy('mobile_otp_verify.id', 'DESC')
            ->first();
        // dd($request->otp);
        if(empty($speaker)) {
            return redirect()->back()->with('error', 'Mobile Number Not Found in System');
        } else {
            if ($request->otp == $speaker->otp) {
                $speaker_data = SpeakerModel::where(['mobile_no'=> Session::get('mobile_number')])->first();
                MobileOtpVerifyModel::where(['user_id'=>$speaker_data->id, 'otp'=>$request->otp, 'role'=>'speaker'])->update(['status'=>1]);
                Auth::guard('speaker')->login($speaker_data);
                loginLogsModel::create([
                    'role'      => 'speaker',
                    'user_id'   => $speaker_data->id,
                    'login_date'=> date('Y-m-d'),
                ]);
                return redirect()->route('speaker.dashboard'); // Redirect to intended URL after login
            } else {
                return redirect()->back()->with('error', 'Invalid OTP');
            }
        }
    }
}
