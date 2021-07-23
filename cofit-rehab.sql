-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2021 at 12:31 PM
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
-- Table structure for table `latihan`
--

CREATE TABLE `latihan` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tipe` int(11) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `latihan`
--

INSERT INTO `latihan` (`id`, `nama`, `tipe`, `deskripsi`, `url`) VALUES
(1, 'latihan pernapasan 1', 1, 'latihan pernapasan part 1', 'https://www.youtube.com/embed/ECxYJcnvyMw'),
(2, 'latihan pernapasan 2', 1, 'latihan pernapasan part 2', 'https://youtu.be/lEtHmazlW3s'),
(3, 'latihan endurans 1', 2, 'latihan endurans part 1', 'https://youtu.be/5uVaKjtJHN8'),
(4, 'latihan endurans 2', 2, 'latihan endurans part 2', 'https://youtu.be/h7WjdroIOqA'),
(5, 'latihan penguatan 1', 3, 'latihan penguatan part 1', 'https://youtu.be/5ARgeR1rMTo'),
(6, 'latihan penguatan 2', 3, 'latihan penguatan part 2', 'https://youtu.be/pOrc3zADC7k');

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
  `pra_sato2` int(11) NOT NULL,
  `pasca_sato2` int(11) NOT NULL,
  `pra_hr` int(11) NOT NULL,
  `pasca_hr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `latihan_pasien`
--

INSERT INTO `latihan_pasien` (`id`, `id_pasien`, `id_latihan`, `tanggal`, `waktu_mulai`, `waktu_selesai`, `pra_bs`, `pasca_bs`, `pra_sato2`, `pasca_sato2`, `pra_hr`, `pasca_hr`) VALUES
(1, 1, 1, '2021-07-16', '2021-07-16 11:00:00', '2021-07-16 11:15:00', 6, 6, 98, 98, 88, 95),
(2, 1, 2, '2021-07-23', '2021-07-23 11:20:00', '2021-07-23 11:30:00', 6, 6, 98, 98, 88, 95),
(3, 2, 1, '2021-07-16', '2021-07-16 11:20:00', '2021-07-16 11:15:00', 6, 6, 98, 98, 88, 95),
(4, 2, 2, '2021-07-16', '2021-07-16 11:45:00', '2021-07-16 12:00:00', 6, 6, 98, 98, 88, 95),
(5, 1, 1, '2021-07-19', '2021-07-19 05:45:00', '2021-07-19 06:00:00', 6, 6, 93, 98, 88, 92);

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
  `tgl_covid_pos` date NOT NULL,
  `tgl_covid_neg` date NOT NULL,
  `tktcovid` varchar(10) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `kebiasaanmerokok` tinyint(1) NOT NULL,
  `riwayat_penyakit_kronis` varchar(100) NOT NULL,
  `riwayat_merokok` tinyint(1) NOT NULL,
  `tinggi_badan` int(11) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `kode`, `nama`, `no_rm`, `dob`, `gender`, `alamat_rumah`, `email`, `tgl_covid_pos`, `tgl_covid_neg`, `tktcovid`, `pendidikan`, `kebiasaanmerokok`, `riwayat_penyakit_kronis`, `riwayat_merokok`, `tinggi_badan`, `password`) VALUES
(1, '0000', 'admin', '1111111111', '2021-07-16', 'laki-laki', '', 'admin@cofit-rehab.com', '2021-06-01', '2021-06-19', 'sedang', 'S2', 0, '', 0, 160, '0192023a7bbd73250516f069df18b500'),
(2, '0001', 'admin2', '1111111112', '2021-07-16', 'laki-laki', '', 'admin2@cofit-rehab.com', '2021-06-01', '2021-06-19', 'sedang', 'S2', 0, '', 0, 160, '0192023a7bbd73250516f069df18b500'),
(3, '0002', 'admin3', '1111111113', '2021-07-16', 'perempuan', '', 'admin3@cofit-rehab.com', '2021-06-01', '2021-06-19', 'sedang', 'S2', 0, '', 0, 160, '0192023a7bbd73250516f069df18b500');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `latihan`
--
ALTER TABLE `latihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `latihan_pasien`
--
ALTER TABLE `latihan_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
