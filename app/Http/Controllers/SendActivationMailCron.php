<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientModel;
use App\Models\Templates;
use App\Services\TwilioService;
use DateTime;
use DateInterval;
use Mail;

class SendActivationMailCron extends Controller
{
    protected $twilio;

    public function __construct(TwilioService $twilio){
        $this->twilio = $twilio;
    }

    public function index()
    {
        // current date
        $currentDateTime = new DateTime(); // Create a new DateTime object
        $currentDate = $currentDateTime->format('Y-m-d'); 

        // Fetch records
        $records = ClientModel::select('*')
                    ->where('status', '1')
                    ->where('service_date', '<=', $currentDate)
                    ->get();

        if(count($records)>0){
            foreach($records as $record){
                // Calculate the difference between two dates
                $serviceDate = new DateTime($record['service_date']);
                $interval = $serviceDate->diff($currentDateTime);

                // Accessing the difference
                $daysDifference = $interval->days; // Total number of days
                
                $emailTemplate = Templates::select('*')
                                        ->where('sequence', $daysDifference)
                                        ->where('type', 'Email')
                                        ->first();
                if ($emailTemplate) {
                    $data = [
                        'name'          => $record->name,
                        'email'         => $record->email_id,
                        'mobile_no'     => $record->mobile_no,
                        'content'       => $record->content
                    ];
                    // dd($data);
                    Mail::send('admin/email/client_activate', $data, function($messages) use ($record){
                        $messages->to($record->email_id);
                        $messages->subject('Activation Mail');
                    });
                }

                if($record->sms_service == 1) {
                    $smsTemplate = Templates::select('*')
                                            ->where('sequence', $daysDifference)
                                            ->where('type', 'SMS')
                                            ->first();
                    if ($smsTemplate) {
                        $message = $smsTemplate->content;
                        $this->twilio->sendSMS('+14074086385', $message);
                    }
                }
            }
        }
    }
}
