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
            background: linear-gradient(to right, #2a5298, #1e3c72); /* Dégradé de bleu */
            color: white; /* Texte en blanc pour contraste */
            margin: 0;
        }

        

        #container {
            width: 80%;
            margin: 20px auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: black; /* Texte en noir pour la lisibilité */
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
            background-color: #1e3c72; /* Bleu foncé pour les en-têtes */
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; /* Alternance de couleur pour les lignes */
        }

        tr:hover {
            background-color: #ddd; /* Couleur lors du survol d'une ligne */
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }
        h3{
    color: white;
    text-align: center;
}
h2 {
    text-align: center;
}
#tableContainer2 {
  width: 100%; /* ou une largeur fixe selon votre préférence */
  margin: auto;
  padding: 15px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  background-color: white; /* Fond blanc pour le container */
  border-radius: 15px; /* Bordures arrondies */
  font-size: 0.5rem;
  height: auto;
  text-align: center;
}


    </style>
</head>
<body>
    <?php include('header.php'); ?>
    <?php include('../connect.php'); ?>

    
    <h3 >INFORMATIONS SUR LES CONDUCTEURS ET PASSAGERS </h3>
    <div id="container">
        <h2>Toutes les infos sur Les conducteurs </h2>
        <div id="tableContainer">
        <?php
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



<h3>  Moyenne des passagers sur l'ensemble des trajets effectués </h3>



<h3> Moyenne des distances parcourues en covoiturage par jour </h3>

<h3> Classement des meilleurs conducteurs d'aprés les avis </h3>


<h3> Classement des villes selon le nombre de trajets qui les dessert </h3>




</body>
</html>
