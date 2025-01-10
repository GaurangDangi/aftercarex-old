<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\SpeakerModel;

class SpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle  = 'All Speaker';
        return view('admin.speaker.list', compact('pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle  = 'Add Speaker';
        return view('admin.speaker.add', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required',
            'country_code'=> 'required',
            'mobile_no' => 'required|integer|min:10|unique:speakers,mobile_no',
            'email_id'  => 'required|email|unique:speakers,email_id',
            'status'    => 'required'        
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            $insert_data = [
                'institution_id'=> auth()->user()->id,
                'name'          => $request->name,
                'country_code'  => $request->country_code,
                'mobile_no'     => $request->mobile_no,
                'email_id'      => $request->email_id,
                'role'          => 'speaker',
                'status'        => $request->status
            ];
            $speaker = SpeakerModel::create($insert_data);
            return redirect('admin/speaker')->with('success', 'Speaker created successfully.');
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
        $totalRecords = SpeakerModel::select('count(*) as allcount')->count();
        $totalRecordswithFilter = SpeakerModel::select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->count();
        // Fetch records
        $records = SpeakerModel::orderBy($columnName,$columnSortOrder)
            ->select('*')->where('name', 'like', '%' .$searchValue . '%')
            ->skip($start)->take($rowperpage)->get();
        
        
        // dd($records);
        $data_arr = array();
        $i=1;
        if(count($records)>0){
            foreach($records as $record){
                $data_arr[] = array(
                    "encrypted_id"        => $record['id'],
                    "id"                  => $i+$start,
                    "name"                => ucwords($record->name), 
                    'mobile_no'           => $record->country_code.' '.$record->mobile_no,
                    'email_id'            => $record->email_id,
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
        $pageTitle  = 'Edit Speaker';
        $speaker = SpeakerModel::select('*')->where('id', $id)->first();
        return view('admin.speaker.edit', compact('pageTitle', 'speaker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $speaker = SpeakerModel::find($id);
        $validator = Validator::make($request->all(), [
            'name'        => 'required',
            'country_code'=> 'required',
            'mobile_no' => 'required|integer|min:10|unique:speakers,mobile_no,'.$id,
            'email_id'  => 'required|email|unique:speakers,email_id,'.$id,
            'status'    => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            $update_data = [
                'institution_id'=> auth()->user()->id,
                'name'          => $request->name,
                'country_code'  => $request->country_code,
                'mobile_no'     => $request->mobile_no,
                'email_id'      => $request->email_id,
                'role'          => 'speaker',
                'status'        => $request->status
            ];
            SpeakerModel::where('id',$id)->update($update_data);
            return redirect('admin/speaker')->with('success', 'Speaker updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $speaker = SpeakerModel::find($id);
        $speaker->delete();
        return redirect('admin/speaker')->with('success', 'Speaker deleted successfully.');
    }
}
