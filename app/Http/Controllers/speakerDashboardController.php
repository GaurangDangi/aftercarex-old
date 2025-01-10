<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;
use App\Models\ClientModel;
use App\Models\MilestoneModel;
use App\Models\loginLogsModel;
use App\Models\ResourceLibraryModel;
use App\Models\ClassModel;


class speakerDashboardController extends Controller
{
    public function __construct(){
        \Config::set('auth.defaults.guard', 'speaker');
    }

    public function index()
    {
        $pageTitle = 'My Dashboard';
        return view('speaker.dashboard', compact('pageTitle'));
    }

    public function logout(Request $request){
        Auth::guard('speaker')->logout(); // Logout the client user
        $request->session()->invalidate(); // Invalidate the session
        return redirect('speaker/login'); // Redirect to client login page
    }
}
