<?php
$user = User::getUser();
$customer = Customer::getCustomers();
?>
<html>
    <head>
        <title></title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <link href="css/navbar.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="wsmain ">
            <div class="smllogo"><a href="#"><img src="images/logo.jpg" alt=""/></a></div>

            <nav class="wsmenu clearfix">
                <ul class="mobile-sub wsmenu-list">
                    <li class="rightmenu">
                        <a href="log-out.php">Logout</a>
                    </li>

                    <li><a href="#" class="active menuhomeicon"><i class="fa fa-home"></i><span class="mobiletext">Home</span></a></li>
                    <li><a href="#"><i class="fa fa-align-justify"></i>Customers <span class="arrow"></span></a>
                        <ul class="wsmenu-submenu">
                            <li><a href="add_customer.php"><i class="fa fa-angle-right"></i>Add New Customer </a></li>
                            <li><a href="view_customers.php"><i class="fa fa-angle-right"></i>View Customer</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-list-alt"></i>Pawning <span class="arrow"></span></a>
                        <ul class="wsmenu-submenu">
                            <li><a href="add_new_pawning.php"><i class="fa fa-angle-right"></i>Add New Pawning </a></li>
                            <li><a href="view_pawning.php"><i class="fa fa-angle-right"></i>View pawning</a></li>
                        </ul>
                    </li>
                    <li><a href="profile.php?id=<?php echo $user['id']; ?>"><i class="fa fa-list-alt"></i>Profile </a></li>
                </ul>
            </nav>
        </div>
    </body>
</html>
