<?php
declare(strict_types=1);

namespace Zenith\Sms\Impls;

use Qiniu\Auth;
use Qiniu\Sms\Sms;
use Zenith\Sms\Configs\QiniuConfig;
use Zenith\Sms\ISender;

class QiniuSender implements ISender
{

    private Sms $client;

    private mixed $result;

    public function __construct(QiniuConfig $config)
    {
        $auth = new Auth($config->getAccessKey(), $config->getSecretKey());
        $this->client = new Sms($auth);
    }

    public function sendByTemplate(string $phone, string $templateNo, array $args): bool
    {
        [$result, $err] = $this->client->sendMessage($templateNo, [$phone], $args);

        $this->result = $result;
        var_dump($result, $err);
        return true;
    }


    /**
     * For example: ['job_id' => '1780568434590237432']
     *
     * @return array
     */
    public function getResult(): mixed
    {
        return $this->result;
    }
}