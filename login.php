
<?php
include './includes.php';

if (isset($_POST['btnLogin'])) {
    
    $result = User::loginUser($_POST);
}
?>
<!DOCTYPE html> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Pawning System</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">
                <div class="row vertical-offset-100">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <div class="row-fluid user-row">
                                    <img src="images/logo.jpg" class="img-responsive" alt="Pawning System Admin"/>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form accept-charset="UTF-8" role="form" class="form-signin" method="post">
                                    <fieldset>
                                        <label class="panel-login">
                                            <div class="login_result"></div>
                                        </label>
                                        <input class="form-control" placeholder="Username" name="username" id="username" type="text">
                                        <input class="form-control" placeholder="Password" name="password" id="password" type="password">
                                        <br></br>
                                        <input class="btn btn-lg btn-success btn-block" type="submit" name="btnLogin" id="login" value="Login »">
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!--        <div class="container">
        <form class="form-horizontal" method="POST">
            <div class="form-group">
                <input name="username" type="text" class="form-control" placeholder="Usename"/>
            </div>
            <div class="form-group">
                <input name="password" type="password" class="form-control" placeholder="Password"/>
            </div>
            <input name="btnLogin" type="submit" class="btn btn-success" value="Login"/>
            
        </form>
        </div>    -->
    </body>
</html>
