<?php
require_once 'config.php'; // Assurez-vous que votre connexion à la BDD est bien incluse

if (isset($_POST['email'])) {
    $email = htmlspecialchars($_POST['email']);

    // Vérifie si l'email existe en BDD
    $stmt = $bdd->prepare("SELECT * FROM utilisateur WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        // Génération d'un nouveau mot de passe sécurisé
        $newPassword = bin2hex(random_bytes(6)); // 12 caractères hexadécimaux
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Mise à jour du mot de passe en BDD
        $updateStmt = $bdd->prepare("UPDATE utilisateur SET password = ? WHERE email = ?");
        $updateStmt->execute([$hashedPassword, $email]);

        // Envoi du mail avec le nouveau mot de passe
        $subject = 'Réinitialisation de votre mot de passe';
        $message = "Bonjour,\n\nVotre nouveau mot de passe est : $newPassword\n\nPensez à le modifier dès votre connexion.";
        $headers = "From: noreply@concessionair.com\r\nContent-Type: text/plain; charset=UTF-8";


        if (mail($email, $subject, $message, $headers)) {
            // Redirection avec message de succès
            header('Location: Connexion.php?Alert_reset=1');
            exit();
        } else {
            header('Location: Mot_De_Passe_Oublie.php?error=email_failed');
            exit();
        }
    } else {
        header('Location: Mot_De_Passe_Oublie.php?error=email_not_found');
        exit();
    }
} else {
    header('Location: Mot_De_Passe_Oublie.php');
    exit();
}
