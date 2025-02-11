<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>



  <style>
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      max-width: 250px;
      margin: auto;
      text-align: center;
      font-family: arial;
    }

    .price {
      color: grey;
      font-size: 22px;
    }

    .card button {
      border: none;
      outline: 0;
      padding: 12px;
      color: white;
      background-color: #000;
      text-align: center;
      cursor: pointer;
      width: 100%;
      font-size: 18px;
    }

    .card button:hover {
      opacity: 0.7;
    }
  </style>

  <title>look</title>
</head>
<body>

  <!--navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="home.php">look</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
          <a class="nav-link" href="home.php">Home </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="medicines.php">Medicines <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="articles.php">Articles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">Cart</a>
        </li>
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
          echo '<li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
          </li>';
        } else {
          echo '<li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#login" href="#"><span class="glyphicon glyphicon-user"></span> Login</a>
          </li>';
        }
        ?>
        <div class="search">
          <form class="form-inline" method="get" action="search.php" id="search" enctype="multipart/form-data">
            <input class="form-control ml-sm-2 mr-sm-2" name="user_query" type="text" size="20" placeholder="Search..." />
            <button class="btn btn-outline-primary" type="submit">Search</button>
          </form>
        </div>
      </ul>
    </div>
  </nav>

  <?php include 'login.php'?>

  <div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
      <li data-target="#demo" data-slide-to="3"></li>
    </ul>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/1.jpg" alt="practo" width="1100" height="500">   
      </div>
      <div class="carousel-item">
        <img src="images/8.jpg" alt="Chicago" width="1100" height="500">  
      </div>
      <div class="carousel-item">
        <img src="images/9.jpg" alt="New York" width="1100" height="500">  
      </div>
      <div class="carousel-item">
        <img src="images/16.jpg" alt="New York" width="1100" height="500">  
      </div>
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>


  <section class="my-5">
    <div>
      <h2 class="text-center">Essentials</h2>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>