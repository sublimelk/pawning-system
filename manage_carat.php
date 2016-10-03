<?php
include './includes.php';

$message = NULL;

if (empty($_GET)) {
    $message = "";
} else {
    $message = $_GET['message'];
}



if (isset($_POST['save'])) {

    $res = Carat::addCarat($_POST);

    if ($res) {
        $message = ' You successfully add Carat  ';
    } else {
        $message = ' Not successfully add Carat ';
    }
}

if (isset($_POST['update'])) {

    foreach ($_POST['car_size'] as $key => $value) {
        $res = Carat::editCarat($_POST['price'][$key], $_POST['car_size'][$key], $key);

        if ($res) {
            $message = ' You successfully update Carat  ';
        } else {
            $message = ' Not successfully update Carat ';
        }
    }
}

$details = Carat::getAll();
?>
<html>
    <head>
        <title></title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/navbar.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" media="all" href="css/color-theme.css" />
        <link href="css/style.css" rel="stylesheet" type="text/css"/>

        <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
        <script src="js/togelmenu.js" type="text/javascript"></script>
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
                    <h3 class="panel-title">Add New Carat</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form method="POST" enctype="multipart/form-data" class="form-inline" id="main form">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="size" class="control-label">Carat Size : </label>
                                    <input type="text" name="size" id="size" class="form-control" placeholder="SIZE" required="TRUE" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="price" class="control-label">Price : </label>
                                    <input type="text" name="price" id="price" class="form-control" placeholder="PRICE" required="TRUE" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="submit" name="save" id="save" value="Add New" class="btn btn-default pull-right"/>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Prices</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form method="POST" enctype="multipart/form-data" class="form-horizontal" id="main form">
                            <?php foreach ($details as $key => $detail) {
                                ?>
                                <div class="col-md-5 ">
                                    <div class="form-group">
                                        <label for="car_size" class="col-sm-3 control-label">Carat Size</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="car_size[<?php echo $detail['id']; ?>]" id="car_size" class="form-control" value="<?php echo $detail['size']; ?>" autocomplete="off"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <div class="col-sm-9 pull-right">
                                            <input type="price" name="price[<?php echo $detail['id']; ?>]" id="price" class="form-control" value="<?php echo $detail['price']; ?>" autocomplete="off"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class=" pull-right">
                                            <a class="btn btn-danger pull-right"  href="delete_carat.php?id=<?php echo $detail['id']; ?>">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

                            <div class="form-group">
                                <div class="col-md-1 pull-right">
                                    <input type="submit" name="update" id="update" value="Update" class="btn btn-default" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

