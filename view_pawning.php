<?php
include './includes.php';

$details = Pawning::getPawning();
?>


<html>
    <head>
        <title></title>
    </head>
    <body>
        <div class="container"> 
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">View Pawning</h3>
                </div>
                <div class="table-responsive"> 
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($details as $detail) {
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
