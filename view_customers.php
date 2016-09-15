<?php
include './includes.php';

$customers = Customer::getCustomers();
?>

<html>
    <head>
        <title>View Customers</title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/navbar.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" media="all" href="css/color-theme.css" />

        <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
        <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/togelmenu.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container-fluid"> 
            <?php include './navigation.php'; ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">View Customers</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive"> 
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>NIC Number</th>
                                    <th>Phone</th>
                                    <th class="text-center">Options</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($customers as $customer) {
                                    ?>
                                    <tr>
                                        <td><?php echo $customer['name']; ?></td>
                                        <td><?php echo $customer['nic']; ?></td>
                                        <td><?php echo $customer['phone']; ?></td>
                                        <td class="text-right">
                                            <a class="btn btn-default" href="view_customer.php?id=<?php echo $customer['id']; ?>">
                                                <i class="glyphicon glyphicon-list-alt"></i>
                                            </a>
                                            <a class="btn btn-default"  href="edit_customer.php?id=<?php echo $customer['id']; ?>">
                                                 <i class="glyphicon glyphicon-pencil"></i>
                                            </a>
                                            <a class="btn btn-danger"  href="delete_customer.php?id=<?php echo $customer['id']; ?>">
                                                 <i class="glyphicon glyphicon-trash"></i>
                                            </a>
                                        </td>
                                        <?php
                                    }
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#myTable').DataTable();
            });
        </script>
    </body>
</html>
