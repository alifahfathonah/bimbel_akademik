-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Des 2019 pada 16.35
-- Versi server: 10.1.16-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_absensi`
--

CREATE TABLE `tb_absensi` (
  `id` int(11) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `tgl_absen` date NOT NULL,
  `hari` varchar(50) NOT NULL,
  `keterangan` enum('hadir','tidak','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_absensi`
--

INSERT INTO `tb_absensi` (`id`, `id_daftar`, `tgl_absen`, `hari`, `keterangan`) VALUES
(1, 7, '2019-12-06', 'jumat', 'hadir'),
(2, 8, '2019-12-06', 'jumat', 'hadir'),
(3, 7, '2019-12-05', 'selasa', 'hadir'),
(4, 7, '2019-12-07', 'Sabtu', 'tidak'),
(5, 8, '2019-12-07', 'Sabtu', 'tidak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_bimbel`
--

CREATE TABLE `tb_data_bimbel` (
  `id` int(11) NOT NULL,
  `nama_bimbel` varchar(100) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_data_bimbel`
--

INSERT INTO `tb_data_bimbel` (`id`, `nama_bimbel`, `visi`, `misi`, `gambar`) VALUES
(1, 'Bimbel Lucu Sekali', 'maju', 'Percaya', '1575731335270.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_jadwal`
--

CREATE TABLE `tb_detail_jadwal` (
  `id` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_jadwal`
--

INSERT INTO `tb_detail_jadwal` (`id`, `id_jadwal`, `id_mapel`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_rombel` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `hari` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id`, `id_user`, `id_rombel`, `id_ruang`, `hari`) VALUES
(1, 3, 1, 2, 'senin'),
(2, 3, 1, 3, 'selasa'),
(3, 11, 2, 3, 'rabu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id` int(11) NOT NULL,
  `kode_mapel` varchar(14) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mapel`
--

INSERT INTO `tb_mapel` (`id`, `kode_mapel`, `nama_mapel`) VALUES
(1, 'MTKD', 'Matematika Dasar'),
(2, 'BI', 'Bahasa Indonesia'),
(3, 'SB', 'Seni Budaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_bayar` int(11) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_bayar`, `id_daftar`, `bulan`, `tgl_bayar`, `jumlah`, `keterangan`, `nilai`) VALUES
(13, 7, 'Januari 2019', NULL, 50000, NULL, NULL),
(14, 7, 'February 2019', NULL, 50000, NULL, NULL),
(15, 7, 'Maret 2019', NULL, 50000, NULL, NULL),
(16, 7, 'April 2019', NULL, 50000, NULL, NULL),
(17, 7, 'Mei 2019', NULL, 50000, NULL, NULL),
(18, 7, 'Juni 2019', NULL, 50000, NULL, NULL),
(19, 7, 'Juli 2019', NULL, 50000, NULL, NULL),
(20, 7, 'Agustus 2019', NULL, 50000, NULL, NULL),
(21, 7, 'September 2019', NULL, 50000, NULL, NULL),
(22, 7, 'Oktober 2019', NULL, 50000, NULL, NULL),
(23, 7, 'November 2019', '2019-12-01', 50000, 'Lunas', NULL),
(24, 7, 'Desember 2019', NULL, 50000, NULL, 80),
(25, 8, 'Januari 2019', NULL, 50000, NULL, NULL),
(26, 8, 'February 2019', NULL, 50000, NULL, NULL),
(27, 8, 'Maret 2019', NULL, 50000, NULL, NULL),
(28, 8, 'April 2019', NULL, 50000, NULL, NULL),
(29, 8, 'Mei 2019', NULL, 50000, NULL, NULL),
(30, 8, 'Juni 2019', NULL, 50000, NULL, NULL),
(31, 8, 'Juli 2019', NULL, 50000, NULL, NULL),
(32, 8, 'Agustus 2019', NULL, 50000, NULL, NULL),
(33, 8, 'September 2019', NULL, 50000, NULL, NULL),
(34, 8, 'Oktober 2019', NULL, 50000, NULL, NULL),
(35, 8, 'November 2019', NULL, 50000, NULL, NULL),
(36, 8, 'Desember 2019', '2019-12-01', 50000, 'Lunas', 90),
(37, 9, 'Januari 2019', NULL, 60000, NULL, NULL),
(38, 9, 'February 2019', NULL, 60000, NULL, NULL),
(39, 9, 'Maret 2019', NULL, 60000, NULL, NULL),
(40, 9, 'April 2019', NULL, 60000, NULL, NULL),
(41, 9, 'Mei 2019', NULL, 60000, NULL, NULL),
(42, 9, 'Juni 2019', NULL, 60000, NULL, NULL),
(43, 9, 'Juli 2019', NULL, 60000, NULL, NULL),
(44, 9, 'Agustus 2019', NULL, 60000, NULL, NULL),
(45, 9, 'September 2019', NULL, 60000, NULL, NULL),
(46, 9, 'Oktober 2019', NULL, 60000, NULL, NULL),
(47, 9, 'November 2019', NULL, 60000, NULL, NULL),
(48, 9, 'Desember 2019', '2019-12-07', 60000, 'Lunas', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_rombel` int(11) DEFAULT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`id`, `id_user`, `id_rombel`, `tgl_daftar`) VALUES
(7, 13, 1, '2019-11-29'),
(8, 14, 1, '2019-12-01'),
(9, 15, 2, '2019-12-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rombel`
--

CREATE TABLE `tb_rombel` (
  `id` int(11) NOT NULL,
  `nama_rombel` varchar(15) NOT NULL,
  `kelas` int(11) NOT NULL,
  `kuota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rombel`
--

INSERT INTO `tb_rombel` (`id`, `nama_rombel`, `kelas`, `kuota`) VALUES
(1, 'SD1A', 1, 8),
(2, 'SD4A', 4, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ruang`
--

CREATE TABLE `tb_ruang` (
  `id` int(11) NOT NULL,
  `nama_ruang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_ruang`
--

INSERT INTO `tb_ruang` (`id`, `nama_ruang`) VALUES
(2, 'Ruang A'),
(3, 'Ruang C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jekel` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foto` text,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','siswa','tentor') NOT NULL,
  `active` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id`, `nama`, `jekel`, `alamat`, `no_hp`, `tgl_lahir`, `foto`, `username`, `password`, `level`, `active`) VALUES
(2, 'Dita', 'P', 'Jepara', '087299001882', '1993-11-29', '1573554032688.jpg', 'dita', 'e6b047aa9378bce37a5260a949d1ea3e', 'admin', 'yes'),
(3, 'Cahyono', 'L', 'Kudus', '081627722919', '1996-12-01', '1574816779340.jpg', 'cahyono', 'bc667476f11158f1e6b8de2e8d1d27a5', 'tentor', 'yes'),
(11, 'Bagas', 'L', 'Jepara', '08277712261', '1994-12-31', 'default.jpg', 'bagas', 'ee776a18253721efe8a62e4abd29dc47', 'tentor', 'yes'),
(13, 'Lela Andriani', 'P', 'Jepara', '082991001290', '2012-12-31', 'default.jpg', 'Lela', '05a991f84efdf319b302f29e3cc24a05', 'siswa', 'yes'),
(14, 'Lela Aja', 'P', 'Jepara Aja', '0821991002', '2013-12-31', 'default.jpg', 'Lela', '4e2f9a8bb61c4d2a60e8ab868c6240de', 'siswa', 'yes'),
(15, 'Santi', 'P', 'Kudus', '082991882992', '2003-11-30', 'default.jpg', 'Santi', '62a0643e33b1158b225e04457fbcd473', 'siswa', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_data_bimbel`
--
ALTER TABLE `tb_data_bimbel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_detail_jadwal`
--
ALTER TABLE `tb_detail_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indeks untuk tabel `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rombel` (`id_rombel`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_rombel`
--
ALTER TABLE `tb_rombel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_ruang`
--
ALTER TABLE `tb_ruang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_absensi`
--
ALTER TABLE `tb_absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_data_bimbel`
--
ALTER TABLE `tb_data_bimbel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_jadwal`
--
ALTER TABLE `tb_detail_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_rombel`
--
ALTER TABLE `tb_rombel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_ruang`
--
ALTER TABLE `tb_ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD CONSTRAINT `tb_pendaftaran_ibfk_1` FOREIGN KEY (`id_rombel`) REFERENCES `tb_rombel` (`id`),
  ADD CONSTRAINT `tb_pendaftaran_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
