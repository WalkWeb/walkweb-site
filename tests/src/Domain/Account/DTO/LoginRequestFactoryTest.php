<?php

declare(strict_types=1);

namespace Test\src\Domain\Account\DTO;

use App\Domain\Account\AccountException;
use App\Domain\Account\AccountInterface;
use App\Domain\Account\DTO\LoginRequestFactory;
use Exception;
use Test\AbstractTest;
use WalkWeb\NW\AppException;

class LoginRequestFactoryTest extends AbstractTest
{
    /**
     * Тест на успешное создание объекта LoginRequest на основе данных из формы
     *
     * @dataProvider successDataProvider
     * @param array $data
     * @throws AppException
     */
    public function testLoginRequestFactoryCreateSuccess(array $data): void
    {
        $loginRequest = LoginRequestFactory::create($data);

        self::assertEquals($data['login'], $loginRequest->getLogin());
        self::assertEquals($data['password'], $loginRequest->getPassword());
    }

    /**
     * Тесты на различные варианты невалидных данных
     *
     * @dataProvider failDataProvider
     * @param array $data
     * @param string $error
     * @throws AppException
     */
    public function testLoginRequestFactoryCreateFail(array $data, string $error): void
    {
        $this->expectException(AppException::class);
        $this->expectExceptionMessage($error);
        LoginRequestFactory::create($data);
    }

    /**
     * @return array
     */
    public function successDataProvider(): array
    {
        return [
            [
                [
                    'login'    => 'Login',
                    'password' => '12345',
                ],
            ],
        ];
    }

    /**
     * @return array[]
     * @throws Exception
     */
    public function failDataProvider(): array
    {
        return [
            [
                // Отсутствует login
                [
                    'password' => 'pass1',
                ],
                AccountException::INVALID_LOGIN,
            ],
            [
                // login некорректного типа
                [
                    'login'    => false,
                    'password' => 'pass1',
                ],
                AccountException::INVALID_LOGIN,
            ],
            [
                // login меньше минимальный длинны
                [
                    'login'    => self::generateString(AccountInterface::LOGIN_MIN_LENGTH - 1),
                    'password' => 'pass1',
                ],
                AccountException::INVALID_LOGIN_LENGTH . AccountInterface::LOGIN_MIN_LENGTH . '-' . AccountInterface::LOGIN_MAX_LENGTH,
            ],
            [
                // login больше максимальной длинны
                [
                    'login'    => self::generateString(AccountInterface::LOGIN_MAX_LENGTH + 1),
                    'password' => 'pass1',
                ],
                AccountException::INVALID_LOGIN_LENGTH . AccountInterface::LOGIN_MIN_LENGTH . '-' . AccountInterface::LOGIN_MAX_LENGTH,
            ],
            [
                // login содержит недопустимые символы
                [
                    'login'    => 'User-1$',
                    'password' => 'pass1',
                ],
                AccountException::INVALID_LOGIN_SYMBOL,
            ],
            [
                // Отсутствует password
                [
                    'login' => 'User-1',
                ],
                AccountException::INVALID_PASSWORD,
            ],
            [
                // password некорректного типа
                [
                    'login'    => 'User-1',
                    'password' => null,
                ],
                AccountException::INVALID_PASSWORD,
            ],
            [
                // password меньше минимальной длинны
                [
                    'login'    => 'User-1',
                    'password' => self::generateString(AccountInterface::PASSWORD_MIN_LENGTH - 1),
                ],
                AccountException::INVALID_PASSWORD_LENGTH . AccountInterface::PASSWORD_MIN_LENGTH . '-' . AccountInterface::PASSWORD_MAX_LENGTH,
            ],
            [
                // password больше максимальной длинны
                [
                    'login'    => 'User-1',
                    'password' => self::generateString(AccountInterface::PASSWORD_MAX_LENGTH + 1),
                ],
                AccountException::INVALID_PASSWORD_LENGTH . AccountInterface::PASSWORD_MIN_LENGTH . '-' . AccountInterface::PASSWORD_MAX_LENGTH,
            ],
        ];
    }
}
