<?php
require_once "app/controllers/SinhVienController.php";

$controller = new SinhVienController();

if (!isset($_GET['action'])) {
    $controller->index();
} else {
    switch ($_GET['action']) {
        case 'create':
            $controller->create();
            break;
        case 'store':
            $controller->store();
            break;
        case 'edit':
            $controller->edit($_GET['id']);
            break;
        case 'update':
            $controller->update($_GET['id']);
            break;
        case 'delete':
            $controller->delete($_GET['id']);
            break;
        case 'detail':
            $controller->detail($_GET['id']);
            break;
        default:
            $controller->index();
            break;
    }
}