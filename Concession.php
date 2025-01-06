<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Styles.css">
</head>

<body>
    <header>
        <?php include 'Menu.php'; ?>
    </header>
    <div class="Container_Body">
        <div class="container_concession">
            <?php
            $query = "SELECT * FROM concession";
            $stmt = $bdd->query($query);


            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='concession'>";
                echo "<img src='image_concession/" . $row['nom_image'] . ".jpg'  alt='" . $row['Nom'] . " " . $row['Adresse'] . "' class='img_concession'>";
                echo "<div class='info_concession'>";
                echo "<h3>" . $row['Nom'] . " " . $row['Adresse'] . "</h3>";
                echo "<p><strong>Adresse:</strong> " . $row['Adresse'] .
                    "</p>";
                echo "</div>";
                echo "<form action='Recuperer_Vehicule.php' method='post'>";
                echo "<input type='hidden' name='id_concession' value='" . $row['id'] . "'>";
                echo "<button type='submit' name='voir_vehicules'>Voir les véhicules</button>";
                echo "</form>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>

</html>