<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Intervenant</title>
    <style>
        /* Styles pour la page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            padding: 10px;
            background-color: #800080; /* Purple header background */
            color: #FFFFFF; /* White header text */
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; /* Light grey for even rows */
        }

        .en-cours {
            color: green; /* Green text for 'En cours' status */
        }

        .en-attente {
            color: red; /* Red text for 'En attente' status */
        }

        /* Ajout de couleurs bleu et jaune */
        .bleu {
            color: blue;
        }

        .jaune {
            color: yellow;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Espace Intervenant</h1>
    <table border="1">
        <thead>
        <tr>
            <th>Identifiant</th>
            <th>Date</th>
            <th>Client</th>
            <th>Statut</th>
            <th>Type d'intervention</th>
            <th>Adresse</th>
            <th>Code Postal</th>
            <th>Numero Tel</th>
            <th>Degré d'urgence</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Connexion à la base de données
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dataweb";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Préparation de la requête SQL
        $sql = "SELECT Identifiant, date, client, statut, `type d'intervention`, adresse, `code postal`, `numero tel`, `degré d'urgence` FROM intervention";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $statut_class = $row['statut'] === 'En cours' ? 'en-cours' : 'en-attente';
                echo '<tr>';
                echo '<td>' . $row['Identifiant'] . '</td>';
                echo '<td>' . $row['date'] . '</td>';
                echo '<td>' . $row['client'] . '</td>';
                echo '<td class="' . $statut_class . '">' . $row['statut'] . '</td>';
                echo '<td>' . $row['type d\'intervention'] . '</td>';
                echo '<td>' . $row['adresse'] . '</td>';
                echo '<td>' . $row['code postal'] . '</td>';
                echo '<td class="bleu">' . $row['numero tel'] . '</td>'; // Appliquer la couleur bleue au numéro de téléphone
                echo '<td class="jaune">' . $row['degré d\'urgence'] . '</td>'; // Appliquer la couleur jaune au degré d'urgence
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="9">Aucune donnée trouvée</td></tr>';
        }

        $conn->close();
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
