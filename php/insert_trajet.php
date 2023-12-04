<?php
include('../connect.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num_etudiant = $_POST['num_etudiant'];
    $num_immatricule = $_POST['num_immatricule'];
    $ville_depart = $_POST['ville_depart'];
    $date_depart = $_POST['date_depart'];
    $date_arrivee = $_POST['date_arrivee'];
    $distance_total = $_POST['distance_total'];
    $adresse_arrivee = $_POST['adresse_arrivee'];
    $code_postal = $_POST['code_postal'];
    $prix_kilometrage = $_POST['prix_kilometrage'];
    $nbr_escales = $_POST['nbr_escales'];
    $duree_estime = $_POST['duree_estime'];

    // Prepare and execute the first query for CONDUCTEUR
    $query1 = "INSERT IGNORE INTO CONDUCTEUR VALUES (?)";
    $stmt1 = $conn->prepare($query1);
    $stmt1->bind_param("i", $num_etudiant);
    $stmt1->execute();
    $stmt1->close();

    // Prepare and execute the second query for VOITURE
    $query2 = "INSERT IGNORE INTO VOITURE (NUM_IMMATRICULE, NUM_CONDUCTEUR) VALUES (?, ?)";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param("ii", $num_immatricule, $num_etudiant);
    $stmt2->execute();
    $stmt2->close();

    // Prepare and execute the third query for TRAJET
    $query3 = "INSERT INTO TRAJET (NUM_IMMATRICULE, DATE_DEPART, DATE_ARRIVEE, VILLE_DEPART, ADRESSE_ARRIVEE, CODE_POSTAL, NBR_ESCALES, PRIX_KILOMETRAGE, DISTANCE_TOTAL, DUREE_ESTIME) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt3 = $conn->prepare($query3);
    $stmt3->bind_param("issssiiiii", $num_immatricule, $date_depart, $date_arrivee, $ville_depart, $adresse_arrivee, $code_postal, $nbr_escales, $prix_kilometrage, $distance_total, $duree_estime);
    if ($stmt3->execute()) {
        header("Refresh:1; url=ajout_trajet.php");
        echo "Nouveau trajet ajouté avec succès! Redirection en cours...";
    } else {
        echo "Erreur: " . $stmt3->error;
    }
    $stmt3->close();
}

$conn->close();
?>

