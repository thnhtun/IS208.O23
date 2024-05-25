<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Đăng nhập vào trang</title>
    <link rel="icon" href="pics/logo5.jpg" type="image/x-icon">
    <style>
        body {
    font-family: 'Montserrat', sans-serif;
    font-size: 25px;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    width: 1000px;
    height: 400px;
}

.login-container h2 {
    margin-top: 0;
    font-family: 'Montserrat', sans-serif;
    font-size: 30px;
    text-align: center;
}

.login-form input[type="text"],
.login-form input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-family: 'Montserrat', sans-serif;
    font-size: 20px;
}

.login-form button {
    font-family: 'Montserrat', sans-serif;
    font-size: 20px;
    width: 100%;
    background-color: #084e94;
    color: #fff;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.login-form button:hover {
    background-color: #45a049;
}

.login-form-forgotpassword {
    text-align: right;
    font-family: 'Montserrat', sans-serif;
    font-size: 20px;
}

.login-form-forgotpassword a {
    color: #666;
    text-decoration: none;
}

.login-form-forgotpassword a:hover {
    color: #000;
}
.error-message {
    font-family: 'Montserrat', sans-serif;
    color: red;
    margin-bottom: 10px;
    display: none;
}
    </style>
</head>
<body>
<div class="login-container">
    <h2>Công ty cổ phần Sản xuất - Thương mại ABC</h2>
    <form class="login-form" id="login-form" action="login_process.php" method="post">
        <div class="error-message" id="error-message">Sai tên tài khoản hoặc mật khẩu!</div>
        <div class="login-form-username">
            <label for="username" class="sr-only">Tên tài khoản</label>
            <input type="text" name="username" id="username" placeholder="Tên tài khoản" required>
        </div>
        <div class="login-form-password">
            <label for="password" class="sr-only">Mật khẩu</label>
            <input type="password" name="password" id="password" placeholder="Mật khẩu" required>
        </div>
        <div class="login-form-submit">
            <button type="submit">Đăng nhập</button>
        </div>
        <div class="login-form-forgotpassword">
            <a href="forgotpassword.php">Quên mật khẩu?</a>
        </div>
    </form>
</div> 
</body>
</html>
