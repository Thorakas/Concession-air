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
    <div class="Container_Body_Connexion">
        <?php
        if (isset($_GET['reg_err'])) {
            $err = htmlspecialchars($_GET['reg_err']);

            switch ($err) {
                case 'success':
        ?>
                    <div class="alert alert-success">
                        <strong>Succès</strong> inscription réussie !
                    </div>
                <?php
                    break;

                case 'password':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> mot de passe différent
                    </div>
                <?php
                    break;

                case 'email':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> email non valide
                    </div>
                <?php
                    break;

                case 'email_length':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> email trop long
                    </div>
                <?php
                    break;

                case 'pseudo_length':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> pseudo trop long
                    </div>
                <?php
                case 'already':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> compte deja existant
                    </div>
        <?php
            }
        }
        ?>



        <form action="Inscription_Traitement.php" method="post" class="container-form">
            <h2 class="form-title ">Inscription</h2>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="E-mail" required />
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required />
            </div>
            <div class="form-group">
                <input type="password" name="password_retype" class="form-control" placeholder="Re-taper le mot de passe" required />
            </div>
            <div class="form-group">
                <input type="text" name="nom" class="form-control" placeholder="Nom" required />
            </div>
            <div class="form-group">
                <input type="text" name="prenom" class="form-control" placeholder="Prenom" required />

            </div>


            <button class="btn-submit" type="submit">S'inscrire</button>






        </form>

    </div>
</body>

</html>