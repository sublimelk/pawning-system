
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
        <title></title>
    </head>
    <body>
        <form method="POST">
            <input name="username" type="text" placeholder="Usename"/>
            <input name="password" type="password"  placeholder="Password"/>
            <input name="btnLogin" type="submit"  value="Login"/>
        </form>

    </body>
</html>
