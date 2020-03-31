<?php
session_start();
if(isset($_SESSION['username'])) {
echo "Your session is running " . $_SESSION['username'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
include_once "nav-bar.php";
require "database.php";
$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
            $query = 'SELECT * FROM movie';
            $res = mysqli_query($connect, $query);

?>
    
</body>
</html>



