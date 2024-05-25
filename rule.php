<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quy Định</title>
    <link rel="icon" href="pics/logo5.jpg" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 20px;
            background-color: #4f9deb;
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
    </style>
</head>
<body>
    <header class="header">
        <div class="header-left">
            <img src="pics/logo5.jpg" alt="Logo" class="logo">
            <h1 class="company-name">Bright Star</h1>
        </div>
        <div class="header-right">
            <div class="user-info" id="user-info">
                <img src="pics/anh2.jpg" alt="Avatar" class="avatar">
                <span class="username">Nguyễn Thanh Tuấn</span>
                <button class="dropdown-toggle"
                    id="dropdown-toggle">&#x25BC;</button>
                <div class="dropdown-menu" id="dropdown-menu">
                    <a href="#">Hồ sơ cá nhân</a>
                    <a href="#">Lịch phòng</a>
                    <a href="#">Đăng ký tài nguyên</a>
                    <a href="#">Quy định</a>
                    <a href="#">Góp ý</a>
                    <a href="#">Cài đặt</a>
                    <a href="#" id="logout">Đăng xuất</a>
                </div>
            </div>
        </div>
    </header>

    <mian class="main-content">

        <div class="left-sidebar">
            <!-- Nội dung của thanh bên trái -->
            <div class="box">
                <h2>Khen thưởng & Sinh nhật</h2>
                <div class="reward-content">
                    <!-- Nội dung khen thưởng & sinh nhật -->
                    <p>Nội dung ngắn...</p>
                </div>
            </div>
        </div>

        <div class="center-content">
            <!-- Nội dung chính của trang web -->
            <!-- Nội dung của trung tâm -->
            <div class="box">
                <h2>Nội quy Công ty Cổ phần Sản xuất - Thương mại ABC</h2>
                <div class="notification-content">
                    <!-- Nội dung nội quy công việc -->
                    <h3>Điều 1: Thời gian làm việc và nghỉ ngơi</h3>
                    <div style="font-size:18px"> 
                        <p> &#8211; Thời gian làm việc là 5 giờ / ngày:</p>
                        <ul>
                            <li>Sáng: 7h40 đến 10h45</li>
                            <li>Chiều: 2h30 đến 4h35</li>
                        </ul>
                        <p>&#8211; Ngày nghỉ: chiều thứ 7 và chủ nhật. </p>
                        <p>&#8211; Nghỉ phép: Nhân viên được hưởng 12 ngày nghỉ phép có lương mỗi năm và phải thông báo trước ít nhất 7 ngày. </p>
                        <p>&#8211; Nhân viên làm tăng ca, làm thêm giờ sẽ được tính lương bằng 150% so với mức lương ngày thường.</p>
                    </div>

                    <h3>Điều 2: Tác phong đạo đức</h3>
                    <div style="font-size:18px"> 
                        <p>&#8211; Không làm việc riêng trong giờ hành chính. </p>      
                        <p>&#8211; Nhân viên phải mang giày, dép sandal. Quần áo lịch sự kín đáo hoặc đồng phục được Công ty cấp. </p>
                        <p>&#8211; Người lao động phải có thái độ tích cực, có tinh thần trách nhiệm trong công việc.</p>
                        <p>&#8211; Tôn trọng cấp trên, đồng nghiệp và khách hàng, duy trì thái độ lịch sự và nhã nhặn. </p>
                        <p>&#8211; Không tiết lộ thông tin bí mật của công ty cho bất kỳ ai không có thẩm quyền. </p>
                        <p>&#8211; Sử dụng ngôn ngữ lịch sự, tôn trọng khi giao tiếp qua email, điện thoại, hoặc trực tiếp.</p>
                    </div>

                    <h3>Điều 3: An toàn lao động</h3>
                    <div style="font-size:18px"> 
                        <p>&#8211; Không hút thuốc lá, uống bia, rượu hoặc đánh bài bạc . </p>      
                        <p>&#8211; Tuân thủ các quy định về phòng cháy, chữa cháy, an toàn điện.</p>
                        <p>&#8211; Không mang vật dụng dễ cháy nổ hoặc hung khí vào Công ty.</p>
                        <p>&#8211; Báo cáo ngay lập tức cho quản lý khi phát hiện bất kỳ nguy cơ hoặc tai nạn lao động nào. </p>
                        <p>&#8211; Mọi nhân viên ra ngoài trong giờ làm việc phải thông báo với cấp trên. </p>
                        <p>&#8211; Sử dụng đúng cách và bảo dưỡng định kỳ các thiết bị, máy móc theo hướng dẫn.</p>
                    </div>
                    

                    <h3>Điều 4: Quản lý tài sản</h3>
                    <div style="font-size:18px"> 
                        <p>&#8211; Trừ khi được giao trách nhiệm trực, không tự ý vào văn phòng giám đốc. </p>      
                        <p>&#8211; Sử dụng tài sản của công ty đúng mục đích công việc, không sử dụng cho mục đích cá nhân.</p>
                        <p>&#8211; Mọi nhân viên mang tài sản Công ty ra ngoài cần được sự đồng ý của giám đốc.</p>
                        <p>&#8211; Có ý thức tiết kiệm và bảo vệ tài sản chung.</p>
                        <p>&#8211; Nhân viên có trách nhiệm bồi thường nếu làm mất mát hoặc hư hỏng tài sản do lỗi cá nhân.</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="right-sidebar">
            <!-- Nội dung bên phải -->
            <div class="box">
                <h2>Giới thiệu</h2>
                <p>Thông tin giới thiệu về website công ty...</p>
            </div>
            
        </div>


    </mian>

    <script>
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