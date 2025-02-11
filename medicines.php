<?php 
session_start();
include 'conn.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <style>
    body {
        background-color: white;
    }

    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 250px;
        margin: auto;
        text-align: center;
        font-family: arial;
    }

    .price {
        color: black;
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

    .pagination {
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0;
    }

    .pagination-lg>li>a {
        padding: 10px 16px;
        font-size: 18px;
    }

    .pagination>li {
        display: inline-block;
        margin: 0 5px;
    }

    .pagination>li>a {
        color: #333;
        border: 1px solid #ddd;
        border-radius: 3px;
        text-decoration: none;
    }

    .pagination>li>a:hover,
    .pagination>li>a:focus {
        background-color: #ddd;
    }

    .pagination>.active>a,
    .pagination>.active>a:hover,
    .pagination>.active>a:focus {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

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

    #myBtn {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 30px;
        z-index: 99;
        font-size: 18px;
        border: none;
        outline: none;
        background-color: #f44336;
        color: white;
        cursor: pointer;
        padding: 15px;
        border-radius: 4px;
    }

    #myBtn:hover {
        background-color: #555;
    }
    </style>

    <title>look</title>
</head>

<body>

    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="home.php">look</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="home.php">Home </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="medicines.php">Products <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="articles.php">Advisories</a>
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
                    <form class="form-inline" method="get" action="search.php" id="search"
                        enctype="multipart/form-data">
                        <input class="form-control ml-sm-2 mr-sm-2" name="user_query" type="text" size="20"
                            placeholder="Search..." />
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
            <h2 class="text-center">Products</h2>
        </div>
    </section>

    <div class="container-fluid">
        <div class="main-content">
            <div class="products-grid">

                <!--getproductsfunction-->
                <?php
			$start = 0;
			$limit = 6;
			$t = mysqli_query($conn, "select * from product");
			$total = mysqli_num_rows($t);
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$start = ($id - 1) * $limit;
			} else {
				$id = 1;
			}
			$page = ceil($total / $limit);

			$get_prod = "select * from product limit $start,$limit";
			$run_prod = mysqli_query($conn, $get_prod);
			while ($row_prod = mysqli_fetch_array($run_prod)) {
				$pro_id = $row_prod['pro_id'];
				$pro_name = $row_prod['pro_name'];
				$pro_desc = $row_prod['pro_desc'];
				$pro_price = $row_prod['pro_price'];
                $pro_image = $row_prod['pro_image'];

				echo "
					<div class='col-lg-12 col-md-12 col-12'>
					<div class='card my-5'>
					<a href='medicines.php'><img class='aboutimg' src='$pro_image' style='width:100%' alt='' /></a>
					<label><h4>$pro_name</h4></label>
					<label><i>$pro_desc </i></label> 
					<p><label class='price'>&#x20B9;$pro_price</label></p>
					<p><button id='add-to-cart-btn' data-product-id='$pro_id'>Add to Cart</button></p>
					</div>
					</div>
					";

			}
			?>

                <button onclick='topFunction()' id='myBtn' title='Go to top'><i class='fas fa-arrow-up'></i></button>


                <!--//productsfunction-->

                <div class="clearfix"></div>
            </div>
        </div>

        <br />
        <div align="center" style="display:block;">
            <nav>
                <ul class="pagination pagination-lg">
                    <?php if ($id > 1) { ?>
                    <li><a href="?id=<?php echo ($id - 1) ?>">Previous</a></li>
                    <?php } ?>
                    <?php
				for ($i = 1; $i <= $page; $i++) {
					?>
                    <li><a href="?id=<?php echo $i ?>"><?php echo $i; ?></a></li>
                    <?php
				}
				?>
                    <?php if ($id != $page) //3!=4
				{ ?>
                    <li><a href="?id=<?php echo ($id + 1); ?>">Next</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>

    <?php include 'footer.php' ?>


    <script>
    const addToCartBtn = document.querySelectorAll('#add-to-cart-btn');

    addToCartBtn.forEach(function(button) {
        button.addEventListener('click', function() {
            const productId = button.getAttribute('data-product-id');

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'add_to_cart.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send(`pro_id=${productId}`);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        alert("Item added successfully to the cart");
                    } else {
                        console.log('Error adding item to cart');
                        alert('Error adding item to cart');
                    }
                }
            };
        });
    });
    </script>
    <script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>