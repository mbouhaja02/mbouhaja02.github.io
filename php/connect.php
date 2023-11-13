

<?php
$dbname = "../sql/data.db";

try {
    $conn = new PDO("sqlite:$dbname");
    echo "Connexion réussie à SQLite";
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
