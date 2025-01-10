<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientModel;
use DateTime;
use DateInterval;
use Mail;

class SendDeactivationMailCron extends Controller
{
    public function index()
    {
        // current date
        $currentDateTime = new DateTime(); // Create a new DateTime object
        $currentDate = $currentDateTime->format('Y-m-d'); 

        // Fetch records
        $records = ClientModel::select('*')
                    ->where('status', '1')
                    ->where('service_date', '<', $currentDate)
                    ->get();

        if(count($records)>0){
            foreach($records as $record){
                // Calculate the difference between two dates
                $serviceDate = new DateTime($record['service_date']);
                $interval = $serviceDate->diff($currentDateTime);

                // Accessing the difference
                $daysDifference = $interval->days; // Total number of days

                if($daysDifference == $record->aftercare_service_length) {

                    ClientModel::where('id',$record->id)->update(['status' => '0']);

                    $institution = InstitutionModel::where('id',$record->institution_id)->first();
                    $data = [
                        'contact_person_name'   => $institution->contact_person_name,
                        'email'                 => $institution->email_id,
                        'mobile_no'             => $institution->mobile_no,
                        'client_name'           => $record->name,
                        'client_email_id'       => $record->email_id,
                        'client_mobile_no'      => $record->mobile_no,
                    ];
                    // dd($data);
                    Mail::send('admin/email/client_deactivate', $data, function($messages) use ($institution){
                        $messages->to($institution->email_id);
                        $messages->subject('Activation Mail');
                    });
                }
            }
        }
    }
}
