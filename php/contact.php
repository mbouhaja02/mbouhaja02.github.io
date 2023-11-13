<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .contact-container {
            background-color: white;
            width: 80%;
            max-width: 800px;
            margin: 40px auto;
            padding: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .contact-form {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .contact-form > div {
            flex: 0 0 48%;
            margin-bottom: 20px;
        }
        .contact-form input[type='text'],
        .contact-form input[type='email'],
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .contact-form textarea {
            resize: vertical;
            height: 150px;
        }
        .contact-form button[type='submit'] {
            padding: 10px 20px;
            background-color: #0056b3;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-transform: uppercase;
        }
        .contact-form button[type='submit']:hover {
            background-color: #003d82;
        }
        .contact-heading {
            text-align: center;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
<?php include('../php/header.php'); ?>

<div class="contact-container">
    <h1 class="contact-heading">Contactez-nous</h1>
    <form class="contact-form" action="submit_contact_form.php" method="post">
        <div>
            <input type="text" id="name" name="name" placeholder="Votre nom" required>
        </div>
        <div>
            <input type="email" id="email" name="email" placeholder="Votre email" required>
        </div>
        <div style="flex: 0 0 100%;">
            <textarea id="message" name="message" placeholder="Votre message" required></textarea>
        </div>
        <div style="flex: 0 0 100%; text-align: center;">
            <button type="submit">Envoyer</button>
        </div>
    </form>
</div>
    <?php include('../php/footer.php'); ?>

</body>
</html>
