<?php
include 'App/logout.php';
if ($_SESSION) {
    header("Location: index.php");
    exit();
}


include 'database_connection.php';
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

                                $sqlAdmin = "SELECT id FROM register WHERE usertype='admin'";
                                $resultAdmin = $conn->query($sqlAdmin);
                                if (mysqli_num_rows($resultAdmin) >= 1) {
                                    $newPass = md5($password);
                                    $sql = "INSERT INTO register (frist_name, last_name, email, mobile, password,usertype) VALUES ('$frist_name', '$last_name', '$email', '$phone_number', '$newPass','user')";
                                    // conn->query($sql)=run und kiyl blnwa, unanm true
                                    if ($conn->query($sql) === TRUE) {
                                        header("Location: login.php");
                                        exit();
                                    }
                                } else {
                                    $newPass = md5($password);
                                    $sql = "INSERT INTO register (frist_name, last_name, email, mobile, password,usertype) VALUES ('$frist_name', '$last_name', '$email', '$phone_number', '$newPass','admin')";
                                    // conn->query($sql)=run und kiyl blnwa, unanm true
                                    if ($conn->query($sql) === TRUE) {
                                        header("Location: login.php");
                                        exit();
                                    }
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
    <title>Register.html</title>

    <link rel="stylesheet" type="text/css" href="css/register.css">
    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">


</head>

<body>
    <!-- <div class="php">
  
</div> -->
    <?php include 'components/nav.php'; ?>


    <!-- registation -->
    <div class="register-img">
        <img src="images/852977.webp" alt="">
        <div class="main-container">

            <div class="heading">
                <h1>Register</h1>
            </div>
            <div class="input-section">
                <form class="subc-form" method="POST">
                    <h2 style="color: #fff;
                            text-shadow: 0px -1px 4px white, 0px -2px 10px yellow, 0px -10px 20px #ff8000, 0px -18px 40px red;">
                        <?php echo $error ?></h2>
                    <label>First Name</label><br>
                    <!-- value eken wenne error path eka wada kraroth data tika ethnam radila error kotasa wada kranna kiyala -->
                    <input type="text" name="f_name" class="f-name" placeholder="Frist Name" value="<?php echo $frist_name ?>"><br>

                    <br>
                    <label>Last Name</label><br>
                    <input type="text" name="l_name" class="l-name" placeholder="Last Name" value="<?php echo $last_name ?>"><br>

                    <br>
                    <label>E-mail</label><br>
                    <input type="email" name="email" class="email" placeholder="E-mail" value="<?php echo $email ?>"><br>

                    <label>Phone Number</label><br>
                    <input type="number" name="mobile" class="p-number" placeholder="Phone Number" value="<?php echo $phone_number ?>"><br>

                    <label>Enter Password</label><br>
                    <input type="password" name="password" class="password" placeholder="Password"><br><br>

                    <label>Confirm Password</label><br>
                    <input type="password" name="c_password" class="c-password" placeholder="Confirm-Password"><br><br>


                    <button class="btn" name="register">Register</button>
                   
                </form>

            </div>
        </div>

        <!--footer-->
        <div class="footer_registor">

            <?php include 'components/footer.php'; ?>


        </div>
    </div>
</body>

</html>