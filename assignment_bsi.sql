-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2023 pada 11.57
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment_bsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `category`, `type`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Kesehatan Mental', 'article', 'Kesehatan Mental Kesehatan mental yang baik adalah kondisi ketika batin kita berada dalam keadaan tentram dan tenang, sehingga memungkinkan kita untuk menikmati kehidupan sehari-hari dan menghargai orang lain di sekitar.', '2023-07-02 19:21:05', NULL),
(2, 'adasdad', 'general', 'asdsadasdsad', '2023-07-03 06:16:45', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `publication_date` timestamp NULL DEFAULT NULL,
  `tags` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`id`, `author`, `category`, `title`, `content`, `publication_date`, `tags`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'fucked up', 'teste', '2023-07-02 19:55:00', 'fuckedup', '2023-07-02 19:55:37', NULL),
(2, 2, 1, 'fucked up 2', 'test', '2023-07-02 19:56:00', 'dasda', '2023-07-02 19:56:28', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `gaji` int(11) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_gaji`
--

INSERT INTO `tb_gaji` (`id`, `pegawai_id`, `gaji`, `bulan`, `tanggal`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 48000000, '7', '2023-07-03', 'gajian bulanan', '2023-07-03 07:22:41', NULL),
(2, 1, 48000000, '2', '2023-07-31', 'gajian bulanan', '2023-07-03 07:50:12', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `status_pernikahan` tinyint(1) NOT NULL,
  `tanggal_gabung` date NOT NULL,
  `divisi` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `gaji` int(11) NOT NULL,
  `status_bekerja` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id`, `user_id`, `nama`, `email`, `no_hp`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `status_pernikahan`, `tanggal_gabung`, `divisi`, `jabatan`, `gaji`, `status_bekerja`, `created_at`, `updated_at`) VALUES
(1, 0, 'Zidan', 'zidanlastone01@gmail.com', '083892091230', 'Kp.Kabandungan No.61 RT.02/RW.08 Desa.Sirnagalih Kec.Tamansari Kab.Bogor 16610', 'Bogor', '2001-06-24', 'L', 0, '2018-07-01', 'administrasi', 'administrasi', 4800000, 'KONTRAK', '2023-07-02 23:23:29', '2023-07-03 09:41:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id` int(11) NOT NULL,
  `tarif_listrik_id` int(11) NOT NULL,
  `pelanggan_id` varchar(12) NOT NULL,
  `nama_pelanggan` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id`, `tarif_listrik_id`, `pelanggan_id`, `nama_pelanggan`, `alamat`, `created_at`, `updated_at`) VALUES
(3, 1, 'P230630-0001', 'John Doe', 'test', '2023-06-30 09:39:25', NULL),
(5, 1, 'P230630-0003', 'John Doe 3', 'test', '2023-06-30 09:41:38', NULL),
(7, 4, 'P230630-0004', 'John Doe', 'test', '2023-06-30 09:42:18', NULL),
(8, 4, 'P230630-0005', 'John Doe  5', 'Kp.Kabandungan No.61 RT.02/RW.08 Desa.Sirnagalih Kec.Tamansari Kab.Bogor 16610', '2023-06-30 10:00:28', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_presensi`
--

CREATE TABLE `tb_presensi` (
  `id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `status_presensi` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_presensi`
--

INSERT INTO `tb_presensi` (`id`, `pegawai_id`, `status_presensi`, `tanggal`, `jam`, `bukti`, `created_at`, `updated_at`) VALUES
(1, 1, 'MASUK', '2023-07-03', '13:25:00', 'hadir', '2023-07-03 06:25:19', NULL),
(2, 1, 'MASUK', '2023-07-02', '13:32:00', 'hadir', '2023-07-03 06:32:55', NULL),
(3, 1, 'PULANG', '2023-07-03', '16:20:00', 'pulang', '2023-07-03 08:20:20', NULL),
(4, 1, 'PULANG', '2023-07-02', '16:20:00', 'pulang', '2023-07-03 08:20:45', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tagihan`
--

CREATE TABLE `tb_tagihan` (
  `id` int(11) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `tahun_tagihan` varchar(4) NOT NULL,
  `bulan_tagihan` int(1) NOT NULL,
  `pemakaian` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_tagihan`
--

INSERT INTO `tb_tagihan` (`id`, `pelanggan_id`, `tahun_tagihan`, `bulan_tagihan`, `pemakaian`, `created_at`, `updated_at`) VALUES
(1, 3, '2023', 1, 232, '2023-07-02 05:50:42', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tarif_listrik`
--

CREATE TABLE `tb_tarif_listrik` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kd_tarif` varchar(4) NOT NULL,
  `beban` int(4) NOT NULL,
  `tarif_perkwh` int(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_tarif_listrik`
--

INSERT INTO `tb_tarif_listrik` (`id`, `user_id`, `kd_tarif`, `beban`, `tarif_perkwh`, `created_at`, `updated_at`) VALUES
(1, 1, 'A001', 900, 1000, '2023-06-30 08:15:18', '2023-06-30 08:32:34'),
(3, 1, 'A002', 1200, 1300, '2023-06-30 08:31:43', '2023-06-30 08:32:10'),
(4, 1, 'A003', 1400, 1500, '2023-06-30 08:31:58', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `email`, `username`, `password`, `hak_akses`, `created_at`, `updated_at`) VALUES
(1, 'Zidan', 'zidanlastone01@gmail.com', 'zidanlastone', '$2y$10$inlFwFpbLIexeF5fuXi9b..hetOr9qfTZladeV5.D0bq8XXxEi4.O', 0, '2023-06-30 07:11:04', NULL),
(2, 'Zidan', 'zidanlastone02@gmail.com', 'test01', '$2y$10$Rb8rIA2aJ4SzXJbMmDGCdO6KM.LlCuJ76pgmT.euY0qIUM04jFmhy', 0, '2023-07-02 16:54:54', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tarif_listrik_id` (`tarif_listrik_id`);

--
-- Indeks untuk tabel `tb_presensi`
--
ALTER TABLE `tb_presensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`);

--
-- Indeks untuk tabel `tb_tarif_listrik`
--
ALTER TABLE `tb_tarif_listrik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_presensi`
--
ALTER TABLE `tb_presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_tarif_listrik`
--
ALTER TABLE `tb_tarif_listrik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD CONSTRAINT `tb_pelanggan_ibfk_1` FOREIGN KEY (`tarif_listrik_id`) REFERENCES `tb_tarif_listrik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD CONSTRAINT `tb_tagihan_ibfk_1` FOREIGN KEY (`pelanggan_id`) REFERENCES `tb_pelanggan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_tarif_listrik`
--
ALTER TABLE `tb_tarif_listrik`
  ADD CONSTRAINT `tb_tarif_listrik_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
