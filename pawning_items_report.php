<?php
include './includes.php';
$result = NULL;

$dateFrom = NULL;
$dateTo = NULL;
$isRelease = NULL;

if (isset($_POST['search'])) {
    $result = Report::getPawningItems($_POST);

    $dateFrom = $_POST['day_from'];
    $dateTo = $_POST['day_to'];
    $isRelease = $_POST['isRelease'];
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
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Item Report</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal" id="main-form"> 
                            <div class="col-md-11">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="day_from" class="col-sm-3 control-label">Day From</label>
                                        <div class="col-sm-9">
                                            <div id="" class="datetimepicker1 input-append date"> 
                                                <input data-format="yyyy-MM-dd" name="day_from" id="day_from" class="form-control date_picker" value="<?php echo $dateFrom; ?>"/> 
                                                <span class="add-on">
                                                    <i class="glyphicon glyphicon-calendar" ></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div> 
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="day_to" class="col-sm-3 control-label">Day To</label>
                                        <div class="col-sm-9">
                                            <div id="" class="datetimepicker1 input-append date"> 
                                                <input data-format="yyyy-MM-dd" name="day_to" id="day_to" class="form-control date_picker" value="<?php echo $dateTo; ?>"/> 
                                                <span class="add-on">
                                                    <i class="glyphicon glyphicon-calendar" ></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div> 
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="isRelease" class="col-sm-3 control-label">Select</label>
                                        <div class="col-sm-9">
                                            <select name="isRelease" class="form-control" id="isRelease">
                                                <option value="" <?php if (empty($isRelease)) echo 'selected'; ?>>All Item</option>
                                                <option value="1" <?php if ($isRelease == 1) echo 'selected'; ?>>Released Item</option>
                                                <option value="NULL" <?php if ($isRelease == 'NULL') echo 'selected'; ?>>Current Item</option>
                                            </select>
                                        </div>
                                    </div> 
                                </div>
                            </div>

                            <div class="col-md-1 text-right">
                                <div class="form-group">
                                    <input type="submit" name="search" class="btn btn-default" id="btn-submit" value="search" >
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                    if ($result) {
                        ?>

                        <table class="table table-striped">
                            <tr>
                                <th>Invoice</th>
                                <th>Date</th>
                                <th>Item Type</th>
                                <th>Carat Size</th>
                                <th>Weight</th>
                                <th>isRelease</th>
                                <th class="text-right">Value</th>
                            </tr>

                            <?php
                            $tot = 0;
                            foreach ($result as $pawning) {
                                ?>
                                <tr>
                                    <td><?php echo SystemData::viewInvoiceId($pawning['id']); ?></td>
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
                                    <td><?php echo $pawning['isRelease']; ?></td>
                                    <td class="text-right"><?php echo number_format($pawning['amount'], 2); ?></td>
                                    <?php
                                    $tot = $tot + $pawning['amount'];
                                    ?>
                                </tr>

                                <?php
                            }
                            ?>
                            <tr>
                                <th class="text-right" colspan="6">Total : </th>
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
