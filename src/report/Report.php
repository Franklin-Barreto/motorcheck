<?php
namespace FPBarreto\Motorcheck\Report;

use League\Csv\Writer;

class Report
{
    private $header;

    public function __construct()
    {
        $this->header = ['Name', 'Date', 'Total Amount', "Percent", "Commission"];
    }
    public function setHeader(array $header)
    {
        $this->header = $header;
    }
    public function generate(array $data)
    {
        $csv = Writer::createFromString('');
        $csv->insertOne($this->header);
        $csv->insertAll($data);
        $csv->output("report" . date("Y-m-d H:i:s") . ".csv");
    }
}
