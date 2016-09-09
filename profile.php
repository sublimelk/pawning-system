<?php
include './includes.php';

if (isset($_POST['btnLogin'])) {
    
    $result = User::editUser($_POST);
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
            <input name="name" type="text" value="<?php echo $_SESSION['name']; ?>" />
            <input name="username" type="text" value="<?php echo $_SESSION['username']; ?>"/>
            <input name="password" type="password"  value="<?php echo $_SESSION['password']; ?>"/>
            <input name="btnLogin" type="submit"  value="Login"/>
        </form>

    </body>
</html>

