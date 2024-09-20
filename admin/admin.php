<?php
session_start();

// Kiểm tra nếu người dùng đã đăng nhập và có quyền admin không
if (!isset($_SESSION['email']) || $_SESSION['role'] != 1) {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <title>Trang Quản Trị</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="../HS/index.php">
                <img src="../img/logo.jpg" alt="biểu tượng" width="30" height="24" />
            </a>
            <h1 class="navbar-text">Trang Quản Trị</h1>
            <div class="d-flex ms-auto">
                <a href="logout.php" class="btn btn-danger">Đăng xuất</a>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">Dashboard</a>
                    <a href="./manage_users.php" class="list-group-item list-group-item-action">Quản lý người dùng</a>
                    <a href="#" class="list-group-item list-group-item-action">Cài đặt hệ thống</a>
                    <a href="#" class="list-group-item list-group-item-action">Thống kê</a>
                    <a href="#" class="list-group-item list-group-item-action">Hỗ trợ</a>
                </div>
            </div>
            <div class="col-md-9">
                <h2>Chào mừng đến trang quản trị</h2>
                <p>Đây là bảng điều khiển của quản trị viên. Bạn có thể quản lý người dùng, cài đặt hệ thống và xem thống kê tại đây.</p>
                <div class="card mb-3">
                    <div class="card-header">Thống kê nhanh</div>
                    <div class="card-body">
                        <p>Số lượng người dùng: <strong>100</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
