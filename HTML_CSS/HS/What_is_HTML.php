<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HTML là gì?</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="container mt-4">
      <p>
        HTML là viết tắt của Hyper Text Markup Language. HTML là ngôn ngữ đánh
        dấu chuẩn để tạo ra các trang Web. HTML mô tả cấu trúc của một trang Web
        và bao gồm một loạt các phần tử. Các thành phần HTML cho trình duyệt
        biết cách hiển thị nội dung. Các phần tử HTML gắn nhãn cho các phần nội
        dung như "đây là tiêu đề", "đây là đoạn văn", "đây là liên kết", v.v.
      </p>
    </div>

    <div class="container text-end mt-4">
      <a href="Element.html" class="btn btn-success btn-lg" id="nextButton">
        <i class="fas fa-arrow-right"></i> Trang tiếp theo
      </a>
    </div>

    <div class="container mt-4 mb-4">
      <div class="d-flex flex-column align-items-center">
        <button
          type="button"
          class="btn btn-danger btn-lg mt-2"
          id="resetButton"
        >
          Reset Progress
        </button>
        <!-- Nút Reset -->
      </div>
    </div>

    <!-- Font Awesome for icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
      // Mảng lưu trữ số lượng bài giảng đã hoàn thành cho từng mô-đun
      const completedLectures = JSON.parse(
        localStorage.getItem("completedLectures")
      ) || [0, 0, 0, 0, 0, 0];
      const totalLectures = [3, 7, 13, 7, 6, 3]; // Tổng số bài giảng cho từng mô-đun

      document
        .getElementById("nextButton")
        .addEventListener("click", function (event) {
          event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết

          // Tăng số lượng bài giảng đã hoàn thành cho mô-đun 1
          completedLectures[0]++;
          localStorage.setItem(
            "completedLectures",
            JSON.stringify(completedLectures)
          );

          // Chuyển hướng đến trang tiếp theo sau một khoảng thời gian
          setTimeout(() => {
            window.location.href = "Element.html"; // Chuyển đến trang tiếp theo
          }, 500); // Thời gian delay 500ms
        });
      document
        .getElementById("resetButton")
        .addEventListener("click", function () {
          localStorage.removeItem("completedLectures"); // Xóa dữ liệu trong localStorage
          location.reload(); // Tải lại trang để cập nhật thanh tiến độ về 0%
        });
    </script>
  </body>
</html>
