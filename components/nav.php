<?php
if (isset($_POST['searchBtn'])) {

    $name = $_POST['s_name'];
    header("Location: searchbar.php?search=" . $name);
    exit();
}
?>
<nav>
    <img src="images/sp-new.png" class="logo">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="allproduct.php">All Product</a></li>
        <li>
            <div class="dropdown">
                <button class="dropbtn">Category</button>

                <div class="dropdown-content">
                    <a href="search.php?catagory=Closed_Shoes">Closed Shoes</a>
                    <a href="search.php?catagory=Casual_Shoes">Casual Shoes</a>
                    <a href="search.php?catagory=Sport">Sport</a>
                    <a href="search.php?catagory=Sandals">Sandals</a>
                    <a href="search.php?catagory=Flip_Flops">Flip Flops</a>
                    <a href="search.php?catagory=heels">Heels</a>
                </div>
            </div>
        </li>

        <li class="bar">
            <form class="search-bar" method="POST">
                <input type="text" name="s_name" placeholder="Search">
                <button class="searchBtn" name="searchBtn"> Search</button>
                
            </form>
        </li>
        <?php if ($_SESSION) {
            echo "<form  class='form1' method='POST'>";
            if ($_SESSION['usertype'] === 'admin') {

                echo "<li><a href='admin.php'>" . $_SESSION['usertype'] . "</a></li>";
            } else {
                echo "<li><a href='my_orders.php'>" .'Orders' . "</a></li>";
             
                
            }
            
            echo "<li><button class='logout' name='logout'>Logout</button></li>";
            echo "</form>";
        } else {
            echo "<li><a href='login.php'>Login</a></li>";
            echo "<li><a href='register.php'>Register</a></li>";
        }
        
        ?>


    </ul>
</nav>