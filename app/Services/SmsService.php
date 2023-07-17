<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
// use Infobip\Configuration;


class SmsService
{
    public function sendSms($messages, $no_telpon)
    {

        // dd($no_telpon);
        $split = str_split($no_telpon);
        if ($split[0] == '0') {
            $no_telpon = '62' . substr($no_telpon, 1);
            // dd($no_telpon);
        } else {
            $no_telpon = $no_telpon;
        }


        $curl = curl_init();



        // dd($no_telpon);
        $messages = [
            "messages" => [
                "destinations" => [
                    "to" => $no_telpon
                ],
                "from" => "InfoSMS",
                "text" => $messages
            ]
        ];
        // dd($messages);

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://r5dmy1.api.infobip.com/sms/2/text/advanced',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($messages),
            CURLOPT_HTTPHEADER => array(
                'Authorization: App 343a10195cc913ab6e68327825b878c7-a41b1218-6ff8-401e-bb7e-05444ad0f613',
                'Content-Type: application/json',
                'Accept: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // dd($response);

        // dd($response);
        return $response;
        // dd($response->body());
    }
}
