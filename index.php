<!DOCTYPE html>
<html>
<head>
    <title>Covoiturage</title>
    <link rel="icon" type="image/x-icon" href="LOGOV1.0.png">
    <style>
        
body {
    font-family: 'Open Sans', sans-serif;
    background: linear-gradient(to right, #2a5298, #1e3c72); /* Dégradé de bleu */
    margin: 0;
    padding: 0;
    padding-top: 60px;
}

h1 {
    color: black; 
    text-align: center;
    margin-top: 200px; 
}

#footer {
    width: 100%;
    height: 50px;
    background-color: #222222;
    border-top: solid #444444 8px;
    box-shadow: 0 -5px 5px #858585;
    color: #CCCCCC;
    font-size: 12px;
    padding: 10px 0;
    text-align: center;
    position: fixed; /* Utilisez "fixed" au lieu de "absolute" */
    bottom: 0;
}

h2 {
    color: black; 
    text-align: center;
    margin-top: 100px; 
}

p {
    text-align: center;
    color: white; 
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


    <?php include('php/footer.php'); ?>
</body>
</html>
