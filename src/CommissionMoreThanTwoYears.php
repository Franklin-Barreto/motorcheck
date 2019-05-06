<?php
namespace FPBarreto\Motorcheck;

class CommissionMoreThanTwoYears implements ICommission
{

    private $nextCommission;

    public function setNextCommission(ICommission $nextCommission)
    {
        $this->nextCommission = $nextCommission;
    }

    public function commission(Salesman $salesman)
    {
        if ($salesman->getDate() > 730) {
            $salesman->setPercent(15);
            $salesman->setCommission($salesman->getTotalAmount() * 0.15);
        } else {
            return $this->nextCommission->commission($salesman);
        }
    }

}
