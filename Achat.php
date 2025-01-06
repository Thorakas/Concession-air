<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achat du véhicule</title>
    <link rel="stylesheet" href="Styles.css">
</head>

<body>
    <header>
        <?php include 'Menu.php'; ?>
    </header>
    <?php
    // Vérifier si une session utilisateur est active
    session_start();
    if (isset($_SESSION['user'])) {
        // Si un utilisateur est connecté, récupérez ses informations
        $user = $_SESSION['user'];
        $query = $bdd->prepare('SELECT nom, prenom FROM utilisateur WHERE email = ?');
        $query->execute(array($user));
        $userData = $query->fetch();
        $nom = $userData['nom'];
        $prenom = $userData['prenom'];
    } else {
        // Si aucun utilisateur n'est connecté, laissez les champs vides
        $nom = "";
        $prenom = "";
    }


    if (isset($_POST['id'])) {
        $idVehicule = $_POST['id'];
    ?>
        <div class="Body_Achat">
            <div class="Container_Achat">
                <!-- Formulaire pour collecter les informations d'achat -->
                <form action="Recuperer_Achat.php" method="post">
                    <input type="hidden" name="id_vehicule" value="<?php echo $idVehicule; ?>">
                    <!-- Champs pour le nom et le prénom -->
                    <div>
                        <label for="nom">Nom* :</label>
                        <input type="text" id="nom" name="nom" required>
                    </div>
                    <br>
                    <div>
                        <label for="prenom">Prénom* :</label>
                        <input type="text" id="prenom" name="prenom" required>
                    </div>
                    <br>
                    <div>
                        <label for="age">Date de naissance* :</label>
                        <input type="date" id="age" name="age" max="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                    <br>
                    <div>
                        <label for="document_pdf">Photocopie pièce d'identité au format PDF* :</label>
                        <input type="file" id="document_pdf_identite" name="document_pdf" accept=".pdf" required>
                    </div>
                    <br>
                    <div>
                        <label for="document_pdf">Photocopie attestation d'assurance au format PDF (optionnel):</label>
                        <input type="file" id="document_pdf_assurance" name="document_pdf" accept=".pdf">
                    </div>
                    <br>
                    <!-- Ajoutez ici les autres champs nécessaires pour collecter les informations d'achat -->
                    <button type="submit" class="btn-achat">Acheter</button>
                </form>
            <?php
        } else {
            // Si l'identifiant du véhicule n'est pas défini dans l'URL, afficher un message d'erreur
            echo "<p>Identifiant du véhicule non spécifié.</p>";
        }
            ?>
            </div>
        </div>
</body>

</html>