-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jan 2020 pada 07.02
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
  `gambar` varchar(100) DEFAULT 'n',
  `remember_token` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `alamat`, `notelp`, `username`, `password`, `gambar`, `remember_token`) VALUES
(11, 'mirna sumarsih', 'mojoroto kota kediri', '0854321', 'mirna', '$2y$10$1b7HEeFGDDusMIFYpI6ZveJ4zeXlkKaO02uwbVqgoLPh0rebrf12O', '1579828872-6.jpg', NULL),
(13, 'doni pradana', 'gurah', '14045', 'doni', '$2y$10$y7MCbVDREt/v.4HRpwzu.eOYKvzeWHL.NPVFnbuhb5hoZ5xlcsH/.', '1579925583-5.jpg', NULL),
(14, 'satrio damara', 'gurah', '0324838', 'satrio', '$2y$10$bBxU6nwe1BJbJ/GF450U/eejlxAxZGPrDGDJb0/N3Knee/kF/izxy', '1580037097-user.png', 'LF5X3HBP3nh8mrcOdgks6vVcJlqGPtRFj0xvPtVh29p68jbvgB6OZ8PYxCHp'),
(15, 'cok', 'cok', '302483290', 'username', NULL, '1580038850-user.png', NULL);

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
  `deskripsi` text DEFAULT NULL,
  `tipe` enum('Ebook','Book') DEFAULT 'Book' COMMENT 'tipe untuk setiap buku',
  `id_kategori` int(11) DEFAULT NULL,
  `dibaca` int(11) DEFAULT 0,
  `dipinjam` int(11) DEFAULT 0,
  `gambar` varchar(400) DEFAULT 'n',
  `ebook` varchar(250) DEFAULT 'n',
  `link` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `judul`, `penulis`, `halaman`, `tanggal_terbit`, `isbn`, `bahasa`, `penerbit`, `berat`, `lebar`, `deskripsi`, `tipe`, `id_kategori`, `dibaca`, `dipinjam`, `gambar`, `ebook`, `link`) VALUES
(24, 'komik naruto', 'harmoko', 25, '2020-01-01', 'id123', 'indonesia', 'gramedia', '1', '20', 'buku mantab mantab', 'Book', 2, 0, 3, '1579928566-building-apps-app-builder.jpg', 'n', NULL),
(25, 'ebook satu', NULL, NULL, '2020-01-01', 'eb123', NULL, 'gramedia', NULL, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci atque at, eligendi cumque earum ea nesciunt, molestias tempore veritatis commodi a corrupti delectus, sit exercitationem minus harum itaque voluptatum reiciendis Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci atque at, eligendi cumque earum ea nesciunt, molestias tempore veritatis commodi a corrupti delectus, sit exercitationem minus harum itaque voluptatum reiciendis!', 'Ebook', 2, 0, 0, '1580184622-satu.jpg', '1580184622-satu.pdf', 'ebook-satu'),
(26, 'ebook dua', NULL, NULL, '2020-01-03', '23432kjfksf', NULL, 'gramedia', NULL, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci atque at, eligendi cumque earum ea nesciunt, molestias tempore veritatis commodi a corrupti delectus, sit exercitationem minus harum itaque voluptatum reiciendis Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci atque at, eligendi cumque earum ea nesciunt, molestias tempore veritatis commodi a corrupti delectus, sit exercitationem minus harum itaque voluptatum reiciendis', 'Ebook', 5, 0, 0, '1580185306-dua.jpg', '1580185306-dua.pdf', 'ebook-dua'),
(27, 'ebook tiga', NULL, NULL, '2020-01-30', 'sadfsadf', NULL, 'gramedia', NULL, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci atque at, eligendi cumque earum ea nesciunt, molestias tempore veritatis commodi a corrupti delectus, sit exercitationem minus harum itaque voluptatum reiciendis Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci atque at, eligendi cumque earum ea nesciunt, molestias tempore veritatis commodi a corrupti delectus, sit exercitationem minus harum itaque voluptatum reiciendis', 'Ebook', 5, 0, 0, '1580191280-tiga.jpg', '1580191280-tiga.pdf', 'ebook-tiga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_buku`
--

INSERT INTO `kategori_buku` (`id`, `nama`, `slug`) VALUES
(2, 'berita', 'berita'),
(5, 'halo', 'halo');

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
(18, 10, 1, 8, '2020-01-23', NULL, '2020-01-24', NULL),
(19, 41, 13, 24, '2020-01-25', '2020-01-25', '2020-01-31', NULL),
(20, 41, 11, 24, '2020-01-25', '2020-01-25', '2020-01-31', NULL),
(21, 41, 11, 24, '2020-01-25', '2020-01-25', '2020-01-22', 40000),
(22, 41, 11, 24, '2020-01-25', '2020-01-25', '2020-01-31', NULL),
(23, 41, 13, 24, '2020-01-25', '2020-01-25', '2020-01-01', 20000);

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
(41, 'deva satrio', 'satriosuklusn@gmail.com', '$2y$10$MTevkOlRRT/y/CQxDInEp.2VBkD0rICDsB3ynGSCP2LgrRYzCdX7W', '2020-01-23 02:27:38', '2020-01-24 21:58:59', 'devasatrio', 'zxTl0xuxLGsP5LjQ9bT5c13FEyTAlyUcZF544PYfiWkPg8hacFHAAMmeEbkD', 'gurah kediri pga', '203984902', 'Super Admin', '1579928339-13.jpg');

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
-- Indeks untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
