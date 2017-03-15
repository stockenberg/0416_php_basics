-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 15. Mrz 2017 um 17:10
-- Server-Version: 5.7.17-0ubuntu0.16.04.1
-- PHP-Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cms`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_author_id` int(11) NOT NULL,
  `news_title` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `news`
--

INSERT INTO `news` (`news_id`, `news_author_id`, `news_title`, `news_text`, `news_image`, `news_created`) VALUES
  (7, 1, 'news scnd', 'jasdjasdjasd', 'massage-599505_1920.jpg', '2017-03-02 18:15:03'),
  (10, 1, 'weitere News', 'DÃ¼dÃ¼dÃ¼dÃ¼ ', 'osteopathy-1207800_1920.jpg', '2017-03-02 18:21:46'),
  (11, 1, 'neuste News', 'Hallo', 'wellness-589771_1920.jpg', '2017-03-02 19:01:23');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `task_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_title` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_deadline` datetime DEFAULT NULL,
  `task_done` tinyint(1) NOT NULL DEFAULT '0',
  `task_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `task_sent` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `user_password`, `user_email`, `user_role`) VALUES
  (1, 'admin', '$2y$12$Byi9V3r9KM0NwqBBgl2GJujARTUeSv.sjX2pfCgRzXylktxn2KqCO', 'admin@test.de', 1),
  (5, 'Geht', '$2y$12$q5lliNRKrfeim1fm1rt8S.cQQ5KT/l3tB/xOe1Iygi/8omDN55Rg.', 'test@test.de', 1),
  (7, 'Huhuhu', '$2y$12$ABA6opX6PuIYorh2DuyIG.6jwbYI6Oj/h0uu42dLNMy.7Bc/469ma', 'test@asd.de', 3),
  (10, 'ASD', '$2y$12$SI0i5ifVTdaeoFqQ93lzHeyrvcD4G9.iLtcJVDoy1xUE7GIcvjshO', 'huhu@haha.de', 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `usertasks`
--

CREATE TABLE `usertasks` (
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indizes für die Tabelle `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT für Tabelle `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;