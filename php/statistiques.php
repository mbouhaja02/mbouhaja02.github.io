<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation et statistiques</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 60px 20px 20px 20px;
            background: linear-gradient(to right, #2a5298, #1e3c72); 
            color: white;
            margin: 0;
        }

        h2, h3 {
            color: white;
            text-align: center;
            margin: 20px 0;
        }

        .tableContainer {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            max-width: 800px; /* Limite la largeur */
            margin-left: auto; /* Centrage horizontal */
            margin-right: auto;
        }

        table {
            width: 100%; /* Utilise toute la largeur du conteneur */
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: center;

        }

        th {
            background-color: #4a69bd;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; /* Couleur de fond pour les lignes paires */
            color: black; /* Couleur du texte pour les lignes paires */
        }
    </style>
</head>
<body>
    <?php include('header.php'); ?>

    
    
    <h3> Moyenne des passagers sur l'ensemble des trajets effectués</h3>
    
    <div id="tableContainer" style="text-align: center";>
    <?php
        include('../connect.php');

        $query = "SELECT AVG(p.NUM_PASSAGER) AS Moyenne_Passagers
        FROM PASSAGER p
        JOIN RESERVATION r ON r.NUM_PASSAGER = p.NUM_PASSAGER
        -- Inclure les escales ?
        WHERE VALIDATION_RESERVATION = 'TRUE';";
        if ($result = $conn->query($query)) {
            $row = $result->fetch_assoc();
            echo '<table>';
            echo '<tr><th>Moyenne_Passagers</th></tr>';
            echo '<tr>';
            echo '<td>' . $row['Moyenne_Passagers'] . '</td>';
            echo '</tr>';
            echo '</table>';
        } else {
            echo '<div id="result"><h3>Erreur :</h3>';
            echo '<p>' . $conn->error . '</p>';
            echo '</div>';
        }
        $conn->close();
    ?>
</div>




<h3> Moyenne des distances parcourues en covoiturage par jour </h3>
<div id="tableContainer" style="text-align: center";>
    <?php
        include('../connect.php');

        $query = "SELECT  AVG(subquery.Distances_Jour) AS Moyenne_Distance_Jour
        FROM (
            SELECT t.DATE_DEPART, SUM(t.DISTANCE_TOTAL) AS Distances_Jour
            FROM TRAJET t
            GROUP BY t.DATE_DEPART
        ) AS subquery;";
        if ($result = $conn->query($query)) {
            $row = $result->fetch_assoc();
            echo '<table>';
            echo '<tr><th>Moyenne_Distance_Jour</th></tr>';
            echo '<tr>';
            echo '<td>' . $row['Moyenne_Distance_Jour'] . '</td>';
            echo '</tr>';
            echo '</table>';
        } else {
            echo '<div id="result"><h3>Erreur :</h3>';
            echo '<p>' . $conn->error . '</p>';
            echo '</div>';
        }
        $conn->close();
    ?>
</div>

<h3> Classement des meilleurs conducteurs d'aprés les avis </h3>
<div id="tableContainer" style="text-align: center";>
    <?php
        include('../connect.php');

        $query = "SELECT e.NOM, e.PRENOM, eval.NOTE AS avis
        FROM CONDUCTEUR c
        JOIN ETUDIANT e ON c.NUM_CONDUCTEUR = e.NUM_ETUDIANT
        JOIN EVALUATION eval ON eval.NUM_ETUDIANT_EVALUE = c.NUM_CONDUCTEUR
        ORDER BY eval.note DESC;";

        if ($result = $conn->query($query)) {
            
            echo '<table>';
            echo '<tr><th>Nom</th><th>Prénom</th><th>Avis</th></tr>';
            while($row = $result->fetch_assoc()){
                echo '<tr>';
                echo '<td>' . $row['NOM'] . '</td>';
                echo '<td>' . $row['PRENOM'] . '</td>';
                echo '<td>' . $row['avis'] . '</td>';
                echo '</tr>';
        }
        } else {
            echo '<div id="result"><h3>Erreur :</h3>';
            echo '<p>' . $conn->error . '</p>';
            echo '</div>';
        }
        echo '</table>';
        $conn->close();
    ?>
</div>

<h3> Classement des villes selon le nombre de trajets qui les dessert </h3>



</body>
</html>
