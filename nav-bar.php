<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <title>Nav bard</title>
</head>

<body>

  <!-- bootstrap
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <span class="navbar-brand">Anything The Movies</span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="userpage.php">User <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="catalog.php">Movies</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php?logout='1'">Log Out</a>
        </li>
      </ul>
      <span class="text-light" style="margin-right:2rem">Welcome <strong><?php echo $_SESSION['username']; ?></strong></span>
      <form action="search.php" class="form-inline my-2 my-lg-0" method="get">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchName">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
-->




  <!-- by hand, requires uncommenting style.css
<nav class="nav-bar">
<div class="navbarSection" >
      <a href="index.php">
          <h1>Anything The Movies</h1>
        </a>
      <h2>Welcome </h2>
      <ul>        
        <li><a href="sass.html">Genre</a></li>
        <li><a href="catalog.php">Movies</a></li>
        <li><a href="index.php?logout='1'">Log Out</a></li>
      </ul>
    </div>

</nav>
-->

  <nav>
    <div class="nav-wrapper grey darken-4">
      <span class="brand-logo">Anything The Movies</span>
      <a href="userpage.php" class="brand-logo center">Welcome </a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="userpage.php">User</a></li>
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

</body>

</html>