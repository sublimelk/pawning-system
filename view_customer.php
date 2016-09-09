<?php
    include './includes.php';
    
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
    <tr>
        <td><?php echo $customers['name']; ?></td>
        <td><a href="edit_customer.php?id=<?php echo $customers['id']; ?>">Edit</a></td>
        <td><a href="delete_customer.php?id=<?php echo $customers['id']; ?>">Delete</a></td>
    </tr>
</table>

