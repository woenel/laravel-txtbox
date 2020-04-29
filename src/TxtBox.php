<?php

namespace Woenel;

use GuzzleHttp\Client;

class TxtBox
{
    private $client;
    private $endpoint;

    public $to;
    public $message;
    public $result;
    
    public function __construct()
    {
        $this->client = new Client([
            'headers' => [
                'X-TXTBOX-Auth' => config('txtbox.api_key')
            ]
        ]);
        
        $this->endpoint = 'https://ws-live.txtbox.com/v1/sms/push';
    }
    
    public function to($to)
    {
        $this->to = $to;

        return $this;
    }

    public function message($message)
    {
        $this->message = $message;

        return $this;
    }

    public function send()
    {
        $res = $this->client->post($this->endpoint, [
            'form_params' => [
                'number' => $this->to,
                'message' => $this->message
            ],
            'http_errors' => false,
            'verify' => config('txtbox.ssl_verify')
        ]);

        $this->result = json_decode($res->getBody()->getContents());

        if($res->getStatusCode() !== 200) {
            $result = [
                'success' => false,
                'message' => $this->result->message,
            ];

            !isset($this->result->errors)
            ?: $result += ['errors' => $this->result->errors];

            return (object) $result;
        }

        return (object) [
            'success' => true,
            'message' => $this->result->message
        ];
    }
}