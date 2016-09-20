<?php
include './includes.php';
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
                    <h3 class="panel-title">Report</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="image" class="col-sm-3 control-label">Day From</label>
                                <div class="col-sm-9">
                                    <div id="" class="datetimepicker1 input-append date"> 
                                        <input data-format="yyyy-MM-dd" name="day_from" class="form-control date_picker" required="TRUE"/> 
                                        <span class="add-on">
                                            <i class="glyphicon glyphicon-calendar" ></i>
                                        </span>
                                    </div>
                                </div>
                            </div> 
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="image" class="col-sm-3 control-label">Day To</label>
                                <div class="col-sm-9">
                                    <div id="" class="datetimepicker1 input-append date"> 
                                        <input data-format="yyyy-MM-dd" name="day_to" class="form-control date_picker" required="TRUE"/> 
                                        <span class="add-on">
                                            <i class="glyphicon glyphicon-calendar" ></i>
                                        </span>
                                    </div>
                                </div>
                            </div> 
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Invoice Number</label>
                                <div class="col-sm-9">
                                    <input type="text" name="invoice" id="invoice" class="form-control">
                                </div>
                            </div> 
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">NIC</label>
                                <div class="col-sm-9">
                                    <input type="text" name="inc" id="inc" class="form-control" >
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </body>
</html>
