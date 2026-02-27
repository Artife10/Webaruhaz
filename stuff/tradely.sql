-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2026. Feb 20. 11:23
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
(0, 1, 1, 'Gamer Laptop', 'RTX 3060, 16GB RAM, villámgyors.', 'Budapest', 350000, 'https://thumbs.dreamstime.com/b/modern-gaming-laptop-mockup-side-view-isolated-white-background-402342273.jpg'),
(0, 2, 2, 'Nyári Ruha', 'Könnyed pamut viselet, virágmintás.', 'Pécs', 8500, 'https://st3.depositphotos.com/3966821/16113/i/450/depositphotos_161132796-stock-photo-summer-beach-outfit.jpg'),
(0, 3, 4, 'Teniszütő', 'Profi Wilson ütő, alig használt.', 'Győr', 22000, 'https://www.regiojatek.hu/data/regio_images/normal2/07978_0.jpg'),
(0, 1, 3, 'Kávéfőző', 'Darálós automata gép.', 'Budapest', 95000, 'https://img.jofogas.hu/620x620aspect/Philips_EP_1200_kavefozo_automata_daralos_kavegep_727492754562689.jpg'),
(0, 2, 1, 'iPhone 13 Pro', '128GB, kék, karcmentes állapotban, akku 88%.', 'Pécs', 210000, 'https://i.redd.it/iphone-13-pro-max-from-facebook-marketplace-v0-srr9p9x5yoqd1.jpg?width=1182&format=pjpg&auto=webp&s=1341484848e4ac18cee184cb570d8cf067e7f11b'),
(0, 3, 5, 'LEGO Star Wars Millennium Falcon', 'Bontatlan csomagolásban, gyűjtői darab.', 'Győr', 55000, 'https://kockavilag.hu/pics/1637340046_2870399566197d38e130ce_0.jpg'),
(0, 1, 3, 'Kerti Grill', 'Faszenes, gurulós kivitel, egyszer használt.', 'Budapest', 32000, 'https://voicesofthevoid.wiki.gg/images/Item_BBQGrill_Ingame_Transparent.png?5732f3'),
(0, 2, 2, 'Bőrdzseki', 'Valódi marhabőr, fekete, M-es méret.', 'Szeged', 45000, 'https://img.joomcdn.net/096c4460ff6caea0320cf1be794fbdc62384f5da_1024_1024.jpeg'),
(0, 3, 4, 'Hegyi Kerékpár', '26-os kerekek, Shimano váltó, tárcsafék.', 'Miskolc', 115000, 'https://kreativkocka.cdn.shoprenter.hu/custom/kreativkocka/image/cache/w1600h1100wt1/Parts/4719c02re.png.webp?lastmod=1719499422.1667404517'),
(0, 1, 1, 'Bluetooth Hangszóró', 'JBL Charge 5, vízálló, hordozható.', 'Budapest', 42000, 'https://webshop.orion.hu/1672/hordozhato-bluetooth-hangszoro-fm-radioval-opbs-1766.jpg'),
(0, 2, 5, 'Társasjáték Csomag', 'Catan és Dixit, újszerű állapotban.', 'Székesfehérvár', 15000, 'https://okosjatek.cdn.shoprenter.hu/custom/okosjatek/image/cache/w900h900wt1q85/product/Szandi/g%C3%A9mklub/dixit/dixit-tarsasjatek.jpg.webp?lastmod=1720423508.1685028474'),
(0, 3, 3, 'Állólámpa', 'Modern, szabályozható fényerővel.', 'Veszprém', 18000, 'https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcShsodIz-Phx6J9wJRoXigO713oV29oztDqiMMiLK02LgFCVJ7FcrDsm_eaqI_BvKC5Af7TNKdo5pZ7MsiWsJRQlGPKncJv_0l_-PCHILg_tSWWBGylGqRa'),
(0, 1, 4, 'Súlyzó készlet', '2x10 kg, öntöttvas tárcsákkal.', 'Budapest', 25000, 'https://s8.badu.bg/photos/886687/400x400_657b07de29ebc.jpg'),
(0, 2, 2, 'Nike Futócipő', 'Air Zoom, 42-es méret, neon zöld.', 'Pécs', 28500, 'https://www.futanet.hu/img/up/pic_15004.jpg'),
(0, 0, 2, 'Tükör (nagy)', 'Hatalmas tükör eladó csak kp vagy tesco kupon', 'Cserkeszőlő', 12000, 'https://kep.index.hu/1/0/4266/42667/426677/42667714_fd64f7b5a83c91e219855de9a40aca08_wm.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nev` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `pfp` varchar(64) NOT NULL
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
