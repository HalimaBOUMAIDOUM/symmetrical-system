<?php 
include '../includes/DbOperations.php';
$server = 'http://' . $_SERVER['SERVER_NAME'] . '/projet/';

require_once '../includes/DbOperations.php';

$user_logged = false;

?>
<!DOCTYPE html>
<html>
<head>
    <title>NutriSuivi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@7.0.0/css/all.min.css">

    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
        .navbar-brand img { max-height: 50px; /* Adjust the max-height to fit your logo */ }
    </style>
</head>

<script>
function updateIsPresentForEtudiant() {
    window.location.href = '../V1/UpdatePresence.php';
}
</script>

<script>
function getstats() {
    window.location.href = './index.php';
}
</script>



<body>
<header class="d-flex w-100">
    <nav class="navbar navbar-expand-lg w-100 bg-light">
        <a class="navbar-brand" href="#">
            <img src="https://imt-nord-europe.fr/wp-content/uploads/2023/02/Logo_black_IMT_RF_bis.png" alt="Logo">
        </a>
        <div class="navbar-collapse collapse justify-content-between">
            <ul class="navbar-nav" id="navbar">
                
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    $user_logged = true;
                    if ($_SESSION['role'] == 'admin') { ?>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo $server; ?>frontend/components/produit/view.php">Produits</a>
                        </li>
                    
                <?php } 
                } ?>


            </ul>
            <ul class="navbar-nav">
                <div class="d-flex my-2 my-lg-0">
                    <input id="searchInput" class="form-control mr-sm-2" type="search" placeholder="Recherche par nom" aria-label="Search">
                    <button id="searchBtn" class="btn btn-primary" type="button">Recherche</button>
                </div>
            </ul>
            <ul class="navbar-nav">
            <button id="statsBtn" class="btn btn-primary" type="button" onclick="getstats()">
            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#ffffff" d="M160 80c0-26.5 21.5-48 48-48h32c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H208c-26.5 0-48-21.5-48-48V80zM0 272c0-26.5 21.5-48 48-48H80c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V272zM368 96h32c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H368c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48z"/></svg>
</button>

            <button id="updateBtn" class="btn btn-primary" type="button" onclick="updateIsPresentForEtudiant()">
                <i class="fa fa-refresh fa-spin" style="font-size:24px"></i>
            </button>
            </ul>

        </div>
    </nav>
</header>

<div class="container-fluid page-container">
    <div class="main-content">
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>