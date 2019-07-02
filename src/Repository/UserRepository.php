<?php

namespace App\Repository;

use App\Adapter\CsvManager;
use App\Entity\User;

class UserRepository
{
    protected $csvManager;

    public function __construct(CsvManager $csvManager)
    {
        $this->csvManager = $csvManager;
    }

    public function GetAll()
    {
        $csvIterator = $this->csvManager->getAll();
        $users = [];

        foreach ($csvIterator as $data) {
            $user = new User();
            $user->setId($data['Id']);
            $user->setName($data['Name']);
            $user->setBtc($data['BTC']);
            $user->setEth($data['ETH']);
            $user->setLtc($data['LTC']);
            $user->setXrp($data['XRP']);
            $users[] = $user;
        }
        return $users;
    }
}