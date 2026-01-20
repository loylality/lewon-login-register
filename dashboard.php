<?php

session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: design.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Kawsar</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <img style="width:100px; border-radius:50% ; margin-left:40px;" src="img/images.png" alt="">
            </div>
            <ul class="menu">
                <li class="active">🏠 Dashboard</li>
                <li>📊 Analytics</li>
                <li>📝 Reports</li>
                <li>⚙️ Settings</li>
                <li><a style="color: #fff; text-decoration: none; padding:15px 10px;" href="design.php">Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Navbar -->
            <div class="topbar">
                <div class="search">
                    <input type="text" placeholder="Search...">
                </div>
                <div class="profile">
                    <span>Hello, Lewon</span>
                    <img src="img/pngtree-man-avatar-image-for-profile-png-image_13001882.png" alt="profile">
                </div>
            </div>

            <!-- Dashboard Cards -->
            <div class="cards">
                <div class="card">
                    <h3>Total Users</h3>
                    <p>1,245</p>
                </div>
                <div class="card">
                    <h3>Revenue</h3>
                    <p>$8,560</p>
                </div>
                <div class="card">
                    <h3>Orders</h3>
                    <p>321</p>
                </div>
                <div class="card">
                    <h3>Feedback</h3>
                    <p>89</p>
                </div>
            </div>

            <!-- Table Section -->
            <div class="table-section">
                <h3>Recent Orders</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Status</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#1021</td>
                            <td>John Doe</td>
                            <td>Completed</td>
                            <td>$120</td>
                        </tr>
                        <tr>
                            <td>#1022</td>
                            <td>Jane Smith</td>
                            <td>Pending</td>
                            <td>$75</td>
                        </tr>
                        <tr>
                            <td>#1023</td>
                            <td>Mike Johnson</td>
                            <td>Completed</td>
                            <td>$250</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
