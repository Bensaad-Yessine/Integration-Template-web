<?php
require_once '../Controller/UserController.php';

$userController = new UserController();
$error_message = "";
$success_message = "";

// Vérifier si l'ID de l'utilisateur est passé dans l'URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id = $_GET['id'];

    // Récupérer l'utilisateur pour vérifier s'il existe
    $user = $userController->getUserById($user_id);

    if ($user) {
        // Traitement de la suppression
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delete_user'])) {
            // Supprimer l'utilisateur
            $deleteStatus = $userController->deleteUser($user_id);

            if ($deleteStatus) {
                $success_message = "✅ Utilisateur supprimé avec succès !";
                header("Location: listUsers.php"); // Rediriger après la suppression
                exit();
            } else {
                $error_message = "❌ La suppression a échoué.";
            }
        }
    } else {
        $error_message = "❌ Utilisateur introuvable.";
    }
} else {
    $error_message = "❌ ID utilisateur manquant ou invalide.";
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer l'utilisateur</title>
    <style>
        /* Add your styles here */
    </style>
</head>
<body>
    <div class="container">
        <h1>Supprimer l'utilisateur</h1>

        <?php if (!empty($error_message)): ?>
            <p class="message error"><?php echo $error_message; ?></p>
        <?php elseif (!empty($success_message)): ?>
            <p class="message success"><?php echo $success_message; ?></p>
        <?php endif; ?>

        <?php if (isset($user)): ?>
            <form action="deleteUser.php?id=<?php echo htmlspecialchars($user_id); ?>" method="POST">
                <p>Êtes-vous sûr de vouloir supprimer cet utilisateur ?</p>
                <button type="submit" name="delete_user">Supprimer</button>
            </form>
        <?php else: ?>
            <p>Utilisateur introuvable.</p>
        <?php endif; ?>
    </div>
</body>
</html>
