<?php
session_start();
include "connect.php";

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
$username = $_SESSION['username'];
$role = $_SESSION['role'];
// Truy vấn lấy thông tin tài khoản và nhân viên
$query = "
    SELECT u.username, u.email, u.role, u.avatar, e.full_name, e.sex, e.birth, e.cccd, e.phone, e.address
    FROM users u
    LEFT JOIN employee e ON u.account_id = e.account_id
    WHERE u.username = '$username'
";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    echo "Không tìm thấy thông tin người dùng.";
    exit();
}
?>
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
    <title>Trang chủ</title>
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
            font-family: 'Montserrat',sans-serif;
        }

        .header-left {
            display: flex;
            align-items: center;
            font-family: 'Montserrat',sans-serif;
        }
        .header-link {
            font-family: 'Montserrat',sans-serif;
            text-decoration: none;
            color: white;
        }
        .logo {
            height: 50px;
            margin-right: 10px;
        }

        .company-name {
            font-size: 1.5em;
            margin: 0;
            font-family: 'Montserrat',sans-serif;
        }

        .greeting {
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px;
            font-family: 'Montserrat',sans-serif;
        }

        .header-right {
            position: relative;
            font-family: 'Montserrat',sans-serif;
        }

        .user-info {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .avatar {
            height: 30px;
            width: 30px;
            border-radius: 50%;
            margin-right: 30px;
            margin-left: 30px;
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
            font-family: 'Monserrat',sans-serif;
        }

        .left-sidebar,
        .right-sidebar {
            flex: 1;
            background-color: #f9f9f9;
            font-family: 'Montserrat',sans-serif;
        }

        .center-content {
            flex: 3;
            background-color: #f9f9f9;
            font-family: 'Montserrat',sans-serif;
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
        .footer {
            background-color: #084e94;
            position: absolute;
            width: 100%;
        }
        .footer-content {
            font-family: 'Montserrat', sans-serif;
            font-size: 20px;
            color: white;
            margin-left: 1%;
        }
        .footer-link {
            color: white;
            text-decoration: none;
        }


        .message-toggle {
    background: none;
    border: none;
    color: white;
    font-size: 1.2em;
    cursor: pointer;
    margin-left: 10px;
}

.message-list {
    display: none;
    position: absolute;
    top: 60px;
    right: 0;
    background-color: white;
    color: black;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    width: 200px;
}

.message-list a {
    display: block;
    padding: 10px 20px;
    text-decoration: none;
    color: black;
}

.message-list a:hover {
    background-color: #f4f4f4;
}

.show-message-list {
    display: block;
}

.chat-container {
    display: none;
    position: fixed;
    bottom: 0;
    right: 20px;
    width: 300px;
    background-color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    border-radius: 5px 5px 0 0;
    overflow: hidden;
    flex-direction: column;
    height: 400px;
}

.chat-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    background-color: #4f9deb;
    color: white;
}

.chat-close {
    background: none;
    border: none;
    color: white;
    font-size: 1.2em;
    cursor: pointer;
}

.chat-messages {
    flex: 1;
    padding: 10px;
    overflow-y: auto;
    background-color: #f9f9f9;
}

.chat-input-container {
    display: flex;
    padding: 10px;
    border-top: 1px solid #ddd;
}

#chat-input {
    flex: 1;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

#chat-send {
    background-color: #4f9deb;
    color: white;
    border: none;
    padding: 10px;
    margin-left: 10px;
    cursor: pointer;
    border-radius: 5px;
}

