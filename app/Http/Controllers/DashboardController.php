<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\InstitutionModel;
use App\Models\ClientModel;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Subscription;
use Stripe\Charge;

class DashboardController extends Controller
{
    public function __construct(){
        \Config::set('auth.defaults.guard', 'institution');
    }

    public function index()
    {
        $institution_id = Auth::guard('institution')->user()->id;

        $institution = InstitutionModel::where(['id'=> $institution_id])->first();
        $total_client = ClientModel::where(['institution_id'=>auth()->user()->id])->count();
        return view('institution.dashboard', compact('institution', 'total_client'));
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
