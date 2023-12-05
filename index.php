<!DOCTYPE html>
<html>
<head>
    <title>Covoiturage</title>
    <link rel="icon" type="image/x-icon" href="LOGOV1.0.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"> <!-- For FontAwesome icons -->
    <style>
    body {
        font-family: 'Open Sans', sans-serif;
        background-color: #ffffff;
        color: #000000;
        margin: 0;
        padding-top: 80px;
    }

    .row, .row1 {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        text-align: center;
    }

    .column, .column1 {
        flex: 1;
        min-width: 250px; /* Assure une largeur minimale pour la responsivité */
        box-sizing: border-box;
        padding: 20px;
    }

    .column1 {
        background-color: #f0f0f0;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 10px;
        transition: transform 0.3s ease; /* Animation de transformation */
    }

    .column1:hover {
        transform: scale(1.05); /* Agrandissement au survol */
    }

    h2 {
        color: #000000;
        margin-bottom: 15px;
    }

    p {
        color: #333333;
        line-height: 1.6;
        font-size: 14px;
    }

    .button-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    .button {
        background-color: #000000;
        color: #ffffff;
        border: none;
        padding: 15px 32px;
        text-align: center;
        display: inline-block;
        font-size: 16px;
        border-radius: 8px;
        margin: 10px;
        transition: background-color 0.3s ease, transform 0.3s ease;
        width: auto;
    }

    .button:hover {
        background-color: #555555;
        transform: translateY(-5px);
    }

    img {
        max-width: 150%; /* Assure que l'image est responsive */
        height: auto;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 50px;
    }
</style>


</head>
<body>
    <?php include('php/header.php'); ?>

    <div class="row">
        <div class="column">
            <img src="./img/voiture-1.jpg" alt="car">    
        </div>
        <div class="column">
            
            <div class="button-container">
                <button class="button" id="searchButton"><i class="fas fa-search"></i> Search for a ride</button>
                <button class="button" id="publishButton"><i class="fas fa-plus"></i> Publier un trajet</button>
                <button class="button" id="driverSpace"><i class="fas fa-circle"></i> Mon Espace conducteur</button>
                <button class="button" id="reservation"><i class="fas fa-car"></i> Mon espace passager</button>
            </div>

            <div class="row" id="row_ad">
                <div class="card">
                    <h2>Pick your next adventure ...</h2>
                    <h2>... Paris ?</h2>
                    <h2>... Toulouse ?</h2>
                    <h2>... Mulhouse ?</h2>
                    <h2>... Lyon ?</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row1">
        <div class="column1">
            <h2>Share meaningful moments...</h2>
            <p>It's about sharing meaningful moments. Each journey offers a chance to connect, share stories, and create memories with fellow travelers. Join us and turn every ride into an enriching experience.</p>
        </div>
        <div class="column1">
            <h2>At a low price...</h2>
            <p>Wherever you're going with carpooling, find the perfect ride among our wide selection of destinations at low prices.</p>
        </div>
        <div class="column1">
            <h2>Within a protected environment...</h2>
            <p>In our carpooling community, safety and trust are paramount. We are committed to providing a protected environment where every member feels secure and respected.</p>
        </div>
    </div>

    <script>
        document.getElementById('searchButton').addEventListener('click', function() {
            window.location.href = 'http://localhost/free-sgbd203/php/trajet.php';
        });

        document.getElementById('publishButton').addEventListener('click', function() {
            window.location.href = 'http://localhost/free-sgbd203/php/ajout_trajet.php';
        });

        document.getElementById('driverSpace').addEventListener('click', function() {
            window.location.href = 'http://localhost/free-sgbd203/php/espace_conducteur/index_conducteur.php';
        });
        document.getElementById('reservation').addEventListener('click', function() {
            window.location.href = 'http://localhost/free-sgbd203/php/reservation.php';
        });
    </script>

    <?php include('php/footer.php'); ?>
</body>
</html>
