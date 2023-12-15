<?php

require_once '../includes/DbOperations.php';
$response = array();

// Check for both POST data and query string parameters
$nom = isset($_POST['nom']) ? $_POST['nom'] : (isset($_GET['nom']) ? $_GET['nom'] : '');
$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : (isset($_GET['prenom']) ? $_GET['prenom'] : '');
$email = isset($_POST['email']) ? $_POST['email'] : (isset($_GET['email']) ? $_GET['email'] : '');
var_dump($nom, $prenom, $email);
if (!empty($nom) && !empty($prenom) && !empty($email)) {
    $db = new DbOperation();

    if ($db->createEtudiant($nom, $prenom, $email)) {
        $response['error'] = false;
        $response['message'] = 'Successfully created student';
    } else {
        $response['error'] = true;
        $response['message'] = 'Error creating student, please try again';
    }
} else {
    $response['error'] = true;
    $response['message'] = 'Required parameters are missing';
}

echo json_encode($response);
?>