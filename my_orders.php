<?php
include 'App/logout.php';
include 'database_connection.php';

// echo $_SESSION['user_id'];
if ($_SESSION && $_SESSION['usertype'] === "user") {
    $auth = $_SESSION['usertype'];
} else {
    header("Location: index.php");
    exit();
}
$userId = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM oder WHERE user_id = '$userId'");

if (isset($_POST['cancel-btn'])) {
    $id = $_POST['pr-id'];
    $sql = "DELETE FROM oder WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $status = "Record deleted successfully";
        header("Location: my_orders.php");
    } else {
        $status = "Error deleting record: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>all_product.html</title>

    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <style>
        .head-line {
            margin-left: 120px;
        }

        .order-image {
            width: 200px;
            height: 200px;

        }

        .details {
            margin-top: -180px;
            margin-left: 320px;
        }


        .cancel-btn {
            margin-top: 5px;
            background-color: #d41414;
            border: none;
            padding: 10px;
            margin-left: 25px;
            cursor: pointer;
            border-radius: 10px;
            color: white;

        }

        .cancel-btn:hover {
            opacity: 0.7;
        }

        .head-line {
            margin-left: 600px;
        }

        .order-main {
            margin-bottom: 200px;
        }

        td {
            width: 180px;
            text-align: center;
            border-bottom: 1px solid darkgrey;
        }

        .hedding {
            background-color: orange;
            color: white;
            font-size: 20px;
        }

        .table {
            margin: auto;
        }

        .cancel-order {
            color: #d41414;
        }

        .accept-order {
            color: green;
        }

        .pending-order {
            color: orange;
        }

        .cancel-btn img {
            width: 30px;
        }

        .no-order {
            margin-left: 700px;
            font-size: 40px;
            font-weight: bold;
            margin-bottom: 400px;
            color: orange;
        }

        .no-order span {
            position: absolute;
            margin-top: 100px;
            margin-left: -450px;
        }
        .no-order a {
            position: absolute;
            margin-top: 200px;
            margin-left: -470px;
        }
    </style>
</head>

<body>

    <!--navigation-->
    <?php include 'components/nav.php'; ?>


    <br>
    <?php if ($result->num_rows > 0) { ?>
        <div class="order-main">
            <table class="table">
                <tr class="hedding">
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()) { ?>

                    <?php
                    $productId = $row['product_id'];
                    $result2 = $conn->query("SELECT * FROM add_item WHERE id = '$productId'");

                    ?>
                    <?php while ($row2 = $result2->fetch_assoc()) { ?>
                        <tr class="border-bottom">
                            <td>
                                <img src="upload/<?php echo $row2['image1']; ?>" alt="image1" srcset="" class="order-image">



                            </td>
                            <td>
                                <?php echo $row2['price']; ?>
                            </td>
                            <td>
                                <?php echo $row['qty']; ?>
                            </td>
                            <td>
                                <?php echo $row['qty'] * $row2['price'] + 249; ?>
                            </td>
                            <td>
                                <?php if ($row['status'] == 2) { ?>
                                    <span class="cancel-order">Canceled</span>
                                <?php } else if ($row['status'] == 1) { ?>
                                    <span class="accept-order">Accepted</span>
                                <?php } else { ?>
                                    <span class="pending-order">Pending...</span>
                                <?php } ?>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <input hidden type="text" name="pr-id" id="" value="<?php echo $row['id']; ?>">


                                    <button name="cancel-btn" type="submit" class="cancel-btn">
                                        <img src="./images/remove.png" alt="">
                                    </button>
                                    <!-- <input name="cancel-btn" type="submit" class="cancel-btn" value="Cancel"> -->

                                </form>
                            </td>

                        </tr>
                    <?php } ?>
                <?php } ?>


            </table>
        </div>
    <?php } else { ?>
        <div class="no-order">
            <span>Nothing orders...</span>
            <a href="allproduct.php"><img src="./images/buynow.png"></a>
        </div>
    <?php } ?>

    <!-- footer -->
    <div class="footer_registor">

        <?php include 'components/footer.php'; ?>

    </div>
</body>

</html>