<?php
$conn = new mysqli("localhost", "root", "", "test_db");

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

$username = "paul";
$password = password_hash("1234", PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

echo "✅ Utilisateur ajouté avec succès.";

$stmt->close();
$conn->close();
?>
