<?php

namespace App\Entity;

class User
{

    protected $id;
    protected $name;
    protected $btc;
    protected $eth;
    protected $ltc;
    protected $xrp;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getBtc(): float
    {
        return $this->btc;
    }

    /**
     * @param float $btc
     */
    public function setBtc($btc): void
    {
        $this->btc = $btc;
    }

    /**
     * @return float
     */
    public function getEth(): float
    {
        return $this->eth;
    }

    /**
     * @param float $eth
     */
    public function setEth($eth): void
    {
        $this->eth = $eth;
    }

    /**
     * @return float
     */
    public function getLtc(): float
    {
        return $this->ltc;
    }

    /**
     * @param float $ltc
     */
    public function setLtc($ltc): void
    {
        $this->ltc = $ltc;
    }

    /**
     * @return float
     */
    public function getXrp(): float
    {
        return $this->xrp;
    }

    /**
     * @param float $xrp
     */
    public function setXrp($xrp): void
    {
        $this->xrp = $xrp;
    }


}