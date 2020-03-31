<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="style/style.css">
</head>

<body id="cat-bod">
    <?php
    // DB Info + Connection
    require_once 'database.php';
    $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
    if (isset($_GET['movie_id'])) {
        $movieId = $_GET['movie_id'];
        $query = "SELECT * FROM movie WHERE movie_id = '$movieId'";
        $answer = mysqli_query($connect, $query);
        $movie = mysqli_fetch_assoc($answer);
        var_dump($movie);
    } else {
        echo 'No Movie clicked ....';
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>