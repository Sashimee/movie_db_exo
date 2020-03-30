<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $response = file_get_contents('https://api.themoviedb.org/3/movie/2?api_key=330e20146b752354b54e717c2df62353');
    $response = json_decode($response);
    echo $response;
    ?>
</body>

</html>