<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mot de passe oublié</title>
  <link rel="stylesheet" href="Styles.css">
</head>

<body>

  <div class="Container_Body_Connexion">
    <form action="Mot_De_Passe_Oublie-traitement.php" method="post" class="container-form">
      <h3 class="form-title">Mot de passe oublié ?</h3>
      <p>Entrez votre adresse e-mail pour réinitialiser votre mot de passe.</p>

      <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Votre adresse e-mail" required>
      </div>

      <button type="submit" class="btn-submit">Réinitialiser mon mot de passe</button>
    </form>
  </div>

</body>

</html>