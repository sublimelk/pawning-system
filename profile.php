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
    </head>
    <body>
        <form method="POST">
            <label>Name :</label>
            <input name="name" type="text" value="<?php echo $user['name']; ?>" /> <br>
            <label>User Name :</label>
            <input name="username" type="text" value="<?php echo $user['username']; ?>"/> <br>
            <label>Password :</label>
            <input name="password" type="text"  value="<?php echo $user['password']; ?>"/> <br>
            <input name="btnsubmit" type="submit"  value="Submit"/>
        </form>

    </body>
</html>
