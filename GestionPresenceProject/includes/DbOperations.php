<?php
class DbOperation
{
    private $con;

    function __construct()
    {
        require_once dirname(__FILE__) . '/DbConnect.php';
        $db = new DbConnect();
        $this->con = $db->connect();
    }

    /**CRUD */
    function createEtudiant($nom, $prenom, $email, $adresse_mac, $isPresent)
    {
        $stmt = $this->con->prepare("INSERT INTO Etudiant (nom, prenom, email, adresse_mac, isPresent) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('ssssi', $nom, $prenom, $email, $adresse_mac, $isPresent); // 'i' indique un entier
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    

    function insertMacAddress($mac_address) {
        // Échapper les caractères spéciaux pour éviter les injections SQL
        $mac_address = mysqli_real_escape_string($this->con, $mac_address);

        // Insérer l'adresse MAC dans la table avec la colonne isPresent
        $sql = "INSERT INTO devices (mac_address, isPresent) VALUES ('$mac_address', true)";

        if ($this->con->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->con->error;
            return false;
        }
    }

    function getAllMacAddressesFromDevices() {
        $macAddresses = array();

        $result = $this->con->query("SELECT mac_address FROM devices");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $macAddresses[] = $row['mac_address'];
            }
        }

        return $macAddresses;
    }

    function getAllMacAddressesFromEtudiant() {
        $macAddresses = array();

        $result = $this->con->query("SELECT adresse_mac FROM Etudiant");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $macAddresses[] = $row['adresse_mac'];
            }
        }

        return $macAddresses;
    }

    function updateIsPresentForEtudiant($mac_address, $isPresent) {
        $stmt = $this->con->prepare("UPDATE Etudiant SET isPresent = ? WHERE adresse_mac = ?");
        $stmt->bind_param('is', $isPresent, $mac_address);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function updateAllStudentsPresence() {
        // Récupérer toutes les adresses MAC de la table devices
        $devicesMacAddresses = $this->getAllMacAddressesFromDevices();

        // Récupérer tous les étudiants de la table Etudiant
        $etudiantMacAddresses = $this->getAllMacAddressesFromEtudiant();

        // Parcourir les adresses MAC des étudiants
        foreach ($etudiantMacAddresses as $etudiantMac) {
            $isPresent = in_array($etudiantMac, $devicesMacAddresses) ? 1 : 0;

            $this->updateIsPresentForEtudiant($etudiantMac, $isPresent);
        }
    // Mettez à jour le chemin vers le fichier PHP si nécessaire
        return "Attendance updated successfully";
    }
}
?>
