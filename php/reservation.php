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
    <?php include('header.php'); ?>
    <?php include('../connect.php'); ?>

    <div id="addPassagerForm" class="form-container">
        <h2>Ajouter un nouveau passager</h2>
        <form action="insert_passager.php" method="post" class="form-passager">
            <div class="form-group">
                <input type="text" name="num_etudiant" placeholder="Numéro Etudiant" required>
                <input type="text" name="PRENOM" placeholder="Prénom" required>
                <input type="text" name="NOM" placeholder="Nom" required>
            </div>
            <button type="submit" class="submit-button">Ajouter Passager</button>
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
