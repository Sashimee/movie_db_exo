<?php var_dump('$_SESSION'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Profile Settings</title>
    <link rel="stylesheet" type="text/css" href="\style\style.css">
</head>

<body>
    <div class="header">
        <h2>Update Information</h2>
    </div>
    <form method="post" action="userpage.php">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label>Confirm password</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="update_user">Update</button>
        </div>
    </form>
</body>

</html>