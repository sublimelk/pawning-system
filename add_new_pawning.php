<?php
include './includes.php';

if (!isset($_SESSION)) {
    session_start();
}

if (!$_SESSION['login']) {
    header('location: login.php');
}

$message = NULL;

if (isset($_POST['save'])) {

    $res = Pawning::addPawning($_POST);
    
    if ($res) {
        $message = ' You successfully add Pawning  ';
    } else {
        $message = ' Not successfully add Pawning ';
    }
}

$invoice_id = SystemData::getInvoiceId();

$interest = SystemData::getInterest();

$car_details = Carat::getAll();

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
<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
                    language: 'pt-BR',
                });

                $('#weight, #car_size').on('keyup change', function () {
                    calTotal()
                });

            });

            function calTotal() {
                var weight = parseFloat($('#weight').val());
                var price = parseFloat($("#car_size").children(":selected").attr("id"));
                var tot = price * weight;
                if (!tot) {
                    tot = 0;
                }
                $('#amount').val(tot.toFixed(2));
            }

        </script>
        
    </head>
    <body>
        <div class="container-fluid">
            <?php include './navigation.php'; ?>
            <?php
            if ($message) {
                ?>
                <div class="alert alert-info" role="alert">
                    <a href="#" class="alert-link"><?php echo $message;?></a>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Add New Pawning</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-9">
                            <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal" id="main-form"> 

                                <div class="form-group">
                                    <label for="invoice" class="col-sm-3 control-label">Invoice Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="invoice" id="invoice" class="form-control" value="<?php echo $invoice_id ?>" disabled="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="date" class="col-sm-3 control-label">Date</label>
                                    <div class="col-sm-9">
                                        <div id="datetimepicker1" class="input-append date"> 
                                            <input data-format="yyyy-MM-dd hh:mm:ss" name="date" id="date" class="form-control date_picker" required="TRUE" autocomplete="off"/> 
                                            <span class="add-on">
                                                <i class="glyphicon glyphicon-calendar" ></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="customer" class="col-sm-3 control-label">Customer</label>
                                    <div class="col-sm-9">
                                        <select name="customer" class="form-control" id="customer" required="TRUE" >
                                            <option value=""> --- Please Select --- </option>
                                            <?php
                                            foreach (Customer::getCustomers() as $customer) {
                                                ?>
                                                <option value="<?php echo $customer['id']; ?>"> <?php echo $customer['name']; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="item_type" class="col-sm-3 control-label">Item Type</label>
                                    <div class="col-sm-9">
                                        <select name="item_type" class="form-control" id="item_type" required="TRUE" >
                                            <option value=""> --- Please Select --- </option>
                                            <?php
                                            foreach (SystemData::getItemTypes() as $key => $type) {
                                                ?>
                                                <option value="<?php echo $key; ?>"> <?php echo $type; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="car_size" class="col-sm-3 control-label">Carat Size</label>
                                    <div class="col-sm-9">
                                        <select name="car_size" class="form-control" id="car_size" required="TRUE" >
                                            <option value=""> --- Please Select --- </option>
                                            <?php
                                            foreach ($car_details as $detail) {
                                                ?>
                                                <option value="<?php echo $detail['id']; ?>" id="<?php echo $detail['price']; ?>"> 
                                                    <?php echo $detail['size']; ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="weight" class="col-sm-3 control-label">Weight(g)</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="weight" id="weight" class="form-control" placeholder="WEIGHT (g)" required="TRUE" autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="interest" class="col-sm-3 control-label">Interest(%)</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="interest" id="interest" class="form-control" value="<?php echo $interest ?>" required="TRUE"  autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="amount" class="col-sm-3 control-label">Amount</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="amount" id="amount" class="form-control" placeholder="AMOUNT" required="TRUE" autocomplete="off" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9"> 
                                        <input type="submit" name="save" class="btn btn-default" id="btn-submit" value="save" >
                                    </div>
                                </div>

                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

