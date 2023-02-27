<?php

declare(strict_types=1);

namespace Banking\Tests\Unit;

use Banking\Movement;
use PHPUnit\Framework\TestCase;

class MovementTest extends TestCase
{
    public function testShouldPrintMovement(): void
    {
        $date = new \DateTimeImmutable();
        $amount = 500;
        $balance = 500;
        $movement = new Movement($date, $amount, $balance);

        $this->assertEquals(
            sprintf('%s   +%s      %d', $date->format('d.m.Y'), $amount, $balance),
            $movement->print()
        );
    }

    public function testShouldPrintZeroWithoutPlus(): void
    {
        $date = new \DateTimeImmutable();
        $amount = 0;
        $balance = 0;
        $movement = new Movement($date, $amount, $balance);

        $this->assertEquals(
            sprintf('%s   %s      %d', $date->format('d.m.Y'), $amount, $balance),
            $movement->print()
        );
    }
}