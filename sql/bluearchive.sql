-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2023 pada 04.13
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bluearchive`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `chara`
--

CREATE TABLE `chara` (
  `id` int(10) NOT NULL,
  `fotoicon` varchar(255) NOT NULL,
  `fotoportrait` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `schoolclub` varchar(255) NOT NULL,
  `releasedate` date NOT NULL,
  `va` varchar(255) NOT NULL,
  `rarity` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `atktype` varchar(255) NOT NULL,
  `armortype` varchar(255) NOT NULL,
  `combatclass` varchar(255) NOT NULL,
  `weapontype` varchar(255) NOT NULL,
  `urban` varchar(255) NOT NULL,
  `outdoor` varchar(255) NOT NULL,
  `indoor` varchar(255) NOT NULL,
  `tierlist` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `chara`
--

INSERT INTO `chara` (`id`, `fotoicon`, `fotoportrait`, `nama`, `fullname`, `school`, `schoolclub`, `releasedate`, `va`, `rarity`, `role`, `position`, `atktype`, `armortype`, `combatclass`, `weapontype`, `urban`, `outdoor`, `indoor`, `tierlist`) VALUES
(1, 'shiroko.jpg', 'shiroko.jpg', 'Shiroko', 'Sunaookami Shiroko', 'Abydos', 'Foreclosure Task Force', '2021-02-04', 'Ogura Yui / 小倉唯', '3', 'Attacker', 'Middle', 'Explosive', 'Light', 'Striker', 'AR', 'S', 'A', 'B', 'S'),
(3, '6479cf535510f.jpg', '6479cf53555ac.jpg', 'Serika', 'Kuromi Serika', 'Abydos', 'Foreclosure Task Force', '2021-02-04', 'Ohashi Ayaka / 大橋彩香', '2', 'Attacker', 'Middle', 'Explosive', 'Light', 'Striker', 'AR', 'S', 'B', 'S', 'A'),
(4, '647c0dbaa0efc.jpg', '647c0dbaa182d.jpg', 'Serika New Year', 'Kuromi Serika New Year', 'Abydos', 'Foreclosure Task Force', '2022-01-12', 'Ohashi Ayaka / 大橋彩香', '3', 'Support', 'Back', 'Penetration', 'Special', 'Special', 'AR', 'B', 'B', 'S', 'B'),
(5, '647c11be8f2d9.jpg', '647c11be8fcad.jpg', 'Shiroko Riding', 'Sunaookami Shiroko Riding', 'Abydos', 'Foreclosure Task Force', '2021-08-12', 'Ogura Yui / 小倉唯', '3', 'Attacker', 'Middle', 'Mystic', 'Heavy', 'Striker', 'AR', 'S', 'A', 'B', 'C'),
(6, '647c179e70398.jpg', '647c179e708e3.jpg', 'Ayane', 'Okusora Ayane', 'Abydos', 'Foreclosure Task Force', '2021-02-04', 'Harada Sayaka / 原田 彩楓', '1', 'Healer', 'Back', 'Penetration', 'Light', 'Special', 'HG', 'B', 'S', 'S', 'A'),
(7, '647c27ba3aa7c.jpg', '647c27ba3ad72.jpg', 'Ayane Swimsuit', 'Okusora Ayane Swimsuit', 'Abydos', 'Foreclosure Task Force', '2022-06-22', 'Harada Sayaka / 原田彩楓', '1', 'Tactical Support', 'Back', 'Penetration', 'Light', 'Special', 'HG', 'B', 'S', 'A', 'S+');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id` int(10) NOT NULL,
  `current` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id`, `current`, `foto`, `judul`, `tanggal`) VALUES
(2, 'Event', 'hot_spring_resort_no277.jpg', 'Hot Springs Resort', '30.05.2023 - 06.06.2023'),
(3, 'Event', 'double_rewards_lesson.png', 'Double Reward Lesson', '29.05.2023 - 05.06.2023'),
(6, 'Event', '6479565e117b6.png', 'Double Rewards Scrimmage', '29.05.2023 - 05.06.2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gacha`
--

CREATE TABLE `gacha` (
  `id` int(10) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gacha`
--

INSERT INTO `gacha` (`id`, `foto`, `banner`, `tanggal`) VALUES
(2, 'cherino_hotspring_banner.png', 'Cherino Hot Spring', '30.05.2023 - 06.06.2023'),
(3, 'chinatsu_hotspring_banner.png', 'Chinatsu Hot Spring', '30.05.2023 - 06.06.2023'),
(4, 'nodoka_hotspring_banner.png', 'Nodoka Hot Spring', '30.05.2023 - 06.06.2023'),
(8, '6479c47fe4733.png', 'Shigure', '30.05.2023 - 06.06.2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(9, 'flixx', '$2y$10$S0MWK8MQ7iwSSM..aadUcO5C4MSbxHPxUIgHJkt2lXlVoUUKUmfvW');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `chara`
--
ALTER TABLE `chara`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gacha`
--
ALTER TABLE `gacha`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `chara`
--
ALTER TABLE `chara`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `gacha`
--
ALTER TABLE `gacha`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
