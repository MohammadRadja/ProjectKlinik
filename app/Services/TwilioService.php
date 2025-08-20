<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{
    protected $client;
    protected $from;

    public function __construct()
    {
        $this->client = new Client(
            env('TWILIO_SID'),
            env('TWILIO_AUTH_TOKEN')
        );
        $this->from = env('TWILIO_WHATSAPP_FROM'); // nomor sandbox Twilio
    }

    public function sendWhatsapp($to, $message)
    {
        return $this->client->messages->create(
            "whatsapp:$to",
            [
                'from' => $this->from,
                'body' => $message
            ]
        );
    }
}
