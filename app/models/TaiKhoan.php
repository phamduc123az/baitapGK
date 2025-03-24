<?php
require_once __DIR__ . '/../core/Database.php';

class TaiKhoan {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function checkLogin($maSV, $matKhau) {
        $sql = "SELECT * FROM TaiKhoan WHERE MaSV = ?";
        $user = $this->db->fetchOne($sql, [$maSV]);

        if ($user && password_verify($matKhau, $user['MatKhau'])) {
            return $user;
        }
        return false;
    }
}
?>
