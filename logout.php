<?php
// Bắt đầu hoặc khôi phục phiên làm việc
session_start();

// Xóa tất cả dữ liệu phiên
session_destroy();

// Chuyển hướng đến trang đăng nhập
header("Location: login.php");
exit;
?>
