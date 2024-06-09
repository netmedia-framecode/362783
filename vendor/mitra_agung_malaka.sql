-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 09 Jun 2024 pada 09.38
-- Versi server: 8.3.0
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mitra_agung_malaka`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth`
--

CREATE TABLE `auth` (
  `id` int NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `bg` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `auth`
--

INSERT INTO `auth` (`id`, `image`, `bg`) VALUES
(1, 'auth.jpg', '#4e73de');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_material`
--

CREATE TABLE `bahan_material` (
  `id_bm` int NOT NULL,
  `nama_material` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
(11, 'Sertu', '2024-06-09 13:26:38', '2024-06-09 13:26:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int NOT NULL,
  `username` varchar(75) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` char(12) DEFAULT NULL,
  `pesan` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `username`, `email`, `phone`, `pesan`, `created_at`, `updated_at`) VALUES
(1, 'tes', 'developer@gmail.com', '08138', '', '2024-06-09 16:41:34', '2024-06-09 16:41:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `material_keluar`
--

CREATE TABLE `material_keluar` (
  `id_mk` int NOT NULL,
  `id_sm` int DEFAULT NULL,
  `id_sk` int DEFAULT NULL,
  `nama_pemesan` varchar(50) DEFAULT NULL,
  `no_telp` varchar(12) DEFAULT NULL,
  `alamat_pengiriman` varchar(100) DEFAULT NULL,
  `jumlah_keluar` char(20) DEFAULT NULL,
  `biaya` char(20) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `material_keluar`
--

INSERT INTO `material_keluar` (`id_mk`, `id_sm`, `id_sk`, `nama_pemesan`, `no_telp`, `alamat_pengiriman`, `jumlah_keluar`, `biaya`, `created_at`, `updated_at`) VALUES
(7, 1, 3, 'arlan', '0811', 'jl. bajawa', '5', '6000000', '2024-06-09 14:46:13', '2024-06-09 15:11:34'),
(14, 1, 2, 'aty', '9735', 'liliba', '1', '1200000', '2024-06-09 15:58:59', '2024-06-09 15:58:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan_barang`
--

CREATE TABLE `satuan_barang` (
  `id_sb` int NOT NULL,
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
-- Struktur dari tabel `status_keluar`
--

CREATE TABLE `status_keluar` (
  `id_sk` int NOT NULL,
  `status_keluar` varchar(35) DEFAULT NULL,
  `progress` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `status_keluar`
--

INSERT INTO `status_keluar` (`id_sk`, `status_keluar`, `progress`) VALUES
(2, 'tes 1', 15),
(3, 'tes 2', 50),
(4, 'tes 3', 85),
(5, 'tes 4', 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_stok`
--

CREATE TABLE `status_stok` (
  `id_ss` int NOT NULL,
  `status` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `status_stok`
--

INSERT INTO `status_stok` (`id_ss`, `status`) VALUES
(2, 'tes 1'),
(3, 'tes 2'),
(5, 'tes 3'),
(6, 'tes 4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_material`
--

CREATE TABLE `stok_material` (
  `id_sm` int NOT NULL,
  `id_bm` int DEFAULT NULL,
  `id_ss` int DEFAULT NULL,
  `id_sb` int DEFAULT NULL,
  `jumlah` char(20) DEFAULT NULL,
  `biaya_satuan` char(20) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `stok_material`
--

INSERT INTO `stok_material` (`id_sm`, `id_bm`, `id_ss`, `id_sb`, `jumlah`, `biaya_satuan`, `created_at`, `updated_at`) VALUES
(1, 9, 3, 3, '1', '1200000', '2024-06-09 13:54:42', '2024-06-09 15:58:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang`
--

CREATE TABLE `tentang` (
  `id_tentang` int NOT NULL,
  `deskripsi` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tentang`
--

INSERT INTO `tentang` (`id_tentang`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel tenetur quidem ipsum reprehenderit facilis obcaecati sit quisquam natus temporibus, voluptatum quas sed nisi autem id iusto. Sed, nam deserunt eaque quia, ex iste consequatur temporibus id autem at tenetur voluptatibus dolorum voluptatum error eligendi impedit nemo ratione inventore odio illo nihil enim. Suscipit, ab quas. Commodi id architecto ex autem eligendi voluptatum ratione velit voluptates libero modi atque doloribus odit a aperiam quia, voluptate voluptas nobis alias, ducimus eius magni? Provident consequatur tenetur excepturi cupiditate rerum fugiat harum quae porro pariatur assumenda! Corrupti aliquam quae eos? Nobis id nihil reiciendis culpa labore adipisci optio, nam quia similique, obcaecati cumque placeat assumenda, unde esse ratione. Illum, harum tempore provident exercitationem commodi optio iusto eaque ipsa quidem eum? Cumque explicabo dolor quibusdam odit, quaerat magni voluptate aliquam minus. Laudantium in voluptatum, reprehenderit dicta ipsam adipisci error laboriosam libero ullam voluptatem voluptatibus repudiandae quia minus enim rem mollitia, ut delectus laborum voluptate eaque quisquam sed assumenda optio exercitationem.</p>\r\n', '2024-06-09 15:21:11', '2024-06-09 16:51:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `id_role` int DEFAULT NULL,
  `id_active` int DEFAULT '2',
  `en_user` varchar(75) DEFAULT NULL,
  `token` char(6) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT 'default.svg',
  `email` varchar(75) DEFAULT NULL,
  `password` varchar(75) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `id_role`, `id_active`, `en_user`, `token`, `name`, `image`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, 'developer', 'default.svg', 'developer@gmail.com', '$2y$10$//KMATh3ibPoI3nHFp7x/u7vnAbo2WyUgmI4x0CVVrH8ajFhMvbjG', '2024-06-07 08:57:23', '2024-06-07 08:57:23'),
(2, 4, 1, NULL, NULL, 'admin', 'default.svg', 'admin@gmail.com', '$2y$10$//KMATh3ibPoI3nHFp7x/u7vnAbo2WyUgmI4x0CVVrH8ajFhMvbjG', '2024-06-07 08:57:23', '2024-06-07 08:57:23');

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
  `id_access_menu` int NOT NULL,
  `id_role` int DEFAULT NULL,
  `id_menu` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id_access_menu`, `id_role`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 5),
(4, 1, 6),
(5, 1, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_sub_menu`
--

CREATE TABLE `user_access_sub_menu` (
  `id_access_sub_menu` int NOT NULL,
  `id_role` int DEFAULT NULL,
  `id_sub_menu` int DEFAULT NULL
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
(14, 1, 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id_menu` int NOT NULL,
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
  `id_role` int NOT NULL,
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
  `id_status` int NOT NULL,
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
  `id_sub_menu` int NOT NULL,
  `id_menu` int DEFAULT NULL,
  `id_active` int DEFAULT '2',
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
(14, 7, 1, 'Kontak', 'kontak', 'far fa-comment-dots');

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
  ADD KEY `id_sk` (`id_sk`);

--
-- Indeks untuk tabel `satuan_barang`
--
ALTER TABLE `satuan_barang`
  ADD PRIMARY KEY (`id_sb`);

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
  ADD KEY `id_sb` (`id_sb`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bahan_material`
--
ALTER TABLE `bahan_material`
  MODIFY `id_bm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `material_keluar`
--
ALTER TABLE `material_keluar`
  MODIFY `id_mk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `satuan_barang`
--
ALTER TABLE `satuan_barang`
  MODIFY `id_sb` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `status_keluar`
--
ALTER TABLE `status_keluar`
  MODIFY `id_sk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `status_stok`
--
ALTER TABLE `status_stok`
  MODIFY `id_ss` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `stok_material`
--
ALTER TABLE `stok_material`
  MODIFY `id_sm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tentang`
--
ALTER TABLE `tentang`
  MODIFY `id_tentang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id_access_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_access_sub_menu`
--
ALTER TABLE `user_access_sub_menu`
  MODIFY `id_access_sub_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id_status` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_sub_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `material_keluar`
--
ALTER TABLE `material_keluar`
  ADD CONSTRAINT `material_keluar_ibfk_1` FOREIGN KEY (`id_sm`) REFERENCES `stok_material` (`id_sm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `material_keluar_ibfk_2` FOREIGN KEY (`id_sk`) REFERENCES `status_keluar` (`id_sk`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `stok_material`
--
ALTER TABLE `stok_material`
  ADD CONSTRAINT `stok_material_ibfk_1` FOREIGN KEY (`id_bm`) REFERENCES `bahan_material` (`id_bm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stok_material_ibfk_2` FOREIGN KEY (`id_ss`) REFERENCES `status_stok` (`id_ss`) ON UPDATE CASCADE,
  ADD CONSTRAINT `stok_material_ibfk_3` FOREIGN KEY (`id_sb`) REFERENCES `satuan_barang` (`id_sb`) ON UPDATE CASCADE;

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
