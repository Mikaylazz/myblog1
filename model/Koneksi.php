<?php

class Koneksi {

    private $conn;
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbname = 'blog_db';

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Gagal terhubung ke database: " . $this->conn->connect_error);
        }

        $this->conn->set_charset("utf8mb4");
    }

    public function getConnection() {
        return $this->conn;
    }

    // Fungsi hapus fleksibel, bisa dipakai di tabel manapun
    public function hapus($tabel, $kolom_id, $id) {
        $query = "DELETE FROM $tabel WHERE $kolom_id = ?";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            die("Query gagal: " . $this->conn->error);
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function __destruct() {
        $this->conn->close();
    }
}
