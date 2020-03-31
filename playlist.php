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
                            <a href="details.php?movie_id=' . $row['movie_id'] . '">
                                <div class="card-image">
                                    <img class="poster hoverable" src="' . $image . '">
                                </div>
                                <form class="formForm" method="post">
                                <button type="submit" class="btn" name="addMovPlaylist">Add to Playlist</button>
                                <button type="submit" class="btn" name="delMovPlaylist">Remove from Playlist</button>
                                </form>
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
                            <a href="details.php?movie_id=' . $row['movie_id'] . '">
                                <div class="card-image">
                                    <img class="poster hoverable" src="' . $image . '">
                                    <span class="card-title">' . $row['title'] . '</span>
                                    <button type="submit" class="" name="addMovPlaylist">Add Playlist</button>
                                    <button type="submit" class="" name="delMovPlaylist">Remove Playlist</button>
                                </div> 
                            </a>       
                        </div>
                        <div class="card info">
                            <div class="card-content">
                                <p class="info-mov-title">' . $row['title'] . '</p>
                                <p>' . $row['rating'] . '/10' . '</p>
                                <p>' . $row['release_date'] . '</p>
                                <p>' . $row['category'] . '</p>
                                <p>' . 'Synopsis: ' . $row['synopsis'] . '</p>
                                <form class="" method="post">
                                </form>
                            </div>
                        </div>
                    </div>';
                }
                array_push($storageArr, $row['title'], $row['rating'], $row['release_date'], $row['category'], $row['synopsis']);
                //PLAYLIST SECTION
                $movieId = $row['movie_id'];
                include_once('database.php');
                $db = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

                //UserPlaylistRecover
                $user_playlist_query = "SELECT * FROM playlist WHERE user_id= $user_id";
                $result = mysqli_query($db, $user_playlist_query);
                $playlist = mysqli_fetch_assoc($result);

                //ADD Movie to Playlist
                if (isset($_POST['addMovPlaylist'])) {
                    $addMovPlaylist = "INSERT INTO playlist (user_id, movie_id) VALUES ($user_id, $movieId)";
                    var_dump($addMovPlaylist);
                    mysqli_query($db, $addMovPlaylist);
                }

                //REMOVE from playlist
                if (isset($_POST['delMovPlaylist'])) {
                    $delMovPlaylist = "DELETE FROM playlist WHERE user_id= $user_id AND movie_id= $movieId";
                    var_dump($delMovPlaylist);
                    mysqli_query($db, $delMovPlaylist);
                }
            }
            ?>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="scripts/catalogScript.js"></script>
</body>

</html>