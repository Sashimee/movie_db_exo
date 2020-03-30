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
    // $url = 'https://api.themoviedb.org/3/movie/2?api_key=330e20146b752354b54e717c2df62353';
    // $ch = curl_init($url);
    // curl_setopt($ch, CURLOPT_HTTPGET, true);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // $response_json = curl_exec($ch);
    // curl_close($ch);
    // $response = json_decode($response_json, true);
    // var_dump($response);
    // echo $response;

    function CallAPI($method, $url, $data = false)
    {
        $curl = curl_init();

        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);

                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        // Optional Authentication:
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "username:password");

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }

    echo CallAPI('GET', 'https://api.themoviedb.org/3/movie/2?api_key=330e20146b752354b54e717c2df62353');
    ?>


</body>

</html>