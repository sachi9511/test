<?php
include 'App/logout.php';
include 'database_connection.php';

$product_id = $_GET['id'];
$qty = $_GET['qty'];
$size = $_GET['size'];
$price = $_GET['price'];
$fee = 249;

if (isset($_POST['submit'])) {
    $Phone_Number = $_POST['Phone_Number'];
    $userID = $_SESSION['user_id'];
    $address = $_POST['address'];
    $sql = "INSERT INTO oder (qty, phone_number, address,size,product_id,user_id,status)  VALUES ('$qty','$Phone_Number','$address' ,'$size',$product_id,'$userID',0)";
    // database eka haraha sql run wenna
    if ($conn->query($sql) === TRUE) {
        header("Location: my_orders.php");
        exit();
    }
}



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>item_select.php</title>


    <link rel="stylesheet" type="text/css" href="css/nav.css">

    <link rel="stylesheet" type="text/css" href="css/buy-now.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <style>

    </style>
</head>

<body>
    <!-- natigation -->
    <?php include 'components/nav.php'; ?>


    <!-- item select -->

    <div class="main">

        <div class="row">
            <div class="column">
                <div class="grid-item2">
                    <h1 style="text-align: center; color:black;">Oder Details</h1>

                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="detail">

                            <table style="text-align:left;">


                                <td>Phone Number</td>
                                <td><input type="text" name="Phone_Number" class="input">
                                </td>
                                <tr>
                                <tr>
                                    <td>Address</td>
                                    <td><textarea name="address" id="" cols="30" rows="6" class="textarea"></textarea></td>
                                </tr>


                                <tr>
                                    <td colspan="2">
                                        <input type="submit" class="btn btn-size btn2" name="submit" value="submit">

                                    </td>
                                </tr>
                            </table>
                        </div>


                    </form>
                </div>
            </div>
            <div class="column">
                <div class="grid-item2">
                    <h1 style="text-align: center; color:black;">Oder Summery</h1>

                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="summery detail">

                            <table style="text-align:left;">

                                <tr>
                                    <td>Size : <?= $size ?></td>
                                </tr>
                                <tr>
                                    <td>Price : <?= $price ?> </td>
                                <tr>
                                    <td>Quantity : <?= $qty ?></td>
                                </tr>
                                <tr>
                                    <td>Delivery fee : <?= $fee ?></td>
                                </tr>
                                <tr>
                                    <td>Total : <?= ($price * $qty) + $fee ?></td>
                                </tr>
                            </table>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>


    <!--footer-->
    <?php include 'components/footer.php'; ?>

    </div>
</body>

</html>