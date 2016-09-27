<?php
include './includes.php';

$message = NULL;

$id = $_GET['id'];

if (isset($_POST['update'])) {

    $res = Releasing::editreleasing($id);

    if ($res) {
        $message = ' You successfully update Release  ';
    } else {
        $message = ' Not successfully update Release  ';
    }

    $customerId = $_GET['id'];
}

$detail = Releasing::getAllById($id);

$pawning = Pawning::getPawningById($detail['pawning']);
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

                $('#interest, #day_to').on('keyup change select', function () {

                    var day1 = new Date($("#day_from").val());
                    var day2 = new Date($("#day_to").val());
                    var mon = monthDiff(day1, day2);
                    var int = ($("#interest").val());
                    var amn = ($("#value").val());

                    var amount = ((mon * amn * int / 100))

                    $('#int_amount').val(amount);

                    var set_amount = parseFloat(amount) + parseFloat(amn);
                    $('#amount').val(set_amount);

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
                    <h3 class="panel-title">Edit Releasing</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-9">
                            <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">

                                <input type="hidden" name="day_from" id="day_from" value="<?php echo $pawning['date'];?>"/>
                                
                                <input type="hidden" name="value" id="value" value="<?php echo $pawning['amount']; ?>"/>
                                
                                <input type="hidden" name="int_amount" id="int_amount"/>

                                <div class="form-group">
                                    <label for="date" class="col-sm-3 control-label">Date</label>
                                    <div class="col-sm-9">
                                        <div id="datetimepicker1" class="input-append date"> 
                                            <input data-format="yyyy-MM-dd hh:mm:ss" name="day_to" id="day_to" class="form-control date_picker" value="<?php echo $detail['date']; ?>"/> 
                                            <span class="add-on">
                                                <i class="glyphicon glyphicon-calendar" ></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="interest" class="col-sm-3 control-label">Interest(%)</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="interest" id="interest" class="form-control" value="<?php echo $detail['releasing_interest']; ?>" autocomplete="off"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="amount" class="col-sm-3 control-label">Settle Amount</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="amount" id="amount" class="form-control" value="<?php echo $detail['settle_amount']; ?>" autocomplete="off"/> 
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

