<?php
require_once('../Koneksi.php');

class Auth extends Koneksi {

    protected $conn;

    public function __construct() {
        parent::__construct();
        $this->conn = $this->getConnection();
    }

public function login($email, $password) {
    $sql = "SELECT * FROM auth WHERE email=?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        // Debug output sementara
        var_dump($row['password'], $password);

        if ($password === $row['password']) {
            return $row['id_admin'];
        }
    }
    return false;
}


}
?>
