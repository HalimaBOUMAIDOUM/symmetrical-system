<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "RocProject-NewVersionBack";

require_once '../includes/DbConnect.php';


session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$connection =  new mysqli('localhost', 'root', '', 'gestionpresencedb');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection)); 
}
$select_db = mysqli_select_db($connection, 'gestionpresencedb'); 
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection)); 
}

$ReadSql = "SELECT etudiant.id, etudiant.nom, etudiant.prenom, etudiant.email, etudiant.adresse_mac, etudiant.isPresent, presence.DateHeure
            FROM etudiant
            LEFT JOIN presence ON etudiant.id = presence.EtudiantID";

$res = mysqli_query($connection, $ReadSql);
if (!$res) {
    die("Erreur MySQL: " . mysqli_error($connection));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Dashboard</title>
    <style>
    .present {
        background-color: #4CAF50;
        color: #fff; 
        border-radius: 50px;
        padding: 10px 20px;
        margin-top: 5px;
        display: inline-block;
    }

    .absent {
        background-color: #FF6347;
        color: #fff; 
        border-radius: 50px; 
        padding: 10px 20px; 
        margin-top: 5px;
        display: inline-block; 
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<script>
function updateIsPresentForEtudiant() {
    window.location.href = '../V1/UpdatePresence.php';
}
</script>

<!-- <input id="searchInput" class="form-control mr-sm-2" type="search" placeholder="Recherche par nom" aria-label="Search">
<button id="searchBtn" class="btn btn-primary" type="button">Recherche</button> -->
<body >
    <?php require '../AppWeb/header.php' ?>
    <div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-lg-12">
        <h2 class="text-center mb-3" style="font-family: 'Times New Roman', Times, serif; font-size: 40px;">
            Dashboard
        </h2>

            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">Numéro étudiant</th>
                        <th class="text-center">Nom</th>
                        <th class="text-center">Prénom</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Date et Heure</th>
                        <th class="text-center">Statut</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($r = mysqli_fetch_assoc($res)) {
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $r['id']; ?></td>
                            <td class="text-center"><?php echo $r['nom']; ?></td>
                            <td class="text-center"><?php echo $r['prenom']; ?></td>
                            <td class="text-center"><?php echo $r['email']; ?></td>
                            <td class="text-center"><?php echo $r['DateHeure']; ?></td>
                            <td class="text-center">
                                <span class="<?php echo ($r['isPresent'] == 1) ? 'present' : 'absent'; ?>"><?php echo ($r['isPresent'] == 1) ? 'Présent' : 'Absent'; ?></span>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


    <!-- <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .table-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .table-container table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-container th, .table-container td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table-container th {
            background-color: #003973;
            color: #fff;
        }

        .table-container tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table-container tr:hover {
            background-color: #e5e5e5;
        }

        .btn {
            background-color: #003973;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 16px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #E5E5BE;
        }
    </style> -->
<?php require '../AppWeb/footer.php' ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>