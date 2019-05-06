<?php
namespace FPBarreto\Motorcheck\Commission;

interface ICommission
{
    public function commission(\FPBarreto\Motorcheck\Sales\Salesman $salesman);
    public function setNextCommission(\FPBarreto\Motorcheck\Commission\ICommission $commission);
}
