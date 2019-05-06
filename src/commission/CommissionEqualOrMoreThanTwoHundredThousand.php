<?php
namespace FPBarreto\Motorcheck\Commission;

class CommissionEqualOrMoreThanTwoHundredThousand implements ICommission
{
    private $nextCommission;

    public function setNextCommission(ICommission $nextCommission)
    {
        $this->nextCommission = $nextCommission;
    }

    public function commission(\FPBarreto\Motorcheck\Sales\Salesman $salesman)
    {
        if ($salesman->getTotalAmount() > 200000) {
            $salesman->setPercent(11);
            $salesman->setCommission($salesman->getTotalAmount() * 0.08);
        } else {
            return $this->nextCommission->commission($salesman);
        }
    }
}
