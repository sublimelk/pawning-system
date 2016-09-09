<?php 
    $user = User::getUser();
?>
<ul> 
    <li>
        <a href="customer.php">Customer</a>
    </li>
    <li>
        <a href="profile.php?id=<?php echo $user['id']; ?>">Profile</a>
    </li>
    <li>
        <a href="log-out.php">Logout</a>
    </li>
</ul>