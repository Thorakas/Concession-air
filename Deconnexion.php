<?php
session_start();
session_destroy(); // Supprime toutes les variables de session
header('Location: Accueil.php');
exit();
