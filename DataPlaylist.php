<?php
//PLAYLIST SECTION
include_once('database.php');
$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
$user_id = $_SESSION['user_id'];

//UserPlaylistRecover
$user_playlist_query = "SELECT * FROM playlist WHERE user_id= $user_id";
$result = mysqli_query($db, $user_playlist_query);
$playlist = mysqli_fetch_assoc($result);

//ADD Movie to Playlist
if (isset($_POST['addMovPlaylist'])) {
    unset($_POST['delMovPlaylist']);
    $movieId = $_POST['movieIdHex'];
    $addMovPlaylist = "INSERT INTO playlist (user_id, movie_id) VALUES ($user_id, $movieId)";
    var_dump($addMovPlaylist);
    mysqli_query($db, $addMovPlaylist);
}

//REMOVE from playlist
if (isset($_POST['delMovPlaylist'])) {
    unset($_POST['addMovPlaylist']);
    $movieId = $_POST['movieIdHex'];
    $delMovPlaylist = "DELETE FROM playlist WHERE user_id= $user_id AND movie_id= $movieId";
    var_dump($delMovPlaylist);
    mysqli_query($db, $delMovPlaylist);
}
