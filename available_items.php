<?php
include './includes.php';

$result = "";
$message = NULL;

if(isset($_POST['search'])){
    
    $result = Report::getCurrentItems($_POST);
    
    if($result == FALSE){
        $message = 'You Selected Item Not Found !';
    }
    
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
                    <h3 class="panel-title">Available Items</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal" id="main-form">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="item_type" class="control-label col-md-3">Item Type</label>
                                    <div class="col-md-9">
                                        <select name="item_type" id="item_type" class="form-control">
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
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="item_type" class="control-label col-md-3">Carat Size</label>
                                    <div class="col-md-9">
                                        <select name="car_size" id="car_size" class="form-control">
                                            <option value=""> --- Please Select --- </option>
                                            <?php
                                            foreach (Carat::getAll() as $carat) {
                                                ?>
                                                <option value="<?php echo $carat['id']; ?>"> <?php echo $carat['size']; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <input type="submit" name="search" id="search" class="btn btn-default" value="Search"/>
                            </div>
                        </form>
                        <?php
                    if ($result) {
                        ?>

                        <table class="table table-striped">
                            <tr>
                                <th>Invoice</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>NIC</th>
                                <th>Item Type</th>
                                <th>Carat Size</th>
                                <th>Weight</th>
                                <th class="text-right">Value</th>
                            </tr>

                            <?php
                            $tot = 0;
                            foreach ($result as $detail) {
                                ?>
                                <tr>
                                    <td><?php echo SystemData::viewInvoiceId($detail['id']); ?></td>
                                    <td><?php echo $detail['date']; ?></td>
                                    <td><?php echo $detail['name']; ?></td>
                                    <td><?php echo $detail['nic']; ?></td>
                                    <td><?php echo SystemData::getItemTypes()[$detail['item_type']]; ?></td>
                                    <?php
                                    foreach (Carat::getAll() as $size) {

                                        if ($size['id'] == $detail['car_size']) {
                                            ?>
                                            <td><?php echo $size['size']; ?></td>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <td><?php echo $detail['weight']; ?></td>
                                    <td class="text-right"><?php echo number_format($detail['amount'], 2); ?></td>
                                    <?php
                                    $tot = $tot + $detail['amount'];
                                    ?>
                                </tr>

                                <?php
                            }
                            ?>
                            <tr>
                                <th class="text-right" colspan="7">Total : </th>
                                <th class="text-right" ><?php echo number_format($tot, 2); ?> </th>
                            </tr>
                        </table>
                        <?php
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>