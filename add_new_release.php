<?php
include './includes.php';

$id = $_GET['id'];

$pawning = Pawning::getPawningById($id);

$customers = Customer::getCustomersById($pawning['customer']);

if (isset($_POST['save'])) {
    Releasing::addNew($_POST);
    
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
            });
        </script>
    </head>
    <body>
        <div class="container-fluid">
            <?php include './navigation.php'; ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Release Pawning</h3>
                </div>
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
                                                    <td><?php echo $pawning['id']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Date</th>
                                                    <td><?php echo $pawning['date']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Item Type</th>
                                                    <td><?php echo $pawning['item_type']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Carat Size</th>
                                                    <td><?php echo $pawning['car_size']; ?></td>
                                                </tr>
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
                        <h3 class="panel-title">Customer Details</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal" id="main-form"> 

                                    <div class="form-group">
                                        <label for="image" class="col-sm-2 control-label">Date</label>
                                        <div class="col-sm-10">
                                            <div id="datetimepicker1" class="input-append date"> 
                                                <input data-format="yyyy-MM-dd hh:mm:ss" name="date" class="form-control date_picker" required="TRUE"/> 
                                                <span class="add-on">
                                                    <i class="glyphicon glyphicon-calendar" ></i>
                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                    
                                    <input type="hidden" name="pawning_id" id="pawning_id" class="form-control" value="<?php echo $pawning['id']; ?>"/> 

                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Interest(%)</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="interest" id="interest" class="form-control" placeholder="INTEREST(%)" required="TRUE"> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Settle Amount</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="setl_amount" id="setl_amount" class="form-control" placeholder="AMOUNT" required="TRUE"> 
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
            </div>

        </div>
    </body>
</html>
