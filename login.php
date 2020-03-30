<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
    <<<<<<< HEAD <title>Login</title>
        =======
        <title>Registration system PHP and MySQL</title>
        >>>>>>> 952cabc246977bcf3818a252de57a6c64e59b0b1
</head>

<body>
    <div class="header">
        <h2>Login</h2>
    </div>

    <form method="post" action="login.php">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="login_user">Login</button>
        </div>
        <p>
            Not yet a member? <a href="register.php">Sign up</a>
        </p>
    </form>
</body>

</html>