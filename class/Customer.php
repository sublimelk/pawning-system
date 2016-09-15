<?php

class Customer {

    public $name;
    public $address;
    public $id_num;
    public $phone;
    public $value;

    public function setCustomer($name, $address, $nic, $phone, $feedback) {
        $this->name = $name;
        $this->username = $address;
        $this->password = $nic;
        $this->password = $phone;
        $this->password = $feedback;
    }

    public function getCustomers() {
        $db = new DB();

        $sql = "SELECT * FROM customer WHERE `is_active` = '1'";

        $result = $db->readQuery($sql);

        $array_res = array();

        while ($row = mysql_fetch_array($result)) {

            $cus = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'nic' => $row['nic'],
                'address' => $row['address'],
                'phone' => $row['phone'],
                'feedback' => $row['feedback'],
            );

            array_push($array_res, $cus);
        }
        return $array_res;
    }

    public function getCustomersById($id) {
        $query = "SELECT * FROM `customer` WHERE `id` = '$id' LIMIT 1";

        $db = new DB();
        $result = $db->readQuery($query);

        $row = mysql_fetch_array($result);

        return $row;
    }

    public function addCustomer() {

        $db = new DB();

        $sql = "INSERT INTO `customer` (`name`,`nic`,`address`,`phone`,`feedback`) VALUES ('" . $_POST['name'] . "','" . $_POST['nic'] . "','" . $_POST['address'] . "','" . $_POST['phone'] . "','" . $_POST['feedback'] . "')";

        $result = $db->readQuery($sql);

        return $result;
    }

    public function editCustomer($id) {
        $db = new DB();

        $sql = "UPDATE `customer` SET `name` = '" . $_POST['name'] . "', `nic` = '" . $_POST['nic'] . "', `address` = '" . $_POST['address'] . "' , `phone` = '" . $_POST['phone'] . "' , `feedback` = '" . $_POST['feedback'] . "' WHERE id = $id ";

        $result = $db->readQuery($sql);

        return $result;
    }

    public function deleteCustomer($id) {
        $db = new DB();

        $sql = "UPDATE `customer` SET `is_active` = '0' WHERE `id` = $id ";

        $result = $db->readQuery($sql);

        return $result;
    }

    public function setPhoto($customerId, $file) {
        
        $target_dir = "img/customers/";

        $ext = pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION);

        $filepath = $target_dir . $customerId . '.' . $ext;

        $uploadOk = 1;

// Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($file["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

// Check file size
        if ($file["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($file["fileToUpload"]["tmp_name"], $filepath)) {

                $resizeObj = new ImageResizer($filepath);
                $resizeObj->resizeImage(500, 500, 'crop');
                $resizeObj->saveImage($filepath, 80);

                $db = new DB();

                $sql = "UPDATE `customer` SET `img_type` = '" . $ext . "' WHERE `id` = '" . $customerId . "' ";

                $db->readQuery($sql);



                echo "The file " . basename($file["fileToUpload"]["name"]) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

}
