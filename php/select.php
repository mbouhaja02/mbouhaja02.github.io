<!DOCTYPE html>
<html>
<head>
    <title>Choose Your Role</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }
        .container {
            display: flex;
            height: 100vh;
        }
        .half {
            flex: 1;
            cursor: pointer;
        }
        #passager {
            background: linear-gradient(to right, #76b852, #8DC26F);
            background-size: cover;
            position: relative;
        }

        #conducteur {
            background: url('conducteur.jpg') no-repeat center center;
            background-size: cover;
            position: relative;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Passenger Section -->
        <div id="passager" class="half" onclick="window.location.href='passager.php'">
    <p style="text-align:center; color:white; position: absolute; width: 100%; bottom: 10%; font-size: 20px;">PASSAGER</p>
</div>


        <!-- Driver Section -->
        <div id="conducteur" class="half" onclick="window.location.href='conducteur.php'">
        <p style="text-align:center; color:Black; position: absolute; width: 100%; bottom: 10%; font-size: 20px;">CONDUCTEUR</p>
        </div>
    </div>
</body>
</html>
