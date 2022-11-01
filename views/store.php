<?php
include '../dbconn.php';
?>
<html>

<head>
    <link rel="stylesheet" href="../css/store.css">
    <!--fontawesome css-->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <!--bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- local bootstrap -->
    <link rel="stylesheet" href="bootstrap/bstrap/dist/css/bootstrap.css">
    <!-- navbar css -->
    <link rel="stylesheet" href="../css/nav.css">
</head>

<body>
    <!-- Navigation bar -->
    <div class="container-fluid">
        <nav class="navbar navbar-expand-sm mynav">
            <a class="navbar-brand" href="#">
                <i class="fa fa-shopping-bag"></i>
                <span class="hidden">Online Stationary Shop</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#toggleMobileMenu"
                aria-controls="toggleMobileMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="toggleMobileMenu">

                <ul class="navbar-nav ms-auto text-center">
                    <li>
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li>
                        <a class="nav-link active" href="store.php">Store</a>
                    </li>
                    <li>
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li>
                        <a class="nav-link" href="signup.php">Register</a>
                    </li>
                    <li>
                        <a class="nav-link" href=" ../#contactus">Contact</a>
                    </li>
                </ul>


            </div>
        </nav>
    </div>
    <!-- fetch data first -->
    <div class="container">
        <h4 style="text-align: center; font-family: cursive; padding: 10px; text-decoration:underline">Our Products</h4>
        <div class="data-block">

            <?php
            $query = "SELECT * FROM products";
            $result =   mysqli_query($conn, $query);
            $data = mysqli_num_rows($result);
            $col = 0;
            if ($data > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="block">

                <div class="img">
                    <img cover src="<?= $row['imgpath']; ?>" width="150px" height="150px" alt="">
                </div>
                <div class="b-data">
                    <div class="product-title">
                        <?= $row['productname'] ?>
                    </div>
                    <div class="desc">
                        <div class="desc-title">
                            Description:</div>
                        <?= $row['descript'] ?>
                    </div>
                    <div class="btn-row">

                        <div class="price">
                            Rs. <?= $row['price'] ?>
                        </div>
                        <div>
                            <button>Buy Now</button>
                        </div>
                    </div>
                </div>

            </div>
            <!-- block ends here -->
            <!-- we need to return a widget here -->
            <!-- <td>
                1
            </td> -->
            <?php }
            } ?>
        </div>
    </div>
</body>

</html>