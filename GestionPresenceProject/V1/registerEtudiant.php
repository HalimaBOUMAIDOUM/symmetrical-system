<?php
require_once '../includes/DbOperations.php';
$response = array();

// Check for both POST data and query string parameters
$nom = isset($_POST['nom']) ? $_POST['nom'] : (isset($_GET['nom']) ? $_GET['nom'] : '');
$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : (isset($_GET['prenom']) ? $_GET['prenom'] : '');
$email = isset($_POST['email']) ? $_POST['email'] : (isset($_GET['email']) ? $_GET['email'] : '');
$adresse_mac = isset($_POST['mac_address']) ? $_POST['mac_address'] : (isset($_GET['mac_address']) ? $_GET['mac_address'] :  ''); 

if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($adresse_mac)) {
    $db = new DbOperation();

    // Récupérer toutes les adresses MAC de la table devices
    $devicesMacAddresses = $db->getAllMacAddressesFromDevices();

    // Vérifier si l'adresse MAC de l'étudiant est présente dans la table devices
    $isPresent = in_array($adresse_mac, $devicesMacAddresses) ? 1 : 0;

    // Insérer l'étudiant dans la table Etudiant avec la valeur de présence
    if ($db->createEtudiant($nom, $prenom, $email, $adresse_mac, $isPresent)) {
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
