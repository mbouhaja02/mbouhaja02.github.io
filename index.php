<!DOCTYPE html>
<html>
<head>
    <title>Covoiturage</title>
    <link rel="icon" type="image/x-icon" href="LOGOV1.0.png">
    <style>
        
body {
    font-family: 'Open Sans', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h1 {
    color: #004d99; 
    text-align: center;
    margin-top: 200px; 
}

h2 {
    color: #004d99; 
    text-align: center;
    margin-top: 100px; 
}

p {
    text-align: center;
    color: #666; 
    margin-top: 20px;
}

header, footer {
    background-color: #002244; 
    color: white;
    padding: 20px 0;
    text-align: center;
}

.nav-link {
    color: white;
    text-decoration: none;
    margin: 0 15px;
    transition: color 0.3s ease;
}

.nav-link:hover {
    color: #ffcc00; 
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.nav-link {
    animation: fadeIn 1s;
}

@media (max-width: 768px) {
    h1 {
        font-size: 24px;
    }

    .nav-link {
        margin: 0 10px;
    }
}



    </style>

<body>
    <?php include('php/header.php'); ?>

    <div class="welcome-section">
        <h1>Bienvenue sur Covoiturage Compus</h1>
        <p>La plateforme dédiée au covoiturage étudiant. </p>
        <p> Rejoignez une communauté de partage et de convivialité pour vos trajets au campus.</p>
    </div>

    <div class="presentation-section">
        <h2>Qu'est-ce que Covoiturage Compus ?</h2>
        <p>Covoiturage Compus est une initiative pour faciliter les déplacements des étudiants en proposant une solution simple, </p>
        <p>économique et écologique. Que vous soyez conducteur ou passager, trouvez votre covoiturage en quelques clics et partagez bien plus qu'un trajet !</p>
    </div>

    <!-- Optional: Add an image to enhance the presentation -->
    <!-- <img src="path_to_your_image.jpg" alt="Etudiants partageant un covoiturage"> -->

    <?php include('php/footer.php'); ?>
</body>
</html>
