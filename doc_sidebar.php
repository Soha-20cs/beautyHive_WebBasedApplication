      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="home.php">look | Doctor Portal</a>
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
            
               <?php $doc_id = mysqli_real_escape_string($conn, $_SESSION['doc_id']);

    $get_pic = "SELECT doc_image FROM doctors WHERE doc_id = '$doc_id'";
    $run_pic = mysqli_query($conn, $get_pic);
    $row_pic = mysqli_fetch_assoc($run_pic);
    $doc_image = $row_pic['doc_image'];
?>
<div>
    <img src="<?php echo $doc_image; ?>" class="side-user-img" />
</div>
              <div class="user-info">
                  <div class="text-center">Welcome Doctor</div>
                  <div class="my-4"></div>
              </div>
          </div>
          <a href="doctor_login.php"><span class="fa fa-pencil"></span> Dashboard</a>
          <a href="upcoming_appointments.php"><span class="fa fa-filter"></span> Upcoming Appointments</a>
          <a href="today_appointments.php"><span class="fa fa-tasks"></span> Today's Appointments</a>
          <a href="appointment_history.php"><span class="fa fa-history"></span> Appointment History</a>
          <a href="doctor_profile.php"><span class="fa fa-smile-o"></span> Profile</a>
      </div>