<!DOCTYPE html>
<html lang="en">

<!-- ... (head and styles) ... -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: blanchedalmond;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label,
        input {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: calc(100% - 22px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 8px 12px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            margin-bottom: 10px;
            text-align: center;
        }

        .success {
            color: green;
            margin-bottom: 10px;
            text-align: center;
        }

        .message-box {
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>


<body>
    <div class="container">
        <!-- Form for deleting data -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h2>Delete User</h2>
            <label for="delete_username">Username:</label><br>
            <input type="text" name="delete_username"><br>
            <input type="submit" name="delete_submit" value="Delete"><br>
        </form>

        <!-- PHP code for handling delete operation -->
        <?php
        // Include database connection
        include("database.php");

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_submit"])) {
            $delete_username = filter_input(INPUT_POST, "delete_username", FILTER_SANITIZE_SPECIAL_CHARS);

            if (empty($delete_username)) {
                echo "<div class='error'>Please enter a username to delete</div>";
            } else {
                // Perform deletion from the database
                $delete_sql = "DELETE FROM users WHERE username='$delete_username'";
                try {
                    if (mysqli_query($conn, $delete_sql)) {
                        echo "<div class='success'>User data deleted successfully!</div>";
                    } else {
                        echo "<div class='error'>Could not delete user data</div>";
                    }
                } catch (mysqli_sql_exception $e) {
                    echo "<div class='error'>Error: " . $e->getMessage() . "</div>";
                }
            }
        }
        mysqli_close($conn);
        ?>
    </div>
</body>

</html>