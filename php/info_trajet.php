<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trajets</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-top: 60px;
            background: linear-gradient(to right, #2a5298, #1e3c72);
            color: white;
            margin: 0;
        }

        #container {
            width: 80%;
            margin: 20px auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: black;
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
            background-color: #1e3c72;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
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

        h2 {
            text-align: center;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .form-group input {
            flex: 0 0 48%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .submit-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 1rem;
        }

        .submit-button:hover {
            background-color: #45a049;
        }

        @media screen and (max-width: 600px) {
            .form-group input {
                width: calc(100% - 20px);
            }
        }

        @media (max-width: 768px) {
            .form-group input {
                flex: 0 0 100%;
            }
        }
    </style>
</head>
<body>
<?php 
include('header.php'); 
include('../connect.php');
?>

<div id="container">
    <?php
    if (isset($_GET['num_trajet'])) {
        $num_trajet = $_GET['num_trajet'];

        // Info Trajet
        $query_trajet = "SELECT * FROM TRAJET WHERE NUM_TRAJET=?";
        $stmt_trajet = $conn->prepare($query_trajet);
        $stmt_trajet->bind_param("i", $num_trajet);
        executeAndDisplay($stmt_trajet, "Info Trajet", 
            ['NUM_IMMATRICULE', 'DATE_DEPART', 'DATE_ARRIVEE', 'VILLE_DEPART', 'ADRESSE_ARRIVEE', 'CODE_POSTAL', 'NBR_ESCALES', 'PRIX_KILOMETRAGE', 'DISTANCE_TOTAL', 'DUREE_ESTIME']);

        // Info conducteur
        $query_conducteur = "SELECT E.NOM, E.PRENOM
                            FROM ETUDIANT E
                            JOIN CONDUCTEUR C ON C.NUM_CONDUCTEUR = E.NUM_ETUDIANT
                            JOIN VOITURE V ON C.NUM_CONDUCTEUR = V.NUM_CONDUCTEUR
                            JOIN TRAJET J ON J.NUM_IMMATRICULE = V.NUM_IMMATRICULE
                            WHERE J.NUM_TRAJET=?";
        $stmt_conducteur = $conn->prepare($query_conducteur);
        $stmt_conducteur->bind_param("i", $num_trajet);
        executeAndDisplay($stmt_conducteur, "Info conducteur", ['NOM', 'PRENOM']);
    }

    function executeAndDisplay($stmt, $heading, $columns) {
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            echo "<h2>$heading</h2>";
            if ($result->num_rows > 0) {
                echo '<table>';
                echo '<tr>';
                foreach ($columns as $column) {
                    echo "<th>$column</th>";
                }
                echo '</tr>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>'; // Start new table row
                    foreach ($columns as $column) {
                        echo '<td>' . $row[$column] . '</td>';
                    }
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo "Aucun résultat trouvé.";
            }
            $stmt->close();
        } else {
            echo "Erreur: " . $stmt->error;
        }
    }

    $conn->close();
    ?>
</div>
<div class="row">
    <div class="column">
        <button class="button" id="ProposerEscale">Proposer escale</button>
    </div>
    <div class="column">
        <button class="button" id="ReserverTrajet">Reserver trajet</button>
        <div id="reservationForm" style="display: none;">
            <!-- Form for reservation -->
            <form action="book_trajet.php<?php if(isset($_GET['num_trajet'])) { echo '?num_trajet=' . $_GET['num_trajet']; } ?>" method="post" id="reservationData">
                <input type="text" name="num_etudiant" placeholder="Numéro étudiant " required><br>
                <input type="email" name="email" placeholder="Email" required><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_GET['num_trajet'])) {
    $num_trajet = $_GET['num_trajet'];
    echo "
    <script>
        document.getElementById('ProposerEscale').addEventListener('click', function() {
            window.location.href = 'http://localhost/free-sgbd203/php/ajout_escale.php?num_trajet=$num_trajet';
        });

        document.getElementById('ReserverTrajet').addEventListener('click', function() {
            // Display the reservation form
            document.getElementById('reservationForm').style.display = 'block';
        });
    </script>";
} else {
    echo "ERROR";
}
?>


</body>
</html>
