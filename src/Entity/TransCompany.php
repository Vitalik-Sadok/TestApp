<?php

namespace App\Entity;

class TransCompany extends Carrier
{

    public function calcShippingCost(float $weight): float
    {
        if ($weight == 0) {
            return 0;
        }
        if ($weight <= 10.0) {
            return 20.0;
        } else {
            return 100.0;
        }
    }
}