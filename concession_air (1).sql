-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 12 juin 2025 à 23:39
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `concession_air`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

CREATE TABLE `achat` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `age` date NOT NULL,
  `id_vehicule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `achat`
--

INSERT INTO `achat` (`id`, `nom`, `prenom`, `age`, `id_vehicule`) VALUES
(1, '0', '0', '2000-01-27', 2),
(2, 'pedrosa', 'david', '2000-01-27', 1),
(3, 'perdrosa', 'dadavid', '2024-04-03', 3),
(4, 'zdzdz', 'zdssd', '2024-04-04', 4),
(5, 'Orsini', 'Chloé', '1980-06-27', 1),
(6, 'test', 'test', '2025-01-02', 1),
(7, 'test', 'test', '2025-02-04', 1),
(8, 'dsds', 'dsdsd', '2025-06-03', 1);

-- --------------------------------------------------------

--
-- Structure de la table `concession`
--

CREATE TABLE `concession` (
  `id` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Adresse` varchar(100) NOT NULL,
  `nom_image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `concession`
--

INSERT INTO `concession` (`id`, `Nom`, `Adresse`, `nom_image`) VALUES
(1, 'concession Citroen', '25 avenue de la libération 75006 Paris', 'concession_citroen'),
(2, 'concession DS', '41 boulevard de paris 13002 Marseille', 'concession_ds'),
(3, 'concession Peugeot', '48 rue de Madrid 33000 Bordeaux', 'concession_peugeot'),
(4, 'concession Renault', '30 boulevard Louis XIV 59800 Lille', 'concession_Renault');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` int(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `telephone`, `password`) VALUES
(1, 'test', 'test', 'test@test.fr', NULL, '$2y$10$8FcmDcSupstdoU7mhKcNc.ei/kzLzO8lqMuNyIP.JCJBcjkMbsxfm'),
(2, 'test2', 'test2', 'test2@test.fr', NULL, '$2y$12$sH1tXw6a.F7RLWJveL.wge4QVYbLbAJw.Ob0Lhxh1BJiYk9jAU/2y'),
(3, 'test3', 'test3', 'test3@test.fr', NULL, '$2y$12$0Fpj34enwBEmof3E5m7DQ.uH8ZVFlni3OcyTBzUGSmx5pM74/33ue'),
(4, 'test4', 'test4', 'test4@test.fr', NULL, '$2y$12$BR0WlGVkKgvOttwb/cJd3.EiAiO.z7cVCS5EUJVOVrG75DU7E5WO.'),
(5, 'test5', 'test5', 'test5@test.fr', NULL, '$2y$12$.iUxILHH3z2DhvRIyUf1lON..ezcVhjA.O5BvIBKv48/vdAFbYCJK'),
(6, 'test', 'test', 'testtest@test.fr', NULL, '$2y$12$GI.Q/iepuEVrbaUAwaqRCu6eT9Wo3TCIs15FTdmpbZf6uz0TiR7PG'),
(7, 'test', 'test', 'test6@test.fr', NULL, '$2y$12$cpYWNkNer0tW1ipcPM7qkOjhnmIYObLrHzW2XqF3CIKrRhP8YGUPa'),
(8, 'test', 'test', 'tetfdt@vtgdsyuivqd.fr', NULL, '$2y$12$3X098wJTEkcC54TWcDuwgO4w7dNH9essdLl6vAgVrzSQ3a.YaEO6e'),
(9, 'test', 'test', 'test7@test.fr', NULL, '$2y$12$hK2WJuqBINN6rfvuSY6hPub21.EhyZ.9VU.EbSl6XCXRv7M4pQzdS'),
(10, 'test9', 'test9', 'test9@test.fr', NULL, '$2y$12$tUhjpQ.IohYrWRCPjFp4xOiPqQNgZTNHFLMkFQ8TlKBK9/UfsH0r6'),
(11, 'ttest', 'ttest', 'ttest@test.fr', NULL, '$2y$12$bM.VqRV.AY9Na0ll6AEzE.ygnmhxfyGLsi1.NPqBnOLM0enUJf20a');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE `voiture` (
  `id` int(11) NOT NULL,
  `nom_image` varchar(30) NOT NULL,
  `marque` varchar(20) NOT NULL,
  `modele` varchar(30) NOT NULL,
  `prix` float NOT NULL,
  `carburant` varchar(20) NOT NULL,
  `boite` varchar(20) NOT NULL,
  `place` tinyint(4) NOT NULL,
  `porte` tinyint(4) NOT NULL,
  `id_concession` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`id`, `nom_image`, `marque`, `modele`, `prix`, `carburant`, `boite`, `place`, `porte`, `id_concession`) VALUES
(1, 'citroen_c5', 'Citroen', 'C5', 12590, 'essence', 'automatique', 5, 5, 1),
(2, 'citroen_ds4', 'Citroen', 'DS4', 17990, 'diesel', 'manuelle', 5, 5, 2),
(3, 'peugeot_408', 'Peugeot', '408', 22999, 'diesel', 'automatique', 5, 3, 3),
(4, 'renault_scenic', 'Renault', 'Scénic', 14980, 'essence', 'automatique', 5, 5, 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `achat`
--
ALTER TABLE `achat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vehicule` (`id_vehicule`) USING BTREE;

--
-- Index pour la table `concession`
--
ALTER TABLE `concession`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_concession` (`id_concession`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `achat`
--
ALTER TABLE `achat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `concession`
--
ALTER TABLE `concession`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `achat`
--
ALTER TABLE `achat`
  ADD CONSTRAINT `achat_ibfk_1` FOREIGN KEY (`id_vehicule`) REFERENCES `voiture` (`id`);

--
-- Contraintes pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD CONSTRAINT `voiture_ibfk_1` FOREIGN KEY (`id_concession`) REFERENCES `concession` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
