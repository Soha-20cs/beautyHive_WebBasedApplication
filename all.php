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
</style>
<!-- header-section-ends -->
<!-- content-section-starts-here -->
<div class="container-fluid">
    <div class="main-content">
        <div class="products-grid">

            <!--getproductsfunction-->
            <?php
			$start = 0;
			$limit = 6;
			$t = mysqli_query($con, "select * from product");
			$total = mysqli_num_rows($t);
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$start = ($id - 1) * $limit;
			} else {
				$id = 1;
			}
			$page = ceil($total / $limit);

			$get_prod = "select * from product limit $start,$limit";
			$run_prod = mysqli_query($con, $get_prod);
			while ($row_prod = mysqli_fetch_array($run_prod)) {
				$pro_id = $row_prod['pro_id'];
				$pro_name = $row_prod['pro_name'];
				$pro_desc = $row_prod['pro_desc'];
				$pro_price = $row_prod['pro_price'];

				$get_pic = "select i.* from image i,product p where p.pro_id='$pro_id' and p.pro_id=i.pro_id";
				$run_pic = mysqli_query($con, $get_pic);

				while ($row_pic = mysqli_fetch_array($run_pic)) {
					$pro_im = $row_pic['image_name'];
				}

				echo "
					<div class='col-lg-12 col-md-12 col-12'>
					<div class='card my-5'>
					<a href='medicines.php'><img class='aboutimg' src='$pro_im' style='width:100%' alt='' /></a>
					<label><h4>$pro_name</h4></label>
					<label><i>$pro_desc </i></label> 
					<p><label class='price'>&#x20B9;$pro_price</label></p>
					<p><button id='add-to-cart-btn' data-product-id='$pro_id'>Add to Cart</button></p>
					</div>
					</div>
					";

			}
			?>




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
<!-- content-section-ends-here -->

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