<?php
    include './includes.php';
    
  $details = SystemData::getPawning();
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
    foreach ($details as $detail){
    ?>
    <tr>
        <td><?php echo $detail['cus_name']; ?></td>
        <td><a href="edit_pawning.php?id=<?php echo $detail['id']; ?>">Edit</a></td>
        <td><a href="delete_pawning.php?id=<?php echo $detail['id']; ?>">Delete</a></td>
        <?php 
    }
        ?>
    </tr>
</table>

