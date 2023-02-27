<?php

declare(strict_types=1);

namespace Banking;

use DateTimeImmutable;

class Account
{
    private int $balance = 0;
    /** @var Movement[] */
    private array $movements = [];

    public function deposit(int $value): void
    {
        $this->balance += $value;
        $this->movements[] = new Movement(
            new DateTimeImmutable(),
            $value,
            $this->balance
        );
    }

    public function withdraw(int $value): void
    {
        $this->balance -= $value;
        $this->movements[] = new Movement(
            new DateTimeImmutable(),
            -$value,
            $this->balance
        );
    }

    public function printStatement(): string
    {
        $output = 'Date        Amount  Balance';
        foreach ($this->movements as $movement) {
            $output .= PHP_EOL . $movement->print();
        }

        return $output;
    }
}
