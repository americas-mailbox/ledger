<?php
declare(strict_types=1);

namespace IamPersistent\Ledger\Entity;

use DateTime;
use Money\Money;

abstract class Entry
{
    /** @var DateTime */
    protected $date;
    /** @var string */
    protected $description;
    /** @var mixed */
    protected $id;
    /** @var int */
    protected $line;
    /** @var mixed */
    protected $productId;
    /** @var string|null */
    protected $referenceNumber;
    /** @var \Money\Money */
    protected $runningBalance;
    /** @var string|null */
    protected $type;

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function setDate(DateTime $date): Entry
    {
        $this->date = $date;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Entry
    {
        $this->description = $description;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): Entry
    {
        $this->id = $id;

        return $this;
    }

    public function getLine(): ?int
    {
        return $this->line;
    }

    public function setLine(?int $line): Entry
    {
        $this->line = $line;

        return $this;
    }

    public function getProductId()
    {
        return $this->productId;
    }

    public function setProductId($productId): Entry
    {
        $this->productId = $productId;

        return $this;
    }

    public function getReferenceNumber(): ?string
    {
        return $this->referenceNumber;
    }

    public function setReferenceNumber(?string $referenceNumber): Entry
    {
        $this->referenceNumber = $referenceNumber;

        return $this;
    }

    public function getRunningBalance(): Money
    {
        return $this->runningBalance;
    }

    public function setRunningBalance(Money $runningBalance): Entry
    {
        $this->runningBalance = $runningBalance;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type = null): Entry
    {
        $this->type = $type;

        return $this;
    }

    public function isCredit(): bool
    {
        return false;
    }

    public function isDebit(): bool
    {
        return false;
    }
}
