<?php

class Koneksi{

    private $conn;
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbname = 'myblog_db';

    public function __construct(){
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);
        if($this->conn->connect_error){
            die("Gagal Terhubung ke database");
        }else{
            // echo "Koneksi Berhasil";
        }

    }

    public function getConnection(){
        return $this->conn;
    }
}



// $koneksi = new Koneksi();