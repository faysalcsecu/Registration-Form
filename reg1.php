<?php
include("database.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: darkslateblue;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h2>Welcome to Youtube</h2>
            <label for="">Username:</label> <br>
            <input type="text" name="username"><br>
            <label for="">Password:</label> <br>
            <input type="password" name="password"><br>
            <input type="submit" name="submit" value="register"><br>
        </form>
        <div class="message-box">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
                $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
                if (empty($username)) {
                    echo "<div class='error'>Please enter a username</div>";
                } else if (empty($password)) {
                    echo "<div class='error'>Please enter a password</div>";
                } else {
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hash')";
                    try {
                        if (mysqli_query($conn, $sql)) {
                            echo "<div class='success'>You are now registered!</div>";
                        } else {
                            echo "<div class='error'>Could not register user</div>";
                        }
                    } catch (mysqli_sql_exception $e) {
                        echo "<div class='error'>Error: " . $e->getMessage() . "</div>";
                    }
                }
            }
            mysqli_close($conn);
            ?>
        </div>
    </div>
</body>

</html>