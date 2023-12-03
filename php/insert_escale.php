<?php
include('../connect.php'); // Inclure le fichier de connexion à la base de données
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collecter les données du formulaire
    $num_escale = $_POST['num_escale'];
    $num_trajet = $_POST['num_trajet'];
    $adresse = $_POST['adresse'];
    $code_postal = $_POST['code_postal'];
    $heure_arrivee = $_POST['heure_arrivee'];
    $validation_escale = $_POST['validation_escale'];

    // Préparer la requête SQL pour insérer le escale
    $query = "INSERT INTO ESCALE (NUM_ESCALE, NUM_TRAJET, ADRESSE, CODE_POSTAL, HEURE_ARRIVEE, VALIDATION_ESCALE) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    
    // Associer les valeurs et exécuter la requête
    $stmt->bind_param("iisisi", $num_escale, $num_trajet, $adresse, $code_postal, $heure_arrivee, $validation_escale);
    if ($stmt->execute()) {
        header("Refresh:1; url=ajout_escale.php");
        echo "Nouveau escale ajouté avec succès! Redirection en cours...";
    } else {
        echo "Erreur: " . $stmt->error;
    }

    // Fermer la déclaration
    $stmt->close();
}

// Fermer la connexion
$conn->close();
?>
