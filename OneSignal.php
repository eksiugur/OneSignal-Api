<?php
/**
 * Created by Uğur EKŞİ
 * User: eksiugur
 * Date: 2019-08-05
 * Time: 21:38
 */

class OneSignal
{
    public $restApiKey,$userAuthKey,$appId;
    public function __construct($data)
    {
        $this->restApiKey = $data['rest'];
        $this->userAuthKey = $data['user'];
        $this->appId = $data['appid'];
    }

    public function CreateNotification($data)
    {
        $data['app_id'] = $this->appId;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json; charset=utf-8',
            'Authorization: Basic '.$this->restApiKey
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response);
    }

    public function ListNotification($start=0,$limit=50){
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://onesignal.com/api/v1/notifications?app_id=".$this->appId."&limit=".$limit."&offset=".$start,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Authorization: Basic ".$this->restApiKey,
            ],
        ]);
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response);
    }
    public function DeleteNotification($NotifyID){
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://onesignal.com/api/v1/notifications/".$NotifyID."?app_id=".$this->appId,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_HTTPHEADER => [
                "Authorization: Basic ".$this->restApiKey,
            ],
        ]);
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response);
    }
}
