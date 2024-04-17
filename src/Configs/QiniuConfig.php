<?php
declare(strict_types=1);

namespace Zenith\Sms\Configs;

class QiniuConfig
{

    private string $accessKey;

    private string $secretKey;

    public function __construct(string $accessKey, string $secretKey)
    {
        $this->accessKey = $accessKey;
        $this->secretKey = $secretKey;
    }

    public function getAccessKey(): string
    {
        return $this->accessKey;
    }

    public function getSecretKey(): string
    {
        return $this->secretKey;
    }
}
