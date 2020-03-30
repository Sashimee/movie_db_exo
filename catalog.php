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
            while ($row = mysqli_fetch_assoc($res)) {
                echo '
                    <div class="col s3">
                        <div class="card">
                            <div class="card-image">
                                <img src="' . (strlen($row['poster_url']) === 33) ? 'https://dummyimage.com/500x750/000/fff' : $row['poster_url'] . '">
                               <span class="card-title">' . $row['title'] . '</span>
                            </div>        
                        </div>
                    </div>';
            }
            ?>


        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>