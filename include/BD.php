<?php 
require('ExceptionBD.php');

class BD{
    
    private $servername = "localhost";
    private $dbname ="concours";
    private $username = "root";
    private $password = "";

    public function connect(){
        try{
            $conn = new PDO('mysql:host=' . $this->servername . ';dbname=' . $this->dbname ,$this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (ExceptionBD $e) {
            echo 'Echec de la connexion: \n', $e->getMessage();
            exit();
        }
        return $conn;
        }
    }