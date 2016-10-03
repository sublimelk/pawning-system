<?php
include './includes.php';

$message = NULL;
$print = NULL;
$res = null;

$showBody = 0;
$showId = '';


if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $showId = $id;

    $pawning = Pawning::getPawningById($id);

    if ($pawning['isRelease'] == 1) {
        $message = 'You Selected invoice Number is Already Released !';
    } elseif ($pawning) {
        $showBody = 1;
    } else {
        $message = 'Invoice number not found !';
    }

    $customers = Customer::getCustomersById($pawning['customer']);

    $payments = Payment::getPaymentByPawning($id);
}



if (isset($_POST['save'])) {

    $showBody = 1;
    $res = Releasing::addNew($_POST);

    if ($res) {
        
        header('location: print_release.php?id=' . $id);
    } else {
        $message = ' Not successfully add new release ';
    }

    Pawning::isReleasing($id);
}
?>

<html>
    <head>
        <title></title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/navbar.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" media="all" href="css/color-theme.css" />
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap-datetimepicker.min.css" />

        <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
        <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/togelmenu.js" type="text/javascript"></script>
        <script src="js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(function (ready) {

                $('#datetimepicker1').datetimepicker({
                    language: 'pt-BR',
                });

                $('body').click(function () {
                    calAmount();
                });

                $('#day_to, #interest').on('keyup change select bind', function () {
                    calAmount();
                });
            });

            function calAmount() {

                var day1 = new Date($("#day_from").val());
                var day2 = new Date($("#day_to").val());
                var int = ($("#interest").val());
                var amn = ($("#value").val());
                var pay_amn = ($("#pay_amo").val());

                var mon = monthDiff(day1, day2);

                var amnunt = amn - pay_amn;

                var amount = ((mon * amnunt * int / 100))

                $('#int_amount').val(amount);

                var set_amount = parseFloat(amount) + parseFloat(amnunt);
                $('#setl_amount').val(set_amount);

            }

            function monthDiff(d1, d2) {
                var months;
                months = (d2.getFullYear() - d1.getFullYear()) * 12;
                months -= d1.getMonth();
                months += d2.getMonth();

                if (months == 0) {
                    months = (d2.getDay() - d1.getDay());
                }

                return months <= 0 ? 0 : months;
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
                    <div class="row">
                        <div class="col-md-10">
                            <a class="alert-link"><?php echo $message; ?></a>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Release Pawning</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="GET" class="form-horizontal" >  
                        <div class="form-group">
                            <label for="id" class="col-sm-2 control-label">Invoice Number</label>
                            <div class="col-sm-10"> 
                                <input name="id" id="id"class="form-control" value="<?php echo $showId; ?>"required="TRUE" autocomplete="off"/> 
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10"> 
                                <input type="submit" class="btn btn-default pull-right" value="Search">
                            </div>
                        </div>
                    </form>
                </div>
                <?php
                if (!$res) {
                    if ($showBody) {
                        ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="panel-body">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Customer Details</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <img src="img/customers/<?php echo $customers['id'] . '.' . $customers['img_type']; ?>" class="img-responsive" width="100%" height="auto"/>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="table-responsive"> 
                                                                    <table class="table table-striped" width="100%">
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
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel-body">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Pawning Details</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="table-responsive"> 
                                                    <table class="table table-striped" id="myTable">
                                                        <tr>
                                                            <th>ID</th>
                                                            <td><?php echo SystemData::viewInvoiceId($pawning['id']); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Date</th>
                                                            <td><?php echo $pawning['date']; ?></td>
                                                        </tr>
                                                        <?php
                                                        foreach (SystemData::getItemTypes() as $key => $type) {

                                                            if ($key == $pawning['item_type']) {
                                                                ?>
                                                                <tr>
                                                                    <th>Item Type</th>
                                                                    <td><?php echo $type ?></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                        <?php
                                                        foreach (SystemData::getCaratSize() as $key => $carat) {

                                                            if ($key == $pawning['car_size']) {
                                                                ?>       
                                                                <tr>
                                                                    <th>Carat Size</th>
                                                                    <td><?php echo $carat; ?></td>
                                                                </tr>

                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                        <tr>
                                                            <th>Weight(g)</th>
                                                            <td><?php echo $pawning['weight']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Interest</th>
                                                            <td><?php echo $pawning['interest']; ?>% </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Amount</th>
                                                            <td><?php echo $pawning['amount']; ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $tot = 0;
                        if ($payments) {
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Payed Details</h3>
                                </div>
                                <div class="panel-body">
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
                                                <th class="text-right"><?php echo number_format($tot, 2); ?> </th>
                                            </tr>
                                        <input type="hidden" name="pay_amo" id="pay_amo" value="<?php echo $tot; ?>"/>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php
                        } else {
                            $tot = 0;
                            ?>
                            <input type="hidden" name="pay_amo" id="pay_amo" value="<?php echo $tot; ?>"/>
                            <?php
                        }
                    }
                    ?>
                    <?php
                    if ($showBody) {
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Release Details</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal" id="main-form"> 
                                            <?php
                                            if ($payments == TRUE) {
                                                ?>
                                                <input type="hidden" name="day_from" id="day_from" value="<?php echo $payment['date']; ?>"/>
                                                <?php
                                            } else {
                                                ?>
                                                <input type="hidden" name="day_from" id="day_from" value="<?php echo $pawning['date']; ?>"/>
                                                <?php
                                            }
                                            ?>



                                            <div class="form-group">
                                                <label for="day_to" id="date_to" class="col-sm-2 control-label">Date</label>
                                                <div class="col-sm-10">
                                                    <div id="datetimepicker1" class="input-append date"> 
                                                        <input data-format="yyyy-MM-dd hh:mm:ss" name="day_to" id="day_to" class="form-control date_picker" required="TRUE"/> 
                                                        <span class="add-on">
                                                            <i class="glyphicon glyphicon-calendar" ></i>
                                                        </span>
                                                    </div>

                                                </div>
                                            </div>

                                            <input type="hidden" name="pawning_id" id="pawning_id" class="form-control" value="<?php echo $pawning['id']; ?>" required="TRUE"/> 
                                            <input type="hidden" name="value" id="value" class="form-control" value="<?php echo (float) $pawning['amount']; ?>" required="TRUE"/>

                                            <div class="form-group">
                                                <label for="interest" class="col-sm-2 control-label">Interest Rate(%)</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="interest" id="interest" class="form-control" value="<?php echo $pawning['interest']; ?>" required="TRUE" autocomplete="off"> 
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="int_amount" class="col-sm-2 control-label">Interest Amount</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="int_amount" id="int_amount" class="form-control" required="TRUE" autocomplete="off"> 
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="setl_amount" class="col-sm-2 control-label">Settle Amount</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="setl_amount" id="setl_amount" class="form-control" placeholder="AMOUNT" required="TRUE" autocomplete="off"> 
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10"> 
                                                    <input type="submit" class="btn btn-default pull-right" id="btn-submit" value="Add" name="save">
                                                </div>
                                            </div>

                                        </form> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo '';
                }
                ?>

            </div>

        </div>
    </body>
</html>
