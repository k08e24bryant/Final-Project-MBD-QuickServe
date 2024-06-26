<?php
include('../includes/header.php');
?>
<div class="container login-container">
    <h2>Login</h2>
    <form action="login_process.php" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <label for="login_as">Login As</label>
        <select id="login_as" name="login_as" required>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
        <button type="submit">Login</button>
    </form>
</div>
<?php
include('../includes/footer.php');
?>
