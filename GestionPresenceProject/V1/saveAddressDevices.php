<?php
require_once '../includes/DbOperations.php';

if(isset($_REQUEST['mac_address'])) {
    $mac_address = $_REQUEST['mac_address']; 

    $dbOperation = new DbOperation();

    $result = $dbOperation->insertMacAddress($mac_address);

    if ($result) {
        echo "Address saved successfully";
    } else {
        echo "Error saving address";
    }
} else {
    echo "MAC address not provided";
}
?>
