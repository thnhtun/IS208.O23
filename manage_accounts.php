<?php
// Kết nối đến cơ sở dữ liệu
include "connect.php";

// Kiểm tra xem người dùng đã đăng nhập và có quyền admin hay chưa
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
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
if ($result && mysqli_num_rows($result) > 0) 
    $user = mysqli_fetch_assoc($result);
// Xóa tài khoản nếu được yêu cầu
if (isset($_POST['delete_account'])) {
    $accountId = $_POST['account_id'];
    $query = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $accountId);
    $stmt->execute();
    $stmt->close();
}

// Thêm tài khoản mới nếu được yêu cầu
if (isset($_POST['add_account'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];
    $role = $_POST['role'];

    $query = "INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $username, $password, $email, $role);
    $stmt->execute();
    $stmt->close();
}

// Lấy danh sách tài khoản từ cơ sở dữ liệu
$query = "SELECT * FROM users";
$result = $conn->query($query);

$accounts = [];
while ($row = $result->fetch_assoc()) {
    $accounts[] = $row;
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
            font-family: Arial, sans-serif;
            font-size: 20px;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            font-family: 'Monserrat',sans-serif;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 20px;
            background-color: #084e94;
            color: white;
            font-family: 'Lora',sans-serif;
        }

        .header-left {
            display: flex;
            align-items: center;
            font-family: 'Lora',sans-serif;
        }
        .header-link {
            font-family: 'Lora',sans-serif;
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
            font-family: 'Lora',sans-serif;
        }

        .greeting {
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px;
            font-family: 'lora',sans-serif;
        }

        .header-right {
            position: relative;
            font-family: 'Lora',sans-serif;
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
            font-family: 'Lora',sans-serif;
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
        .footer {
            background-color: #084e94;
            position: absolute;
            width: 100%;
        }
        .footer-content {
            font-family: 'Lora', sans-serif;
            font-size: 20px;
            color: white;
            margin-left: 1%;
            margin-top: 20px;
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

    <div class="container">
        <h1>Quản Lý Tài Khoản</h1>

        <!-- Form thêm tài khoản mới -->
        <h2>Thêm Tài Khoản Mới</h2>
        <form action="" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="email" name="email" placeholder="Email" required>
            <select name="role" required>
                <option value="admin">Admin</option>
                <option value="manager">Manager</option>
                <option value="user">User</option>
            </select>
            <button type="submit" name="add_account">Thêm Tài Khoản</button>
        </form>

        <!-- Hiển thị danh sách tài khoản -->
        <h2>Danh Sách Tài Khoản</h2>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($accounts as $account) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($account['username']); ?></td>
                        <td><?php echo htmlspecialchars($account['email']); ?></td>
                        <td><?php echo htmlspecialchars($account['role']); ?></td>
                        <td>
                            <form action="" method="post" style="display:inline-block;">
                                <input type="hidden" name="account_id" value="<?php echo $account['account_id']; ?>">
                                <button type="submit" name="delete_account" onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này không?')">Xóa</button>
                            </form>
                            <form action="edit_account.php" method="post" style="display:inline-block;">
                                <input type="hidden" name="account_id" value="<?php echo $account['account_id']; ?>">
                                <button type="submit" name="edit_account">Sửa</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="footer">
        <div class="footer-content">
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
    </div>
</body>
</html>
