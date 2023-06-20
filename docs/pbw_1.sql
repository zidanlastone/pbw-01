-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jun 2023 pada 13.41
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
-- Database: `pbw_1`
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
(7, 'tete12', 'article', 'ettetse', '2023-06-19 08:43:27', NULL),
(8, 'asdad', 'article', 'asdasd', '2023-06-19 08:43:43', NULL);

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
(1, 1, 7, 'Usaha Mengurangi Rasa malas bagi Remaja: Rasa Malas sebagai Dampak Negatif Globalisasi', 'Pendahuluan\r\n\r\nPada era yang serba canggih ini, banyak remaja yang mengalami tantangan dalam mengatasi rasa malas terlebih akibat dari globalisasi yang semakin canggih. Globalisasi merupakan sesuatu yang tidak dapat dihindari dan pasti akan terjadi. Globalisasi tidak hanya membawa dampak ekonomi, tetapi segala aspek yang pada akhirnya memaksa manusia untuk beradaptasi. Perubahan teknologi informasi memungkinkan berita internasional untuk dikenal di seluruh dunia dalam beberapa saat.\r\n\r\nTomlinson (1999) menjelaskan globalisasi dalam dua cara. Pertama, globalisasi dapat menguntungkan suatu negara karena globalisasi telah membuat dunia terasa sangat dekat. Jarak individu antara satu negara dan negara lain tidak terbatas. Kemajuan alat-alat teknologi komunikasi seperti radio, televisi, video, dan internet telah mempermudah dalam menjangkau orang lain. Kedua, globalisasi dapat merugikan negara karena menimbulkan imperialisme baru dalam budaya masyarakat. \r\n\r\nPerkembangan teknologi informasi dan komunikasi yang digambarkan oleh Tomlinson memang telah menjadi imperialisme baru tidak hanya di dunia ekonomi, sosial dan budaya, tetapi juga di dunia pendidikan. Dalam dunia pendidikan, perkembangan teknologi memegang peranan yang sangat penting. Namun, perkembangan teknologi yang semakin meningkat ini memberikan dampak yang sangat besar bagi dunia pendidikan, baik secara positif maupun negatif bagi masyarakat khususnya peserta didik.\r\n\r\nIsi\r\n\r\nDengan teknologi yang terus maju ini, siswa dapat dengan mudah menemukan informasi dari seluruh dunia. Hal ini menurunkan minat baca siswa, belum lagi hadirnya media sosial yang menambah kemalasan mereka. Media sosial yang tersedia dalam berbagai versi membuat siswa ketagihan dalam penggunaannya. Saat mulai mengerjakan tugas, mereka tentu tak lupa mengecek akun media sosialnya saat membuka internet.', '2023-06-20 09:16:27', '#bootstrap, #codeigniter, #mysql', '2023-06-20 09:18:12', '2023-06-20 11:00:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Zidan', 'zidanlastone', 'zidanlastone01@gmail.com', '$2y$10$xxkeOXA1Y0aHmdokEh1eAOHeMTZIo1rsXPLwdPJPDa2iRNSrm8LhS', '2023-06-17 19:34:40', '2023-06-17 19:34:40'),
(2, 'Zidan', 'zidanlastone01', 'zidanlastone02@gmail.com', '$2y$10$vh3Bk6pJkEM9bQV32S1/NupUC73M.Z2.cSRPVdMTLZu1u6CFXauhW', '2023-06-17 19:39:01', '2023-06-17 19:39:01'),
(3, 'Zidan', 'zidanlastone02', 'zidanlastone02@gmail.com', '$2y$10$zsEjV4vJnfLUEyC3nOtuieo7ZYsvmtJhbaNNMBKOwD59CTdq4Fmye', '2023-06-17 19:39:32', '2023-06-17 19:39:32'),
(4, 'Zidan', 'zidanlastone03', 'zidanlastone03@gmail.com', '$2y$10$Ac.3Mhc19FV6C8OBvEGm.eWzH6PTN/GT77gm8SIi5KyOLx/sleaMK', '2023-06-17 19:45:30', '2023-06-17 19:45:30');

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
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
