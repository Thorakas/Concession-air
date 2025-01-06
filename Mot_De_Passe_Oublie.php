<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

  <div class="container py-5 h-100 ">
    <div class="row d-flex justify-content-center align-items-center h-100 ">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5 ">
        <div class="card bg-secondary text-light " style="border-radius: 1rem;">
          <div class="card-body p-5 text-center ">

            <div class="mb-md-2 mt-md-4 pb-5 ">

              <h3 class="fw-bold mb-2 text-uppercase mb-5 ">mot de passe oublié ?</h3>
              <p>Vous avez oublié votre mot de passe ? Modifier le en entrant votre adresse mail</p>

              <div class="form-outline form-white mb-5">
                <input type="email" class="form-control form-control-lg txt_placeholder" placeholder="Votre E-mail" />

              </div>


              <button class="btn btn-outline-light btn-lg px-5" type="submit">Modifier</button>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
<?php

if (isset($_POST['email'])) {
  $password = uniqid();
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  $subject = 'Mot de passe oublié';
  $message = "Bonjour, voici votre nouveau mot de passe : $password";
  $headers = 'Content-Type: text/plain; charset="UTF-8"';

  if (mail($_POST['email'], $subject, $message, $headers)) {
    $stmt = $db->prepare("UPDATE users SET password = ? WHERE email = ?");
    $stmt->execute([$hashedPassword, $_POST['email']]);
    echo "E-mail envoyé";
  } else {
    echo "Une erreur est survenue";
  }
}
