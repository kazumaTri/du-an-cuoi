<?php
session_start();

// Kết nối cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'hoc_lap_trinh');

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý bình luận
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['ma_nguoi_dung']) && isset($_POST['ma_bai_hoc']) && isset($_POST['noidung'])) {
        $ma_nguoi_dung = $_SESSION['ma_nguoi_dung'];
        $ma_bai_hoc = $_POST['ma_bai_hoc'];
        $noi_dung = $_POST['noidung'];

        // Chèn bình luận vào cơ sở dữ liệu
        $sql = "INSERT INTO Binh_Luan (Ma_nguoi_dung, Ma_bai_hoc, Noi_dung, Ngay_binh_luan) VALUES (?, ?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iis", $ma_nguoi_dung, $ma_bai_hoc, $noi_dung);

        if ($stmt->execute()) {
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Lỗi: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "<p class='text-danger'>Vui lòng đăng nhập để bình luận.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/HTML.css" />
    <title>HTML</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img src="../img/logo.jpg" alt="Logo" width="40" height="40" class="d-inline-block align-top me-2" />
          Học Lập Trình
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="#">Hướng Dẫn</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Bài Tập</a></li>
            <li class="nav-item"><a class="nav-link" href="register.html">Đăng Ký</a></li>
            <?php if (isset($_SESSION['email'])): ?>
              <li class="nav-item"><a class="nav-link" href="#"><?php echo htmlspecialchars($_SESSION['email']); ?></a></li>
              <li class="nav-item"><a class="nav-link" href="logout.php">Đăng Xuất</a></li>
            <?php else: ?>
              <li class="nav-item"><a class="nav-link" href="login.php">Đăng Nhập</a></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>

    <header class="bg-light py-5 shadow-sm">
      <div class="container text-center">
        <h1 class="display-3 mb-3 text-primary">Chào Mừng đến với HTML</h1>
        <p class="lead mb-4">Khám phá các bài học và bài tập lập trình mới nhất</p>
      </div>
    </header>

    <div class="container mt-4">
      <div class="row">
        <div class="col-md-4 d-flex flex-column mb-3">
          <div class="btn-group-vertical mb-3">
            <a href="HTML.php" class="btn btn-outline-primary mb-2">HTML</a>
            <a href="CSS.php" class="btn btn-outline-primary mb-2">CSS</a>
          </div>
        </div>

        <div class="col-md-8 mb-3">
          <div class="input-group mt-4">
            <input type="text" id="searchInput" class="form-control" placeholder="Tìm kiếm bài học..." onkeyup="searchLessons()" />
            <button class="btn btn-warning" type="button" onclick="searchLessons()">Tìm Kiếm</button>
          </div>
          <div id="searchResults" class="mt-2"></div>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-md-4 mb-4">
          <div class="card shadow-sm">
            <img src="../img/HTML.jpg" class="card-img-top" alt="Bài Học HTML" />
            <div class="card-body">
              <h5 class="card-title">Bài Học HTML</h5>
              <p class="card-text">Tìm hiểu về cấu trúc của các trang web với HTML.</p>
              <a href="HTML_Introduction.html" class="btn btn-primary">Xem chi tiết</a>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-4">
          <div class="card shadow-sm">
            <img src="../img/HTML.jpg" class="card-img-top" alt="Bài Học CSS" />
            <div class="card-body">
              <h5 class="card-title">Bài Học CSS</h5>
              <p class="card-text">Khám phá các kỹ thuật CSS để tạo kiểu cho trang.</p>
              <a href="CSS.php" class="btn btn-primary">Xem chi tiết</a>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-4">
          <div class="card shadow-sm">
            <img src="../img/HTML.jpg" class="card-img-top" alt="Bài Học Bootstrap" />
            <div class="card-body">
              <h5 class="card-title">Bài Học Bootstrap</h5>
              <p class="card-text">Học cách sử dụng Bootstrap để thiết kế trang.</p>
              <a href="Bootstrap.php" class="btn btn-primary">Xem chi tiết</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-4">
        <h3>Bình luận</h3>
        <form action="" method="POST">
            <div class="mb-3">
                <textarea class="form-control" name="noidung" rows="3" placeholder="Nhập bình luận của bạn..." required></textarea>
            </div>
            <input type="hidden" name="ma_bai_hoc" value="1"> <!-- Thay đổi giá trị này theo bài học HTML -->
            <button type="submit" class="btn btn-primary">Gửi Bình Luận</button>
        </form>
    </div>

    <div class="container mt-4">
        <h4>Các Bình Luận:</h4>
        <div id="comments-section">
            <?php
            // Hiển thị bình luận
            $ma_bai_hoc = 1; // Thay đổi giá trị này theo bài học HTML
            $sql = "SELECT * FROM Binh_Luan WHERE Ma_bai_hoc = ? ORDER BY Ngay_binh_luan DESC";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $ma_bai_hoc);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='border p-2 mb-2'>";
                    echo "<strong>" . htmlspecialchars($row['Ma_nguoi_dung']) . "</strong>: " . htmlspecialchars($row['Noi_dung']);
                    echo "<br><small class='text-muted'>" . $row['Ngay_binh_luan'] . "</small>";
                    echo "</div>";
                }
            } else {
                echo "<p>Chưa có bình luận nào.</p>";
            }

            $stmt->close();
            $conn->close();
            ?>
        </div>
    </div>

    <footer class="bg-dark text-light text-center py-4 mt-5">
        <p class="mb-0">&copy; 2024 Học Lập Trình. All rights reserved.</p>
    </footer>

    <script>
const danhSachBaiHoc = [
    { ten: "HTML", link: "HTML.php" },
    { ten: "CSS", link: "CSS.php" },
    {ten: "Bài Học HTML", link:"HTML_Introduction.php"}
    // Thêm các bài học khác ở đây
];

function searchLessons() {
    const input = document.getElementById("searchInput").value.toLowerCase();
    const resultsContainer = document.getElementById("searchResults");

    // Nếu ô tìm kiếm trống, ẩn kết quả
    if (!input) {
        resultsContainer.innerHTML = ""; // Xóa kết quả cũ
        return;
    }

    const results = danhSachBaiHoc.filter(baiHoc =>
        baiHoc.ten.toLowerCase().includes(input)
    );

    resultsContainer.innerHTML = ""; // Xóa kết quả cũ

    if (results.length > 0) {
        results.forEach(baiHoc => {
            const link = document.createElement("a");
            link.href = baiHoc.link;
            link.className = "d-block text-decoration-none text-dark border p-2 my-1 rounded";
            link.textContent = baiHoc.ten;
            resultsContainer.appendChild(link);
        });
    } else {
        resultsContainer.innerHTML = "<p>Không tìm thấy bài học nào.</p>";
    }
}
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
