<?php
namespace FPBarreto\Motorcheck;

use FPBarreto\Motorcheck\Calculator;

class SalesmanService
{

    private $connection;
    public function __construct(IConnection $connection)
    {

        $this->connection = $connection->connect();
    }

    public function getSalesmen()
    {
        $result = [];
        $sql = "SELECT sales_team.name, TIMESTAMPDIFF(DAY, sales_team.hiring_date, NOW()) as total_working_date,sales_team.hiring_date, sum((quantity * unitary_value)) as total_amount, product, salesman_id
                FROM sales_team
                INNER JOIN sales_records ON sales_records.salesman_id = sales_team.id
                GROUP BY salesman_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $list = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($list as $value) {
            $salesman = new Salesman($value['name'], $value['total_working_date'], $value['hiring_date'], $value['total_amount']);
            (new Calculator)->calculate($salesman);
            $result[] = [$salesman->getName(), date_format(date_create($salesman->getHiringDate()), 'd/m/Y'), $this->formatValue($salesman->getTotalAmount()), $salesman->getPercent(), $this->formatValue($salesman->getCommission())];
        }
        return $result;

    }

    private function formatValue($value)
    {
        return number_format($value, 2, ',', '.');
    }

}
