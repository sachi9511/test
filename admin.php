<?php
include 'App/logout.php';

if ($_SESSION && $_SESSION['usertype'] === "admin") {
    $auth = $_SESSION['usertype'];
} else {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>admin.php</title>


    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">



</head>

<body>
    <?php include 'components/nav.php'; ?>


    <!-- 1 grid system -->
    <div class="grid-container">
    <?php include 'components/admin-nav.php'; ?>
        <!-- 2gird system -->

        <div class="grid-item2">
            <p style="font-size: 20px;">
            
            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                an unknown printer took a galley of type and scrambled it tomake a type specimen book.
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
            e veniam at? Laborum illo quibusdam numquam eum quaerat,
             repellendus inventore, libero officia ipsam a, incidunt 
             ad ut similique dicta esse? Voluptatum placeat eos veniam 
             voluptas hic mollitia aperiam consequatur dolore vitae! In
              quas nulla ipsum. Similique molestias vel ipsa quibusdam,
               ad, mollitia, in sequi officia ipsam corporis quasi quidem.
                Sint deleniti architecto eveniet provident placeat delectus 
                odio repellat, nostrum, maiores consectetur maxime culpa quam 
                error neque suscipit sequi nesciunt iusto. Veniam ab exercitationem 
                placeat facilis minima iusto! Facilis voluptas autem quasi voluptatibus 
                dignissimos ipsa minus quae beatae officiis dolorum, nam laboriosam 
                unde dolorem architecto! Assumenda corporis rem facere et esse officiis? 
                Esse distinctio libero ea quas asperiores amet vero cumque,
                vel culpa tempora est pariatur eaque ducimus non eligendi! 
                Dignissimos necessitatibus quo error temporibus labore 
                cumque magnam sequi quidem! Commodi repellat minus voluptatem fugit.
                 Minima consequuntur dolores nesciunt hic doloremque eveniet? 
                 Quisquam, distinctio dolorum deserunt explicabo, 
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 
</p>

        </div>
        </form>
    </div>

    <!--footer-->
 
    </div>
</body>

</html>