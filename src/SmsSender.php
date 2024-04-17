<?php
declare(strict_types=1);

namespace Zenith\Sms;

use Zenith\Sms\Configs\QiniuConfig;
use Zenith\Sms\Exceptions\NotSupportedException;
use Zenith\Sms\Exceptions\SmsSendFailedException;
use Zenith\Sms\Impls\QiniuSender;

class SmsSender
{
    public const string QINIU = 'QINIU';

    private array $impls = [
        self::QINIU => QiniuSender::class,
    ];

    private ISender $sender;

    /**
     * @param string $driver
     * @param QiniuConfig $config
     * @throws NotSupportedException
     */
    public function __construct(string $driver, QiniuConfig $config)
    {
        if (!isset($this->impls[$driver])) {
            throw new NotSupportedException("The $driver not supported!");
        }
        $this->sender = new $this->impls[$driver]($config);
    }

    /**
     * Send a template SMS.
     *
     * @param string $phone The phone number to send the SMS to.
     * @param string $templateNo The template number to use.
     * @param array $args The arguments to replace placeholders in the template.
     * @return bool Returns true if the SMS was sent successfully, otherwise false.
     * @throws SmsSendFailedException Thrown if the SMS sending failed.
     */
    public function sendTemplateSms(string $phone, string $templateNo, array $args): bool
    {
        $result = $this->sender->sendByTemplate($phone, $templateNo, $args);
        if (!$result) {
            throw new SmsSendFailedException();
        }
        return $result;
    }

    /**
     * Retrieves the result from the sender.
     *
     * @return mixed The result from the sender.
     */
    public function getResult(): mixed
    {
        return $this->sender->getResult();
    }
}