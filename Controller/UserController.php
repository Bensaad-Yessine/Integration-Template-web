<?php
require '../Config.php';

class UserController
{

  public function getUsers()
  {
    $db = config::getConnexion();
    $sql = "SELECT * FROM user";
    try {

      $query = $db->prepare($sql);
      $query->execute();
      return $query->fetchAll();
    } catch (Exception $e) {
      die('Erreur: ' . $e->getMessage());
    }
  }

  function addUser($user)
  {
    try {
      $db = config::getConnexion();
      $req = "INSERT INTO user (email, pwd) VALUES (:email, :pwd)";
      $query = $db->prepare($req);

      // Using bindValue() to explicitly bind values
      $query->bindValue(':email', $user['email'], PDO::PARAM_STR);
      $query->bindValue(':pwd', $user['pwd'], PDO::PARAM_STR);

      $query->execute();

      if ($query->rowCount() > 0) {
        echo "User added successfully!";
      } else {
        echo "Insertion failed: No rows affected.";
      }
    } catch (PDOException $e) {
      echo 'Database Error: ' . $e->getMessage();
    }
  }


  public function deleteUser($id) {
    try {
        $db = config::getConnexion();
        $sql = "DELETE FROM user WHERE id = ?";
        $query = $db->prepare($sql);
        $query->execute([$id]);  // Execute the query with the user ID

        return true; // Successfully deleted
    } catch (PDOException $e) {
        return false; // Return false if there was an error
    }
}

public function updateUser($id, $email, $password) {
    try {
        $db = config::getConnexion();
        $sql = "UPDATE user SET email = ?, pwd = ? WHERE id = ?";
        $query = $db->prepare($sql);

        // Debugging: Display values before executing
        echo "<pre>";
        echo "SQL Query: " . $sql . "\n";
        echo "Parameters: ";
        print_r([$email, $password, $id]);
        echo "</pre>";

        $query->execute([$email, $password, $id]);  // ✅ Correct order

        echo "✅ Update executed successfully!";
        
    } catch (PDOException $e) {
        echo "❌ Erreur: " . $e->getMessage();
    }
}


  public function getUserById($id) {
    try {
        $sql = "SELECT * FROM user WHERE id = ?";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->execute([$id]);

        // Fetch and return the user data
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null; // Return null if no user is found
        }

        return $user;
    } catch (PDOException $e) {
        die("Erreur: " . $e->getMessage());
    }
}

}
