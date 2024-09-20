<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../css/main.css" />
    <title>Học Lập Trình</title>
</head>
<body>
    <?php session_start(); ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="../img/logo.jpg" alt="Logo" width="30" height="30" class="d-inline-block align-top me-2" />
                Học Lập Trình
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Hướng Dẫn</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Bài Tập</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Đăng Ký</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Đăng Nhập</a></li>
                    <li class="nav-item dropdown" id="userMenu" style="display: block">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../img/nguoi.jpg" alt="User" class="rounded-circle" width="25" height="25" />
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <?php if (isset($_SESSION['email'])): ?>
                                <li>
                                    <a class="dropdown-item" href="#"><?php echo htmlspecialchars($_SESSION['email']); ?></a>
                                </li>
                                <li><a class="dropdown-item" href="#">Xem Hồ Sơ</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="setting.php">Cài Đặt Người Dùng</a></li>
                                <li><a class="dropdown-item" href="logout.php" onclick="hideUserMenu()">Đăng Xuất</a></li>
                            <?php else: ?>
                                <li><a class="dropdown-item" href="login.php">Đăng Nhập</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="jumbotron text-center p-5 rounded-3">
        <video autoplay muted loop class="w-100 rounded-3">
            <source src="../video/183107-870151708.mp4" type="video/mp4" />
            Trình duyệt của bạn không hỗ trợ thẻ video.
        </video>
        <div class="container">
            <h1 class="display-4 text-white">Học Lập Trình</h1>
            <p class="lead text-light">Với một website cho người mới bắt đầu</p>
            <div class="input-group search-bar mx-auto">
                <input type="text" id="searchInput" class="form-control" placeholder="Tìm kiếm bài học..." onkeyup="searchLessons()" />
                <button class="btn btn-warning" type="button">Tìm Kiếm</button>
            </div>
            <div id="searchResults" class="mt-4"></div>
            <p class="mt-4 text-light">Không Biết Bắt Đầu Từ Đâu?</p>
        </div>
    </header>

    <div class="container mt-4 text-center">
        <div class="row">
            <div class="col-md-6 mb-3">
                <a href="#html-section" class="btn btn-dark w-100">HTML</a>
            </div>
            <div class="col-md-6 mb-3">
                <a href="#css-section" class="btn btn-dark w-100">CSS</a>
            </div>
        </div>
    </div>

    <section class="container mt-5" id="html-section">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h1 class="card-title">HTML</h1>
                        <p class="card-text">Ngôn ngữ để xây dựng trang web</p>
                        <div class="mt-4">
                            <a href="HTML.php" class="btn btn-primary mb-2">Học HTML</a>
                            <button class="btn btn-secondary mb-2">Video hướng dẫn</button>
                        </div>
                        <hr />
                        <div class="mt-3">
                            <h5>Ví dụ HTML</h5>
                            <pre class="code-example"><code>&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
  &lt;title&gt;HTML Tutorial&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
  &lt;h1&gt;This is a heading&lt;/h1&gt;
  &lt;p&gt;This is a paragraph.&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
                        </div>
                        <p class="mt-3">Hãy tự mình thử nhé</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container mt-5" id="css-section">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h1 class="card-title">CSS</h1>
                        <p class="card-text">Ngôn ngữ để tạo kiểu cho các trang web</p>
                        <div class="mt-4">
                            <a href="CSS.php" class="btn btn-success mb-2">Học CSS</a>
                        </div>
                        <hr />
                        <h5>Ví dụ CSS</h5>
                        <p>Xem ví dụ trực tiếp ở trên</p>
                        <pre class="code-example">
body {
  background-color: lightblue;
  color: white;
  text-align: center;
  font-family: verdana;
}</pre>
                        <p class="mt-3">Hãy tự mình thử nhé</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-light text-center py-4 mt-5">
        <p class="mb-0">&copy; 2024 Học Lập Trình. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
    function hideUserMenu() {
        // Ẩn menu người dùng
        document.getElementById('userMenu').style.display = 'none';
    }

    const danhSachBaiHoc = [
        { ten: "HTML", link: "HTML.php" },
        { ten: "CSS", link: "CSS.php" },
        
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
                link.className = "d-block text-decoration-none text-dark";
                link.textContent = baiHoc.ten;
                resultsContainer.appendChild(link);
            });
        } else {
            resultsContainer.innerHTML = "<p>Không tìm thấy bài học nào.</p>";
        }
    }
    </script>

</body>
</html>
