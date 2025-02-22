<?php include 'config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion</title>
  <link rel="stylesheet" href="Styles.css">
</head>


<header>
  <?php if (isset($_GET['reg_success'])) : ?>
    <div class="Alert_Inscription">
      ✅ Inscription réussie !
    </div>
    <script>
      setTimeout(() => {
        document.querySelector(".Alert_Inscription").style.display = "none";
      }, 4000); // Disparition après 4 secondes
    </script>
  <?php endif; ?>


  <?php if (isset($_GET['Alert_reset'])) : ?>
    <div class="Alert_Reset">
      ✅ Mot de passe réinitialisé avec succès ! Vérifiez votre e-mail.
    </div>
    <script>
      setTimeout(() => {
        document.querySelector(".Alert_Reset").style.display = "none";
      }, 4000);
    </script>
  <?php endif; ?>


</header>


<body>
  <!-- id: test@test.fr     mdp: test -->
  <div class="Container_Body_Connexion">
    <?php
    if (isset($_GET['login_err'])) {
      $err = htmlspecialchars($_GET['login_err']);

      switch ($err) {
        case 'password':
    ?>
          <div class="alert alert-danger">
            <strong>Erreur :</strong> mot de passe incorrect
          </div>
        <?php
          break;

        case 'email':
        ?>
          <div class="alert alert-danger">
            <strong>Erreur :</strong> email incorrect
          </div>
        <?php
          break;

        case 'not_found':
        ?>
          <div>
            <strong>Erreur :</strong> compte inexistant
          </div>
    <?php
          break;
      }
    }
    ?>

    <form action="Verification_Connexion.php" method="post" class="container-form">
      <h2 class="form-title">Connectez-vous</h2>
      <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Adresse e-mail" required />
      </div>
      <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Mot de passe" required />
      </div>
      <p class="small"><a href="Mot_De_Passe_Oublie.php">Mot de passe oublié ?</a></p>
      <input type="submit" class="btn-submit" value="Connexion">
      <p>Pas encore inscrit ? <a href="inscription.php">Inscrivez-vous</a></p>
    </form>
  </div>
</body>

</html>