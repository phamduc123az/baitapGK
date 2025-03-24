<?php
require_once __DIR__ . '/../models/HocPhan.php';
require_once __DIR__ . '/../models/DangKyHocPhan.php';

class DangKyController {
    private $hocPhanModel;
    private $dangKyModel;

    public function __construct() {
        $this->hocPhanModel = new HocPhan();
        $this->dangKyModel = new DangKyHocPhan();
    }

    public function index() {
        $hocPhans = $this->hocPhanModel->getAll();
        include __DIR__ . '/../views/dangky/index.php';
    }

    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $maSV = $_SESSION['MaSV']; // Giả sử đã đăng nhập
            $maHocPhan = $_POST['MaHocPhan'];

            $this->dangKyModel->register($maSV, $maHocPhan);
            header("Location: index.php?action=dangky");
        }
    }
}
?>
