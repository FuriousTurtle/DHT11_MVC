 <?php
require 'config.inc.php';

class dbManager
{
    private $serverAdress;
    private $dbName;
    private $dbUser;
    private $dbPassword;

    public function __construct($serverAdress, $dbName, $dbUser, $dbPassword)
    {
        $this->$serverAdress = $dbinfo['server'];
        $this->$dbUser = $dbinfo['user'];
        $this->$dbPassword = $dbinfo['password'];
        $this->dbName = $dbinfo['name'];
    }

    public function dbConnect()
    {
        try {
            $pdo = new PDO('mysql:host=' . $serverAdress . ';dbname=' . $dbName, $dbUser, $dbPassword);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}