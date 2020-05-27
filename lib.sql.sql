-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Maj 2020, 19:29
-- Wersja serwera: 10.1.37-MariaDB
-- Wersja PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `library`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `autorzy`
--

CREATE TABLE `autorzy` (
  `id` int(11) NOT NULL,
  `imie` text NOT NULL,
  `nazwisko` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `autorzy`
--

INSERT INTO `autorzy` (`id`, `imie`, `nazwisko`) VALUES
(1, 'Joseph', 'Conrad\r\n'),
(2, ' Miguel', 'Cervantes'),
(3, 'Aleksander', 'Fredro'),
(4, 'Juliusz', 'Slowacki');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `krzyz`
--

CREATE TABLE `krzyz` (
  `id_krzyz` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `id_tytul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `krzyz`
--

INSERT INTO `krzyz` (`id_krzyz`, `id_autor`, `id_tytul`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 3, 4),
(4, 4, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tytuly`
--

CREATE TABLE `tytuly` (
  `id` int(11) NOT NULL,
  `tytul` text NOT NULL,
  `ISBN` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `tytuly`
--

INSERT INTO `tytuly` (`id`, `tytul`, `ISBN`) VALUES
(1, 'Don Kichot', 9781400132171),
(2, 'Jadro ciemnnosci', 9781094013336),
(3, 'Balladyna', 9788304014893),
(4, 'Zemsta', 9788304016934);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `autorzy`
--
ALTER TABLE `autorzy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `krzyz`
--
ALTER TABLE `krzyz`
  ADD PRIMARY KEY (`id_krzyz`),
  ADD KEY `autorzy` (`id_autor`),
  ADD KEY `tytuly` (`id_tytul`);

--
-- Indeksy dla tabeli `tytuly`
--
ALTER TABLE `tytuly`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `autorzy`
--
ALTER TABLE `autorzy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `krzyz`
--
ALTER TABLE `krzyz`
  MODIFY `id_krzyz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `tytuly`
--
ALTER TABLE `tytuly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `krzyz`
--
ALTER TABLE `krzyz`
  ADD CONSTRAINT `autorzy` FOREIGN KEY (`id_autor`) REFERENCES `autorzy` (`id`),
  ADD CONSTRAINT `tytuly` FOREIGN KEY (`id_tytul`) REFERENCES `tytuly` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
