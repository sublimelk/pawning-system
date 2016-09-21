<?php
include './includes.php';

$id = $_GET['id'];

$detail = Releasing::getAllById($id);


if (isset($_POST['update'])) {

    Releasing::editreleasing($id);

    $customerId = $_GET['id'];
    
}

$detail = Releasing::getAllById($id);
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
                    <h3 class="panel-title">Edit Releasing</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-9">
                            <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-group">
                                    <label for="date" class="col-sm-3 control-label">Date</label>
                                    <div class="col-sm-9">
                                        <div id="datetimepicker1" class="input-append date"> 
                                            <input data-format="yyyy-MM-dd hh:mm:ss" name="date" class="form-control date_picker" value="<?php echo $detail['date']; ?>"/> 
                                            <span class="add-on">
                                                <i class="glyphicon glyphicon-calendar" ></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="amount" class="col-sm-3 control-label">Settle Amount</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="amount" id="amount" class="form-control" value="<?php echo $detail['settle_amount']; ?>"/> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="interest" class="col-sm-3 control-label">Interest(%)</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="interest" id="nterest" class="form-control" value="<?php echo $detail['releasing_interest']; ?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9"> 
                                        <input type="submit" class="btn btn-default" id="btn-submit" value="Update" name="update">
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

