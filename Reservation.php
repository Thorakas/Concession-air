<?php
// Inclusion du fichier de configuration
include 'config.php';

// Vérification de la session utilisateur
session_start();
if (!isset($_SESSION['user'])) {
    // Si l'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
    header("Location: Connexion.php");
    exit();
}

// Récupération de l'ID de l'utilisateur connecté
$user = $_SESSION['user'];

// Sélection des véhicules réservés par l'utilisateur connecté
$query = $bdd->prepare("SELECT v.marque, v.modele FROM voiture vINNER JOIN achat a ON v.id = a.id_vehicule WHERE a.email_utilisateur = ?");
$query->execute(array($user));
$reservations = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservations</title>
    <link rel="stylesheet" href="Styles.css">
</head>

<body>
    <header>
        <?php include 'Menu.php'; ?>
    </header>
    <div class="Body_Reservations">
        <h1>Véhicules réservés</h1>
        <?php if (count($reservations) > 0) : ?>
            <table>
                <tr>
                    <th>Marque</th>
                    <th>Modèle</th>
                    <th>Année</th>
                </tr>
                <?php foreach ($reservations as $reservation) : ?>
                    <tr>
                        <td><?php echo $reservation['marque']; ?></td>
                        <td><?php echo $reservation['modele']; ?></td>
                        <td><?php echo $reservation['annee']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <p>Aucun véhicule réservé.</p>
        <?php endif; ?>
    </div>
</body>

</html>