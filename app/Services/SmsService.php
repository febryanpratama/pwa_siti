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



        // Infobip
        // dd($no_telpon);
        // $messages = [
        //     "messages" => [
        //         "destinations" => [
        //             "to" => $no_telpon
        //         ],
        //         "from" => "InfoSMS",
        //         "text" => $messages
        //     ]
        // ];
        // // dd($messages);

        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => 'https://r5dmy1.api.infobip.com/sms/2/text/advanced',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'POST',
        //     CURLOPT_POSTFIELDS => json_encode($messages),
        //     CURLOPT_HTTPHEADER => array(
        //         'Authorization: App 343a10195cc913ab6e68327825b878c7-a41b1218-6ff8-401e-bb7e-05444ad0f613',
        //         'Content-Type: application/json',
        //         'Accept: application/json'
        //     ),
        // ));

        // $response = curl_exec($curl);

        // curl_close($curl);
        // // dd($response);

        // // dd($response);
        // return $response;
        // dd($response->body());

        // End Infobip

        // Zenziva

        $userkey = '59d153f6a599';
        $passkey = '695fdb3a186c34dca5d8255a';
        $telepon = $no_telpon;
        $message = $messages;
        $url = 'https://console.zenziva.net/reguler/api/sendsms/';
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
        curl_setopt(
            $curlHandle,
            CURLOPT_POST,
            1
        );
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
            'userkey' => $userkey,
            'passkey' => $passkey,
            'to' => $telepon,
            'message' => $message
        ));
        $results = json_decode(curl_exec($curlHandle), true);
        curl_close($curlHandle);

        // dd($results);
        return $results;
    }
}
