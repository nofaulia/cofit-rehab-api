-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2021 at 01:12 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cofit-rehab`
--

-- --------------------------------------------------------

--
-- Table structure for table `evaluasi_bulanan`
--

CREATE TABLE `evaluasi_bulanan` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `uji_jalan` int(11) NOT NULL,
  `kualitas_hidup` int(11) NOT NULL,
  `skala_sesak` int(11) NOT NULL,
  `darah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evaluasi_bulanan`
--

INSERT INTO `evaluasi_bulanan` (`id`, `id_pasien`, `tanggal`, `uji_jalan`, `kualitas_hidup`, `skala_sesak`, `darah`) VALUES
(1, 1, '2021-07-29 18:42:26', 10, 8, 3, 150),
(2, 2, '2021-07-29 18:42:26', 15, 9, 2, 150),
(3, 1, '2021-08-05 21:56:20', 10, 20, 30, 40);

-- --------------------------------------------------------

--
-- Table structure for table `evaluasi_mingguan`
--

CREATE TABLE `evaluasi_mingguan` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `rhr` int(11) NOT NULL,
  `bfi` int(11) NOT NULL,
  `sts30detik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evaluasi_mingguan`
--

INSERT INTO `evaluasi_mingguan` (`id`, `id_pasien`, `tanggal`, `rhr`, `bfi`, `sts30detik`) VALUES
(1, 1, '2021-07-22 23:32:45', 60, 5, 14),
(2, 1, '2021-07-29 18:32:45', 55, 4, 15),
(6, 1, '2021-08-05 00:00:00', 10, 20, 30),
(7, 1, '2021-08-05 14:03:14', 60, 4, 12),
(8, 1, '2021-08-06 22:20:26', 60, 4, 14);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `url` varchar(200) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `title`, `url`, `is_active`) VALUES
(1, 'skala_borg', 'https://exercise.trekeducation.org/wp-content/uploads/sites/5/2017/11/borg-www-gymcompany-co-uk.jpg', 1),
(2, 'BFI', 'https://www.researchgate.net/profile/Dilara-Seyidova-Khoshknabi/publication/232007937/figure/fig2/AS:669251014774796@1536573284292/The-Brief-Fatigue-Inventory_W640.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `latihan`
--

CREATE TABLE `latihan` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tipe` int(11) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `latihan`
--

