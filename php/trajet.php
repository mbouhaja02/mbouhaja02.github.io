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

        .row {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .column {
            flex: 1;
            padding: 10px;
            text-align: center;
        }

        .button {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .button:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        .button i {
            margin-right: 8px;
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

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background: linear-gradient(to right, #2a5298, #1e3c72);
        }

        button, input[type=submit] {
            background: linear-gradient(to right, #2a5298, #1e3c72);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin: 10px 0;
        }

        .form-section input {
            width: calc(50% - 20px);
            padding: 10px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        @media screen and (max-width: 600px) {
            .form-section input {
                width: calc(100% - 20px);
            }
        }
    </style>
</head>
<body>
    <?php include('header.php'); ?>
    <?php include('../connect.php'); ?>

    <div id="container">
        <form method="post">
            Destination: <input type="text" name="ville" required>
            Date de départ: <input type="date" name="date1" required>
            Date d'arrivée: <input type="date" name="date2" required>
            <button type="submit">Afficher les trajets</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
            $ville = $_POST['ville'];

            $dateSQL1 = date('Y-m-d', strtotime($date1));
            $dateSQL2 = date('Y-m-d', strtotime($date2));

            $stmt = $conn->prepare("SELECT * FROM TRAJET WHERE DATE_DEPART BETWEEN ? AND ? AND ADRESSE_ARRIVEE = ?;");
            $stmt->bind_param("sss", $dateSQL1, $dateSQL2, $ville);
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

        $conn->close();
        ?>
    </div>

    <div class="row">
        <div class="column">
            <button class="button" id="reserver"><i class="fas fa-search"></i>reserver</button>
        </div>
        <div class="column">
            <button class="button" id="proposer escale"><i class="fas fa-plus"></i>proposer escale</button>
        </div>
    </div>

    <script>
        document.getElementById('reserver').addEventListener('click', function() {
            window.location.href = 'http://localhost/free-sgbd203/php/reservation.php';
        });

        document.getElementById('proposer escale').addEventListener('click', function() {
            window.location.href = 'http://localhost/free-sgbd203/php/ajout_escale.php';
        });
    </script>
</body>
</html>
