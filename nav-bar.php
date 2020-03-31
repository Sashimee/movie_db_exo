<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="style/style.css">
  <title>Nav bard</title>
</head>

<body>

  <nav>
    <div class="nav-wrapper grey darken-4">
      <span class="brand-logo">Anything The Movies</span>
      <a href="userpage.php" class="brand-logo center">Welcome <strong><?php echo $_SESSION['username']; ?></strong></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="userpage.php">User</a></li>
        <li><a href="playlist.php">Playlist</a></li>
        <li><a href="catalog.php">Movies</a></li>
        <li><a href="index.php?logout='1'">Log Out</a></li>
        <div class="input-field inline">

          <input id="search_inline" type="search" name="searchName" class="validate">
          <label for="search_inline">Search</label>

        </div>
      </ul>
    </div>
  </nav>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="scripts/catalogScript.js"></script>

</body>

</html>