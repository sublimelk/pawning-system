<?php
include './includes.php';


if (isset($_POST['save'])) {

    Pawning::addPawning($_POST);
}

$invoice_id = SystemData::getInvoiceId();

$interest = SystemData::getInterest();
?>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Add New Pawning</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-9">
                            <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal" id="main-form"> 

                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Invoice Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="invoice" id="invoice" class="form-control" value="<?php echo $invoice_id ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="image" class="col-sm-3 control-label">Date</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="date" id="date" class="form-control" placeholder="DATE" required="TRUE"/> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="seo" class="col-sm-3 control-label">Customer Name</label>
                                    <div class="col-sm-9">
                                        <select name="customer" class="form-control">
                                            <option value=""> --- Please Select --- </option>
                                            <?php
                                            foreach (Customer::getCustomers() as $customer) {
                                                ?>
                                                <option value="<?php echo $customer['id']; ?>"> <?php echo $customer['name']; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="seo" class="col-sm-3 control-label">Item Type</label>
                                    <div class="col-sm-9">
                                        <select name="item_type" class="form-control">
                                            <option value=""> --- Please Select --- </option>
                                            <?php
                                            foreach (SystemData::getItemTypes() as $key => $type) {
                                                ?>
                                                <option value="<?php echo $key; ?>"> <?php echo $type; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="seo" class="col-sm-3 control-label">Carat Size</label>
                                    <div class="col-sm-9">
                                        <select name="car_size" class="form-control">
                                            <option value=""> --- Please Select --- </option>
                                            <?php
                                            foreach (SystemData::getCaratSize() as $key => $size) {
                                                ?>
                                                <option value="<?php echo $key; ?>"> <?php echo $size; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="propertyKeyword" class="col-sm-3 control-label">Weight(g)</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="weight" id="weight" class="form-control" placeholder="WEIGHT (g)" required="TRUE">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="propertyKeyword" class="col-sm-3 control-label">Interest(%)</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="interest" id="interest" class="form-control" value="<?php echo $interest ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="propertyKeyword" class="col-sm-3 control-label">Amount</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="amount" id="amount" class="form-control" placeholder="AMOUNT" required="TRUE" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9"> 
                                        <input type="submit" name="save" class="btn btn-default" id="btn-submit" value="save" >
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

