<?php require_once("admin-auth.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vendor List - MalilStuff</title>
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
                    <a href="admin-page.php" class="site-cart">
                     <img src="images/user.png" width=18>
                    </a>
                  </li> 
                  <li>
                    <a href="admin-setting.php" class="site-cart">
                     <img src="images/setting.png" width=18>
                    </a>
                  </li> 
                  <li>
                    <a href="admin-logout.php" class="site-cart" onclick="return confirm('Are you sure? Want to Logout')">
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
            <li><a href="vendor-profile.php">Vendor</a></li>
          </ul>
        </div>
      </nav>
    </header>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <a href="admin-page.php">Admin Page</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Vendor List</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-9 order-2">

            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="float-md-left mb-4"><h2 class="text-black h5">Vendor List</h2></div>
                <div class="d-flex">
                 
                 <div class="dropdown mr-1 ml-md-auto">
                  <a href="admin-user.php"><button type="button" class="btn btn-secondary"><font color="#000000">User List</font></button></a>
                  </div>
                  
                </div>
              </div>
            </div>
            <?php 
                  if (!empty($_GET['message']) && $_GET['message'] == 'success-delete') {
                    echo '<div class="alert alert-success" role="alert"> All done. Delete of user is successfuly.</div>';
                  }
                  else if (!empty($_GET['message']) && $_GET['message'] == 'success-update') {
                    echo '<div class="alert alert-success" role="alert"> All done. Data update of user is successfuly.</div>';
                  }
              ?> 
            <div class="row mb-5">

           


              <?php 

                    $link = mysqli_connect("localhost", "root", "", "malilstuff");

                    $result = mysqli_query($link, "select * from vendors");
                      while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
              ?>


              <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                <div class="block-4 text-center border">
                  <figure class="block-4-image">
                    <img src="vendor/<?php echo $row["image"]; ?>" alt="Image" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><?php echo $row["vendorname"]; ?></h3>
                    <p class="mb-0"><?php echo $row["email"]; ?></p>
                    <p class="mb-0"><?php echo $row["username"]; ?></p>
                    <p class="mb-0">0<?php echo $row["phone"]; ?></p>
                    <p class="text-primary font-weight-bold"><?php echo $row["city"]; ?></p>
                    <div class="form-group row">
                      <div class="col-md-6">
                      <a href="admin-vendor-edit.php?id=<?php echo $row["id"];?>"><button type="button" class="btn btn-warning btn-block"><font color="#FFFFFF">Edit</font>
                        </button></a>
                      </div>
                      <div class="col-md-6">
                      <a href="admin-vendor-delete.php?id=<?php echo $row["id"];?>" onclick="return confirm('Are you sure? Want to delete vendor')"><button type="button" class="btn btn-danger btn-block"><font color="#FFFFFF">Delete</font>
                        </button></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <?php } ?>
            </div>
          </div>

          <div class="col-md-3 order-1 mb-5 mb-md-0">
            <div class="border p-4 rounded mb-4">
            <div class="card-body text-center">
                  <ul class="list-group">
                    <li class="list-group-item"><h5>Hi our admin <?php echo $_SESSION["admin"]["adminname"] ?></h5></li>
                    <li class="list-group-item"><h5><?php echo $_SESSION["admin"]["email"] ?></h5></li>
                  <li class="list-group-item"><button type="button" class="btn btn-info btn-block"><a href="admin-page.php?id=<?php echo $_SESSION['admin']['id']; ?>"><font color="white">Admin Page</font></a></button>
                    </li>
                    <li class="list-group-item"><button type="button" class="btn btn-info btn-block"><a href="admin-setting.php?id=<?php echo $_SESSION['admin']['id']; ?>"><font color="white">Setting</font></a></button>
                    </li>
                      </ul>
                  </div>
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