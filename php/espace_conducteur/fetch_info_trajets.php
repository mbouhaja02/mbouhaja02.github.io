<!DOCTYPE html>
<html>
<head>
    <title>Driver Space - Manage Car and Rides</title>
    <!-- Add your CSS or external stylesheet links here -->
    <link rel="stylesheet" type="text/css" href="../../css/table_style.css">
</head>
<body>
    <?php
    include('../../connect.php');
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        if (isset($_GET["num_etudiant"]) && isset($_GET["order_by"])) {
            $num_etudiant = $_GET["num_etudiant"];
            $order_by = $_GET["order_by"]; // This should be validated to prevent SQL injection
            
            // Define allowed columns for ordering to prevent SQL injection
            $allowed_columns = array("DATE_DEPART", "DATE_ARRIVEE", "ADRESSE_ARRIVEE", "CODE_POSTAL");

            if (in_array($order_by, $allowed_columns)) {
                // Fetch ride information from the database based on the student number and order by the selected criteria
                $query = "SELECT t.NUM_TRAJET, t.DATE_DEPART, t.DATE_ARRIVEE, t.ADRESSE_ARRIVEE, t.CODE_POSTAL 
                          FROM TRAJET t
                          JOIN VOITURE v ON t.NUM_IMMATRICULE = v.NUM_IMMATRICULE
                          WHERE v.NUM_CONDUCTEUR = ? 
                          ORDER BY $order_by";
                
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $num_etudiant);
                $stmt->execute();
                $result = $stmt->get_result();
                
                // Display fetched ride information with a Cancel Ride button for each row
                echo '<table>';
                echo '<tr><th>Ride ID</th><th>Departure Date</th><th>Arrival Date</th><th>Destination</th><th>Postal Code</th><th>Action</th></tr>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['NUM_TRAJET'] . '</td>';
                    echo '<td>' . $row['DATE_DEPART'] . '</td>';
                    echo '<td>' . $row['DATE_ARRIVEE'] . '</td>';
                    echo '<td>' . $row['ADRESSE_ARRIVEE'] . '</td>';
                    echo '<td>' . $row['CODE_POSTAL'] . '</td>';
                    // Add Cancel Ride button for each row
                    echo '<td><form method="post" action="cancel_ride.php">';
                    echo '<input type="hidden" name="num_trajet" value="' . $row['NUM_TRAJET'] . '">';
                    echo '<input type="submit" class="cancel-button" value="Cancel Ride"></form></td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo "Invalid order criteria.";
            }
        } else {
            echo "Please provide a student number and order criteria.";
        }
    }
    ?>
</body>
</html>

