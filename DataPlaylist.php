<?php
//PLAYLIST SECTION
$movieId = $_POST['movieIdHex'];
include_once('database.php');
include_once('playlist.php');
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
