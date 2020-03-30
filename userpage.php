<?php
$a = session_id();
var_dump(session_id());
if (!empty($a)) {
    $get_user = $mysqli->query('SELECT * FROM user WHERE session_id ='  . session_id());
    $user_data = $get_user->fetch_assoc();
    var_dump($user_data);
} else {
    header("Location: index.php");
} ?>
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