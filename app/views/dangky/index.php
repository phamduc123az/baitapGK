<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng Ký Học Phần</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2 class="text-center mb-4">Danh Sách Học Phần</h2>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Mã Học Phần</th>
                <th>Tên Học Phần</th>
                <th>Số Tín Chỉ</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($hocPhans) && is_array($hocPhans)): ?>
                <?php foreach ($hocPhans as $hp): ?>
                    <tr>
                        <td><?= isset($hp['MaHP']) ? htmlspecialchars($hp['MaHP']) : 'N/A' ?></td>
                        <td><?= isset($hp['TenHP']) ? htmlspecialchars($hp['TenHP']) : 'N/A' ?></td>
                        <td><?= isset($hp['SoTinChi']) ? htmlspecialchars($hp['SoTinChi']) : 'N/A' ?></td>
                        <td>
                            <?php if (isset($hp['MaHP'])): ?>
                                <form action="?action=register" method="POST">
                                    <input type="hidden" name="MaHP" value="<?= htmlspecialchars($hp['MaHP']) ?>">
                                    <button type="submit" class="btn btn-success btn-sm">Đăng Ký</button>
                                </form>
                            <?php else: ?>
                                <button class="btn btn-secondary btn-sm" disabled>Không khả dụng</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center text-danger">Không có học phần nào!</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
