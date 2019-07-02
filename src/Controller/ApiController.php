<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Service\PortFolioCurrencyCalculator;
use Symfony\Component\Routing\Annotation\Route;

class ApiController
{
    protected $userRepository;
    protected $calculator;

    public function __construct(UserRepository $userRepository, PortFolioCurrencyCalculator $calculator)
    {
        $this->userRepository = $userRepository;
        $this->calculator = $calculator;
    }

    /**
     * get the data for each user with the total in euro
     *
     * @Route("/users", methods={"GET"})
     */
    Public function getAllController()
    {
        
        $users = $this->userRepository->getAll();
        foreach ($users as $user) {
            $totalEuro = $this->calculator->getTotalEuroValue($user);

            var_dump($totalEuro);die();
        }
    }
}