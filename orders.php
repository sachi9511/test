<?php
include 'database_connection.php';

include 'App/logout.php';
// check the login && who is user
if ($_SESSION && $_SESSION['usertype'] === "admin") {
    $auth = $_SESSION['usertype'];
} else {
    header("Location: index.php");
    exit();
}

$userId = $_SESSION['user_id'];
$allOrder = "";
$approvedOrder = "";
$canceledOrder = "";
$new_orders = "";
$result = $conn->query("SELECT * FROM oder ORDER BY id DESC");
if (isset($_POST['search'])) {
    $allOrder = empty($_POST['all']) ? "" : $_POST['all'];
    $approvedOrder = empty($_POST['approved']) ? "" : $_POST['approved'];
    $canceledOrder = empty($_POST['canceled']) ? "" : $_POST['canceled'];
    $new_orders = empty($_POST['new_orders']) ? "" : $_POST['new_orders'];
    if ($allOrder) {
        $result = $conn->query("SELECT * FROM oder ORDER BY id DESC");
    } else if ($approvedOrder && $canceledOrder && $new_orders) {

        $result = $conn->query("SELECT * FROM oder ORDER BY id DESC");
    } else if ($approvedOrder && $canceledOrder) {

        $result = $conn->query("SELECT * FROM oder WHERE status=1 AND status=2 OR status=1 OR status=2");
    } else if ($approvedOrder && $new_orders) {

        $result = $conn->query("SELECT * FROM oder WHERE status=1 AND status=0 OR status=1 OR status=0");
    } else if ($canceledOrder && $new_orders) {

        $result = $conn->query("SELECT * FROM oder WHERE status=2 AND status=0 OR status=2 OR status=0");
    } else if ($new_orders) {
        $result = $conn->query("SELECT * FROM oder WHERE status=0");
    } else if ($approvedOrder) {
        $result = $conn->query("SELECT * FROM oder WHERE status=1");
    } else if ($canceledOrder) {
        $result = $conn->query("SELECT * FROM oder WHERE status=2");
    }
}

if (isset($_POST['accept-btn'])) {
    $id = $_POST['pr-id'];
    $sql = "UPDATE oder SET status=1 WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $status = "Record deleted successfully";
        header("Location: orders.php");
    } else {
        $status = "Error deleting record: " . $conn->error;
    }
}

if (isset($_POST['cancel-btn'])) {
    $id = $_POST['pr-id'];
    $sql = "UPDATE oder SET status=2 WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $status = "Record deleted successfully";
        header("Location: orders.php");
    } else {
        $status = "Error deleting record: " . $conn->error;
    }
}

