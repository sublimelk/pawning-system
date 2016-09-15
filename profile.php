<?php
include './includes.php';

$id = $_GET['id'];
$user = User::getUser();

if (isset($_POST['btnsubmit'])) {

    User::editUser($id);
}
?>
<!DOCTYPE html> 
<html>
    <head>
        <meta charset="UTF-8">
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
            <?php include './navigation.php';  ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Change Administrator Details</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-9">
                            <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal" id="main-form"> 

                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $user['name']; ?>"> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="image" class="col-sm-3 control-label">User Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nic" id="nic" class="form-control" value="<?php echo $user['username']; ?>"/> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="seo" class="col-sm-3 control-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $user['password']; ?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9"> 
                                        <input type="submit" class="btn btn-default" id="btn-submit" value="save" name="btnsubmit">
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
