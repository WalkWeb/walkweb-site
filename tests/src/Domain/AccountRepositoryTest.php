<?php

declare(strict_types=1);

namespace Tests\src\Domain;

use App\Domain\Account\AccountException;
use App\Domain\Account\AccountRepository;
use Tests\AbstractTest;
use WalkWeb\NW\AppException;

class AccountRepositoryTest extends AbstractTest
{
    /**
     * Test on success get account from database by name
     *
     * @throws AppException
     * @throws AccountException
     */
    public function testAccountRepositoryGetSuccess(): void
    {
        $name = 'DemoUser';

        self::assertEquals(
            $name,
            $this->getRepository()->get($name)->getName()
        );
    }

    /**
     * Test on not found account from database by name
     *
     * @throws AccountException
     * @throws AppException
     */
    public function testAccountRepositoryGetFail(): void
    {
        $name = 'UnknownUser';

        $this->expectException(AppException::class);
        $this->expectExceptionMessage(AccountException::NOT_FOUND);
        $this->getRepository()->get($name);
    }

    /**
     * @return AccountRepository
     * @throws AppException
     */
    private function getRepository(): AccountRepository
    {
        return new AccountRepository($this->getContainer());
    }
}
