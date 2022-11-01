<?php
session_start();
include '../dbconn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <!--fontawesome css-->
    <link rel="stylesheet" href="../css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" />
    <!-- including bootstrap -->
    <link rel="stylesheet" href="../bootstrap/bstrap/dist/css/bootstrap.css">
    <!-- css style -->
    <link rel="stylesheet" href="../css/dashboard.css">
    <!-- link script -->
    <script src="../js/nav.js"></script>
</head>

<body>
    <div class="navbar">
        <h5>Welcome, <i><?= $_SESSION['username'] ?? ''; ?></i></h5>
        <h2 style="text-align: center;">Admin Dashboard</h2>
        <span> <a href="../index.php">LOGOUT </a> </span>
    </div>
    <div class="container">
        <!-- heading -->

        <!-- includes ends here -->
        <div class="row row-cols-3 justify-content-around">
            <!-- card widget -->
            <div onclick="moveToPage('addpage.php')" class="col-md-3 sub-box">
                <i class="fa fa-plus-square" style="font-size:45px; color: yellow;"> </i>
                <h3> Add a Product</h3>
                <p>
                    Add new products in the store for selling
                </p>
            </div>
            <!-- card widget -->
            <div onclick="moveToPage('deletepage.php')" class="col-md-3   sub-box">
                <i class="fa fa-trash" style="font-size:45px; color: yellow;"></i>
                <h3> Delete a Product</h3>
                <p>
                    Delete Products
                </p>
            </div>
            <!-- card widget -->
            <div onclick="moveToPage('updatepage.php')" class="col-md-3 sub-box">
                <i class="fa fa-edit" style="font-size:45px; color: yellow;"></i>
                <h3> Update product info</h3>
                <p>
                    update the price or description of the product
                </p>
            </div>
        </div>
        <!-- row ends -->
        <!-- fetch the data from the databse and display here -->
        <div class="row tablerow">
            <h2 style="text-align: center; font-weight:bold;font-family: cursive">STORE INVENTORY</h2>
            <?php include 'fetchproducts.php'; ?>
        </div>
    </div>
    </div>
    <!-- container fluid ends -->
</body>

</html>