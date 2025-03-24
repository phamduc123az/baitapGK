<?php
require_once __DIR__ . '/../core/Database.php';

class DangKyHocPhan {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function register($maSV, $maHocPhan) {
        $query = "INSERT INTO DangKyHocPhan (MaSV, MaHocPhan) VALUES (?, ?)";
        return $this->db->execute($query, [$maSV, $maHocPhan]);
    }
}
?>
