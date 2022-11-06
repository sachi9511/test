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


if (isset($_POST['btn'])) {
    $id = $_POST['delete'];
    $sql = "DELETE FROM add_item WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $status = "Record deleted successfully";
        header("Location: all-item.php");
    } else {
        $status = "Error deleting record: " . $conn->error;
    }
}
$result = $conn->query("SELECT * FROM add_item ORDER BY id DESC");
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
        .all-img {
            width: 200px;
            height: 200px;

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


                        <img class="all-img" src="upload/<?php echo $row['image1']; ?>">

                        <form action="" method="post" style="display: inline;">
                            <div class="edit-section">
                                <a href="edit-item.php?id=<?php echo $row['id']; ?>&fname=<?php echo $row['fname']; ?>&price=<?php echo $row['price']; ?>&catagory=<?php echo $row['catagory']; ?>&description=<?php echo $row['description']; ?>" class="edit-btn">Edit</a>
                                <input hidden name="delete" type="text" value="<?php echo $row['id']; ?>">
                                <input name="btn" type="submit" value="Delete" class="delete-btn">
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