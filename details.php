<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
</head>

<body id="cat-bod">
    <!-- <body> //id="cat-bod"> -->
    <?php
    // session_start();
    // NAVBAR
    include_once 'nav-bar.php';
    // DB Info + Connection
    require_once 'database.php';
    $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
    // Blank all the fields
    // Save the new info if edited
    if (isset($_POST['new'])) { // output for new movie
        unset($_GET['movie_id']);
        $movieId = '';
        $movieTitle = '';
        $movieCategory = '';
        $movieDesc = '';
        $moviePoster = 'https://dummyimage.com/500x750/000/fff';
        $movieReleaseDate = '';
        $movieRating = '';
    ?>
        <div class="container topmrg">
            <form action="details.php" method="post">
                <div class="text-center">
                    <img src="<?php echo $moviePoster ?>">
                </div>
                <input type="text" class="form-control" name="title" id="title" value="<?php echo $movieTitle ?>" placeholder="Movie Title ...">
                <input type="text" class="form-control" name="category" id="category" value="<?php echo $movieCategory ?>" placeholder="Category ...">
                <input type="text" class="form-control" name="posterUrl" id="posterUrl" value="<?php echo $moviePoster ?>">
                <input type="text" class="form-control" name="release-date" id="release-date" value="<?php echo $movieReleaseDate ?>" placeholder="Release date ... YYYY/MM/DD">
                <input type="text" class="form-control" name="rating" id="rating" value="<?php echo $movieRating ?>" placeholder="Rating ...">
                <textarea class="form-control" name="description" id="description"><?php echo $movieDesc ?></textarea>
                <button class="btn-alx" type="submit" name="save">Save</button>
                <button class="btn-alx" type="submit" name="new">New</button>
            </form>
            <button class="btn-alx" id="edit">Edit</button>
        </div>
    <?php
    }
    if (isset($_POST['save'])) { // Save the form into the DB
        if (isset($_GET['movie_id'])) {
            $movieId = $_GET['movie_id'];
            $movieTitle = $_POST['title'];
            $movieCategory = $_POST['category'];
            $movieDesc = $_POST['description'];
            $moviePoster = $_POST['posterUrl'];
            $movieReleaseDate = $_POST['release-date'];
            $movieRating = $_POST['rating'];
            $query = "UPDATE movie SET title = '$movieTitle', poster_url = '$moviePoster', category = '$movieCategory', release_date = '$movieReleaseDate', rating = '$movieRating', synopsis = '$movieDesc'  WHERE movie_id = $movieId";
            mysqli_query($connect, $query);
        } else { //Save a new movie into the db
            $movieTitle = $_POST['title'];
            $movieCategory = $_POST['category'];
            $movieDesc = $_POST['description'];
            $moviePoster = $_POST['posterUrl'];
            $movieReleaseDate = $_POST['release-date'];
            $movieRating = $_POST['rating'];
            $query = "INSERT INTO movie(title, poster_url, synopsis, category, release_date, rating) VALUES ('" . $movieTitle . "','" . $moviePoster . "','" . $movieDesc . "','" . $movieCategory . "','" . $movieReleaseDate . "','" . $movieRating . "')";
            mysqli_query($connect, $query);
            $response = mysqli_insert_id($connect);
            $_GET['movie_id'] = $response; // put it there so the page get's regene'd with the good stuff
        }
    }
    //Populate if movie ID is given
    if (isset($_GET['movie_id'])) {
        $movieId = $_GET['movie_id'];
        $query = "SELECT * FROM movie WHERE movie_id = '$movieId'";
        $answer = mysqli_query($connect, $query);
        $movie = mysqli_fetch_assoc($answer);
        $movieTitle = $movie['title'];
        if ($movie['poster_url'] == 'https://image.tmdb.org/t/p/w500') {
            $moviePoster = 'https://dummyimage.com/500x750/000/fff';
        } else {
            $moviePoster = $movie['poster_url'];
        }

        $movieCategory = $movie['category'];
        $movieDesc = $movie['synopsis'];
        $movieReleaseDate = $movie['release_date'];
        $movieRating = $movie['rating'];
    ?>
        <div class="container topmrg">
            <form action="details.php?movie_id=<?php echo $movieId ?>" method="post">
                <div class="text-center">
                    <img src="<?php echo $moviePoster ?>">
                </div>
                <input type="text" class="form-control" name="title" id="title" value="<?php echo $movieTitle ?>" readonly>
                <input type="text" class="form-control" name="category" id="category" value="<?php echo $movieCategory ?>" readonly>
                <input type="text" class="form-control" name="posterUrl" id="posterUrl" value="<?php echo $moviePoster ?>" readonly>
                <input type="text" class="form-control" name="release-date" id="release-date" value="<?php echo $movieReleaseDate ?>" readonly>
                <input type="text" class="form-control" name="rating" id="rating" value="<?php echo $movieRating ?>" readonly>
                <textarea class="form-control" name="description" id="description" readonly><?php echo $movieDesc ?></textarea>
                <button class="btn-alx" type="submit" name="save">Save</button>
                <button class="btn-alx" type="submit" name="new">New</button>
            </form>
            <button class="btn-alx" id="edit">Edit</button>
        </div>
    <?php
    } else {
        echo '';
    }
    mysqli_close($connect);
    ?>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="scripts/details.js"></script>
</body>

</html>