<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <style>
    body {
        background-image: url(images/47.jpg);
        background-size: cover;
    }

    form {
       background-image: linear-gradient(to bottom, #faffee, #cfcbae, #aa9773, #896341, #67311a);
        border: 2px solid #343a40;
        border-radius: 90px;
        padding: 19px;
        max-width: 524px;
        margin: auto;
        text-align: center;
    }

    label,
    input[type="text"],
    select {
        font-size: 1.2em;
        padding: 10px;
        margin-bottom: 10px;
        width: 100%;
        box-sizing: border-box;
        border-radius: 5px;
        border: none;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
    }

    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 40%;
        max-width: 100%;
    }


    </style>
    <title>Appointment</title>
</head>

<body>

    <?php 
    include 'conn.php';
    include 'menu.php';
     ?>


    <section class="my-5">
        <div class="py-5">
            <strong style="color:black;">
                <h2 class="text-center">Book Package</h2>
            </strong>
        </div>
        <form action="schedule_appointment.php" method="post" onsubmit="return validateForm()">
            <label for="patient_name">Name:</label>
            <strong style="color: black; font-size: 20px;"><?php echo $_SESSION['patient_name']; ?></strong><br>


            <label for="appointment_date">Appointment Date:</label>
            <input type="date" id="appointment_date" name="appointment_date" min="<?php echo date('Y-m-d'); ?>"
                required><br><br>
            <label for="appointment_time">Appointment Time:</label>
<input type="time" id="appointment_time" name="appointment_time" required step="1800" list="time_slots"><br><br>

<datalist id="time_slots">
  <option value="12:00">
  <option value="12:30">
  <option value="13:00">
  <option value="13:30">
  <option value="14:00">
  <option value="14:30">
  <option value="15:00">
</datalist>


            <label for="specialization">Package:</label>
            <select id="specialization" name="specialization" onchange="getDoctors()">
                <option value="">Select Package</option>
                <option value="Bridal Make Up">Bridal Package</option>
                <option value=" 
Luxury Hair Treatment">Hair Package</option>
                <option value="Body Polishing">Body Polishing Package</option>
                <option value="Waxing">Waxing Package</option>
            </select><br><br>

            <label for="doc_list">Select Type:</label>
            <select id="doc_list" name="doc_id"></select><br><br>

            <label for="mode">Mode of Appointment:</label><br>
            <input type="radio" id="mode" name="mode" value="online" required>Home
            <input type="radio" id="mode" name="mode" value="offline">Salon<br><br>

            <label for="payment">Mode of Payment:</label><br>
            <input type="radio" id="payment" name="payment" value="card" onclick='showCard()'> Card <br>
            <div id='cardDiv' style='display:none'>
                <label for='cardNumber'>Card Number:</label>
                <input type='text' id='cardNumber' placeholder='16 Digit Card Number' name='cardNumber'
                    pattern='[0-9]{16}'>
                <br><br>
                <label for='cardHolderName'>Card Holder Name:</label>
                <input type='text' id='cardHolderName' placeholder='Card Holder Name' name='cardHolderName'>
                <br><br>
                <label for='expiryDate'>Expiry Date:</label>
                <input type='text' id='expiryDate' name='expiryDate' pattern='(0[1-9]|1[0-2])\/[0-9]{2}'
                    placeholder='mm/yy'>
                <br><br>
                <label for='cvv'>CVV:</label>
                <input type='password' id='cvv' name='cvv' placeholder='***' pattern='[0-9]{3}'>
                <br><br>

            </div>
            <input required type="radio" id="payment" name="payment" value="upi" onclick='showUPI()'> UPI <br>
            <div id='upiDiv' style='display:none'>
                <br><img src='images/46.jpg' class='center'>
                <br>

            </div>

            <br><input type="submit" value="Schedule Booking">
        </form>



    </section>

    <?php include 'footer.php' ?>

    <script>
    function showCard() {
        document.getElementById('cardDiv').style.display = "block";
        document.getElementById('cardNumber').required = true;
        document.getElementById('cardHolderName').required = true;
        document.getElementById('expiryDate').required = true;
        document.getElementById('cvv').required = true;

        document.getElementById('upiDiv').style.display = "none";
        document.getElementById('upi').required = false;
    }

    function showUPI() {
        document.getElementById('cardDiv').style.display = "none";
        document.getElementById('cardNumber').required = false;
        document.getElementById('cardHolderName').required = false;
        document.getElementById('expiryDate').required = false;
        document.getElementById('cvv').required = false;

        document.getElementById('upiDiv').style.display = "block";
        document.getElementById('upi').required = true;
    }

    function validateForm() {
        if (document.getElementById('payment').value == "") {
            alert("Please select mode of payment");
            return false;
        }
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    // Populate specialization and doctor name
    document.addEventListener("DOMContentLoaded", function() {
        var urlParams = new URLSearchParams(window.location.search);
        var docName = urlParams.get('doc_name');
        var specialization = urlParams.get('specialization');
        if (docName && specialization) {

            document.querySelector("#specialization").value = specialization;
            getDoctors();
        }
    });

    // Fetch doctors based on specialization
    function getDoctors() {
        var specialization = $("#specialization").val();
        $.ajax({
            type: "POST",
            url: "get_docs.php",
            data: {
                specialization: specialization
            },
            success: function(data) {
                $("#doc_list").html(data);
                // Pre-select doctor name
                if (docName) {
                    document.querySelector("#doc_list").value = docName;
                }
            }
        });
    }

    // Validate appointment form
    function validateForm() {
        var appointment_date = new Date($("#appointment_date").val());
        var appointment_time = new Date("1970-01-01 " + $("#appointment_time").val());
        var today = new Date();
        var selected_datetime = new Date(appointment_date.getFullYear(), appointment_date.getMonth(), appointment_date
            .getDate(), appointment_time.getHours(), appointment_time.getMinutes());
        if (selected_datetime <= today) {
            alert("Appointment date and time should be in future. Please select valid date and time.");
            return false;
        }
        return true;
    }
    </script>
</body>

</html>