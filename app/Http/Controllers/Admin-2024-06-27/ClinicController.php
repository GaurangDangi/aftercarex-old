<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\ClinicModel;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle  = 'All Clinic';
        return view('admin.clinic.list', compact('pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle  = 'Add Clinic';
        return view('admin.clinic.add', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_of_clinic'      => 'required',
            'registration_no'     => 'required',
            'contact_person_name' => 'required',
            'mobile_no'           => 'required|integer|min:10|unique:clinic,mobile_no',
            'email_id'            => 'required|email|unique:clinic,email_id',
            'subscription_price'  => 'required|numeric',
            'address_1'           => 'required',
            'city'                => 'required',
            'state'               => 'required',
            'country'             => 'required',
            'status'              => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            $insert_data = [
                'name_of_clinic'      => $request->name_of_clinic,
                'registration_no'     => $request->registration_no,
                'contact_person_name' => $request->contact_person_name,
                'mobile_no'           => $request->mobile_no,
                'email_id'            => $request->email_id,
                'subscription_price'  => $request->subscription_price,
                'address_1'           => $request->address_1,
                'address_2'           => $request->address_2,
                'city'                => $request->city,
                'state'               => $request->state,
                'country'             => $request->country,
                'status'              => $request->status
            ];
            ClinicModel::create($insert_data);
            return redirect('admin/clinic')->with('success', 'Clinic created successfully.');
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
        $totalRecords = ClinicModel::select('count(*) as allcount')->count();
        $totalRecordswithFilter = ClinicModel::select('count(*) as allcount')->where('name_of_clinic', 'like', '%' .$searchValue . '%')->count();

        // Fetch records
        $records = ClinicModel::orderBy($columnName,$columnSortOrder)
                ->select('*')->where('name_of_clinic', 'like', '%' .$searchValue . '%')
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
                    "name_of_clinic"      => ucwords($record->name_of_clinic), 
                    "registration_no"     => ucwords($record->registration_no), 
                    'contact_person_name' => ucwords($record->contact_person_name),
                    'mobile_no'           => $record->mobile_no,
                    'email_id'            => $record->email_id,
                    'subscription_price'  => $record->subscription_price,
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
        $pageTitle  = 'Edit Clinic';
        $clinic = ClinicModel::select('*')->where('id', $id)->first();
        return view('admin.clinic.edit', compact('pageTitle', 'clinic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $clinic = ClinicModel::find($id);
        $validator = Validator::make($request->all(), [
            'name_of_clinic'      => 'required',
            'registration_no'     => 'required',
            'contact_person_name' => 'required',
            'mobile_no'           => 'required|integer|min:10|unique:clinic,mobile_no,'.$id,
            'email_id'            => 'required|email|unique:clinic,email_id,'.$id,
            'subscription_price'  => 'required|numeric',
            'address_1'           => 'required',
            'city'                => 'required',
            'state'               => 'required',
            'country'             => 'required',
            'status'              => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            $update_data = [
                'name_of_clinic'      => $request->name_of_clinic,
                'registration_no'     => $request->registration_no,
                'contact_person_name' => $request->contact_person_name,
                'mobile_no'           => $request->mobile_no,
                'email_id'            => $request->email_id,
                'subscription_price'  => $request->subscription_price,
                'address_1'           => $request->address_1,
                'address_2'           => $request->address_2,
                'city'                => $request->city,
                'state'               => $request->state,
                'country'             => $request->country,
                'status'              => $request->status
            ];
            ClinicModel::where('id',$id)->update($update_data);
            return redirect('admin/clinic')->with('success', 'Clinic updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $clinic = ClinicModel::find($id);
        $clinic->delete();
        return redirect('admin/clinic')->with('success', 'Clinic deleted successfully.');
    }
}
