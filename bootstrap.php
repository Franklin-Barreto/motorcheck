<?php
require_once __DIR__ . '/vendor/autoload.php';

use FPBarreto\Motorcheck\DB\Connection;
use FPBarreto\Motorcheck\Report\Report;
use FPBarreto\Motorcheck\Sales\SalesmanService;

$salesmanService = new SalesmanService(new Connection("localhost", "motorcheck", "root", ""));

(new Report)->generate($salesmanService->getSalesmen());
exit();
