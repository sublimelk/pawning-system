<?php
include './includes.php';

$id = $_GET['id'];

$customers = Customer::getCustomersById($id);

$pawnings = Pawning::getPawningByCustomer($id);

?>
<html>
    <head>
        <title></title>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2><?php echo $customers['name']; ?></h2>
        <img src="img/customers/<?php echo $customers['id'] . '.' . $customers['img_type']; ?>" width="100" height="100"/>
        <p><?php echo $customers['nic']; ?></p>
        <p><?php echo $customers['address']; ?></p>
        <p><?php echo $customers['phone']; ?></p>


        <table >
            <tr><th>Pawning Details</th></tr>
            <tr>
                <th>Date</th>
                <th>Item Type</th>
                <th>Carat Size</th>
                <th>Weight</th>
                <th>Interest</th>
                <th>Amount</th>
            </tr>
            
            <?php 
            foreach ($pawnings as $pawning){
            ?>
                <tr>
                    <td><?php echo $pawning['date']; ?></td>
                    <td><?php echo $pawning['item_type']; ?></td>
                    <td><?php echo $pawning['car_size']; ?></td>
                    <td><?php echo $pawning['weight']; ?></td>
                    <td><?php echo $pawning['interest']; ?></td>
                    <td><?php echo $pawning['amount']; ?></td>

                </tr>
                <?php
            }
                ?>
        </table>

    </body>
</html>