<?php
include './includes.php';

$message = NULL;

$id = $_GET['id'];
$user = User::getUser();

if (isset($_POST['btnsubmit'])) {

    $user = User::editUser($id);
    
    if ($user) {

            $message = ' You successfully Update User Details  ';
            
        } else {

            $message = ' Not successfully Update User Details ! ';
        }
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
                                    <label for="username" class="col-sm-3 control-label">User Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="username" id="username" class="form-control" value="<?php echo $user['username']; ?>"/> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-sm-3 control-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="password" id="password" class="form-control" value="<?php echo $user['password']; ?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9"> 
                                        <input type="submit" class="btn btn-default pull-right" id="btn-submit" value="save" name="btnsubmit">
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
