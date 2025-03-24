<?php
require_once __DIR__ . '/../models/DangKyHocPhan.php';

class DangKyController {
    private $model;

    public function __construct() {
        $this->model = new DangKyHocPhan();
    }

    public function index() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit();
        }

        $hocPhans = $this->model->getAllHocPhan();
        include __DIR__ . '/../views/dangky/index.php';
    }

    public function register() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $maSV = $_SESSION['user']['MaSV'];
            $maHP = $_POST['MaHP'];

            $this->model->registerHocPhan($maSV, $maHP);
            header("Location: index.php?action=dangky");
        }
    }
}
?>
