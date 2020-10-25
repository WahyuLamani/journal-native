-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Okt 2020 pada 17.23
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
-- Struktur dari tabel `bagian`
--

CREATE TABLE `bagian` (
  `id_bagian` int(11) NOT NULL,
  `uraian` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bagian`
--

INSERT INTO `bagian` (`id_bagian`, `uraian`) VALUES
(1, 'Bagian Perencanaan Kerja Sama Dan Humas'),
(2, 'Bagian Testing 1'),
(3, 'Bagian Testing 2\r\n');

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
(20, 30, '17024051', 'DAFTAR  KEGIATAN  MAHASISWA  PKL_ID.docx', ' 2020-10-21 23:25:14', ''),
(21, 30, '123', 'Latihan2_KD.pdf', ' 2020-10-22 13:02:23', ''),
(22, 31, '123', 'Latihan2_UB.pdf', ' 2020-10-22 13:02:43', '');

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
(18, '17024051', 30, 'Memvalidasi data Institusi', ' 2020-10-21 23:01:59'),
(19, '17024051', 31, 'Membuat data Rincian perjanjian', ' 2020-10-21 23:02:24'),
(20, '123', 30, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, sint!', ' 2020-10-22 13:00:37'),
(21, '123', 31, 'Lorem ipsum dolor sit.', ' 2020-10-22 13:02:09'),
(22, '123', 30, 'Lorem ipsum dolor sit amet consectetur.', ' 2020-10-22 13:01:36');

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
(9, 'wahyu lamani', '17024051', '$2y$10$/8gpRU1Nab2OR5LBbNxQl.SW2vVnjDcmdMijZx5u.9JtmK7OMHin2', 'mahasiswa', '5f900a969d361.jpg'),
(39, 'Admin', '111', '$2y$10$KFW0iG5fFL0NgdIcdBDctOp5oTzG/7y6vaC5KGaqyYfPluPFdXKaS', 'admin', 'default.png'),
(40, 'test', '999', '$2y$10$5.THGP4YdTr0xCO9ffx6NOOQLbJJnh24zs65MZGTYHQlE9cuf/s6q', 'test', 'default.png'),
(41, 'staf', '123', '$2y$10$5WqBi3.Vb3d/Qkecowzw2ug2GWATioIP5I1HOWdI7ABGVxwmfg2uC', 'staf', 'default.png'),
(42, 'Admin bagian 1', '12345', '$2y$10$vjMms2juh0uYhooeQnAMge4.Hmm7LZ3Q9VKyxjHlr1XTtyIV2PqCi', 'bagian 1', 'default.png'),
(43, 'admin bagian 2', '123456', '$2y$10$6/gkE57MsrWFYtd4kMsgLuZBRYLbFmuT2anYcVbmECUNgdOwcIAoy', 'bagian 2', 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skp`
--

CREATE TABLE `skp` (
  `id_skp` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `uraian` varchar(256) NOT NULL,
  `target` int(10) NOT NULL,
  `satuan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `skp`
--

INSERT INTO `skp` (`id_skp`, `id_bagian`, `uraian`, `target`, `satuan`) VALUES
(30, 1, 'Merumuskan Revisi RENSTRA 2020-2024', 3, 'Dokumen'),
(31, 1, 'Merumuskan Target Kinerja Institusi (Perjanjian Kinerja Institusi)', 3, 'Dokumen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_bagian`
--

CREATE TABLE `sub_bagian` (
  `id_sub_bagian` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `uraian` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sub_bagian`
--

INSERT INTO `sub_bagian` (`id_sub_bagian`, `id_bagian`, `uraian`) VALUES
(3, 1, 'Sub Bagian Kerja Sama'),
(4, 1, 'Sub Bagian Humas'),
(5, 2, 'sub bagian testing 1'),
(6, 2, 'sub bagian testing 1.2'),
(7, 3, 'sub bagian testing 2'),
(8, 3, 'sub bagian testing 2.2\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `id_unit_kerja` int(11) NOT NULL,
  `id_sub_bagian` int(11) NOT NULL,
  `nip` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `unit_kerja`
--

INSERT INTO `unit_kerja` (`id_unit_kerja`, `id_sub_bagian`, `nip`) VALUES
(1, 4, '17024051'),
(4, 3, '111'),
(5, 5, '999'),
(6, 3, '123'),
(7, 5, '12345'),
(8, 7, '123456');

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
('111', 'admin', 'aktif'),
('123', 'staff', 'aktif'),
('12345', 'admin', 'aktif'),
('123456', 'admin', 'aktif'),
('17024051', 'admin', 'aktif'),
('999', 'admin', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id_bagian`);

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
  ADD PRIMARY KEY (`id_skp`),
  ADD KEY `id_bagian` (`id_bagian`);

--
-- Indeks untuk tabel `sub_bagian`
--
ALTER TABLE `sub_bagian`
  ADD PRIMARY KEY (`id_sub_bagian`),
  ADD KEY `id_bagian` (`id_bagian`);

--
-- Indeks untuk tabel `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`id_unit_kerja`),
  ADD KEY `id_sub_bagian` (`id_sub_bagian`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `wewenang`
--
ALTER TABLE `wewenang`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data`
--
ALTER TABLE `data`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `kegiatan_pegawai`
--
ALTER TABLE `kegiatan_pegawai`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `skp`
--
ALTER TABLE `skp`
  MODIFY `id_skp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `sub_bagian`
--
ALTER TABLE `sub_bagian`
  MODIFY `id_sub_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `id_unit_kerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `unit_kerja` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `skp`
--
ALTER TABLE `skp`
  ADD CONSTRAINT `skp_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sub_bagian`
--
ALTER TABLE `sub_bagian`
  ADD CONSTRAINT `sub_bagian_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD CONSTRAINT `unit_kerja_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `wewenang` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unit_kerja_ibfk_2` FOREIGN KEY (`id_sub_bagian`) REFERENCES `sub_bagian` (`id_sub_bagian`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
