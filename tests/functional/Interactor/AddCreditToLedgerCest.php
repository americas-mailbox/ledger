<?php
declare(strict_types=1);

namespace Tests\Functional\Interactor;

use IamPersistent\Ledger\Entity\Credit;
use IamPersistent\Ledger\Entity\Ledger;
use IamPersistent\Ledger\Interactor\AddCreditToLedger;
use Money\Money;
use UnitTester;

class AddCreditToLedgerCest
{
    public function testHandle(UnitTester $I)
    {
        $addCreditToLedger = new AddCreditToLedger();

        $ledger = (new Ledger())
            ->setBalance(Money::USD(0));
        $credit1 = (new Credit())
            ->setCredit(Money::USD(1999));

        $addCreditToLedger->handle($ledger, $credit1);

        $I->assertEquals(Money::USD(1999), $ledger->getBalance());
        $I->assertCount(1, $ledger->getEntries());
        $I->assertSame(1, $credit1->getLine(), 'The line should have been set');

        $credit2 = (new Credit())
            ->setCredit(Money::USD(1000));
        $addCreditToLedger->handle($ledger, $credit2);

        $I->assertEquals(Money::USD(2999), $ledger->getBalance());
        $I->assertCount(2, $ledger->getEntries());
        $I->assertSame(2, $credit2->getLine(), 'The line should have been set to the bottom');
    }
}
