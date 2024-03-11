-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Már 11. 09:00
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `autopalyamatrica`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `autok`
--

CREATE TABLE `autok` (
  `auto_id` int(11) NOT NULL,
  `gyarto` varchar(512) NOT NULL,
  `tipus` varchar(512) NOT NULL,
  `rendszam` varchar(512) NOT NULL,
  `gyartasi_ev` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `autok`
--

INSERT INTO `autok` (`auto_id`, `gyarto`, `tipus`, `rendszam`, `gyartasi_ev`) VALUES
(1, 'Opel', 'Astra', 'ABC123', 2008),
(2, 'Opel', 'Astra', 'ABC456', 1998),
(3, 'Opel', 'Astra', 'ABC123', 1998),
(4, 'Opel', 'Astra', 'ABC456', 2000),
(5, 'Ford', 'Focus', 'FGH123', 1999),
(6, 'Ford', 'Fiesta', 'QWE345', 2005),
(7, 'BMW', 'M5', 'RTZ987', 1997);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `matricak`
--

CREATE TABLE `matricak` (
  `matrica_id` int(11) NOT NULL,
  `auto_id` int(11) DEFAULT NULL,
  `lejarat` date NOT NULL,
  `matrica_tipus` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `matricak`
--

INSERT INTO `matricak` (`matrica_id`, `auto_id`, `lejarat`, `matrica_tipus`) VALUES
(1, 3, '2024-04-07', '1 hónapos'),
(2, 2, '2025-03-07', '1 éves'),
(3, 5, '2024-04-07', '1 hónapos');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1709641944),
('m130524_201442_init', 1709642031),
('m190124_110200_add_verification_token_column_to_user_table', 1709642031),
('m240305_131410_create_autok_table', 1709644791),
('m240307_104604_create_matricak_table', 1709808588);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'test', 'PvfkQVtMJNjcztR13ALA_mSfVjouL_nN', '$2y$13$7MxKonUybxeq9HT9EeUCC.4wcqxz9XkTRkU7RwsM7kDsH6IkRNRem', NULL, 'test@test.com', 10, 1709642091, 1709642152, 'kksSqcrUDFNDCsJtq5qvHpW2_ids9Qbt_1709642091');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `autok`
--
ALTER TABLE `autok`
  ADD PRIMARY KEY (`auto_id`);

--
-- A tábla indexei `matricak`
--
ALTER TABLE `matricak`
  ADD PRIMARY KEY (`matrica_id`),
  ADD KEY `idx-matricak-auto_id` (`auto_id`);

--
-- A tábla indexei `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `autok`
--
ALTER TABLE `autok`
  MODIFY `auto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `matricak`
--
ALTER TABLE `matricak`
  MODIFY `matrica_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `matricak`
--
ALTER TABLE `matricak`
  ADD CONSTRAINT `fk-matricak-auto_id` FOREIGN KEY (`auto_id`) REFERENCES `autok` (`auto_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
