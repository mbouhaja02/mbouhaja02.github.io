<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #2a5298, #1e3c72); /* Dégradé de bleu */
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Form Styling */
        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            border: 2px solid #ccc; /* Cleaner border */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 300px; /* Fixed width */
        }

        .form-control {
            width: calc(100% - 20px); /* Full width minus padding */
            padding: 10px;
            margin-bottom: 15px; /* Spacing between inputs */
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .btn-primary {
            width: 100%; /* Full width button */
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .alert {
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }
        .container{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
    </style>
</head>
<body>
        
    <?php include('header.php'); ?>

    <?php if (!isset($loggedUser)): ?>
    <div id="container">
    <form action="index.php" method="post">
        <!-- Error Message -->
        <?php if (isset($errorMessage)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="you@example.com">
            <div id="email-help" class="form-text">L'email utilisé lors de la création de compte.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
    <?php else: ?>
        <!-- Success Message -->
        <div class="alert alert-success" role="alert">
            Bonjour <?php echo $loggedUser['email']; ?> et bienvenue sur le site !
        </div>
    <?php endif; ?>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>
