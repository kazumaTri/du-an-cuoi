<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Giới thiệu HTML</title>
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      .custom-title {
        margin-bottom: 2rem;
      }
      .progress-circle {
        position: relative;
        width: 100px;
        height: 100px;
      }
      .progress-circle svg {
        position: absolute;
        top: 0;
        left: 0;
      }
      .progress-circle .progress-circle-label-container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
      }
      .accordion-button:focus {
        box-shadow: none;
      }
      .lecture-list-item {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
      }
      .lecture-icon {
        width: 32px;
        height: 32px;
        background-color: #f0f0f0;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        font-size: 18px;
        color: #555;
      }
      .lecture-title {
        flex: 1;
        text-align: left;
      }
      /* Styles for the left sidebar */
      .sidebar {
        position: fixed;
        top: 56px; /* Height of the navbar */
        left: 0;
        width: 200px;
        height: 100%;
        background-color: #f8f9fa;
        padding: 10px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
      }
      .sidebar h5 {
        margin-bottom: 1rem;
      }
      .sidebar a {
        display: block;
        padding: 10px;
        color: #333;
        text-decoration: none;
      }
      .sidebar a:hover {
        background-color: #e9ecef;
      }
    </style>
  </head>
  <body>
    <!-- Navbar and Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
      <div class="container">
        <a class="navbar-brand" href="index.html">
          <img
            src="..//img/logo.jpg"
            alt="Logo"
            width="40"
            height="40"
            class="d-inline-block align-top me-2"
          />
          Học Lập Trình
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="#">Hướng Dẫn</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Bài Tập</a></li>
            <li class="nav-item">
              <a class="nav-link" href="register.html">Đăng Ký</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.html">Đăng Nhập</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="sidebar">
      <h5>BÀI HỌC</h5>
      <a href="HTML.html">HTML</a>
      <a href="CSS.html">CSS</a>
    </div>

    <header
      class="bg-primary text-white text-center py-5"
      style="margin-left: 220px"
    >
      <div class="container">
        <h1 class="display-4 custom-title">Giới thiệu CSS</h1>
      </div>
    </header>

    <div class="container mt-5" style="margin-left: 220px">
      <div class="content-section">
        <h2 class="mb-4">css</h2>
        <p>
          In this learning path, you will understand the basics of building an
          app in Mendix Studio Pro. Specifically, you will create an app using
          the Task &amp; Planning app template, and then extend that app in
          Mendix Studio Pro. In more detail, you will create an app that a
          business can use to display whether or not they are working within
          their Service Level Agreement. Additionally, you will extend the
          existing functionality to allow your users to assign tasks to the
          responsible department.
        </p>
      </div>
    </div>

    <div class="container mt-4 mb-4" style="margin-left: 220px">
      <div class="d-flex flex-column align-items-center">
        <button
          type="button"
          class="btn btn-primary btn-lg"
          id="continueButton"
        >
          Continue Path
        </button>
      </div>
    </div>

    <div class="container my-5" style="margin-left: 220px">
      <div class="accordion" id="accordionExample">
        <div class="container mt-4">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Mô-đun</th>
                <th>Bài giảng</th>
                <th>Khoảng thời gian</th>
                <th>Tiến triển</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  1. css là gì?
                  <button
                    class="btn btn-link p-0 float-right"
                    type="button"
                    data-toggle="collapse"
                    data-target="#collapseIntroduction"
                    aria-expanded="false"
                    aria-controls="collapseIntroduction"
                  >
                    <i class="fas fa-chevron-down"></i>
                  </button>
                </td>
                <td>3 lectures</td>
                <td>10 mins</td>
                <td>
                  <div class="progress" style="width: 150px">
                    <div
                      class="progress-bar bg-success"
                      id="progress1"
                      style="width: 0%"
                    >
                      0%
                    </div>
                  </div>
                </td>
              </tr>
              <tr class="collapse" id="collapseIntroduction">
                <td colspan="4">
                  <div class="list-group">
                    <div class="lecture-list-item">
                      <div class="lecture-icon">
                        <i class="fas fa-book"></i>
                      </div>
                      <div class="lecture-title">
                        <a href="What_is_HTML.html" class="btn btn-link p-0"
                          >css là gì?</a
                        >
                      </div>
                    </div>
                    <div class="lecture-list-item">
                      <div class="lecture-icon">
                        <i class="fas fa-book"></i>
                      </div>
                      <div class="lecture-title">
                        <a href="Element.html" class="btn btn-link p-0">
                          Phần tử css là gì?
                        </a>
                      </div>
                    </div>
                    <div class="lecture-list-item">
                      <div class="lecture-icon">
                        <i class="fas fa-book"></i>
                      </div>
                      <div class="lecture-title">
                        <button
                          type="button"
                          class="btn btn-link p-0"
                          onclick="updateProgress(1)"
                        >
                          1.3 Use Case
                        </button>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  2. Create an App
                  <button
                    class="btn btn-link p-0 float-right"
                    type="button"
                    data-toggle="collapse"
                    data-target="#collapseCreateApp"
                    aria-expanded="false"
                    aria-controls="collapseCreateApp"
                  >
                    <i class="fas fa-chevron-down"></i>
                  </button>
                </td>
                <td>7 lectures</td>
                <td>30 mins</td>
                <td>
                  <div class="progress" style="width: 150px">
                    <div
                      class="progress-bar bg-success"
                      id="progress2"
                      style="width: 0%"
                    >
                      0%
                    </div>
                  </div>
                </td>
              </tr>
              <tr class="collapse" id="collapseCreateApp">
                <td colspan="4">
                  <!-- Add detailed content here for "Create an App" -->
                </td>
              </tr>
              <tr>
                <td>
                  3. Display Data
                  <button
                    class="btn btn-link p-0 float-right"
                    type="button"
                    data-toggle="collapse"
                    data-target="#collapseDisplayData"
                    aria-expanded="false"
                    aria-controls="collapseDisplayData"
                  >
                    <i class="fas fa-chevron-down"></i>
                  </button>
                </td>
                <td>13 lectures</td>
                <td>60 mins</td>
                <td>
                  <div class="progress" style="width: 150px">
                    <div
                      class="progress-bar bg-warning"
                      id="progress3"
                      style="width: 0%"
                    >
                      0%
                    </div>
                  </div>
                </td>
              </tr>
              <tr class="collapse" id="collapseDisplayData">
                <td colspan="4">
                  <!-- Add detailed content here for "Display Data" -->
                </td>
              </tr>
              <tr>
                <td>
                  4. Add Custom Logic
                  <button
                    class="btn btn-link p-0 float-right"
                    type="button"
                    data-toggle="collapse"
                    data-target="#collapseAddLogic"
                    aria-expanded="false"
                    aria-controls="collapseAddLogic"
                  >
                    <i class="fas fa-chevron-down"></i>
                  </button>
                </td>
                <td>7 lectures</td>
                <td>60 mins</td>
                <td>
                  <div class="progress" style="width: 150px">
                    <div
                      class="progress-bar bg-danger"
                      id="progress4"
                      style="width: 0%"
                    >
                      0%
                    </div>
                  </div>
                </td>
              </tr>
              <tr class="collapse" id="collapseAddLogic">
                <td colspan="4">
                  <!-- Add detailed content here for "Add Custom Logic" -->
                </td>
              </tr>
              <tr>
                <td>
                  5. Filter Data
                  <button
                    class="btn btn-link p-0 float-right"
                    type="button"
                    data-toggle="collapse"
                    data-target="#collapseFilterData"
                    aria-expanded="false"
                    aria-controls="collapseFilterData"
                  >
                    <i class="fas fa-chevron-down"></i>
                  </button>
                </td>
                <td>6 lectures</td>
                <td>30 mins</td>
                <td>
                  <div class="progress" style="width: 150px">
                    <div
                      class="progress-bar bg-danger"
                      id="progress5"
                      style="width: 0%"
                    >
                      0%
                    </div>
                  </div>
                </td>
              </tr>
              <tr class="collapse" id="collapseFilterData">
                <td colspan="4">
                  <!-- Add detailed content here for "Filter Data" -->
                </td>
              </tr>
              <tr>
                <td>
                  6. Conclusion
                  <button
                    class="btn btn-link p-0 float-right"
                    type="button"
                    data-toggle="collapse"
                    data-target="#collapseConclusion"
                    aria-expanded="false"
                    aria-controls="collapseConclusion"
                  >
                    <i class="fas fa-chevron-down"></i>
                  </button>
                </td>
                <td>3 lectures</td>
                <td>10 mins</td>
                <td>
                  <div class="progress" style="width: 150px">
                    <div
                      class="progress-bar bg-danger"
                      id="progress6"
                      style="width: 0%"
                    >
                      0%
                    </div>
                  </div>
                </td>
              </tr>
              <tr class="collapse" id="collapseConclusion">
                <td colspan="4">
                  <!-- Add detailed content here for "Conclusion" -->
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

    <script>
      // Lấy tiến độ từ localStorage
      const completedLectures = JSON.parse(
        localStorage.getItem("completedLectures")
      ) || [0, 0, 0, 0, 0, 0];
      const totalLectures = [3, 7, 13, 7, 6, 3]; // Tổng số bài giảng cho từng mô-đun

      completedLectures.forEach((completed, index) => {
        const progressBar = document.getElementById(`progress${index + 1}`);
        const percentage = (completed / totalLectures[index]) * 100;
        progressBar.style.width = percentage + "%";
        progressBar.innerText = Math.round(percentage) + "%";
      });
    </script>
  </body>
</html>
