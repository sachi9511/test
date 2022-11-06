<?php
include 'App/logout.php';
if ($_SESSION) {
    header("Location: index.php");
    exit();
}



include 'database_connection.php';

$error = "";

$email = "";
$password = "";
if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($email) {
        if ($password) {
            $newPassword = md5($password);

            $sql = "SELECT * FROM register WHERE email = '$email' and password = '$newPassword'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);
            if ($count == 1) {
                $_SESSION["user_id"] = $row["id"];
                $_SESSION["name"] = $row["frist_name"];
                $_SESSION["usertype"] = $row["usertype"];
                if ($_SESSION["usertype"] === 'admin') {
                    header("Location: admin.php");
                    exit();
                } else {
                    header("Location: index.php");
                    exit();
                }
            } else {
                $error = "Login failed. Invalid username or password.";
            }
        } else {
            $error = "Password is Requred";
        }
    } else {
        $error = "Email is Requred";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login.html</title>
    <style>



    </style>

    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">


</head>

<body>
    <!-- navigation -->
    <?php include 'components/nav.php'; ?>


    <!-- login kotasa -->
    <div class="register-img">
        <img src="images/852977.webp" alt="">
        <div class="main-container">

            <div class="heading">
                <h1>Login</h1>
            </div>
            <div class="input-section">
                <form action="" class="subc-form" method="POST">
                    <?php echo $error ?>
                    <label>E-mail</label><br>
                    <input type="email" name="email" class="email" placeholder="E-mail"><br>
                    <label>Enter Password</label><br>
                    <input type="password" name="password" class="password" placeholder="Password"><br><br>
                    <button class="btn" name="login">Login</button>
                </form>

            </div>

        </div>
        <!--footer-->
        <div class="footer_registor">
        <?php include 'components/footer.php'; ?>

        </div>
    </div>
    </div>
</body>

</html>