// function searchLessons() {
//   const input = document.getElementById("searchInput").value.toLowerCase();
//   const sections = document.querySelectorAll("section");

//   sections.forEach((section) => {
//     const title = section
//       .querySelector(".card-title")
//       .textContent.toLowerCase();
//     if (title.includes(input)) {
//       section.style.display = "block";
//     } else {
//       section.style.display = "none";
//     }
//   });
// }

// // Kiểm tra trạng thái đăng nhập từ localStorage
// const isLoggedIn = localStorage.getItem("isLoggedIn") === "true";

// // Hiện hoặc ẩn menu người dùng dựa trên trạng thái đăng nhập
// if (isLoggedIn) {
//   document.getElementById("userMenu").style.display = "block";
// } else {
//   document.getElementById("userMenu").style.display = "none";
// }

// // Hàm đăng xuất
// function logout() {
//   localStorage.setItem("isLoggedIn", "false");
//   location.reload(); // Tải lại trang để cập nhật giao diện
// }
