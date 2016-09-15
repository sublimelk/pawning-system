<?php
include './includes.php';

$id = $_GET['id'];



if (isset($_POST['update'])) {

    Customer::editCustomer($id);

    $customerId = $_GET['id'];

    Customer::setPhoto($customerId, $_FILES);
}
?>
<html>
    <head>
        <title></title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/navbar.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" media="all" href="css/color-theme.css" />

        <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
        <script src="js/togelmenu.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container-fluid">
            <?php include './navigation.php'; ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Customer</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-9">
                            <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                <?php
                                $customer = Customer::getCustomersById($id);
                                ?>
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $customer['name']; ?>"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sortDescription" class="col-sm-3 control-label">Photo</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" required="TRUE"> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="image" class="col-sm-3 control-label">NIC Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nic" id="nic" class="form-control" value="<?php echo $customer['nic']; ?>"/> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="seo" class="col-sm-3 control-label">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="address" id="phone" class="form-control" value="<?php echo $customer['address']; ?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="propertyKeyword" class="col-sm-3 control-label">Phone</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="phone" id="feedback" class="form-control" value="<?php echo $customer['phone']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="propertyKeyword" class="col-sm-3 control-label">Feedback</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="feedback" id="feedback" class="form-control" value="<?php echo $customer['feedback']; ?>">
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

