<?php
include('../connect.php'); // Inclure le fichier de connexion à la base de données
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collecter les données du formulaire
    $num_trajet = $_POST['num_trajet'];
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

    // Préparer la requête SQL pour insérer le trajet
    $query = "INSERT INTO TRAJET (NUM_TRAJET, NUM_IMMATRICULE, DATE_DEPART, DATE_ARRIVEE, VILLE_DEPART, ADRESSE_ARRIVEE, CODE_POSTAL, NBR_ESCALES, PRIX_KILOMETRAGE, DISTANCE_TOTAL, DUREE_ESTIME) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    
    // Associer les valeurs et exécuter la requête
    $stmt->bind_param("iissssisiii", $num_trajet, $num_immatricule, $date_depart, $date_arrivee, $ville_depart, $adresse_arrivee, $code_postal, $nbr_escales, $prix_kilometrage, $distance_total, $duree_estime);
    if ($stmt->execute()) {
        header("Refresh:1; url=test.php");
        echo "Nouveau trajet ajouté avec succès! Redirection en cours...";
    } else {
        echo "Erreur: " . $stmt->error;
    }

    // Fermer la déclaration
    $stmt->close();
}

// Fermer la connexion
$conn->close();
?>
