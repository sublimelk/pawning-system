<?php
include './includes.php';

$id = $_GET['id'];

$release = Releasing::getAllByPawning($id);

$pawning = Pawning::getPawningById($id);
?>

<html>
    <head>
        <title></title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/navbar.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" media="all" href="css/color-theme.css" />
        <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap-datetimepicker.min.css" />
        <link href="css/style.css" rel="stylesheet" type="text/css"/>

        <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
        <script src="js/togelmenu.js" type="text/javascript"></script>
        <script src="js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script>
            function myFunction() {
                window.print();
            }
        </script>
    </head>
    <body>
        <div class="container-fluid" style=" width: 320px;"> 
            <h4 class="text-center">THENUWARA JEWELLERS</h4>
            <p class="text-center">No 226/A, Wakwella Road, Galle.</p>
            <p class="text-center">T.P:077 365 4141</p>

            <div class="row">
                <div class="col-md-6 pull-left"><?php echo $release['date']; ?></div>
                <div class="col-md-6 pull-right">Inv No:<?php echo SystemData::viewInvoiceId($pawning['id']); ?></div>
            </div>

            <table class="table bill " style="font-size: 12px; border: none;">
                <tr>
                    <th>Customer</th>
                    <td><?php echo Customer::getCustomersById($pawning['customer'])["name"]; ?></td>
                </tr>
                <tr>
                    <th>Pawning Date</th>
                    <td><?php echo $pawning['date']; ?></td>
                </tr>
                <tr>
                    <th>NIC</th>
                    <td><?php echo Customer::getCustomersById($pawning['customer'])['nic']; ?>  </td>
                </tr>
                <tr>
                    <th>Release Interest(%)</th> 
                    <td><?php echo $release['releasing_interest']; ?></td>
                </tr>
                <tr>
                    <th>Amount</th> 
                    <td><?php echo number_format($pawning['amount'], 2); ?></td>
                </tr>
                <tr>
                    <th>Interest Amount</th> 
                    <td><?php echo number_format($release['interest_amount'], 2); ?></td>
                </tr>
                <tr>
                    <th>Settle Amount</th>
                    <td><?php echo number_format($release['settle_amount'], 2); ?></td>
                </tr>
            </table> 

            <div class="row">
                <div class="col-md-1 pull-right">
                    <button onclick="myFunction()" class="print btn btn-primary pull-right">Print this page</button>
                </div>
                <div class="col-md-1 pull-right">
                    <a href="add_new_release.php" class="print btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </body>
</html>