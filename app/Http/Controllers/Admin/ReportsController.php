<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\InstitutionModel;
use App\Models\ClientModel;

class ReportsController extends Controller
{
    public function index()
    {
        $data = [];
        $from_date       = '';
        $to_date         = '';
        $institution_id  = '';
        $status          = '';
        $pageTitle  = 'All Reports';
        $institution = InstitutionModel::select('id','institution_name')->get();
        return view('admin.report.list', compact('pageTitle', 'institution', 'data', 'from_date', 'to_date', 'institution_id', 'status'));
    }

    public function getData(Request $request){
        $data = [];
        $from_date       = '';
        $to_date         = '';
        $institution_id  = '';
        $status          = '';
        $validator = Validator::make($request->all(), [
            'from_date' => 'required|date|before:to_date',
            'to_date'   => 'date|after:from_date',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            if(!empty($request->submitButton) && $request->submitButton=='submit'){
                $from_date       = $request->input('from_date');
                $to_date         = $request->input('to_date');
                $institution_id  = $request->input('institution_id');
                $status          = $request->input('status');
                
                if(auth()->user()->role == 'institution'){
                    $data = ClientModel::select('client.*')
                    ->where(function($query) use ($from_date, $to_date){
                        if(!empty($from_date) && !empty($to_date)){
                            $query->whereBetween('client.created_at', [$from_date.' 00:00:00', $to_date.' 23:59:59']);
                        }
                    })
                    ->where(function($query) use ($status){
                        if(!empty($status)){
                            $query->where('client.status', $status);
                        }
                    })
                    ->where('client.institution_id', auth()->user()->id)
                    ->orderBy('id','DESC')->get()->toArray();
                }else{
                    $data = ClientModel::select('client.*')
                    ->where(function($query) use ($from_date, $to_date){
                        if(!empty($from_date) && !empty($to_date)){
                            $query->whereBetween('client.created_at', [$from_date.' 00:00:00', $to_date.' 23:59:59']);
                        }
                    })
                    ->where(function($query) use ($institution_id){
                        if(!empty($institution_id)){
                            $query->where('client.institution_id', $institution_id);
                        }
                    })
                    ->where(function($query) use ($status){
                        if(!empty($status)){
                            $query->where('client.status', $status);
                        }
                    })
                    ->orderBy('id','DESC')->get()->toArray();
                }
            }
        }
        // dd($data);
        $pageTitle  = 'All Reports';
        $institution = InstitutionModel::select('id','institution_name')->get();
        return view('admin.report.list', compact('pageTitle', 'institution', 'data','from_date', 'to_date', 'institution_id', 'status'));
    }
}
