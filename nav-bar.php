<?php  ("nav-bar.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Nav bard</title>
</head>
<body>

<nav id="nab-bar">
    <div class="nav-wrapper grey darken-4">
      <a href="index.php" class="brand-logo">Anything Movie</a>
      <a class="center">Welcome <strong><?php echo $_SESSION['username']; ?></strong></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">        
        <li><a href="sass.html">Genre</a></li>
        <li><a href="catalog.php">Movies</a></li>
        <li><a href="index.php?logout='1'">LogOut</a></li>
      </ul>
    </div>
  </nav>

    
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>