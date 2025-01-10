<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\ResourceLibraryModel;
use App\Models\ResourceLibraryImagesModel;

class ResourceLibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle  = 'All Resource Library';
        return view('admin.resource_library.list', compact('pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle  = 'Add Resource Library';
        return view('admin.resource_library.add', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type'      => 'required',
            'title'     => 'required',
            'thumbnail' => 'required',
            'role'      => 'required',
            'category'  => 'required',
            'status'    => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            $insert_data = [
                'type'              => $request->type,
                'title'             => $request->title,
                // 'short_description' => $request->short_description,
                'description'       => $request->description,
                'external_link'     => $request->external_link,
                'author'            => $request->author,
                'category'          => $request->category,
                'role'              => $request->role,
                'popular'           => $request->popular,
                'status'            => $request->status
            ];

            if ($request->hasFile('thumbnail')) {
                $image  = $request->file('thumbnail');
                $name = Str::slug(md5(time())).'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/thumbnail');
                $imagePath = $destinationPath. "/". $name;
                $image->move($destinationPath, $name);
                $insert_data['thumbnail'] = 'uploads/thumbnail/'.$name;
            }

            if ($request->hasFile('pdfUrl')) {
                $image  = $request->file('pdfUrl');
                $name = Str::slug(md5(time())).'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/pdfUrl');
                $imagePath = $destinationPath. "/". $name;
                $image->move($destinationPath, $name);
                $insert_data['pdfUrl'] = 'uploads/pdfUrl/'.$name;
            }
            $response_library = ResourceLibraryModel::create($insert_data);
            
            /*if ($request->hasFile('image_url')) {
                foreach($request->file('image_url') as $key => $image){
                    $name = Str::slug(md5(time())).'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/uploads/library');
                    $imagePath = $destinationPath. "/". $name;
                    $image->move($destinationPath, $name);
                    $insert_multiple_image = [
                        'resource_library_id' => $response_library->id, 
                        'image_url'           => 'uploads/library/'.$name, 
                        'is_main'             =>  ($key==0)?1:0
                    ];
                    ResourceLibraryImagesModel::create($insert_multiple_image);
                }
            }*/
            return redirect('admin/resource-library')->with('success', 'Resource Library created successfully.');
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
        $totalRecords = ResourceLibraryModel::select('count(*) as allcount')->count();
        $totalRecordswithFilter = ResourceLibraryModel::select('count(*) as allcount')->where('title', 'like', '%' .$searchValue . '%')->count();

        // Fetch records
        $records = ResourceLibraryModel::orderBy($columnName,$columnSortOrder)
                ->select('*')->where('title', 'like', '%' .$searchValue . '%')
                ->skip($start)->take($rowperpage)->get();
        // dd($records);
        $data_arr = array();
        $i=1;
        if(count($records)>0){
            foreach($records as $record){
                $id = $record->id;
                $data_arr[] = array(
                    "encrypted_id" => $record['id'],
                    "id"           => $i+$start,
                    "type"         => $record->type,
                    "title"        => ucwords($record->title), 
                    "author"       => ucwords($record->author), 
                    "role"         => ucwords($record->role), 
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
        $pageTitle  = 'Edit Resource Library';
        $response_library = ResourceLibraryModel::with(['multipleImages'])->select('*')->where('id', $id)->first();
        return view('admin.resource_library.edit', compact('pageTitle', 'response_library'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $resource_lib = ResourceLibraryModel::with(['multipleImages'])->find($id);
        $validator = Validator::make($request->all(), [
            'type'      => 'required',
            'title'     => 'required',
            'role'      => 'required',
            'category'  => 'required',
            'status'    => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            $update_data = [
                'type'              => $request->type,
                'title'             => $request->title,
                // 'short_description' => $request->short_description,
                'description'       => $request->description,
                'external_link'     => $request->external_link,
                'author'            => $request->author,
                'category'          => $request->category,
                'role'              => $request->role,
                'popular'           => $request->popular,
                'status'            => $request->status
            ];
            
            if ($request->hasFile('thumbnail')) {
                $image  = $request->file('thumbnail');
                $name = Str::slug(md5(time())).'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/thumbnail');
                $imagePath = $destinationPath. "/". $name;
                $image->move($destinationPath, $name);

                $filePath = public_path($resource_lib['thumbnail']);
                if(File::exists($filePath) && $resource_lib['thumbnail']!=''){
                    File::delete($filePath);
                }
                $update_data['thumbnail'] = 'uploads/thumbnail/'.$name;
            }

            if ($request->hasFile('pdfUrl')) {
                $image  = $request->file('pdfUrl');
                $name = Str::slug(md5(time())).'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/pdfUrl');
                $imagePath = $destinationPath. "/". $name;
                $image->move($destinationPath, $name);

                $filePath = public_path($resource_lib['pdfUrl']);
                if(File::exists($filePath) && $resource_lib['pdfUrl']!=''){
                    File::delete($filePath);
                }

                $update_data['pdfUrl'] = 'uploads/pdfUrl/'.$name;
            }
            ResourceLibraryModel::where('id',$id)->update($update_data);
            
            /*if ($request->hasFile('image_url')) {
                if(!empty($resource_lib->multipleImages) && count($resource_lib->multipleImages)>0){
                    foreach($resource_lib->multipleImages as $images){
                        $filePath = public_path($images['image_url']);
                        if(File::exists($filePath) && $images['image_url']!=''){
                            File::delete($filePath);
                        }
                    }
                    DB::table('resource_library_images')->where('resource_library_id', $id)->delete();
                }

                foreach($request->file('image_url') as $key => $image){
                    $name = Str::slug(md5(time())).'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/uploads/library');
                    $imagePath = $destinationPath. "/". $name;
                    $image->move($destinationPath, $name);
                    $insert_multiple_image = [
                        'resource_library_id' => $id, 
                        'image_url'           => 'uploads/library/'.$name, 
                        'is_main'             => ($key==0)?1:0
                    ];
                    ResourceLibraryImagesModel::create($insert_multiple_image);
                }
            }*/

            return redirect('admin/resource-library')->with('success', 'Resource Library updated successfully.');
        }
    }

    public function destroy(string $id)
    {
        $response_library = ResourceLibraryModel::with(['multipleImages'])->find($id);
        $filePath = public_path($response_library['thumbnail']);
        if(File::exists($filePath) && $response_library['thumbnail']!=''){
            File::delete($filePath);
        }

        $pdfUrl = public_path($response_library['pdfUrl']);
        if(File::exists($pdfUrl) && $response_library['pdfUrl']!=''){
            File::delete($pdfUrl);
        }

        /*if(!empty($response_library->multipleImages) && count($response_library->multipleImages)>0){
            foreach($response_library->multipleImages as $images){
                $filePath = public_path($images['image_url']);
                if(File::exists($filePath) && $images['image_url']!=''){
                    File::delete($filePath);
                }
            }
            DB::table('resource_library_images')->where('resource_library_id', $id)->delete();
        }*/
        
        $response_library->delete();
        return redirect('admin/resource-library')->with('success', 'Resource Library deleted successfully.');
    }
}
