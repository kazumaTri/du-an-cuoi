<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Phần tử HTML</title>
    <!-- Link to Bootstrap CSS -->
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      .highlight {
        background-color: #f0f8ff;
        padding: 10px;
        border-radius: 5px;
      }
      .note {
        background-color: #ffffe0;
        padding: 10px;
        border-radius: 5px;
      }
      .back-button {
        position: absolute;
        top: 20px;
        left: 20px;
      }
    </style>
  </head>
  <body>
    <div class="container mt-5">
      <h1 class="text-primary">Phần tử HTML là gì?</h1>
      <p>
        Một phần tử HTML được xác định bởi một thẻ bắt đầu, một số nội dung và
        một thẻ kết thúc:
      </p>
      <div class="highlight">
        <code>&lt;tagname&gt; Nội dung ở đây ... &lt;/tagname&gt;</code>
      </div>
      <h3 class="mt-4">
        Phần tử HTML bao gồm mọi thứ từ thẻ bắt đầu đến thẻ kết thúc:
      </h3>
      <div class="highlight">
        <p>&lt;h1&gt; Tiêu đề đầu tiên của tôi &lt;/h1&gt;</p>
        <p>&lt;p&gt; Đoạn văn đầu tiên của tôi. &lt;/p&gt;</p>
      </div>
      <table class="table table-bordered mt-4">
        <thead class="thead-light">
          <tr>
            <th>Start tag</th>
            <th>Element content</th>
            <th>End tag</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>&lt;h1&gt;</td>
            <td>My First Heading</td>
            <td>&lt;/h1&gt;</td>
          </tr>
          <tr>
            <td>&lt;p&gt;</td>
            <td>My first paragraph.</td>
            <td>&lt;/p&gt;</td>
          </tr>
          <tr>
            <td>&lt;br&gt;</td>
            <td>none</td>
            <td>none</td>
          </tr>
        </tbody>
      </table>
      <div class="note mt-4">
        <strong>Lưu ý:</strong> Một số phần tử HTML không có nội dung (như phần
        tử &lt;br&gt;). Những phần tử này được gọi là phần tử rỗng. Phần tử rỗng
        không có thẻ kết thúc!
      </div>
    </div>

    <!-- Nút quay lại -->
    <div class="container text-start back-button">
      <a href="./What_is_HTML.html" class="btn btn-secondary btn-lg">
        <i class="fas fa-arrow-left"></i> Quay lại
      </a>
    </div>

    <!-- Nút tiếp theo -->
    <div class="container text-end mt-4">
      <a href="Element.html" class="btn btn-success btn-lg" id="nextButton">
        <i class="fas fa-arrow-right"></i> Trang tiếp theo
      </a>
    </div>

    <!-- Optional: include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    </script>
  </body>
</html>
