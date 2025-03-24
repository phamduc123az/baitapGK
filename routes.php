<?php
require_once "app/controllers/SinhVienController.php";
require_once "app/controllers/AuthController.php";
require_once "app/controllers/DangKyController.php";

$sinhVienController = new SinhVienController();
$authController = new AuthController();
$dangKyController = new DangKyController();

// Kiểm tra action từ URL, nếu không có thì mặc định là 'index'
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

switch ($action) {
    /** ========== QUẢN LÝ SINH VIÊN ========== */
    case 'create':
        $sinhVienController->create();
        break;
    case 'store':
        $sinhVienController->store();
        break;
    case 'edit':
        if ($id) $sinhVienController->edit($id);
        break;
    case 'update':
        if ($id) $sinhVienController->update($id);
        break;
    case 'delete':
        if ($id) $sinhVienController->delete($id);
        break;
    case 'detail':
        if ($id) $sinhVienController->detail($id);
        break;

    /** ========== QUẢN LÝ ĐĂNG NHẬP ========== */
    case 'login':
        $authController->login();
        break;
    case 'authenticate':
        $authController->authenticate();
        break;
    case 'logout':
        $authController->logout();
        break;

    /** ========== ĐĂNG KÝ HỌC PHẦN ========== */
    case 'dangky':
        $dangKyController->index();
        break;
    case 'register':
        $dangKyController->register();
        break;

    /** ========== TRANG MẶC ĐỊNH ========== */
    default:
        $sinhVienController->index();
        break;
}
