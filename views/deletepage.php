<?php
include '../dbconn.php';
$err = '';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $pid = $_POST['pid'];
    $query = "DELETE FROM products where product_id = '$pid' ";
    $result =  mysqli_query($conn, $query);
}
?>
<html>
<head>
    <link rel="stylesheet" href="../css/formstyle.css">
    <script src="../js/nav.js"></script>
</head>
<body>
    <div class="main">
        <div class="row form-blc">
            <div class="form-box">
                <h3 style="text-align: center;">Delete Product</h3>
                <hr>
                <div class="row .form-data">
                    <form action="" method="post">
                        <div class="form-line">
                            <label for="f1"> Product Id</label>

                        </div>
                        <div class="form-line">
                            <input type="number" name="pid" id="f1">
                        </div>

                        <div class="form-line">
                            <input type="submit" value="Delete Product">
                            <input type="button" onclick="moveToPage('dashboard.php')" value="Go back">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            include 'fetchproducts.php';
            ?>
        </div>
    </div>
    <!-- form box ends -->
    <!-- main block ends -->
</body>
</html>