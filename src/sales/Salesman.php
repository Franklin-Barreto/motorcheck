<?php
namespace FPBarreto\Motorcheck\Sales;

class Salesman
{
    private $name;
    private $totalWorkingDate;
    private $hiringDate;
    private $totalAmount;
    private $percent;
    private $commission;

    public function __construct($name, $totalWorkingDate, $hiringDate, $totalAmount)
    {
        $this->name = $name;
        $this->totalWorkingDate = $totalWorkingDate;
        $this->hiringDate = $hiringDate;
        $this->totalAmount = $totalAmount;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDate()
    {
        return $this->totalWorkingDate;
    }

    public function getHiringDate()
    {
        return $this->hiringDate;
    }

    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    public function getPercent()
    {
        return $this->percent;
    }

    public function setPercent($percent)
    {
        $this->percent = $percent;
    }

    public function getCommission()
    {
        return $this->commission;
    }

    public function setCommission($commission)
    {
        $this->commission = $commission;
    }

}
