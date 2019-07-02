<?php

namespace App\Service;


use App\Entity\User;

class PortFolioCurrencyCalculator
{
    protected $apiConsumer;

    public function __construct(RateApiConsumer $apiConsumer)
    {
        $this->apiConsumer = $apiConsumer;
    }

    public function getTotalEuroValue(User $user): int
    {
        $rates = $this->apiConsumer->getRate();
        $totalInEuro =
            $user->getBtc() * $rates['btc'] +
            $user->getEth() * $rates['eth'] +
            $user->getLtc() * $rates['ltc'] +
            $user->getXrp() * $rates['xrp'];
        return $totalInEuro;
    }
}