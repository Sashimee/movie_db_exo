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
    // NAVBAR
    // include_once("nav-bar.php");
    // DB Info + Connection
    require_once 'database.php';
    $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
    if (isset($_GET['movie_id'])) {
        $movieId = $_GET['movie_id'];
        $query = "SELECT * FROM movie WHERE movie_id = '$movieId'";
        $answer = mysqli_query($connect, $query);
        $movie = mysqli_fetch_assoc($answer);
        $movieTitle = $movie['title'];
        $moviePoster = $movie['poster_url'];
        $movieCategory = $movie['category'];
        $movieDesc = $movie['synopsis'];
        $movieReleaseDate = $movie['release_date'];
        $movieRating = $movie['rating'];
        mysqli_close($connect);
    } else {
        echo 'No Movie selected ....';
    }
    ?>

    <div class="container">
        <form action="details.php" method="post">
            <div class="text-center">
                <img src="<?php echo $moviePoster ?>">
            </div>
            <input type="text" name="title" id="title" value="<?php echo $movieTitle ?>" readonly>
            <input type="text" name="category" id="category" value="<?php echo $movieCategory ?>" readonly>
            <input type="text" name="release-date" id="release-date" value="<?php echo $movieReleaseDate ?>" readonly>
            <input type="text" name="rating" id="rating" value="<?php echo $movieRating ?>" readonly>
            <textarea name="description" id="description" readonly><?php echo $movieDesc ?></textarea>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
<!--
TODO

ADD BTN TO ADD OR REMOVE FROM PLAYLIST

 -->