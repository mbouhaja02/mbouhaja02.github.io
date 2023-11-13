<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Query Tester</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        #container {
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        #result {
            margin-top: 20px;
            border: 1px solid #ccc;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div id="container">
        <h2>SQL Query Tester</h2>
        <form method="post" action="">
            <label for="query">Enter your SQL query:</label>
            <textarea id="query" name="query" rows="4" required></textarea>

            <button type="submit">Run Query</button>
        </form>

        <?php
        // Check if form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the submitted query
            $query = $_POST['query'];

            // Replace this with your database connection details
            $servername = "localhost";
            $username = "user";
            $password = "death@**@";
            $dbname = "mydata";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Run the query
            $result = $conn->query($query);

            // Display the result
            if ($result) {
                echo '<div id="result"><h3>Query Result:</h3>';
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                foreach ($rows as $row) {
                    echo '<pre>' . print_r($row, true) . '</pre>';
                }
                echo '</div>';
            } else {
                echo '<div id="result"><h3>Error:</h3>';
                echo '<p>' . $conn->error . '</p>';
                echo '</div>';
            }

            // Close connection
            $conn->close();
        }
        ?>
    </div>
</body>
</html>
