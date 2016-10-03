<?php
include './includes.php';

$message = NULL;

$id = $_GET['id'];

if (isset($_POST['add'])) {
    $payment = Payment::addPayment($_POST);

    if ($payment) {
        $message = 'You Successfuly Add Payment';
    } else {
        $message = 'Not Successfuly Add Payment !';
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
            <?php
            if ($message) {
                ?>
                <div class="alert alert-info" role="alert" id="alertt">
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
                    <h3 class="panel-title">Payment Form</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-10">
                            <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal" id="payment-form">
                                <input type="hidden" name="pawning" id="pawning" value="<?php echo $id ?>"/>

                                <div class="form-group">
                                    <label for="date" class="col-sm-3 control-label">Date</label>
                                    <div class="col-sm-9">
                                        <div id="datetimepicker1" class="input-append date"> 
                                            <input data-format="yyyy-MM-dd hh:mm:ss" name="date" id="date" class="form-control date_picker" required="TRUE" autocomplete="off"/> 
                                            <span class="add-on">
                                                <i class="glyphicon glyphicon-calendar" ></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="interest" class="col-sm-3 control-label">Interest (%)</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="interest" id="interest" class="form-control" placeholder="INTEREST (%)" required="TRUE" autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="payment" class="col-sm-3 control-label">Amount</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="payment" id="payment" class="form-control" placeholder="PAYMENT" required="TRUE" autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9"> 
                                        <input type="submit" name="add" class="btn btn-default pull-right" id="add" value="Add" >
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