<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation et statistiques</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-top: 60px;
            background-color: #ffffff; /* Fond blanc */
            color: #000000; /* Texte noir pour contraste */
            margin: 0;
        }

        header {
            width: 100%;
            position: fixed;
            top: 0;
            background-color: #333; /* En-tête en gris foncé */
            color: white;
            padding: 20px 0;
            text-align: center;
            z-index: 1000;
        }

        h2, h3 {
            text-align: center;
            color: #333;
        }

        .tableContainer {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333; /* En-têtes de table en gris foncé */
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        button {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #555;
        }

        .form-section input, .form-section button {
            padding: 10px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        @media screen and (max-width: 600px) {
            .form-section input, .form-section button {
                width: calc(100% - 20px);
            }
        }
        
    </style>

</head>
<body>
    <?php include('header.php'); ?>

    <h3 >INFORMATIONS SUR LES CONDUCTEURS ET PASSAGERS </h3>
    <div id="container">
        
        <h2>Toutes les infos sur Les conducteurs </h2>
        <div id="tableContainer">
        <?php
            include '../connect.php';
            $query = "SELECT * FROM ETUDIANT
            WHERE NUM_ETUDIANT IN (SELECT NUM_ETUDIANT FROM ETUDIANT
                                    INTERSECT
                                    SELECT NUM_CONDUCTEUR FROM CONDUCTEUR);";
            if ($result = $conn->query($query)) {
                echo '<table>';
            echo '<tr><th>Numéro étudiant</th><th>Prénom</th><th>Nom</th></tr>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["NUM_ETUDIANT"] . '</td>';
                echo '<td>' . $row["PRENOM"] . '</td>';
                echo '<td>' . $row["NOM"] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
            } else {
                echo '<div id="result"><h3>Erreur :</h3>';
                echo '<p>' . $conn->error . '</p>';
                echo '</div>';
            }
            ?>
        </div>
        <h2>Toutes les infos sur Les passagers </h2>
        <div id="tableContainer">
        <?php
            $query = "SELECT * FROM ETUDIANT
            WHERE NUM_ETUDIANT IN (SELECT NUM_ETUDIANT FROM ETUDIANT
                                    INTERSECT
                                    SELECT NUM_PASSAGER FROM PASSAGER);";
            if ($result = $conn->query($query)) {
                echo '<table>';
            echo '<tr><th>Numéro étudiant</th><th>Prénom</th><th>Nom</th></tr>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["NUM_ETUDIANT"] . '</td>';
                echo '<td>' . $row["PRENOM"] . '</td>';
                echo '<td>' . $row["NOM"] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
            } else {
                echo '<div id="result"><h3>Erreur :</h3>';
                echo '<p>' . $conn->error . '</p>';
                echo '</div>';
            }
            $conn->close();
            ?>
        </div>

    </div>
    <h3>La liste des véhicules disponibles pour un jour donné pour une ville donnée</h3>

<div id="tableContainer2">
    <form method="post">
        Date1: <input type="date" name="date1" required>
        Date2: <input type="date" name="date2" required>
        <button type="submit">Afficher les trajets</button>
    </form>
    <div id="tableContainer">
    <?php
    include '../connect.php'; // Assurez-vous que ce chemin est correct

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $date1 = $_POST['date1'];
        $date2 = $_POST['date2'];

        // Convertir la date en format SQL
        $dateSQL1 = date('Y-m-d', strtotime($date1));
        $dateSQL2 = date('Y-m-d', strtotime($date2));

        // Préparez la requête pour éviter les injections SQL
        $stmt = $conn->prepare("SELECT *
        FROM  TRAJET  
        WHERE DATE_DEPART BETWEEN ? AND ?;");
        $stmt->bind_param("ss", $dateSQL1, $dateSQL2);
        $stmt->execute();
        $result = $stmt->get_result();


        if ($result->num_rows > 0) {
            echo '<table>';
            echo '<tr><th>num_trajet</th><th>NUM_IMMATRICULE</th><th class="date">DATE_DEPART</th><th>DATE_ARRIVEE</th><th>VILLE_DEPART</th>
            <th>ADRESSE_ARRIVEE</th><th>CODE_POSTAL</th><th>NBR_ESCALE</th><th>PRIX_KILOMETRAGE</th><th>DISTANCE_TOTAL</th><th>DUREE_ESTIME</th></tr>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["NUM_TRAJET"] . '</td>';
                echo '<td>' . $row["NUM_IMMATRICULE"] . '</td>';
                echo '<td>' . $row["DATE_DEPART"] . '</td>';
                echo '<td>' . $row["DATE_ARRIVEE"] . '</td>';
                echo '<td>' . $row["VILLE_DEPART"] . '</td>';
                echo '<td>' . $row["ADRESSE_ARRIVEE"] . '</td>';
                echo '<td>' . $row["CODE_POSTAL"] . '</td>';
                echo '<td>' . $row["NBR_ESCALES"] . '</td>';
                echo '<td>' . $row["PRIX_KILOMETRAGE"] . '</td>';
                echo '<td>' . $row["DISTANCE_TOTAL"] . '</td>';
                echo '<td>' . $row["DUREE_ESTIME"] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<div id="result"><h3>Aucun trajet trouvé pour cette ville à la date donnée.</h3></div>';
        }

        $stmt->close();
    }
    ?>
    </div>
</div>


<h3>  Les trajets pouvant desservir une ville donnée dans un intervalle de temps </h3>


    
    
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
