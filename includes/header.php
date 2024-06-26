<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('db.php');
include('functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickServe</title>
    <link rel="stylesheet" href="/quickserve/css/styles.css">
</head>
<body>
<header>
    <nav>
        <div class="logo">
            <h1 style="color: white;">QuickServe</h1>
        </div>
        <ul>
            <li><a href="/quickserve/index.php">Home</a></li>
            <li><a href="/quickserve/user/restaurant_list.php">Restaurants</a></li>
            <?php if (is_logged_in() && !is_admin()): ?>
                <li><a href="/quickserve/user/order_status.php">My Orders</a></li>
            <?php endif; ?>
            <?php if (is_admin()): ?>
                <li><a href="/quickserve/admin/dashboard.php">Admin Dashboard</a></li>
            <?php endif; ?>
            <?php if (is_logged_in()): ?>
                <li><a href="/quickserve/logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="/quickserve/user/login.php">Login</a></li>
                <li><a href="/quickserve/user/register.php">Register</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
