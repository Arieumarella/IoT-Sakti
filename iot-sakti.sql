-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 15 Nov 2020 pada 18.20
-- Versi server: 10.4.12-MariaDB-log
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iot-sakti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `idx` int(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`idx`, `name`, `username`, `password`, `created_at`) VALUES
(9, 'Arie', 'Arie', '026372ae33d2083cb9d466bb5412379f', '2020-11-11 11:44:08'),
(11, 'iya', 'iya', '00e11252db1051387c47521767296b42', '2020-11-11 15:28:36'),
(14, 'dfgdfgszd', 'xgfdgfdxzddz', '83d6cfd9959da718e6f9bfbb989494d6', '2020-11-13 23:00:45'),
(15, 'simen', 'simen', '2d5b54ae33650083f4cd74fda556268f', '2020-11-13 23:09:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `device`
--

CREATE TABLE `device` (
  `idx` int(20) NOT NULL,
  `name_device` varchar(255) DEFAULT NULL,
  `device_status` enum('daftar','ready') DEFAULT NULL,
  `device_key` varchar(255) DEFAULT NULL,
  `id_sidikJari` text DEFAULT NULL,
  `status_door` enum('open','close') DEFAULT NULL,
  `respon_mikrokonroler1` text DEFAULT NULL,
  `respon_mikrokonroler2` text DEFAULT NULL,
  `respon_mikrokonroler3` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `device`
--

INSERT INTO `device` (`idx`, `name_device`, `device_status`, `device_key`, `id_sidikJari`, `status_door`, `respon_mikrokonroler1`, `respon_mikrokonroler2`, `respon_mikrokonroler3`, `created_at`) VALUES
(15, 'Kamar Mandi', NULL, 'DC-97811', '111', 'open', '0', '0', NULL, '2020-11-11 03:40:45'),
(20, 'Kamar Ari', 'daftar', 'DC-49711', '0', 'close', '0', '0', '0', '2020-11-13 21:15:39'),
(22, 'Kamar Aldi', 'ready', 'DC-86449', NULL, 'close', NULL, NULL, NULL, '2020-11-15 14:44:13'),
(23, 'Kamar Opik', 'daftar', 'DC-43922', NULL, 'close', NULL, NULL, NULL, '2020-11-15 14:44:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `record_tap`
--

CREATE TABLE `record_tap` (
  `idx` int(100) NOT NULL,
  `id_device` int(20) DEFAULT NULL,
  `id_user` int(20) DEFAULT NULL,
  `tap_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `record_tap`
--

INSERT INTO `record_tap` (`idx`, `id_device`, `id_user`, `tap_time`) VALUES
(1, 15, 84, NULL),
(2, 15, 84, '2020-11-11 14:49:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `idx` int(20) NOT NULL,
  `id_device` int(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `data_sidik_jari` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`idx`, `id_device`, `name`, `username`, `password`, `data_sidik_jari`, `created_at`) VALUES
(84, 20, 'Sakti', 'Sakti', 'a443eea077c2073af2e138edc4db6c88', '1', '2020-11-11 14:21:59'),
(114, 15, '087851484752', 'asd', '7815696ecbf1c96e6894b779456d330e', '11', '2020-11-15 14:26:57'),
(115, 15, '1', '1', 'c4ca4238a0b923820dcc509a6f75849b', '111', '2020-11-15 20:18:46');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idx`),
  ADD KEY `idx` (`idx`);

--
-- Indeks untuk tabel `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`idx`);

--
-- Indeks untuk tabel `record_tap`
--
ALTER TABLE `record_tap`
  ADD PRIMARY KEY (`idx`),
  ADD KEY `id_device` (`id_device`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idx`),
  ADD KEY `id_device` (`id_device`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `idx` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `device`
--
ALTER TABLE `device`
  MODIFY `idx` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `record_tap`
--
ALTER TABLE `record_tap`
  MODIFY `idx` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `idx` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `record_tap`
--
ALTER TABLE `record_tap`
  ADD CONSTRAINT `record_tap_ibfk_1` FOREIGN KEY (`id_device`) REFERENCES `device` (`idx`),
  ADD CONSTRAINT `record_tap_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`idx`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_device`) REFERENCES `device` (`idx`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
