<?php  ("nav-bar.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Nav bard</title>
</head>
<body>


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
    <form class="form-inline my-2 my-lg-0">        
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


<!--
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
<!--
<nav id="nab-bar">
    <div class="nav-wrapper grey darken-4">
      <a href="index.php" class="brand-logo left">Anything Movie</a>
      <span class="center">Welcome </span>
      <ul id="nav-mobile" class="right hide-on-med-and-down ">        
        <li><a href="sass.html">Genre</a></li>
        <li><a href="catalog.php">Movies</a></li>
        <li><a href="index.php?logout='1'">LogOut</a></li>
      </ul>
    </div>
  </nav>
-->
    
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
</body>
</html>