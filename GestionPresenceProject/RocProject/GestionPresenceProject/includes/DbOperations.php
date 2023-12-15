<?php
    class DbOperation{
        private $con;

        function __construct()
        {
            require_once dirname(__FILE__).'/DbConnect.php';
            $db = new DbConnect();
            $this->con = $db->connect();
        }

        /**CRUD */
        function createEtudiant($nom, $prenom, $email) {
            $stmt = $this->con->prepare("INSERT INTO Etudiant (nom, prenom, email) VALUES (?, ?, ?)");
            $stmt->bind_param('sss', $nom, $prenom, $email); // 's' indique une chaîne de caractères
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
        
         
    }