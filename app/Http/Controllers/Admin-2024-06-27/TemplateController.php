<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Templates;

class TemplateController extends Controller
{
    public function index()
    {
        $pageTitle  = 'Templates';
        return view('admin.template.list', compact('pageTitle'));
    }

    public function create()
    {
        $pageTitle  = 'Add Template';
        return view('admin.template.add', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type'     => 'required',
            'title'    => 'required',
            'sequence' => 'required',
            'content'  => 'required',
            'abuse'    => 'required',
            'status'   => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            $template_data = [
                'type'      => $request->type,
                'title'     => $request->title,
                'sequence'  => $request->sequence,
                'content'   => $request->content,
                'abuse'     => $request->abuse,
                'status'    => $request->status,
            ];

            Templates::create($template_data);
            return redirect('admin/template')->with('success', 'Template created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
        $totalRecords = Templates::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Templates::select('count(*) as allcount')->where('title', 'like', '%' .$searchValue . '%')->count();

        // Fetch records
        $records = Templates::orderBy($columnName,$columnSortOrder)
                ->select('*')->where('title', 'like', '%' .$searchValue . '%')
                ->skip($start)->take($rowperpage)->get();
        // dd($records);
        $data_arr = array();
        $i=1;
        if(count($records)>0){
            foreach($records as $record){
                $id = $record->id;
                $data_arr[] = array(
                    "encrypted_id"  => $record['id'],
                    "id"            => $i+$start,
                    "type"          => $record->type, 
                    "title"          => ucwords($record->title), 
                    "sequence"       => $record->sequence, 
                    "content"        => (Str::length($record->content) > 100) ? substr($record->content, 0, 150).'...': $record->content, 
                    "status"        => ($record->status==1)?'Active':'Inactive',
                    "abuse"         => $record->abuse,
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle  = 'Edit Template';
        $template = Templates::select('*')->where('id', $id)->first();
        return view('admin.template.edit', compact('pageTitle', 'template'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $template = Templates::find($id);
        $validator = Validator::make($request->all(), [
            'type'     => 'required',
            'title'    => 'required',
            'sequence' => 'required',
            'content'  => 'required',
            'abuse'    => 'required',
            'status'   => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            $template_data = [
                'type'      => $request->type,
                'title'     => $request->title,
                'sequence'  => $request->sequence,
                'content'   => $request->content,
                'abuse'     => $request->abuse,
                'status'    => $request->status,
            ];

            Templates::where('id',$id)->update($template_data);
            return redirect('admin/template')->with('success', 'Template updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $template = Templates::find($id);
        $template->delete();
        return redirect('admin/template')->with('success', 'Template deleted successfully.');
    }
}
