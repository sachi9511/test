<?php
include 'App/logout.php';
include 'database_connection.php';

$search = $_GET['search'];
$result = $conn->query("SELECT * FROM add_item WHERE catagory LIKE '$search%' OR fname LIKE '$search%' OR description LIKE '$search%'");



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>item_select.php</title>


    <link rel="stylesheet" type="text/css" href="css/nav.css">

    <link rel="stylesheet" type="text/css" href="css/search.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <style>


    </style>
</head>

<body>
    <?php include 'components/nav.php'; ?>


    <!-- item select -->
    <div class="wrapper">
        <div class="img-area">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <!-- item_select.php ekt ynkot '?' eha tyen id aran yanna,clik krna ekt adala id eka arn ynne -->
                <a href="item_select.php?id=<?php echo $row['id']; ?>">
                    <div class="s-img"><img src="upload/<?php echo $row['image1']; ?>">
                        <div class="card">

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

    <?php include 'components/footer.php'; ?>

    </div>
</body>

</html>