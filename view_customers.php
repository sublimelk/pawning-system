<?php
    include './includes.php';
    include './navigation.php'; 
    
   $customers = Customer::getCustomers();
?>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 15px;
}
</style>
<table>
    <tr>
    <th>Name</th>
    <th>Edit</th>
    <th>Delete</th>
    </tr>
    <?php
    foreach ($customers as $customer){
    ?>
    <tr>
        <td><?php echo $customer['name']; ?></td>
        <td><a href="edit_customer.php?id=<?php echo $customer['id']; ?>">Edit</a></td>
        <td><a href="delete_customer.php?id=<?php echo $customer['id']; ?>">Delete</a></td>
        <?php 
    }
        ?>
    </tr>
</table>

