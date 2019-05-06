<?php
namespace FPBarreto\Motorcheck\Commission;

use FPBarreto\Motorcheck\Commission\ICommission;

class CommissionMoreOneMillion implements ICommission
{

    private $nextCommission;

    public function setNextCommission(ICommission $nextCommission)
    {
        $this->nextCommission = $nextCommission;
    }

    public function commission(\FPBarreto\Motorcheck\Sales\Salesman $salesman)
    {
        if ($salesman->getTotalAmount() > 1000000) {
            $salesman->setPercent(11);
            $salesman->setCommission($salesman->getTotalAmount() * 0.11);
        } else {
            return $this->nextCommission->commission($salesman);
        }
    }

}
