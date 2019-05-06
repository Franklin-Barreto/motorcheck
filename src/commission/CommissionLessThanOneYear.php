<?php
namespace FPBarreto\Motorcheck\Commission;

class CommissionLessThanOneYear
{
    private $nextCommission;

    private function setNextCommission(ICommission $nextCommission)
    {
        $this->nextCommission = $nextCommission;
    }

    public function commission(Salesman $salesman)
    {
        if ($salesman->getDate() < 1) {
            $salesman->setPercent(11);
            $salesman->setCommission($salesman->getTotalAmount() * 0.17);
        } else {
            return $this->nextCommission->commission($salesman);
        }
    }
}
