<style>
    .grid-item1 {
        border: none;
    }

    .admin {
        width: auto;
        /* height: 60px; */
        background-color: <?php if ($_SERVER['REQUEST_URI'] == '/myproject/admin.php') {
                                echo '#dd5da8';
                            } else {
                                echo '#f896cf';
                            } ?>;
    }

    .all-item {
        width: auto;
        /* height: 60px; */
        background-color: <?php if ($_SERVER['REQUEST_URI'] == '/myproject/all-item.php') {
                                echo '#dd5da8';
                            } else {
                                echo '#f896cf';
                            } ?>;
    }

    .add-item {
        width: auto;
        /* height: 60px; */
        background-color: <?php if ($_SERVER['REQUEST_URI'] == '/myproject/add_item.php') {
                                echo '#dd5da8';
                            } else {
                                echo '#f896cf';
                            } ?>;
    }

    .all-user {
        width: auto;
        /* height: 60px; */
        background-color: <?php if ($_SERVER['REQUEST_URI'] == '/myproject/all-user.php') {
                                echo '#dd5da8';
                            } else {
                                echo '#f896cf';
                            } ?>;
    }

    .admin-register {
        width: auto;
        /* height: 60px; */
        background-color: <?php if ($_SERVER['REQUEST_URI'] == '/myproject/admin-register.php') {
                                echo '#dd5da8';
                            } else {
                                echo '#f896cf';
                            } ?>;
    }
    .orders {
        width: auto;
        /* height: 60px; */
        background-color: <?php if ($_SERVER['REQUEST_URI'] == '/myproject/orders.php') {
                                echo '#dd5da8';
                            } else {
                                echo '#f896cf';
                            } ?>;
    }

    .dd:hover {
        width: auto;
        /* height: 60px; */
        background-color: #dd5da8;
    }

    .hr {
        margin-top: -17px;
        border: 1px solid #f896cf;

    }

    .hr-b {
        border: 1px solid #f896cf;

    }
    .admin-nav-items{
        font-size: 20px;
    }
</style>
<link rel="stylesheet" type="text/css" href="css/admin.css">
<div class="grid-item1">
    <div class="link" style="margin-top: 100px; background-color: #f896cf;">

        <div class="dd admin">
            <hr class="hr">

            <a href="admin.php" class="admin-nav-items">Dashboard</a>
            <hr>
        </div>
        <div class="dd all-item">
            <hr class="hr">

            <a href="all-item.php" class="admin-nav-items">All Items</a>
            <hr>
        </div>
        <div class="dd all-user">
            <hr class="hr">
            <a href="all-user.php" class="admin-nav-items">All user</a>

            <hr>
        </div>
        <div class="dd orders">
            <hr class="hr">
            <a href="orders.php" class="admin-nav-items">Orders</a>

            <hr class="hr-b">
        </div>
        <div class="dd add-item">
            <hr class="hr">
            <a href="add_item.php" class="admin-nav-items">Add Items</a>

            <hr>
        </div>

        <div class="dd admin-register">
            <hr class="hr">
            <a href="admin-register.php" class="admin-nav-items">Admin Register</a>

            <hr class="hr-b">
        </div>


    </div>
</div>