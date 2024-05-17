-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Creato il: Mag 17, 2024 alle 11:39
-- Versione del server: 8.0.37
-- Versione PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_film`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `actor`
--

CREATE TABLE `actor` (
  `id` int NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `birthday_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `actor`
--

INSERT INTO `actor` (`id`, `first_name`, `last_name`, `birthday_date`) VALUES
(1, 'Ethan', 'Hawke', '1970-11-06'),
(2, 'Julie', 'Delpy', '1969-12-21'),
(3, 'Richard', 'Linklater', '1960-07-30'),
(4, 'Sam', 'Neill', '1947-09-14'),
(5, 'Laura', 'Dern', '1967-02-10'),
(6, 'Jeff', 'Goldblum', '1952-10-22'),
(7, 'Ralph', 'Macchio', '1961-11-04'),
(8, 'Pat', 'Morita', '1932-06-28'),
(9, 'Elisabeth', 'Shue', '1963-10-06'),
(10, 'Brad', 'Pitt', '1963-12-18'),
(11, 'Geena', 'Davis', '1956-01-21'),
(12, 'Susan', 'Sarandon', '1946-10-04'),
(13, 'Shia', 'LaBeouf', '1986-06-11'),
(14, 'Michelle', 'Monaghan', '1976-03-23'),
(15, 'Rosario', 'Dawson', '1979-05-09'),
(16, 'Michael', 'Jordan', '1963-02-17'),
(17, 'Bill', 'Murray', '1950-09-21'),
(18, 'Wayne', 'Knight', '1955-08-07'),
(19, 'Keanu', 'Reeves', '1964-09-02'),
(20, 'Dennis', 'Hopper', '1936-05-17'),
(21, 'Sandra', 'Bullock', '1964-07-26'),
(22, 'Keanu', 'Reeves', '1964-09-02'),
(23, 'Patrick', 'Swayze', '1952-08-18'),
(24, 'Gary', 'Busey', '1944-06-29'),
(25, 'Jason', 'Patric', '1966-06-17'),
(26, 'Corey', 'Haim', '1971-12-23'),
(27, 'Dianne', 'Wiest', '1948-03-28'),
(28, 'Bruce', 'Willis', '1955-03-19'),
(29, 'Alan', 'Rickman', '1946-02-21'),
(30, 'Bonnie', 'Bedelia', '1948-03-25'),
(31, 'Matt', 'Damon', '1970-10-08'),
(32, 'Jessica', 'Chastain', '1977-03-24'),
(33, 'Kristen', 'Wiig', '1973-08-22'),
(34, 'Sean', 'Astin', '1971-02-25'),
(35, 'Josh', 'Brolin', '1968-02-12'),
(36, 'Jeff', 'Cohen', '1974-06-25'),
(37, 'Bill', 'Murray', '1950-09-21'),
(38, 'Andie', 'MacDowell', '1958-04-21'),
(39, 'Chris', 'Elliott', '1960-05-31'),
(40, 'Mel', 'Gibson', '1956-01-03'),
(41, 'Rene', 'Russo', '1954-02-17'),
(42, 'Gary', 'Sinise', '1955-03-09'),
(43, 'Michael', 'J. Fox', '1961-06-09'),
(44, 'Christopher', 'Lloyd', '1938-10-22'),
(45, 'Lea', 'Thompson', '1961-05-31'),
(46, 'Robin', 'Williams', '1951-07-21'),
(47, 'Kirsten', 'Dunst', '1982-04-30'),
(48, 'Bonnie', 'Hunt', '1961-09-22'),
(49, 'Uma', 'Thurman', '1970-04-29'),
(50, 'Lucy', 'Liu', '1968-12-02'),
(51, 'Vivica', 'A. Fox', '1964-07-30'),
(52, 'Cary', 'Elwes', '1962-10-26'),
(53, 'Danny', 'Glover', '1946-07-22'),
(54, 'Ken', 'Leung', '1970-01-21'),
(55, 'Matt', 'Damon', '1970-10-08'),
(56, 'Franka', 'Potente', '1974-07-22'),
(57, 'Chris', 'Cooper', '1951-07-09'),
(58, 'Tom', 'Hanks', '1956-07-09'),
(59, 'Geena', 'Davis', '1956-01-21'),
(60, 'Lori', 'Petty', '1963-10-14');

