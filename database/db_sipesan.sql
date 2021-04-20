-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2019 at 03:41 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sipesan`
--

-- --------------------------------------------------------

--
-- Table structure for table `sipesan_brosur`
--

CREATE TABLE `sipesan_brosur` (
  `brosur_id` varchar(10) NOT NULL,
  `brosur_keranjang_id` varchar(10) NOT NULL,
  `brosur_ukuran` enum('A4','A5') NOT NULL,
  `brosur_bahan` enum('hvs','konstruk') NOT NULL,
  `brosur_jumlah` int(11) NOT NULL,
  `brosur_total` int(11) NOT NULL,
  `brosur_estimasi` int(11) NOT NULL,
  `brosur_foto` text NOT NULL,
  `brosur_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sipesan_brosur`
--

INSERT INTO `sipesan_brosur` (`brosur_id`, `brosur_keranjang_id`, `brosur_ukuran`, `brosur_bahan`, `brosur_jumlah`, `brosur_total`, `brosur_estimasi`, `brosur_foto`, `brosur_date_created`) VALUES
('BRC-29881', 'CRT-75430', 'A4', 'hvs', 1, 500000, 10, 'Screenshot_(2).png', '2019-08-11 20:24:41'),
('BRC-30100', 'CRT-75430', 'A5', 'konstruk', 1, 750000, 10, 'Screenshot_(92).png', '2019-08-11 20:28:20');

-- --------------------------------------------------------

--
-- Table structure for table `sipesan_faktur`
--

CREATE TABLE `sipesan_faktur` (
  `faktur_id` varchar(10) NOT NULL,
  `faktur_keranjang_id` varchar(10) NOT NULL,
  `faktur_bank` enum('bri','bni') NOT NULL,
  `faktur_status` enum('belum','sudah','tunggu') NOT NULL DEFAULT 'belum',
  `faktur_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sipesan_faktur`
--

INSERT INTO `sipesan_faktur` (`faktur_id`, `faktur_keranjang_id`, `faktur_bank`, `faktur_status`, `faktur_date_created`) VALUES
('INV-06780', 'CRT-06729', 'bri', 'belum', '2019-08-06 22:53:00'),
('INV-11376', 'CRT-69598', 'bri', 'sudah', '2019-08-02 09:02:56'),
('INV-30460', 'CRT-75430', 'bri', 'sudah', '2019-08-11 20:34:20'),
('INV-30764', 'CRT-30738', 'bri', 'belum', '2019-08-11 20:39:24'),
('INV-30879', 'CRT-30858', 'bri', 'belum', '2019-08-11 20:41:19'),
('INV-57920', 'CRT-10688', 'bni', 'belum', '2019-08-08 16:52:00'),
('INV-73209', 'CRT-73166', 'bri', 'sudah', '2019-08-08 21:06:49'),
('INV-81280', 'CRT-81166', 'bri', 'belum', '2019-08-12 10:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `sipesan_kartu`
--

CREATE TABLE `sipesan_kartu` (
  `kartu_id` varchar(10) NOT NULL,
  `kartu_keranjang_id` varchar(10) NOT NULL,
  `kartu_bahan` enum('biasa','bagus') NOT NULL,
  `kartu_jumlah` int(11) NOT NULL,
  `kartu_estimasi` int(11) NOT NULL,
  `kartu_total` int(11) NOT NULL,
  `kartu_foto` text NOT NULL,
  `kartu_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sipesan_kartu`
--

INSERT INTO `sipesan_kartu` (`kartu_id`, `kartu_keranjang_id`, `kartu_bahan`, `kartu_jumlah`, `kartu_estimasi`, `kartu_total`, `kartu_foto`, `kartu_date_created`) VALUES
('CRD-24383', 'CRT-75430', 'bagus', 2, 10, 90000, 'Screenshot_(5).png', '2019-08-11 18:53:03'),
('CRD-30738', 'CRT-30738', 'biasa', 1, 2, 35000, 'Screenshot_(6).png', '2019-08-11 20:38:58'),
('CRD-30751', 'CRT-30738', 'bagus', 1, 3, 45000, 'Screenshot_(11).png', '2019-08-11 20:39:11'),
('CRD-30858', 'CRT-30858', 'biasa', 2, 10, 70000, 'Screenshot_(7).png', '2019-08-11 20:40:58'),
('CRD-30868', 'CRT-30858', 'bagus', 1, 12, 45000, 'Screenshot_(7)1.png', '2019-08-11 20:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `sipesan_keranjang`
--

CREATE TABLE `sipesan_keranjang` (
  `keranjang_id` varchar(10) NOT NULL,
  `keranjang_pengguna_id` int(11) NOT NULL,
  `keranjang_total` int(11) NOT NULL,
  `keranjang_status` enum('belum','selesai','bayar_diterima','bayar_menunggu','bayar_verifikasi') NOT NULL DEFAULT 'belum',
  `keranjang_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sipesan_keranjang`
--

INSERT INTO `sipesan_keranjang` (`keranjang_id`, `keranjang_pengguna_id`, `keranjang_total`, `keranjang_status`, `keranjang_date_created`) VALUES
('CRT-06729', 2, 370000, 'bayar_menunggu', '2019-08-06 22:52:09'),
('CRT-10688', 2, 180000, 'bayar_menunggu', '2019-08-06 23:58:08'),
('CRT-30738', 2, 80000, 'bayar_menunggu', '2019-08-11 20:38:58'),
('CRT-30858', 2, 115000, 'bayar_menunggu', '2019-08-11 20:40:58'),
('CRT-69598', 2, 1230000, 'bayar_menunggu', '2019-07-27 02:33:18'),
('CRT-73166', 2, 4500000, 'bayar_menunggu', '2019-08-08 21:06:06'),
('CRT-75430', 2, 4100000, 'bayar_menunggu', '2019-08-08 21:43:50'),
('CRT-81166', 2, 38000, 'bayar_menunggu', '2019-08-12 10:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `sipesan_konfirmasi`
--

CREATE TABLE `sipesan_konfirmasi` (
  `konfirmasi_id` varchar(10) NOT NULL,
  `konfirmasi_faktur_id` varchar(10) NOT NULL,
  `konfirmasi_rekening` varchar(30) NOT NULL,
  `konfirmasi_atas_nama` varchar(50) NOT NULL,
  `konfirmasi_nominal` int(11) NOT NULL,
  `konfirmasi_struk` text NOT NULL,
  `konfirmasi_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sipesan_konfirmasi`
--

INSERT INTO `sipesan_konfirmasi` (`konfirmasi_id`, `konfirmasi_faktur_id`, `konfirmasi_rekening`, `konfirmasi_atas_nama`, `konfirmasi_nominal`, `konfirmasi_struk`, `konfirmasi_date_created`) VALUES
('CFM-32462', 'INV-30460', '123415151', 'Jihad Benastey', 4100000, 'Screenshot_(3).png', '2019-08-11 21:07:42'),
('CFM-73287', 'INV-73209', '21312312', 'Randi', 4500000, 'imk_jadwal_test.png', '2019-08-08 21:08:07'),
('CFM-95038', 'INV-11376', '11551102648', 'Jihad Benastey', 1230000, '430scuderia.jpg', '2019-08-05 15:50:38');

-- --------------------------------------------------------

--
-- Table structure for table `sipesan_pengguna`
--

CREATE TABLE `sipesan_pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_username` varchar(255) NOT NULL,
  `pengguna_password` varchar(255) NOT NULL,
  `pengguna_nama` varchar(255) DEFAULT NULL,
  `pengguna_nomor_hp` varchar(20) DEFAULT NULL,
  `pengguna_email` varchar(255) DEFAULT NULL,
  `pengguna_level` enum('administrator','pemesan') NOT NULL,
  `pengguna_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sipesan_pengguna`
--

INSERT INTO `sipesan_pengguna` (`pengguna_id`, `pengguna_username`, `pengguna_password`, `pengguna_nama`, `pengguna_nomor_hp`, `pengguna_email`, `pengguna_level`, `pengguna_date_created`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, NULL, 'administrator', '2019-07-18 16:35:32'),
(2, 'pemesan', 'd58910536eed6faa657ba7dbc012534c', 'Randi', '081234567890', 'pemesan@gmail.com', 'pemesan', '2019-07-24 11:05:24'),
(3, 'testing', '7f2ababa423061c509f4923dd04b6cf1', 'nama test', '1234567', 'testing@gmail.com', 'pemesan', '2019-08-11 23:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `sipesan_spanduk`
--

CREATE TABLE `sipesan_spanduk` (
  `spanduk_id` varchar(10) NOT NULL,
  `spanduk_keranjang_id` varchar(10) DEFAULT NULL,
  `spanduk_panjang` double NOT NULL,
  `spanduk_lebar` double NOT NULL,
  `spanduk_bahan` enum('biasa','menengah','bagus') NOT NULL,
  `spanduk_jumlah` int(11) NOT NULL,
  `spanduk_estimasi` int(11) NOT NULL,
  `spanduk_total` int(11) NOT NULL,
  `spanduk_foto` text NOT NULL,
  `spanduk_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sipesan_spanduk`
--

INSERT INTO `sipesan_spanduk` (`spanduk_id`, `spanduk_keranjang_id`, `spanduk_panjang`, `spanduk_lebar`, `spanduk_bahan`, `spanduk_jumlah`, `spanduk_estimasi`, `spanduk_total`, `spanduk_foto`, `spanduk_date_created`) VALUES
('SDK-06729', 'CRT-06729', 2, 2, 'biasa', 2, 10, 160000, 'imk_jadwal_test.png', '2019-08-06 22:52:09'),
('SDK-06767', 'CRT-06729', 3, 1, 'bagus', 2, 3, 210000, 'Screenshot_(6)1.png', '2019-08-06 22:52:47'),
('SDK-10688', 'CRT-10688', 3, 1, 'menengah', 2, 12, 180000, 'Screenshot_(6)2.png', '2019-08-06 23:58:08'),
('SDK-69598', 'CRT-69598', 2, 3, 'menengah', 1, 12, 180000, 'Screenshot_(6).png', '2019-07-27 02:33:18'),
('SDK-69692', 'CRT-69598', 5, 7, 'menengah', 1, 4, 1050000, 'Screenshot_(1)1.png', '2019-07-27 02:34:52'),
('SDK-73166', 'CRT-73166', 10, 5, 'menengah', 3, 10, 4500000, 'imk_jadwal_test1.png', '2019-08-08 21:06:06'),
('SDK-75430', 'CRT-75430', 10, 5, 'biasa', 2, 10, 2000000, 'Screenshot_(3).png', '2019-08-08 21:43:50'),
('SDK-81225', 'CRT-81166', 1, 0.4, 'biasa', 1, 10, 8000, 'Screenshot_(1)2.png', '2019-08-12 10:40:25');

-- --------------------------------------------------------

--
-- Table structure for table `sipesan_stiker`
--

CREATE TABLE `sipesan_stiker` (
  `stiker_id` varchar(10) NOT NULL,
  `stiker_keranjang_id` varchar(10) NOT NULL,
  `stiker_panjang` double NOT NULL,
  `stiker_lebar` double NOT NULL,
  `stiker_bahan` enum('biasa','bagus') NOT NULL,
  `stiker_jumlah` int(11) NOT NULL,
  `stiker_estimasi` int(11) NOT NULL,
  `stiker_total` int(11) NOT NULL,
  `stiker_foto` text NOT NULL,
  `stiker_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sipesan_stiker`
--

INSERT INTO `sipesan_stiker` (`stiker_id`, `stiker_keranjang_id`, `stiker_panjang`, `stiker_lebar`, `stiker_bahan`, `stiker_jumlah`, `stiker_estimasi`, `stiker_total`, `stiker_foto`, `stiker_date_created`) VALUES
('SKR-22758', 'CRT-75430', 2, 2, 'bagus', 2, 10, 760000, 'Screenshot_(3).png', '2019-08-11 18:25:58'),
('SKR-81166', 'CRT-81166', 1, 0.4, 'biasa', 1, 10, 30000, 'Screenshot_(2)1.png', '2019-08-12 10:39:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sipesan_brosur`
--
ALTER TABLE `sipesan_brosur`
  ADD PRIMARY KEY (`brosur_id`),
  ADD KEY `brosur_keranjang_id` (`brosur_keranjang_id`);

