<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <title>Học Lập Trình</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="assets/img/logo.jpg" alt="Logo" width="30" height="30" class="d-inline-block align-top me-2" />
                Học Lập Trình
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Trang Chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=html">HTML</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=css">CSS</a></li>
                    <?php if (isset($_SESSION['email'])): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                                <img src="assets/img/nguoi.jpg" alt="User" class="rounded-circle" width="25" height="25" />
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#"><?php echo htmlspecialchars($_SESSION['email']); ?></a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="setting.php">Cài Đặt</a></li>
                                <li><a class="dropdown-item" href="logout.php">Đăng Xuất</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="index.php?page=register">Đăng Ký</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?page=login">Đăng Nhập</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav> 