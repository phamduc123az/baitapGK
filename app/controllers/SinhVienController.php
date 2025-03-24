<?php
require_once __DIR__ . '/../models/SinhVien.php';
require_once __DIR__ . '/../models/NganhHoc.php';

class SinhVienController {
    private $model;
    private $nganhModel;

    public function __construct() {
        $this->model = new SinhVien();
        $this->nganhModel = new NganhHoc();
    }

    public function index() {
        $sinhViens = $this->model->getAll();
        include __DIR__ . '/../views/sinhvien/index.php';
    }

    public function create() {
        $nganhs = $this->nganhModel->getAll();
        include __DIR__ . '/../views/sinhvien/add.php';
    }

    public function store() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $imagePath = $this->uploadImage($_FILES['Hinh']);
            
            $data = [
                htmlspecialchars($_POST["MaSV"]),
                htmlspecialchars($_POST["HoTen"]),
                htmlspecialchars($_POST["GioiTinh"]),
                htmlspecialchars($_POST["NgaySinh"]),
                $imagePath,
                htmlspecialchars($_POST["MaNganh"])
            ];
            $this->model->add($data);
            header("Location: index.php");
            exit;
        }
    }

    public function edit($id) {
        $sinhVien = $this->model->getById($id);
        $nganhs = $this->nganhModel->getAll();
        include __DIR__ . '/../views/sinhvien/edit.php';
    }

    public function update($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $imagePath = !empty($_FILES['Hinh']['name']) ? $this->uploadImage($_FILES['Hinh']) : $_POST['currentHinh'];
            
            $data = [
                htmlspecialchars($_POST["HoTen"]),
                htmlspecialchars($_POST["GioiTinh"]),
                htmlspecialchars($_POST["NgaySinh"]),
                $imagePath,
                htmlspecialchars($_POST["MaNganh"])
            ];
            $this->model->update($id, $data);
            header("Location: index.php");
            exit;
        }
    }

    public function delete($id) {
        if ($this->model->getById($id)) { // Kiểm tra sinh viên có tồn tại không
            $this->model->delete($id);
            header("Location: index.php");
            exit;
        } else {
            echo "Sinh viên không tồn tại!";
        }
    }

    private function uploadImage($file) {
        if ($file['error'] == 0) {
            $targetDir = __DIR__ . "/../../public/uploads/";
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            $targetFile = $targetDir . basename($file["name"]);
            move_uploaded_file($file["tmp_name"], $targetFile);
            return "/uploads/" . basename($file["name"]);
        }
        return "/Content/images/default.jpg"; // Ảnh mặc định nếu không chọn ảnh
    }

    public function detail($id) {
        $sinhVien = $this->model->getById($id);
        if (!$sinhVien) {
            die("Sinh viên không tồn tại!");
        }
        
        // Lấy thông tin ngành học
        $nganh = $this->nganhModel->getById($sinhVien['MaNganh']);
    
        include __DIR__ . '/../views/sinhvien/detail.php';
    }
}