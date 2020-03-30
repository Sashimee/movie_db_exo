<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    include_once('../database.php');
    $dbConnection = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

    for ($i = 0; $i < 250; $i++) {
        $curl = curl_init();
        $opts = [
            CURLOPT_URL => 'https://api.themoviedb.org/3/movie/' . $i . '?api_key=330e20146b752354b54e717c2df62353',
            CURLOPT_RETURNTRANSFER => true,
        ];
        curl_setopt_array($curl, $opts);
        $response_json = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response_json, true);
        if (isset($response['status_code'])) {
            echo 'movie number ' . $i . ' not found' . '<br>';
        } else {
            echo $response['original_title'];
            echo '<br>';
            $query = "INSERT INTO movie(title, poster_url, synopsis, category, release_date, rating) VALUES ('" . $response['original_title'] . "','" . "https://image.tmdb.org/t/p/w500" .  $response['poster_path'] . "','" . $response['overview'] . "','" . $response['genres'][0]['name'] . "','" . $response['release_date'] . "','" . $response['vote_average'] . "')";
            mysqli_query($dbConnection, $query);
        }
    }
    mysqli_close($dbConnection);
    ?>
</body>

</html>