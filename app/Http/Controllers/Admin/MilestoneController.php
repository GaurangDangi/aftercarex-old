<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\MilestoneModel;

class MilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle  = 'All Milestone';
        return view('admin.milestone.list', compact('pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle  = 'Add Milestone';
        return view('admin.milestone.add', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'     => 'required',
            'days_no'   => 'required',
            'image_url' => 'required',
            'status'    => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            $insert_data = [
                'title'   => $request->title,
                'days_no' => $request->days_no,
                'status'  => $request->status
            ];

            if ($request->hasFile('image_url')) {
                $image  = $request->file('image_url');
                $name = Str::slug(md5(time())).'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/milestone');
                $imagePath = $destinationPath. "/". $name;
                $image->move($destinationPath, $name);
                $insert_data['image_url'] = 'uploads/milestone/'.$name;
            }
            $response_library = MilestoneModel::create($insert_data);
            return redirect('admin/milestone')->with('success', 'Milestone created successfully.');
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
        $totalRecords = MilestoneModel::select('count(*) as allcount')->count();
        $totalRecordswithFilter = MilestoneModel::select('count(*) as allcount')->where('title', 'like', '%' .$searchValue . '%')->count();

        // Fetch records
        $records = MilestoneModel::orderBy($columnName,$columnSortOrder)
                ->select('*')->where('title', 'like', '%' .$searchValue . '%')
                ->skip($start)->take($rowperpage)->get();
        // dd($records);
        $data_arr = array();
        $i=1;
        if(count($records)>0){
            foreach($records as $record){
                $id = $record->id;

                $image_url = '';
                if(!empty($record->image_url)){
                    $image_url = '<img src="'.asset($record['image_url']).'" alt="'.$record['title'].'" style="height: 100px; width: 100%;">';
                }
                $data_arr[] = array(
                    "encrypted_id" => $record['id'],
                    "id"           => $i+$start,
                    "title"        => ucwords($record->title), 
                    "days_no"      => ucwords($record->days_no), 
                    "image_url"    => $image_url, 
                    'status'       => ($record->status==1)?'Active':'Inactive'
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
        $pageTitle  = 'Edit Milestone';
        $milestone = MilestoneModel::select('*')->where('id', $id)->first();
        return view('admin.milestone.edit', compact('pageTitle', 'milestone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $milestone = MilestoneModel::find($id);
        $validator = Validator::make($request->all(), [
            'title'     => 'required',
            'days_no'   => 'required',
            'status'    => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            $update_data = [
                'title'   => $request->title,
                'days_no' => $request->days_no,
                'status'  => $request->status
            ];
            
            if ($request->hasFile('image_url')) {
                $image  = $request->file('image_url');
                $name = Str::slug(md5(time())).'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/milestone');
                $imagePath = $destinationPath. "/". $name;
                $image->move($destinationPath, $name);

                $filePath = public_path($milestone['image_url']);
                if(File::exists($filePath) && $milestone['image_url']!=''){
                    File::delete($filePath);
                }
                $update_data['image_url'] = 'uploads/milestone/'.$name;
            }
            MilestoneModel::where('id',$id)->update($update_data);
            return redirect('admin/milestone')->with('success', 'Milestone updated successfully.');
        }
    }

    public function destroy(string $id)
    {
        $milestone = MilestoneModel::find($id);
        $filePath = public_path($milestone['image_url']);
        if(File::exists($filePath) && $milestone['image_url']!=''){
            File::delete($filePath);
        }
        $milestone->delete();
        return redirect('admin/milestone')->with('success', 'Milestone deleted successfully.');
    }
}
