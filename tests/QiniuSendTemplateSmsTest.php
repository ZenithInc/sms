<?php
declare(strict_types=1);

use Zenith\Sms\Configs\QiniuConfig;
use Zenith\Sms\SmsSender;

include "vendor/autoload.php";

$config = new QiniuConfig("ak", "sk");
$sender = new SmsSender(SmsSender::QINIU, $config);
$result = $sender->sendTemplateSms('18969143101', '1541338019544449024', ['code' => mt_rand(100_000, 999_999)]);
var_dump($result);

