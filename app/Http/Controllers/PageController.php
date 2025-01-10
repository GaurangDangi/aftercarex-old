<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PageController extends Controller
{
    public function static_pages(Request $request) {
        $segment = $request->segment(1);
        if($segment == 'customer-login'){
            return redirect('login');
        }
        $pageTitle = ucwords($segment);
        $file_path = 'web.pages.'.$segment.'';
        if(view()->exists($file_path)){
            return view($file_path, compact('pageTitle'));
        }else{
            return view('web.pages.404');
        }
    }
}
