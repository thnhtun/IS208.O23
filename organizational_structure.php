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
    <title>Cơ cấu tổ chức</title>
    <link rel="icon" href="pics/logo5.jpg" type="image/x-icon">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            font-size: 20px;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .header {
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

        .left-sidebar {
            flex: 2;
            background-color: #f9f9f9;
            font-family: 'Montserrat', sans-serif;
        }

        .right-sidebar {
            flex: 1;
            background-color: #f9f9f9;
            font-family: 'Montserrat', sans-serif;
        }

        .center-content {
            flex: 5;
            background-color: #f9f9f9;
            

        }

        .box {
            font-size: 25px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }

        .box h2 {
            margin-top: 0;
        }

        .box img {
            width: 100%;
            height: auto; /* Đảm bảo tỷ lệ khung hình của ảnh không bị méo */
            display: block;
            margin: auto;
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
        .dropdown {
            cursor: pointer;
            user-select: none;
            margin-left: 20px; /* Để căn lề cho các mục con */
        }
        
        .dropdown-content {
            display: none;
            padding-left: 20px;
        }
        
        .dropdown.open > .dropdown-content {
            display: block;
        }
        
        .triangle {
            display: inline-block;
            margin-right: 5px;
            transition: transform 0.3s;
        }
        
        .open > .triangle {
            transform: rotate(90deg);
        }
        .header-link {
            font-family: 'Montserrat', sans-serif;
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-left">
            <a class="header-link" href="home.php"><img src="pics/logo5.jpg" alt="Logo" class="logo"></a>
            <a class="header-link" href="home.php"><h1 class="company-name">Công ty cổ phần Sản xuất - Thương mại ABC</h1></a>
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
                    <a href="feedback.php">Góp ý</a>
                    <a href="#">Cài đặt</a>
                    <a href="organizational_structure.php">Cơ cấu tổ chức</a>
                    <a href="#" id="logout">Đăng xuất</a>
                </div>
            </div>
        </div>
    </header>

    <mian class="main-content">

        <div class="left-sidebar">
            <!-- Nội dung của thanh bên trái -->
            <div class="box">
                <div class="dropdown" onclick="toggleDropdown(this)">
                    <span class="triangle">▶</span> Hội đồng Quản trị
                    <div class="dropdown-content" onclick="stopPropagation(event)">
                        <div class="item">- Chủ tịch Hội đồng Quản trị</div>
                        <div class="item">- Các Thành viên Hội đồng Quản trị</div>
                    </div>
                </div>

                <div class="dropdown" onclick="toggleDropdown(this)">
                    <span class="triangle">▶</span> Ban Điều hành
                    <div class="dropdown-content" onclick="stopPropagation(event)">
                        <div class="item">- Tổng Giám đốc (CEO)</div>
                        <div class="item">- Phòng Nhân sự (HR)
                        </div>
                    </div>
                </div>

                <div class="dropdown" onclick="toggleDropdown(this)">
                    <span class="triangle">▶</span> Các Phòng Ban Chính
                    <div class="dropdown-content" onclick="stopPropagation(event)">
                        <div class="item" style="padding-left: 20px;"> Phòng Tài chính (CFO)</div>

                        <div class="dropdown" onclick="toggleDropdown(this, event)">
                            <span class="triangle">▶</span> Phòng Nhân sự (HR)
                            <div class="dropdown-content">
                                <div class="item">- Bộ phận Tuyển dụng:    1234567890</div>
                                <div class="item">- Bộ phận Đào tạo và Phát triển:    1234567890</div>
                            </div>
                        </div>

                        <div class="dropdown" onclick="toggleDropdown(this, event)">
                            <span class="triangle">▶</span> Phòng Marketing
                            <div class="dropdown-content">
                                <div class="item">- Bộ phận Nghiên cứu Thị trường</div>
                                <div class="item">- Bộ phận Quảng cáo</div>
                            </div>
                        </div>
                        <div class="item" style="padding-left: 20px;"> Phòng Kinh doanh (Sales)</div>

                        <div class="dropdown" onclick="toggleDropdown(this, event)">
                            <span class="triangle">▶</span> Phòng IT
                            <div class="dropdown-content">
                                <div class="item">- Bộ phận Hỗ trợ Kỹ thuật</div>
                                <div class="item">- Bộ phận Phát triển Phần mềm</div>
                            </div>
                        </div>

                        <div class="dropdown" onclick="toggleDropdown(this, event)">
                            <span class="triangle">▶</span> Phòng Sản xuất/Phát triển Sản phẩm
                            <div class="dropdown-content">
                                <div class="item">- Bộ phận Quản lý Chất lượng</div>
                                <div class="item">- Bộ phận R&D</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dropdown" onclick="toggleDropdown(this)">
                    <span class="triangle">▶</span> Phòng Pháp chế
                    <div class="dropdown-content" onclick="stopPropagation(event)">
                        <div class="dropdown" onclick="toggleDropdown(this, event)">
                            <span class="triangle">▶</span> Trưởng phòng Pháp chế
                            <div class="dropdown-content">
                                <div class="item">- Bộ phận Tư vấn Pháp lý</div>
                                <div class="item">- Bộ phận Quản lý Hợp đồng</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="center-content">
            <!-- Nội dung chính của trang web -->
            <!-- Nội dung của trung tâm -->
            <div class="box">
                <img src="pics/Cơ cấu tổ chức.png" alt="main" class="main">
            </div>

        </div>

        <div class="right-sidebar">
            <!-- Nội dung bên phải -->

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

        function toggleDropdown(element, event) {
        element.classList.toggle('open');
    }

    function stopPropagation(event) {
        event.stopPropagation();
    }
    </script>
</body>
</html>