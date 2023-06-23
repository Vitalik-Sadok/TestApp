<?php

namespace App\Entity;

abstract class Carrier
{
    abstract public function calcShippingCost(float $weight): float;
}