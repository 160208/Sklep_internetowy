-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Sty 2024, 11:05
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id_produktu` int(11) NOT NULL,
  `nazwa` varchar(255) NOT NULL,
  `cena` int(11) NOT NULL,
  `opis` text NOT NULL,
  `numer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`id_produktu`, `nazwa`, `cena`, `opis`, `numer`) VALUES
(1, 'Tort', 100, 'Duży tort', 13),
(2, 'Muffinka', 15, 'Smak - czekoladowa', 25),
(3, 'Sernik', 40, 'wiedeński', 2),
(4, 'Tarta', 14, 'owocowa', 77),
(5, 'Beza', 6, 'marchewkowa', 11),
(16, 'ciasteczka', 33, 'Kolorowe', 71),
(17, 'makowiec', 55, 'Czekoladowy', 99),
(18, 'kawa', 5, 'Super mocna', 88);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `removed`
--

CREATE TABLE `removed` (
  `id_removed` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `nazwa` varchar(255) NOT NULL,
  `cena` int(11) NOT NULL,
  `opis` text NOT NULL,
  `numer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `removed`
--

INSERT INTO `removed` (`id_removed`, `id_user`, `id_product`, `nazwa`, `cena`, `opis`, `numer`) VALUES
(10, 4, 11, 'herbata', 6, 'super', 98),
(11, 4, 13, 'cukier', 4, 'słodki', 49),
(12, 4, 14, 'kawa', 15, 'Super mocna', 32),
(13, 4, 14, 'kawa', 15, 'Super mocna', 32),
(14, 4, 14, 'kawa', 15, 'Super mocna', 32),
(15, 4, 14, 'kawa', 15, 'Super mocna', 32),
(16, 4, 15, 'owoc', 7, 'Duży', 88),
(17, 4, 3, 'Sernik', 40, 'wiedeński', 2),
(18, 4, 14, 'kawa', 15, 'Super mocna', 32),
(19, 4, 8, 'ciasteczka', 10, 'z marmolada', 52),
(20, 4, 14, 'kawa', 15, 'Super mocna', 32),
(21, 4, 6, 'babeczka brownie', 5, 'o smaku brownie ', 16),
(22, 4, 14, 'kawa', 15, 'Super mocna', 32),
(23, 4, 14, 'kawa', 15, 'Super mocna', 32),
(24, 4, 14, 'kawa', 15, 'Super mocna', 32),
(25, 4, 14, 'kawa', 15, 'Super mocna', 32);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `id` int(11) NOT NULL,
  `id_produktu` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `shoppingcart`
--

INSERT INTO `shoppingcart` (`id`, `id_produktu`, `id_user`) VALUES
(64, 2, 5),
(65, 4, 5),
(66, 5, 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `Id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`Id_user`, `username`, `password`, `is_admin`) VALUES
(4, 'admin', '$2y$10$ILfE9m3RhMP8nA/7q0weg.bRb0A4WH.io2nIbTuN4CnqVC5aO4ese', 1),
(5, 'user', '$2y$10$ISnIjsL4St3X4zWxNuD2TOX87iUgs7hp0hVbSnP1MhHfzeBcEb7p.', NULL),
(9, 'mateusz', '$2y$10$hvIPbslWZnFsMyqsj05k0.QuPQcT2O4JxADeQPCmUVDxPP.lwhnEW', NULL),
(11, 'paulina', '$2y$10$Tvv3KblAZGV7PSDaEdQJWudFXm1KbhNNi2IIxXcZrSV0FDY5pn75i', NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_produktu`);

--
-- Indeksy dla tabeli `removed`
--
ALTER TABLE `removed`
  ADD PRIMARY KEY (`id_removed`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeksy dla tabeli `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produktu` (`id_produktu`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `id_produktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT dla tabeli `removed`
--
ALTER TABLE `removed`
  MODIFY `id_removed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT dla tabeli `shoppingcart`
--
ALTER TABLE `shoppingcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `Id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `removed`
--
ALTER TABLE `removed`
  ADD CONSTRAINT `removed_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`Id_user`);

--
-- Ograniczenia dla tabeli `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD CONSTRAINT `shoppingcart_ibfk_1` FOREIGN KEY (`id_produktu`) REFERENCES `products` (`id_produktu`),
  ADD CONSTRAINT `shoppingcart_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`Id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
