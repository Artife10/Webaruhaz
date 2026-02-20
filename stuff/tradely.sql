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

INSERT INTO `termek` (`userid`, `katid`, `termeknev`, `leiras`, `hely`, `ar`, `kep`) VALUES 
(1, 1, 'Gamer Laptop', 'RTX 3060, 16GB RAM, villámgyors.', 'Budapest', 350000, "https://thumbs.dreamstime.com/b/modern-gaming-laptop-mockup-side-view-isolated-white-background-402342273.jpg"),
(2, 2, 'Nyári Ruha', 'Könnyed pamut viselet, virágmintás.', 'Pécs', 8500, 'https://st3.depositphotos.com/3966821/16113/i/450/depositphotos_161132796-stock-photo-summer-beach-outfit.jpg'),
(3, 4, 'Teniszütő', 'Profi Wilson ütő, alig használt.', 'Győr', 22000, 'https://www.regiojatek.hu/data/regio_images/normal2/07978_0.jpg'),
(1, 3, 'Kávéfőző', 'Darálós automata gép.', 'Budapest', 95000, 'https://img.jofogas.hu/620x620aspect/Philips_EP_1200_kavefozo_automata_daralos_kavegep_727492754562689.jpg');


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
