<?php
//PLAYLIST SECTION
$user_id = $_SESSION['user_id'];

//UserPlaylistRecover
$user_playlist_query = "SELECT * FROM playlist WHERE user_id= $user_id";
$result = mysqli_query($db, $user_check_query);
$playlist = mysqli_fetch_assoc($result);

//ADD Movie to Playlist
if (isset($_POST['addMovPlaylist'])) {
    include_once('details.php');
    $addMovPlaylist = "INSERT INTO playlist (user_id, movie_id) VALUES ($user_id, $movieId)";
    var_dump($addMovPlaylist);
    mysqli_query($db, $addMovPlaylist);
}

//REMOVE from playlist
if (isset($_POST['delMovPlaylist'])) {
    include_once('details.php');
    $delMovPlaylist = "DELETE FROM playlist WHERE user_id= $user_id AND movie_id= $movieId";
    var_dump($delMovPlaylist);
    mysqli_query($db, $delMovPlaylist);
}
