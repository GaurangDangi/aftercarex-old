<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\ClassModel;
use App\Models\SpeakerModel;

class ClassSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle  = 'All Class';
        return view('admin.class.list', compact('pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = auth()->user()->role;
        $pageTitle  = 'Add Group Classes';
        if($role == "speaker") {
            $speaker_Id = auth()->user()->id;
            $speakers = SpeakerModel::select('id','name')->where('id', $speaker_Id)->get();
        }else{
            $speakers = SpeakerModel::select('id','name')->get();
        }
        return view('admin.class.add', compact('pageTitle', 'speakers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $role = auth()->user()->role;
        $validator = Validator::make($request->all(), [
            'speaker_id'=> 'required',
            'zoomLink'  => 'required',
            'title'     => 'required',
            'subject'   => 'required',
            'start_date'=> 'required',
            'start_time'=> 'required',
            'duration'  => 'required',
            'status'    => 'required'        
        ],[
            'speaker_id.required' => 'The speaker field is required.'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            $insert_data = [
                'title'      => $request->title,
                'speaker_id' => $request->speaker_id,
                'zoomLink'   => $request->zoomLink,
                'subject'    => $request->subject,
                'start_date' => $request->start_date,
                'start_time' => $request->start_time,
                'duration'   => $request->duration,
                'status'     => $request->status
            ];
            ClassModel::create($insert_data);
            $url = ($role == 'speaker') ? 'speaker/class-setup' : 'admin/class-setup';
            return redirect($url)->with('success', 'Group Class created successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $role = auth()->user()->role;
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

        if(auth()->user()->role == "speaker") {
            // Total records
            $speaker_Id = auth()->user()->id;
            $totalRecords = ClassModel::select('count(*) as allcount')->where('speaker_id', $speaker_Id)->count();
            $totalRecordswithFilter = ClassModel::select('count(*) as allcount')->where('speaker_id', $speaker_Id)->where('title', 'like', '%' .$searchValue . '%')->count();
            // Fetch records
            $records = ClassModel::orderBy($columnName,$columnSortOrder)
                ->select('*')->where('speaker_id', $speaker_Id)->where('title', 'like', '%' .$searchValue . '%')
                ->skip($start)->take($rowperpage)->get();
        }else{
            // Total records
            $totalRecords = ClassModel::select('count(*) as allcount')->count();
            $totalRecordswithFilter = ClassModel::select('count(*) as allcount')->where('title', 'like', '%' .$searchValue . '%')->count();
            // Fetch records
            $records = ClassModel::orderBy($columnName,$columnSortOrder)
                ->select('*')->where('title', 'like', '%' .$searchValue . '%')
                ->skip($start)->take($rowperpage)->get();
        }
        
        
        // dd($records);
        $data_arr = array();
        $i=1;
        if(count($records)>0){
            foreach($records as $record){
                $data_arr[] = array(
                    "encrypted_id"        => $record['id'],
                    "id"                  => $i+$start,
                    "title"               => ucwords($record->title), 
                    'subject'             => ucwords($record->subject),
                    'start_date'          => date('d, F Y', strtotime($record->start_date)),
                    'start_time'          => strtoupper(date('g:i a', strtotime($record->start_time))),
                    'duration'            => $record->duration,
                    'zoomLink'            => $record->zoomLink,
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
        $pageTitle  = 'Edit Group Classes';
        $role = auth()->user()->role;
        $class = ClassModel::select('*')->where('id', $id)->first();
        if($role == "speaker") {
            $speaker_Id = auth()->user()->id;
            $speakers = SpeakerModel::select('id','name')->where('id', $speaker_Id)->get();
        }else{
            $speakers = SpeakerModel::select('id','name')->get();
        }
        return view('admin.class.edit', compact('pageTitle', 'class', 'speakers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = auth()->user()->role;
        $speaker = ClassModel::find($id);
        $validator = Validator::make($request->all(), [
            'speaker_id'=> 'required',
            'zoomLink'  => 'required',
            'title'     => 'required',
            'subject'   => 'required',
            'start_date'=> 'required',
            'start_time'=> 'required',
            'duration'  => 'required',
            'status'    => 'required'
        ],[
            'speaker_id.required' => 'The speaker field is required.'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            $update_data = [
                'title'      => $request->title,
                'speaker_id' => $request->speaker_id,
                'zoomLink'   => $request->zoomLink,
                'subject'    => $request->subject,
                'start_date' => $request->start_date,
                'start_time' => $request->start_time,
                'duration'   => $request->duration,
                'status'     => $request->status
            ];
            ClassModel::where('id',$id)->update($update_data);
            $url = ($role == 'speaker') ? 'speaker/class-setup' : 'admin/class-setup';
            return redirect($url)->with('success', 'Group Class updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = auth()->user()->role;
        $class = ClassModel::find($id);
        $class->delete();
        $url = ($role == 'speaker') ? 'speaker/class-setup' : 'admin/class-setup';
        return redirect($url)->with('success', 'Group Class deleted successfully.');
    }
}
