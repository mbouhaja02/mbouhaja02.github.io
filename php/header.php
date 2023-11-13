<!DOCTYPE html>
<html>
<head>
    <title>Covoiturage</title>
    <style>
        /* General Body Styling */
        body {
            font-family: Arial, sans-serif;
        }

        /* Header and Navigation Styling */
        header {
            background-color: #f8f8f8;
            border-bottom: 1px solid #e7e7e7;
            padding: 20px 0;
        }

        .main-nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 0 auto;
            width: 80%;
        }

        .logo img {
            height: 60px;
        }

        .menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .menu li {
            margin-left: 20px;
        }

        .menu li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .main-nav {
                flex-direction: column;
                align-items: flex-start;
            }

            .menu {
                flex-direction: column;
                align-items: flex-start;
            }

            .menu li {
                margin-bottom: 10px;
            }
        }
        .logo {
            /* Instead of setting the height for img, we'll style the text */
            font-size: 24px; /* You can adjust the size as needed */
            font-weight: bold;
            color: #007bff; /* This is just an example color, choose what fits your design */
            text-transform: uppercase; /* Capitalize all letters */
            font-family: 'Arial', sans-serif;
            letter-spacing: 2px; /* Increase spacing between letters */
            /* Optional: Add some text shadow for depth */
            text-shadow: 1px 1px 1px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            white-space: nowrap; /* Ensure the logo text stays on one line */
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .logo {
                font-size: 18px; /* Smaller font size on smaller screens */
            }
        }
    </style>
</head>
<body>
    <header>
        <nav class="main-nav">
        <div class="logo">
                COVOITURAGE COMPUS
            </div>
            <ul class="menu">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="../php/contact.php">Contact</a></li>
                <li><a href="../php/test.php">Tests</a></li>
                <li><a href="../php/login.php">Login </a></li>
            </ul>
        </nav>
    </header>
    <!-- <section class="welcome-section">
        <h1 class="welcome-text">Bienvenue sur notre service de covoiturage</h1>
    </section> -->>
</body>
</html>
