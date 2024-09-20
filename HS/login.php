<?php
session_start();

// Xử lý khi form được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $inputPassword = $_POST['password'];

    // Thay đổi thông tin dưới đây theo cấu hình cơ sở dữ liệu của bạn
    $servername = "localhost";
    $usernameDB = "root"; // Thay đổi với tên người dùng của bạn
    $passwordDB = ""; // Thay đổi với mật khẩu của bạn
    $dbname = "hoc_lap_trinh"; // Tên cơ sở dữ liệu

    // Kết nối cơ sở dữ liệu
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $usernameDB, $passwordDB);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Kết nối thất bại: " . $e->getMessage());
    }

    // Truy vấn cơ sở dữ liệu để lấy thông tin người dùng
    $stmt = $pdo->prepare("SELECT Ma_nguoi_dung, Mat_khau, Vai_tro FROM Nguoi_dung WHERE Email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Kiểm tra kết quả
    if ($user) {
        // Kiểm tra mật khẩu
        if (password_verify($inputPassword, $user['Mat_khau'])) {
            // Lưu thông tin người dùng vào session
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $user['Vai_tro'];
            $_SESSION['ma_nguoi_dung'] = $user['Ma_nguoi_dung']; // Lưu mã người dùng vào session

            // Chuyển hướng dựa trên vai trò
            if ($user['Vai_tro'] == 1) {
                header("Location: ../admin/admin.php");
                exit();
            } else {
                header("Location: index.php");
                exit();
            }
        } else {
            $_SESSION['login_error'] = "Sai mật khẩu.";
        }
    } else {
        $_SESSION['login_error'] = "Email không tồn tại.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <title>ĐĂNG NHẬP</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../img/logo.jpg" alt="biểu tượng" width="30" height="24" />
            </a>
            <h1 class="navbar-text">ĐĂNG NHẬP</h1>
        </div>
    </nav>

    <div class="container text-end mb-3">
        <a href="register.html">Bạn chưa có tài khoản? Đăng ký</a>
    </div>

    <div class="container mt-5">
        <?php
        if (isset($_SESSION['login_error'])) {
            echo '<div class="alert alert-danger">' . $_SESSION['login_error'] . '</div>';
            unset($_SESSION['login_error']); // Xóa thông báo sau khi hiển thị
        }
        ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required />
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" class="form-control" id="password" name="password" required />
            </div>
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