--
-- Indexes for table `sipesan_faktur`
--
ALTER TABLE `sipesan_faktur`
  ADD PRIMARY KEY (`faktur_id`),
  ADD KEY `faktur_keranjang_id` (`faktur_keranjang_id`);

--
-- Indexes for table `sipesan_kartu`
--
ALTER TABLE `sipesan_kartu`
  ADD PRIMARY KEY (`kartu_id`),
  ADD KEY `kartu_keranjang_id` (`kartu_keranjang_id`);

--
-- Indexes for table `sipesan_keranjang`
--
ALTER TABLE `sipesan_keranjang`
  ADD PRIMARY KEY (`keranjang_id`),
  ADD KEY `keranjang_pengguna_id` (`keranjang_pengguna_id`);

--
-- Indexes for table `sipesan_konfirmasi`
--
ALTER TABLE `sipesan_konfirmasi`
  ADD PRIMARY KEY (`konfirmasi_id`),
  ADD KEY `konfirmasi_faktur_id` (`konfirmasi_faktur_id`);

--
-- Indexes for table `sipesan_pengguna`
--
ALTER TABLE `sipesan_pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indexes for table `sipesan_spanduk`
--
ALTER TABLE `sipesan_spanduk`
  ADD PRIMARY KEY (`spanduk_id`),
  ADD KEY `spanduk_keranjang_id` (`spanduk_keranjang_id`);

--
-- Indexes for table `sipesan_stiker`
--
ALTER TABLE `sipesan_stiker`
  ADD PRIMARY KEY (`stiker_id`),
  ADD KEY `stiker_keranjang_id` (`stiker_keranjang_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sipesan_pengguna`
--
ALTER TABLE `sipesan_pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
