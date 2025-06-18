<?php
// login.php

// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "test_db");

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Récupération des données du formulaire
$username = $_POST['username'];
$password = $_POST['password'];

// Préparer et exécuter la requête
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        // Redirection vers la page d'accueil
        header("Location: Accueil.html");
        exit();
    } else {
        echo "❌ Mot de passe incorrect.";
    }
} else {
    echo "❌ Utilisateur non trouvé.";
}

$stmt->close();
$conn->close();
?>
