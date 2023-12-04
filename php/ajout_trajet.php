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

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        h2 {
            text-align: center;
            color: black;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #2a5298; /* Dégradé de bleu pour hover */
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

        .addTrajetForm {
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
            flex: 0 0 48%; /* Pour que deux champs soient sur la même ligne */
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

        @media (max-width: 768px) {
            .form-group input {
                flex: 0 0 100%;
            }
        }

    </style>
</head>
<body>
    <?php include('header.php'); ?>
    <?php include('../connect.php'); ?>

    <div id="addTrajetForm" class="form-container">
        <h2>Ajouter un nouveau trajet</h2>
        <form action="insert_trajet.php" method="post" class="form-trajet">
            <div class="form-group">
            <input type="text" name="num_etudiant" placeholder="Numéro Etudiant" required>
                <input type="text" name="num_immatricule" placeholder="Numéro Immatricule" required>
            </div>
            <div class="form-group">
                <input type="date" name="date_depart" id="leaveon" placeholder="Date de départ" required>
                <input type="date" name="date_arrivee" id="arriveon" placeholder="Date d'arrivée" required>
            </div>
            <div class="form-group">
                <input type="text" name="ville_depart" placeholder="Ville de départ" required>
                <input type="text" name="adresse_arrivee" placeholder="Adresse d'arrivée" required>
            </div>
            <div class="form-group">
                <input type="text" name="code_postal" placeholder="Code postal" required>
                <input type="text" name="nbr_escales" placeholder="Nombre d'escales" required>
            </div>
            <div class="form-group">
                <input type="text" name="prix_kilometrage" placeholder="Prix du kilométrage" required>
                <input type="text" name="distance_total" placeholder="Distance totale" required>
            </div>
            <div class="form-group">
                <input type="text" name="duree_estime" placeholder="Durée estimée" required>
            </div>
            <button type="submit" class="submit-button">Ajouter Trajet</button>
        </form>
    </div>

    <script>
        // Get today's date
        var today = new Date().toISOString().split('T')[0];

        // Set the minimum date for departureDate input
        document.getElementById('leaveon').setAttribute('min', today);

        // Function to set the minimum date for arrivalDate input based on departureDate selection
        document.getElementById('leaveon').addEventListener('change', function() {
            document.getElementById('arriveon').setAttribute('min', this.value);
        });
    </script>

</body>
</html>
