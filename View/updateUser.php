<?php
require_once '../Controller/UserController.php';

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$userController = new UserController();
$user = null; // Initialize user variable

// Fetch user details for editing
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user = $userController->getUserById($_GET['id']);

    if (!$user) {
        die("❌ Utilisateur non trouvé !");
    }
} else {
    die("❌ ID utilisateur invalide !");
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $password = $_POST['pwd']; // Hash the password

    if (!empty($id) && !empty($email) && !empty($password)) {
        $userController->updateUser($id, $email, $password);
        header("Location: ListUsers.php");
        exit();
    } else {
        echo "<p style='color:red;'>❌ Tous les champs sont obligatoires !</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'utilisateur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            text-align: center;
        }
        form {
            display: inline-block;
            text-align: left;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        input, button {
            display: block;
            width: 100%;
            margin-top: 10px;
            padding: 10px;
        }
    </style>
</head>
<body>

    <h2>Modifier l'utilisateur</h2>
    
    <form action="updateUser.php?id=<?php echo htmlspecialchars($user['id']); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
        
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        
        <label>Mot de passe:</label>
        <input type="password" name="pwd" value="<?php echo htmlspecialchars($user['pwd']); ?>" required>
        
        <button type="submit" name="update">Mettre à jour</button>
    </form>

</body>
</html>