<?php
include './includes.php';

$details = Pawning::getReleasedPawning();

$invoice_id = SystemData::getInvoiceId();
?>


<html>
    <head>
        <title></title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/navbar.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" media="all" href="css/color-theme.css" />

        <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
        <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/togelmenu.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container-fluid"> 
            <?php include './navigation.php'; ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">View Released Pawning</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive"> 
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>Invoice Number</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th class="text-right">Amount</th>
                                    <th class="text-right">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($details as $detail) {
                                    ?>
                                    
                                    <tr>
                                        <td><?php echo SystemData::viewInvoiceId($detail['id']); ?></td>
                                        <td><?php echo Customer::getCustomersById($detail['customer'])["name"]; ?></td>
                                        <td><?php echo $detail['date']; ?></td>
                                        <td class="text-right"><?php echo $detail['amount']; ?></td>
                                        <td class="text-right">
                                            <a class="btn btn-default"  href="edit_pawning.php?id=<?php echo $detail['id']; ?>">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                            </a>
                                        </td>
                                        <?php
                                    }
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#myTable').DataTable();
            });
        </script>
    </body>
</html>
