<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Site Web</title>
    <link rel="stylesheet" href="Styles.css">
</head>

<body>
    <header>
        <div class="Container_Menu">
            <img src="Logo_concession'air.jpg" alt="Logo concession'air" id="Logo">
            <p>Concession'air</p>
            <nav>
                <ul id="Liste_Menu">
                    <li><a href="Accueil.php">Accueil</a></li>
                    <li><a href="Vehicule.php">Tout nos véhicules</a></li>
                    <li><a href="Concession.php">Nos concessions</a></li>
                    <li><a href="Reservation.php">Mes reservations</a></li>
                    <?php if (isset($_SESSION['user'])) : ?>
                        <li>Bienvenue, <strong><?= htmlspecialchars($_SESSION['user']); ?></strong></li>
                        <li><a href="Deconnexion.php">Déconnexion</a></li>
                    <?php else : ?>
                        <li><a href="Connexion.php">Connexion</a></li>
                    <?php endif; ?>
                    <li><a href="Test_Instagram.php">test</a></li>
                </ul>
            </nav>
        </div>
    </header>











</body>

</html>