<?php
include './includes.php';

$id = $_GET['id'];
$customer = Customer::getCustomersById($id);

if (isset($_POST['update'])) {

    $a = Customer::editCustomer($id);

    $customerId = $_GET['id'];

    Customer::setPhoto($customerId, $_FILES);
}
?>
<html>
    <hrad>
        <title></title>
    </hrad>
    <body>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Customer</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-9">
                            <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal" id="main-form"> 

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
                                        <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $customer['address']; ?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="propertyKeyword" class="col-sm-3 control-label">Phone</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="feedback" id="feedback" class="form-control" value="<?php echo $customer['phone']; ?>">
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

