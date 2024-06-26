<?php
session_start();
include('../includes/db.php');
include('../includes/functions.php');

$username = $_POST['username'];
$password = $_POST['password'];
$login_as = $_POST['login_as'];

$sql = "SELECT * FROM Users WHERE Username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['PasswordHash'])) {
        if ($login_as == 'admin' && $row['is_admin']) {
            $_SESSION['user_id'] = $row['UserID'];
            $_SESSION['username'] = $row['Username'];
            $_SESSION['user_role'] = 'admin';
            redirect('/quickserve/admin/dashboard.php');
        } elseif ($login_as == 'user' && !$row['is_admin']) {
            $_SESSION['user_id'] = $row['UserID'];
            $_SESSION['username'] = $row['Username'];
            $_SESSION['user_role'] = 'user';
            redirect('/quickserve/index.php');
        } else {
            echo "Invalid login credentials.";
        }
    } else {
        echo "Invalid password.";
    }
} else {
    echo "No user found with that username.";
}
?>
