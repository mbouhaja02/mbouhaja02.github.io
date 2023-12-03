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
  color: black;
}
        .addPassagerForm{
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

.form-passager .form-group {
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

    <div id="addPassagerForm" class="form-container">
    <h2>Ajouter un nouveau passager</h2>
    <form action="insert_passager.php" method="post" class="form-passager">
        <div class="form-group">
            <input type="text" name="num_etudiant" placeholder="Numéro Etudiant" required>
            <input type="text" name="PRENOM" placeholder="Prénom" required>
        </div>
        <div class="form-group">
            <input type="text" name="NOM" placeholder="Nom" required>
        </div>
        
        <button type="submit" class="submit-button">Ajouter Passager</button>
    </form>
</div>


<div class="form-section">
<h2>Supprimer un passager</h2>
<form action="delete_passager.php" method="post">
    <input type="number" name="num_etudiant" placeholder="Numéro du passager" required>
    <button type="submit">Supprimer passager</button>
</form>
        </div>



    <script>
        document.getElementById('showTableBtn').addEventListener('click', function() {
            var tableContainer = document.getElementById('tableContainer');
            tableContainer.style.display = tableContainer.style.display === 'none' ? 'block' : 'none';
        });
    </script>
</body>
</html>
