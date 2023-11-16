-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2023 at 09:32 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sifocus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_infocus`
--

CREATE TABLE `tbl_infocus` (
  `id_infocus` int(11) NOT NULL,
  `kode_infocus` varchar(255) DEFAULT NULL,
  `sampul` varchar(255) DEFAULT NULL,
  `merek` varchar(255) DEFAULT NULL,
  `thn_infocus` varchar(255) DEFAULT NULL,
  `kondisi_infocus` varchar(255) NOT NULL,
  `rak` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_infocus`
--

INSERT INTO `tbl_infocus` (`id_infocus`, `kode_infocus`, `sampul`, `merek`, `thn_infocus`, `kondisi_infocus`, `rak`, `status`) VALUES
(35, 'testing 1', NULL, 'EPSON', '2020', 'Baik', 'Rak 1', 'Tersedia'),
(36, 'testing 2', NULL, 'EPSON', '2022', 'Baik', 'Rak 1', 'Tersedia'),
(37, 'testing 3', NULL, 'EPSON', '2020', 'Baik', 'Rak 2', 'Tersedia'),
(38, 'testing 4', NULL, 'EPSON', '2020', 'Baik', 'Rak 3', 'Tersedia'),
(39, 'testing 5', NULL, 'EPSON', '2021', 'Baik', 'Rak 4', 'Tersedia'),
(40, 'testing 6', NULL, 'EPSON', '2020', 'Baik', 'Rak 4', 'Tersedia'),
(41, 'testing 7', NULL, 'EPSON', '2019', 'Baik', 'Rak 4', 'Tersedia'),
(42, 'testing 8', NULL, 'EPSON', '2018', 'Baik', 'Rak 4', 'Tersedia'),
(44, 'testing 9', NULL, 'EPSON', '2021', 'Baik', 'Rak 1', 'Tersedia'),
(45, 'testing 10', NULL, 'EPSON', '2019', 'Baik', 'Rak 4', 'Tersedia'),
(46, 'testing 11', NULL, 'EPSON', '2021', 'Baik', 'Rak 3', 'Dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `nim` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` varchar(255) NOT NULL,
  `jenkel` varchar(255) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`nim`, `user`, `pass`, `level`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenkel`, `prodi`, `alamat`, `telepon`, `email`, `foto`) VALUES
('11111111111', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Administrator', 'Pekanbaru', '2004-03-21', 'Laki-Laki', 'Sistem Informasi', 'Jalan Bangau Sakti', '081350635857', 'admin@gmail.com', 'user_1688563422.png'),
('12150311608', 'atha', '81dc9bdb52d04dc20036dbd8313ed055', 'Mahasiswa', 'Atha Kurniawan', 'Pekanbaru', '2003-02-07', 'Laki-Laki', 'Teknik Industri', 'Jalan Gobah', '087654321234', 'atha@gmail.com', 'user_1689872266.jpeg'),
('12150311729', 'dhani', '81dc9bdb52d04dc20036dbd8313ed055', 'Mahasiswa', 'Ahmad Dhani', 'Batam', '2002-09-30', 'Laki-Laki', 'Teknik Informatika', 'Jalan Garuda Sakti', '081264345210', 'ahmaddhani@gmail.com', 'user_1689045416.jpg'),
('12150312142', 'anggi', '81dc9bdb52d04dc20036dbd8313ed055', 'Mahasiswa', 'Anggi Mulya', 'Pangkalan Kerinci', '2004-03-21', 'Laki-Laki', 'Sistem Informasi', 'Jalan Bangau', '081350635857', 'anggimulya00@gmail.com', 'user_1672281658.jpeg'),
('12150314341', 'tara', '81dc9bdb52d04dc20036dbd8313ed055', 'Mahasiswa', 'Ustara Dwi Fernanda', 'Bangkinang', '2003-05-21', 'Laki-Laki', 'Sistem Informasi', 'Jalan Kasah Ujung', '082385778592', '12150314341@students.uin-suska.ac.id', 'user_1689323433.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pinjam`
--

CREATE TABLE `tbl_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `pinjam_id` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nama_dosen` varchar(255) DEFAULT NULL,
  `mata_kuliah` varchar(255) DEFAULT NULL,
  `kode_infocus` varchar(255) NOT NULL,
  `kode_ruangan` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `tgl_pinjam` varchar(255) DEFAULT NULL,
  `jam_pinjam` varchar(255) NOT NULL,
  `lama_pinjam` int(11) DEFAULT NULL,
  `tgl_kembali` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pinjam`
--

INSERT INTO `tbl_pinjam` (`id_pinjam`, `pinjam_id`, `nama`, `nama_dosen`, `mata_kuliah`, `kode_infocus`, `kode_ruangan`, `status`, `tgl_pinjam`, `jam_pinjam`, `lama_pinjam`, `tgl_kembali`) VALUES
(99, 'PJ0099', 'Anggi Mulya', 'anggi', 'coding', 'testing 4', '', 'Dikembalikan', '2023-07-18', '16:58:42', 1, '2023-07-20 11:32:33'),
(100, 'PJ00100', 'Ahmad Dhani', 'ahmad', '123', 'testing 3', '', 'Dikembalikan', '2023-07-18', '17:00:46', 1, '2023-07-20 11:39:46'),
(101, 'PJ00101', 'Anggi Mulya', 'Tengku ', '1', 'testing 7', 'FASTE 201 LT 2', 'Dikembalikan', '2023-07-20', '11:06:13', 1, '2023-07-21 16:50:42'),
(102, 'PJ00102', 'Ahmad Dhani', 'Tengku ', 'coding', 'testing 7', 'GB 101 LT 1', 'Dikembalikan', '2023-07-20', '11:32:50', 1, '2023-07-20 12:13:35'),
(103, 'PJ00103', 'Ahmad Dhani', '1', '1', 'testing 6', 'GB 101 LT 1', 'Dikembalikan', '2023-07-20', '12:14:00', 1, '2023-07-20 18:16:38'),
(104, 'PJ00104', 'Anggi Mulya', 'Tengku ', 'IMK', 'testing 8', 'GB 101 LT 1', 'Dikembalikan', '2023-07-20', '18:17:00', 1, '2023-07-21 16:54:26'),
(106, 'PJ00105', 'Anggi Mulya', 'Tengku ', 'testing', 'testing 10', 'GB 101 LT 1', 'Dikembalikan', '2023-07-21', '16:08:14', 8, '2023-07-21 16:51:57'),
(107, 'PJ00107', 'Anggi Mulya', 'Tengku ', 'coding', 'testing 11', 'GB 101 LT 1', 'Dikembalikan', '2023-07-21', '16:32:07', 1, '2023-07-21 16:49:26'),
(108, 'PJ00108', 'Anggi Mulya', 'asd', 'asd', 'testing 10', 'GB 101 LT 1', 'Dikembalikan', '2023-07-21', '16:43:59', 1, '2023-07-21 16:45:53'),
(109, 'PJ00109', 'Anggi Mulya', 'Tengku ', 'testing', 'testing 11', 'GB 101 LT 1', 'Dikembalikan', '2023-07-21', '16:54:53', 1, '2023-07-21 16:57:19'),
(110, 'PJ00110', 'Anggi Mulya', 'anggi', '1234', 'testing 9', 'GB 101 LT 1', 'Dikembalikan', '2023-07-21', '17:01:46', 1, '2023-07-21 17:02:26'),
(111, 'PJ00111', 'Anggi Mulya', 'Tengku ', 'IMK', 'testing 7', 'GB 101 LT 1', 'Dikembalikan', '2023-07-21', '17:41:47', 1, '2023-07-21 17:42:37'),
(112, 'PJ00112', 'Anggi Mulya', 'Tengku ', 'IMK', 'testing 8', 'GB 101 LT 1', 'Dikembalikan', '2023-07-21', '17:44:00', 1, '2023-07-21 17:44:50'),
(113, 'PJ00113', 'Ahmad Dhani', 'Tengku ', 'IMK', 'testing 6', 'GB 101 LT 1', 'Dikembalikan', '2023-07-21', '17:46:30', 1, '2023-07-21 20:15:21'),
(114, 'PJ00114', 'Anggi Mulya', 'anggi', '1234', 'testing 5', 'GB 101 LT 1', 'Dikembalikan', '2023-07-21', '20:15:52', 1, '2023-07-21 20:19:42'),
(115, 'PJ00115', 'Anggi Mulya', 'sad', 'asd', 'testing 5', 'GB 101 LT 1', 'Dikembalikan', '2023-07-21', '20:19:57', 1, '2023-07-21 20:23:32'),
(116, 'PJ00116', 'Ustara Dwi Fernanda', '1', 'coding', 'testing 5', 'GB 101 LT 1', 'Dikembalikan', '2023-07-21', '20:35:44', 1, '2023-07-21 20:36:29'),
(118, 'PJ00118', 'Atha Kurniawan', '1', '1', 'testing 5', 'GB 101 LT 1', 'Dikembalikan', '2023-07-21', '22:58:32', 1, '2023-07-21 23:01:13'),
(119, 'PJ00119', 'Atha Kurniawan', 'ghcghrw', 'weewrtw', 'testing 5', 'GB 101 LT 1', 'Dikembalikan', '2023-07-21', '22:59:23', 1, '2023-07-21 23:01:16'),
(120, 'PJ00120', 'Atha Kurniawan', 'sda', 'dasd', 'testing 5', 'GB 101 LT 1', 'Dikembalikan', '2023-07-21', '23:01:22', 1, '2023-07-21 23:07:35'),
(121, 'PJ00121', 'Atha Kurniawan', 'sfs', 'dfsfd', 'testing 5', 'GB 101 LT 1', 'Dikembalikan', '2023-07-21', '23:02:13', 1, '2023-07-21 23:07:38'),
(122, 'PJ00122', 'Atha Kurniawan', 'ssa', 'asas', 'testing 5', 'GB 101 LT 1', 'Dikembalikan', '2023-07-21', '23:04:24', 1, '2023-07-21 23:07:41'),
(123, 'PJ00123', 'Atha Kurniawan', '1', '1', 'testing 5', 'GB 101 LT 1', 'Dikembalikan', '2023-07-21', '23:07:07', 1, '2023-07-21 23:07:45'),
(124, 'PJ00124', 'Atha Kurniawan', '1', '1', 'testing 5', 'GB 101 LT 1', 'Dikembalikan', '2023-07-21', '23:08:38', 1, '2023-07-21 23:08:57'),
(125, 'PJ00125', 'Ustara Dwi Fernanda', 'Tengku ', 'IMK', 'testing 11', 'GB 101 LT 1', 'Dipinjam', '2023-07-22', '02:19:42', 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `kode_ruangan` varchar(255) NOT NULL,
  `lokasi_ruangan` varchar(255) NOT NULL,
  `lantai_ruangan` varchar(255) NOT NULL,
  `nomor_ruangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ruangan`
--

INSERT INTO `tbl_ruangan` (`kode_ruangan`, `lokasi_ruangan`, `lantai_ruangan`, `nomor_ruangan`) VALUES
('GB 101 LT 1', 'GB', '1', '101');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_infocus`
--
ALTER TABLE `tbl_infocus`
  ADD PRIMARY KEY (`id_infocus`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD PRIMARY KEY (`kode_ruangan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_infocus`
--
ALTER TABLE `tbl_infocus`
  MODIFY `id_infocus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
