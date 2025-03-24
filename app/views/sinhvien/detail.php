<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sinh Viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2 class="text-center mb-4">Thông Tin Chi Tiết Sinh Viên</h2>
    <div class="card shadow-sm p-4 bg-light">
        <div class="row align-items-center">
            <div class="col-md-6">
                <table class="table table-borderless">
                    <tr>
                        <th class="text-end">Mã Sinh Viên:</th>
                        <td><?= htmlspecialchars($sinhVien['MaSV']) ?></td>
                    </tr>
                    <tr>
                        <th class="text-end">Họ Tên:</th>
                        <td><?= htmlspecialchars($sinhVien['HoTen']) ?></td>
                    </tr>
                    <tr>
                        <th class="text-end">Giới Tính:</th>
                        <td><?= htmlspecialchars($sinhVien['GioiTinh']) ?></td>
                    </tr>
                    <tr>
                        <th class="text-end">Ngày Sinh:</th>
                        <td><?= htmlspecialchars($sinhVien['NgaySinh']) ?></td>
                    </tr>
                    <tr>
                        <th class="text-end">Ngành Học:</th>
                        <td><?= htmlspecialchars($nganh['TenNganh']) ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6 text-center">
                <img src="<?= htmlspecialchars($sinhVien['Hinh']) ?>" alt="Hình Sinh Viên" class="img-thumbnail" width="200">
            </div>
        </div>
        <div class="text-center mt-3">
            <a href="index.php" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>