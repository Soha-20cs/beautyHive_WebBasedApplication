<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .sidebar {
        background-color: #343a40 !important;
        color: #fff;
        height: 100vh;
        padding: 20px;
        position: fixed;
        width: 250px;
    }

    .sidebar a {
        color: #fff;
        display: block;
        margin-bottom: 30px;
        text-decoration: none;
    }

    .sidebar a:hover {
        color: rgb(0, 212, 255);
    }

    .main-content {
        margin-left: 250px;
        padding: 80px;
    }

    .navbar {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1;
    }

    .upcoming-appointments {
        border: 1px solid #ccc;
        padding: 20px;
        margin-bottom: 20px;
    }

    .today-appointments {
        border: 1px solid #ccc;
        padding: 20px;
        margin-bottom: 20px;
    }

    .appointment-history {
        border: 1px solid #ccc;
        padding: 20px;
        margin-bottom: 20px;
    }

    .tiles {
        background-color: #ffffff;
        padding: 100px;
        border-radius: 15px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 40px;
        margin-top: 40px;
    }

   /* Add a gradient background color for the tiles */
    .tiles.green {
        background-image: linear-gradient(135deg, #536976 10%, #292E49 100%);
        color: #ffffff;
    }

    .tiles.blue {
        background-image: linear-gradient(135deg, #603813 10%, #b29f94 100%);
        color: #ffffff;
    }

    /* Add a hover effect for the tiles */
    .tiles:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .side-user-img {
        width: 150px;
        height: 150px;
        margin-top: 50px;
        object-position: center center;
        margin-left: 28px;
    }
    table {
          width: 95%;
          border-collapse: separate;
          margin: 0 auto;
      }

      th,
      td {
          border: 1px solid black;
          padding: 8px;
          text-align: center;
      }

      th {
          background-color: #f2f2f2;
      }
      .remove-btn {
        background-color: red;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        box-shadow: 2px 2px 5px #ccc;
        cursor: pointer;
    }
    .success-btn {
        background-color: green;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        box-shadow: 2px 2px 5px #ccc;
        cursor: pointer;
    }
    </style>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="home.php">look | Admin Portal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php"><span class="fa fa-power-off"></span> </a>
                </li>
            </ul>
        </div>
    </nav>



    <div class="sidebar">
        <div class="user-info-wrapper">
            <div>
                <img src="images/10.jpg" class="side-user-img" />
            </div>
            <div class="user-info">
                <div class="text-center">Welcome Admin</div>
                <div class="my-4"></div>
            </div>
        </div>
        <a href="admin_login.php"><span class="fa fa-pencil"></span> Dashboard</a>
        <a href="manage_doctors.php"><span class="fa fa-user-md"></span> Manage Packages</a>
        <a href="verify_doctors.php"><span class="fa fa-check"></span> Add Packages</a>
        <a href="manage_patients.php"><span class="fa fa fa-users"></span> Manage Users</a>
        <a href="view_appointments.php"><span class="fa fa-ticket"></span> Bookings</a>
        <a href="add_products.php"><span class="fa fa-plus-circle"></span> Add Products</a>
        <a href="manage_products.php"><span class="fa fa-tasks"></span> Manage Products</a>
        <a href="view_sales.php"><span class="fa fa-pencil"></span> Sales</a>
        <a href="admin_profile.php"><span class="fa fa-smile-o"></span> Profile</a>
    </div>