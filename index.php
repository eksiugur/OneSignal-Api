<?php
/**
 * Created by Uğur EKŞİ
 * User: eksiugur
 * Date: 2019-08-05
 * Time: 21:38
 */

require_once 'OneSignal.php';
/**
 * OneSignal Bağlantısı
 **/
$OneSignalKeys = [
    'rest' => 'xxxxxxxxx',
    'auth' => 'xxxxxxxxx',
    'appid'=> 'xxxxxxxxx',
];
$OneSignal = new OneSignal($OneSignalKeys);

/**
 * Yeni bildirim gönderme
 **/
$PushData = [
    'included_segments' => ['All'],
    'headings' => ['en' => 'Bildirim Başlığı'],
    'contents' => ['en' => 'Bildirim İçerik Yazısı'],
    'url' => 'https://www.ugureksi.com'
];
$Create = $OneSignal->CreateNotification($PushData);

/**
 * Bildirimleri listeleme
 **/
$List = $OneSignal->ListNotification();

/**
 * Bildirim Silme
 */
$NotifyID = 'xxxx-xxxx-xxxx-xxxx-xxxx'; //Silinmesini istediğiniz bildirimin ID'si
$Delete = $OneSignal->DeleteNotification($NotifyID);
