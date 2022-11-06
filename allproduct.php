<?php
include 'App/logout.php';
include 'database_connection.php';


$result = $conn->query("SELECT * FROM add_item ORDER BY id DESC");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>all_product.html</title>

    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/all-product.css"> 
    <link rel="stylesheet" type="text/css" href="css/card.css">


</head>

<body>

    <!--navigation-->
    <?php include 'components/nav.php'; ?>

    <!--all product-->

    <div class="wrapper">
        <div class="img-area">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <a href="item_select.php?id=<?php echo $row['id']; ?>">
                    <div class="s-img"><img src="upload/<?php echo $row['image1']; ?>">
                        <div class="card cardx">

                            <h2>

                                <?php echo $row['fname']; ?>
                            </h2>
                            <h3>

                                <?php echo $row['price']; ?>
                            </h3>
                        </div>

                    </div>

                </a>


            <?php } ?>

        </div>
    </div>

    <!--footer-->
    <?php include 'components/footer.php'; ?>

    </div>
    </div>


</body>

</html>