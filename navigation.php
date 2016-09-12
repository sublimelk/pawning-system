<?php
$user = User::getUser();
$customer = Customer::getCustomers();
?>
<ul> 
    <li>
        <a>Customers</a>
        <ul> 
            <li>
                <a href="add_customer.php">Add New</a>
            </li>
            <li>
                <a href="view_customers.php">View</a>
            </li>
        </ul>
    </li>
    <li>
        <a>Pawning</a>
        <ul> 
            <li>
                <a href="add_pawning.php">Add New</a>
            </li>
            <li>
                <a href="view_pawning.php">View</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="profile.php?id=<?php echo $user['id']; ?>">Profile</a>
    </li>
    <li>
        <a href="log-out.php">Logout</a>
    </li>
</ul>