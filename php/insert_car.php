<?php
include('../connect.php'); 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num_immatricule = $_POST['num_immatricule'];
    $num_conducteur = $_POST['num_conducteur'];
    $type_voiture = $_POST['type_voiture'];
    $couleur = $_POST['couleur'];
    $etat = $_POST['etat'];
    $nbr_passager = $_POST['nbr_passager'];

    $query = "SELECT * FROM VOITURE WHERE NUM_IMMATRICULE = ?";
    $check = $conn->prepare($query);
    $check->bind_param("i", $num_immatricule);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        header("Refresh:1; url=add_car.php");
        echo "Cette voiture existe déjà!";
    } else {
        $query = "INSERT INTO VOITURE (NUM_IMMATRICULE, NUM_CONDUCTEUR, TYPE_VOITURE, COULEUR, ETAT, NBR_PASSAGER) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
    
        $stmt->bind_param("iisssi", $num_immatricule, $num_conducteur, $type_voiture, $couleur, $etat, $nbr_passager);
        if ($stmt->execute()) {
            header("Refresh:1; url=add_car.php");
            echo "Nouvelle voiture ajoutée avec succès!";
        } else {
            echo "Erreur: " . $stmt->error;
        }

        $stmt->close();
    }

    $check->close();
}

$conn->close();
?>
