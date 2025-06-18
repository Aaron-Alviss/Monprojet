<?php
// liste_inscriptions.php

// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "ecole_db");

// Vérification
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Requête pour récupérer les élèves inscrits
$sql = "SELECT * FROM eleves ORDER BY date_inscription DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Inscriptions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        table {
            border-collapse: collapse;
            width: 90%;
            margin: auto;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<h2>📋 Liste des élèves inscrits</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Téléphone</th>
        <th>Niveau</th>
        <th>Date d'inscription</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        // Afficher chaque élève
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . htmlspecialchars($row["nom"]) . "</td>
                    <td>" . htmlspecialchars($row["prenom"]) . "</td>
                    <td>" . htmlspecialchars($row["email"]) . "</td>
                    <td>" . htmlspecialchars($row["telephone"]) . "</td>
                    <td>" . htmlspecialchars($row["niveau"]) . "</td>
                    <td>" . $row["date_inscription"] . "</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>Aucune inscription trouvée.</td></tr>";
    }

    $conn->close();
    ?>
</table>

</body>
</html>
