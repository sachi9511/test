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
$id = $_GET['id'];
$fname = $_GET['fname'];
$lname = $_GET['lname'];
$email = $_GET['email'];
$mobile = $_GET['mobile'];
$type = $_GET['type'];
if (isset($_POST['btn'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $type = $_POST['type'];
    $sql = "UPDATE register SET frist_name = '$fname',last_name = '$lname',email = '$email',mobile = '$mobile',usertype = '$type' WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: all-user.php");
        exit();
    }
}
$conn->close();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>add_items.php</title>
    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <link rel="stylesheet" type="text/css" href="css/add_item.css">
    <style>
        .edit-item-btn{
            margin-left: 8px;
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

        <div class="grid-item2" style="text-align: left;">


            <form action="" method="POST">
                <h1 style="text-align: left; color:black;">Edit User</h1>
                <table style="text-align:left;">
                    <h2 class="error"><?php echo $error ?></h2>
                    <div class="" style="color: black;">
                        <tr>
                            <td>Fname</td>
                            <td> <?php $id; ?> <input class="input" name="fname" type="text" value="<?php echo $fname; ?>"></td>
                        </tr>

                        <tr>
                            <td>Lame </td>
                            <td>

                                <input class="input" name="lname" type="text" value="<?php echo $lname; ?>">
                            </td>
                        </tr>


                        <tr>
                            <td>Email </td>
                            <td><input class="input" name="email" type="email" value="<?php echo $email; ?>"></td>
                        </tr>
                        <tr>
                            <td>

                                Mobile
                            </td>
                            <td>
                                <input class="input" name="mobile" type="number" value="<?php echo $mobile; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>Type</td>
                            <td>

                                <span>Admin</span><input type="radio" name="type" id="1" <?php if ($type == 'admin') echo 'checked'; ?> value="admin">
                                <span>User</span><input type="radio" name="type" id="1" value="user" <?php if ($type == 'user') echo 'checked'; ?>>
                            </td>

                        </tr>
                        <tr>
                            <td></td>
                            <td>

                                <input class="btn btn-size btn2 edit-item-btn" type="submit" value="Update" name="btn">
                            </td>
                        </tr>

                    </div><br>

            </form>

            </table>

        </div>

    </div>

    <!--footer-->
    </div>

</body>

</html>