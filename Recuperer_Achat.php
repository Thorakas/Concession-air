<?php include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idVehicule = $_POST['id_vehicule'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];



    $query = "INSERT INTO achat (id_vehicule, nom, prenom, age) VALUES (:idVehicule, :nom, :prenom, :age)";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':idVehicule', $idVehicule);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':age', $age);
    if ($stmt->execute()) {

        echo "Les données ont été enregistrées avec succès ! Vous allez être redirigé dans quelques instants...";

        // Redirection vers une autre page après quelques secondes
        header("refresh:5;url=Accueil.php");
        exit();
    } else {

        echo "Une erreur s'est produite lors de l'enregistrement des données.";
    }
} else {

    echo "Erreur : méthode de requête incorrecte.";
}
