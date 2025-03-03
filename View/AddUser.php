<?php
require_once '../Controller/UserController.php';  

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $pwd = $_POST['pwd'];

    if ($email && $pwd) {
        // Hash the password
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        // Create user array
        $user = [
            'email' => $email,
            'pwd' => $hashedPwd
        ];

        // Add user to the database
        $controller = new UserController();
        $controller->addUser($user);

        // Display success message
        $message = "<p class='success-message'>User added successfully!</p>";
    } else {
        // Display error message if input is invalid
        $message = "<p class='error-message'>Invalid input. Please check your data.</p>";
    }
} else {
    // Display nothing if the form hasn't been submitted
       $message = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <style>
        /* Resetting default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body and layout styles */
        body {
            font-family: 'Arial', sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container for the form */
        .form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        /* Heading styles */
        h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: 600;
        }

        /* Label styles */
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
            text-align: left;
        }

        /* Input fields styles */
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s ease;
            background-color: #fafafa;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #4CAF50;
            outline: none;
            background-color: #fff;
        }

        /* Button styles */
        button[type="submit"] {
            width: 100%;
            padding: 14px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Message styles */
        .message {
            margin-top: 20px;
            font-size: 16px;
        }

        .success-message {
            color: #4CAF50;
        }

        .error-message {
            color: #f44336;
        }

        /* Responsive Design */
        @media (max-width: 500px) {
            .form-container {
                padding: 20px;
                width: 90%;
            }

            h2 {
                font-size: 20px;
            }

            input[type="email"],
            input[type="password"] {
                padding: 10px;
                font-size: 14px;
            }

            button[type="submit"] {
                padding: 12px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add New User</h2>
        
        <?php
        // Display success or error message if available
        if (!empty($message)) {
            echo $message;
        }
        ?>

        <form action="AddUser.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="pwd">Password:</label>
            <input type="password" id="pwd" name="pwd" required>

            <button type="submit">Add User</button>
        </form>
    </div>
</body>
</html>
