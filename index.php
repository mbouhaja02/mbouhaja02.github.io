<!DOCTYPE html>
<html>
<head>
    <title>Covoiturage</title>
    <link rel="icon" type="image/x-icon" href="LOGOV1.0.png">
    <style>
        
body {
    font-family: 'Open Sans', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h1 {
    color: #004d99; 
    text-align: center;
    margin-top: 200px; 
}

h2 {
    color: #004d99; 
    text-align: center;
    margin-top: 100px; 
}

p {
    text-align: center;
    color: #666; 
    margin-top: 20px;
}

header, footer {
    background-color: #002244; 
    color: white;
    padding: 20px 0;
    text-align: center;
}

.nav-link {
    color: white;
    text-decoration: none;
    margin: 0 15px;
    transition: color 0.3s ease;
}

.nav-link:hover {
    color: #ffcc00; 
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.nav-link {
    animation: fadeIn 1s;
}

@media (max-width: 768px) {
    h1 {
        font-size: 24px;
    }

    .nav-link {
        margin: 0 10px;
    }
}



    </style>

<body>

    <?php include('php/header.php'); ?>

    <div class="welcome-section">
        <h1>Bienvenue sur Covoiturage Compus</h1>
        <p>La plateforme dédiée au covoiturage étudiant. </p>
        <p> Rejoignez une communauté de partage et de convivialité pour vos trajets au campus.</p>
    </div>

    <div class="presentation-section">
        <h2>Qu'est-ce que Covoiturage Compus ?</h2>
        <p>Covoiturage Compus est une initiative pour faciliter les déplacements des étudiants en proposant une solution simple, </p>
        <p>économique et écologique. Que vous soyez conducteur ou passager, trouvez votre covoiturage en quelques clics et partagez bien plus qu'un trajet !</p>
    </div>

    <h2>Exemple de requ&ecirc;te php PostgreSQL</h2>
<?php
include "connect_pg.php"; /* Le fichier connect_pg.php contient les identifiants de connexion */
/* Si l'exécution est réussie... */
$res = pg_query_params($connection,  'SELECT * FROM ACTEUR WHERE nom_acteur=$1', array('GARCIA'));


if ($res) {
    $num_fields = pg_num_fields($res); // Nombre de colonnes
    ?>
    <table>
        <tr>
            <?php
            echo "<table border=120>\n";
            // Afficher les en-têtes des colonnes avec le nom et le type
            for ($i = 0; $i < $num_fields; $i++) {
                $field_name = pg_field_name($res, $i); // Nom de la colonne
                $field_type = pg_field_type($res, $i); // Type de la colonne
                echo "<th>{$field_name} ({$field_type})</th>";
            }
            ?>
        </tr>
        <?php
        while ($row = pg_fetch_assoc($res)) {
            echo "<tr>";
            // Afficher les données de chaque colonne
            for ($i = 0; $i < $num_fields; $i++) {
                $field_name = pg_field_name($res, $i);
                echo "<td>{$row[$field_name]}</td>";
            }
            echo "</tr>";
        }
        // Libération de l'objet requête
        pg_free_result($res);
    }
    echo "</table>\n";
    // Fermeture de la connexion avec la base
    pg_close($connection);
    ?>
    </table>

    <!-- Optional: Add an image to enhance the presentation -->
    <!-- <img src="path_to_your_image.jpg" alt="Etudiants partageant un covoiturage"> -->

    <?php include('php/footer.php'); ?>
</body>
</html>
