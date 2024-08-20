<?php

declare(strict_types=1);

namespace App\Domain\Rating;

use App\Domain\Account\Collection\AccountCollection;
use App\Domain\Account\Collection\AccountCollectionFactory;
use WalkWeb\NW\AppException;
use WalkWeb\NW\Container;

class RatingRepository
{
    private const LIMIT = 30;

    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * TODO Подумать над тем, что можно пропускать юзеров не завершивших регистрацию и заблокированных
     *
     * TODO Добавить фильтрацию по theme (для этого нужно добавить больше аккаунтов в фикстуры)
     *
     * @return AccountCollection
     * @throws AppException
     */
    public function getTopAccountLevel(): AccountCollection
    {
        $data = $this->container->getConnectionPool()->getConnection()->query(
            'SELECT
                
                `accounts`.`id`,
                `accounts`.`name`,
                `accounts`.`status_id`,
                `accounts`.`group_id`,
                `characters_main`.`level`,
                `characters_main`.`exp`,
                `avatars`.`small_url` as `avatar`

                FROM `accounts` 

                JOIN `characters_main` on `accounts`.`id` = `characters_main`.`account_id`
                JOIN `characters` on `accounts`.`character_id` = `characters`.`id`
                JOIN `avatars` on `characters`.`avatar_id` = `avatars`.`id`

                ORDER BY `characters_main`.`exp` DESC LIMIT ?',
            [
                ['type' => 'i', 'value' => self::LIMIT],
            ]
        );

        // TODO Mock
        foreach ($data as &$datum) {
            $datum['carma'] = 0;
        }

        return AccountCollectionFactory::create($data);
    }
}
