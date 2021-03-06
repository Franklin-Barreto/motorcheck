<?php
namespace FPBarreto\Motorcheck\Commission;

class CommissionOverTwoMillions implements ICommission
{

    private $nextCommission;

    public function setNextCommission(ICommission $nextCommission)
    {
        $this->nextCommission = $nextCommission;
    }

    public function commission(\FPBarreto\Motorcheck\Sales\Salesman $salesman)
    {
        if ($salesman->getTotalAmount() > 2000000 && $salesman->getDate() > 365) {
            $salesman->setPercent(17);
            $salesman->setCommission($salesman->getTotalAmount() * 0.17);
        } else {
            return $this->nextCommission->commission($salesman);
        }
    }

}
