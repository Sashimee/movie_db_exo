<?php
if (isset($_POST['update_profile'])) {
    $user = $_GET['username'];
    $email = $_POST['fullname'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];
    $update_profile = $mysqli->query("UPDATE user SET email = '$email',
                      password = '$password' WHERE session_id = '$a'");
    if ($update_profile) {
        header("Location: profile.php?user=$user");
    } else {
        echo $mysqli->error;
    }
};
