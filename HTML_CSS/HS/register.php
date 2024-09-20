<?php
session_start();

// Xử lý khi form được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username']; // Tên người dùng
    $email = $_POST['email'];
    $plainPassword = $_POST['password'];
    $role = 0; // Đặt vai trò là người dùng

    // Thay đổi thông tin dưới đây theo cấu hình cơ sở dữ liệu của bạn
    $servername = "localhost";
    $usernameDB = "root"; // Thay đổi với tên người dùng của bạn
    $passwordDB = ""; // Thay đổi với mật khẩu của bạn
    $dbname = "hoc_lap_trinh"; // Tên cơ sở dữ liệu

    // Kết nối cơ sở dữ liệu
    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Kiểm tra xem email đã tồn tại chưa
    $stmt = $conn->prepare("SELECT COUNT(*) FROM Nguoi_dung WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($emailCount);
    $stmt->fetch();
    $stmt->close();

    if ($emailCount > 0) {
        $error = "Email đã được sử dụng!";
    } else {
        // Mã hóa mật khẩu
        $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

        // Thêm người dùng vào cơ sở dữ liệu
        $stmt = $conn->prepare("INSERT INTO Nguoi_dung (Ten_nguoi_dung, Email, Mat_khau, Vai_tro) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $username, $email, $hashedPassword, $role); // Vai trò cố định là người dùng

        if ($stmt->execute()) {
            // Chuyển hướng đến trang index sau khi đăng ký thành công
            header("Location: index.php");
            exit();
        } else {
            $error = "Đăng ký thất bại!";
        }
        $stmt->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <title>ĐĂNG KÝ NGƯỜI DÙNG</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../img/logo.jpg" alt="biểu tượng" width="30" height="24" />
            </a>
            <h1 class="navbar-text ms-3">ĐĂNG KÝ NGƯỜI DÙNG</h1>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="mb-4">Đăng ký tài khoản mới</h2>
        <form action="" method="POST">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="Tên người dùng" required />
                <label for="username">Tên người dùng</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="tên@example.com" required />
                <label for="floatingInput">Địa chỉ email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Mật khẩu" required />
                <label for="floatingPassword">Mật khẩu</label>
            </div>
            <button class="btn btn-primary btn-lg w-100" type="submit">Đăng ký</button>
            <?php
            if (!empty($error)) {
                echo '<div class="alert alert-danger mt-3">' . htmlspecialchars($error) . '</div>';
            }
            ?>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
