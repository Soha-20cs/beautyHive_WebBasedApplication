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

	    </style>

	    <title>look</title>
	</head>

	<body>

	    <?php include 'menu.php' ?>

	    <section class="my-5">
	        <div class="py-5">
	            <h2 class="text-center">Contact Us</h2>
	        </div>
	        <div class="w-50 m-auto">
	            <form action="comments.php" method="POST">
	                <div class="form-group">
	                    <label for="username">Name</label>
	                    <input type="text" id="username" name="username" autocomplete="off" class="form-control">
	                </div>
	                <div class="form-group">
	                    <label for="email">Email ID</label>
	                    <input type="email" id="email" name="email" autocomplete="off" class="form-control">
	                </div>
	                <div class="form-group">
	                    <label for="mobile">Mobile No.</label>
	                    <input type="tel" id="mobile" name="mobile" autocomplete="off" class="form-control">
	                </div>
	                <div class="form-group">
	                    <label for="comments">Comments</label>
	                    <textarea id="comments" name="comments" autocomplete="off" class="form-control"></textarea>
	                </div>
	                <button type="submit" class="btn btn-primary">Submit</button>
	            </form>
	        </div>
	    </section>

	    <?php include 'footer.php' ?>

	    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
	    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	</body>

	</html>