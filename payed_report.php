<?php
include './includes.php';

$payments = NULL;
$message = "";
$dateFrom = NULL;
$dateTo = NULL;
$invoice = NULL;

if (isset($_POST['search'])) {

    if (empty($_POST['day_from']) && empty(($_POST['day_to'])) && empty(($_POST['invoice']))) {
        $message = 'Please Select Wahat is You Find ?';
    } else {
        $payments = Report::getPaymentByPawning($_POST);

        if ($payments == FALSE) {
            $message = 'You Selected Item Not Found !';
        }
    }

    $dateFrom = $_POST['day_from'];
    $dateTo = $_POST['day_to'];
    $invoice = $_POST['invoice'];
}

$details = Pawning::getPawning();
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
                $('.datetimepicker1').datetimepicker({
                    language: 'pt-BR',
                });
            });
        </script>
    </head>
    <body>
        <div class="container-fluid">
            <?php include './navigation.php'; ?>
            <?php
            if ($message) {
                ?>
                <div class="alert alert-info" role="alert">
                    <a href="#" class="alert-link"><?php echo $message; ?></a>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }
            ?> 
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Payed Report</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="day_from" class="col-sm-5 control-label">Day From</label>
                                    <div class="col-sm-7">
                                        <div id="" class="datetimepicker1 input-append date"> 
                                            <input data-format="yyyy-MM-dd" name="day_from" id="day_from" class="form-control date_picker" value="<?php echo $dateFrom; ?>" autocomplete="off"/> 
                                            <span class="add-on">
                                                <i class="glyphicon glyphicon-calendar" ></i>
                                            </span>
                                        </div>
                                    </div>
                                </div> 
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="day_to" class="col-sm-5 control-label">Day To</label>
                                    <div class="col-sm-7">
                                        <div id="" class="datetimepicker1 input-append date"> 
                                            <input data-format="yyyy-MM-dd" name="day_to" id="day_to" class="form-control date_picker" value="<?php echo $dateTo; ?>" autocomplete="off"/> 
                                            <span class="add-on">
                                                <i class="glyphicon glyphicon-calendar" ></i>
                                            </span>
                                        </div>
                                    </div>
                                </div> 
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="invoice" class="col-sm-6 control-label">Invoice Number</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="invoice" id="invoice"  value="<?php echo $invoice; ?>" class="form-control" autocomplete="off">
                                    </div>
                                </div> 
                            </div>
                            <div class="col-md-1 text-right">
                                <input type="submit" name="search" class="btn btn-default" id="btn-submit" value="search" >
                            </div>
                        </form>
                    </div>
                    <?php
                    if ($payments) {
                        ?>
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>Invoice Number</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th class="text-right">Interest</th>
                                    <th class="text-right">Payment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $tot = 0;
                                foreach ($payments as $payment) {
                                    ?>
                                    <tr>
                                        <td><?php echo SystemData::viewInvoiceId($payment['pawning']); ?></td>
                                        <td><?php echo $payment['date']; ?></td>
                                        <td><?php echo Customer::getCustomersById(Pawning::getPawningById($payment['pawning'])['customer'])["name"]; ?></td>
                                        <td class="text-right"><?php echo $payment['interest']; ?></td>
                                        <td class="text-right"><?php echo number_format($payment['payment'], 2); ?></td>

                                    </tr>
                                    <?php
                                    $tot = $tot + $payment['payment'];
                                }
                                ?>
                                <tr>
                                    <th class="text-right" colspan="4">Total : </th>
                                    <th class="text-right" ><?php echo number_format($tot, 2); ?> </th>
                                </tr>
                            </tbody>
                        </table>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
</html>


