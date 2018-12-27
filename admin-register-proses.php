<?php
    require_once("config.php");

    if(isset($_POST['register'])){

        $adminname = filter_input(INPUT_POST, 'adminname', FILTER_SANITIZE_STRING);
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

          $sql = "INSERT INTO admins (adminname, password, email)
          VALUES (:adminname, :password, :email)";
          //echo "<img width='200px' src='upload/".$image_name."' class='preview'>";

          $stmt = $db->prepare($sql);

            // bind parameter ke query
            $params = array(
                ":adminname"=> $adminname,
                ":password"=> $password,
                ":email"=> $email
            );

            // eksekusi query untuk menyimpan ke database
            $saved = $stmt->execute($params);

             if($saved) {
              header("Location: admin-login.php");
              header("Location: admin-login.php?message=success-regist");      
        
        }
    }
?>