INSERT INTO `latihan` (`id`, `nama`, `tipe`, `deskripsi`, `url`, `is_active`) VALUES
(1, 'latihan pernapasan 1', 1, 'latihan pernapasan part 1', 'https://www.youtube.com/embed/ECxYJcnvyMw', 0),
(2, 'latihan pernapasan 2', 1, 'latihan pernapasan part 2', 'https://youtu.be/lEtHmazlW3s', 0),
(3, 'latihan endurans 1', 2, 'latihan endurans part 1', 'https://youtu.be/5uVaKjtJHN8', 0),
(4, 'latihan endurans 2', 2, 'latihan endurans part 2', 'https://youtu.be/h7WjdroIOqA', 0),
(5, 'latihan penguatan 1', 3, 'latihan penguatan part 1', 'https://youtu.be/5ARgeR1rMTo', 0),
(6, 'latihan penguatan 2', 3, 'latihan penguatan part 2', 'https://youtu.be/pOrc3zADC7k', 0),
(7, 'pendinginan', 4, '', 'https://www.youtube.com/embed/vfCbZVffAhE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `latihan_pasien`
--

CREATE TABLE `latihan_pasien` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_latihan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  `pra_bs` int(11) NOT NULL,
  `pasca_bs` int(11) NOT NULL,
  `cd_bs` int(11) NOT NULL,
  `pra_sato2` int(11) NOT NULL,
  `pasca_sato2` int(11) NOT NULL,
  `cd_sato2` int(11) NOT NULL,
  `pra_hr` int(11) NOT NULL,
  `pasca_hr` int(11) NOT NULL,
  `cd_hr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `latihan_pasien`
--

INSERT INTO `latihan_pasien` (`id`, `id_pasien`, `id_latihan`, `tanggal`, `waktu_mulai`, `waktu_selesai`, `pra_bs`, `pasca_bs`, `cd_bs`, `pra_sato2`, `pasca_sato2`, `cd_sato2`, `pra_hr`, `pasca_hr`, `cd_hr`) VALUES
(1, 1, 1, '2021-07-16', '2021-07-16 11:00:00', '2021-07-16 11:15:00', 6, 6, 0, 98, 98, 0, 88, 95, 0),
(2, 1, 2, '2021-07-23', '2021-07-23 11:20:00', '2021-07-23 11:30:00', 6, 6, 0, 98, 98, 0, 88, 95, 0),
(3, 2, 1, '2021-07-16', '2021-07-16 11:20:00', '2021-07-16 11:15:00', 6, 6, 0, 98, 98, 0, 88, 95, 0),
(4, 2, 2, '2021-07-16', '2021-07-16 11:45:00', '2021-07-16 12:00:00', 6, 6, 0, 98, 98, 0, 88, 95, 0),
(5, 1, 1, '2021-07-19', '2021-07-19 05:45:00', '2021-07-19 06:00:00', 6, 6, 0, 93, 98, 0, 88, 92, 0),
(6, 1, 3, '2021-08-04', '2021-08-04 20:00:00', '2021-08-04 20:10:00', 8, 7, 0, 95, 96, 0, 60, 65, 0),
(7, 1, 3, '2021-08-04', '2021-08-04 20:00:00', '2021-08-04 20:10:00', 8, 7, 0, 95, 96, 0, 60, 65, 0),
(8, 1, 3, '2021-08-04', '2021-08-04 20:00:00', '2021-08-04 20:10:00', 8, 7, 0, 95, 96, 0, 60, 65, 0),
(9, 1, 3, '2021-08-04', '2021-08-04 20:00:00', '2021-08-04 20:10:00', 8, 7, 0, 95, 96, 0, 60, 65, 0),
(10, 1, 3, '2021-08-04', '2021-08-04 20:00:00', '2021-08-04 20:10:00', 8, 7, 0, 95, 96, 0, 60, 65, 0),
(11, 1, 3, '2021-08-04', '2021-08-04 20:00:00', '2021-08-04 20:10:00', 8, 7, 0, 95, 96, 0, 60, 65, 0),
(12, 1, 3, '2021-08-04', '2021-08-04 20:00:00', '2021-08-04 20:10:00', 8, 7, 0, 95, 96, 0, 60, 65, 0),
(13, 1, 3, '2021-08-04', '2021-08-04 20:00:00', '2021-08-04 20:10:00', 8, 7, 0, 95, 96, 0, 60, 65, 0),
(14, 1, 3, '2021-08-04', '2021-08-04 20:00:00', '2021-08-04 20:10:00', 8, 7, 0, 95, 96, 0, 60, 65, 0),
(15, 1, 3, '2021-08-04', '2021-08-04 20:00:00', '2021-08-04 20:10:00', 8, 7, 0, 95, 96, 0, 60, 65, 0),
(16, 1, 3, '2021-08-04', '2021-08-04 20:00:00', '2021-08-04 20:10:00', 8, 7, 0, 95, 96, 0, 60, 65, 0),
(17, 1, 3, '2021-08-04', '2021-08-04 20:00:00', '2021-08-04 20:10:00', 8, 7, 0, 95, 96, 0, 60, 65, 0),
(18, 1, 3, '2021-08-04', '2021-08-04 20:00:00', '2021-08-04 20:10:00', 8, 7, 0, 95, 96, 0, 60, 65, 0),
(19, 1, 3, '2021-08-04', '2021-08-04 20:00:00', '2021-08-04 20:10:00', 8, 7, 0, 95, 96, 0, 60, 65, 0),
(20, 1, 3, '2021-08-04', '2021-08-04 20:00:00', '2021-08-04 20:10:00', 8, 7, 0, 95, 96, 0, 60, 65, 0),
(21, 1, 3, '2021-08-04', '2021-08-04 20:00:00', '2021-08-04 20:10:00', 8, 7, 0, 95, 96, 0, 60, 65, 0),
(22, 1, 3, '2021-08-04', '2021-08-04 20:00:00', '2021-08-04 20:10:00', 8, 7, 0, 95, 96, 0, 60, 65, 0),
(23, 1, 3, '2021-08-04', '2021-08-04 20:00:00', '2021-08-04 20:10:00', 8, 7, 0, 95, 96, 0, 60, 65, 0),
(24, 1, 3, '2021-08-04', '2021-08-04 20:00:00', '2021-08-04 20:10:00', 8, 7, 0, 95, 96, 0, 60, 65, 0),
(25, 1, 3, '2021-08-04', '2021-08-04 20:00:00', '2021-08-04 20:10:00', 8, 7, 0, 95, 96, 0, 60, 65, 0),
(26, 1, 3, '2021-08-04', '2021-08-04 20:00:00', '2021-08-04 20:10:00', 8, 7, 0, 95, 96, 0, 60, 65, 0),
(27, 1, 3, '2021-08-04', '2021-08-04 20:00:00', '2021-08-04 20:10:00', 8, 7, 0, 95, 96, 0, 60, 65, 0),
(28, 1, 3, '2021-08-04', '2021-08-04 20:00:00', '2021-08-04 20:10:00', 8, 7, 0, 95, 96, 0, 60, 65, 0),
(29, 1, 3, '2021-08-04', '2021-08-04 20:00:00', '2021-08-04 20:10:00', 8, 7, 0, 95, 96, 0, 60, 65, 0),
(30, 1, 3, '2021-08-07', '2021-08-04 20:00:00', '2021-08-04 20:10:00', 8, 7, 0, 95, 96, 0, 60, 65, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_rm` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `alamat_rumah` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tgl_covid_pos` date NOT NULL,
  `tgl_covid_neg` date NOT NULL,
  `tktcovid` varchar(10) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `kebiasaanmerokok` tinyint(1) NOT NULL,
  `riwayat_penyakit_kronis` varchar(100) NOT NULL,
  `riwayat_merokok` tinyint(1) NOT NULL,
  `tinggi_badan` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `kode`, `nama`, `no_rm`, `dob`, `gender`, `alamat_rumah`, `email`, `no_hp`, `tgl_covid_pos`, `tgl_covid_neg`, `tktcovid`, `pendidikan`, `kebiasaanmerokok`, `riwayat_penyakit_kronis`, `riwayat_merokok`, `tinggi_badan`, `username`, `password`, `is_active`) VALUES
(1, '0000', 'admin', '1111111111', '2021-07-16', 'laki-laki', '', 'admin@cofit-rehab.com', '0811111111', '2021-06-01', '2021-06-19', 'sedang', 'S2', 0, '', 0, 160, 'admin1', '0192023a7bbd73250516f069df18b500', 1),
(2, '0001', 'admin2', '1111111112', '2021-07-16', 'laki-laki', '', 'admin2@cofit-rehab.com', '0822222222', '2021-06-01', '2021-06-19', 'sedang', 'S2', 0, '', 0, 160, 'admin2', '0192023a7bbd73250516f069df18b500', 0),
(3, '0002', 'admin3', '1111111113', '2021-07-16', 'perempuan', '', 'admin3@cofit-rehab.com', '0833333333', '2021-06-01', '2021-06-19', 'sedang', 'S2', 0, '', 0, 160, 'admin3', '0192023a7bbd73250516f069df18b500', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evaluasi_bulanan`
--
ALTER TABLE `evaluasi_bulanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluasi_mingguan`
--
ALTER TABLE `evaluasi_mingguan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `latihan`
--
ALTER TABLE `latihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `latihan_pasien`
--
ALTER TABLE `latihan_pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`,`tgl_covid_pos`),
  ADD UNIQUE KEY `kode_pasien` (`kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evaluasi_bulanan`
--
ALTER TABLE `evaluasi_bulanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `evaluasi_mingguan`
--
ALTER TABLE `evaluasi_mingguan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `latihan`
--
ALTER TABLE `latihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `latihan_pasien`
--
ALTER TABLE `latihan_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
