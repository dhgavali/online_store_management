<?php
session_start();
?>

<?php
require '../dbconn.php';

$err1 = $err2 = $wrongData = "";
$dbpass =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


  $email = test_input($_POST["uemail"]);
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $err1 = "Invalid email format";
  } else {


    $err1 = "";

    if (strlen($_POST["upass"]) < 6) {
      $err2 = "Password should be more than 6 characters";
    } else {
      $err2 = " ";
      $email = test_input($_POST["uemail"]);
      $passw = test_input($_POST["upass"]);
      $usren = '';
      //here we have to perform database operation
      //first we will fetch the data and then compare;
      $query = "SELECT pass, fullname from users where email = '$email'";
      $result  = mysqli_query($conn, $query);
      $rows = mysqli_num_rows($result);
      if ($rows > 0) {

        // print_r($rows);
        while ($row = mysqli_fetch_assoc($result)) {
          $dbpass =  "$row[pass]";
          $usern = "$row[fullname]";
        };

        if ($dbpass == $passw) {
          $_SESSION['useremail'] = $email;
          $_SESSION['username']  = $usern;
          echo "<script>window.location.replace('dashboard.php');</script>";
        } else {
          $wrongData = "Invalid Username or password";
        }
      } else {
        $wrongData =  "account does not exists";
      }
    }
  }
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
    <style>
    <?php include "../css/login.css"?>
    </style>
</head>

<body>

    <div class="container">
        <div class="wrapper">
            <div class="sub">
                <div class="heading">
                    <h2 style="text-align: center;">Login</h2>
                </div>
                <!-- heading ends -->
                <form method="post">
                    <label id="sm"><?= $wrongData ?></label>
                    <div class="form-group">

                        <label for="usemail">Email address</label>
                        <input type="text" name="uemail" id="usemail" required placeholder="Enter email">
                        <small id="emailHelp"><?= $err1 ?></small>
                    </div>
                    <!-- form group ends -->
                    <div class="form-group">
                        <label for="passw">Password</label>
                        <input type="password" name="upass" id="passw" placeholder="Password">
                        <small id="emailHelp"><?= $err2 ?></small>
                    </div>
                    <!-- form group ends -->
                    <div class="btn">
                        <button type="submit" class="login-btn">LOGIN</button>
                    </div>
                    <!-- btn ends -->
                    <div class="btminfo">
                        <h4 style="text-align: end"> Not have an Account? <a href="signup.php">Sign Up</a></h4>
                    </div>
                </form>
                <!-- form ends -->
            </div>
            <!-- sub ends -->
        </div>
        <!-- wrapper ends -->

    </div>
    <!-- Co ntainer ends here  -->
</body>

</html>