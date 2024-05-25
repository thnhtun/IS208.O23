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
    <title>Yêu cầu cấp lại mật khẩu</title>
    <style>
        body {
            font-family: 'Lora', sans-serif;
            font-size: 25px;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .reset-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: fit-content;
        }

        .reset-container h2 {
            font-family: 'Lora', sans-serif;
            margin-top: 0;
            font-size: 30px;
            text-align: center;
        }

        .reset-form input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-family: 'Lora',sans-serif;
            font-size: 20px;
        }

        .reset-form button {
            width: 100%;
            background-color: #084e94;
            color: #fff;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: 'Lora',sans-serif;
            font-size: 20px;
        }

        .reset-form button:hover {
            background-color: #45a049;
        }

        .message {
            margin-top: 10px;
            text-align: center;
            font-size: 14px;
        }

        .message.success {
            color: green;
        }

        .message.error {
            color: red;
        }
    </style>
</head>
<body>

<div class="reset-container">
    <h2>Yêu cầu cấp lại mật khẩu</h2>
    <form class="reset-form" id="reset-form">
        <input type="email" name="email" id="email" placeholder="Nhập email liên kết với tài khoản" required>
        <button type="submit">Gửi yêu cầu</button>
        <div class="message" id="message"></div>
    </form>
</div>
<script src="https://cdn.emailjs.com/dist/email.min.js"></script>
<script>
    function generateRandomPassword() {
        const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        let password = '';
        for (let i = 0; i < 6; i++) {
            password += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        return password;
    }

    document.getElementById('reset-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const email = document.getElementById('email').value;
    const newPassword = generateRandomPassword();

    // Sử dụng EmailJS để gửi email (https://www.emailjs.com/)
    emailjs.init("MGWyp0cNOdnky4kKh");  // Thay thế bằng EmailJS user ID của bạn

    emailjs.send("service_u9evbgq", "template_dstfonx", {
        to_email: email,
        new_password: newPassword
    })
    .then(function(response) {
        document.getElementById('message').textContent = 'Mật khẩu mới đã được gửi đến email của bạn.';
        document.getElementById('message').className = 'message success';

        // Sau khi gửi email thành công, gọi API để cập nhật mật khẩu trong cơ sở dữ liệu
        fetch('reset_password.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                email: email,
                new_password: newPassword
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Cập nhật mật khẩu thành công');
            } else {
                console.error('Cập nhật mật khẩu thất bại: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Lỗi kết nối: ', error);
        });
    }, function(error) {
        console.error('EmailJS error:', error);
        document.getElementById('message').textContent = 'Đã xảy ra lỗi khi gửi email. Vui lòng thử lại.';
        document.getElementById('message').className = 'message error';
    });
});
</script>
</body>
</html>