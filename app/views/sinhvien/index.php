<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh sách Sinh Viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2 class="text-center mb-4">Danh sách Sinh Viên</h2>
    <a href="?action=create" class="btn btn-primary mb-3">Thêm Sinh Viên</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Mã SV</th>
                <th>Họ Tên</th>
                <th>Giới Tính</th>
                <th>Ngày Sinh</th>
                <th>Hình</th>
                <th>Mã Ngành</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sinhViens as $sv): ?>
            <tr>
                <td><?= htmlspecialchars($sv['MaSV']) ?></td>
                <td><?= htmlspecialchars($sv['HoTen']) ?></td>
                <td><?= htmlspecialchars($sv['GioiTinh']) ?></td>
                <td><?= htmlspecialchars($sv['NgaySinh']) ?></td>
                <td><img src="<?= htmlspecialchars($sv['Hinh']) ?>" class="img-thumbnail" width="50"></td>
                
                <td><?= htmlspecialchars($sv['MaNganh']) ?></td>
                <td>
                    <a href="?action=detail&id=<?= htmlspecialchars($sv['MaSV']) ?>" class="btn btn-info btn-sm">Chi tiết</a>
                    <a href="?action=edit&id=<?= htmlspecialchars($sv['MaSV']) ?>" class="btn btn-warning btn-sm">Sửa</a>
                    <a href="?action=delete&id=<?= htmlspecialchars($sv['MaSV']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>