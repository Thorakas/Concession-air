<?php include 'config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concession'air</title>
    <link rel="stylesheet" href="Styles.css">
</head>

<body>
    <header> <!-- Verifie si l'utilisateur s'est connecté et affiche un message-->
        <?php if (isset($_GET['login_success'])) : ?>
            <div class="Alert_Connexion">
                ✅ Connexion réussie ! Bienvenue, <?= htmlspecialchars($_SESSION['user']); ?> 👋
            </div>
            <script>
                setTimeout(() => {
                    document.querySelector(".Alert_Connexion").style.display = "none";
                }, 4000); // Disparition après 4 secondes
            </script>
        <?php endif; ?>
        <?php require 'Menu.php'; ?>
    </header>


    <div class="Container_Body">
        <h2>Bienvenue chez Concession'air - Le choix confiant pour votre prochain véhicule</h2>
        <p class="Container_Body_P">Chez Concession'air, nous sommes fiers de vous offrir une expérience automobile exceptionnelle, alliant expertise, qualité et service personnalisé. Que vous recherchiez une voiture neuve ou d'occasion, notre équipe dévouée est là pour vous accompagner à chaque étape de votre achat. Découvrez notre vaste sélection de véhicules de différentes marques et modèles, soigneusement sélectionnés pour répondre à tous les besoins et tous les budgets. De la compacte citadine à la luxueuse berline, en passant par les SUV spacieux et les élégantes voitures de sport, nous avons ce qu'il vous faut pour rouler avec style et confort.</p>
        <p class="Container_Body_P">Concession'air, votre satisfaction est notre priorité absolue.Venez nous rendre visite dans nos concessions et laissez-nous vous aider à trouver le véhicule de vos rêves. Que ce soit pour une nouvelle voiture familiale, un véhicule professionnel ou tout simplement pour le plaisir de conduire, nous sommes là pour vous offrir la meilleure expérience automobile possible.Faites confiance à Concession'air pour vous accompagner dans votre prochaine aventure sur la route. Nous sommes impatients de vous accueillir et de vous faire découvrir tout ce que nous avons à vous offrir.</p>
        <p class="Container_Body_P">Les réservations sur le site visent à pré-remplir les informations nécessaires à l'achat du véhicule, qui se conclura directement en concession</p>
        <div class="container_body_image">
            <img src="image_concession/concession_citroen.jpg">
        </div>
    </div>


    <footer>
        <?php include 'Pied_De_Page.php'; ?>
    </footer>
</body>

</html>