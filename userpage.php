<?php
include_once('database.php');
session_start();
$user_id = $_SESSION['user_id'];
$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
$user_check_query = "SELECT * FROM user WHERE user_id= $user_id";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
   

<head>  
    <meta charset="UTF-8">
    <title>Profile Settings</title>
    <link rel="stylesheet" type="text/css" href="\style\style.css">
</head> 

<body>
    <?php include_once("nav-bar.php"); ?>
    <form class="formForm" method="post" action="userpage.php">
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
        if (isset($_POST['reg_user'])) {
            $newUserName = mysqli_real_escape_string($db, $_POST['username']);
            $newEmail = mysqli_real_escape_string($db, $_POST['email']);
            $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
            $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
            if (!empty($_POST['password_1'])) {
                $password = md5($password_1);
                $update_query1 = "UPDATE user SET email = '$newEmail', username = '$newUserName', password = '$password' WHERE user_id = '$user_id'";
                mysqli_query($db, $update_query1);
                header('location: userpage.php');
            } else {
                $update_query2 = "UPDATE user SET email = '$newEmail', username = '$newUserName' WHERE user_id = '$user_id'";
                mysqli_query($db, $update_query2);
                header('location: userpage.php');
            }
        }
        ?>
</body>

</html>