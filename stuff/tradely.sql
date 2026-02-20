-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2026. Feb 20. 08:31
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `tradely`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kategoria`
--

CREATE TABLE `kategoria` (
  `katid` int(11) NOT NULL,
  `katnev` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `kategoria`
--

INSERT INTO `kategoria` (`katid`, `katnev`) VALUES
(1, 'Elektronika'),
(2, 'Ruházat'),
(3, 'Otthon és Kert'),
(4, 'Sport'),
(5, 'Játékok');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termek`
--

CREATE TABLE `termek` (
  `termekid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `katid` int(11) DEFAULT NULL,
  `termeknev` varchar(255) NOT NULL,
  `leiras` varchar(255) DEFAULT NULL,
  `hely` varchar(255) DEFAULT NULL,
  `ar` int(11) NOT NULL,
  `kep` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `termek`
--

INSERT INTO `termek` (`termekid`, `userid`, `katid`, `termeknev`, `leiras`, `hely`, `ar`, `kep`) VALUES
(1, 1, 1, 'iPhone 13 Pro', 'Megkímélt állapotban, 128GB, kék színben.', 'Budapest', 220000, 'iphone13.jpg'),
(2, 1, 3, 'IKEA íróasztal', 'Fehér színű, karcmentes állapotú asztal.', 'Budapest', 15000, 'asztal.jpg'),
(3, 2, 2, 'Vintage bőrdzseki', 'Eredeti marhabőr, M-es méret.', 'Debrecen', 25000, 'dzseki.png'),
(4, 3, 4, 'MTB Kerékpár', '29 colos kerekek, Shimano váltóval.', 'Szeged', 110000, 'bringa.jpg'),
(5, 2, 5, 'LEGO Star Wars', 'Millennium Falcon készlet, bontatlan.', 'Debrecen', 45000, 'lego.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `nev` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`userid`, `nev`, `password`) VALUES
(1, 'Kovács János', 'jelszo123'),
(2, 'Nagy Anna', 'anna2024'),
(3, 'Szabó Péter', 'titkos99');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`katid`);

--
-- A tábla indexei `termek`
--
ALTER TABLE `termek`
  ADD PRIMARY KEY (`termekid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `katid` (`katid`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `katid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `termek`
--
ALTER TABLE `termek`
  MODIFY `termekid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
