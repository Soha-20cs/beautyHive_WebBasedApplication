<!DOCTYPE html>
<html>
  <?php
  session_start(); 
include 'conn.php';

// Validate the input for $doc_id
if (!isset($_SESSION['pid'])) {
    echo "Missing required session variable 'pid'.";
    exit();
}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="home.css" rel="stylesheet">
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
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="doctors.php">Packages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="appointment.php">Booking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="medicines.php">Products</a>
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
                    <a class="nav-link" href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

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
        <div class="py-5">
            <h2 class="text-center">Our Services</h2>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="card">
                        <img class="card-img-top aboutimg" src="images/10.jpg" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">Bookings</h4>
                            <p class="card-text">Connect within minutes.</p>
                            <a href="appointment.php" class="btn btn-primary stretched-link">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="card">
                        <img class="card-img-top aboutimg" src="images/15.jpg" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">Packages</h4>
                            <p class="card-text">Find best doctors all over world.</p>
                            <a href="doctors.php" class="btn btn-primary stretched-link">Find Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="card">
                        <img class="card-img-top aboutimg" src="images/13.jpg" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">Products</h4>
                            <p class="card-text">Get essentials at your doorstep.</p>
                            <a href="medicines.php" class="btn btn-primary stretched-link">Order Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="card">
                        <img class="card-img-top aboutimg" src="images/14.jpg" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">Advisories</h4>
                            <p class="card-text">Read top articles by doctors.</p>
                            <a href="articles.php" class="btn btn-primary stretched-link">Read Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<section class="my-5">
          <div class="py-5">
              <h2 class="text-center">Advisories</h2>
          </div>

          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-4 col-md-6 col-12">
                      <div class="card">
                          <img class="card-img-top aboutimg" src="images/17.jpg" alt="Card image">
                          <div class="card-body">
                              <h4 class="card-title">Chilled tea bags for puffy eyes</h4>
                              <p class="card-text">Dr.Rashmi Bamane<br>Dentist</p>
                              <a href="articles.php" class="btn btn-primary stretched-link">Read Now</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-12">
                      <div class="card">
                          <img class="card-img-top aboutimg" src="images/18.jpg" alt="Card image">
                          <div class="card-body">
                              <h4 class="card-title">Tomatoes to control excess oil!</h4>
                              <p class="card-text">Dr.Darpan Kaur<br>Psychiatrist</p>
                              <a href="articles.php" class="btn btn-primary stretched-link">Read Now</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-12">
                      <div class="card">
                          <img class="card-img-top aboutimg" src="images/19.jpg" alt="Card image">
                          <div class="card-body">
                              <h4 class="card-title">Papaya to get rid of dead skin!</h4>
                              <p class="card-text">Dr.Vishwas Virmani(PT)<br>Physiotherapist</p>
                              <a href="articles.php" class="btn btn-primary stretched-link">Read Now</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>


    <section class="my-5">
        <div class="py-5">
            <h2 class="text-center">About Us</h2>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <img src="images/11.jpg" class="img-fluid aboutimg">
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <h2 class="text-center my-5">Our Mission</h2>
                    <p>look is on a mission to make quality healthcare affordable and accessible for over a billion+
                        Indians. We believe in empowering our users with the most accurate, comprehensive, and curated
                        information and care, enabling them to make better healthcare decisions.</p>
                    <h2 class="text-center my-5">Health is a habit</h2>
                    <p>It is the journey that takes you to new destinations every day with endless possibilities of life
                        on the back of happiness, energy, and hope. Practo wants to make this journey easy for every
                        Indian and help them live healthier and longer lives.</p>
                    <h2 class="text-center my-5">Our offerings</h2>
                    <p>-Comprehensive medical directory with detailed, verified information about more than a lakh
                        doctor partners across the country.</p>
                    <p>-Online appointment booking at over 9,000 leading hospitals and clinics with doctors who use
                        Practo Prime.</p>
                    <p>-Online consultation with trusted doctors across 20+ specialities.</p>
                    <p>-Plus, subscription-based health plans, that provide unlimited online consultations* with doctors
                        24*7*365.</p>

                    <p>-Ray, Practo’s award-winning practice management software, which is used by 10,000+ clinics.</p>
                    <p>-Insta, a full-stack HIMS solution, which is trusted by 500+ clients across 1,200+ facilities.
                    </p>
                    <p>-Diagnostic Tests through Practo Associate Labs to get samples collected from the comfort and
                        safety of one’s home.</p>
                    <p>-Medicine delivery by a network of verified pharmacies across the country.</p>
                    <p>*Fair usage policy applicable.</p>
                    <a href="about.php">Read More...</a>
                </div>
            </div>
        </div>
    </section>


    <?php include 'footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>