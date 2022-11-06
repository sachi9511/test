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

$error = "";


if (isset($_POST['btn'])) {
    $id = $_POST['delete'];
    $sql = "DELETE FROM register WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $status = "Record deleted successfully";
        header("Location: all-user.php");
    } else {
        $status = "Error deleting record: " . $conn->error;
    }
}
$result = $conn->query("SELECT * FROM register ORDER BY id DESC");


$conn->close();

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

            <div class="grid-align">
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <div class="content">
                        <p>Id <span> :<?php echo $row['id'] ?></span></p>
                        <p>Name <span> :<?php echo $row['frist_name'] . ' ' . $row['last_name'] ?></span></p>
                        <p>Email <span> :<?php echo $row['email'] ?></span></p>
                        <p>Mobile <span> :<?php echo $row['mobile'] ?></span></p>
                        <div class="edit-section">
                            <a href="edit-user.php?id=<?php echo $row['id']; ?>&fname=<?php echo $row['frist_name']; ?>&lname=<?php echo $row['last_name']; ?>&email=<?php echo $row['email']; ?>&mobile=<?php echo $row['mobile']; ?>&type=<?php echo $row['usertype']; ?>" class="edit-btnn">Edit</a>
                            <form action="" method="post" style="display: inline;">

                                <input hidden name="delete" type="text" value="<?php echo $row['id']; ?>">
                                <input name="btn" type="submit" value="Delete" class="delete-btnn">
                        </div>

                        </form>
                    </div>
                <?php } ?>
            </div>
        </div>

    </div>

    <!--footer-->
    </div>

</body>

</html>