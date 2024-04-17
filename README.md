# Zenith SMS

Easily integrate with multiple SMS service providers like Qiniu Cloud, Alibaba Cloud, and others using our Composer package. Simplify your SMS integration across platforms with ease.

## Qiniu Cloud

Send sms with Qiniu Cloud, for example:
```php
$config = new QiniuConfig("NM6ScNQr2LZYFzAXaYV52JxZD4SI4h", "CdsEWA_5iJUinIAmZ1D78f06zp3INvAWZ");
$sender = new SmsSender(SmsSender::QINIU, $config);
$result = $sender->sendTemplateSms('18969143101', '1541338019544449024', ['code' => mt_rand(100_000, 999_999)]);
var_dump($result);
```