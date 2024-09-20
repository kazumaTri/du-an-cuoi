<?php
header('Content-Type: application/json');

// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root"; // Tên người dùng DB
$password = ""; // Mật khẩu DB
$dbname = "hoc_lap_trinh"; // Tên cơ sở dữ liệu

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die(json_encode(["message" => "Kết nối thất bại: " . $conn->connect_error]));
}

// Lấy dữ liệu JSON từ yêu cầu
$data = json_decode(file_get_contents("php://input"), true);
$username = $data['username'];
$newPassword = $data['newPassword'];

// Bảo mật mật khẩu trước khi lưu
$newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);

// Cập nhật mật khẩu trong cơ sở dữ liệu
$stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = ?");
$stmt->bind_param("ss", $newPasswordHash, $username);

if ($stmt->execute()) {
    echo json_encode(["message" => "Mật khẩu đã được thay đổi thành công."]);
} else {
    echo json_encode(["message" => "Có lỗi xảy ra khi thay đổi mật khẩu."]);
}

$stmt->close();
$conn->close();
?>
