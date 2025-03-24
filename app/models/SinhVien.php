<?php
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../models/NganhHoc.php';

class SinhVien {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll() {
        return $this->db->fetchAll("SELECT * FROM SinhVien");
    }

    public function getById($id) {
        $sql = "SELECT * FROM SinhVien WHERE MaSV = ?";
        return $this->db->query($sql, [$id])->fetch(PDO::FETCH_ASSOC);
    }

    public function add($data) {
        $sql = "INSERT INTO SinhVien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) VALUES (?, ?, ?, ?, ?, ?)";
        return $this->db->query($sql, array_values($data));
    }

    public function update($id, $data) {
        $sql = "UPDATE SinhVien SET HoTen = ?, GioiTinh = ?, NgaySinh = ?, Hinh = ?, MaNganh = ? WHERE MaSV = ?";
        return $this->db->query($sql, array_merge(array_values($data), [$id]));
    }

    public function delete($id) {
        $sql = "DELETE FROM SinhVien WHERE MaSV = ?";
        return $this->db->query($sql, [$id]);
    }

    public function create() {
        $nganhModel = new NganhHoc();
        $nganhs = $nganhModel->getAll();
        include __DIR__ . '/../views/sinhvien/add.php';
    }
    
    public function edit($id) {
        $sinhVien = $this->model->getById($id);
        $nganhModel = new NganhHoc();
        $nganhs = $nganhModel->getAll();
        include __DIR__ . '/../views/sinhvien/edit.php';
    }
}
