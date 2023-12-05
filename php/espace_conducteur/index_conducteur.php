<!DOCTYPE html>
<html>
<head>
    <title>Driver Space - Manage Car and Rides</title>
    <!-- Add your CSS or external stylesheet links here -->
    <link rel="stylesheet" type="text/css" href="../../css/esp_conducteur.css">
</head>
<body>
    <?php include('../header.php'); ?>

    <div class="container">
        <div class="sidebar">
            <h2>Navigation</h2>
            <ul>
                <li><a href="info_vehicule.php">Mon véhicule</a></li>
                <li><a href="#" onclick="showContent('Mes trajets à venir')">Mes trajets à venir</a></li>
                <li><a href="#" onclick="showContent('Demandes de réservations')">Demandes de réservations</a></li>
                <li><a href="#" onclick="showContent('Propositions d\'escales')">Propositions d'escales</a></li>
            </ul>
        </div>
        <div class="main-content" id="mainContent">
            <!-- Your content related to managing cars and rides goes here -->
            <h2>Welcome to the Driver Space</h2>
            <!-- Form for Student Number -->
            <div class="form-container">
                <p> Join the ride ! </p>
            </div>
        </div>
    </div>

    <?php include('../footer.php'); ?>
</body>
</html>