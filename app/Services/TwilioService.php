<?php

namespace App\Services;

use Twilio\Rest\Client;
use Illuminate\Support\Facades\Log;

class TwilioService
{
    protected $client;

    public function __construct()
    {
        $sid = config('services.twilio.sid');
        $token = config('services.twilio.auth_token');
        $this->client = new Client($sid, $token);
    }

    public function sendSMS($to, $message)
    {
        try {
            // Validate phone number format (E.164 format)
            if (!preg_match('/^\+\d+$/', $to)) {
                throw new \Exception('Invalid phone number format: ' . $to);
            }

            $this->client->messages->create(
                $to,
                [
                    'from' => config('services.twilio.phone_number'),
                    'body' => $message,
                ]
            );
            return true;
        } catch (\Exception $e) {
            // Handle specific Twilio errors
            if ($e instanceof \Twilio\Exceptions\RestException) {
                Log::error('Twilio Error: ' . $e->getMessage());
                // Handle specific error codes or messages here
                if ($e->getStatusCode() == 400) {
                    Log::error('Twilio HTTP 400 Error: ' . $e->getMessage());
                    // Example: Handle "Permission to send SMS" error
                    if (strpos($e->getMessage(), "Permission to send an SMS") !== false) {
                        Log::error('Permission to send an SMS has not been enabled for the region');
                        // Handle this specific error scenario here
                    }
                }
            } else {
                Log::error('Error sending SMS: ' . $e->getMessage());
            }
            return $e->getMessage();
        }
    }
}
