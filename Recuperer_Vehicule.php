<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Véhicule</title>
    <link rel="stylesheet" href="Styles.css">
</head>

<body>
    <header>
        <?php include 'Menu.php'; ?>
    </header>
    <div class="Container_Body">
        <div class="container_vehicule">
            <?php
            /* requete qui va chercher les vehicule présent dans une concession précise*/
            if (isset($_POST['id_concession'])) {
                $idConcession = $_POST['id_concession'];
                $query = "SELECT * FROM voiture WHERE id_concession = :id_concession";
                $stmt = $bdd->prepare($query);
                $stmt->bindParam(':id_concession', $idConcession, PDO::PARAM_INT);
                $stmt->execute();



                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='vehicule'>";
                    echo "<img src='image_vehicule/" . $row['nom_image'] . ".jpg'  alt='" . $row['marque'] . " " . $row['modele'] . "' class='img_vehicule'>";
                    echo "<div class='info_vehicule'>";
                    echo "<h3>" . $row['marque'] . " " . $row['modele'] . "</h3>";
                    echo "<p><strong>Type de boîte de vitesse:</strong> " . $row['boite'] .
                        "<br><strong>Nombre de portes:</strong> " . $row['porte'] .
                        "<br><strong>Nombre de places:</strong> " . $row['place'] .
                        "<br><strong>Type de carburant:</strong> " . $row['carburant'] .
                        "<br><strong>Prix :</strong> " . $row['prix'] . " € </p>";
                    echo "</div>";
                    echo "<form action='Achat.php' method='post'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "<button type='submit' name='submit' class='btn-reservation'>Reserver ce véhicule</button>";
                    echo "</form>";
                    echo "</div>";
                }
            } else {

                echo "Identifiant de concession non spécifié.";
            }

            ?>
        </div>
    </div>
    <footer>
        <?php include 'Pied_De_Page.php'; ?>
    </footer>
</body>

</html>