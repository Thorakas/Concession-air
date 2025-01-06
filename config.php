<?php
try {
    $bdd = new PDO("mysql:host=localhost;dbname=concession_air;", "root", "");
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
