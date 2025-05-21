<?php

require('Koneksi.php');

class auth extends Koneksi{

    private $conn;
    public function __construct(){
        parent :: __construct();
        $this->conn = $this->getConnetion();
    }

    public function login ($email, $password){
        $sql = "SELECT *FROM auth WHERE email='".$email."'";
        $query = $this->conn->query($sql);

        if($query->num_row > 0){
            echo "Berhasil";
        }else{
            echo "gagal";
        }
    }
}

$auth = new auth();
$auth->login('mikaylaarzetha@gmail.com', "");