<?php 
    $user = User::getUser();
    $customer = Customer::getCustomers();
?>
<ul> 
    <li>
        <a href="add_customer.php">Customer</a>
    </li>
    <li>
        <a href="view_customer.php">View Customers</a>
    </li>
    <li>
        <a href="profile.php?id=<?php echo $user['id']; ?>">Profile</a>
    </li>
    <li>
        <a href="log-out.php">Logout</a>
    </li>
</ul>