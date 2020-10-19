-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Okt 2020 pada 08.25
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
  `tanggal_data` varchar(50) NOT NULL,
  `ket` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`id_data`, `id_skp`, `nip`, `file`, `tanggal_data`, `ket`) VALUES
(14, 15, '17024051', 'Pengumuman efkw2.pdf', ' 2020-10-18 20:22:22', ''),
(15, 16, '789', 'RINGKASAN PRAKTEK je.pdf', ' 2020-10-18 20:41:53', '');

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

--
-- Dumping data untuk tabel `kegiatan_pegawai`
--

INSERT INTO `kegiatan_pegawai` (`id_kegiatan`, `nip`, `id_skp`, `kegiatan`, `tanggal`) VALUES
(10, '678', 15, ' kegiatan pegawai', ' 2020-10-18 19:51:07'),
(11, '678', 16, 'kegiatan 2', ' 2020-10-14 14:30:49'),
(14, '789', 16, 'yang di lakukan hari ini adalah menginisialisasi data data terdahulu ', ' 2020-10-14 16:59:10');

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
(9, 'wahyu lamani', '17024051', '$2y$10$/8gpRU1Nab2OR5LBbNxQl.SW2vVnjDcmdMijZx5u.9JtmK7OMHin2', 'mahasiswa', '5f8ac36dd6988.png'),
(23, 'staff', '789', '$2y$10$DEB0BA.ovIt0x/yTmHUci.J5pjIcGkNgFt.7eyIpSuxGICPa8bfBm', 'staff', '5f8ac82655f69.jpg'),
(33, 'Admin', '678', '$2y$10$Z0JHwPXOP/TFe9keJu7wqeWhwxaVU.b5hG1ORvgtlMUbDIM637Jui', 'admin', 'default.png');

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

--
-- Dumping data untuk tabel `skp`
--

INSERT INTO `skp` (`id_skp`, `uraian`, `target`, `satuan`) VALUES
(15, 'Merumuskan Revisi RENSTRA 2019-2020', 1, 'dokumen'),
(16, 'Merumuskan dokumen perencanaan pengangguran', 1, 'dokumen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wewenang`
--

CREATE TABLE `wewenang` (
  `nip` varchar(18) NOT NULL,
  `role_pegawai` enum('staff','admin') NOT NULL,
  `user_is` enum('nonaktif','aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wewenang`
--

INSERT INTO `wewenang` (`nip`, `role_pegawai`, `user_is`) VALUES
('12345', 'staff', 'nonaktif'),
('17024051', 'admin', 'aktif'),
('678', 'admin', 'aktif'),
('789', 'staff', 'aktif'),
('890', 'staff', 'nonaktif');

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
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `kegiatan_pegawai`
--
ALTER TABLE `kegiatan_pegawai`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `skp`
--
ALTER TABLE `skp`
  MODIFY `id_skp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
