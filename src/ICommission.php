<?php
namespace FPBarreto\Motorcheck;

interface ICommission
{
    public function commission(Salesman $salesman);
    public function setNextCommission(ICommission $commission);
}
