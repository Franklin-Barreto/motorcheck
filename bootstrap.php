<?php
require_once __DIR__ . '/vendor/autoload.php';

use FPBarreto\Motorcheck\Connection;
use FPBarreto\Motorcheck\Report;
use FPBarreto\Motorcheck\SalesmanService;

$salesmanService = new SalesmanService(new Connection("localhost", "motorcheck", "root", ""));

(new Report)->generate($salesmanService->getSalesmen());
exit();
