<?php
namespace FPBarreto\Motorcheck;

class Calculator
{

    public function calculate(\FPBarreto\Motorcheck\Sales\Salesman $salesman)
    {
        $c1 = new \FPBarreto\Motorcheck\Commission\CommissionOverTwoMillions();
        $c2 = new \FPBarreto\Motorcheck\Commission\CommissionMoreThanTwoYears();
        $c3 = new \FPBarreto\Motorcheck\Commission\CommissionMoreOneMillion();
        $c4 = new \FPBarreto\Motorcheck\Commission\CommissionEqualOrMoreThanTwoHundredThousand();
        $c5 = new \FPBarreto\Motorcheck\Commission\CommissionMinimal();
        $c1->setNextCommission($c2);
        $c2->setNextCommission($c3);
        $c3->setNextCommission($c4);
        $c4->setNextCommission($c5);
        return $c1->commission($salesman);
    }
}
