<?php
require_once('Koneksi.php');
class Kategori extends Koneksi{
    private $conn;
    public function __construct(){
        parent::__construct();
        $this->conn = $this->getConnection();
    }

    public function getAll(){
        $query = "SELECT * FROM kategori_produk ORDER BY id_kategori DESC";

        $result = $this->conn->query($query);

        $data = array();

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $data[] =$row;
            }
        }
        return $data;
    }

    public function tambah($tanggal, $perusahaan, $jenis, $status){
        $stmt = $this->conn->prepare("INSERT INTO kategori_produk (tanggal, perusahaan_produksi, jenis_produk, status) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $tanggal, $perusahaan, $jenis, $status);
        $stmt->execute();
        $stmt->close();
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM kategori_produk WHERE id_kategori = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updateStatus($id, $status) {
        $stmt = $this->conn->prepare("UPDATE kategori_produk SET status = ? WHERE id_kategori = ?");
        $stmt->bind_param("si", $status, $id);
        $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM kategori_produk WHERE id_kategori = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }



}

// $artikel = new Artikel();
// print_r($artikel->getAll());