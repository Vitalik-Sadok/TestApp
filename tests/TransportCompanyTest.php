<?php

namespace App\Tests;

use App\Entity\PackGroup;
use App\Entity\TransCompany;
use PHPUnit\Framework\TestCase;

class TransportCompanyTest extends TestCase
{
    public function testTransCompanyPriceCalculation()
    {
        $transportCompany = new TransCompany();

        $this->assertEquals(20, $transportCompany->calcShippingCost(5));
        $this->assertEquals(100, $transportCompany->calcShippingCost(15));
        $this->assertEquals(0, $transportCompany->calcShippingCost(0));
    }

    public function testPackGroupPriceCalculation()
    {
        $transportCompany = new PackGroup();

        $this->assertEquals(5, $transportCompany->calcShippingCost(5));
        $this->assertEquals(15, $transportCompany->calcShippingCost(15));
        $this->assertEquals(0, $transportCompany->calcShippingCost(0));
    }
}
