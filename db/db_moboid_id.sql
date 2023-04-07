-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Okt 2021 pada 06.07
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_moboid.id`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `id_invoice` int(20) NOT NULL,
  `no_invoice` varchar(30) NOT NULL,
  `date_invoice` varchar(10) NOT NULL,
  `due_date_invoice` varchar(10) NOT NULL,
  `cust_invoice` varchar(50) NOT NULL,
  `des1_invoice` varchar(50) NOT NULL,
  `hrg1_invoice` varchar(100) NOT NULL,
  `des2_invoice` varchar(50) NOT NULL,
  `hrg2_invoice` varchar(100) NOT NULL,
  `des3_invoice` varchar(50) NOT NULL,
  `hrg3_invoice` varchar(100) NOT NULL,
  `des4_invoice` varchar(50) NOT NULL,
  `hrg4_invoice` varchar(100) NOT NULL,
  `dp_invoice` varchar(100) NOT NULL,
  `tac1_invoice` varchar(100) NOT NULL,
  `tac2_invoice` varchar(100) NOT NULL,
  `tac3_invoice` varchar(100) NOT NULL,
  `tac4_invoice` varchar(100) NOT NULL,
  `sts_invoice` varchar(10) NOT NULL,
  `prhl_invoice` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penawaran`
--

CREATE TABLE `tbl_penawaran` (
  `id_penawaran` int(20) NOT NULL,
  `no_penawaran` varchar(30) NOT NULL,
  `tgl_penawaran` varchar(10) NOT NULL,
  `prhl_penawaran` varchar(50) NOT NULL,
  `cust_penawaran` varchar(50) NOT NULL,
  `des1_penawaran` varchar(50) NOT NULL,
  `hrg1_penawaran` int(100) NOT NULL,
  `des2_penawaran` varchar(50) NOT NULL,
  `hrg2_penawaran` int(100) NOT NULL,
  `des3_penawaran` varchar(50) NOT NULL,
  `hrg3_penawaran` int(100) NOT NULL,
  `des4_penawaran` varchar(50) NOT NULL,
  `hrg4_penawaran` int(100) NOT NULL,
  `sts_penawaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(50) NOT NULL,
  `username` char(200) COLLATE latin1_general_ci NOT NULL,
  `password` text COLLATE latin1_general_ci NOT NULL,
  `status` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `tgl_join` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(30) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `status`, `tgl_join`, `level`) VALUES
(11, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ACTIVE', '2021-08-26', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indeks untuk tabel `tbl_penawaran`
--
ALTER TABLE `tbl_penawaran`
  ADD PRIMARY KEY (`id_penawaran`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `id_invoice` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
