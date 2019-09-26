<?php


namespace App;


use PDO;
use PDOException;

class DB
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;
    /**
     * DB constructor.
     * @param string $servername
     * @param string $username
     * @param string $password
     * @param string $dbname
     */
    public function __construct($servername, $username, $password, $dbname)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function connect(){
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    /**
     * @return mixed
     */
    public function getConn()
    {
        return $this->conn;
    }

}