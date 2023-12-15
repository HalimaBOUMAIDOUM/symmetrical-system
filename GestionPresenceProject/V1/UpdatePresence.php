<?php
require_once '../includes/DbOperations.php';



$dbOperation = new DbOperation();
$dbOperation->updateAllStudentsPresence();
header("Location: http://localhost/GestionPresenceProject/AppWeb/View.php");
echo "Attendance updated successfully";
?>