<?php
include './includes.php';

$message = NULL;

$showBody = 0;
$showId = '';
$message = NULL;

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
}



if (isset($_POST['save'])) {
    
    $showBody = 1;
    $res = Releasing::addNew($_POST);

    if ($res) {
        $message = ' You successfully add new release  ';
        $abc = 'PRINT';
        
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
            $(function () {
                $('#datetimepicker1').datetimepicker({
                    language: 'pt-BR',
                });

                $('#interest, #day_to').on('keyup change select', function () {

                    var day1 = new Date($("#day_from").val());
                    var day2 = new Date($("#day_to").val());
                    var mon = monthDiff(day1, day2);
                    var int = ($("#interest").val());
                    var amn = ($("#value").val());

                    var amount = ((mon * amn * int / 100))

                    $('#int_amount').val(amount);

                    var set_amount = parseFloat(amount) + parseFloat(amn);
                    $('#setl_amount').val(set_amount);

                });
            });
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
                            <a href="print_release.php?id=<?php echo $pawning['id']; ?>" class="btn btn-primary text-right"><?php echo $abc; ?></a>
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
                                <input type="submit" class="btn btn-default" value="Search">
                            </div>
                        </div>
                    </form>
                </div>
                <?php
                if ($showBody) {
                    ?>
                    <div class="panel-body">
                        <div class="row">
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
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Release Details</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal" id="main-form"> 

                                        <input type="hidden" name="day_from" id="day_from" value="<?php echo $pawning['date']; ?>"/>

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
                                                <input type="submit" class="btn btn-default" id="btn-submit" value="save" name="save">
                                            </div>
                                        </div>

                                    </form> 
                                </div>
                            </div>
                        </div>
                    </div> 
                    <?php
                }
                ?>
            </div>

        </div>
    </body>
</html>
