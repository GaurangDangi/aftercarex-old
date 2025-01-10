<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\InstitutionModel;
use App\Models\VerifyOTPModel;
use Illuminate\Support\Facades\Session;
use App\Services\TwilioService;

class InstitutionLoginController extends Controller
{
    protected $twilio;

    public function __construct(TwilioService $twilio){
        $this->twilio = $twilio;
        \Config::set('auth.defaults.guard', 'institution');
        // $this->middleware('auth:institution')->except('logout');
    }

    public function showLoginForm()
    {
        $mobileNumber = '';
        $mobile = true;
        $otp = false;
        return view('auth.institution.login', compact('otp', 'mobile', 'mobileNumber'));
    }

    public function showOtpVerificationForm()
    {
        $mobileNumber = Session::get('mobile');
        $mobile = false;
        $otp = true;
        return view('auth.institution.login', compact('otp', 'mobile', 'mobileNumber'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'mobile' => 'required|digits:10', // Assuming mobile numbers are 10 digits long
        ]);

        $mobileNumber = $request->input('mobile');

        // Check if the mobile number exists in the customers table
        $institution = InstitutionModel::where('mobile_no', $mobileNumber)->first();
        Session::put('mobile', $mobileNumber);

        if (!$institution) {
            return back()->withErrors(['mobile' => 'Mobile number not found in records.']);
        }

        // Generate OTP (you can customize your OTP generation logic)
        $otp = rand(1000, 9999); // Example OTP generation

        $message = 'Dear Institution Contact Person, OTP is '.$otp.' for login';
        $fullMobileNumber = $institution->country_code.''.$mobileNumber;
        $msg = $this->twilio->sendSMS($fullMobileNumber, $message);
        
        // Save OTP to the database
        VerifyOTPModel::create([
            'institution_id' => $institution->id,
            'otp' => $otp,
        ]);

        // Update latest otp in institution table
        InstitutionModel::where('id', $institution->id)->update(["otp" => $otp]);

        // Send OTP to mobile number (you would typically use a service like Twilio for this)

        // Redirect to OTP verification page or handle OTP sending logic here
        return redirect()->route('institution/verify_otp');
    }

    public function verifyOTP(Request $request) {

        $request->validate([
                'otp' => 'required|numeric',
        ]);

        $institution = InstitutionModel::where(['mobile_no'=> Session::get('mobile')])->first();
        if(empty($institution)) {
            return redirect()->back()->with('error', 'Mobile Number Not Found in System');
        } else {

            if ($request->otp == $institution->otp) {

                VerifyOTPModel::where(['institution_id' => $institution->id, 'otp' => $institution->otp])->update(['verified' => 1]);

                Auth::login($institution);
                return redirect()->intended('institution/dashboard'); // Redirect to intended URL after login
            } else {
                return redirect()->back()->with('error', 'Invalid OTP');
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('institution')->logout(); // Logout the client user
        $request->session()->invalidate(); // Invalidate the session

        return redirect('institution/login'); // Redirect to client login page
    }
}
