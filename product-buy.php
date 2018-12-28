<?php require_once("user-auth.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Product Buy - MalilStuff</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="images/icons/fav.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">
    <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

          <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form action="product-search.php"  method="post" class="site-block-top-search">
                <span class="icon icon-search2"></span>
                <input type="text" name="search" class="form-control border-0" placeholder="Search">
              </form>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="index.php" class="js-logo-clone">Malilstuff</a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
              <ul>
                  <li>
                    <a href="user-profile.php" class="site-cart">
                     <img src="images/user.png" width=18>
                    </a>
                  </li> 
                  <li>
                    <a href="user-setting.php" class="site-cart">
                     <img src="images/setting.png" width=18>
                    </a>
                  </li> 
                  <li>
                    <a href="user-logout.php" class="site-cart" onclick="return confirm('Are you sure? Want to Logout')">
                     <img src="images/logout.png" width=18>
                    </a>
                  </li> 
                </ul>
              </div> 
            </div>

          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
        <ul class="site-menu js-clone-nav d-none d-md-block">
            <li>
              <a href="index.php">Home</a>
            </li>
            <li>
              <a href="about.php">About</a>
            </li>
            <li><a href="product.php">Product</a></li>
            <li class="active"><a href="user-profile.php">User</a></li>
            <li><a href="vendor-profile.php">Vendor</a></li>
          </ul>
        </div>
      </nav>
    </header>

    <?php 

    $link = mysqli_connect("localhost", "root", "", "malilstuff");

    $id = $_GET['id'];

    $result = mysqli_query($link, "select * from product where id='$id'");
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
    ?>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <a href="user-profile.php">Profile</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?php echo $row["productname"]; ?></strong></div>
        </div>
      </div>
    </div>  

   

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="product/<?php echo $row["image"]; ?>" alt="Image" width="530" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo $row["productname"]; ?></h2>
            <h4 class="text-black"><?php echo $row["vendorname"]; ?></h4>
            <p><?php echo $row["description"]; ?></p>
            <p><strong class="text-primary h5">Confirmation contact : <?php echo $row["phone"]; ?></strong></p>
            <p><strong class="text-primary h4">Rp.<?php echo $row["price"]; ?>,-</strong></p>            

            <form action="product-buy-proses.php" method="post">
                <input type="hidden" name="user_id" value="<?php echo  $_SESSION["user"]["id"] ?>" />
                <input type="hidden" name="fullname" value="<?php echo  $_SESSION["user"]["fullname"] ?>" />
                <input type="hidden" name="vendor_id" value="<?php echo $row["vendor_id"]; ?>" />
                <input type="hidden" name="vendorname" value="<?php echo $row["vendorname"]; ?>" />
                <input type="hidden" name="product_id" value="<?php echo $row["id"]; ?>" />
                <input type="hidden" name="productname" value="<?php echo $row["productname"]; ?>" />
                <input type="hidden" name="price" value="<?php echo $row["price"]; ?>" />
                <input type="hidden" name="promovalue" value="<?php echo $row["promovalue"]; ?>" />
                <input type="submit" class="buy-now btn btn-sm btn-primary" name="buy" value="Buy"/>
            </form>
            <br>
            <p>View other product base on skin type? <a href="user-profile.php">I want to see</a></p>

            <?php } ?>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Products Other</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">

            <?php 

            $link = mysqli_connect("localhost", "root", "", "malilstuff");

            $result = mysqli_query($link, "select * from product order by promovalue DESC");
            while ($data = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            ?>

              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="product/<?php echo $data["image"]; ?>" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><?php echo $data["productname"]; ?></h3>
                    <p class="mb-0"><?php echo $data["vendorname"]; ?></p>
                    <p class="text-primary font-weight-bold">Rp.<?php echo $data["price"]; ?>,-</p>
                    <hr>
                    <p class="mb-0">For your <?php echo $data["efficacy"]; ?> skin type</p>
                  </div>
                </div>
              </div>
              
            <?php } ?>

            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="site-footer border-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigations</h3>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="user-profile.php">Profile</a></li>
                  <li><a href="product-list-view.php">Product List</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="user-setting.php">User Setting</a></li>
                  <li><a href="featur-skin-detection.php">Skin Checkup</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="vendor-login.php">Vendor Login</a></li>
                  <li><a href="user-logout.php" onclick="return confirm('Are you sure? Want to Logout')">Logout</a></li>
                </ul>
              </div>
            </div>
          </div>

          <?php 
            $link = mysqli_connect("localhost", "root", "", "malilstuff");
            $result = mysqli_query($link, "select * from product order by dt DESC limit 1");
            while ($prod = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
          ?>

          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <h3 class="footer-heading mb-4">New product</h3>
              <img src="product/<?php echo $prod["image"];?>" alt="Image placeholder" class="img-fluid rounded mb-4">
              <h3 class="font-weight-light  mb-0"><?php echo $prod["productname"];?></h3>
              <p>Rp.<?php echo $prod["price"];?>,- From <?php echo $prod["vendorname"];?></p>
          </div>

          <?php } ?>

          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">A.H Nasution 105 St. Cibiru, Bandung, Indonesia</li>
                <li class="phone"><a href="tel://23923929210">+62 857 2160 3080</a></li>
                <li class="email">malilstuff@gmail.com</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            Copyright &copy; <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> MalilStuff All rights reserved
            </p>
          </div>

        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>