  <!-- header-section-starts -->

  <?php
    include 'menu.php';
    include 'carousel.php';
    include 'conn.php'; 
  ?>

  <head>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
      <style>
      .display {
          display: flex;
          align-items: center;
          justify-content: center;
          min-height: 100vh;
      }

      .card {
          position: relative;
          width: 700px;
          height: 400px;
          border-radius: 0px;
          display: flex;
          align-items: center;
          transition: 0.5s;
      }

      .card .circle {
          top: 0;
          left: 0;
          width: 100%;
          border-radius: 20px;
          overflow: hidden;
      }

      .card .circle::before {
          content: '';
          position: absolute;
          top: -20px;
          left: -100px;
          width: 124%;
          height: 105%;
          clip-path: circle(160px at center);
          background: #fff;
          transition: 0.5s;
      }

      .card:hover .circle::before {
          background: white;
          clip-path: circle(400px at center);
      }

      .card img {
          position: absolute;
          top: 58%;
          left: 50%;
          transform: translate(-50%, -50%);
          height: 300px;
          pointer-events: none;
          transition: 0.5s;
          border-radius: 10%;
      }

      .card:hover img {
          left: 78%;
          height: 400px;
      }

      .card .content {
          position: relative;
          width: 100%;
          left: 20%;
          padding: 100px 340px 50px 0px;
          transition: 0.5s;
          opacity: 0;
          visibility: hidden;
      }

      .card:hover .content {
          left: 0;
          opacity: 1;
          visibility: visible;
      }

      .card .content h2 {
          margin-bottom: 5px;
          color: black;
          font-size: 2em;
          line-height: 1em;
      }

      .card .content p {
          color: black;
      }

      .card .content a {
          display: inline-block;
          margin-top: 10px;
          padding: 10px 20px;
          background-color: #FFC107;
          color: white;
          background: #170000;
          border-radius: 5px;
          text-decoration: none;
          transition: 0.5s;
          position: relative;
      }

      .card .price {
          color: black;
          font-size: 22px;
      }

      .card:hover h5 {
          visibility: hidden;
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
  </head>
  <!-- header-section-ends -->

  <!-- content-section-starts-here -->

  <div class="container">

      <div class="main-content">

          <div class="products-grid">
              <header>
                  <div class="py-5">
                      <h2 class="text-center">Our Packages</h2>
                  </div>
              </header>
              <!--getproductsfunction-->
              <?php 
  
  $start=0; // limit=1,2;
  $limit=6; // limit=2,2;
  $t=mysqli_query($conn,"select * from doctors ");
  $total=mysqli_num_rows($t);
  if(isset($_GET['id']))
  {
    $id=$_GET['id'];  //$start=2*1;
    $start=($id-1)*$limit;  //$start=2;
  }
  else
  {
    $id=1;
  }
  $page=ceil($total/$limit);

  $get_doc="select * from doctors WHERE status = 'approved' limit $start,$limit";          
  $run_doc=mysqli_query($conn,$get_doc);
  while($row_doc=mysqli_fetch_array($run_doc))
  {
    $doc_id=$row_doc['doc_id'];
    $doctor_name=$row_doc['doctor_name'];
    $doc_desc=$row_doc['doc_desc'];  
    $doc_price=$row_doc['doc_price']; 
    $specialization=$row_doc['specialization'];
    $doc_image=$row_doc['doc_image'];  

    echo "<div class='py-5'>
      <div class='card'><div style='text-align:right;'><h5>$specialization</h5></div>
        <div class='circle'>
          <div class='content'>
            <h2><label class='product_name' href='details.php?pro_id=$doc_id'><h4>$doctor_name</h4></label></h2>
            <p>$doc_desc</p>
            <p><label class='item_add' href='index.php?add_cart=$doc_id'><i> </i> <span class='price'>&#x20B9;$doc_price</span></label></p>";

    if (isset($_SESSION['loggedin'])) { // Check if the user is logged in
      echo "<a href='appointment.php?doc_name=".$doctor_name."&specialization=".$specialization."'>Book Appointment</a>";
    } else {
      echo "<a data-toggle='modal' data-target='#login' href='#'>Login to Book Appointment</a>";
    }

    echo "</div><img src='$doc_image' alt=''/></div></div>";
  }
?>




              <!--//productsfunction-->

              <div class="clearfix"></div>
          </div>
      </div>

      <br />
  </div>
  <!-- content-section-ends-here -->

  <?php include 'footer.php' ?>

  <button onclick='topFunction()' id='myBtn' title='Go to top'><i class='fas fa-arrow-up'></i></button>
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
  </body>

  </html>