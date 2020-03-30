<?php
session_start();
var_dump($_SESSION);
?>
<!DOCTYPE html>
<html>
   

<head>  
    <meta charset="UTF-8">
    <title>Profile Settings</title>
       
</head> 

<body>
    <form method="post" action="register.php">
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
            <button type="submit" class="btn" name="reg_user">Update</button>
        </div> 
</body>

</html>