<?php
session_start();

// Xóa tất cả các biến phiên
session_unset();

// Hủy phiên làm việc
session_destroy();

// Chuyển hướng về trang đăng nhập
header("Location: login.php");
exit();
?>