if (isset($_POST['search'])) {
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>add_items.php</title>
    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <link rel="stylesheet" type="text/css" href="css/all-item.css">

    <style>
        .s-img {
            width: 100px;
        }

        .all-img {
            width: 200px;
        }

        .grid-align {
            color: black;
            text-align: left;
            font-size: large;
        }

        .content {

            width: 300px;
            height: 230px;
            margin-top: 20px;
            margin-left: 20px;
            box-shadow: rgb(100, 100, 100) 0px 54px 55px, rgba(227, 226, 231, 0.969) 0px -12px 30px, rgb(212, 210, 229) 0px 4px 6px, rgba(229, 231, 239, 0.95) 0px 12px 13px, rgba(2, 23, 213, 0.969) 0px -3px 5px;
            border: 2px solid white;
            border-radius: 10px;
            background-color: rgba(179, 144, 144, 0.507);
        }

        p {
            margin-left: 10px;
            color: rgb(15, 9, 105);

        }

        .edit-section {
            margin-left: 50px;
            margin-top: 5px;
        }



        .delete-btnn {
            margin-left: 30px;
            border: 2px solid white;
            border-radius: 10px;
            background-color: red;
            color: white;
            padding: 5px;
            font-size: large;
            font-family: serif;

        }

        .edit-btnn {
            margin-left: 20px;
            border: 2px solid white;
            border-radius: 10px;
            background-color: darkorange;
            color: white;
            padding: 5px;
            font-size: large;
            font-family: serif;

        }

        .head-line {
            margin-left: 120px;
        }

        .order-image {
            width: 150px;

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
            border-radius: 20px;
            color: white;
            display: inline;

        }

        .cancel-btn:hover {
            opacity: 0.7;
        }

        .accept-btn {
            margin-top: 5px;
            background-color: greenyellow;
            border: none;
            padding: 10px;
            margin-left: 25px;
            cursor: pointer;
            border-radius: 20px;
            color: white;
            display: inline;

        }

        .accept-btn:hover {
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

        .canceled {
            color: rgb(231, 42, 42);
            font-size: 20px;
            text-transform:capitalize;
        }

        .approved {
            color: green;
            font-size: 20px;
            text-transform:capitalize;
        }

        .order-search-bar {
            background-color: rgb(37, 212, 37);
            padding: 5px;
            border-radius: 20px;
            color: white;
            text-align: center;
            margin: 40px 0 40px 40px;
            font-size: 20px;
        }

        .order-search-bar input {

            margin-left: 20px;
        }

        .order-search-btn {
            background-color: rgb(255, 175, 28);
            padding: 10px 20px 10px 20px;
            border-radius: 20px;
            border: 1px solid white;
            font-size: 20px;
            color: white;
        }

        .order-search-btn:hover {
            color: white;
            opacity: 0.8;

        }
    </style>
</head>

<body>
    <!-- natigation -->
    <?php include 'components/nav.php'; ?>


    <!-- 1 grid system -->
    <div class="grid-container">
        <?php include 'components/admin-nav.php'; ?>
        <!-- 2gird system -->

        <div class="grid-item2">
            <div class="order-search-bar">

                <form action="" method="POST" name="myForm" id="myForm">
                    <input type="checkbox" class="all" name="all" id="all"><span>All orders</span>
                    <input type="checkbox" class="approved" name="approved" id="approved"><span>Approved orders</span>
                    <input type="checkbox" class="canceled" name="canceled" id="canceled"><span>Canceled orders</span>
                    <input type="checkbox" class="new_orders" name="new_orders" id="new_orders"><span>New orders</span>
                    <input type="submit" class="order-search-btn" name="search" value="Search" name="submit">
                </form>
            </div>

            <div class="grid-align">
                <div class="order-main">
                    <table class="table">
                        <tr class="hedding">
                            <th>Product</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                        <?php while ($row = $result->fetch_assoc()) { ?>

                            <?php
                            $productId = $row['product_id'];
                            $user_id = $row['user_id'];
                            $result2 = $conn->query("SELECT * FROM add_item WHERE id = '$productId'");
                            $user = $conn->query("SELECT * FROM register WHERE id = '$user_id '");

                            ?>
                            <?php while ($row2 = $result2->fetch_assoc()) { ?>
                                <?php while ($row3 = $user->fetch_assoc()) { ?>
                                    <tr class="border-bottom">
                                        <td>
                                            <img src="upload/<?php echo $row2['image1']; ?>" alt="image1" srcset="" class="order-image">



                                        </td>
                                        <td>
                                            <?php echo $row3['frist_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row3['mobile']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['address']; ?>
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
                                            <form action="" method="post">
                                                <input hidden type="text" name="pr-id" id="" value="<?php echo $row['id']; ?>">
                                                <?php
                                                if ($row['status'] == 0) { ?>
                                                    <input name="accept-btn" class="accept-btn" type="submit" value="Accept">
                                                    <input name="cancel-btn" class="cancel-btn" type="submit" value="Cancel">
                                                <?php } else if ($row['status'] == 2) { ?>
                                                    <span class="canceled" >canceled</span>
                                                <?php } else { ?>
                                                    <span class="approved" >approved</span>
                                                <?php } ?>

                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>


                    </table>
                </div>
            </div>
        </div>

    </div>

    <!--footer-->
    </div>

</body>

</html>