<?php
require_once __DIR__ . '/../core/Database.php';

class DangKyHocPhan {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllHocPhan() {
        return $this->db->fetchAll("SELECT * FROM HocPhan");
    }

    public function registerHocPhan($maSV, $maHP) {
        $sql = "INSERT INTO ChiTietDangKy (MaDK, MaHP) 
                VALUES ((SELECT MaDK FROM DangKy WHERE MaSV = ?), ?)";
        return $this->db->execute($sql, [$maSV, $maHP]);
    }
}
?>
