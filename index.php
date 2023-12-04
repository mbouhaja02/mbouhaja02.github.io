<!DOCTYPE html>
<html>
<head>
    <title>Covoiturage</title>
    <link rel="icon" type="image/x-icon" href="LOGOV1.0.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"> <!-- For FontAwesome icons -->
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background: linear-gradient(to right, #2a5298, #1e3c72); /* Gradient blue background */
            padding-top: 80px;
            margin: 0;
        }

        .column, .column1 {
            float: left;
            width: 50%;
            box-sizing: border-box; /* Adjusts the box model */
        }

        /* Clearfix for the .row */
        .row1 {
            content: "";
            display: table;
            clear: both;
            text-align: center;
        }

        .column1 {
            background-color: #f8f9fa; /* Light background color */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            padding: 20px;
            margin: 20px;
            max-width: 570px; /* Maximum width */
            
            
        }

        h2 {
            color: #343a40; /* Darker color for headings */
            margin-bottom: 15px; /* Spacing below the heading */
            
        }

        p {
            color: #6c757d; /* Lighter color for text */
            line-height: 1.6; /* Line height for readability */
            font-size: 14px; /* Font size */
            
        }

        .button {
            background-image: radial-gradient(#132e32, #132e32, #132e32);
            border: none;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 24px;
            border-radius: 12px;
            width: 95%;
            color: white;
            margin: 10px auto; /* Centering the button */
        }

        .button i {
            margin-right: 10px; /* Spacing out icon and text in button */
        }

        img {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 5px;
            width: 50%; /* Adjusted for full width */
            margin-top: 5px;
            display: block;
            margin-left: 100px;
        }
    </style>
</head>
<body>
    <?php include('php/header.php'); ?>

    <div class="row">
        <div class="column">
            <img src="./img/carpool_index.png" alt="car">    
        </div>
        <div class="column">
            <div class="row" id="row_ad">
                <div class="card">
                    <h2>Pick your next adventure ...</h2>
                    <h2>... Paris ?</h2>
                    <h2>... Toulouse ?</h2>
                    <h2>... Mulhouse ?</h2>
                    <h2>... Lyon ?</h2>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <button class="button" id="searchButton"><i class="fas fa-search"></i>Search for a ride</button>
                </div>
                <div class="column">
                    <button class="button" id="publishButton"><i class="fas fa-plus"></i>Publier un trajet</button>
                </div>
                <div class="column">
                    <button class="button" id="rider"><i class="fas fa-plus"></i>Become a rider</button>
                </div>
                <div class="column">
                    <button class="button" id="reservation"><i class="fas fa-plus"></i>Chi haja khra</button>
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

        document.getElementById('rider').addEventListener('click', function() {
            window.location.href = 'http://localhost/free-sgbd203/php/add_car.php';
        });
        document.getElementById('reservation').addEventListener('click', function() {
            window.location.href = 'http://localhost/free-sgbd203/php/reservation.php';
        });
    </script>

    <?php include('php/footer.php'); ?>
</body>
</html>
