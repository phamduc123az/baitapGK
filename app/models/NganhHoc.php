<?php
require_once __DIR__ . '/../core/Database.php';

class NganhHoc {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll() {
        return $this->db->fetchAll("SELECT * FROM NganhHoc");
    }

    public function getById($id) {
        $sql = "SELECT * FROM NganhHoc WHERE MaNganh = ?";
        $result = $this->db->fetchAll($sql, [$id]);
        return $result[0] ?? null; // Trả về dòng đầu tiên hoặc null nếu không có kết quả
    }
    
}
?>
