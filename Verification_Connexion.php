<?php
session_start();
require_once 'config.php';








if (isset($_POST['email']) && isset($_POST['password'])) {
    // Patch XSS        
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    $email = strtolower($email); // email transformé en minuscule

    // On regarde si l'utilisateur est inscrit dans la table utilisateurs
    $check = $bdd->prepare('SELECT nom, password, email, prenom FROM utilisateur WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();




    if ($row > 0) {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            if (password_verify($password, $data['password'])) {

                $_SESSION['user'] = $data['prenom'];
                header('Location: Accueil.php?login_success=1');
                die();
            } else {
                header('Location: Connexion.php?login_err=password');
                die();
            }
        } else {
            header('Location: Connexion.php?login_err=email');
            die();
        }
    } else {
        header('Location: Connexion.php?login_err=not_found');
        die();
    }
} else {
    header('Location: Connexion.php');
    die();
} // si le formulaire est envoyé sans aucune données
