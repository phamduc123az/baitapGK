<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../models/SinhVienModel.php';



class AuthController
{
    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $maSV = trim($_POST["MaSV"]);

            $model = new SinhVienModel();
            $student = $model->checkStudentExists($maSV);

            if ($student) {
                $_SESSION["MaSV"] = $maSV;
                header("Location: index.php?action=hocphan");
                exit();
            } else {
                $error = "Mã Sinh Viên không tồn tại!";
            }
        }
        include "./app/views/login.php";
    }

    public function logout()
    {
        session_destroy();
        header("Location: index.php?action=login");
        exit();
    }
}
