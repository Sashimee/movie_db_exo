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
            $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
            $query = 'SELECT * FROM movie';
            $res = mysqli_query($connect, $query);
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
                array_push($storageArr, $row['title'], $row['rating'], $row['release_date'], $row['category'], $row['synopsis']);
            }
            var_dump($storageArr);
            var_dump($_POST);
            ?>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="scripts/catalogScript.js"></script>
</body>

</html>