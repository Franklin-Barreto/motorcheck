<?php
namespace FPBarreto\Motorcheck\Commission;

class CommissionMinimal implements ICommission
{

    private $nextCommission;

    public function setNextCommission(ICommission $nextCommission)
    {

    }

    public function commission(\FPBarreto\Motorcheck\Sales\Salesman $salesman)
    {
        $salesman->setPercent(7);
        $salesman->setCommission($salesman->getTotalAmount() * 0.07);
    }

}
