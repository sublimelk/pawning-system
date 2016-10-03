<?php
session_start();

include './class/DB.php';
include './class/User.php';

$message = NULL;

if (isset($_POST['btnLogin'])) {

    $result = User::loginUser($_POST);
    
    if ($result == FALSE) {
        $message = 'Invalid Username or Password !';
    } 
}
?>
<!DOCTYPE html> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Pawning System</title>
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
            <?php
            if ($message) {
                ?>
                <div class="alert alert-danger" role="alert" id="alertt">
                    <a href="#" class="alert-link"><?php echo $message; ?></a>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }
            ?> 
            <div class="row vertical-offset-100">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">                                
                            <div class="row-fluid user-row">
                                <img src="" class="img-responsive" alt="Pawning System Admin"/>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form accept-charset="UTF-8" role="form" class="form-signin" method="post">
                                <fieldset>
                                    <label class="panel-login">
                                        <div class="login_result"></div>
                                    </label>
                                    <input class="form-control" placeholder="Username" name="username" id="username" type="text" autocomplete="off">
                                    <input class="form-control" placeholder="Password" name="password" id="password" type="password" autocomplete="off">
                                    <br></br>
                                    <input class="btn btn-lg btn-success btn-block" type="submit" name="btnLogin" id="login" value="Login »">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
