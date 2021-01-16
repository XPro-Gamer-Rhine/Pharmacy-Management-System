<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "stock";

    $conn = mysqli_connect($host,$user,$pass,$database);
    
    //$sql = "SELECT * FROM products";
    if(!empty($_GET['search'])){
    	$name = $_GET['search'];
    }else{
    	$name = '';
    }
    $sql = "SELECT * FROM products WHERE name ='$name'";
	// if( isset($_GET['search']) ){
	//     $name = mysqli_real_escape_string($conn, htmlspecialchars($_GET['search']));
	    
	// }
	$result = $conn->query($sql);
	?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Obat+</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="icon" href="logo.png">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>



    <div class="site-branding-area">    
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        
                        <h1><a href="index.php"><img src="logo.png" height="100" width="100"><strong>Health & Medicine</strong></a></h1>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="index.php">User Login - <span class="cart-amunt"></span> <i class="fa fa-user"></i></a>
                    </div>
                    <div class="shopping-item">
                        <a href="cart.php">Cart - <span class="cart-amunt">$</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
                    </div>
                </div>
                <div class="single-sidebar">
                       
                        
                        	<?php
	while($row = $result->fetch_assoc()){
    ?>
    <div class="cart_totals ">
                                <h2>Searched Product</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Product Name</th>
                                            <td><span class="amount"><?php echo $row['name']; ?></span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>SKU</th>
                                            <td><?php echo $row['sku']; ?></td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Price</th>
                                            <td><strong><span class="amount">TK<?php echo $row['price']; ?></span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
    </div>
    <?php
}
    
?>
                </div>
            </div>
        </div>
    </div>
    <!-- End site branding area -->

    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                            <li ><a href="home.php">Home</a></li>
                            <li class="active"><a href="shop.php">Shop Medicine</a></li>
                            <li ><a href="newsletter.php">Stories</a></li>
                            <li ><a href="about.php">About</a></li>
                            <li ><a href="contact.php">Contact Us</a></li>
                            <li style="left:350px;top:10px;"><form action="" method="GET">
                            <input type="text" placeholder="Search products..." name="search">
                            <input type="submit" value="Search" name="Search_Product" style="background-color: gray;">
                            </form></li>

                    </ul>
                </div>
                
            </div>

        </div>
        
    </div>
    <!-- End mainmenu area -->

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Medicine Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <?php
                    $sql = mysqli_query($conn,"select * from products");
                    if(mysqli_num_rows($sql)>0){
                            while($row = mysqli_fetch_assoc($sql)){

                ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-shop-product">
                            <div class="product-upper">
                                <img src="<?php echo $row['image'];?>" alt="" height="400" width = "400">
                            </div>
                            <h2><a href=""><?php echo $row['name'];?></a></h2>
                            <div class="product-carousel-price">
                                <ins><?php echo $row['price'];?> TK</ins><p><?php if($row['availability']==1){echo "Available";}else{echo "Not Available";} ?></p>
                            </div>

                            <div class="product-option-shop">
                                <?php $_SESSION['product_name'] = $row['name'];$_SESSION['product_price'] = $row['price'];
                                ?>
                                
                                <?php echo '<a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="cart.php?name=' . $row['name'] . '&price=' . $row['price'] .'&image=' . $row['image'] .'&sku=' . $row['sku'] . '">Add to cart</a>'; ?>
                            </div>
                        </div>
                    </div>
                                    <?php
                            }
                    }

                ?>

            </div>

        </div>
    </div>


    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2><a href="index.php"><img src="logo.png" height="100" width="100"></a></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint!
                            Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                        <div class="footer-social">
                            <a href="https://www.facebook.com/ismailjabiulla549/" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>

                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">

                </div>

                <div class="col-md-3 col-sm-6">

                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                        <div class="newsletter-form">
                            <input type="email" placeholder="Type your email">
                            <input type="submit" value="Subscribe">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; Created <i class="fa fa-heart"></i> by <a href="http://wpexpand.com" target="_blank">Ismail J. Sarker</a></p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>

    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>

    <!-- Main Script -->
    <script src="js/main.js"></script>
</body>

</html>








