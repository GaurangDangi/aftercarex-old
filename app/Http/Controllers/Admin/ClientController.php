<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\InstitutionModel;
use App\Models\ClientModel;
use App\Models\ProgressBarModel;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Subscription;
use Stripe\Charge;
use Illuminate\Support\Facades\Mail;
use App\Services\TwilioService;

class ClientController extends Controller
{
    protected $twilio;
    public function __construct(TwilioService $twilio)
    {
        $this->twilio = $twilio;   
    }

    public function institutionIndex() {
        $pageTitle  = 'All Client';
        return view('admin.client.list', compact('pageTitle'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle  = 'All Client';
        return view('admin.client.list', compact('pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle  = 'Add Client';
        return view('admin.client.add', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = auth()->user()->role;
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'country_code'  => 'required',
            'mobile_no' => 'required|integer|min:10|unique:client,mobile_no',
            'email_id'  => 'required|email|unique:client,email_id',
            'status'    => 'required',
            'aftercare_service_length' => 'required',
            'service_date' => 'required',
            'type'      => 'required', 
            'category'  => 'required'           
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            $insert_data = [
                'aftercare_service_length' => $request->aftercare_service_length,
                'service_date'  => $request->service_date,
                'name'       => $request->name,
                'country_code' => $request->country_code,
                'mobile_no'  => $request->mobile_no,
                'email_id'   => $request->email_id,
                'status'     => $request->status,
                'note'       => $request->note,
                'sms_service'=> ($request->sms_service==1)?1:0,
                'type'       => $request->type,
                'category'   => $request->category,
                'disclaimer' => ($request->disclaimer==1)?1:0,
            ];
            if($role == 'institution'){
                $insert_data['institution_id'] = auth()->user()->id;
                $institution = InstitutionModel::select('*')->where('id', auth()->user()->id)->first();
                Stripe::setApiKey(config('services.stripe.secret'));
                $charge = Charge::create([
                    'amount'    => (int) $institution->subscription_price, // Amount in cents
                    'currency'  => 'usd',
                    'customer'  => $institution->strip_customer_id,
                    'description' => 'Service usage charge',
                ]);
                if($charge->status=='succeeded'){
                    $insert_data['status'] == 1;
                }else{
                    $insert_data['status'] == 0;
                }
                $insert_data['institution_id'] = auth()->user()->id;
            }
            $client = ClientModel::create($insert_data);

            //send welcome email
            $this->sendEmail($client->id);

            //send welcome sms
            if($request->sms_service==1) {
                $message = "Welcome to your first day of a new beginning! Remember, you've got the strength to overcome any temptations. Stay strong and take it one step at a time. We believe in you!";
                $fullMobileNumber = $request->country_code.''.$request->mobile_no;
                $msg = $this->twilio->sendSMS($fullMobileNumber, $message);
            }

            $url = ($role == 'institution') ? 'institution/client' : 'admin/client';
            return redirect($url)->with('success', 'Client created successfully.');
        }
    }

    public function sendEmail($id){
        $client = ClientModel::where('id',$id)->first();
        $data = [
            'name'          => $client->name,
            'email'         => $client->email_id,
            'mobile_no'     => $client->mobile_no
        ];
        Mail::send('admin/email/client_register',$data, function($messages) use ($client){
            $messages->to($client->email_id);
            $messages->subject('Welcome Xaftercare');
        });
        return true;
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        if(auth()->user()->role == "institution") {
            $institutionId = auth()->user()->id;
            $totalRecords = ClientModel::select('count(*) as allcount')->where('institution_id', $institutionId)->count();
            $totalRecordswithFilter = ClientModel::select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->where('institution_id', $institutionId)->count();

            // Fetch records
            $records = ClientModel::orderBy($columnName,$columnSortOrder)
                ->select('*')->where('name', 'like', '%' .$searchValue . '%')
                ->where('institution_id', $institutionId)
                ->skip($start)->take($rowperpage)->get();

        } else {
            $totalRecords = ClientModel::select('count(*) as allcount')->count();
            $totalRecordswithFilter = ClientModel::select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->count();

            // Fetch records
            $records = ClientModel::orderBy($columnName,$columnSortOrder)
                ->select('*')->where('name', 'like', '%' .$searchValue . '%')
                ->skip($start)->take($rowperpage)->get();
        }
        
        // dd($records);
        $data_arr = array();
        $i=1;
        if(count($records)>0){
            foreach($records as $record){
                $id = $record->id;
                $current_date = date('Y-m-d');
                $now = time(); // or your date as well
                $service_date = date('Y-m-d', strtotime($record->service_date));
                $your_date  = strtotime($service_date);
                $datediff   =  $now - $your_date;
                $no_of_days =  round($datediff / (60 * 60 * 24));
                $show_expiry_tabs = 0;
                if($no_of_days > 0  && $record->status == 0 && $no_of_days >= $record->aftercare_service_length){
                    $show_expiry_tabs = 1;
                }

                $no_of_days_left = '';
                // echo $current_date.'=='.$service_date; exit; 
                if($current_date < $service_date){
                    $no_of_days_left = '<span class="badge bg-label-primary me-1">Service Not Started</span>';
                }else{
                    if($no_of_days <= $record->aftercare_service_length){
                        $no_of_days_left = '<span class="badge bg-label-success me-1">'.$record->aftercare_service_length - $no_of_days. '/'. $record->aftercare_service_length.' Days</span>';
                    }else{
                        $no_of_days_left = '<span class="badge bg-label-danger me-1">Service Expired</span>';
                    }
                }

                $data_arr[] = array(
                    "encrypted_id"        => $record['id'],
                    "id"                  => $i+$start,
                    'aftercare_service_length' => $record->aftercare_service_length." Days",
                    'service_date'        => date('d-m-Y', strtotime($record->service_date)),
                    "name"                => ucwords($record->name), 
                    'mobile_no'           => $record->country_code.' '.$record->mobile_no,
                    'email_id'            => $record->email_id,
                    'sms_service'         => ($record->sms_service==1)?'Yes':'No',
                    'status'              => ($record->status==1)?'Active':'Inactive',
                    'type'                => $record->type,
                    'category'            => $record->category,
                    'show_expiry_tabs'    => $show_expiry_tabs,
                    'no_of_days_left'     => $no_of_days_left
                );
                $i++;
            }
        }

        $response = array(
           "draw" => intval($draw),
           "iTotalRecords" => $totalRecords,
           "iTotalDisplayRecords" => $totalRecordswithFilter,
           "aaData" => $data_arr
        );
        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle  = 'Edit Client';
        $client = ClientModel::select('*')->where('id', $id)->first();
        return view('admin.client.edit', compact('pageTitle', 'client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = auth()->user()->role;
        $client = ClientModel::find($id);
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'country_code' => 'required',
            'mobile_no' => 'required|integer|min:10|unique:client,mobile_no,'.$id,
            'email_id'  => 'required|email|unique:client,email_id,'.$id,
            'status'    => 'required',
            'aftercare_service_length' => 'required',
            'service_date' => 'required',
            'type'      => 'required', 
            'category'  => 'required' 
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            $update_data = [
                'aftercare_service_length' => $request->aftercare_service_length,
                'service_date'  => $request->service_date,
                'name'       => $request->name,
                'country_code' => $request->country_code,
                'mobile_no'  => $request->mobile_no,
                'email_id'   => $request->email_id,
                'status'     => $request->status,
                'note'       => $request->note,
                'sms_service'=> ($request->sms_service==1)?1:0,
                'type'       => $request->type,
                'category'   => $request->category,
                'disclaimer' => ($request->disclaimer==1)?1:0,
            ];

            /*if($role == 'institution'){
                $institution = InstitutionModel::select('*')->where('id', auth()->user()->id)->first();
                $result = $this->dashboardController->chargeCustomer($institution->strip_customer_id, $institution->subscription_price);
                if($result->status=='succeeded'){
                    $update_data['status'] == 1;
                }else{
                    $update_data['status'] == 0;
                }
            }*/
            ClientModel::where('id',$id)->update($update_data);
            $url = ($role == 'institution') ? 'institution/client' : 'admin/client';
            return redirect($url)->with('success', 'Client updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = auth()->user()->role;
        $client = ClientModel::find($id);
        $client->delete();
        $url = ($role == 'institution') ? 'institution/client' : 'admin/client';
        return redirect($url)->with('success', 'Client deleted successfully.');
    }

    public function renew_client($id){
        $role = auth()->user()->role;
        if(!empty($id)){
            $client = ClientModel::find($id);
            $renew_data = [
                'service_date'=> date('Y-m-d'),
                'status'      => 1
            ];
            if($role == 'institution'){
                $institution = InstitutionModel::select('*')->where('id', auth()->user()->id)->first();
                Stripe::setApiKey(config('services.stripe.secret'));
                $charge = Charge::create([
                    'amount'    => (int) $institution->subscription_price, // Amount in cents
                    'currency'  => 'usd',
                    'customer'  => $institution->strip_customer_id,
                    'description' => 'Service usage charge',
                ]);
                if($charge->status=='succeeded'){
                    $renew_data['status'] == 1;
                }else{
                    $renew_data['status'] == 0;
                }
            }

            ClientModel::where('id',$id)->update($renew_data);
            $url = ($role == 'institution') ? 'institution/client' : 'admin/client';
            return redirect($url)->with('success', 'Client Renew successfully.');
        }else{
            return redirect()->back()->with('error', 'Client not found.');
        }
    }

    /*public function progressBar(Request $request){
        $client_id = $request->client_id;
        if(!empty($client_id)){
            $get_first_date  = ProgressBarModel::where(['user_id'=>$client_id, 'role'=>'client'])->first();
            if(!empty($get_first_date)){
                $start_date = $get_first_date['login_date'];
                $end_date   = date('Y-m-d', strtotime($start_date. ' + 30 days'));
            }else{
                $total_days     = 30;
                $days_attempt   = 0;
                $percentage     = (0/30)*100;
            }
            $html_view = view('admin.client.progress', compact('total_days', 'days_attempt', 'percentage'))->render();
        }else{
            $data = [
                'status' => 'error',
                'msg' => 'data is not found'
            ];
        }
        echo json_encode($data);
    }*/
}
