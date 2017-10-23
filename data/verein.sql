-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3307
-- Erstellungszeit: 23. Okt 2017 um 11:14
-- Server-Version: 10.1.9-MariaDB
-- PHP-Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `verein`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `verein`
--

CREATE TABLE `verein` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `kategorie` varchar(30) DEFAULT NULL,
  `mitgliederanzahl` int(11) DEFAULT NULL,
  `bild` varchar(100) DEFAULT NULL,
  `gründungsjahr` int(11) DEFAULT NULL,
  `beschreibung` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `verein`
--

INSERT INTO `verein` (`id`, `name`, `kategorie`, `mitgliederanzahl`, `bild`, `gründungsjahr`, `beschreibung`) VALUES
(1, 'Yb', 'Fussball', 10000, 'bild.jpg', 1879, NULL),
(2, 'Grizzlies', 'American Football', 12000, 'bild.png', 1931, NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `verein`
--
ALTER TABLE `verein`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `verein`
--
ALTER TABLE `verein`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
