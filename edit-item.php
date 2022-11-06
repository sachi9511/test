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
$name = $_GET['fname'];
$price = $_GET['price'];
$catagory = $_GET['catagory'];
$description = $_GET['description'];
if (isset($_POST['submit'])) {
    $name = $_POST['fname'];
    $price = $_POST['price'];
    $catagory = $_POST['catagory'];
    $description = $_POST['description'];

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
    if ($allimage[0] && $allimage[1] && $allimage[2]) {
        $sql = "UPDATE add_item SET image1 = '$allimage[0]',image2 = '$allimage[1]',image3 = '$allimage[2]',fname = '$name',price = '$price',catagory = '$catagory',description = '$description' WHERE id = '$id'";
    } elseif ($allimage[0] && $allimage[1]) {
        $sql = "UPDATE add_item SET image1 = '$allimage[0]',image2 = '$allimage[1]',fname = '$name',price = '$price',catagory = '$catagory',description = '$description' WHERE id = '$id'";
    } elseif ($allimage[0]) {
        $sql = "UPDATE add_item SET image1 = '$allimage[0]',fname = '$name',price = '$price',catagory = '$catagory',description = '$description' WHERE id = '$id'";
    } else {
        $sql = "UPDATE add_item SET fname = '$name',price = '$price',catagory = '$catagory',description = '$description' WHERE id = '$id'";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: all-item.php");
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
                <h1 style="text-align: left; color:black;">Edit Item</h1>
                <table style="text-align:left;">
                    <h2 class="error"><?php echo $error ?></h2>
                    <tr>
                        <td>Product Name</td>
                        <td><input class="input" type="text" name="fname" value="<?= $name ?>"></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><input class="input" type="text" name="price" value="<?= $price ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Catagory</td>
                        <td><select class="input" name="catagory">
                                <option value="<?= $catagory ?>" selected><?= $catagory ?></option>
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
                            <input type="file" name="image[]" multiple>
                        </td>
                    </tr>
                    <tr>
                        <td>Description <br /><br /><br /></td>
                        <td><textarea name="description" rows="8" cols="58"><?= $description ?></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" >
                            <input class="btn btn-size btn2 edit-item-btn" type="submit" name="submit" value="Update">
                            
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