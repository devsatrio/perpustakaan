-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jan 2020 pada 03.28
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `notelp` varchar(50) DEFAULT NULL,
  `username` varchar(150) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `gambar` text DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `alamat`, `notelp`, `username`, `password`, `gambar`) VALUES
(10, 'asdfsafd', 'asdfsaf', '324234', 'aaaaa1', '$2y$10$YKPOBjcEWbLYDRbn41yh9uX0feN4lWnqznXyHy6hFfAUj44uELv/.', '1579791129-9.jpg'),
(11, 'asdfsadf', 'sadfsadf', '43582', 'satasdfds', '$2y$10$TjCOHrEamZnACEBuatCr6exrAj.MluA9Aq/sLGMztnX8KDAa89c8a', '1579828872-6.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `penulis` varchar(100) DEFAULT NULL,
  `halaman` int(11) DEFAULT NULL,
  `tanggal_terbit` date DEFAULT NULL,
  `isbn` varchar(40) DEFAULT NULL,
  `bahasa` varchar(40) DEFAULT NULL,
  `penerbit` varchar(40) DEFAULT NULL,
  `berat` varchar(20) DEFAULT NULL,
  `lebar` varchar(20) DEFAULT NULL,
  `panjang` varchar(20) DEFAULT NULL,
  `tipe` enum('Ebook','book') DEFAULT 'book' COMMENT 'tipe untuk setiap buku',
  `gambar` varchar(250) DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `judul`, `penulis`, `halaman`, `tanggal_terbit`, `isbn`, `bahasa`, `penerbit`, `berat`, `lebar`, `panjang`, `tipe`, `gambar`) VALUES
(6, 'the true wireless', 'erik lind', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'book', 'n'),
(8, 'the tesla papers', 'kim jerry', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'Ebook', 'n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE `pinjam` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `tgl_harus_kembali` date DEFAULT NULL,
  `denda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pinjam`
--

INSERT INTO `pinjam` (`id`, `id_user`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `tgl_harus_kembali`, `denda`) VALUES
(10, 10, 4, 7, '2019-02-01', NULL, '2019-01-02', NULL),
(11, 10, 1, 5, '2019-02-01', '2019-01-01', '2019-01-04', NULL),
(12, 10, 3, 6, '2019-01-01', NULL, '2019-01-09', NULL),
(13, 10, 2, 5, '2019-02-01', NULL, '2019-01-03', NULL),
(14, 10, 1, 6, '2019-01-01', NULL, '2019-01-02', NULL),
(15, 10, 2, 8, '2019-02-01', '2019-01-01', '2018-11-01', 2000),
(16, 10, 1, 7, '2019-01-01', '2019-01-01', '2018-11-02', 3000),
(17, 10, 3, 8, '2019-01-01', '2019-01-01', '2018-11-08', 4000),
(18, 10, 1, 8, '2020-01-23', NULL, '2020-01-24', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notelp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` enum('Admin','Super Admin') COLLATE utf8mb4_unicode_ci DEFAULT 'Admin',
  `foto` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `username`, `remember_token`, `alamat`, `notelp`, `level`, `foto`) VALUES
(41, 'deva satrio', 'satriosuklusn@gmail.com', '$2y$10$MTevkOlRRT/y/CQxDInEp.2VBkD0rICDsB3ynGSCP2LgrRYzCdX7W', '2020-01-23 02:27:38', '2020-01-23 07:10:32', 'devasatrio', '3yXRRTuH184fmzQXUwix1AwzlM0iytc9uKeHfxi2pQfcKKDY1FFnpyHrYsBh', 'gurah kediri', '203984902', 'Super Admin', '1579785455-7.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
