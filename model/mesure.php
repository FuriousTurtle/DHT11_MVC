<?php
require_once '../inc/dbconnect.php';

class Mesure extends dbManager
{

    private $id;
    private $temperature;
    private $humidite;
    private $storeTime;

    public function __construct($temperature, $humidite, $storeTime)
    {
        $this->temperature = $temperature;
        $this->humidite = $humidite;
        $this->storeTime = $storeTime;
    }

    protected function getData()
    {
        $pdo = $this->dbConnect();
        $req = $pdo->query('SELECT temp, humi, date FROM data');
    }

    protected function sendData($humidite, $temperature)
    {
        $pdo = $this->dbConnect();
        $req = $pdo->prepare('INSERT INTO dht11 (humi, temp) VALUES (:humi, :temp)');
        $req->execute(array(':humi' => $humidite, ':temp' => $temperature));
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(): void
    {
        $this->id = $id;
    }

    public function getTemperature()
    {
        return $this->temperature;
    }

    public function setTemperature(): void
    {
        $this->temperature = $temperature;
    }

    public function getHumidite()
    {
        return $this->humidite;
    }

    public function setHumidite()
    {
        $this->humidite = $humidite;
    }
}
