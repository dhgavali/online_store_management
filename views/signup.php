<?php
require '../dbconn.php';
$err1 = $err2 = $err3 = $err4 = $accounterr =  "";
// define variables and set to empty values
$name = $email = $pass = $cnfpass  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


  $email = test_input($_POST["uemail"]);
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $err2 = "Invalid email format";
  } else {
    $err2 = "";

    //assigning the values 
    $name = test_input($_POST["uname"]);
    $email = test_input($_POST["uemail"]);
    $pass = test_input($_POST["upass"]);
    $cnfpass = test_input($_POST["ucnfpass"]);

    if ($pass != $cnfpass) {
      $err4 = "passwords do not match";
    } else {
      if (strlen($pass) < 6 || strlen($cnfpass) < 6) {
        $err4 = "Password should have alteast 6 characters";
      } else {
        $err4 = " ";
        //here we have to perform database operation 
        //first we will check is user already registered or not
        $query = "SELECT email from users where email = '$email'";
        $result  = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($result);

        if ($rows > 0) {
          $accounterr =  "Account Already Exists please login";
        } else {
          //if user is new we will register it here
          $accounterr = " ";
          $query = "INSERT INTO users(fullname, email, pass) VALUES ('$name', '$email','$pass')";

          $result = mysqli_query($conn, $query);

          if ($result) {
            header("Location: login.php");
          } else {
            echo "Oops some error occured. \n please try later";
          }
        }
      }
    }
  }

  $conn->close();
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<!DOCTYPE html>
<html>

<head>

    <title>
        Login / Sign Up
    </title>

    <!--fontawesome css-->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <style>
    <?php include "../css/login.css"?>
    </style>
</head>

<body>

    <div class="container">
        <div class="wrapper">
            <div class="sub">
                <div class="heading">
                    <h2 style="text-align: center;">Sign Up</h2>

                    <h5 style="text-align: center; color: red;" id="err2"><?= $accounterr ?></h5>
                </div>
                <!-- heading ends -->
                <form method="post" action="">
                    <div class="form-group">
                        <label for="userName">Full Name</label>
                        <input type="text" id="userName" name="uname" placeholder="Enter Full name" required>
                        <small id="err1"><?= $err1 ?></small>
                    </div>
                    <!-- form group ends -->
                    <div class="form-group">
                        <label for="useremail">Email address</label>
                        <input type="text" id="useremail" name="uemail" placeholder="Enter email" required>
                        <small id="err2"><?= $err2 ?></small>
                    </div>
                    <!-- form group ends -->
                    <div class="form-group">
                        <label for="userpass">Password</label>
                        <input type="password" id="userpass" name="upass" placeholder="Password">
                        <small id="err3"><?= $err3 ?></small>
                    </div>
                    <!-- form group ends -->
                    <div class="form-group">
                        <label for="cnfpass">Confirm Password</label>
                        <input type="password" id="cnfpass" name="ucnfpass" placeholder="Password">
                        <small id="err4"><?= $err4 ?></small>
                    </div>
                    <!-- form group ends -->
                    <div class="btn">
                        <button type="submit" class="login-btn">REGISTER </button>
                    </div>
                    <!-- btn ends -->

                    <div class="btminfo">
                        <h4 style="text-align: end"> Already Have an account? <a href="login.php">LOGIN</a></h4>
                    </div>
                </form>
                <!-- form ends -->
            </div>
            <!-- sub ends -->
        </div>
        <!-- wrapper ends -->

    </div>
    <!-- COntainer ends here  -->
</body>

</html>