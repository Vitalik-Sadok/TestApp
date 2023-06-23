<?php

namespace App\Entity;

class PackGroup extends Carrier
{

    public function calcShippingCost(float $weight): float
    {
        $weight = (float) $weight;
        return $weight * 1.0;

    }
}