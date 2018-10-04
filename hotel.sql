-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 06 Juin 2016 à 12:33
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `hotel`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis_client`
--

CREATE TABLE IF NOT EXISTS `avis_client` (
  `id_avis_client` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `note` int(11) NOT NULL,
  `commentaire` varchar(100) NOT NULL,
  PRIMARY KEY (`id_avis_client`,`id_utilisateur`,`id_hotel`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_hotel` (`id_hotel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `avis_client`
--

INSERT INTO `avis_client` (`id_avis_client`, `id_utilisateur`, `id_hotel`, `pseudo`, `note`, `commentaire`) VALUES
(2, 4, 5, 'Stephane', 3, 'cool'),
(3, 4, 5, 'Stephane', 5, 'super'),
(4, 4, 3, 'Stephane', 5, 'Tres bien '),
(5, 5, 5, 'moi', 5, 'Trés bon hôtel'),
(6, 5, 5, 'moi', 5, 'ras');

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE IF NOT EXISTS `chambre` (
  `id_chambre` int(11) NOT NULL AUTO_INCREMENT,
  `id_hotel` int(11) NOT NULL,
  `nombre` int(11) NOT NULL,
  `nbr_places` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `prix_nuit` decimal(6,2) NOT NULL,
  `photo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_chambre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Contenu de la table `chambre`
--

INSERT INTO `chambre` (`id_chambre`, `id_hotel`, `nombre`, `nbr_places`, `description`, `prix_nuit`, `photo`) VALUES
(1, 1, 50, 1, 'Chambre Standard avec 1 lit double\nConnexion Internet WIFI télévision par satellite \n', '83.00', 'Images/ch_standard_valence.jpg'),
(2, 1, 25, 2, 'Chambre Standard avec 1 lit double et un lit simple,\nConnexion Internet WIFI, télévision par satelli', '99.99', 'Images/chb_double_valence.jpg'),
(3, 5, 2, 1, 'Chambre double', '135.00', 'Images/chb_angleterre.jpg'),
(6, 2, 36, 3, '1 lit double et 2 lits 1 place\r\nChambre de 30 m² offrant une vue sur la ville', '145.00', 'Images/chb_novotel_clermont.jpg'),
(7, 2, 100, 2, '1 lit double', '105.00', 'Images/chb_simple_novotel_clermont.jpg'),
(8, 3, 25, 2, 'Chambre Double Club 16 m²', '79.00', 'Images/chb_club_liberia.jpg'),
(9, 3, 40, 2, 'Chambre standard 12m²', '60.00', 'Images/chb_liberia.jpg'),
(10, 4, 40, 2, 'Chambre Standard, 1 lit double', '71.00', 'Images/chb_ibis_epernay.jpg'),
(11, 4, 25, 3, 'Un lit double et un lit une place', '91.00', 'Images/chb_double_ibis_epernay.jpg'),
(12, 9, 2, 2, 'Chambre standard', '84.00', 'Images/ibisreimsch1.jpg'),
(13, 9, 2, 4, 'Chambre double', '105.00', 'Images/ibisreimsch2.jpg'),
(14, 7, 35, 2, 'Chambre double', '250.00', 'Images/washingtonch1.jpg'),
(15, 7, 25, 5, 'Suite 30m²', '310.00', 'Images/washingtonch2.jpg'),
(16, 6, 300, 2, 'Chambre double classique', '130.00', 'Images/Hotel Catalogne Paris Gare Montparnass'),
(17, 6, 54, 2, 'Chambre double de luxe', '180.00', 'Hotel Catalogne Paris Gare Montparnassech2.jp'),
(18, 8, 25, 2, 'Chambre standard', '99.00', 'Images/France Louvrech1.jpg'),
(19, 8, 9, 1, 'Chambre simple', '89.00', 'Images/France Louvrech2.jpg'),
(30, 16, 40, 2, 'Chambre Double', '99.00', 'Images/holidaytoulonch1.jpg'),
(31, 16, 41, 3, 'Chambre Lits Jumeaux avec Canapé-Lit ', '115.00', 'Images/holidaytoulonch2.jpg'),
(32, 0, 102, 4, 'Chambre familiale, 1 lit double et 2 lits 1 place', '185.00', 'Images/gatsbych.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
  `id_hotel` int(11) NOT NULL AUTO_INCREMENT,
  `nom_hotel` varchar(45) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `adresse` varchar(45) NOT NULL,
  `ville` varchar(45) NOT NULL,
  `region` varchar(45) NOT NULL,
  `code_postal` int(5) NOT NULL,
  `num_tel` varchar(10) DEFAULT NULL,
  `nbr_chambre` int(11) NOT NULL,
  `photo` varchar(45) DEFAULT NULL,
  `photo2` varchar(50) DEFAULT NULL,
  `photo3` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_hotel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `hotel`
--

INSERT INTO `hotel` (`id_hotel`, `nom_hotel`, `description`, `adresse`, `ville`, `region`, `code_postal`, `num_tel`, `nbr_chambre`, `photo`, `photo2`, `photo3`) VALUES
(0, 'Gatsby Hotel ', 'Repas et boissons   : <br>  Petit-déjeuner tous les jours (en supplément)      Restaurant     Bar salon     Service en chambre avec horaires limités<br>   Activités   :<br>   Serviettes de plage     Piscine en plein air     Transats au bord de la piscine     Salle de fitness     Golf à proximité     Table de billard<br>  Affaires   :<br>   Nombre de salles de réunion - 6     Espace conférence   :  Surface de l''espace conférence (pieds) - 699     Surface de l''espace conférence (mètres) - 65<br>  Prestations  :<br>    Réception ouverte 24 heures sur 24     Assistance pour visites/billets     Service de nettoyage à sec     Journaux gratuits dans le hall<br>  Équipements   :<br>   Nombre de bâtiments - 1     Ascenseur     Coffre-fort à la réception     Terrasse     Télévision dans les espaces communs  Dans la chambre Tout confort      Climatisation réglable dans la chambre     Climatisation     Fer/planche à repasser (sur demande)     Chambres insonorisées       Sèche-cheveux      Télévisi', '36, rue des Freres Lumiere', 'Chassieu', 'Rhône-Alpes', 69680, '0156289546', 102, 'Images/gatsby.jpg', 'Images/gatsby2.jpg', 'Images/gatsby3.jpg'),
(1, 'mercure', 'Entre Vercors et Ardèche, l''hôtel Mercure Valence Sud profite d''un emplacement idéal à la jonction de l''A 7 en venant de Lyon et de l''A 49 en provenance de Grenoble. Situé sur la route des vacances et au sud de Valence dans le quartier d''affaires, cet établissement dispose de chambres confortables vous invitant à la détente. Envie de vous relaxer après une journée de séminaire ou de visites? Plongez dans notre piscine extérieure ou attablez vous en terrasse au restaurant Courtepaille attenant', '2 rue de Chantecouriol', 'Valence', 'Rhône-Alpes', 26000, '075408070', 75, 'Images/mercure_valence.jpg', 'Images/mercure_valence2.jpg', 'Images/mercure_valence.jpg'),
(2, 'Novotel Clermont Ferrand', 'Piscine en plein air ouverte en saison<br>\n    Salle de fitness<br>\n    Deux bains à remous<br>\n    Hammam<br>\n    Aire de jeux sur place<br>\n    Golf à proximité<br>\n    Transats au bord de la piscine<br>\n    Parasols à la piscine<br>\n    Salle de jeux vidéo', '32-34 Rue Georges Besse, Le Brezet', 'Clermont-Ferrand', 'Auvergne', 63100, '157324682', 136, 'Images/novotel_clermont.jpg', 'Images/novotel_clermont2.jpg', 'Images/novotel_clermont3.jpg'),
(3, 'Libertel Canal Saint Martin', 'Petit-déjeuner buffet tous les jours <br>   Réception ouverte 24 heures sur 24  <br>Assistance pour visites/ billets<br> Service de nettoyage à sec \n<br> Nombre de bâtiments  3<br> Année de construction 1905<br> Ascenseur<br> Coffre-fort à la réception', '5 Avenue Secretan', 'Paris', 'Île-de-France', 75019, '075408070', 65, 'Images/libertel.jpg', 'Images/libertel2.jpg', 'Images/libertel3.jpg'),
(4, 'ibis Epernay Centre Ville', 'Hôtel en centre-ville à Epernay<br>     Principales prestations :<br>     65 chambres<br> Petit-déjeuner<br> Bar salon <br>Un parking payant sans service de voiturier<br> Réception ouverte 24 heures sur 24<br> Snack bar/épicerie<br>Personnel multilingue Journaux gratuits <br>dans le hall<br> Consigne à bagages', '19 rue Chocatelle, place des Arcades, ', 'Epernay', 'Champagne-Ardenne', 51200, ' ?01 57 32', 65, 'Images/epernay1.jpg', 'Images/epernay2.jpg', 'Images/epernay3.jpg'),
(5, 'Hotel D''Angleterre', 'Principales prestations<br>       20 chambres<br> 2 restaurants<br> Petit-déjeuner disponible<br> Climatisation<br> Ménage tous les jours<br> ', '19 Place Monseigneur Tissier,', 'Châlons-en-Champagne', 'Champagne-Ardenne', 51000, '0157324682', 2, 'Images/angleterre.jpg', 'Images/angleterre2.jpg', 'Images/angleterre3.jpg'),
(6, 'Hotel Catalogne Paris Gare Montparnasse', '354 chambres non-fumeurs<br>Restaurant et bar salon<br>Petit-déjeuner disponible<br>Un parking payant sans service de voiturier<br>Centre d''affairesTerrasse<br>Réception ouverte 24 heures sur 24<br>Climatisation<br>Ménage tous les jours<br>Un service de nettoyage à sec<br>Salles de réunion<br>Personnel multilingue', '40, rue du Commandant Mouchotte', 'Paris', 'Île-de-France', 75014, '?01 57 32 ', 354, 'Images/catalogne1.jpg', 'Images/catalogne2.jpg', 'Images/catalogne3.jpg'),
(7, 'George Washington', 'L''un de nos best-sellers à Paris ! Situé dans le centre de Paris, à seulement 4 minutes à pied de l''avenue des Champs-Élysées, le George Washington dispose de chambres insonorisées et d''une connexion Wi-Fi gratuite.<br>  Toutes les chambres affichent une décoration simple et comprennent une télévision à écran plat et une salle de bains privative. Les suites sont pourvues d''un plateau/bouilloire.<br>  Le George Washington propose tous les jours un petit-déjeuner buffet, servi dans la salle à manger', '43, rue Washington, 8e arr', 'Paris', 'Île-de-France', 75008, '0185697856', 153, 'Images/george washington1.jpg', 'Images/george washington2.jpg', 'Images/george washington3.jpg'),
(8, 'France Louvre', 'Situé au centre de Paris, à proximité du quartier historique du Marais, le France Louvre est un hôtel de style typiquement haussmannien proposant des hébergements avec télévision par satellite à écran plat. Il est idéalement situé pour découvrir Paris à pied.  Toutes les chambres du France Louvre sont meublées avec élégance dans le style Louis XV. Chacune dispose d''un minibar et d''un plateau/bouilloire. Leur salle de bains privative est pourvue d''une baignoire ou d''une douche et d''un sèche-cheve', ' 40 Rue De Rivoli, 4e arr.', 'Paris', 'Ïle-de-France', 75004, '0125698563', 34, 'Images/france_louvre1.jpg', 'Images/france_louvre2.jpg', 'Images/france_louvre3.jpg'),
(9, 'ibis Reims Centre', ' Votre hôtel  L''hôtel Ibis Reims Centre se situe aux portes du centre-ville, capitale du champagne. A 50 mètres de la gare SNCF, l''hôtel est un point de départ idéal pour vos séjours d''affaires ou culturels. En 10 min à pied vous pourrez admirer la cathédrale de Reims,ou vous rendre au centre des congrès. L''hôtel propose à la réservation 100 chambres climatisées toutes munies d''un accès wifi gratuit. Pour vous restaurer, nous vous proposons un bar en-cas ouvert 24h/24, stationnement payant ', '28, boulevard Joffre', 'Reims', 'Champagne-Ardenne', 51100, '0326400324', 4, 'Images/ibis_reims1.jpg', 'Images/ibis_reims2.jpg', 'Images/ibis_reims3.jpg'),
(16, 'Holiday Inn Express Toulon Sainte-Musse', ' L''Holiday Inn Express Toulon Sainte-Musse se trouve en face de l''hôpital Sainte Musse, à 10 minutes en voiture du centre de Toulon et de son port. Cet établissement dispose d''une réception ouverte 24h/24 avec service d''enregistrement et de départ rapides, ainsi que d''un centre d''affaires dont l''accès est gratuit. En fin de journée, vous pourrez vous détendre au bar de l''hôtel ou sur la terrasse. Vous bénéficierez d''une connexion Wi-Fi gratuite.<br>  Toutes les chambres sont \nclimatisées ', ' Rue Nicolas Appert, ', 'Toulon', 'Provence-Alpes-Côte d''Azur', 83000, '0652397845', 81, 'Images/holiday_toulon1.jpg', 'Images/holiday_toulon2.jpg', 'Images/holiday_toulon3.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `réservation`
--

CREATE TABLE IF NOT EXISTS `réservation` (
  `id_réservation` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `id_chambre` int(11) NOT NULL,
  `date_arrivé` date NOT NULL,
  `date_départ` date NOT NULL,
  `nbr_nuit` int(11) NOT NULL,
  `prix` varchar(45) NOT NULL,
  PRIMARY KEY (`id_réservation`,`id_hotel`,`id_chambre`,`id_utilisateur`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_hotel` (`id_hotel`),
  KEY `id_chambre` (`id_chambre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `réservation`
--

INSERT INTO `réservation` (`id_réservation`, `id_utilisateur`, `id_hotel`, `id_chambre`, `date_arrivé`, `date_départ`, `nbr_nuit`, `prix`) VALUES
(12, 4, 7, 15, '2016-05-27', '2016-05-28', 1, '310'),
(13, 4, 9, 12, '2016-05-29', '2016-05-30', 1, '84'),
(14, 4, 5, 3, '2016-05-27', '2016-05-28', 1, '135'),
(15, 4, 5, 3, '2016-05-27', '2016-05-28', 1, '135'),
(16, 4, 5, 3, '2016-06-04', '2016-06-05', 1, '135'),
(17, 4, 8, 18, '2016-06-16', '2016-06-17', 1, '99'),
(18, 4, 8, 18, '2016-06-16', '2016-06-17', 1, '99'),
(19, 4, 3, 8, '2016-06-03', '2016-06-04', 1, '79'),
(20, 5, 5, 3, '2016-06-07', '2016-06-08', 1, '135'),
(21, 4, 5, 3, '2016-06-07', '2016-06-08', 1, '135');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_utilisateur` varchar(45) NOT NULL,
  `prenom_utilisateur` varchar(45) DEFAULT NULL,
  `adresse` varchar(200) DEFAULT NULL,
  `num_tel` varchar(10) DEFAULT NULL,
  `mail` varchar(100) NOT NULL,
  `mdp` varchar(45) NOT NULL,
  `role` varchar(45) NOT NULL,
  PRIMARY KEY (`id_utilisateur`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `adresse`, `num_tel`, `mail`, `mdp`, `role`) VALUES
(1, 'admin', '', '', '600000000', 'admin@gmail.com', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 'admin'),
(4, 'Rafflin', 'Stephane', '12 rue des cerisiers 51000 Châlons-en-Champagne', '0600000000', 'rafflin.stephane@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'client'),
(5, 'Client', 'Bon', '10 rue des pommier 51100 Reims', '0611111111', 'bon.client@gmail.fr', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 'client');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `avis_client`
--
ALTER TABLE `avis_client`
  ADD CONSTRAINT `avis_client_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avis_client_ibfk_2` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id_hotel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `réservation`
--
ALTER TABLE `réservation`
  ADD CONSTRAINT `id_chambre` FOREIGN KEY (`id_chambre`) REFERENCES `chambre` (`id_chambre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_hotel` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id_hotel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
