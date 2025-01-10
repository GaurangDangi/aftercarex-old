<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\InstitutionModel;
use Mail;


class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle  = 'All Institution';
        return view('admin.institution.list', compact('pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle  = 'Add Institution';
        return view('admin.institution.add', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'institution_name'    => 'required',
            'industry'            => 'required',
            'registration_no'     => 'required',
            'contact_person_name' => 'required',
            'country_code'        => 'required',
            'mobile_no'           => 'required|integer|min:10|unique:institution,mobile_no',
            'email_id'            => 'required|email|unique:institution,email_id',
            'subscription_price'  => 'required|numeric',
            'address_1'           => 'required',
            'city'                => 'required',
            'state'               => 'required',
            'country'             => 'required',
            'status'              => 'required',
            'total_expected_client' => 'nullable|integer',
            'radha'               => 'required|in:Yes,No',
            'white_label_client'  => 'required|in:Yes,No',
            'group_counselors'    => 'required|in:Self Provided,Provided by Xaftercare',
            'content_creation_access' => 'required|in:Yes,No',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            $insert_data = [
                'institution_name'    => $request->institution_name,
                'industry'            => $request->industry,
                'registration_no'     => $request->registration_no,
                'contact_person_name' => $request->contact_person_name,
                'country_code'        => $request->country_code,
                'mobile_no'           => $request->mobile_no,
                'email_id'            => $request->email_id,
                'subscription_price'  => $request->subscription_price,
                'address_1'           => $request->address_1,
                'address_2'           => $request->address_2,
                'city'                => $request->city,
                'state'               => $request->state,
                'country'             => $request->country,
                'status'              => $request->status,
                'total_expected_client' => $request->total_expected_client,
                'company_website'     => $request->company_website,
                'radha'               => $request->radha,
                'white_label_client'  => $request->white_label_client,
                'group_counselors'    => $request->group_counselors,
                'content_creation_access' => $request->content_creation_access
            ];
            $institution = InstitutionModel::create($insert_data);
            $this->sendEmail($institution->id);
            return redirect('admin/institution')->with('success', 'Institution created successfully.');
        }
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
        $totalRecords = InstitutionModel::select('count(*) as allcount')->count();
        $totalRecordswithFilter = InstitutionModel::select('count(*) as allcount')->where('industry', 'like', '%' .$searchValue . '%')->count();

        // Fetch records
        $records = InstitutionModel::orderBy($columnName,$columnSortOrder)
                ->select('*')->where('industry', 'like', '%' .$searchValue . '%')
                ->skip($start)->take($rowperpage)->get();
        // dd($records);
        $data_arr = array();
        $i=1;
        if(count($records)>0){
            foreach($records as $record){
                $id = $record->id;
                $data_arr[] = array(
                    "encrypted_id"        => $record['id'],
                    "id"                  => $i+$start,
                    "institution_name"    => $record->institution_name,
                    "industry"            => ucwords($record->industry), 
                    "registration_no"     => ucwords($record->registration_no), 
                    'contact_person_name' => ucwords($record->contact_person_name),
                    'mobile_no'           => $record->country_code.' '.$record->mobile_no,
                    'email_id'            => $record->email_id,
                    'subscription_price'  => $record->subscription_price,
                    "radha"               => $record->radha,
                    "white_label_client"  => $record->white_label_client,
                    "group_counselors"    => $record->group_counselors,
                    "content_creation_access" => $record->content_creation_access,
                    'status'              => ($record->status==1)?'Active':'Inactive'
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
        $pageTitle  = 'Edit Institution';
        $institution = InstitutionModel::select('*')->where('id', $id)->first();
        return view('admin.institution.edit', compact('pageTitle', 'institution'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $institution = InstitutionModel::find($id);
        $validator = Validator::make($request->all(), [
            'institution_name'    => 'required',
            'industry'            => 'required',
            'registration_no'     => 'required',
            'contact_person_name' => 'required',
            'country_code'        => 'required',
            'mobile_no'           => 'required|integer|min:10|unique:institution,mobile_no,'.$id,
            'email_id'            => 'required|email|unique:institution,email_id,'.$id,
            'subscription_price'  => 'required|numeric',
            'address_1'           => 'required',
            'city'                => 'required',
            'state'               => 'required',
            'country'             => 'required',
            'status'              => 'required',
            'total_expected_client' => 'nullable|integer',
            'radha'               => 'required|in:Yes,No',
            'white_label_client'  => 'required|in:Yes,No',
            'group_counselors'    => 'required|in:Self Provided,Provided by Xaftercare',
            'content_creation_access' => 'required|in:Yes,No',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            $update_data = [
                'institution_name'    => $request->institution_name,
                'industry'            => $request->industry,
                'registration_no'     => $request->registration_no,
                'contact_person_name' => $request->contact_person_name,
                'country_code'        => $request->country_code,
                'mobile_no'           => $request->mobile_no,
                'email_id'            => $request->email_id,
                'subscription_price'  => $request->subscription_price,
                'address_1'           => $request->address_1,
                'address_2'           => $request->address_2,
                'city'                => $request->city,
                'state'               => $request->state,
                'country'             => $request->country,
                'status'              => $request->status,
                'total_expected_client' => $request->total_expected_client,
                'company_website'     => $request->company_website,
                'radha'               => $request->radha,
                'white_label_client'  => $request->white_label_client,
                'group_counselors'    => $request->group_counselors,
                'content_creation_access' => $request->content_creation_access
            ];
            InstitutionModel::where('id',$id)->update($update_data);
            $this->sendEmail($id);
            return redirect('admin/institution')->with('success', 'Institution updated successfully.');
        }
    }

    public function sendEmail($id){
        $institution = InstitutionModel::where('id',$id)->first();
        $data = [
            'contact_person_name'  => $institution->contact_person_name,
            'email'                => $institution->email_id,
            'mobile_no'            => $institution->mobile_no
        ];
        // dd($data);
        Mail::send('admin/email/institute_register',$data,function($messages) use ($institution){
            //dd($institution->email_id);
            $messages->to($institution->email_id);
            //$messages->cc(env("MAIL_FROM_ADDRESS"));
            $messages->subject('Welcome to Xaftercare! Your Institutional Client Login Information');
        });

        // \Mail::to('destination.address@xxx.com')->send(new \App\Mail\TestMail($details));
        return true;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $institution = InstitutionModel::find($id);
        $institution->delete();
        return redirect('admin/institution')->with('success', 'Institution deleted successfully.');
    }
}
