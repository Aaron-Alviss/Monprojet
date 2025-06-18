<?php
// insert_user.php
$conn = new mysqli("localhost", "root", "", "test_db");

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de connexion : " . $conn->connect_error);
}

// Hasher le mot de passe
$password = password_hash("1234", PASSWORD_DEFAULT);

// Insertion de l'utilisateur admin
$conn->query("INSERT INTO users (username, password) VALUES ('admin', '$password')");

echo "Utilisateur ajouté.";
?>
