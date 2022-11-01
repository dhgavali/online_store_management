<?php
include '../dbconn.php';

$err = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pid = $_POST['pid'];
    $columnname = $_POST['fieldnames'];
    $value = $_POST['userinput'];

    $query = "UPDATE products SET `$columnname` = '$value' where product_id = '$pid'";
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
        <div class="form-blc">
            <div class="form-box">
                <h3 style="text-align: center;">Update Product Details</h3>
                <hr>
                <div class="row">
                    <form action="" method="post">
                        <div class="form-line">
                            <label for="f1"> Product Id</label>
                        </div>
                        <div class="form-line">
                            <input type="number" name="pid" id="f1">
                        </div>

                        <div class="form-line">
                            <label for="f1"> Field name</label>
                        </div>
                        <div class="form-line">
                            <select name="fieldnames" id="sl">
                                <option hidden value="">select Field to update</option>
                                <option value="productname">Product name</option>
                                <option value="categories">Category</option>
                                <option value="price">Price</option>
                                <option value="descript">Description</option>
                            </select>
                        </div>
                        <div class="form-line">
                            <label for="">Enter the new value</label>
                        </div>
                        <div class="form-line">
                            <textarea name="userinput" id="" cols="25" rows="4"></textarea>
                        </div>
                        <div class="form-line">
                            <input type="submit" value="Update Details">
                            <input type="button" onclick="moveToPage('dashboard.php')" value="Go back">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row tablerow">
            <?php
            include 'fetchproducts.php';
            ?>
        </div>
    </div>
</body>

</html>