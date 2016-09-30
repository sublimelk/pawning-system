<?php
include './includes.php';

$id = $_GET['id'];

$customers = Customer::getCustomersById($id);

$pawnings = Pawning::getPawningByCustomerId($id);

$carat = Carat::getAll();
?>
<html>
    <head>
        <title></title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/navbar.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" media="all" href="css/color-theme.css" />

        <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
        <script src="js/togelmenu.js" type="text/javascript"></script>

    </head>
    <body>
        <div class="container-fluid">
            <?php include './navigation.php'; ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">View Customer</h3>
                </div>
                <div class="panel-body">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Customer Details</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-md-4">

                                            <?php
                                            if (!$customers['img_type']) {
                                                ?>
                                                <img src="img/customers/null.png" class="img-responsive" width="100%" height="auto"/>

                                                <?php
                                            } else {
                                                ?>
                                                <img src="img/customers/<?php echo $customers['id'] . '.' . $customers['img_type']; ?>" class="img-responsive" width="100%" height="auto"/>

                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="table-responsive"> 
                                                <table class="table table-striped">
                                                    <tr>
                                                        <th>Name</th>
                                                        <td><?php echo $customers['name']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>NIC Number</th>
                                                        <td><?php echo $customers['nic']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Address</th>
                                                        <td><?php echo $customers['address']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Phone</th>
                                                        <td><?php echo $customers['phone']; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Pawninig</h3>
                        </div>
                        <?php
                        if ($pawnings) {
                            ?>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="table-responsive"> 
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Item Type</th>
                                                    <th>Carat Size</th>
                                                    <th>Weight</th>
                                                    <th>Interest</th>
                                                    <th class="text-right">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($pawnings as $pawning) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $pawning['date']; ?></td>
                                                        <td><?php echo SystemData::getItemTypes()[$pawning['item_type']]; ?></td>
                                                        <?php
                                                        foreach (Carat::getAll() as $size) {

                                                            if ($size['id'] == $pawning['car_size']) {
                                                                ?>
                                                                <td><?php echo $size['size']; ?></td>
                                                                <?php
                                                            }
                                                        }
                                                        ?>

                                                        <td><?php echo $pawning['weight']; ?></td>
                                                        <td><?php echo $pawning['interest'] . '%'; ?></td>
                                                        <td class="text-right"><?php echo number_format($pawning['amount'], 2) . "<br>"; ?></td>

                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class = "alert alert-info">
                                There are no item to show !
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
    </body>
</html>