-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 07, 2023 at 07:57 AM
-- Server version: 5.7.33
-- PHP Version: 8.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_akhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `foto` varchar(60) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `username`, `password`, `foto`, `created_at`, `updated_at`) VALUES
(8, 'admin', 'megapratw17@gmail.com', 'admin', '$2y$10$w.dIXb1Ih0OyeML1sXDgNe1/FLlNlYTGRC.UkznYXIWSvLKwwJfme', NULL, '2023-07-12 22:15:02', '2023-07-12 22:15:02'),
(9, 'admin', 'mega123@gmail.com', 'admin', '$2y$10$VBYGLpvbzqn3ak8IGx/QvO4v4gOm.Xm20og8qRc26m/0Y7kJ6ga/G', NULL, '2023-07-31 13:00:27', '2023-07-31 13:00:27');

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `id_alat` int(11) NOT NULL,
  `nama_alat` varchar(60) DEFAULT NULL,
  `jumlah_alat` int(11) DEFAULT NULL,
  `foto` varchar(60) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `status` int(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alat`
--

INSERT INTO `alat` (`id_alat`, `nama_alat`, `jumlah_alat`, `foto`, `deskripsi`, `status`, `created_at`, `updated_at`) VALUES
(18, 'Tang Crimping Tekiro', 5, 'app/images/alat/1690782775-Dl6sP.png', 'Tang crimping adalah salah satu jenis alat pemotong khusus untuk kabel.', 1, '2023-07-31 05:52:55', '2023-08-03 03:59:09'),
(19, 'Obeng Set', 30, 'app/images/alat/1690782841-pHMEh.png', 'Obeng merupakan alat yang berfungsi untuk memutar sekrup agar dapat mengencangkan atau mengendorkan berbagai komponen', 1, '2023-07-31 05:54:01', '2023-07-31 05:54:01'),
(20, 'Camera Sony a6400', 2, 'app/images/alat/1690782898-F26Su.png', 'Untuk dokumentasi seluruh kegiatan Jurusan', 1, '2023-07-31 05:54:58', '2023-07-31 05:54:58'),
(21, 'Pengupas Kabel LAN Tekiro', 8, 'app/images/alat/1690782970-GkqiR.png', 'Alat ini dapat digunakan untuk mengupas bagian luar kabel dengan diameter kabel maksimal 5mm.', 1, '2023-07-31 05:56:10', '2023-07-31 05:56:10'),
(22, 'Headset Gaming', 60, 'app/images/alat/1690783050-MKSTZ.png', 'Headset merupakan gabungan antara fungsi mendengarkan audio dan berbicara atau berkomunikasi.', 1, '2023-07-31 05:57:30', '2023-07-31 05:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `kalab`
--

CREATE TABLE `kalab` (
  `id_kalab` int(11) NOT NULL,
  `nama` varchar(60) DEFAULT NULL,
  `nip` bigint(20) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `no_hp` int(11) DEFAULT NULL,
  `foto` varchar(60) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kalab`
--

INSERT INTO `kalab` (`id_kalab`, `nama`, `nip`, `username`, `password`, `no_hp`, `foto`, `created_at`, `updated_at`) VALUES
(8, 'Darmanto', 197008242000032006, 'darmanto', '$2y$10$edpfzAXZiSpMv58JS9fUCOpkFVDH3h5qFxznQMecTCr9ge1jht.JO', 897778, 'app/images/kalab/1690812362-H3CZX.png', '2023-07-12 21:57:41', '2023-07-31 14:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `keluhan`
--

CREATE TABLE `keluhan` (
  `id_keluhan` int(11) NOT NULL,
  `id_lab` int(11) DEFAULT NULL,
  `tanggal_pengajuan` varchar(25) DEFAULT NULL,
  `deskripsi` varchar(60) DEFAULT NULL,
  `nama_alat` varchar(60) DEFAULT NULL,
  `nomor_meja` int(11) DEFAULT NULL,
  `foto` varchar(60) DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluhan`
--

INSERT INTO `keluhan` (`id_keluhan`, `id_lab`, `tanggal_pengajuan`, `deskripsi`, `nama_alat`, `nomor_meja`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(4, 13, '2023-07-31', 'huruf I lepas', 'keyboard', 12, 'app/images/keluhan/1690990293-exinv.jpg', '2', '2023-07-31 06:15:46', '2023-08-02 15:32:49');

-- --------------------------------------------------------

--
-- Table structure for table `keluhan_alat_pinjam`
--

CREATE TABLE `keluhan_alat_pinjam` (
  `id _keluhan_pinjam` int(11) NOT NULL,
  `id_peminjaman_alat` int(11) DEFAULT NULL,
  `nama_alat` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluhan_alat_pinjam`
--

INSERT INTO `keluhan_alat_pinjam` (`id _keluhan_pinjam`, `id_peminjaman_alat`, `nama_alat`, `keterangan`, `foto`, `created_at`, `updated_at`) VALUES
(2, 17, 'Tang Crimping Tekiro', 'rusak', 'app/images/keluhan/1690784572-KxdCk.jpg', '2023-07-31 06:22:52', '2023-07-31 06:22:52');

-- --------------------------------------------------------

--
-- Table structure for table `laboratorium`
--

CREATE TABLE `laboratorium` (
  `id_lab` int(11) NOT NULL,
  `nama_laboratorium` varchar(255) DEFAULT NULL,
  `kapasitas` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratorium`
--

INSERT INTO `laboratorium` (`id_lab`, `nama_laboratorium`, `kapasitas`, `foto`, `created_at`, `updated_at`) VALUES
(12, 'Laboratorium Programming', '24 orang', 'app/images/laboratorium/1690779093-FGtLE.jpg', '2023-07-31 04:51:36', '2023-07-31 04:51:36'),
(13, 'Laboratorium Multimedia', '20 orang', 'app/images/laboratorium/1690779199-wcide.jpg', '2023-07-31 04:53:19', '2023-07-31 04:53:19'),
(14, 'Laboratorium RPL', '35 orang', 'app/images/laboratorium/1690779259-uBlwL.jpg', '2023-07-31 04:54:19', '2023-07-31 04:54:19'),
(15, 'Laboratorium PBL 1', '25 orang', 'app/images/laboratorium/1690779358-6SAd8.jpg', '2023-07-31 04:55:58', '2023-07-31 04:55:58'),
(16, 'Laboratorium PBL 2', '25 orang', 'app/images/laboratorium/1690779388-xkw58.jpg', '2023-07-31 04:56:28', '2023-07-31 04:56:28');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nim` bigint(20) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `no_hp` bigint(20) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama`, `nim`, `username`, `password`, `no_hp`, `semester`, `status`, `foto`, `created_at`, `updated_at`) VALUES
(5, 'mega pratiwi', 3042020056, 'mega', '$2y$10$1gvZq9oXMZcR9rvEsDgFt.2oBYQIGQlrHCsIkW0rmJNQa.gcIhhlK', 8970700735, 6, 2, 'app/images/mahasiswa/1688797350-bnWVb.jpg', '2023-05-26 06:00:44', '2023-08-02 15:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_lab` int(11) DEFAULT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `tanggal_peminjaman` varchar(55) DEFAULT NULL,
  `tanggal_selesai` varchar(60) DEFAULT NULL,
  `waktu_mulai` varchar(55) DEFAULT NULL,
  `waktu_selesai` varchar(60) DEFAULT NULL,
  `status` varchar(60) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_lab`, `id_mahasiswa`, `tanggal_peminjaman`, `tanggal_selesai`, `waktu_mulai`, `waktu_selesai`, `status`, `created_at`, `updated_at`) VALUES
(21, 12, 5, '2023-08-03', '2023-08-03', '07.00', '07.59', '2', '2023-07-31 06:05:35', '2023-07-31 14:56:53'),
(22, 13, 5, '2023-08-02', '2023-02-02', '07.00', '07.59', '3', '2023-07-31 06:06:43', '2023-07-31 14:57:13'),
(23, 14, 5, '2023-08-03', '2023-08-05', '07.00', '08.59', '3', '2023-07-31 06:07:11', '2023-08-02 15:23:57'),
(24, 12, 5, '2023-08-04', '2023-08-04', '07.00', '07.59', '1', '2023-08-03 04:22:33', '2023-08-03 04:22:33');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_alat`
--

CREATE TABLE `peminjaman_alat` (
  `id_peminjaman_alat` int(11) NOT NULL,
  `id_alat` int(11) DEFAULT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `jumlah_alat` int(11) DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `waktu_selesai` varchar(60) DEFAULT NULL,
  `tanggal_peminjaman` date DEFAULT NULL,
  `waktu_mulai` varchar(60) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman_alat`
--

INSERT INTO `peminjaman_alat` (`id_peminjaman_alat`, `id_alat`, `id_mahasiswa`, `jumlah_alat`, `tanggal_selesai`, `waktu_selesai`, `tanggal_peminjaman`, `waktu_mulai`, `deskripsi`, `status`, `updated_at`, `created_at`) VALUES
(17, 18, 5, 10, '2023-08-05', '08.59', '2023-08-05', '07.00', NULL, '4', '2023-07-31 06:21:32', '2023-07-31 06:21:32'),
(18, 19, 5, 10, '2023-08-02', '10.59', '2023-08-02', '09.00', NULL, '3', '2023-07-31 06:18:05', '2023-07-31 06:18:05'),
(19, 18, 5, 5, '2023-08-04', '07.59', '2023-08-04', '07.00', 'merk A', '2', '2023-08-03 03:59:09', '2023-08-03 03:59:09'),
(20, 18, 5, 6, '2023-08-04', '07.59', '2023-08-04', '07.00', 'merk A', '3', '2023-08-03 04:19:09', '2023-08-03 04:19:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indexes for table `kalab`
--
ALTER TABLE `kalab`
  ADD PRIMARY KEY (`id_kalab`);

--
-- Indexes for table `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id_keluhan`);

--
-- Indexes for table `keluhan_alat_pinjam`
--
ALTER TABLE `keluhan_alat_pinjam`
  ADD PRIMARY KEY (`id _keluhan_pinjam`);

--
-- Indexes for table `laboratorium`
--
ALTER TABLE `laboratorium`
  ADD PRIMARY KEY (`id_lab`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `peminjaman_alat`
--
ALTER TABLE `peminjaman_alat`
  ADD PRIMARY KEY (`id_peminjaman_alat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `kalab`
--
ALTER TABLE `kalab`
  MODIFY `id_kalab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `keluhan`
--
ALTER TABLE `keluhan`
  MODIFY `id_keluhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keluhan_alat_pinjam`
--
ALTER TABLE `keluhan_alat_pinjam`
  MODIFY `id _keluhan_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laboratorium`
--
ALTER TABLE `laboratorium`
  MODIFY `id_lab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `peminjaman_alat`
--
ALTER TABLE `peminjaman_alat`
  MODIFY `id_peminjaman_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
