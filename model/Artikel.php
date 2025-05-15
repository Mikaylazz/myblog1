<?php

require_once('../Koneksi.php');

class Artikel extend Koneksi{
    private $conn;

    public function __construct(){
        parent:: __construct();
        $this->conn = $this->getConnection();
    }

    public function getAll(){
        $query = "SELECT * FROM artikel ORDER BY id DESC";

        $result = $this->conn->query($query);

        $data = arrat();

        if($result->num_row > 0){
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
        }
        return $data;
    }
}

$artikel = new Artikel();
print_r($artikel);