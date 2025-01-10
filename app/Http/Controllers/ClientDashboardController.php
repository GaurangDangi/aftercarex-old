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


class ClientDashboardController extends Controller
{
    public function __construct(){
        \Config::set('auth.defaults.guard', 'client');
    }

    public function index()
    {
        $pageTitle = 'My Dashboard';
        $client = Auth::guard('client')->user();
        $loginCount = DB::table('login_logs_daily')
            ->select(DB::raw('DATE(login_date) as date'))
            ->where(['role'=>'client', 'user_id'=>$client->id])
            ->distinct()
            ->count('login_date');

        $sobriety_percentage = ($loginCount/$client->aftercare_service_length)*100;
        return view('client.dashboard', compact('client', 'loginCount', 'sobriety_percentage', 'pageTitle'));
    }

    public function clientMilestone(Request $request){
        $pageTitle = 'My Milestone';
        $client = Auth::guard('client')->user();
        $milestone = MilestoneModel::select('*')->orderBy('days_no')->skip(0)->take($client->aftercare_service_length)->get();
        $loginLogs = loginLogsModel::select('*')->where(['role'=>'client', 'user_id'=>$client->id])->get()->toArray();
        $numberOfDaysPresent = array_column($loginLogs, 'login_date');

        $startDate = Carbon::parse($loginLogs[0]['login_date']); // Replace with your start date
        $numberOfDays = count($milestone); // Replace with your number of days

        // Calculate end date based on number of days
        $endDate = $startDate->copy()->addDays($numberOfDays - 1);

        // Generate all dates from start to end date
        $period = CarbonPeriod::create($startDate, $endDate);
        $dates_range = '';
        $days_details = [];
        foreach ($period as $key => $date) {
            if(in_array($date->toDateString(), $numberOfDaysPresent)){
                $days_details[] = [
                    'number_of_days' => $key+1,
                    'login_status'   => 1
                ];
            }else{
                $days_details[] = [
                    'number_of_days' => $key+1,
                    'login_status'   => 0
                ];
            }
        }

        return view('client.milestone', compact('client', 'milestone', 'days_details', 'pageTitle'));
    }

    public function clientResourceLibrary(){
        $pageTitle = 'Resource Library Lists';
        $client = Auth::guard('client')->user();
        $response_library = ResourceLibraryModel::select('*')->get()->toArray();
        $category_data = [];
        if(count($response_library)>0){
            foreach($response_library as $lib){
                $category_data[$lib['category']][]=[
                    'id'            => $lib['id'],
                    'type'          => $lib['type'],
                    'title'         => $lib['title'],
                    'description'   => $lib['description'],
                    'thumbnail'     => $lib['thumbnail'],
                    'external_link' => $lib['external_link'],
                    'author'        => $lib['author'],
                    'category'      => $lib['category'],
                    'role'          => $lib['role'],
                    'popular'       => $lib['popular'],
                    'pdfUrl'        => $lib['pdfUrl']
                ];  
            }

            $keyToMoveFirst='Popular on Xaftercare';
            if (array_key_exists($keyToMoveFirst, $category_data)) {
                $category_data = array_merge([$keyToMoveFirst => $category_data[$keyToMoveFirst]], $category_data);
            }
        }
        //dd($category_data);
        return view('client.resource_library', compact('client', 'pageTitle', 'category_data'));
    }

    public function liveGroupClasses(){
        $pageTitle = 'Live Group Classes Lists';
        $client = Auth::guard('client')->user();
        $class = ClassModel::select('*')->paginate(12);
        //dd($class);
        return view('client.live_group_class', compact('client', 'class', 'pageTitle'));
    }

    public function logout(Request $request){
        Auth::guard('client')->logout(); // Logout the client user
        $request->session()->invalidate(); // Invalidate the session
        return redirect('client/login'); // Redirect to client login page
    }
}
