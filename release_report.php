<?php
include './includes.php';

$result = NULL;
$message = NULL;
$dateFrom = NULL;
$dateTo = NULL;
$invoice = NULL;
$nic = NULL;

if (isset($_POST['search'])) {

    if (empty(($_POST['day_from'])) && empty(($_POST['day_to'])) && empty(($_POST['invoice'])) && empty(($_POST['nic']))) {

        $message = 'Please Select Wahat is You Find ?';
    } else {

        $result = Report::getReleaseReport($_POST);
    }


    $dateFrom = $_POST['day_from'];
    $dateTo = $_POST['day_to'];
    $invoice = $_POST['invoice'];
    $nic = $_POST['nic'];
}
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
                    <h3 class="panel-title">Release Report</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal" id="main-form">
                            <div class="col-md-11">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="day_from" class="col-sm-5 control-label">Day From</label>
                                        <div class="col-sm-7">
                                            <div id="" class="datetimepicker1 input-append date"> 
                                                <input data-format="yyyy-MM-dd" name="day_from" id="day_from" class="form-control date_picker" value="<?php echo $dateFrom; ?>"/> 
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
                                                <input data-format="yyyy-MM-dd" name="day_to" id="day_to" class="form-control date_picker" value="<?php echo $dateTo; ?>"/> 
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
                                            <input type="text" name="invoice" id="invoice"  value="<?php echo $invoice; ?>"class="form-control">
                                        </div>
                                    </div> 
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nic" class="col-sm-5 control-label">NIC</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="nic" id="nic" class="form-control"  value="<?php echo $nic; ?>">
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-1 text-right"> 
                                <input type="submit" name="search" class="btn btn-default" id="btn-submit" value="search" >
                            </div>

                        </form>
                    </div>
                    <?php
                    if ($result) {
                        ?>


                        <table class="table table-striped">
                            <tr>
                                <th>Invoice</th>
                                <th>Release Date</th>
                                <th>Customer</th>
                                <th>Customer NIC</th>
                                <th class="text-right">Release Value</th>
                            </tr>

                            <?php
                            $tot = 0;
                            foreach ($result as $release) {
                                ?>
                                <tr>
                                    <td><?php echo SystemData::viewInvoiceId($release['id']); ?></td>
                                    <td><?php echo $release['date']; ?></td>
                                    <td><?php echo $release['name']; ?></td>
                                    <td><?php echo $release['nic']; ?></td>
                                    <td class="text-right"><?php echo $release['settle_amount']; ?></td>
                                </tr>
                                <?php
                                $tot = $tot + $release['settle_amount'];
                            }
                            ?>
                            <tr>
                                <th class="text-right" colspan="4">Total : </th>
                                <th class="text-right" ><?php echo number_format($tot, 2); ?> </th>
                            </tr>
                        </table>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div> 
    </body>
</html>
