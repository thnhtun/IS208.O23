<?php
include "connect.php";

if (isset($_GET['username'])) {
    $username = $_GET['username'];

    $query = "SELECT avatar FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $avatar = $row['avatar'];

        if ($avatar) {
            header("Content-Type: image/jpeg");
            echo $avatar;
        } else {
            // Nếu không có avatar trong database, hiển thị ảnh mặc định
            header("Content-Type: image/jpeg");
            readfile('path/to/default-avatar.jpg');
        }
    } else {
        // Nếu không tìm thấy user, hiển thị ảnh mặc định
        header("Content-Type: image/jpeg");
        readfile('path/to/default-avatar.jpg');
    }
} else {
    // Nếu không có username trong query string, hiển thị ảnh mặc định
    header("Content-Type: image/jpeg");
    readfile('path/to/default-avatar.jpg');
}
?>
