<?php
include './includes.php';

$invoice = $_GET['id'];

$id = ltrim($invoice, '0');

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
                <div class="col-md-6 pull-left"><?php echo $pawning['date']; ?></div>
                <div class="col-md-6 pull-right">Inv No:<?php echo SystemData::viewInvoiceId($pawning['id']); ?></div>
            </div>

            <table class="table bill " style="font-size: 12px; border: none;">
                <tr>
                    <th>Customer</th>
                    <td><?php echo Customer::getCustomersById($pawning['customer'])["name"]; ?></td>
                </tr>
                <tr>
                    <th>NIC</th>
                    <td><?php echo Customer::getCustomersById($pawning['customer'])['nic']; ?>  </td>
                </tr>
                <tr>
                    <th>Item Type</th> 
                    <td><?php echo SystemData::getItemTypes()[$pawning['item_type']]; ?></td>
                </tr> 
                <tr>
                    <th>Carat Size</th>
                    <?php
                    foreach (Carat::getAll() as $size) {

                        if ($size['id'] == $pawning['car_size']) {
                            ?>
                            <td><?php echo $size['size']; ?></td>
                            <?php
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th>Weight (g)</th> 
                    <td><?php echo $pawning['weight']; ?></td>
                </tr>
                <tr>
                    <th>Interest (%)</th> 
                    <td><?php echo $pawning['interest']; ?></td>
                </tr>
                <tr>
                    <th>Amount</th>
                    <td><?php echo $pawning['amount']; ?></td>
                </tr>
            </table> 

            <div class="row">
                <div class="col-md-6">
                    <button onclick="myFunction()" class="print btn btn-primary">Print this page</button>
                </div>
                <div class="col-md-2">
                    <a href="add_new_pawning.php" class="print btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </body>
</html>

