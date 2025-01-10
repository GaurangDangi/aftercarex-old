<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\ClinicModel;
use App\Models\ClientModel;

class ClientController extends Controller
{
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
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'mobile_no' => 'required|integer|min:10|unique:client,mobile_no',
            'email_id'  => 'required|email|unique:client,email_id',
            'status'    => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            $insert_data = [
                'name'       => $request->name,
                'mobile_no'  => $request->mobile_no,
                'email_id'   => $request->email_id,
                'status'     => $request->status,
                'sms_service'=> ($request->sms_service==1)?1:0,
            ];
            ClientModel::create($insert_data);
            return redirect('admin/client')->with('success', 'Client created successfully.');
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
        $totalRecords = ClientModel::select('count(*) as allcount')->count();
        $totalRecordswithFilter = ClientModel::select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->count();

        // Fetch records
        $records = ClientModel::orderBy($columnName,$columnSortOrder)
                ->select('*')->where('name', 'like', '%' .$searchValue . '%')
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
                    "name"                => ucwords($record->name), 
                    'mobile_no'           => $record->mobile_no,
                    'email_id'            => $record->email_id,
                    'sms_service'         => ($record->sms_service==1)?'Yes':'No',
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
        $pageTitle  = 'Edit Client';
        $client = ClientModel::select('*')->where('id', $id)->first();
        return view('admin.client.edit', compact('pageTitle', 'client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = ClientModel::find($id);
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'mobile_no' => 'required|integer|min:10|unique:client,mobile_no,'.$id,
            'email_id'  => 'required|email|unique:client,email_id,'.$id,
            'status'    => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            $update_data = [
                'name'       => $request->name,
                'mobile_no'  => $request->mobile_no,
                'email_id'   => $request->email_id,
                'status'     => $request->status,
                'sms_service'=> ($request->sms_service==1)?1:0,
            ];
            ClientModel::where('id',$id)->update($update_data);
            return redirect('admin/client')->with('success', 'Client updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = ClientModel::find($id);
        $client->delete();
        return redirect('admin/client')->with('success', 'Client deleted successfully.');
    }
}
