<?php
require_once("user-auth.php");
require_once("config.php");


if(isset($_POST['edit'])){

  if(isset($_POST) && !empty($_FILES['image']['name'])){

    $name = $_FILES['image']['name'];

	  $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    list($txt, $ext) = explode(".", $name);
    $image_name = time().".".$ext;
    $tmp = $_FILES['image']['tmp_name'];

if(move_uploaded_file($tmp, 'user/'.$image_name)){
      $sql = "UPDATE users SET image='$image_name', fullname='$fullname', gender='$gender', username='$username', city='$city', phone='$phone', email='$email', password='$password' WHERE id='$id' ";
      //echo "<img width='200px' src='upload/".$image_name."' class='preview'>";

      $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
    	":id" => $id,
      ":image" => $image_name,
      ":name" => $name,
      ":gender" => $gender,
      ":username" => $username,
      ":city" => $city,
      ":phone" => $phone,
      ":password" => $password,
      ":email" => $email
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: user-login.php");
    header("Location: user-login.php?message=success-update");
}
}
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>User Setting - MalilStuff</title>
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
                <a href="index.php" class="js-logo-clone">MalilStuff</a>
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

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">User Setting</strong></div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Setting Your Account</h2>
          </div>
          <div class="col-md-7">

            <form action="" enctype="multipart/form-data" class="form-horizontal" method="post"> 
              <input type="hidden" name="id" value="<?php echo $_SESSION["user"]["id"] ?>" />
              <div class="p-3 p-lg-5 border">
              	<div class="form-group row">
                  <div class="col-md-6">
                    <center>
                    <br>
                		<img class="img img-responsive rounded-circle mb-3" width="180" src="user/<?php echo $_SESSION['user']['image'] ?>" />
                    </center>
              	  </div>
                  <div class="col-md-6">
                    <p><font size=4>Hi <?php echo $_SESSION['user']['fullname'] ?> is happy to know you, hope you are comfortable with Malilstuff. In this menu you can update your profile.</font>
                    <br><br>
                    Phone : 0<?php echo $_SESSION['user']['phone'] ?>
                    <br>
                    City &nbsp&nbsp;&nbsp&nbsp;: <?php echo $_SESSION['user']['city'] ?>
                    </p>
                  </div>
              	</div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">Profile Photo <span class="text-danger">*</span></label>
                    <input type="file" name="image" class="form-control" required autofocus />
                  </div>
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_fname" name="fullname" required="required" value="<?php echo  $_SESSION["user"]["fullname"] ?>" />
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Gender : <?php echo  $_SESSION["user"]["gender"] ?></label>
                    <select name="gender" class="form-control" required>
                      <option value="">Your Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                </div>

                
                 <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">City : <?php echo  $_SESSION["user"]["city"] ?></label>
                    <input type="text" class="form-control" id="c_fname" name="city" placeholder="Your City" value="<?php echo  $_SESSION["user"]["city"] ?>" required="required"/>
                  </div>
                  <div class="col-md-6">
                  <label for="c_fname" class="text-black">Phone : 0<?php echo $_SESSION["user"]["phone"] ?></label>
                    <input type="text" class="form-control" id="c_fname" name="phone" required="required" value="<?php echo  $_SESSION["user"]["phone"] ?>" placeholder="New phone number" />
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">Username <span class="text-danger">*</span></label>
                     <input type="text" class="form-control" id="c_fname" name="username" required="required" value="<?php echo  $_SESSION["user"]["username"] ?>"/>
                  </div>
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">Email <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_fname" name="email" required="required" value="<?php echo  $_SESSION["user"]["email"] ?>"/>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_subject" class="text-black">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" required="required" id="c_subject" name="password" placeholder="New Password. If you not change please entri your password"/>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-6">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" name="edit" value="Save">
                  </div>
                  <div class="col-md-6">
                    <p>Back to profile? <a href="user-profile.php?id=<?php echo $_SESSION["user"]["id"] ?>">Let is see</a></p>
                  </div>
                  <div class="col-md-6">
                  <br>
                     <p>Delete account?<a href="user-delete.php?id=<?php echo $_SESSION["user"]["id"] ?>" onclick="return confirm('Are you sure? Want to delete account')"><span class="text-danger"> Want to delete</span></a>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-5 ml-auto">
            <div class="p-4 border mb-3">
              <span class="d-block text-primary h6 text-uppercase">Cianjur</span>
              <p class="mb-0">05 Aria Wiratanudatar St. Karangtengah - Aditia Wardani</p>
            </div>
            <div class="p-4 border mb-3">
              <span class="d-block text-primary h6 text-uppercase">Semarang</span>
              <p class="mb-0">125 Ahmad Yani St. Sidomulyo - Arif Krismunandar </p>
            </div>
            <div class="p-4 border mb-3">
              <span class="d-block text-primary h6 text-uppercase">Subang</span>
              <p class="mb-0">18 Cokroaminito St. Cisawu - Harudin</p>
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