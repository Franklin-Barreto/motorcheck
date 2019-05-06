<?php
namespace FPBarreto\Motorcheck\DB;

use FPBarreto\Motorcheck\DB\IConnection;

class Connection implements IConnection
{
    private $host;
    private $dbName;
    private $user;
    private $password;

    public function __construct($host, $dbName, $user, $password)
    {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->user = $user;
        $this->password = $password;
    }

    public function connect()
    {

        try {

            $conn = new \PDO("mysql:host={$this->host};dbname={$this->dbName}", $this->user, $this->password);

            //= new PDO("mysql:host=$servername;dbname=motorcheck", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

/*
try {
return new \PDO("mysql:host={$this->host};dbname={$this->dbName}", $this->user, $this->password);
} catch (\PDOException $e) {
echo "Error to connect:" . $e->getMassage() . " code: " . $e->getCode();
exit();
}*/
    }
}
