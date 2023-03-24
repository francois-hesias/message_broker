<?php

namespace App\Message;

class OrderMessage
{
    private ?\DateTime $createdAt;
    private string $commandId;
    private string $ownerName;
    private string $productName;

    public function __construct(
        string $ownerName,
        string $productName,
        ?\DateTime $createdAt = null,
        string $commandId = ''
    ) {
        $this->createdAt = $createdAt;
        $this->commandId = $commandId;
        $this->ownerName = $ownerName;
        $this->productName = $productName;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getCommandId(): string
    {
        return $this->commandId;
    }

    public function setCommandId(string $commandId): void
    {
        $this->commandId = $commandId;
    }

    public function getOwnerName(): string
    {
        return $this->ownerName;
    }

    public function setOwnerName(string $ownerName): void
    {
        $this->ownerName = $ownerName;
    }

    public function getProductName(): string
    {
        return $this->productName;
    }

    public function setProductName(string $productName): void
    {
        $this->productName = $productName;
    }
}
