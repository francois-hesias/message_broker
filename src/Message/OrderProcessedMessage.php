<?php

namespace App\Message;

class OrderProcessedMessage
{
    public function __construct(
        private bool $success = false,
        private string $orderId = ''
    ) {}

    public function isSuccess(): bool
    {
        return $this->success;
    }

    public function setSuccess(bool $success): void
    {
        $this->success = $success;
    }

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function setOrderId(string $orderId): void
    {
        $this->orderId = $orderId;
    }
}
