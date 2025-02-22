<?php require_once 'config.php';

// Verifie que les variables existent et qu'elles ne sont pas vides
if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype']) && !empty($_POST['prenom']) && !empty($_POST['nom'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);



    $check = $bdd->prepare('SELECT email FROM utilisateur WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    $email = strtolower($email);

    if ($row == 0) {
        if (strlen($email) <= 100) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if ($password == $password_retype) {


                    $cost = ['cost' => 12];
                    $password = password_hash($password, PASSWORD_BCRYPT, $cost);

                    // On insère dans la base de données
                    $insert = $bdd->prepare('INSERT INTO utilisateur(nom, prenom, email, password) VALUES(:nom, :prenom, :email, :password)');
                    $insert->execute(array(
                        'nom' => $nom,
                        'password' => $password,
                        'email' => $email,
                        'prenom' => $prenom
                    ));

                    header('Location:Connexion.php?reg_success=1');
                    die();
                } else {
                    header('Location: inscription.php?reg_err=password');
                    die();
                }
            } else {
                header('Location: inscription.php?reg_err=email');
                die();
            }
        } else {
            header('Location: inscription.php?reg_err=email_length');
            die();
        }
    } else {
        header('Location: inscription.php?reg_err=already');
        die();
    }
}
