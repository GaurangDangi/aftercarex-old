<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InstitutionModel;
use App\Models\ClientModel;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Subscription;
use Stripe\Charge;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pageTitle  = 'Admin Dashboard';
        $user_id = Auth::guard('web')->user()->id;
        $adminDetails = User::where(['id'=> $user_id])->first();

        $total_institution = InstitutionModel::count();
        $total_client = ClientModel::count();
        return view('admin.dashboard', compact('pageTitle', 'adminDetails', 'total_institution', 'total_client'));
    }

    public function  stripe_token(Request $request){
        //dd($request->all());
        Stripe::setApiKey(config('services.stripe.secret'));
        $token = $request->input('stripeToken');

        // Create a Customer
        $customer = Customer::create([
            'email' => $request->user()->email,
            'source' => $token,
        ]);
        $customerId = $customer->id;

        $update_data = [
            'strip_customer_id'    => $customerId
        ];
        InstitutionModel::where('id',$request->user()->id)->update($update_data);
        if(empty($customerId)){
            return redirect()->back()->with('error', 'Something went wrong please try again.');
        }else{
            return redirect()->back()->with('success', 'Customer created successfully.');
        }
    }

    public function chargeCustomer($customerId, $amount) {
        Stripe::setApiKey(config('services.stripe.secret'));
        try {
            // Create a charge
            $charge = Charge::create([
                'amount'    => $amount, // Amount in cents
                'currency'  => 'usd',
                'customer'  => $customerId,
                'description' => 'Service usage charge',
            ]);
            return $charge;
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // Handle error
            $messages ='Error creating charge: ' . $e->getMessage();
            return redirect()->back()->with('error', $messages);
        }
    }
}
