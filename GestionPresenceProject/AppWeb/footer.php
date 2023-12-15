<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $server; ?>css/style.css"> <!-- Assurez-vous d'ajuster le chemin selon votre structure de fichiers -->
    <title>Votre Page</title>
    <style>
    body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.footer {
    background-color: #333; /* Couleur de fond du pied de page */
    color: #fff; /* Couleur du texte du pied de page */
    text-align: center;
    padding: 20px;
    margin-top: auto; /* Pour centrer le pied de page verticalement */
}

.footer p {
    margin: 0;
}

/* Ajoutez d'autres styles selon vos préférences */
</style>
</head>
<body>
    <!-- Votre contenu principal ici -->

    <div class="footer">
        <p>&copy; 2023 IMT Nord Europe . Tous droits réservés.</p>
    </div>

    <script src="<?php echo $server; ?>js/script.js"></script>
</body>
</html>