-- --------------------------------------------------------

--
-- Struttura della tabella `director`
--

CREATE TABLE `director` (
  `id` int NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `birthday_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `director`
--

INSERT INTO `director` (`id`, `first_name`, `last_name`, `birthday_date`) VALUES
(1, 'Richard', 'Linklater', '1960-07-30'),
(2, 'Steven', 'Spielberg', '1946-12-18'),
(3, 'John', 'G. Avildsen', '1935-12-21'),
(4, 'Ridley', 'Scott', '1937-11-30'),
(5, 'D.J.', 'Caruso', '1960-05-01'),
(6, 'Joe', 'Pytka', '1964-07-19'),
(7, 'Jan', 'de Bont', '1970-09-06'),
(8, 'Kathryn', 'Bigelow', '1951-11-27'),
(9, 'Joel', 'Schumacher', '1939-08-29'),
(10, 'John', 'McTiernan', '1951-01-08'),
(11, 'Ridley', 'Scott', '1937-11-30'),
(12, 'Richard', 'Donner', '1930-04-24'),
(13, 'Harold', 'Ramis', '1944-11-21'),
(14, 'Ron', 'Howard', '1954-03-01'),
(15, 'Robert', 'Zemeckis', '1951-05-14'),
(16, 'Joe', 'Johnston', '1950-05-13'),
(17, 'Quentin', 'Tarantino', '1963-03-27'),
(18, 'James', 'Wan', '1977-02-27'),
(19, 'Doug', 'Liman', '1965-07-24'),
(20, 'Penny', 'Marshall', '1943-10-15');

-- --------------------------------------------------------

--
-- Struttura della tabella `genre`
--

CREATE TABLE `genre` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `genre`
--

INSERT INTO `genre` (`id`, `name`, `slug`) VALUES
(1, 'Drama', NULL),
(2, 'Action', NULL),
(3, 'Action', NULL),
(4, 'Drama', NULL),
(5, 'Horror', NULL),
(6, 'Animation', NULL),
(7, 'Action', NULL),
(8, 'Action', NULL),
(9, 'Horror', NULL),
(10, 'Action', NULL),
(11, 'Science Fiction', NULL),
(12, 'Adventure', NULL),
(13, 'Comedy', NULL),
(14, 'Thriller', NULL),
(15, 'Science Fiction', NULL),
(16, 'Adventure', NULL),
(17, 'Action', NULL),
(18, 'Horror', NULL),
(19, 'Action', NULL),
(20, 'Comedy', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `movie`
--

CREATE TABLE `movie` (
  `id` int NOT NULL,
  `synopsis` text,
  `title` varchar(255) DEFAULT NULL,
  `duration` int DEFAULT NULL,
  `released_year` date DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `movie`
--

INSERT INTO `movie` (`id`, `synopsis`, `title`, `duration`, `released_year`, `poster`) VALUES
(1, 'Una storia romantica ambientata nell\'inverno del 1995 a Parigi.', 'Before Sunrise', 105, '1995-01-27', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQJUHmsXpixQsc9oYPZWO4gZiikVXVCLhoLQ&usqp=CAU'),
(2, 'Un gruppo di dinosauri scappa da un parco a tema.', 'Jurassic Park', 127, '1993-06-11', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9aPoU992LsuaU2WPzaFXUT0mE0prxSyojeQ&usqp=CAU'),
(3, 'Un ragazzo si ritrova coinvolto in un torneo di arti marziali.', 'Karate Kid', 126, '1984-06-22', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQbmxgsE_gdXTPRbUR_9qS4YXCFMjj71p3sDA&usqp=CAU'),
(4, 'Un gruppo di amici intraprende un viaggio attraverso il deserto americano.', 'Thelma & Louise', 130, '1991-05-24', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRkJi4AIAVMFJVWtw08IFypRtAfm8HDqoR7Eg&usqp=CAU'),
(5, 'Un uomo comincia a sospettare che il suo vicino sia un serial killer.', 'Disturbia', 105, '2007-04-13', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ3j0i_MvJRul8AzWQkG2akVllVL6MwWIRtcQ&usqp=CAU'),
(6, 'Una squadra di basket affronta sfide sia sul campo che fuori.', 'Space Jam', 88, '1996-11-15', 'https://i.pinimg.com/736x/d2/2a/f2/d22af2ffd32cb8becf497aaedf4faff9.jpg'),
(7, 'Un uomo tenta di fermare un treno carico di esplosivi.', 'Speed', 116, '1994-06-10', 'https://i.pinimg.com/originals/f4/dd/49/f4dd498cd8b21778249f0f6ed0efbf2a.jpg'),
(8, 'Un poliziotto di Los Angeles combatte contro una banda di ladri di auto.', 'Point Break', 122, '1991-07-12', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQl8pJQXobYMmFc9nHEKxavoBUFNK3_5I2Ipg&usqp=CAU'),
(9, 'Un adolescente si imbatte in un gruppo di giovani vampiri.', 'The Lost Boys', 97, '1987-07-31', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSp8xZRP_4HkLXIuuD5_fKT4VXOkCMeMM20oQ&usqp=CAU'),
(10, 'Un ex poliziotto sconfigge i terroristi in un grattacielo.', 'Die Hard', 132, '1988-07-15', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQHJFO8XqCi_L8ePiFUbc7eL5Q_P3ONV50dA&usqp=CAU'),
(11, 'Un uomo si risveglia per scoprire di essere stato dimenticato su Marte.', 'The Martian', 144, '2015-10-02', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT9Af8Zk7RpEery3lgiIC5Pv5y4Y5auzyYYdA&usqp=CAU'),
(12, 'Una banda di ragazzi cerca di salvare il loro quartiere da una costruzione sospetta.', 'The Goonies', 114, '1985-06-07', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQvurAdwsUP9aynVfW6sTsKgQTuoGvJTQc9fQ&usqp=CAU'),
(13, 'Una coppia sposata si ritrova intrappolata in un loop temporale.', 'Groundhog Day', 101, '1993-02-12', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT5848HQ5kMgPPwtHT9-nl4oFrk83VL5_40QQ&usqp=CAU'),
(14, 'Un uomo si unisce a una missione per salvare il suo figlio rapito.', 'Ransom', 121, '1996-11-08', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSKdwBJ_Gj7wTo6er9PuvxXACFCC2xJpoAmGw&usqp=CAU'),
(15, 'Un bambino si ritrova a viaggiare nel tempo a bordo di una macchina del tempo.', 'Back to the Future', 116, '1985-07-03', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ7Zu6SNm7acBv8ouNI8WvUCLefDq_vmiJEOw&usqp=CAU'),
(16, 'Un gruppo di amici si imbatte in un misterioso tabellone di gioco.', 'Jumanji', 104, '1995-12-15', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDJInfTkSyw1j_NZl8CosrZndrV9suCsGLJw&usqp=CAU'),
(17, 'Una giovane donna cerca vendetta contro i suoi aggressori.', 'Kill Bill: Volume 1', 111, '2003-10-10', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-3HAO5pm1vGlLSQgY3v_4Y7dIHA8GTXdNiQ&usqp=CAU'),
(18, 'Un gruppo di persone si ritrova intrappolato in una stanza con un serial killer.', 'Saw', 103, '2004-10-29', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQGLyph6S-LtRYGKXArm1yaRIjAUcN1sp1vQ&usqp=CAU'),
(19, 'Un uomo si risveglia senza memoria e deve ricostruire la sua identità.', 'The Bourne Identity', 119, '2002-06-14', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT9N_nhPsRO1g72LEe-rfolGZGZ8MSHfJp54A&usqp=CAU'),
(20, 'Un gruppo di giocatori di baseball affronta avversità personali e professionali.', 'A League of Their Own', 128, '1992-07-01', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRw2z_NF7eirlqBDZqLaQeqnuQvCNAdSkVyAA&usqp=CAU');

-- --------------------------------------------------------

--
-- Struttura della tabella `movie_actor`
--

CREATE TABLE `movie_actor` (
  `movie_id` int NOT NULL,
  `actor_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `movie_actor`
--

INSERT INTO `movie_actor` (`movie_id`, `actor_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(2, 6),
(3, 7),
(3, 8),
(3, 9),
(4, 10),
(4, 11),
(4, 12),
(5, 13),
(5, 14),
(5, 15),
(6, 16),
(6, 17),
(6, 18),
(7, 19),
(7, 20),
(7, 21),
(8, 22),
(8, 23),
(8, 24),
(9, 25),
(9, 26),
(9, 27),
(10, 28),
(10, 29),
(10, 30),
(11, 31),
(11, 32),
(11, 33),
(12, 34),
(12, 35),
(12, 36),
(13, 37),
(13, 38),
(13, 39),
(14, 40),
(14, 41),
(14, 42),
(15, 43),
(15, 44),
(15, 45),
(16, 46),
(16, 47),
(16, 48),
(17, 49),
(17, 50),
(17, 51),
(18, 52),
(18, 53),
(18, 54),
(19, 55),
(19, 56),
(19, 57),
(20, 58),
(20, 59),
(20, 60);

-- --------------------------------------------------------

--
-- Struttura della tabella `movie_director`
--

CREATE TABLE `movie_director` (
  `movie_id` int NOT NULL,
  `director_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `movie_director`
--

INSERT INTO `movie_director` (`movie_id`, `director_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20);

-- --------------------------------------------------------

--
-- Struttura della tabella `movie_genre`
--

CREATE TABLE `movie_genre` (
  `movie_id` int NOT NULL,
  `genre_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `movie_genre`
--

INSERT INTO `movie_genre` (`movie_id`, `genre_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20);

-- --------------------------------------------------------

--
-- Struttura della tabella `movie_user`
--

CREATE TABLE `movie_user` (
  `user_id` int NOT NULL,
  `movie_id` int NOT NULL,
  `rating` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `movie_user`
--

INSERT INTO `movie_user` (`user_id`, `movie_id`, `rating`) VALUES
(1, 1, 4),
(2, 1, 5),
(3, 1, 1),
(1, 2, 4),
(2, 2, 2),
(1, 3, 5),
(3, 4, 2),
(1, 5, 2),
(2, 5, 4),
(1, 8, 3),
(2, 8, 5),
(3, 8, 5),
(3, 9, 3),
(1, 10, 5),
(2, 12, 4),
(2, 13, 1),
(3, 13, 2),
(2, 14, 2),
(1, 15, 2),
(2, 15, 3),
(1, 17, 1),
(3, 18, 5),
(3, 19, 4),
(3, 20, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `registration_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `registration_date`) VALUES
(1, 'user', '1', 'user1@gimail.com', 'user1', '2024-01-02 00:00:00'),
(2, 'user', '2', 'user2@gimail.com', 'user2', '2024-01-16 09:13:13'),
(3, 'user', '3', 'user3@gimail.com', 'user3', '2023-10-03 09:13:38');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `movie_actor`
--
ALTER TABLE `movie_actor`
  ADD PRIMARY KEY (`movie_id`,`actor_id`),
  ADD KEY `id_actor` (`actor_id`);

--
-- Indici per le tabelle `movie_director`
--
ALTER TABLE `movie_director`
  ADD PRIMARY KEY (`movie_id`,`director_id`),
  ADD KEY `id_director` (`director_id`);

--
-- Indici per le tabelle `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD PRIMARY KEY (`movie_id`,`genre_id`),
  ADD KEY `id_genre` (`genre_id`);

--
-- Indici per le tabelle `movie_user`
--
ALTER TABLE `movie_user`
  ADD PRIMARY KEY (`user_id`,`movie_id`,`rating`) USING BTREE,
  ADD KEY `movie_id` (`movie_id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `actor`
--
ALTER TABLE `actor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT per la tabella `director`
--
ALTER TABLE `director`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT per la tabella `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT per la tabella `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `movie_actor`
--
ALTER TABLE `movie_actor`
  ADD CONSTRAINT `movie_actor_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`),
  ADD CONSTRAINT `movie_actor_ibfk_2` FOREIGN KEY (`actor_id`) REFERENCES `actor` (`id`);

--
-- Limiti per la tabella `movie_director`
--
ALTER TABLE `movie_director`
  ADD CONSTRAINT `movie_director_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`),
  ADD CONSTRAINT `movie_director_ibfk_2` FOREIGN KEY (`director_id`) REFERENCES `director` (`id`);

--
-- Limiti per la tabella `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD CONSTRAINT `movie_genre_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`),
  ADD CONSTRAINT `movie_genre_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`);

--
-- Limiti per la tabella `movie_user`
--
ALTER TABLE `movie_user`
  ADD CONSTRAINT `movie_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `movie_user_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
