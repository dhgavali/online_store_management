<div class="row tablerow">

    <table border="2" style="background-color: white; width: 80%; padding: 10px" class="datatable">
        <tr>
            <td colspan="6" style="text-align: center; font-size: 22px; font-weight: bold;"> Products Available</td>
        </tr>
        <tr id="titlerow">
            <td>Product Id</td>
            <td>Product name</td>
            <td>Price</td>
            <td>Description</td>
            <td>Categories</td>
            <td>Quantity</td>
        </tr>
        <?php
        $query = "SELECT * FROM products";
        $result =   mysqli_query($conn, $query);
        $data = mysqli_num_rows($result);
        if ($data > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>

                <td>
                    <?= $row['product_id'] ?>
                </td>
                <td>
                    <?= $row['productname'] ?>
                </td>
                <td>
                    <?= $row['price'] . " Rs" ?>
                </td>
                <td id="desc">
                    <?= $row['descript'] ?>
                </td>
                <td id="cats" ">
                        <?= $row['categories'] ?>
                    </td>
                    <td>
                        <?= "1" ?>
                    </td>
                    <!-- <td>    -->
                    <!-- <img src=" <?= $row['imgpath'] ?>" alt=""> -->
                    <!-- </td> -->
                    </tr> <?php
                        }
                    } else {
                        echo "NO data found";
                    }
                            ?>
    </table>