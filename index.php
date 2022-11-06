<?php

include 'App/logout.php';

include 'database_connection.php';

// conn kiyana database eke query eka run krnwa
$result = $conn->query("SELECT * FROM add_item ORDER BY id DESC LIMIT 8");
if (isset($_POST['searchBtn'])) {

    $name = $_POST['s_name'];
    header("Location: searchbar.php?search=" . $name);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shoes</title>

    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/card.css">
    <style>




    </style>
</head>

<body>
    <!--navigation-->
    <?php include 'components/nav.php'; ?>
    <!--carousal-->
    <div class="slider">
        <figure>

            <div class="slide">
                <img src="images/Summer-Slippers.jpg">
            </div>
            <div class="slide">
                <img src="images/4477491.jpg">
            </div>
            <div class="slide">
                <img src="images/sandels-a.jpg">
            </div>
            <div class="slide">
                <img src="images/runningshoes-210202-bd-2x1.jpg">
            </div>
            <div class="slide">
                <img src="images/everlane-slip-on-sneakers-women.webp">
            </div>

        </figure>
    </div>

    <!--new fashion-->
    <div class="wrapper">
        <h1 style="color:black;font-size: 70px;">New Fashion</h1>
        <div class="img-area">
            <!-- result eke data row ekt dgnnwa -->
            <?php while ($row = $result->fetch_assoc()) { ?>
                <!-- item_select.php ekt ynkot '?' eha tyen id aran yanna,clik krna ekt adala id eka arn ynne -->
                <a href="item_select.php?id=<?php echo $row['id']; ?>">
                    <div class="s-img"><img src="upload/<?php echo $row['image1']; ?>">
                        <div class="card cardx">

                            <h2>

                                <?php echo $row['fname']; ?>
                            </h2>
                            <h3>

                                <span>Rs. </span><?php echo $row['price']; ?><span>/=</span>
                            </h3>
                        </div>

                    </div>
                </a>
            <?php } ?>

        </div>
    </div>

    <!-- category-->
    <!-- frist line -->
    <div class="wrapper1">
        <h1 style="color:black;font-size: 70px;">Catogery</h1>
        <div class="img-area1">
            <div class="s-img1"><a href="search.php?catagory=Sandals"><img src="images/catogory/Sadals.jpg"></a></div>
            <div class="s-img1"><a href="search.php?catagory=Flip_Flops"><img src="images/catogory/FilpFlops.jpg"></a></div>
            <div class="s-img1"><a href="search.php?catagory=heels"><img src="images/catogory/Hells.jpg"></a></div>

            <div style="display: flex;">

                <section class="cont1">
                    <div class="card ">
                        <h2><a href="search.php"> Ladies Sandals</a></h2>

                    </div>
                    <div class="card ">
                        <h2><a href="search.php"> Ladies Flip Flops</a></h2>

                    </div>
                    <div class="card ">
                        <h2><a href="search.php"> Ladies Heel</a></h2>

                    </div>

                </section>
            </div>
        </div>
        <!-- secont line -->
        <div class="wrapper1">

            <div class="img-area1">
                <div class="s-img1"><a href="search.php?catagory=Closed_Shoes"><img src="images/catogory/ClosedShoes.jpg"></a></div>
                <div class="s-img1"><a href="search.php?catagory=Casual_Shoes"><img src="images/catogory/CasualShoes.jpg"></a></div>
                <div class="s-img1"><a href="search.php?catagory=Sport"><img src="images/catogory/sports.jpg"></a></div>
                <section class="cont1">
                    <div class="card ">
                        <h2><a href="search.php"> Women's Closed Shoes</a></h2>

                    </div>
                    <div class="card ">
                        <h2><a href="search.php">Women's Casual Shoes</a></h2>

                    </div>
                    <div class="card ">
                        <h2><a href="search.php"> Women's Sport</a></h2>

                    </div>

                </section>

            </div>




            <!--about us-->

            <?php include 'components/footer.php'; ?>

</body>

</html>