<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\SobrietyModel;
use App\Models\SobrietyAnswereModel;

class SobrietyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle  = 'All Sobriety';
        return view('admin.sobriety.list', compact('pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle  = 'Add Sobriety';
        return view('admin.sobriety.add', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'     => 'required',
            'status'    => 'required',        
            'question.*' => 'required',        
        ],[
            'question.*.required' => 'The question field is required.'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            $insert_data = [
                'title'  => $request->title,
                'rules'  => $request->rules,
                'status' => $request->status
            ];
            $sobriety = SobrietyModel::create($insert_data);
            
            if(count($request->question)>0){
                foreach($request->question as $key => $question){
                    $insert_details_data = [
                        'sobriety_id' => $sobriety->id,
                        'question'    => $question,
                        'answere_one' => $request->answere_one[$key],
                        'marks_one'   => $request->marks_one[$key],
                        'answere_two' => $request->answere_two[$key],
                        'marks_two'   => $request->marks_two[$key],
                        'answere_three'=> $request->answere_three[$key],
                        'marks_three'  => $request->marks_three[$key],
                        'answere_four'=> $request->answere_four[$key],
                        'marks_four'  => $request->marks_four[$key],
                        'answere_five'=> $request->answere_five[$key],
                        'marks_five'  => $request->marks_five[$key],
                        'answere_six'=> $request->answere_six[$key],
                        'marks_six'  => $request->marks_six[$key]
                    ];
                    SobrietyAnswereModel::create($insert_details_data);
                }
            }
            return redirect('admin/sobriety')->with('success', 'Sobriety created successfully.');
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
        $totalRecords = SobrietyModel::select('count(*) as allcount')->count();
        $totalRecordswithFilter = SobrietyModel::select('count(*) as allcount')->where('title', 'like', '%' .$searchValue . '%')->count();
        // Fetch records
        $records = SobrietyModel::orderBy($columnName,$columnSortOrder)
            ->select('*')->where('title', 'like', '%' .$searchValue . '%')
            ->skip($start)->take($rowperpage)->get();
        
        
        // dd($records);
        $data_arr = array();
        $i=1;
        if(count($records)>0){
            foreach($records as $record){
                $data_arr[] = array(
                    "encrypted_id"  => $record['id'],
                    "id"            => $i+$start,
                    "title"         => ucwords($record->title), 
                    'status'        => ($record->status==1)?'Active':'Inactive'
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

    public function showLists(string $id){
        $pageTitle  = 'Show Lists of Questions and Answeres';
        $sobriety = SobrietyModel::with(['questionAns'])->select('*')->where('id', $id)->first();
        return view('admin.sobriety.view', compact('pageTitle', 'sobriety'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle  = 'Edit Sobriety';
        $sobriety = SobrietyModel::with(['questionAns'])->select('*')->where('id', $id)->first();
        return view('admin.sobriety.edit', compact('pageTitle', 'sobriety'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sobriety = SobrietyModel::find($id);
        $validator = Validator::make($request->all(), [
            'title'     => 'required',
            'status'    => 'required',        
            'question.*' => 'required',        
        ],[
            'question.*.required' => 'The question field is required.'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            $update_data = [
                'title'  => $request->title,
                'rules'  => $request->rules,
                'status' => $request->status
            ];
            SobrietyModel::where('id',$id)->update($update_data);
            if(count($request->question)>0){
                DB::table('sobriety_answere')->where('sobriety_id', $id)->delete();
                foreach($request->question as $key => $question){
                    $insert_details_data = [
                        'sobriety_id' => $id,
                        'question'    => $question,
                        'answere_one' => $request->answere_one[$key],
                        'marks_one'   => $request->marks_one[$key],
                        'answere_two' => $request->answere_two[$key],
                        'marks_two'   => $request->marks_two[$key],
                        'answere_three'=> $request->answere_three[$key],
                        'marks_three'  => $request->marks_three[$key],
                        'answere_four'=> $request->answere_four[$key],
                        'marks_four'  => $request->marks_four[$key],
                        'answere_five'=> $request->answere_five[$key],
                        'marks_five'  => $request->marks_five[$key],
                        'answere_six'=> $request->answere_six[$key],
                        'marks_six'  => $request->marks_six[$key]
                    ];
                    SobrietyAnswereModel::create($insert_details_data);
                }
            }
            return redirect('admin/sobriety')->with('success', 'Sobriety updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sobriety = SobrietyModel::find($id);
        $sobriety->delete();
        DB::table('sobriety_answere')->where('sobriety_id', $id)->delete();
        return redirect('admin/sobriety')->with('success', 'Sobriety deleted successfully.');
    }
}
