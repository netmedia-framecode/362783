-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 16 Jul 2024 pada 22.57
-- Versi server: 10.6.18-MariaDB-cll-lve
-- Versi PHP: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zjxtorpv_362783`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `bg` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `auth`
--

INSERT INTO `auth` (`id`, `image`, `bg`) VALUES
(1, '3436659728.jpg', '#000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_material`
--

CREATE TABLE `bahan_material` (
  `id_bm` int(11) NOT NULL,
  `nama_material` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bahan_material`
--

INSERT INTO `bahan_material` (`id_bm`, `nama_material`, `created_at`, `updated_at`) VALUES
(1, 'Agregat A', '2024-06-09 13:25:00', '2024-06-09 13:25:00'),
(2, 'Agregat B', '2024-06-09 13:25:05', '2024-06-09 13:25:21'),
(4, 'Batu pecah 2/1', '2024-06-09 13:25:39', '2024-06-09 13:25:39'),
(5, 'Batu pecah 2/3', '2024-06-09 13:25:47', '2024-06-09 13:25:47'),
(6, 'Batu pecah 5/3', '2024-06-09 13:25:57', '2024-06-09 13:25:57'),
(7, 'Split', '2024-06-09 13:26:10', '2024-06-09 13:26:10'),
(8, 'Abu Batu', '2024-06-09 13:26:18', '2024-06-09 13:26:18'),
(9, 'Pasir Halus', '2024-06-09 13:26:25', '2024-06-09 13:26:25'),
(10, 'Pasir Kasar', '2024-06-09 13:26:32', '2024-06-09 13:26:32'),
(11, 'Sertu', '2024-06-09 13:26:38', '2024-06-09 13:26:38'),
(13, 'Batu', '2024-06-26 13:17:03', '2024-06-26 13:17:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `username` varchar(75) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` char(12) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `username`, `email`, `phone`, `pesan`, `created_at`, `updated_at`) VALUES
(2, 'robbymanek2@gmail.com', 'admin@gmail.com', '081339224490', '', '2024-06-10 15:39:39', '2024-06-10 15:39:39'),
(3, 'Gegimanek@gmail.com', 'gegimanek@gmail.com', '082145749588', '', '2024-06-12 00:44:53', '2024-06-12 00:44:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `material_keluar`
--

CREATE TABLE `material_keluar` (
  `id_mk` int(11) NOT NULL,
  `id_sm` int(11) DEFAULT NULL,
  `id_sk` int(11) DEFAULT NULL,
  `id_sopir` int(11) NOT NULL DEFAULT 1,
  `nama_pemesan` varchar(50) DEFAULT NULL,
  `no_telp` varchar(12) DEFAULT NULL,
  `alamat_pengiriman` varchar(100) DEFAULT NULL,
  `jumlah_keluar` char(20) DEFAULT NULL,
  `biaya` char(20) DEFAULT NULL,
  `jumlah_akhir_keluar` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `material_keluar`
--

INSERT INTO `material_keluar` (`id_mk`, `id_sm`, `id_sk`, `id_sopir`, `nama_pemesan`, `no_telp`, `alamat_pengiriman`, `jumlah_keluar`, `biaya`, `jumlah_akhir_keluar`, `keterangan`, `created_at`, `updated_at`) VALUES
(17, 13, 3, 1, 'gegi manek', '082145749588', 'haitimuk malaka', '1', '40000', 0, '', '2024-06-12 00:27:35', '2024-06-20 15:29:55'),
(18, 4, 3, 1, 'melki', '0765', 'haitimuk malaka', '4', '120000', 0, '', '2024-06-12 00:35:04', '2024-06-20 15:29:41'),
(19, 4, 3, 1, 'jek', '0977', 'haitimuk malaka', '6', '180000', 0, '', '2024-06-12 00:59:49', '2024-06-13 13:57:14'),
(22, 13, 3, 1, 'yan', '08484829', 'matani', '7', '280000', 0, '', '2024-06-13 14:38:37', '2024-06-20 15:29:03'),
(23, 13, 3, 1, 'yan', '08484829', 'matani', '7', '280000', 0, '', '2024-06-13 14:38:38', '2024-06-20 15:29:30'),
(24, 13, 3, 1, 'Ose', '0821558', 'Jln bajawa', '2', '80000', 0, '', '2024-06-13 15:32:25', '2024-06-20 15:29:19'),
(27, 13, 3, 1, 'agus', '11', 'penfui', '1', '40000', 0, '', '2024-06-26 13:10:04', '2024-06-26 13:11:05'),
(28, 13, 3, 1, 'agus', '11', 'penfui', '1', '40000', 0, '', '2024-06-26 13:10:04', '2024-06-26 13:10:29'),
(29, 13, 3, 2, 'aldi kolo', '084624764', 'oebabo', '3', '120000', 3, '', '2024-07-02 22:36:19', '2024-07-02 22:38:03'),
(30, 20, 3, 8, 'JON', '082312345566', 'Haitimuk', '8', '2000000', 8, '', '2024-07-07 23:57:29', '2024-07-07 23:58:08'),
(31, 22, 3, 2, 'jek', '886', 'matani', '6', '1500000', 6, '', '2024-07-08 03:14:43', '2024-07-08 03:15:20'),
(32, 22, 3, 7, 'Aldi Rey', '08214573940', 'Matani', '8', '2000000', 8, '', '2024-07-09 13:47:23', '2024-07-09 14:45:34'),
(33, 21, 3, 7, 'kjj', '999', 'hhhhh', '1', '250000', 1, '', '2024-07-09 14:53:59', '2024-07-09 14:54:38'),
(34, 18, 3, 3, 'joko', '08888', 'matani', '7', '1750000', 6, 'ada satu kubik material yang tidak ada', '2024-07-09 15:18:22', '2024-07-09 15:22:58'),
(35, 20, 3, 3, 'afong', '0982882', 'matani', '7', '1750000', 7, '', '2024-07-09 15:20:09', '2024-07-09 15:21:00'),
(37, 20, 3, 2, 'agus', '081221', 'kayu putih', '1', '250000', 0, '', '2024-07-11 23:34:21', '2024-07-11 23:34:21'),
(38, 22, 3, 2, 'AFONG', '08131010101', 'matani', '2', '500000', 0, '', '2024-07-11 23:58:56', '2024-07-11 23:58:56'),
(39, 22, 3, 1, 'AFONG', '08882822', 'malaka', '5', '1250000', 0, '', '2024-07-12 00:00:48', '2024-07-12 00:00:48'),
(40, 21, 3, 1, 'gegi', '08388383', 'kupang', '2', '500000', 0, '', '2024-07-12 00:02:38', '2024-07-12 00:02:38'),
(41, 21, 5, 1, 'melki', '08877', '121111', '3', '750000', 0, '', '2024-07-12 00:05:04', '2024-07-12 00:10:41'),
(42, 21, 5, 1, 'aldy', '160', 'malaka', '7', '1750000', 0, '', '2024-07-12 00:12:33', '2024-07-12 00:12:33'),
(43, 14, 5, 4, 'JONI', '0812310112', 'liliba', '4', '120000', 0, '', '2024-07-12 00:18:46', '2024-07-12 00:21:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan_barang`
--

CREATE TABLE `satuan_barang` (
  `id_sb` int(11) NOT NULL,
  `satuan_barang` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `satuan_barang`
--

INSERT INTO `satuan_barang` (`id_sb`, `satuan_barang`) VALUES
(2, 'm (meter)'),
(3, 'kubik'),
(4, 'ton'),
(5, 'cm (centimeter)'),
(6, 'kg (kilo gram)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sopir`
--

CREATE TABLE `sopir` (
  `id_sopir` int(11) NOT NULL,
  `nama_sopir` varchar(50) DEFAULT NULL,
  `no_plat` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sopir`
--

INSERT INTO `sopir` (`id_sopir`, `nama_sopir`, `no_plat`) VALUES
(1, 'Ose Nahak', 'DH 4256 EB'),
(2, 'Tinus Seran', 'DH 4266 EB'),
(3, 'Teo Bria', 'DH 7504 JB'),
(4, 'Gerson Seran', 'DH 3405 WJ'),
(5, 'Son Tahu', 'DH 1290 WJ'),
(6, 'Yanto', 'DH 2100 WJ'),
(7, 'Nardy Seran', 'DH 2301 WJ'),
(8, 'Arky Nahak', 'DH 1454 WJ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_keluar`
--

CREATE TABLE `status_keluar` (
  `id_sk` int(11) NOT NULL,
  `status_keluar` varchar(35) DEFAULT NULL,
  `progress` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `status_keluar`
--

INSERT INTO `status_keluar` (`id_sk`, `status_keluar`, `progress`) VALUES
(3, 'Sudah Sampai Tempat Tujuan', 100),
(5, 'Masi Dalam Perjalanan', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_stok`
--

CREATE TABLE `status_stok` (
  `id_ss` int(11) NOT NULL,
  `status` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `status_stok`
--

INSERT INTO `status_stok` (`id_ss`, `status`) VALUES
(2, 'Stok Material Ready'),
(3, 'Stok  Material Habis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_material`
--

CREATE TABLE `stok_material` (
  `id_sm` int(11) NOT NULL,
  `id_bm` int(11) DEFAULT NULL,
  `id_ss` int(11) DEFAULT NULL,
  `id_sb` int(11) DEFAULT NULL,
  `id_sopir` int(11) NOT NULL DEFAULT 1,
  `jumlah` char(20) DEFAULT NULL,
  `biaya_satuan` char(20) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `stok_material`
--

INSERT INTO `stok_material` (`id_sm`, `id_bm`, `id_ss`, `id_sb`, `id_sopir`, `jumlah`, `biaya_satuan`, `created_at`, `updated_at`) VALUES
(4, 11, 2, 3, 1, '90', '30000', '2024-06-11 21:11:51', '2024-06-12 00:59:49'),
(5, 10, 2, 3, 1, '100', '40000', '2024-06-11 21:14:17', '2024-06-12 00:32:44'),
(13, 9, 2, 3, 1, '79', '40000', '2024-06-12 00:26:51', '2024-07-02 22:36:19'),
(14, 13, 2, 3, 2, '96', '30000', '2024-06-26 13:18:47', '2024-07-12 00:21:17'),
(15, 2, 2, 3, 8, '6', '250000', '2024-07-07 23:47:48', '2024-07-07 23:47:48'),
(17, 6, 2, 3, 3, '5', '250000', '2024-07-07 23:49:21', '2024-07-07 23:49:21'),
(18, 4, 2, 3, 4, '3', '250000', '2024-07-07 23:49:59', '2024-07-09 15:18:22'),
(19, 7, 2, 3, 5, '7', '250000', '2024-07-07 23:50:36', '2024-07-11 23:51:37'),
(20, 5, 2, 3, 6, '7', '250000', '2024-07-07 23:51:56', '2024-07-11 23:34:21'),
(21, 1, 2, 3, 5, '3', '250000', '2024-07-07 23:52:47', '2024-07-12 00:12:33'),
(22, 8, 2, 3, 3, '12', '250000', '2024-07-07 23:55:09', '2024-07-12 00:00:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang`
--

CREATE TABLE `tentang` (
  `id_tentang` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tentang`
--

INSERT INTO `tentang` (`id_tentang`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, '<p>Perseroan Terbatas (PT) Mitra Agung Malaka merupakan sebuah perusahaan jasa konstruksi yang membangun proyek jalan dan jembatan yang terletak di Kabupaten Malaka, Nusa Tenggara Timur. Sebagai perusahaan yang bergerak pada jasa konstruksi,tentunya membutuhkan gudang yang berfungsi sebagai tempat penyimpanan material. Keberadaan gudang milik PT. Mitra Agung Malaka ini sudah berdiri pada tahun 2015.</p>\r\n\r\n<p>PT. Mitra Agung Malaka setiap melakukan sebuah proyek&nbsp; mengunakan material yang sudah di sediakan di gudang seperti pasir, batu, batu picah dan lain sebagainya biasanya di ambil dari gudang.</p>\r\n', '2024-06-09 15:21:11', '2024-06-09 17:31:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `id_active` int(11) DEFAULT 2,
  `en_user` varchar(75) DEFAULT NULL,
  `token` char(6) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT 'default.svg',
  `email` varchar(75) DEFAULT NULL,
  `password` varchar(75) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `id_role`, `id_active`, `en_user`, `token`, `name`, `image`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 3, 1, NULL, NULL, 'developer', 'default.svg', 'developer@gmail.com', '$2y$10$//KMATh3ibPoI3nHFp7x/u7vnAbo2WyUgmI4x0CVVrH8ajFhMvbjG', '2024-06-07 08:57:23', '2024-06-07 08:57:23'),
(2, 2, 1, NULL, NULL, 'admin', 'default.svg', 'admin@gmail.com', '$2y$10$//KMATh3ibPoI3nHFp7x/u7vnAbo2WyUgmI4x0CVVrH8ajFhMvbjG', '2024-06-07 08:57:23', '2024-06-07 08:57:23'),
(3, 4, 1, '2y10YFCZy2mPfr6oSVXmamnEmuhlme7OSLKI3YAMIl8UE3vzFPC5FMLwS', '522152', 'PENGAWAS', '1428506552.jpg', 'gegimanek@gmail.com', '$2y$10$.V/9YmXNnPAG1YGc38I4jeMVwnbyicwlcaXd32BuYJHwHbEZJ0ofu', '2024-06-10 14:55:44', '2024-06-10 14:56:32'),
(4, 4, 1, '2y10rZ2ubuMWhSHVH3UjFF63OOqjunXfU78k2VvXt3aUiNVpcSRHhLFS', '903111', 'Iren', 'default.svg', 'irenpasu@gmail.com', '$2y$10$AGTrzeMnY5X4e1QdU2z74.BpaOZBmFX5MnYqMfiPExWiAf6jojEli', '2024-06-14 20:18:02', '2024-06-14 20:18:18'),
(5, 4, 1, '2y10NojqQ7zfJlwRRLmfzUCZtuAMGNouDxXpR6o1mbP3GfjuZ3KJre', '504988', 'PIMPINAN', 'default.svg', 'manekge02@gmail.com', '$2y$10$NTlkrpiiMtGE/9HAxZ7QJeefYWOcQ8egIDVuPvrm8aisEQOFh/Ci.', '2024-06-20 17:40:24', '2024-06-20 17:41:17');

--
-- Trigger `users`
--
DELIMITER $$
CREATE TRIGGER `insert_users` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
    SET NEW.id_role = (
        SELECT id_role
        FROM `user_role`
        ORDER BY id_role DESC
        LIMIT 1
    );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id_access_menu` int(11) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id_access_menu`, `id_role`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 5),
(4, 1, 6),
(5, 1, 7),
(6, 2, 5),
(7, 2, 6),
(8, 2, 7),
(9, 3, 6),
(10, 4, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_sub_menu`
--

CREATE TABLE `user_access_sub_menu` (
  `id_access_sub_menu` int(11) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `id_sub_menu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_access_sub_menu`
--

INSERT INTO `user_access_sub_menu` (`id_access_sub_menu`, `id_role`, `id_sub_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 2, 7),
(16, 2, 8),
(17, 2, 9),
(19, 3, 11),
(20, 3, 12),
(23, 4, 12),
(24, 2, 10),
(25, 2, 11),
(26, 2, 12),
(27, 2, 13),
(28, 2, 14),
(29, 1, 15),
(30, 1, 16),
(31, 2, 15),
(32, 2, 16),
(34, 3, 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id_menu`, `menu`) VALUES
(1, 'User Management'),
(2, 'Menu Management'),
(5, 'Utilities'),
(6, 'Pendataan'),
(7, 'Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'Developer'),
(2, 'Administrator'),
(3, 'Pimpinan'),
(4, 'Pengawas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_status`
--

CREATE TABLE `user_status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_status`
--

INSERT INTO `user_status` (`id_status`, `status`) VALUES
(1, 'Active'),
(2, 'No Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id_sub_menu` int(11) NOT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `id_active` int(11) DEFAULT 2,
  `title` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id_sub_menu`, `id_menu`, `id_active`, `title`, `url`, `icon`) VALUES
(1, 1, 1, 'Users', 'users', 'fas fa-users'),
(2, 1, 1, 'Role', 'role', 'fas fa-user-cog'),
(3, 2, 1, 'Menu', 'menu', 'fas fa-fw fa-folder'),
(4, 2, 1, 'Sub Menu', 'sub-menu', 'fas fa-fw fa-folder-open'),
(5, 2, 1, 'Menu Access', 'menu-access', 'fas fa-user-lock'),
(6, 2, 1, 'Sub Menu Access', 'sub-menu-access', 'fas fa-user-lock'),
(7, 5, 1, 'Status Stok', 'status-stok', 'fas fa-list'),
(8, 5, 1, 'Satuan Barang', 'satuan-barang', 'fas fa-list'),
(9, 5, 1, 'Status Keluar', 'status-keluar', 'fas fa-list'),
(10, 6, 1, 'Bahan Material', 'bahan-material', 'fas fa-snowplow'),
(11, 6, 1, 'Stok Material', 'stok-material', 'fas fa-dolly-flatbed'),
(12, 6, 1, 'Material Keluar', 'material-keluar', 'fas fa-dolly'),
(13, 7, 1, 'Tentang', 'tentang', 'far fa-address-card'),
(14, 7, 1, 'Kontak', 'kontak', 'far fa-comment-dots'),
(15, 5, 1, 'Data Sopir', 'data-sopir', 'fas fa-people-carry'),
(16, 6, 1, 'Material Masuk', 'material-masuk', 'fas fa-dolly');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bahan_material`
--
ALTER TABLE `bahan_material`
  ADD PRIMARY KEY (`id_bm`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indeks untuk tabel `material_keluar`
--
ALTER TABLE `material_keluar`
  ADD PRIMARY KEY (`id_mk`),
  ADD KEY `id_sm` (`id_sm`),
  ADD KEY `id_sk` (`id_sk`),
  ADD KEY `id_sopir` (`id_sopir`);

--
-- Indeks untuk tabel `satuan_barang`
--
ALTER TABLE `satuan_barang`
  ADD PRIMARY KEY (`id_sb`);

--
-- Indeks untuk tabel `sopir`
--
ALTER TABLE `sopir`
  ADD PRIMARY KEY (`id_sopir`);

--
-- Indeks untuk tabel `status_keluar`
--
ALTER TABLE `status_keluar`
  ADD PRIMARY KEY (`id_sk`);

--
-- Indeks untuk tabel `status_stok`
--
ALTER TABLE `status_stok`
  ADD PRIMARY KEY (`id_ss`);

--
-- Indeks untuk tabel `stok_material`
--
ALTER TABLE `stok_material`
  ADD PRIMARY KEY (`id_sm`),
  ADD KEY `id_bm` (`id_bm`),
  ADD KEY `id_ss` (`id_ss`),
  ADD KEY `id_sb` (`id_sb`),
  ADD KEY `id_sopir` (`id_sopir`);

--
-- Indeks untuk tabel `tentang`
--
ALTER TABLE `tentang`
  ADD PRIMARY KEY (`id_tentang`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_active` (`id_active`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id_access_menu`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `user_access_sub_menu`
--
ALTER TABLE `user_access_sub_menu`
  ADD PRIMARY KEY (`id_access_sub_menu`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_sub_menu` (`id_sub_menu`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id_sub_menu`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_active` (`id_active`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bahan_material`
--
ALTER TABLE `bahan_material`
  MODIFY `id_bm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `material_keluar`
--
ALTER TABLE `material_keluar`
  MODIFY `id_mk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `satuan_barang`
--
ALTER TABLE `satuan_barang`
  MODIFY `id_sb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `sopir`
--
ALTER TABLE `sopir`
  MODIFY `id_sopir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `status_keluar`
--
ALTER TABLE `status_keluar`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `status_stok`
--
ALTER TABLE `status_stok`
  MODIFY `id_ss` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `stok_material`
--
ALTER TABLE `stok_material`
  MODIFY `id_sm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tentang`
--
ALTER TABLE `tentang`
  MODIFY `id_tentang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id_access_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user_access_sub_menu`
--
ALTER TABLE `user_access_sub_menu`
  MODIFY `id_access_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `material_keluar`
--
ALTER TABLE `material_keluar`
  ADD CONSTRAINT `material_keluar_ibfk_1` FOREIGN KEY (`id_sm`) REFERENCES `stok_material` (`id_sm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `material_keluar_ibfk_2` FOREIGN KEY (`id_sk`) REFERENCES `status_keluar` (`id_sk`) ON UPDATE CASCADE,
  ADD CONSTRAINT `material_keluar_ibfk_3` FOREIGN KEY (`id_sopir`) REFERENCES `sopir` (`id_sopir`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `stok_material`
--
ALTER TABLE `stok_material`
  ADD CONSTRAINT `stok_material_ibfk_1` FOREIGN KEY (`id_bm`) REFERENCES `bahan_material` (`id_bm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stok_material_ibfk_2` FOREIGN KEY (`id_ss`) REFERENCES `status_stok` (`id_ss`) ON UPDATE CASCADE,
  ADD CONSTRAINT `stok_material_ibfk_3` FOREIGN KEY (`id_sb`) REFERENCES `satuan_barang` (`id_sb`) ON UPDATE CASCADE,
  ADD CONSTRAINT `stok_material_ibfk_4` FOREIGN KEY (`id_sopir`) REFERENCES `sopir` (`id_sopir`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_active`) REFERENCES `user_status` (`id_status`);

--
-- Ketidakleluasaan untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`),
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `user_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_access_sub_menu`
--
ALTER TABLE `user_access_sub_menu`
  ADD CONSTRAINT `user_access_sub_menu_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`),
  ADD CONSTRAINT `user_access_sub_menu_ibfk_2` FOREIGN KEY (`id_sub_menu`) REFERENCES `user_sub_menu` (`id_sub_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `user_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_sub_menu_ibfk_2` FOREIGN KEY (`id_active`) REFERENCES `user_status` (`id_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
