<?php
include 'database_connection.php';

include 'App/logout.php';
// check the login && who is user
if ($_SESSION && $_SESSION['usertype'] === "admin") {
    // $auth = $_SESSION['usertype'];
} else {
    header("Location: index.php");
    exit();
}

$error = "";
if (isset($_POST['submit'])) {
    $name = $_POST['fname'];
    $price = $_POST['price'];
    $catagory = $_POST['catagory'];
    $description = $_POST['description'];

    if ($name) {
        if ($price) {
            if ($catagory) {
                if ($description) {
                    // image
                    $imageCount = count($_FILES['image']['name']);
                    $allimage = array();
                    for ($i = 0; $i < $imageCount; $i++) {
                        $imageName = $_FILES['image']['name'][$i];
                        $imageTempName = $_FILES['image']['tmp_name'][$i];
                        $targetPath = "./upload/" . $imageName;
                        if (move_uploaded_file($imageTempName, $targetPath)) {
                            array_push($allimage, $imageName);
                        }
                    }
                    $sql = "INSERT INTO add_item (image1,image2,image3,fname, price, catagory, description ) VALUES ('$allimage[0]','$allimage[1]','$allimage[2]','$name', '$price', '$catagory', '$description')";

                    if ($conn->query($sql) === TRUE) {
                        header("Location: add_item.php");
                        exit();
                    }
                } else {
                    $error = "Description Requred";
                }
            } else {
                $error = "Catagory Requred";
            }
        } else {
            $error = "Price Requred";
        }
    } else {
        $error = "Name Requred";
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
</head>

<body>
    <!-- natigation -->
    <?php include 'components/nav.php'; ?>


    <!-- 1 grid system -->
    <div class="grid-container">
    <?php include 'components/admin-nav.php'; ?>
        <!-- 2gird system -->

        <div class="grid-item2">
            
            <form action="" method="POST" enctype="multipart/form-data">
                <table style="text-align:left;">
                    <h2 class="error" ><?php echo $error ?></h2>
                    <tr>
                        <td>Product Name</td>
                        <td><input type="text" name="fname" class="input"></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><input type="text" name="price" class="input">
                        </td>
                    </tr>
                    <tr>
                        <td>Catagory</td>
                        <td><select class="input" style="height: 25px; width:170px;" name="catagory">
                                <option value="">select catagory</option>
                                <option value="heels">Heels</option>
                                <option value="Flip_Flops">Flip Flops</option>
                                <option value="Sandals">Sandals</option>
                                <option value="Sport">Sport</option>
                                <option value="Casual_Shoes">Casual Shoes</option>
                                <option value="Closed_Shoes">Closed Shoes</option>
                            </select></td>
                    </tr>
                    <tr>

                        <td>Image</td>
                        <td>
                            <input  type="file" name="image[]" multiple>
                        </td>
                    </tr>
                    <tr>
                        <td>Description <br /><br /><br /></td>
                        <td><textarea name="description" rows="8" cols="58"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" >
                            <input class="btn btn-size btn2" type="submit" name="submit" value="submit">
                            <input  type="reset" value="Reset" class="btn2 btn-reset" >
                        </td>
                    </tr>
                </table>
            </form>
        </div>

    </div>

    <!--footer-->
    </div>

</body>

</html>