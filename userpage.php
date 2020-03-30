<?php include('server.php') ?>
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
            <button type="submit" class="btn" name="reg_user">Update</button>
        </div>
    </form>

    <?php
    if (isset($_POST['reg_user'])) {
        // receive all input values from the form
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required");
        }
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
        }

        // VERIF
        $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        $sessionId = session_id();

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    if (count($errors) == 0) {
        $_SESSION['username'] = $username;
        mysqli_query($db, $query);
        $password = md5($password_1); //encrypt the password before saving in the database
        $query = "UPDATE user SET email= $email, password= $password WHERE username LIKE $username";
        $_SESSION['success'] = "Information Updated";
        header('location: userpage.php');
    }

    ?>
</body>

</html>