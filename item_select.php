<?php
include 'App/logout.php';
include 'database_connection.php';

// arahen ena url eke id eka
$item_id = $_GET['id'];
$sql = "SELECT * FROM add_item WHERE id='$item_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

if (isset($_POST['buynow'])) {
    $qty = $_POST['qty'];
    $size = $_POST['size'];
    // id(api hadagathth id ekak)=" . $row['id']
    header("Location: buy_now.php?id=" . $row['id'] . "&qty=" . $qty . "&size=" . $size. "&price=" . $row['price']);
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>item_select.php</title>


    <link rel="stylesheet" type="text/css" href="css/nav.css">

    <link rel="stylesheet" type="text/css" href="css/item_select.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    

</head>

<body>
    <?php include 'components/nav.php'; ?>

    <div class="grid-container">

        <!-- 1 -->
        <div class="grid-item1 pic-position">
            <img class="prev" src="upload/<?php echo $row['image1'] ?>">
            <div style="display: flex;">
                <img class="click1" src="upload/<?php echo $row['image1'] ?>">
                <img class="click2" src="upload/<?php echo $row['image2'] ?>">
                <img class="click3" src="upload/<?php echo $row['image3'] ?>">
            </div>
        </div>

        <!-- 2 -->
        <div class="grid-item2">

            <form action="" method="POST">
                <div class="details">
                    <div style="font-size: 20pt; font-weight: bold;"><?php echo $row['fname'] ?></div>
                    <br>
                    <div style="font-size: 13px; width: 370px;"><?php echo $row['description'] ?></div>
                    <br>
                    <div style="font-size: 15pt; ">Rs.<?php echo $row['price'] ?>/=</div>
                    <br>
                    <br>

                    <span style="font-size: 17px; font-weight: bold; ">Size</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <select name="size" id="size" style="height: 25px; font-size: 20px;">
                        <option>Chose An Option</option>
                        <option id="size" value="3" selected>3</option>
                        <option id="size" value="4">4</option>
                        <option id="size" value="5">5</option>
                        <option id="size" value="6">6</option>
                        <option id="size" value="7">7</option>
                        <option id="size" value="8">8</option>
                    </select>
                    <br>
                    <br>
                    <div>

                        <span style="font-size: 17px; font-weight: bold; ">Quantity </span><input type="number" name="qty" style="height: 20px; width: 40px; font-size: 20px; " value="1">
                        <br><br>
                        <br><br>
                        <button class="btn btn-size btn2" name="buynow">Buy Now</button>
                    </div>
                </div>
            </form>
        </div>


    </div>

    </div>

    <?php include 'components/footer.php'; ?>

    </div>
    <script>
        const prev = document.querySelector(".prev");
        const click1 = document.querySelector(".click1");
        const click2 = document.querySelector(".click2");
        const click3 = document.querySelector(".click3");

        click1.addEventListener("click", function() {
            prev.src = "upload/<?php echo $row['image1'] ?>";
            click1.style = 'opacity: 1';
            click2.style = 'opacity: 0.3';
            click3.style = 'opacity: 0.3';
        });
        click2.addEventListener("click", function() {
            prev.src = "upload/<?php echo $row['image2'] ?>";
            click1.style = 'opacity: 0.3';
            click2.style = 'opacity: 1';
            click3.style = 'opacity: 0.3';
        });
        click3.addEventListener("click", function() {
            prev.src = "upload/<?php echo $row['image3'] ?>";
            click1.style = 'opacity: 0.3';
            click2.style = 'opacity: 0.3';
            click3.style = 'opacity: 1';
        });
    </script>
</body>

</html>