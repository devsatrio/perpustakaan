-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 12, 2020 at 05:26 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.3.14-6+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `notelp` varchar(50) DEFAULT NULL,
  `username` varchar(150) DEFAULT NULL,
  `password` text,
  `gambar` varchar(500) DEFAULT 'n',
  `remember_token` text,
  `status_pinjam` enum('y','n') DEFAULT 'n',
  `status_anggota` enum('Umum','Karyawan') DEFAULT 'Umum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `alamat`, `notelp`, `username`, `password`, `gambar`, `remember_token`, `status_pinjam`, `status_anggota`) VALUES
(11, 'mirna sumarsih hari', 'mojoroto kota kediri', '0854321', 'mirna', '$2y$10$2nkizox3AnYHIhTkG/w1qu/M8QzZQ4EbMGmAGthDhnGvxXmwtwrIy', '1579828872-6.jpg', NULL, 'y', 'Umum'),
(14, 'satrio damara', 'gurah', '0324838', 'satrio', '$2y$10$yX6Td./BMlhtDcITTT4z7uMOE7/IuOIm/vSimg/LTFtI7zfbbxapG', '1581361194-user.png', 'wgsmcyZh2llNuFiosvCN4A0Su2Y9yivkFwaZnyaIT1O4QRQvyc1OxXlIjsTo', 'n', 'Umum'),
(15, 'deni', 'kediri', '023890', 'deni', '$2y$10$PUbxo0TZ438ubMpueyqt.eNOumioBjGGKhxNORv/DGrPvA6c57/ue', '1581362053-7.jpg', NULL, 'y', 'Karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `baca`
--

CREATE TABLE `baca` (
  `id` int(11) NOT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `id_ebook` int(11) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT NULL,
  `browser` varchar(150) DEFAULT NULL,
  `ip` varchar(150) DEFAULT NULL,
  `tipe` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `baca`
--

INSERT INTO `baca` (`id`, `id_anggota`, `id_ebook`, `tanggal`, `browser`, `ip`, `tipe`) VALUES
(1, 14, 27, '2020-02-11 03:51:29', 'Chrome', 'IP tidak dikenali', 'pc/laptop'),
(2, 14, 27, '2020-02-11 03:52:22', 'Chrome', 'IP tidak dikenali', 'pc/laptop');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `kode` varchar(100) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `penulis` varchar(100) DEFAULT NULL,
  `halaman` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT '0',
  `lokasi` text NOT NULL,
  `tanggal_terbit` date DEFAULT NULL,
  `isbn` varchar(40) DEFAULT NULL,
  `bahasa` varchar(40) DEFAULT NULL,
  `penerbit` varchar(40) DEFAULT NULL,
  `berat` varchar(20) DEFAULT NULL,
  `lebar` varchar(20) DEFAULT NULL,
  `deskripsi` text,
  `tipe` enum('Ebook','Book') DEFAULT 'Book' COMMENT 'tipe untuk setiap buku',
  `id_kategori` int(11) DEFAULT NULL,
  `dibaca` int(11) DEFAULT '0',
  `dipinjam` int(11) DEFAULT '0',
  `gambar` varchar(400) DEFAULT 'n',
  `ebook` varchar(250) DEFAULT 'n' COMMENT 'nama file ebook',
  `link` text,
  `umum` enum('ya','tidak') DEFAULT 'tidak' COMMENT 'parameter buku untuk dilihat'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `kode`, `judul`, `penulis`, `halaman`, `jumlah`, `lokasi`, `tanggal_terbit`, `isbn`, `bahasa`, `penerbit`, `berat`, `lebar`, `deskripsi`, `tipe`, `id_kategori`, `dibaca`, `dipinjam`, `gambar`, `ebook`, `link`, `umum`) VALUES
(25, NULL, 'ebook satu', NULL, 230, 0, '', '2020-01-01', 'eb123', 'japanese', 'gramedia', NULL, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci atque at, eligendi cumque earum ea nesciunt, molestias tempore veritatis commodi a corrupti delectus, sit exercitationem minus harum itaque voluptatum reiciendis Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci atque at, eligendi cumque earum ea nesciunt, molestias tempore veritatis commodi a corrupti delectus, sit exercitationem minus harum itaque voluptatum reiciendis!', 'Ebook', 2, 1, 0, '1580184622-satu.jpg', '1580184622-satu.pdf', 'ebook-satu', 'tidak'),
(26, NULL, 'ebook dua', NULL, 150, 0, '', '2020-01-03', '23432kjfksf', 'indonesia', 'gramedia', NULL, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci atque at, eligendi cumque earum ea nesciunt, molestias tempore veritatis commodi a corrupti delectus, sit exercitationem minus harum itaque voluptatum reiciendis Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci atque at, eligendi cumque earum ea nesciunt, molestias tempore veritatis commodi a corrupti delectus, sit exercitationem minus harum itaque voluptatum reiciendis', 'Ebook', 7, 6, 0, '1580185306-dua.jpg', '1580185306-dua.pdf', 'ebook-dua', 'ya'),
(27, NULL, 'ebook tiga', NULL, 200, 0, '', '2020-01-30', 'sadfsadf', 'indo', 'gramedia', NULL, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci atque at, eligendi cumque earum ea nesciunt, molestias tempore veritatis commodi a corrupti delectus, sit exercitationem minus harum itaque voluptatum reiciendis Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci atque at, eligendi cumque earum ea nesciunt, molestias tempore veritatis commodi a corrupti delectus, sit exercitationem minus harum itaque voluptatum reiciendis', 'Ebook', 5, 18, 0, '1580191280-tiga.jpg', '1580191280-tiga.pdf', 'ebook-tiga', 'tidak'),
(28, NULL, 'ebook empat', NULL, 212, 0, '', '2020-01-31', 'sadfsadf', 'jawa', 'Elexmedia', NULL, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci atque at, eligendi cumque earum ea nesciunt, molestias tempore veritatis commodi a corrupti delectus, sit exercitationem minus harum itaque voluptatum reiciendis Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci atque at, eligendi cumque earum ea nesciunt, molestias tempore veritatis commodi a corrupti delectus, sit exercitationem minus harum itaque voluptatum reiciendis', 'Ebook', 2, 13, 0, '1580195786-empat.jpg', '1580195786-empat.pdf', 'ebook-empat', 'tidak'),
(34, NULL, 'ebook enam', NULL, 21, 0, '', '2020-01-29', '12sss', 'indonesia', 'gramedia', NULL, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit placeat eligendi magnam molestias dolor hic, incidunt sequi eaque obcaecati nostrum dolore quibusdam consectetur numquam fuga vitae error a ipsum consequatur?', 'Ebook', 5, 0, 0, '1580715262-buku6.jpeg', '1580715181-penyusunan_laporan_hasil_penelitian_tindakan_kelas.pdf', 'ebook-enam', 'ya'),
(42, 'b01', 'buku umum tiga', 'hardian', 45, 5, 'sdf', '2019-09-14', 'mn009', 'jawa', 'elexmedia', '0.8', '12', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum autem incidunt, maxime repellendus fugiat ut quaerat voluptas pariatur magnam blanditiis hic perspiciatis expedita aliquid numquam ipsa perferendis rem eaque ex.', 'Book', 5, 0, 4, '1581499707-buku3.jpg', 'n', 'buku-umum-tiga', 'ya'),
(43, 'b02', 'buku karyawan dua', 'hendri', 20, 29, 'Rak C2 lantai 2', '2020-02-11', 'kd0002', 'indonesia', 'gramedia', '0.1', '20', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum autem incidunt, maxime repellendus fugiat ut quaerat voluptas pariatur magnam blanditiis hic perspiciatis expedita aliquid numquam ipsa perferendis rem eaque ex.', 'Book', 7, 0, 1, '1581499685-buku2.jpg', 'n', 'buku-karyawan-dua', 'tidak'),
(44, 'b03', 'buku umum satu', 'hendri', 225, 0, 'Rak D1 lantai 1', '2019-09-14', 'akd1256', 'indonesia', 'gramedia', '0.5', '25', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum autem incidunt, maxime repellendus fugiat ut quaerat voluptas pariatur magnam blanditiis hic perspiciatis expedita aliquid numquam ipsa perferendis rem eaque ex. Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum autem incidunt, maxime repellendus fugiat ut quaerat voluptas pariatur magnam blanditiis hic perspiciatis expedita aliquid numquam ipsa perferendis rem eaque ex.', 'Book', 7, 0, 2, '1581499675-buku1.jpg', 'n', 'buku-umum-satu', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_buku`
--

INSERT INTO `kategori_buku` (`id`, `nama`, `slug`) VALUES
(2, 'Ensiklopedia', 'ensiklopedia'),
(5, 'Novel', 'novel'),
(7, 'Biografi', 'biografi');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
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
  `denda_lain` int(11) DEFAULT '0',
  `keterangan_denda` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`id`, `id_user`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `tgl_harus_kembali`, `denda`, `denda_lain`, `keterangan_denda`) VALUES
(1, 41, 11, 24, '2020-01-28', '2020-01-28', '2020-01-30', NULL, 0, NULL),
(2, 41, 11, 24, '2020-01-28', '2020-01-28', '2020-01-30', NULL, 0, NULL),
(3, 41, 13, 24, '2020-01-28', '2020-01-29', '2020-01-23', 12000, 2000, 'cover sobek'),
(4, 41, 14, 24, '2020-01-28', '2020-01-29', '2020-01-14', 30000, NULL, NULL),
(5, 41, 11, 30, '2020-02-10', '2020-02-10', '2020-02-12', NULL, 0, NULL),
(6, 41, 11, 42, '2020-02-10', '2020-02-10', '2020-02-11', NULL, 0, NULL),
(7, 41, 14, 42, '2020-02-10', '2020-02-10', '2020-02-20', NULL, 0, NULL),
(8, 41, 11, 42, '2020-02-11', '2020-02-11', '2020-02-12', NULL, 0, NULL),
(9, 41, 14, 44, '2020-02-12', '2020-02-12', '2020-02-13', NULL, 0, NULL),
(10, 41, 11, 42, '2020-02-12', '2020-02-12', '2020-02-15', NULL, 0, NULL),
(11, 41, 15, 43, '2020-02-12', NULL, '2020-02-14', NULL, 0, NULL),
(12, 41, 11, 44, '2020-02-12', NULL, '2020-02-15', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `landing_text` text,
  `sublanding_text` text,
  `gambar` text,
  `denda` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `landing_text`, `sublanding_text`, `gambar`, `denda`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Dolorum placeat voluptas similique tempore officia, libero nisi sint, dolore doloribus iste reiciendis maiores', '1580267582-2.jpg', 3500);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` text COLLATE utf8mb4_unicode_ci,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `notelp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` enum('Admin','Super Admin') COLLATE utf8mb4_unicode_ci DEFAULT 'Admin',
  `foto` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `username`, `remember_token`, `alamat`, `notelp`, `level`, `foto`) VALUES
(41, 'deva satrio', 'satriosuklusn@gmail.com', '$2y$10$MTevkOlRRT/y/CQxDInEp.2VBkD0rICDsB3ynGSCP2LgrRYzCdX7W', '2020-01-23 02:27:38', '2020-01-24 21:58:59', 'devasatrio', 'NE07l2TH3Y2vhHX3dIMSsgcCnkmgM6maDci6mI0NegQw8LTQzp43aq9UsOIH', 'gurah kediri pga', '203984902', 'Super Admin', '1579928339-13.jpg'),
(43, 'superadmin', 'admin@gmail.com', '$2y$10$tTTF/eIo9AsYO07snjnIxeOAfObG/kiePT3ByWu.DkebYPIgngc0O', '2020-02-12 01:38:14', '2020-02-12 01:38:14', 'superadmin', NULL, 'kediri', '0802490', 'Super Admin', '1581496694-13.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `baca`
--
ALTER TABLE `baca`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `baca`
--
ALTER TABLE `baca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