#chat-send:hover {
    background-color: #3b7cce;
}
</style>
</head>
<body>
    <?php
    include "connect.php";
    ?>
    <header class="header">
        <div class="header-left">
        <a class="header-link" href="home.php"><img src="pics/logo5.jpg" alt="Logo" class="logo"></a>
            <a class="header-link" href="home.php"><h1 class="company-name">Công ty cổ phần Sản xuất - Thương mại ABC</h1></a>
        </div>
        <div class="header-right">
            <div class="user-info" id="user-info">
                <button class="message-toggle" id="message-toggle">&#x2709;</button>
                <a href="profile.php"><img class="avatar" src="display_avatar.php?username=<?php echo $username; ?>" alt="Avatar" style="width: 80px; height: 80px; border-radius: 50%;"></a>
                <a href="profile.php"></a><h2 class="username"><?php echo $user['full_name']; ?></h2>
                <button class="dropdown-toggle" id="dropdown-toggle">&#x25BC;</button>
                <div class="dropdown-menu" id="dropdown-menu">
                    <a href="profile.php">Hồ sơ cá nhân</a>
                    <a href="room_schedule.php">Lịch phòng</a>
                    <a href="feedback.php">Góp ý</a>
                    <a href="organizational_structure.php">Cơ cấu tổ chức</a>
                <?php if ($role == 'admin') { ?>
                    <a href="manage_accounts.php">Quản lí tài khoản</a>
                <?php } ?>
                <?php if ($role == 'manager') { ?>
                    <a href="manage_employees.php">Quản lí nhân viên</a>
                <?php } ?>
                    <a href="logout.php" id="logout">Đăng xuất</a>
                    <script>
                        document.getElementById('logout').addEventListener('click', function(event) {
                            event.preventDefault();
                            localStorage.removeItem('loggedIn');
                            localStorage.removeItem('username');
                            window.location.href = 'logout.php'; });
                    </script>
                </div>
                <div class="message-list" id="message-list">
                    <a href="#" class="message-user">Bùi Hữu Nghĩa</a>
                    <a href="#" class="message-user">Nguyễn Ngô Hoài Như</a>
                    <a href="#" class="message-user">Từ Thị Hồng Phúc</a>
                </div>
                <div class="chat-container" id="chat-container">
                    <div class="chat-header" id="chat-header">
                        <span class="chat-username" id="chat-username">Chat with</span>
                        <button class="chat-close" id="chat-close">&times;</button>
                    </div>
                    <div class="chat-messages" id="chat-messages">
                        <!-- Tin nhắn sẽ được thêm vào đây -->
                    </div>
                    <div class="chat-input-container">
                        <input type="text" id="chat-input" placeholder="Nhập tin nhắn...">
                        <button id="chat-send">Gửi</button>
                    </div>
                </div>
                
            </div>
            
        </div>
    </header>
    <h1 class="greeting">Xin chào, <?php echo $user['full_name']; ?>. Làm việc vui vẻ!</h1>
    <main class="main-content">
        <div class="left-sidebar">
            <!-- Nội dung của thanh bên trái -->
            <div class="box">
                <h2>Chúc mừng</h2>
                <div class="reward-content">
                    <!-- Nội dung chúc mừng vị trí mới hoặc sinh nhật -->
                    <p>Nội dung ngắn...</p>
                </div>
            </div>
            <div class="box">
                <h2>Khen thưởng</h2>
                <div class="reward-content">
                    <!-- Nội dung khen thưởng -->
                    <p>Nội dung ngắn...</p>
                </div>
            </div>
        </div>
        <div class="center-content">
            <!-- Nội dung của trung tâm -->
            <div class="box">
                <h2>Thông báo công việc</h2>
                <div class="notification-content">
                    <!-- Nội dung thông báo công việc -->
                    <p>Thông báo công việc----</p>
                </div>
            </div>
            <div class="box">
                <h2>Thông báo Nhân sự</h2>
                <div class="notification-content">
                <p>Thông báo Nhân sự----</p>
                </div>
            </div>
            <div class="box">
                <h2>Thông báo Tài chính</h2>
                <div class="notification-content">
                    <p>Thông báo Tài chính----</p>
                </div>
            </div>
            
        </div>
        <div class="right-sidebar">
            <!-- Nội dung của thanh bên phải -->
            <div class="box">
                <h2>Giới thiệu</h2>
                <p>Website là nền tảng kỹ thuật số tích hợp các công cụ, tài nguyên và thông tin quan trọng phục vụ hoạt động của Công ty Cổ phần Sản xuất - Thương mại ABC.</p>
                <p>Nhân viên cập nhật thông tin công việc, đăng kí tài nguyên, giao tiếp công việc, tra cứu quy trình và chính sách nội bộ. Các kênh giao tiếp trực tuyến tích hợp nhằm thúc đẩy kết nối và hợp tác giữa các phòng ban, bộ phận.</p>
                <p>Hãy khai thác hiệu quả website nội bộ để nâng cao năng suất làm việc, truy cập thông tin nhanh chóng và duy trì môi trường làm việc chuyên nghiệp tại Công ty.</p>
                <h3>Chúc bạn một ngày làm việc hiệu quả.</h3>
            </div>
            <div class="box">
                <h2 style="text-align: center">Lịch</h2>
                <div id="clock" class="clock"></div>
                <div id="calendar" class="calendar"></div>
                <p></p>
            </div>
        </div>
    </main>
    <div class="footer">
        <div class="footer-content">
        <p><strong>SỨ MẠNG</strong></p>
        <p>- Công ty Cổ phần Sản xuất - Thương mại ABC là một doanh nghiệp hàng đầu cung cấp các sản phẩm và dịch vụ chất lượng cao, đáp ứng nhu cầu của khách hàng trong nước và quốc tế.</p>
        <p>- Công ty Cổ phần Sản xuất - Thương mại ABC luôn đi đầu trong việc áp dụng công nghệ tiên tiến vào sản xuất và kinh doanh, đóng góp cho sự phát triển bền vững của ngành và cộng đồng.</p>
        <p><strong>TẦM NHÌN</strong></p>
        <p>Công ty cổ phần Sản xuất - Thương mại ABC trở thành doanh nghiệp hàng đầu trong lĩnh vực, được khách hàng và đối tác tin tưởng.</p>

        <div>
            <div>Liên hệ</div>    
            <div>
                <ul>
                    <li><strong>ĐỊA CHỈ: </strong>Số 7 Đường Bằng Lăng 1, Phường Việt Hưng, Quận Long Biên, Hà Nội.</li>
                    <li><strong>ĐIỆN THOẠI: </strong>+84 (24) 3974 9999</li>
                    <li><strong>FAX: </strong>+84 (24) 3974 8888</li>
                    <li><strong>EMAIL: </strong><a class="footer-link" href="mailto:congtycpbrightstar@gmail.com">congtycpbrightstar@gmail.com</a></li>
                </ul>
            </div>
        </div>
        <p>© Copyright Công ty cổ phần Sản xuất - Thương mại ABC</p>
        </div>
    <script>
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
        document.getElementById('message-toggle').addEventListener('click', function() {
            document.getElementById('message-list').classList.toggle('show-message-list');
});

        window.onclick = function(event) {
            if (!event.target.matches('.message-toggle')) {
                var messageLists = document.getElementsByClassName('message-list');
                for (var i = 0; i < messageLists.length; i++) {
                    var openMessageList = messageLists[i];
                    if (openMessageList.classList.contains('show-message-list')) {
                        openMessageList.classList.remove('show-message-list');
                    }
                }
            }
        }

        // Thêm đồng hồ thời gian thực
        function updateClock() {
            const clockElement = document.getElementById('clock');
            const now = new Date();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');
            clockElement.innerText = `${hours}:${minutes}:${seconds}`;
        }

        setInterval(updateClock, 1000);
        updateClock();

        // Thêm lịch tháng
        function generateCalendar() {
            const calendarElement = document.getElementById('calendar');
            const now = new Date();
            const year = now.getFullYear();
            const month = now.getMonth();

            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            const monthNames = [
                'Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 
                'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'
            ];

            let calendarHTML = `<table><tr><th colspan="7">${monthNames[month]} ${year}</th></tr>`;
            calendarHTML += `<tr><th>CN</th><th>T2</th><th>T3</th><th>T4</th><th>T5</th><th>T6</th><th>T7</th></tr><tr>`;

            for (let i = 0; i < firstDay; i++) {
                calendarHTML += `<td></td>`;
            }

            for (let day = 1; day <= daysInMonth; day++) {
                if ((day + firstDay - 1) % 7 === 0 && day !== 1) {
                    calendarHTML += `</tr><tr>`;
                }
                if (day === now.getDate()) {
                    calendarHTML += `<td class="today">${day}</td>`;
                } else {
                    calendarHTML += `<td>${day}</td>`;
                }
            }

            calendarHTML += '</tr></table>';

            calendarElement.innerHTML = calendarHTML;
        }

        generateCalendar();
        // Chat functionality
