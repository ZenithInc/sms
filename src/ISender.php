<?php
declare(strict_types=1);

namespace Zenith\Sms;

interface ISender
{
    public function sendByTemplate(string $phone, string $templateNo, array $args): bool;

    public function getResult(): mixed;
}
