<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
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
        <!-- Form for updating data -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h2>Update User</h2>
            <label for="update_username">Username:</label><br>
            <input type="text" name="update_username"><br>
            <label for="new_password">New Password:</label><br>
            <input type="password" name="new_password"><br>
            <input type="submit" name="update_submit" value="Update"><br>
        </form>

        <!-- PHP code for handling update operation -->
        <?php
        // Include database connection
        include("database.php");

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_submit"])) {
            $update_username = filter_input(INPUT_POST, "update_username", FILTER_SANITIZE_SPECIAL_CHARS);
            $new_password = filter_input(INPUT_POST, "new_password", FILTER_SANITIZE_SPECIAL_CHARS);

            if (empty($update_username)) {
                echo "<div class='error'>Please enter a username to update</div>";
            } else if (empty($new_password)) {
                echo "<div class='error'>Please enter a new password</div>";
            } else {
                // Update password in the database
                $hash = password_hash($new_password, PASSWORD_DEFAULT);
                $update_sql = "UPDATE users SET password='$hash' WHERE username='$update_username'";
                try {
                    if (mysqli_query($conn, $update_sql)) {
                        echo "<div class='success'>Password updated successfully!</div>";
                    } else {
                        echo "<div class='error'>Could not update password</div>";
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