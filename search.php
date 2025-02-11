<!-- header-section-starts -->
<?php
include'conn.php';
include'menu.php';
	if(empty($_REQUEST))
	{
		echo "<script>window.open('medicines.php','_self')</script>";
	}	



	?>
<style>
.card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 250px;
    margin: auto;
    margin-top: 70px;
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

.btn {
  background-color: #4CAF50; /* Set the background color */
  border: none; /* Remove border */
  color: white; /* Set text color */
  padding: 12px 24px; /* Set padding */
  text-align: center; /* Center text */
  text-decoration: none; /* Remove underline */
  display: inline-block; /* Set as inline element */
  font-size: 16px; /* Set font size */
  margin: 4px 2px; /* Set margin */
  cursor: pointer; /* Add cursor on hover */
  border-radius: 4px; /* Add border radius */
}
</style>
<!-- header-section-ends -->

<!-- content-section-starts-here -->
<div class="container">
    <div class="main-content">

        <div class="products-grid">
            <header>
                <h3 class="text-center"></h3>
            </header>
            <!--getproductsfunction-->
            <?php	
if(isset($_GET['user_query']))
{
	$user_keyword = $_GET['user_query'];
	$get_prod="select * from product where pro_name like '%$user_keyword%'";					
	$run_prod=mysqli_query($conn,$get_prod);
		$count = mysqli_num_rows($run_prod);

	if($count==0)
{
		
echo '<script>alert("Sorry, Item Not Found!"); window.location.href = "medicines.php";</script>';
  
}

	
	while($row_prod=mysqli_fetch_array($run_prod))
	{
		$pro_id=$row_prod['pro_id'];
		$pro_name=$row_prod['pro_name'];
		$pro_price=$row_prod['pro_price'];		
		$pro_desc=$row_prod['pro_desc'];	
		$pro_image=$row_prod['pro_image'];	
		

				echo "	<div class='col-lg-12 col-md-12 col-12'>
	<div class='card my-5'>
		<a href='medicines.php'><img class='aboutimg' src='$pro_image' style='width:100%' alt='' /></a>
		<label><h4>$pro_name</h4></label>
		<label><i>$pro_desc </i></label> 
		<p><label class='price'>&#x20B9;$pro_price</label></p>
		<p><button id='add-to-cart-btn' data-product-id='$pro_id'>Add to Cart</button></p>
	</div>
</div>";
					
	}
}	
?>
            <!--//productsfunction-->

            <div class="clearfix"></div>
        </div>
    </div>

</div>
<!-- content-section-ends-here -->
<div class="my-2" style="text-align: center;">
    <a href="medicines.php"><button class="btn">Go Back</button></a>
</div>




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
</body>

</html>