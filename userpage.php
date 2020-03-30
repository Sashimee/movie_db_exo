<?php
include_once('database.php');
session_start();
$user_id = $_SESSION['user_id'];
$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
$user_check_query = "SELECT * FROM user WHERE user_id= $user_id";
var_dump($user_check_query);
$result = mysqli_query($db, $user_check_query);
var_dump($result);
$user = mysqli_fetch_assoc($result);
var_dump($user);
?>
<!DOCTYPE html>
<html>
   

<head>  
    <meta charset="UTF-8">
    <title>Profile Settings</title>
    <link rel="stylesheet" type="text/css" href="\style\style.css">
</head> 

<body>
    <form method="post" action="register.php">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $user['username']; ?>" placeholder="<?php echo $user['username']; ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $user['email']; ?>" placeholder="<?php echo $user['email']; ?>">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password_1" value="">
        </div>
        <div class=" input-group">
            <label>Confirm password</label>
            <input type="password" name="password_2" value="">
        </div>
        <div class=" input-group">
            <button type="submit" class="btn" name="reg_user">Update</button>
        </div> 
        <?php
        if (isset($_POST['update_profile'])) {

            $user = $_POST['username'];
            $email = $_POST['fullname'];
            $password_1 = $_POST['password_1'];
            $password_2 = $_POST['password_2'];
            $userdata =
                $update_profile = $mysqli->query("UPDATE user SET email = '$email',
                      password = '$password' WHERE user_id = '$a'");
            if ($update_profile) {
                header("Location: profile.php?user=$user");
            } else {
                echo $mysqli->error;
            }
        };
        ?>
</body>

</html>