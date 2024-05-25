<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Góp ý</title>
    <link rel="icon" href="pics/logo5.jpg" type="image/x-icon">
    <style>
        body {
            font-family: 'Monserrat', sans-serif;
            font-size: 20px;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .header {
            font-family: 'Lora', sans-serif;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 20px;
            background-color: #084e94;
            color: white;
        }

        .header-left {
            display: flex;
            align-items: center;
        }

        .logo {
            height: 50px;
            margin-right: 10px;
        }

        .company-name {
            font-size: 1.5em;
            margin: 0;
        }

        .header-right {
            position: relative;
        }

        .user-info {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .avatar {
            height: 40px;
            width: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .username {
            margin-right: 10px;
        }

        .dropdown-toggle {
            background: none;
            border: none;
            color: white;
            font-size: 1.2em;
            cursor: pointer;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 60px;
            right: 0;
            background-color: white;
            color: black;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .dropdown-menu a {
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            color: black;
        }

        .dropdown-menu a:hover {
            background-color: #f4f4f4;
        }

        .show {
            display: block;
        }

        .main-content {
            display: flex;
            flex-direction: row;
            height: calc(100vh - 50px); /* 50px là chiều cao của header */
        }

        .left-sidebar,
        .right-sidebar {
            flex: 1;
            background-color: #f9f9f9;
        }

        .center-content {
            flex: 3;
            background-color: #f9f9f9;
        }

        .box {
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }

        .box h2 {
            margin-top: 0;
        }

        .schedule-box a {
            text-decoration: none;
            color: #4f9deb;
        }

        .schedule-box a:hover {
            text-decoration: underline;
        }

        .clock {
            font-size: 1.5em;
            text-align: center;
            margin-top: 20px;
        }

        .calendar {
            text-align: center;
            margin-top: 20px;
        }

        .calendar table {
            width: 100%;
            border-collapse: collapse;
        }

        .calendar th, .calendar td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        .calendar th {
            background-color: #4f9deb;
            color: white;
        }

        .calendar .today {
            background-color: #ffeb3b;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            margin-right: 20px; /* Thêm margin cho label */
        }
        input, textarea, select {
            width: calc(100% - 20px); /* Sử dụng calc để tính width của input, textarea, select */
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"], input[type="reset"] {
            width: auto;
            padding: 10px 20px;
            background-color: #4f9deb;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="reset"] {
            background-color: #aaa;
        }
        /* Phần CSS giữ nguyên */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .link {
            text-decoration: none;
        }
    </style>
    
</head>
<body>
    <header class="header">
        <div class="header-left">
            <img src="pics/logo5.jpg" alt="Logo" class="logo">
            <h1 class="company-name">Công ty cổ phần Sản xuất - Thương mại ABC</h1>
        </div>
        <div class="header-right">
            <div class="user-info" id="user-info">
                <img src="pics/anh2.jpg" alt="Avatar" class="avatar">
                <span class="username">Nguyễn Thanh Tuấn</span>
                <button class="dropdown-toggle" id="dropdown-toggle">&#x25BC;</button>
                <div class="dropdown-menu" id="dropdown-menu">
                    <a href="#">Hồ sơ cá nhân</a>
                    <a href="#">Lịch phòng</a>
                    <a href="#">Đăng ký tài nguyên</a>
                    <a href="#">Quy định</a>
                    <a href="#">Góp ý</a>
                    <a href="#">Cài đặt</a>
                    <a href="organizational_structure.php">Cơ cấu tổ chức</a>
                    <a href="#" id="logout">Đăng xuất</a>
                </div>
            </div>
        </div>
    </header>

    <main class="main-content">

        <div class="left-sidebar">
            
        </div>

        <div class="center-content">
            <!-- Nội dung chính của trang web -->
            <div class="box">
                <h2>GÓP Ý KIẾN</h2>
                <p>Xin mời Anh/Chị nhập đầy đủ thông tin góp ý về Cổng thông tin điện tử, mọi góp ý của Anh/ Chị đều rất có ý nghĩa với công ty.</p>
                <form action="#" method="post">
                    <!-- <label for="name">Họ và tên <span style="color: red">(*)</span></label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email <span style="color: red;">(*)</span></label>
                    <input type="email" id="email" name="email" required>

                    <label for="phone">Số điện thoại</label>
                    <input type="tel" id="phone" name="phone">

                    <label for="address">Địa chỉ</label>
                    <input type="text" id="address" name="address"> -->

                    <label for="subject">Chủ đề <span style="color: red;">(*)</span></label>
                    <input type="text" id="subject" name="subject" required>

                    <label for="content">Nội dung <span style="color: red;">(*)</span></label>
                    <textarea id="content" name="content" rows="5" required></textarea>

                    <!-- <label for="field">Lĩnh vực</label>
                    <select id="field" name="field">
                        <option value>Chọn lĩnh vực</option>
                    </select> -->

                    <input type="submit" value="Gửi">
                    <input type="reset" value="Làm lại">
                </form>
            </div>
        </div>

        <div class="right-sidebar">
            <!-- Nội dung bên phải -->
            
        </div>

    </main>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Góp ý thành công!</h2>
            <p>Cảm ơn Anh/ Chị đã gửi góp ý tới Quản lý Công ty Cổ phần Sản xuất - Thương mại ABC. Mọi góp ý của Anh/Chị sẽ được xem xét và nâng cao chất lượng công ty tốt hơn</p>
        </div>
    </div>

    <script>
        function handleSubmit(event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của form (submit)
            document.getElementById('myModal').style.display = 'block'; // Hiển thị modal
            event.target.reset(); // Reset toàn bộ nội dung của form
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Menu dropdown và các sự kiện khác giữ nguyên


            // Xử lý form submit
            const form = document.querySelector('form');
            form.addEventListener('submit', handleSubmit);

            // Đóng modal khi click vào nút đóng
            const closeBtn = document.querySelector('.close');
            closeBtn.addEventListener('click', function() {
                document.getElementById('myModal').style.display = 'none';
            });
        });

        // thanh menu
        document.getElementById('dropdown-toggle').addEventListener('click', function() {
            document.getElementById('dropdown-menu').classList.toggle('show');
        });

        window.onclick = function(event) {
            if (!event.target.matches('.dropdown-toggle')) {
                var dropdowns = document.getElementsByClassName('dropdown-menu');
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
</body>
</html>
