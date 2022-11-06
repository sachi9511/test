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
$frist_name = "";
$last_name = "";
$email = "";
$phone_number = "";
$password = "";
$confirm_password = "";
$usertype = "";

if (isset($_POST['register'])) {

    $frist_name = $_POST['f_name'];
    $last_name = $_POST['l_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['mobile'];
    $password = $_POST['password'];
    $confirm_password = $_POST['c_password'];
    $usertype = $_POST['usertype'];
    if ($frist_name) {

        if ($last_name) {

            if ($email) {
                $check = mysqli_query($conn, "SELECT * FROM register WHERE email='$email'");
                if (mysqli_num_rows($check)) {
                    $error = "This email alredy used!";
                } else {

                    if ($phone_number) {

                        if ($password) {
                            if ($password === $confirm_password) {

                                $newPass = md5($password);
                                $sql = "INSERT INTO register (frist_name, last_name, email, mobile, password,usertype) VALUES ('$frist_name', '$last_name', '$email', '$phone_number', '$newPass','admin')";
                                // conn->query($sql)=run und kiyl blnwa, unanm true
                                if ($conn->query($sql) === TRUE) {
                                    header("Location: admin-register.php");
                                    exit();
                                }
                            } else {
                                $error = "password incorrect";
                            }
                        } else {
                            $error = "password  is Requred";
                        }
                    } else {
                        $error = "Phone number is not valid";
                    }
                }
            } else {
                $error = "Email is not valid";
            }
        } else {
            $error = "Last Name Requred";
        }
    } else {
        $error = "Frist Name Requred";
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
        .s-img {
            width: 100px;
        }

        .all-img {
            width: 200px;
        }

        .grid-align {
            margin-left: -30px;
            color: white;
            text-align: left;
            font-size: large;
        }
        .input{
            margin-left: -650px;
            width: 250px;
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

            <table style="text-align:left;">
                   
                       <h2><?php echo $error ?></h2>
                    <form action="" method="post">
                        <tr><td>First name</td> <td><input class="input" type="text" name="f_name" id="" value="<?php echo $frist_name ?>"></td></tr>
                        <tr><td>Last Name </td><td><input class="input" type="text" name="l_name" id="" value="<?php echo $last_name ?>"></td></tr>
                        <tr><td>Email </td><td><input class="input" type="email" name="email" id="" value="<?php echo $email ?>"></td></tr>
                        <tr><td>Mobile </td><td><input class="input" type="number" name="mobile" id="" value="<?php echo $phone_number ?>"></td></tr>
                        <tr><td>Password </td><td><input class="input" type="password" name="password" id=""></td></tr>
                        <tr><td>Conform Password</td> <td><input class="input" type="password" name="c_password" id=""></td></tr>

                        <tr><td><input name="register" type="submit" value="Register" style=" margin-left:340px;"class="btn btn-size btn2 edit-item-btn" ></td></tr>
                    </form>
            </table>
        </div>

    </div>

    <!--footer-->
    </div>

</body>

</html>