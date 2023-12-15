<?php
// Connexion à la base de données
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/projetPresence/";

require_once '../includes/DbConnect.php';
$connection =  new mysqli('localhost', 'root', '', 'gestionpresencedb');
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Requête pour le nombre total d'étudiants
$totalStudentsQuery = "SELECT COUNT(*) as total FROM etudiant";
$totalStudentsResult = mysqli_query($connection, $totalStudentsQuery);
$totalStudentsRow = mysqli_fetch_assoc($totalStudentsResult);
$totalStudents = $totalStudentsRow['total'];

// Requête pour le nombre d'étudiants présents
$presentStudentsQuery = "SELECT COUNT(*) as present FROM etudiant WHERE isPresent = 1";
$presentStudentsResult = mysqli_query($connection, $presentStudentsQuery);
$presentStudentsRow = mysqli_fetch_assoc($presentStudentsResult);
$presentStudents = $presentStudentsRow['present'];

// Calcul du nombre d'étudiants absents
$absentStudents = $totalStudents - $presentStudents;

// Requête pour obtenir les données de présence par cours
$coursePresenceQuery = "SELECT c.NomCours, COUNT(p.EtudiantID) as presenceCount
                        FROM cours c
                        LEFT JOIN sessioncours sc ON c.IDCours = sc.IDCours
                        LEFT JOIN presence p ON sc.SessionID = p.SessionID
                        GROUP BY c.IDCours";
$coursePresenceResult = mysqli_query($connection, $coursePresenceQuery);

$courseLabels = array();
$coursePercentages = array();

while ($row = mysqli_fetch_assoc($coursePresenceResult)) {
    $courseLabels[] = $row['NomCours'];
    $coursePercentages[] = ($row['presenceCount'] / $totalStudents) * 100;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord de présence</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #333;
            color: #fff;
        }
        td {
            background-color: #f5f5f5;
        }
        canvas {
            display: block;
            max-width: 600px;
            max-height: 400px;
            width: 100%;
            height: auto;
            margin: 20px auto; /* Centrer le graphique horizontalement */
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <?php require '../AppWeb/header.php' ?>
    <div class="container">
        <h2>Tableau de bord de présence</h2>

        <!-- Graphique de présence -->
        <canvas id="presenceChart"></canvas>

        <!-- Graphique de présence par cours -->
        <canvas id="coursePresenceChart"></canvas>

        <!-- Tableau des statistiques -->
        <h2>Statistiques</h2>
        <table>
            <tr>
                <th>Statistique</th>
                <th>Nombre</th>
            </tr>
            
            <tr>
                <td>Étudiants présents</td>
                <td><?php echo $presentStudents; ?></td>
            </tr>
            <tr>
                <td>Étudiants absents</td>
                <td><?php echo $absentStudents; ?></td>
            </tr>
            <tr>
                <td>Total des étudiants</td>
                <td><?php echo $totalStudents; ?></td>
            </tr>
            
        </table>
    </div>

    <script>
        var totalStudents = <?php echo json_encode($totalStudents); ?>;
        var presentStudents = <?php echo json_encode($presentStudents); ?>;
        var absentStudents = <?php echo json_encode($absentStudents); ?>;
        var courseLabels = <?php echo json_encode($courseLabels); ?>;
        var coursePercentages = <?php echo json_encode($coursePercentages); ?>;

        var ctx = document.getElementById('presenceChart').getContext('2d');
        var presenceChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Présents', 'Absents'],
                datasets: [{
                    data: [presentStudents, absentStudents],
                    backgroundColor: ['rgba(54, 162, 235, 0.6)', 'rgba(255, 99, 132, 0.6)'],
                    borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                title: {
                    display: true,
                    text: 'Présence des étudiants'
                }
            }
        });

        var courseCtx = document.getElementById('coursePresenceChart').getContext('2d');
        var coursePresenceChart = new Chart(courseCtx, {
            type: 'bar',
            data: {
                labels: courseLabels,
                datasets: [{
                    label: 'Pourcentage de présence',
                    data: coursePercentages,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)', // Couleur de remplissage
                    borderColor: 'rgba(75, 192, 192, 1)', // Couleur de la bordure
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 50
                    }
                },
                title: {
                    display: true,
                    text: 'Pourcentage de présence par cours'
                }
            }
        });
    </script>
</body>
</html>