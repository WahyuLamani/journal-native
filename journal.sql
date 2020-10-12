-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Okt 2020 pada 12.57
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `journal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `id_data` int(11) NOT NULL,
  `id_skp` int(11) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `file` varchar(256) NOT NULL,
  `tanggal_data` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_pegawai`
--

CREATE TABLE `kegiatan_pegawai` (
  `id_kegiatan` int(11) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `id_skp` int(11) NOT NULL,
  `kegiatan` varchar(256) NOT NULL,
  `tanggal` varchar(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(4) NOT NULL,
  `nama` varchar(52) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `password` varchar(256) NOT NULL,
  `jabatan` varchar(52) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `nip`, `password`, `jabatan`, `gambar`) VALUES
(9, 'wahyu lamani', '17024051', '$2y$10$/8gpRU1Nab2OR5LBbNxQl.SW2vVnjDcmdMijZx5u.9JtmK7OMHin2', 'mahasiswa', '5f7b31d3c3b8a.jpg'),
(23, 'staff', '789', '$2y$10$DEB0BA.ovIt0x/yTmHUci.J5pjIcGkNgFt.7eyIpSuxGICPa8bfBm', 'staff', '5f84287914f36.jpg'),
(25, 'test', '678', '$2y$10$Z.qU0tWLtyI.uuwIVGz/BOCkVjvbLX9nwAhX64meFevZRXSQOh3D.', 'test', ''),
(28, 'WAHYU', '031299', '$2y$10$rY3LIWw73ZBak2aVdQSU6e/KxAm3gAkDAKNAt1yHiMRHWFFXZEvnG', 'MAHASISWA SEM 7', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skp`
--

CREATE TABLE `skp` (
  `id_skp` int(11) NOT NULL,
  `uraian` varchar(256) NOT NULL,
  `target` int(10) NOT NULL,
  `satuan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `wewenang`
--

CREATE TABLE `wewenang` (
  `nip` varchar(18) NOT NULL,
  `role_pegawai` enum('admin','staff') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wewenang`
--

INSERT INTO `wewenang` (`nip`, `role_pegawai`) VALUES
('031299', 'admin'),
('123', 'admin'),
('17024051', 'admin'),
('197003091990111000', 'admin'),
('678', 'admin'),
('789', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id_data`),
  ADD KEY `id_skp` (`id_skp`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `kegiatan_pegawai`
--
ALTER TABLE `kegiatan_pegawai`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_skp` (`id_skp`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `skp`
--
ALTER TABLE `skp`
  ADD PRIMARY KEY (`id_skp`);

--
-- Indeks untuk tabel `wewenang`
--
ALTER TABLE `wewenang`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data`
--
ALTER TABLE `data`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kegiatan_pegawai`
--
ALTER TABLE `kegiatan_pegawai`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `skp`
--
ALTER TABLE `skp`
  MODIFY `id_skp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_ibfk_1` FOREIGN KEY (`id_skp`) REFERENCES `skp` (`id_skp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kegiatan_pegawai`
--
ALTER TABLE `kegiatan_pegawai`
  ADD CONSTRAINT `kegiatan_pegawai_ibfk_2` FOREIGN KEY (`id_skp`) REFERENCES `skp` (`id_skp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kegiatan_pegawai_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `wewenang` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
