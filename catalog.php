<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Da Cat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
</head>
<?php require_once 'nav-bar.php';
include_once('DataPlaylist.php'); ?>

<body id="cat-bod">
    <div class="container">
        <div class="row">
            <!-- <a class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Release</a> -->
            <div class="input-field col s12">
                <select class="browser-default" id="catSel">
                    <option value="0" disabled selected>Choose your category</option>
                    <?php
                    $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
                    $catQuery = 'SELECT DISTINCT category FROM movie';
                    $catRes = mysqli_query($connect, $catQuery);
                    while ($row = mysqli_fetch_assoc($catRes)) {
                        $i++;
                        echo '<option value="' . $row['category'] . '">' . $row['category'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <?php
            $query = 'SELECT * FROM movie ORDER BY rating DESC';
            $res = mysqli_query($connect, $query);
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
                        <div class="playlistForm">
                        <form method="post">
                        <input style="display:none;" type="text" name="movieIdHex" value="' . $row['movie_id'] . '">
                        <button type="submit" class="playlistbtn" name="addMovPlaylist">Add</button>
                        </form>
                        </div>
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
                        <div class="playlistForm">
                        <form method="post">
                        <input style="display:none;" type="text" name="movieIdHex" value="' . $row['movie_id'] . '">
                        <button type="submit" class="playlistbtn" name="addMovPlaylist">Add</button>
                        </form>
                        </div>
                            <a href="details.php?movie_id=' . $row['movie_id'] . '">
                                <div class="card-image">
                                    <img class="poster hoverable" src="' . $image . '">
                                    <span class="card-title">' . $row['title'] . '</span>
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
                            </div>
                        </div>
                    </div>';
                }
            }
            mysqli_close($connect);
            ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="scripts/catalogScript.js"></script>
</body>

</html>