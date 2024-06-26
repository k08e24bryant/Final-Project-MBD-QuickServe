<?php
include('../includes/db.php');
include('../includes/functions.php');

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

$sql = "INSERT INTO Users (Username, Email, PasswordHash, CreatedAt) VALUES ('$username', '$email', '$hashed_password', NOW())";

if ($conn->query($sql) === TRUE) {
    redirect('/quickserve/user/login.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
