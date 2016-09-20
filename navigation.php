<?php
$user = User::getUser();
$customer = Customer::getCustomers();
?>

<div class="wsmenucontainer clearfix">
    <div class="overlapblackbg"></div>
    <div class="wsmobileheader clearfix">
        <a id="wsnavtoggle" class="animated-arrow"><span></span></a>
        <a class="smallogo"><img src="images/logo.jpg" width="87" alt="" /></a>
    </div>
    <div class="wsmain ">
        <div class="smllogo"><a href="index.php"><img src="images/logo.jpg" alt=""/></a></div>

        <nav class="wsmenu clearfix">
            <ul class="mobile-sub wsmenu-list">
                <li class="rightmenu">
                    <a href="log-out.php">Logout</a>
                </li>

                <li><a href="#" class="active menuhomeicon"><i class="fa fa-home"></i><span class="mobiletext">Home</span></a></li>
                <li><a href="#"><i class="fa fa-align-justify"></i>Customers <span class="arrow"></span></a>
                    <ul class="wsmenu-submenu">
                        <li><a href="add_customer.php"><i class="fa fa-angle-right"></i>Add New </a></li>
                        <li><a href="view_customers.php"><i class="fa fa-angle-right"></i>View</a></li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-list-alt"></i>Pawning <span class="arrow"></span></a>
                    <ul class="wsmenu-submenu">
                        <li><a href="add_new_pawning.php"><i class="fa fa-angle-right"></i>Add New </a></li>
                        <li><a href="view_pawning.php"><i class="fa fa-angle-right"></i>View</a></li>
                        <li><a href="view_released_pawning.php"><i class="fa fa-angle-right"></i>View Released</a></li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-list-alt"></i>Releasing <span class="arrow"></span></a>
                    <ul class="wsmenu-submenu">
                        <li><a href="add_new_release.php"><i class="fa fa-angle-right"></i>Add New </a></li>
                        <li><a href="view_releasing.php"><i class="fa fa-angle-right"></i>View</a></li>
                    </ul>
                </li>
                <li><a href=""><i class="fa fa-list-alt"></i>Report <span class="arrow"></span></a>
                    <ul class="wsmenu-submenu">
                        <li><a href="pawning_report.php"><i class="fa fa-angle-right"></i>Pawning </a></li>
                        <li><a href="release_report.php"><i class="fa fa-angle-right"></i>Release</a></li>
                    </ul>
                </li>
                <li><a href="profile.php?id=<?php echo $user['id']; ?>"><i class="fa fa-list-alt"></i>Profile </a></li>
            </ul>
        </nav>
    </div>
</div>


