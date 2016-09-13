<?php
    include './includes.php';
    include './navigation.php';
    
  $details = Pawning::getPawning();
  
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
    <th>Date</th>
    <th>Amount</th>
    <th>Edit</th>
    </tr>
    <?php
    foreach ($details as $detail ){
    ?>
    <tr>
        <td><?php echo Customer::getCustomersById($detail['customer'])["name"]; ?></td>
        <td><?php echo $detail['date']; ?></td>
        <td><?php echo $detail['amount']; ?></td>
        <td><a href="edit_pawning.php?id=<?php echo $detail['id']; ?>">Edit</a></td>
        <?php 
    }
        ?>
    </tr>
</table>

