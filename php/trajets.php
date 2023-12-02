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
            background: linear-gradient(to right, #2a5298, #1e3c72); /* Dégradé de bleu */
            margin: 0;
        }

        header {
            width: 100%;
            position: fixed;
            z-index: 1000;
            background: #333;
            color: white;
            padding: 20px 0;
            text-align: center;

        }

        #container {
            width: 80%;
            margin: 100px auto;
            background: white;
            padding: 100px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-size: 0.8rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 3px rgba(0, 0, 0.1, 0);
            text-align: center;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        h2{
            text-align: center;
            color:black;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

    
        tr:hover {
            background: linear-gradient(to right, #2a5298, #1e3c72); /* Dégradé de bleu */

        }

        button, input[type=submit] {
            background: linear-gradient(to right, #2a5298, #1e3c72); /* Dégradé de bleu */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin: 10px 0;
        }


        .addTrajetForm{
            text-align: center;
        }

        .form-section {
            margin-bottom: 20px;
            text-align: left;
            text-align: center;
        }

        .form-section input {
            width: calc(50% - 20px);
            padding: 10px;
            margin: 5px;
        }

        @media screen and (max-width: 600px) {
            .form-section input {
                width: calc(100% - 20px);
            }
        }

        .form-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    margin-bottom: 20px;
}

.form-trajet .form-group {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-bottom: 10px;
}

.form-trajet .form-group input {
    flex: 0 0 48%; /* Pour que deux champs soient sur la même ligne */
    margin-bottom: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.form-trajet .submit-button {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
    font-size: 1rem;
}

.form-trajet .submit-button:hover {
    background-color: #45a049;
}

@media (max-width: 768px) {
    .form-trajet .form-group input {
        flex: 0 0 100%;
    }
}

 
    </style>
</head>
<body>
    <?php include('header.php'); ?>
    <?php include('../connect.php'); ?>
    

    <div id="container">
        <h2>Résultats de Test Table TRAJET2</h2>
        <div id="tableContainer">
            <?php
            $query = "SELECT * FROM TRAJET";
            if ($result = $conn->query($query)) {
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
                echo '<div id="result"><h3>Erreur :</h3>';
                echo '<p>' . $conn->error . '</p>';
                echo '</div>';
            }
            $conn->close();
            ?>
        </div>
    </div>

    
    <div class="form-section">
        <h2>Supprimer un nouveau trajet</h2>
        <form action="delete_trajet.php" method="post">
            <input type="number" name="num_trajet" placeholder="Numéro du trajet" required>
            <button type="submit">Supprimer Trajet</button>
        </form>
    </div>

</body>
</html>
