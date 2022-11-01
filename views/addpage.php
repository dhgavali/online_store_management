<?php
$conn = mysqli_connect('localhost:3308', 'root', '', 'osm');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // echo $_POST['pcats'];
    $productname  = $_POST['pname'];
    $category = $_POST['pcats'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];



    // file upload script here
    // 
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }


    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $imgpath = $target_file;

    $query = "INSERT INTO products(productname, categories,  price, descript, imgpath) VALUES('$productname', '$category', '$price', '$desc', '$imgpath')";

    $result = mysqli_query($conn, $query);
    if ($result) {
        header("Location: dashboard.php");
    } else {
        echo " failed to add recod";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <!--  -->
    <!-- including bootstrap -->
    <link rel="stylesheet" href="bootstrap/bstrap/dist/css/bootstrap.css">
    <!--bootstrap cdn css-->
    <!-- custom css -->
    <link rel="stylesheet" href="../css/formstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- link script -->
    <script src="../js/nav.js"></script>
</head>

<body>
    <div class="main">
        <div class="form-blc">
            <div class="form-box">
                <h3 style="text-align: center;">Add a Product</h3>
                <hr>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-line">
                        <label for="f1"> Product Name</label>
                    </div>
                    <div class="form-line">
                        <input type="text" name="pname" required id="f1">
                    </div>
                    <div class="form-line">
                        <label for="f1"> Product Category</label>
                    </div>
                    <div class="form-line">
                        <select name="pcats" id="" required>
                            <option hidden value=""> Select the category</option>
                            <option value="books">Books</option>
                            <option value="writing">Writing material</option>
                            <option value="art"> Artistic material</option>
                            <option value="bags"> bags</option>
                            <option value="bags"> Calculators</option>
                            <option value="other">other </option>
                        </select>
                    </div>
                    <div class="form-line">
                        <label for="mail"> Price </label>
                    </div>
                    <div class="form-line">
                        <input type="number" name="price" required id="mail">
                    </div>
                    <div class="form-line">
                        <label for="mail"> Description</label>
                    </div>
                    <div class="form-line">
                        <textarea name="desc" id="" cols="30" rows="5" required></textarea>
                    </div>
                    <div class="form-line">
                        Select the product Photo
                    </div>
                    <div class="form-line upload-btn">
                        <input type="file" name="fileToUpload" required id="fileToUpload">
                    </div>

                    <div class="form-line">
                        <input type="submit" value="Add Product">
                        <input type="button" onclick="moveToPage('dashboard.php')" value="Go back">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>