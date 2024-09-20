<?php
session_start();

// Kiểm tra nếu người dùng đã đăng nhập và có quyền admin không
if (!isset($_SESSION['email']) || $_SESSION['role'] != 1) {
    header("Location: ../login.php");
    exit();
}

// Kết nối cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'hoc_lap_trinh');

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý xóa người dùng
if (isset($_GET['delete'])) {
    $ma_nguoi_dung = $_GET['delete'];

    // Xóa bình luận liên quan đến người dùng
    $sqlDeleteComments = "DELETE FROM binh_luan WHERE Ma_nguoi_dung = ?";
    $stmtComments = $conn->prepare($sqlDeleteComments);
    if ($stmtComments) {
        $stmtComments->bind_param("i", $ma_nguoi_dung);
        $stmtComments->execute();
        $stmtComments->close();
    }

    // Xóa người dùng
    $sqlDeleteUser = "DELETE FROM nguoi_dung WHERE Ma_nguoi_dung = ?";
    $stmtUser = $conn->prepare($sqlDeleteUser);
    
    if ($stmtUser) { // Kiểm tra xem câu lệnh đã được chuẩn bị thành công không
        $stmtUser->bind_param("i", $ma_nguoi_dung);
        if ($stmtUser->execute()) {
            echo "<script>alert('Xóa người dùng thành công!');</script>";
        } else {
            echo "<script>alert('Lỗi khi xóa người dùng: " . $stmtUser->error . "');</script>";
        }
        $stmtUser->close();
    } else {
        echo "<script>alert('Lỗi chuẩn bị câu lệnh: " . $conn->error . "');</script>";
    }
}

// Lấy danh sách người dùng
$sql = "SELECT Ma_nguoi_dung, email, vai_tro FROM nguoi_dung"; // Thay 'role' thành 'vai_tro'
$result = $conn->query($sql);

// Kiểm tra xem truy vấn có thành công không
if (!$result) {
    die("Lỗi truy vấn: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <title>Quản Lý Người Dùng</title>
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
        <h2>Quản Lý Người Dùng</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Vai Trò</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['Ma_nguoi_dung']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['vai_tro'] == 1 ? 'Admin' : 'Người dùng'); ?></td>
                            <td>
                                <a href="edit_user.php?id=<?php echo $row['Ma_nguoi_dung']; ?>" class="btn btn-warning btn-sm">Chỉnh sửa</a>
                                <a href="?delete=<?php echo $row['Ma_nguoi_dung']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?');">Xóa</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Không có người dùng nào.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
