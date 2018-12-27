<?php require_once("vendor-auth.php"); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vendor Profile - MalilStuff</title>
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
                    <a href="vendor-profile.php" class="site-cart">
                     <img src="images/user.png" width=18>
                    </a>
                  </li> 
                  <li>
                    <a href="vendor-setting.php" class="site-cart">
                     <img src="images/setting.png" width=18>
                    </a>
                  </li> 
                  <li>
                    <a href="vendor-logout.php" class="site-cart" onclick="return confirm('Are you sure? Want to Logout')">
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
            <li><a href="user-profile.php">User</a></li>
            <li class="active"><a href="vendor-profile.php">Vendor</a></li>
          </ul>
        </div>
      </nav>
    </header>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Vendor Profile</strong></div>
        </div>
      </div>
    </div>  
    
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-5 ml-auto">
  	        <div class="p-4 border mb-3">
            <div class="card-body text-center">
                <center><img class="img img-responsive rounded-circle mb-3" width="200" src="vendor/<?php echo $_SESSION['vendor']['image'] ?>" /></center>
                  <h2><?php echo  $_SESSION["vendor"]["vendorname"] ?></h2>
                  <p><?php echo $_SESSION["vendor"]["email"] ?></p>
                  <hr>
                  <ul class="list-group">
                    <li class="list-group-item"><h4>My username is <?php echo $_SESSION["vendor"]["username"] ?></h4></li>
                    <li class="list-group-item"><h4><?php echo $_SESSION["vendor"]["city"] ?> +62 <?php echo $_SESSION["vendor"]["phone"] ?></h4></li>
                  </ul>
                  <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <button type="button" class="btn btn-info"><a href="vendor-setting.php?id=<?php echo $_SESSION['vendor']['id']; ?>"><font color="white">Setting</font></a></button>
                    <button type="button" class="btn btn-info"><a href="vendor-logout.php" onclick="return confirm('Are you sure? Want to Logout')"><font color="white">Logout</font></a></button>
                    <div class="btn-group" role="group">
                      <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Product
                      </button>
                      <div class="dropdown-menu" aria-lablelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="product-view-all.php">Product List</button></a>
                        <form action="product-view.php"  method="post">
                          <input type="hidden" name="vendor_id" class="form-control py-4" value="<?php echo $_SESSION['vendor']['id']; ?>" placeholder="<?php echo $_SESSION['vendor']['id']; ?>">
                          <input type="submit" class="dropdown-item" name="cek" value="Your Product">
                        </form>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="p-3 p-lg-5 border">
              <h4>Upload Your Product</h4>
              <div class="p-3 p-lg-5 border"> 

              <?php 
                  if (!empty($_GET['message']) && $_GET['message'] == 'success') {
                    echo '<div class="alert alert-success">Product upload successfully.</div>';
                  }
                  else if (!empty($_GET['message']) && $_GET['message'] == 'failed') {
                    echo '<div class="alert alert-danger">Product upload failed send.</div>';
                  }
              ?> 

              <form action="product-upload.php" enctype="multipart/form-data" class="form-horizontal" method="post">
                <input type="hidden" name="vendor_id" value="<?php echo $_SESSION['vendor']['id']; ?>">
                <input type="hidden" name="vendorname" value="<?php echo $_SESSION['vendor']['vendorname']; ?>">
                <input type="hidden" name="phone" value="<?php echo $_SESSION['vendor']['phone']; ?>">

                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">Product Picture <span class="text-danger">*</span></label>
                    <input type="file" name="image" class="form-control" required autofocus />
                  </div>
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">Product Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_fname" name="productname" required autofocus />
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">Description <span class="text-danger">*</span></label>
                    <textarea class="form-control" cols="10" rows="2" name="description"></textarea>
                  </div>
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">For Skin Type</label>
                    <select name="efficacy" class="form-control" required>
                      <option value="">&nbsp;</option>
                      <option value="Oily">Oily</option>
                      <option value="Dry">Dry</option>
                      <option value="Normal">Normal</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">Price <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_fname" name="price" required autofocus />
                  </div>
                   <div class="col-md-6">
                    <label for="c_fname" class="text-black">Stock <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="c_fname" name="stock" required autofocus />
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                   <label for="c_fname" class="text-black">Promo Value <span class="text-danger">*</span></label>
                    <select name="promovalue" class="form-control" required>
                      <option value=""></option>
                      <option value="5000">Gold</option>
                      <option value="3000">Silver</option>
                      <option value="1000">Bronze</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                  <input type="submit" class="btn btn-primary btn-lg btn-block" name="register" value="Upload Product">
                </form>
                  </div>
                </div>
                </div>
                <hr>
                <h4>Navigation</h4>
                <div class="p-3 p-lg-5 border"> 
                  <div class="form-group row">
                    <div class="col-md-6">
                      <form action="product-view.php" method="post">
                        <input type="hidden" name="vendor_id" class="form-control py-4" value="<?php echo $_SESSION['vendor']['id']; ?>" placeholder="<?php echo $_SESSION['vendor']['id']; ?>">
                        <input type="submit" class="btn btn-info btn-sm btn-block" name="cek" value="See Your Product">
                      </form>
                    </div>
                    <div class="col-md-6">
                      <a href="product-view-all.php" class="btn btn-info btn-sm btn-block" >See All Product</a>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12">
                      <form action="vendor-income.php" method="post">
                        <input type="hidden" name="vendor_id" class="form-control py-4" value="<?php echo $_SESSION['vendor']['id']; ?>" placeholder="<?php echo $_SESSION['vendor']['id']; ?>">
                        <input type="submit" class="btn btn-info btn-sm btn-block" name="cek" value="Income Report">
                      </form>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Products List</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">
                <?php
                    $link = mysqli_connect("localhost", "root", "", "malilstuff");

                    $result = mysqli_query($link, "select * from product order by promovalue DESC");
                      while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                ?>

              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <image src="product/<?php echo $row["image"]; ?>" alt="Image" placeholder width=100 height=100 class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#"><?php echo $row["productname"]; ?></a></h3>
                    <p class="mb-0"><?php echo $row["vendorname"]; ?></p>
                    <p class="text-primary font-weight-bold">Rp.<?php echo $row["price"]; ?>,-</p>
                    <hr>
                    <p class="mb-0">For <?php echo $row["efficacy"]; ?> skin type</p>
                  </div>
                </div>
              </div>
              <?php } 

              ?>
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
                  <li><a href="vendor-profile.php">Profile</a></li>
                  <li><a href="product-view-all.php">Product List</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="vendor-setting.php">User Setting</a></li>
                  <li><a href="vendor-profile.php">Product Upload</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="user-login.php">User Login</a></li>
                  <li><a href="vendor-logout.php" onclick="return confirm('Are you sure? Want to Logout')">Logout</a></li>
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
            <a href="#" class="block-6">
              <img src="product/<?php echo $prod["image"];?>" alt="Image placeholder" class="img-fluid rounded mb-4">
              <h3 class="font-weight-light  mb-0"><?php echo $prod["productname"];?></h3>
              <p>Rp.<?php echo $prod["price"];?>,- From <?php echo $prod["vendorname"];?></p>
            </a>
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