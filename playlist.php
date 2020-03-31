<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Da Cat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="style/style.css">
</head>

<body id="cat-bod">
    <div class="container">
        <div class="row">
            <?php
            require_once 'database.php';
            include_once('DataPlaylist.php');
            $user_id = $_SESSION['user_id'];
            $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
            $user_playlist = "SELECT * FROM movie INNER JOIN playlist ON movie.movie_id = playlist.movie_id";
            $res = mysqli_query($connect, $user_playlist);
            $storageArr = [];
            while ($row = mysqli_fetch_assoc($res)) {
                $image = $row['poster_url'];
                $title = false;
                if (strlen($image) == 31) {
                    $image = 'https://dummyimage.com/500x750/000/fff';
                    $title = true;
                } else {
                    $image = $row['poster_url'];
                    $title = false;
                }
                if (!$title) {
                    echo '
                    <div class="col s3">
                        <div class="card">
                        <form class="" method="post">
                        <input style="display:none;" type="text" name="movieIdHex" id="movieIdHex" value="' . $row['movie_id'] . '">
                        <button type="submit" class="" name="addMovPlaylist">Add</button>
                        <button type="submit" class="" name="delMovPlaylist">Remove</button>
                        </form>
                            <a href="details.php?movie_id=' . $row['movie_id'] . '">
                                <div class="card-image">
                                    <img class="poster hoverable" src="' . $image . '">
                                </div>
                                </a>
                        </div>
                        <div class="card info">
                            <div class="card-content">
                                <p class="info-mov-title">' . $row['title'] . '</p>
                                <p>' . $row['rating'] . '/10' . '</p>
                                <p>' . $row['release_date'] . '</p>
                                <p>' . $row['category'] . '</p>
                                <p>' . 'Synopsis: '  . $row['synopsis'] . '</p>
                            </div>
                        </div>
                    </div>';
                } elseif ($title) {
                    echo '
                    <div class="col s3">
                        <div class="card">
                        <form class="" method="post">
                        <input style="display:none;" type="text" name="movieIdHex" id="movieIdHex" value="' . $row['movie_id'] . '">
                        <button type="submit" class="" name="addMovPlaylist">Add</button>
                        <button type="submit" class="" name="delMovPlaylist">Remove</button>
                        </form>
                            <a href="details.php?movie_id=' . $row['movie_id'] . '">
                                <div class="card-image">
                                    <img class="poster hoverable" src="' . $image . '">
                                    <span class="card-title">' . $row['title'] . '</span>
                                    </div> 
                            </a>
                                    <div class="card info">
                                    <div class="card-content">
                                    <p class="info-mov-title">' . $row['title'] . '</p>
                                    <p>' . $row['rating'] . '/10' . '</p>
                                    <p>' . $row['release_date'] . '</p>
                                    <p>' . $row['category'] . '</p>
                                    <p>' . 'Synopsis: ' . $row['synopsis'] . '</p>
                            </div>
                        </div>
                    </div>';
                }
                array_push($storageArr, $row['title'], $row['rating'], $row['release_date'], $row['category'], $row['synopsis']);
            }
            ?>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="scripts/catalogScript.js"></script>
</body>

</html>