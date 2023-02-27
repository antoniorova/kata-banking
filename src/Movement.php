<?php

declare(strict_types=1);

namespace Banking;

class Movement
{
    public function __construct(
        public readonly \DateTimeImmutable $date,
        public readonly int $amount,
        public readonly int $balance,
    ) {
    }

    public function print(): string
    {
        return sprintf(
            '%s   %s      %d',
            $this->date->format('d.m.Y'),
            $this->amount > 0 ? "+$this->amount" : $this->amount,
            $this->balance
        );
    }
}
