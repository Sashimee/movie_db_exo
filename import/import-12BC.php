<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    for ($i = 0; $i < 5; $i++) {
        $curl = curl_init();
        $opts = [
            CURLOPT_URL => 'https://api.themoviedb.org/3/movie/' . $i . '?api_key=330e20146b752354b54e717c2df62353',
            CURLOPT_RETURNTRANSFER => true,
        ];
        curl_setopt_array($curl, $opts);
        $response = curl_exec($curl);
        curl_close($curl);
        var_dump($response);
    }
    ?>
</body>

</html>