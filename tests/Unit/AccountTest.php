<?php

declare(strict_types=1);

namespace Banking\Tests\Unit;

use Banking\Account;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class AccountTest extends TestCase
{
    public function testShouldDepositQuantity(): void
    {
        $account = new Account();

        $account->deposit(500);
        $date = (new DateTimeImmutable)->format('d.m.Y');
        $expected = <<<STR
Date        Amount  Balance
$date   +500      500
STR;

        $this->assertEquals(
            $expected,
            $account->printStatement()
        );
    }

    public function testShouldWithdrawQuantity(): void
    {
        $account = new Account();

        $account->withdraw(100);
        $date = (new DateTimeImmutable)->format('d.m.Y');
        $expected = <<<STR
Date        Amount  Balance
$date   -100      -100
STR;

        $this->assertEquals(
            $expected,
            $account->printStatement()
        );
    }

    public function testShouldDepositAndWithdrawQuantity(): void
    {
        $account = new Account();

        $account->deposit(500);
        $account->withdraw(100);
        $date = (new DateTimeImmutable)->format('d.m.Y');
        $expected = <<<STR
Date        Amount  Balance
$date   +500      500
$date   -100      400
STR;

        $this->assertEquals(
            $expected,
            $account->printStatement()
        );
    }

    public function testShouldMultipleDepositQuantity(): void
    {
        $account = new Account();

        $account->deposit(500);
        $account->deposit(100);
        $date = (new DateTimeImmutable)->format('d.m.Y');
        $expected = <<<STR
Date        Amount  Balance
$date   +500      500
$date   +100      600
STR;

        $this->assertEquals(
            $expected,
            $account->printStatement()
        );
    }
}