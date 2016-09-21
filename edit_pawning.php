<?php
include './includes.php';

$id = $_GET['id'];

if (isset($_POST['save'])) {

    $a = Pawning::editPawning($id);
}

$detail = Pawning::getPawningById($id);

$invoice_id = SystemData::viewInvoiceId($id);

$interest = SystemData::getInterest();
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
            });
        </script>
    </head>
    <body>
        <div class="container-fluid">
            <?php include './navigation.php'; ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Pawning</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-9">
                            <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal" id="main-form"> 

                                <div class="form-group">
                                    <label for="invoice" class="col-sm-3 control-label">Invoice Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="invoice" id="invoice" class="form-control" value="<?php echo $invoice_id ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="date" class="col-sm-3 control-label">Date</label>
                                    <div class="col-sm-9">
                                        <div id="datetimepicker1" class="input-append date"> 
                                            <input data-format="yyyy-MM-dd hh:mm:ss" name="date" class="form-control date_picker" required="TRUE" value="<?php echo $detail['date']; ?>"/> 
                                            <span class="add-on">
                                                <i class="glyphicon glyphicon-calendar" ></i>
                                            </span>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="customer" class="col-sm-3 control-label">Customer Name</label>
                                    <div class="col-sm-9">
                                        <select name="customer" class="form-control"> 
                                            <?php
                                            foreach (Customer::getCustomers() as $customer) {
                                                if ($customer['id'] == $detail['customer']) {
                                                    ?>
                                                    }else{
                                                    ?>
                                                    <option value="<?php echo $customer['id']; ?>" > <?php echo $customer['name']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="item_type" class="col-sm-3 control-label">Item Type</label>
                                    <div class="col-sm-9">
                                        <select name="item_type" class="form-control"> 
                                            <?php
                                            foreach (SystemData::getItemTypes() as $key => $type) {

                                                if ($key == $detail['item_type']) {
                                                    ?> 
                                                    <option value="<?php echo $key; ?>" selected=""> <?php echo $type; ?></option>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <option value="<?php echo $key; ?>"> <?php echo $type; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="car_size" class="col-sm-3 control-label">Carat Size</label>
                                    <div class="col-sm-9">
                                        <select name="car_size" class="form-control">
                                            <?php
                                            foreach (SystemData::getCaratSize() as $key => $size) {

                                                if ($key == $detail['car_size']) {
                                                    ?>
                                                    <option value="<?php echo $key; ?>" selected=""> <?php echo $size; ?></option>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <option value="<?php echo $key; ?>"> <?php echo $size; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="weight" class="col-sm-3 control-label">Weight(g)</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="weight" id="weight" class="form-control" value="<?php echo $detail['weight']; ?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="interest" class="col-sm-3 control-label">Interest(%)</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="interest" id="interest" class="form-control" value="<?php echo $detail['interest']; ?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="amount" class="col-sm-3 control-label">Amount</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="amount" id="amount" class="form-control" value="<?php echo $detail['amount']; ?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9"> 
                                        <input type="submit" name="save" class="btn btn-default" id="btn-submit" value="Update" >
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


