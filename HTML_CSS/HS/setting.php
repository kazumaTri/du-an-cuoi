<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      crossorigin="anonymous"
    />
    <style>
      body {
        background-color: #f4f4f9;
      }
      .sidebar {
        position: fixed;
        top: 56px;
        left: 0;
        width: 250px;
        height: 100%;
        background-color: #fff;
        border-right: 1px solid #ccc;
        padding: 20px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
      }
      .sidebar h6 {
        font-weight: bold;
      }
      .sidebar a {
        display: block;
        margin: 10px 0;
        color: #000;
        text-decoration: none;
        padding: 5px;
        border-radius: 4px;
      }
      .sidebar a:hover {
        background-color: #e9ecef;
      }
      .content {
        margin-left: 270px;
        padding: 20px;
      }
    </style>
    <title>Cài Đặt Người Dùng</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img src="../img/logo.jpg" alt="Logo" width="25" /> Học Lập Trình
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="#">Hướng Dẫn</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Bài Tập</a></li>
            <li class="nav-item">
              <a class="nav-link" href="register.html">Đăng Ký</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.html">Đăng Nhập</a>
            </li>
            <li class="nav-item dropdown" id="userMenu" style="display: none">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="userDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <img
                  src="../img/nguoi.png"
                  alt="User"
                  class="rounded-circle"
                  width="25"
                  height="25"
                />
              </a>
              <ul
                class="dropdown-menu dropdown-menu-end"
                aria-labelledby="userDropdown"
              >
                <li>
                  <h6 class="dropdown-header" id="userName">trieu huynh</h6>
                </li>
                <li>
                  <a class="dropdown-item" href="#" id="userEmail"
                    >2200007710@nttu.edu.vn</a
                  >
                </li>
                <li><a class="dropdown-item" href="#">See Your Profile</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <a class="dropdown-item" href="setting.html">User Settings</a>
                </li>
                <li><a class="dropdown-item" href="#">Light</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <a
                    class="dropdown-item"
                    href="../admin/change_password.php"
                    onclick="logout()"
                    >Log Out</a
                  >
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="sidebar">
      <h6 id="sidebarName">trieu huynh</h6>
      <p id="sidebarEmail">Nttu.edu</p>
      <h6>Hồ Sơ</h6>
      <a href="#">Tài Khoản</a>
      <a href="#">Thông Báo</a>
      <a href="#">Cài Đặt Nhà Phát Triển</a>
      <a href="#">Dữ Liệu Cá Nhân</a>
    </div>

    <div class="content">
      <h1>Cài Đặt Người Dùng</h1>
      <p>Chỉnh sửa thông tin cá nhân của bạn tại đây.</p>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Thông Tin Cá Nhân</h5>
          <p class="card-text">Bạn có thể cập nhật thông tin của mình ở đây.</p>

          <!-- Password Display Section -->
          <div class="mb-3">
            <label for="username" class="form-label">Tài Khoản</label>
            <input type="text" class="form-control" id="username" readonly />
          </div>
          <div class="mb-3">
            <label for="newPassword" class="form-label">Mật Khẩu Mới</label>
            <div class="input-group">
              <input type="password" class="form-control" id="newPassword" />
              <button
                class="btn btn-outline-secondary"
                type="button"
                id="toggleNewPassword"
              >
                Hiện
              </button>
            </div>
          </div>
          <button class="btn btn-primary" id="changePasswordBtn">
            Thay Đổi Mật Khẩu
          </button>
        </div>
      </div>
    </div>

    <script>
      // Lấy thông tin từ localStorage
      const username = localStorage.getItem("username") || "user@gmail.com";
      document.getElementById("username").value = username;
      document.getElementById("userName").textContent = username;
      document.getElementById("userEmail").textContent = ""; // Thay thế bằng email thực tế nếu cần
      document.getElementById("sidebarName").textContent = username;
      document.getElementById("sidebarEmail").textContent = ""; // Thay thế bằng email thực tế nếu cần

      // Toggle mật khẩu mới
      document
        .getElementById("toggleNewPassword")
        .addEventListener("click", function () {
          const passwordField = document.getElementById("newPassword");
          const passwordFieldType = passwordField.getAttribute("type");
          if (passwordFieldType === "password") {
            passwordField.setAttribute("type", "text");
            this.textContent = "Ẩn";
          } else {
            passwordField.setAttribute("type", "password");
            this.textContent = "Hiện";
          }
        });

      // Thay đổi mật khẩu
      document
        .getElementById("changePasswordBtn")
        .addEventListener("click", function () {
          const newPassword = document.getElementById("newPassword").value;
          if (newPassword) {
            fetch("change_password.php", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
              },
              body: JSON.stringify({
                username: username,
                newPassword: newPassword,
              }),
            })
              .then((response) => response.json())
              .then((data) => {
                alert(data.message);
              })
              .catch((error) => {
                console.error("Error:", error);
              });
          } else {
            alert("Vui lòng nhập mật khẩu mới.");
          }
        });
    </script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
