-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 04 août 2021 à 14:01
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `createdAt` date NOT NULL,
  `approvement` tinyint(1) NOT NULL,
  `postId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `message`, `createdAt`, `approvement`, `postId`, `userId`) VALUES
(2, 'A surveillÃ©, ca peut etre intÃ©ressant.', '2021-07-14', 1, 1, 3),
(8, 'C\'est beaucoup trop limitÃ© pour le moment.', '2021-07-22', 1, 1, 2),
(9, 'Justement avec cette levÃ© de fond ils vont pouvoir faire avancer les choses.', '2021-07-26', 1, 1, 1),
(10, '<b>hack</b>', '2021-07-29', 0, 7, 4),
(11, 'Post intÃ©ressant +1', '2021-08-02', 0, 2, 3),
(13, 'spam', '2021-08-02', 0, 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(55) NOT NULL,
  `excerpt` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `publishedAt` date NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `excerpt`, `content`, `publishedAt`, `userId`) VALUES
(1, 'Bubble lÃ¨ve 100 millions', '100 millions de dollars lever pour enrichir la plateforme no-code de Bubble.', 'SpÃ©cialisÃ©e dans le no-code, la start-up Bubble lÃ¨ve 100 millions de dollars pour enrichir sa plateforme dÃ©jÃ  utilisÃ©e par plus d\'un million de personnes dans le monde. GrÃ¢ce Ã  une interface graphique simple, n\'importe qui peut crÃ©er un site ou une application sans savoir coder. ', '2021-08-02', 1),
(2, 'Croissance du marchÃ© des framework PHP', 'Le marchÃ© des framework PHP va connaitre une croissance dâ€™ici 2021.', 'Selon une Ã©tude, au cours des cinq prochaines annÃ©es, le marchÃ© Logiciel de framework Web PHP enregistrera un haut niveau en termes de revenus, la taille du marchÃ© mondial atteindra beaucoup de millions de dollars dâ€™ici 2027, contre pas beaucoup de millions de dollars en 2020.', '2021-07-28', 1),
(5, 'Amazon Alexa', 'Amazon Alexa, plusieurs nouvelles fonctionnalitÃ©s inÃ©dites', 'Lâ€™assistant vocal pourra dÃ©sormais Ãªtre incarnÃ© par une voix masculine.', '2021-07-28', 1),
(6, 'PS5 vs Xbox Series, on a les chiffres', 'La PlayStation domine toujours les ventes.', 'Sony a annoncÃ© par communiquÃ© de presse que 10 millions de PS5 avaient dÃ©jÃ  Ã©tÃ© distribuÃ©es aux commerÃ§ants au 18 juillet 2021. La console est en rupture de stock. On sait que les Xbox Series se sont au moins Ã©coulÃ©s Ã  5,6 millions dâ€™exemplaires.', '2021-07-28', 1),
(7, 'Amazon Flex', 'l\'algorithme qui fait vivre un enfer Ã  4 millions de livreurs de colis', 'Il les pousse Ã  des cadences infernales au pÃ©ril de leur vie pour rÃ©pondre aux exigences des 200 millions dâ€™abonnÃ©s Primeâ€‰: Ãªtre livrÃ©s en 24 heures.', '2021-07-28', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(35) NOT NULL,
  `lastname` varchar(35) NOT NULL,
  `mail` varchar(120) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `mail`, `password`, `role`) VALUES
(1, 'christopher', 'diot', 'christopher.diot@gmail.com', '$2y$10$7xcuQRSPtlZZv7jf0vWrnuMm6beMuYbsjY7Dasv/PDz25dCcj3loa', 1),
(2, 'francis', 'dupon', 'francis.wilkerson@gmail.com', '$2y$10$r6SXyvCOCbctuuD/XuIr2uEi94t7xcuJYTF41Qa2YMnIT17XfJQWm', 0),
(3, 'malcolm', 'Wilkerson', 'malcolm.wilkerson@gmail.com', '$2y$10$U5lKK9WRopk9Ugz1hS.B8uLhSPqHmk3n52ctrK5m92e7pE2qa/boS', 0),
(4, 'nikau', 'bellic', 'nickau.bellic@gmail.com', '$2y$10$tIGFAj64dk4z1A1tKgtoRe210j.aQOBx7SeUiK1cblhJfEjm80hsK', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