const messageUsers = document.querySelectorAll('.message-user');
const chatContainer = document.getElementById('chat-container');
const chatUsername = document.getElementById('chat-username');
const chatMessages = document.getElementById('chat-messages');
const chatInput = document.getElementById('chat-input');
const chatSend = document.getElementById('chat-send');
const chatClose = document.getElementById('chat-close');

messageUsers.forEach(user => {
    user.addEventListener('click', function() {
        const username = this.textContent;
        chatUsername.textContent = `Chat with ${username}`;
        chatContainer.style.display = 'flex';
        // Load existing messages with the user if available
        loadChatMessages(username);
    });
});

chatSend.addEventListener('click', function() {
    sendMessage();
});

chatInput.addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        sendMessage();
    }
});

chatClose.addEventListener('click', function() {
    chatContainer.style.display = 'none';
});

function sendMessage() {
    const message = chatInput.value;
    if (message.trim() !== '') {
        const messageElement = document.createElement('div');
        messageElement.textContent = message;
        messageElement.classList.add('chat-message', 'chat-message-sent');
        chatMessages.appendChild(messageElement);
        chatInput.value = '';
        chatMessages.scrollTop = chatMessages.scrollHeight;

        // Save or send message to server
        saveMessage(chatUsername.textContent.replace('Chat with ', ''), message);
    }
}

function loadChatMessages(username) {
    // Load messages from local storage or server
    chatMessages.innerHTML = ''; // Clear previous messages
    const messages = getChatMessages(username);
    messages.forEach(message => {
        const messageElement = document.createElement('div');
        messageElement.textContent = message.text;
        messageElement.classList.add('chat-message', message.sent ? 'chat-message-sent' : 'chat-message-received');
        chatMessages.appendChild(messageElement);
    });
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

function saveMessage(username, text) {
    // Save the message to local storage or send to server
    const messages = getChatMessages(username);
    messages.push({ text: text, sent: true });
    localStorage.setItem(`chat_${username}`, JSON.stringify(messages));
}

function getChatMessages(username) {
    // Retrieve messages from local storage or server
    const messages = localStorage.getItem(`chat_${username}`);
    return messages ? JSON.parse(messages) : [];
}
    </script>
</body>
</html>
