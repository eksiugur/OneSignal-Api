# PHP OneSignal Api Class

OneSignal ile kişilere ulaşmayı kolaylaştıran bildirim sisteminin kullanımını

# Kurulum

[OneSignal](https://www.onesignal.com) sitesine girip Api Key , Rest Api Key ve Oluşturduğunuz App Key bilgilerini alıp gerekli yerlere yazmamız gerekmektedir.

# Api Dökümantasyonu

Proje içerisinde bildirim gönderme , gönderilen bildirimleri listeleme(Kaç kişiye ulaşmış , kaç kişi tıklamış gibi bilgileri görüntüleyebilirsiniz) ve son olarak oluşturulmuş bildirimin kullanıcılara gönderilmeden silinmesi

[Dökümantasyon](https://documentation.onesignal.com/reference) sayfasında kullanılabilen bütün fonksiyonlar bulunmaktadır.

# OneSignal Bağlantısı

```php
require_once 'OneSignal.php';
$OneSignalKeys = [
    'rest' => 'MTQyMzk2NzItYWJkZS00M2E5LTgzYzgtOWQ5ZjNlOGRhNDk5',
    'auth' => 'NDE1M2ExMzUtMTk2Ny00ZWJiLThiODItNzI3MzZiN2I0N2Zi',
    'appid'=> '46316498-ff42-48a6-952b-b85350306aee',
];
$OneSignal = new OneSignal($OneSignalKeys);
```

# Yeni bildirim gönderme işlemi

```php
$PushData = [
    'included_segments' => ['All'],
    'headings' => ['en' => 'OneSignal Class Title '],
    'contents' => ['en' => 'OneSignal Class Content'],
    'url' => 'https://www.ugureksi.com'
];
$Create = $OneSignal->CreateNotification($PushData);
```
# Gönderilmiş Bildirimleri Listeleme

```php
$List = $OneSignal->ListNotification();
```
# Kullanıcılara henüz ulaşmamış bildirimi silme/iptal etme

```php
$NotifyID = 'ed06c7f9-38ac-450f-87fb-3ccdb7a2b34e'; //Silinmesini istediğiniz bildirimin ID'si
$Delete = $OneSignal->DeleteNotification($NotifyID);
```


