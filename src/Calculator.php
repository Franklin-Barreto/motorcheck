<?php
namespace FPBarreto\Motorcheck;

class Calculator
{

    public function calculate(Salesman $salesman)
    {
        $c1 = new CommissionOverTwoMillions();
        $c2 = new CommissionMoreThanTwoYears();
        $c3 = new CommissionMoreOneMillion();
        $c4 = new CommissionEqualOrMoreThanTwoHundredThousand();
        $c5 = new CommissionMinimal();
        $c1->setNextCommission($c2);
        $c2->setNextCommission($c3);
        $c3->setNextCommission($c4);
        $c4->setNextCommission($c5);
        return $c1->commission($salesman);
    }
}
