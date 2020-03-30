<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // $response = file_get_contents('https://api.themoviedb.org/3/movie/2?api_key=330e20146b752354b54e717c2df62353');
    // $response = json_decode($response);
    // echo $response;
    $url = 'https://api.themoviedb.org/3/movie/2?api_key=330e20146b752354b54e717c2df62353';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response_json, true);
    ?>
</body>

</html>