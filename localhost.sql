-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 07 Sty 2021, 16:21
-- Wersja serwera: 10.3.16-MariaDB
-- Wersja PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `id12109130_inzynier`
--
CREATE DATABASE IF NOT EXISTS `id12109130_inzynier` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id12109130_inzynier`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komunikaty`
--

CREATE TABLE `komunikaty` (
  `k_id` int(11) NOT NULL,
  `k_u_id` int(11) NOT NULL,
  `k_tresc` text COLLATE utf8mb4_polish_ci NOT NULL,
  `k_rodzaj` text COLLATE utf8mb4_polish_ci NOT NULL,
  `k_w_id` int(11) NOT NULL,
  `k_czas` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `komunikaty`
--

INSERT INTO `komunikaty` (`k_id`, `k_u_id`, `k_tresc`, `k_rodzaj`, `k_w_id`, `k_czas`) VALUES
(1, 1, 'Gracz potrzebuje pomocy medycznej', 'allert', 1, '2020-03-20 14:33:19'),
(2, 1, 'Zbiórka w miejscu bezpiecznym', 'warning', 1, '2020-12-30 11:53:46'),
(3, 1, 'Powrót na pozycje startowe', 'info', 1, '2020-12-30 11:53:48'),
(4, 1, 'Koniec rundy', 'primary', 1, '2020-12-30 11:53:49');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uczestnicy`
--

CREATE TABLE `uczestnicy` (
  `u_id` int(11) NOT NULL,
  `u_id_wyd` int(11) NOT NULL,
  `u_id_user` int(11) NOT NULL,
  `u_team` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `uczestnicy`
--

INSERT INTO `uczestnicy` (`u_id`, `u_id_wyd`, `u_id_user`, `u_team`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `nazwa` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(256) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`userID`, `nazwa`, `haslo`, `email`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@mail.com'),
(2, 'user', 'e10adc3949ba59abbe56e057f20f883e', 'User@mail.pl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wiadomosci`
--

CREATE TABLE `wiadomosci` (
  `wi_id` int(11) NOT NULL,
  `wi_u_id` int(11) NOT NULL,
  `wi_tresc` text COLLATE utf8mb4_polish_ci NOT NULL,
  `wi_w_id` int(11) NOT NULL,
  `wi_czas` datetime NOT NULL,
  `wi_team` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `wiadomosci`
--

INSERT INTO `wiadomosci` (`wi_id`, `wi_u_id`, `wi_tresc`, `wi_w_id`, `wi_czas`, `wi_team`) VALUES
(1, 2, 'Atakuj środkiem', 1, '2020-07-14 21:07:30', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wydarzenie`
--

CREATE TABLE `wydarzenie` (
  `w_ID` int(11) NOT NULL,
  `w_nazwa` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `w_woj` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `w_mie` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `w_data_roz` date NOT NULL,
  `w_data_zak` date NOT NULL,
  `w_godz_st` time NOT NULL,
  `w_godz_ko` time NOT NULL,
  `w_typ` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `w_opis_krot` varchar(250) COLLATE utf8mb4_polish_ci NOT NULL,
  `w_opis_dlug` varchar(1000) COLLATE utf8mb4_polish_ci NOT NULL,
  `w_org_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `wydarzenie`
--

INSERT INTO `wydarzenie` (`w_ID`, `w_nazwa`, `w_woj`, `w_mie`, `w_data_roz`, `w_data_zak`, `w_godz_st`, `w_godz_ko`, `w_typ`, `w_opis_krot`, `w_opis_dlug`, `w_org_id`) VALUES
(1, 'asfsf', 'dolnośląskie', 'fdsfsd', '2020-03-25', '2020-03-27', '13:12:00', '03:31:00', 'ASG', 'sdfsdf', 'fsdfsd', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `komunikaty`
--
ALTER TABLE `komunikaty`
  ADD PRIMARY KEY (`k_id`),
  ADD KEY `k_u_id` (`k_u_id`,`k_w_id`),
  ADD KEY `k_w_id` (`k_w_id`);

--
-- Indeksy dla tabeli `uczestnicy`
--
ALTER TABLE `uczestnicy`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `u_id_wyd` (`u_id_wyd`,`u_id_user`),
  ADD KEY `u_id_user` (`u_id_user`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indeksy dla tabeli `wiadomosci`
--
ALTER TABLE `wiadomosci`
  ADD PRIMARY KEY (`wi_id`),
  ADD KEY `wi_u_id` (`wi_u_id`,`wi_w_id`),
  ADD KEY `wi_w_id` (`wi_w_id`);

--
-- Indeksy dla tabeli `wydarzenie`
--
ALTER TABLE `wydarzenie`
  ADD PRIMARY KEY (`w_ID`),
  ADD KEY `w_org_id` (`w_org_id`);

--
-- AUTO_INCREMENT dla tabel zrzutów
--

--
-- AUTO_INCREMENT dla tabeli `komunikaty`
--
ALTER TABLE `komunikaty`
  MODIFY `k_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `uczestnicy`
--
ALTER TABLE `uczestnicy`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `wiadomosci`
--
ALTER TABLE `wiadomosci`
  MODIFY `wi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `wydarzenie`
--
ALTER TABLE `wydarzenie`
  MODIFY `w_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `komunikaty`
--
ALTER TABLE `komunikaty`
  ADD CONSTRAINT `komunikaty_ibfk_1` FOREIGN KEY (`k_w_id`) REFERENCES `wydarzenie` (`w_ID`),
  ADD CONSTRAINT `komunikaty_ibfk_2` FOREIGN KEY (`k_u_id`) REFERENCES `user` (`userID`);

--
-- Ograniczenia dla tabeli `uczestnicy`
--
ALTER TABLE `uczestnicy`
  ADD CONSTRAINT `uczestnicy_ibfk_1` FOREIGN KEY (`u_id_wyd`) REFERENCES `wydarzenie` (`w_ID`),
  ADD CONSTRAINT `uczestnicy_ibfk_2` FOREIGN KEY (`u_id_user`) REFERENCES `user` (`userID`);

--
-- Ograniczenia dla tabeli `wiadomosci`
--
ALTER TABLE `wiadomosci`
  ADD CONSTRAINT `wiadomosci_ibfk_1` FOREIGN KEY (`wi_w_id`) REFERENCES `wydarzenie` (`w_ID`),
  ADD CONSTRAINT `wiadomosci_ibfk_2` FOREIGN KEY (`wi_u_id`) REFERENCES `user` (`userID`);

--
-- Ograniczenia dla tabeli `wydarzenie`
--
ALTER TABLE `wydarzenie`
  ADD CONSTRAINT `wydarzenie_ibfk_1` FOREIGN KEY (`w_org_id`) REFERENCES `user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
