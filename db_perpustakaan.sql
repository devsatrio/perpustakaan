-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jan 2020 pada 04.13
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
  `gambar` text DEFAULT 'n',
  `remember_token` text DEFAULT NULL,
  `status_pinjam` enum('y','n') DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `alamat`, `notelp`, `username`, `password`, `gambar`, `remember_token`, `status_pinjam`) VALUES
(11, 'mirna sumarsih', 'mojoroto kota kediri', '0854321', 'mirna', '$2y$10$1b7HEeFGDDusMIFYpI6ZveJ4zeXlkKaO02uwbVqgoLPh0rebrf12O', '1579828872-6.jpg', NULL, 'n'),
(13, 'doni pradana', 'gurah', '14045', 'doni', '$2y$10$y7MCbVDREt/v.4HRpwzu.eOYKvzeWHL.NPVFnbuhb5hoZ5xlcsH/.', '1579925583-5.jpg', NULL, 'n'),
(14, 'satrio damara', 'gurah', '0324838', 'satrio', '$2y$10$bBxU6nwe1BJbJ/GF450U/eejlxAxZGPrDGDJb0/N3Knee/kF/izxy', '1580037097-user.png', 'OMAcJouwKr6sxwzcCqI472UbAoEuoSW2QrpJ98LLssHGhWRc5JtH1ObaD36Z', 'n'),
(15, 'cok', 'cok', '302483290', 'username', NULL, '1580038850-user.png', NULL, 'n');

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
(24, 'komik naruto', 'harmoko', 25, '2020-01-01', 'id123', 'indonesia', 'gramedia', '1', '20', 'buku mantab mantab', 'Book', 2, 0, 10, '1579928566-building-apps-app-builder.jpg', 'n', 'komik-naruto'),
(25, 'ebook satu', NULL, 230, '2020-01-01', 'eb123', 'japanese', 'gramedia', NULL, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci atque at, eligendi cumque earum ea nesciunt, molestias tempore veritatis commodi a corrupti delectus, sit exercitationem minus harum itaque voluptatum reiciendis Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci atque at, eligendi cumque earum ea nesciunt, molestias tempore veritatis commodi a corrupti delectus, sit exercitationem minus harum itaque voluptatum reiciendis!', 'Ebook', 2, 1, 0, '1580184622-satu.jpg', '1580184622-satu.pdf', 'ebook-satu'),
(26, 'ebook dua', NULL, 150, '2020-01-03', '23432kjfksf', 'indonesia', 'gramedia', NULL, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci atque at, eligendi cumque earum ea nesciunt, molestias tempore veritatis commodi a corrupti delectus, sit exercitationem minus harum itaque voluptatum reiciendis Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci atque at, eligendi cumque earum ea nesciunt, molestias tempore veritatis commodi a corrupti delectus, sit exercitationem minus harum itaque voluptatum reiciendis', 'Ebook', 5, 6, 0, '1580185306-dua.jpg', '1580185306-dua.pdf', 'ebook-dua'),
(27, 'ebook tiga', NULL, 200, '2020-01-30', 'sadfsadf', 'indo', 'gramedia', NULL, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci atque at, eligendi cumque earum ea nesciunt, molestias tempore veritatis commodi a corrupti delectus, sit exercitationem minus harum itaque voluptatum reiciendis Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci atque at, eligendi cumque earum ea nesciunt, molestias tempore veritatis commodi a corrupti delectus, sit exercitationem minus harum itaque voluptatum reiciendis', 'Ebook', 5, 14, 0, '1580191280-tiga.jpg', '1580191280-tiga.pdf', 'ebook-tiga'),
(28, 'ebook empat', NULL, 212, '2020-01-31', 'sadfsadf', 'jawa', 'Elexmedia', NULL, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci atque at, eligendi cumque earum ea nesciunt, molestias tempore veritatis commodi a corrupti delectus, sit exercitationem minus harum itaque voluptatum reiciendis Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci atque at, eligendi cumque earum ea nesciunt, molestias tempore veritatis commodi a corrupti delectus, sit exercitationem minus harum itaque voluptatum reiciendis', 'Ebook', 2, 12, 0, '1580195786-empat.jpg', '1580195786-empat.pdf', 'ebook-empat');

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
  `denda` int(11) DEFAULT NULL,
  `denda_lain` int(11) DEFAULT 0,
  `keterangan_denda` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pinjam`
--

INSERT INTO `pinjam` (`id`, `id_user`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `tgl_harus_kembali`, `denda`, `denda_lain`, `keterangan_denda`) VALUES
(1, 41, 11, 24, '2020-01-28', '2020-01-28', '2020-01-30', NULL, 0, NULL),
(2, 41, 11, 24, '2020-01-28', '2020-01-28', '2020-01-30', NULL, 0, NULL),
(3, 41, 13, 24, '2020-01-28', '2020-01-29', '2020-01-23', 12000, 2000, 'cover sobek'),
(4, 41, 14, 24, '2020-01-28', '2020-01-29', '2020-01-14', 30000, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `landing_text` text DEFAULT NULL,
  `sublanding_text` text DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `denda` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `landing_text`, `sublanding_text`, `gambar`, `denda`) VALUES
(1, 'coba landing 23', 'coba landing 2', '1580267582-2.jpg', 3500);

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
(41, 'deva satrio', 'satriosuklusn@gmail.com', '$2y$10$MTevkOlRRT/y/CQxDInEp.2VBkD0rICDsB3ynGSCP2LgrRYzCdX7W', '2020-01-23 02:27:38', '2020-01-24 21:58:59', 'devasatrio', '2FsXmgZASfcnpn20zeiM7Jq2C64MRfGo8f6OW7rXwcA7Nx0svxRi1QJSNmz4', 'gurah kediri pga', '203984902', 'Super Admin', '1579928339-13.jpg');

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
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
