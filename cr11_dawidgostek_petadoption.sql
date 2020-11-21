-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 21. Nov 2020 um 12:22
-- Server-Version: 10.4.14-MariaDB
-- PHP-Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_dawidgostek_petadoption`
--
CREATE DATABASE IF NOT EXISTS `cr11_dawidgostek_petadoption` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cr11_dawidgostek_petadoption`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `animal`
--

CREATE TABLE `animal` (
  `animal_id` int(15) NOT NULL,
  `animal_name` varchar(55) NOT NULL,
  `animal_img` text NOT NULL,
  `description` text NOT NULL,
  `location` text NOT NULL,
  `age` int(2) NOT NULL,
  `hobbies` varchar(55) NOT NULL,
  `breed` varchar(55) NOT NULL,
  `size` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `animal`
--

INSERT INTO `animal` (`animal_id`, `animal_name`, `animal_img`, `description`, `location`, `age`, `hobbies`, `breed`, `size`) VALUES
(1, 'Rex', 'https://www.zooplus.pl/magazyn/wp-content/uploads/2018/04/owczarek-niemiecki.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. ', 'Hauptsrasse 25, 1030 Vienna', 5, 'Playing with the ball', 'German Shepherd', 'big'),
(2, 'Bob', 'https://www.dehunderassen.de/uploads/thumbs/720x568-resize/dog/553/beagle-13246.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'Wienerstrasse 10, 3100 St. Pölten', 9, 'looking for sticks', 'Beagle', 'small'),
(3, 'Arni', 'https://www.zooroyal.at/magazin/wp-content/uploads/2017/03/american-staffordshire-terrier-hunderassen-760x560.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'Tiroler Platz 5, 4030 Linz', 1, 'running with squirrels', 'American Staffordshire Terrier', 'medium'),
(4, 'Max', 'https://www.zooplus.de/magazin/wp-content/uploads/2017/03/rottweiler-gl%C3%BCcklich-1024x682.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'Marktplatz 10, 5020 Salzburg', 10, 'burying bones', 'Rottweiler', 'medium'),
(5, 'Naomi', 'https://s3.amazonaws.com/cdn-origin-etr.akc.org/wp-content/uploads/2017/11/26151212/Afghan-Hound-standing-in-a-garden.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'Landstrasse 156, 6900 Bregenz', 12, 'hair care', 'Afghan Hound', 'big'),
(11, 'Mimi', 'https://static.helpster.de/attachments/articles/icons/000/112/556/featured/iStock_000017867934XSmall.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'Neugasse 64, 9020 Klagenfurt', 2, 'barking', 'German Spitz', 'small'),
(12, 'Lola', 'https://www.agila.de/images/magazin/full/malteser-full-818x522.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'Alpengasse 9, 6020 Innsbruck', 13, 'running around', 'Maltese', 'small'),
(13, 'Deisy', 'https://www.zooplus.de/magazin/wp-content/uploads/2017/03/dalmatiner-hund.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'Esterhazygasse 25, 7000 Eisenstadt', 3, 'destroy shoes', 'Dalmatian ', 'big'),
(14, 'Hektor', 'https://www.agila.de/images/magazin/full/komondor-hunderasse-full-818x522.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'Neubaugasse 64, 6020 Innsbruck', 4, 'sleeping', 'Komondor', 'medium'),
(15, 'Nemo', 'https://img.fotocommunity.com/bobtail-36691dc8-ab98-4778-805c-cc26818697ec.jpg?height=1080', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'Dorfgasse 15, 2700 Wiener Neustadt', 15, 'lie on the couch', 'Old English Sheepdog', 'big'),
(16, 'Speed', 'https://einfachtierisch.de/media/cache/article_main_image/cms/2013/12/Border-Collie-Hund-Draussen.jpg?909471', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'Sturmgasse 14, 4030 Linz', 14, 'play football', 'Border Collie', 'medium'),
(17, 'Mugi', 'https://www.stadtzeitung.de/sites/default/files/imagecache/Detailed/articlemedia/2019/09/11/439394_orig.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'Eckgasse 25, 1120 Wien', 4, 'observe', 'Miniature Pinscher', 'small');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `status` enum('user','admin','superAdmin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `userName`, `userEmail`, `userPass`, `status`) VALUES
(1, 'Matthias', 'matthias@mail.com', 'a32bf1e31829a3433d08e80ccede866c3d874e9bf5d1ae862450753a09074597', 'superAdmin'),
(2, 'Anna', 'anna@mail.com', '83f768aac05b8e3b177ccb54784f3f26f50068264e569b80b7e1f7503357b9ae', 'superAdmin'),
(4, 'Karin', 'karin@mail.com', '49e0f5fcfbf523063587dd4215452a774e56314ec7e81b59ad044737b1529186', 'admin'),
(5, 'David', 'david@mail.com', 'a515b2ef34a24641b1fb3d14ea3e473718df8e1afcdc0894207558866ee49713', 'admin'),
(6, 'Mark', 'mark@mail.com', '5db14a12a37c9b80d85d7680fefadab80b3b79983a9c1a677c56a163edc9c026', 'admin'),
(7, 'Max', 'max@mail.com', 'e07665aad147dc281d02792bf673945437ca92a5a0a276ce7c04d94ae42eb6fa', 'user'),
(8, 'Monika', 'monika@mail.com', '940a1a460993d3ad8009c7c763d4467e04d25ac34f6ad1df65ca7ca611712bf2', 'user'),
(10, 'Verena', 'verena@mail.com', 'ea51b6c8483b0901291a9ee4b0b6c252d2aab7cb79da0e96f6c82721ac0d5459', 'user'),
(12, 'Bernard', 'bernard@mail.com', 'e6a5b84a0b8529f5bc9e8412dd0b5f6a95e7aa3dffe499e141585ed2137ad754', 'user'),
(13, 'Natascha', 'natascha@mail.com', '69e962dbd8e98464c28cd6ac082574d4b4229005ea0b75854cef33a0cc538cef', 'user'),
(15, 'Michael', 'michael@mail.com', '0cf2d3263ed5040ca0985439600a84eeb8a9b3675c48f040268944b44ab78f67', 'user');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`animal_id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `animal`
--
ALTER TABLE `animal`
  MODIFY `animal_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
