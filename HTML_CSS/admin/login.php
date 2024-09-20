<?php
session_start();
$error = ""; // Khởi tạo biến lỗi

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
    $stmt = $pdo->prepare("SELECT Mat_khau, Vai_tro FROM Nguoi_dung WHERE Email = :email");
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

            // Chuyển hướng đến trang admin nếu là admin, hoặc trang khác nếu là user
            if ($user['Vai_tro'] == 1) { // 1 cho admin
                header("Location: admin.php");
                exit();
            } else {
                header("Location: HTML_CSS/index.php"); // Trang dashboard cho user
                exit();
            }
        } else {
            $error = "Sai mật khẩu.";
        }
    } else {
        $error = "Email không tồn tại.";
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
    
    <div class="container mt-5">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="tên@example.com" required />
                <label for="floatingInput">Địa chỉ email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Mật khẩu" required />
                <label for="floatingPassword">Mật khẩu</label>
            </div>
            <button class="btn btn-primary btn-lg w-100" type="submit">Đăng nhập</button>
            <?php
            if (!empty($error)) {
                echo '<div class="alert alert-danger mt-3">' . htmlspecialchars($error) . '</div>';
            }
            ?>
        </form>
        <div class="mt-3 text-center">
            <a href="register_admin.php" class="btn btn-secondary">Đăng ký Admin</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
