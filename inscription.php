<?php
// inscription.php

// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "ecole_db");

// Vérification de la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base : " . $conn->connect_error);
}

// Récupération des données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$niveau = $_POST['niveau'];

// Préparation de la requête SQL pour insérer les données
$stmt = $conn->prepare("INSERT INTO eleves (nom, prenom, email, telephone, niveau) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nom, $prenom, $email, $telephone, $niveau);

if ($stmt->execute()) {
    echo "✅ Inscription réussie ! Bienvenue, $prenom $nom !";
} else {
    echo "❌ Erreur lors de l'inscription : " . $stmt->error;
}

// Fermeture
$stmt->close();
$conn->close();
?>
