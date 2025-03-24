<?php
require_once __DIR__ . '/../core/Database.php';

class HocPhan {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll() {
        return $this->db->fetchAll("SELECT * FROM HocPhan");
    }
}
?>
