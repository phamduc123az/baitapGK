<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Sinh Viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Chỉnh Sửa Sinh Viên</h2>
        <div class="card p-4">
            <form action="?action=update&id=<?= $sinhVien['MaSV'] ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Họ Tên:</label>
                    <input type="text" name="HoTen" class="form-control" value="<?= $sinhVien['HoTen'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Giới Tính:</label>
                    <select name="GioiTinh" class="form-select">
                        <option value="Nam" <?= ($sinhVien['GioiTinh'] == 'Nam') ? 'selected' : '' ?>>Nam</option>
                        <option value="Nữ" <?= ($sinhVien['GioiTinh'] == 'Nữ') ? 'selected' : '' ?>>Nữ</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ngày Sinh:</label>
                    <input type="date" name="NgaySinh" class="form-control" value="<?= $sinhVien['NgaySinh'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Ảnh:</label>
                    <input type="file" name="Hinh" class="form-control">
                    <input type="hidden" name="currentHinh" value="<?= $sinhVien['Hinh'] ?>">
                    <div class="mt-2">
                        <img src="<?= $sinhVien['Hinh'] ?>" class="img-thumbnail" width="100">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mã Ngành:</label>
                    <select name="MaNganh" class="form-select">
                        <?php foreach ($nganhs as $nganh): ?>
                            <option value="<?= $nganh['MaNganh'] ?>" <?= ($sinhVien['MaNganh'] == $nganh['MaNganh']) ? 'selected' : '' ?>>
                                <?= $nganh['TenNganh'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Cập Nhật</button>
                <a href="index.php" class="btn btn-secondary">Quay lại</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
