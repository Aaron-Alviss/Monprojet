<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connexion à la base de données
$host = "localhost";
$user = "root"; // à adapter si besoin
$password = ""; // à adapter si besoin
$dbname = "test_db"; // ta nouvelle base

$conn = new mysqli($host, $user, $password, $dbname);

// Vérifie la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Récupérer les données du formulaire
$nom = htmlspecialchars($_POST['nom']);
$email = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);

// Préparer et exécuter la requête
$sql = "INSERT INTO messages (nom, email, message, date_envoi) VALUES (?, ?, ?, NOW())";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Erreur de préparation : " . $conn->error);
}

$stmt->bind_param("sss", $nom, $email, $message);

if ($stmt->execute()) {
    echo "Message envoyé avec succès.";
} else {
    echo "Erreur lors de l'envoi : " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
