-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2019 at 05:22 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE IF NOT EXISTS `makanan` (
  `id_makanan` int(11) NOT NULL,
  `nama_makanan` varchar(40) NOT NULL,
  `harga` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`id_makanan`, `nama_makanan`, `harga`) VALUES
(1, 'Ayam Bakar', '12000'),
(2, 'Nasi Goreng', '10000'),
(3, 'Mie Ayam', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `minuman`
--

CREATE TABLE IF NOT EXISTS `minuman` (
  `id_minuman` int(11) NOT NULL,
  `nama_minuman` varchar(40) NOT NULL,
  `harga` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `minuman`
--

INSERT INTO `minuman` (`id_minuman`, `nama_minuman`, `harga`) VALUES
(1, 'Es Teh', '2000'),
(2, 'Es Jeruk', '3000'),
(3, 'Es Susu', '4000');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE IF NOT EXISTS `pesanan` (
  `id_pesanan` varchar(15) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pelanggan` varchar(40) NOT NULL,
  `nomor_meja` enum('1','2','3','4','5','6','7','8','9') NOT NULL,
  `status` enum('aktif','tidak_aktif','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `nama_pelanggan`, `nomor_meja`, `status`) VALUES
('ERP20102019-001', 2, 'Erwin', '1', 'aktif'),
('ERP20102019-002', 1, 'aaaq', '4', 'tidak_aktif'),
('ERP20102019-003', 2, 'asd', '2', 'tidak_aktif'),
('ERP22102019-004', 2, 'rico', '4', 'aktif'),
('ERP22102019-005', 2, 'maradona', '2', 'tidak_aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pesan_makanan`
--

CREATE TABLE IF NOT EXISTS `pesan_makanan` (
  `id_pesan_makanan` int(11) NOT NULL,
  `id_pesanan` varchar(15) NOT NULL,
  `id_makanan` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan_makanan`
--

INSERT INTO `pesan_makanan` (`id_pesan_makanan`, `id_pesanan`, `id_makanan`, `qty`) VALUES
(1, 'ERP20102019-002', 1, 1),
(2, 'ERP20102019-003', 2, 1),
(6, 'ERP22102019-005', 3, 1),
(7, 'ERP22102019-005', 2, 3),
(8, 'ERP20102019-001', 1, 1),
(9, 'ERP20102019-001', 2, 2),
(10, 'ERP20102019-001', 3, 10),
(11, 'ERP20102019-001', 2, 2),
(12, 'ERP22102019-004', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pesan_minuman`
--

CREATE TABLE IF NOT EXISTS `pesan_minuman` (
  `id_pesan_minuman` int(11) NOT NULL,
  `id_pesanan` varchar(15) NOT NULL,
  `id_minuman` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan_minuman`
--

INSERT INTO `pesan_minuman` (`id_pesan_minuman`, `id_pesanan`, `id_minuman`, `qty`) VALUES
(3, 'ERP20102019-002', 1, 1),
(4, 'ERP20102019-003', 2, 2),
(5, 'ERP22102019-005', 2, 3),
(6, 'ERP22102019-004', 2, 2),
(7, 'ERP20102019-001', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(70) NOT NULL,
  `hak_akses` enum('pelayan','kasir','','') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `hak_akses`) VALUES
(1, 'mq9ZLVn9o4q5VV5s/mawKGETN63zEPdnS2UJhYXoosU=', 'mq9ZLVn9o4q5VV5s/mawKGETN63zEPdnS2UJhYXoosU=', 'kasir'),
(2, 'tb5ZkDjGm+8uu8783M0I8vKr2wd/jpZUPjitAtxsw3M=', 'tb5ZkDjGm+8uu8783M0I8vKr2wd/jpZUPjitAtxsw3M=', 'pelayan'),
(3, 'KRp4wbcD4KdlQ67Ye3pJ+1NMZt4stDx4bsl9sDXEwKk=', 'KRp4wbcD4KdlQ67Ye3pJ+1NMZt4stDx4bsl9sDXEwKk=', 'pelayan'),
(4, 'M/hKXBMF4VZ4ncUjIy9+PJF9aAR0ZOffmT41dVknp3M=', 'M/hKXBMF4VZ4ncUjIy9+PJF9aAR0ZOffmT41dVknp3M=', 'pelayan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id_makanan`);

--
-- Indexes for table `minuman`
--
ALTER TABLE `minuman`
  ADD PRIMARY KEY (`id_minuman`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pesan_makanan`
--
ALTER TABLE `pesan_makanan`
  ADD PRIMARY KEY (`id_pesan_makanan`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_makanan` (`id_makanan`),
  ADD KEY `id_pesanan_2` (`id_pesanan`);

--
-- Indexes for table `pesan_minuman`
--
ALTER TABLE `pesan_minuman`
  ADD PRIMARY KEY (`id_pesan_minuman`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_minuman` (`id_minuman`),
  ADD KEY `id_pesanan_2` (`id_pesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `makanan`
--
ALTER TABLE `makanan`
  MODIFY `id_makanan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `minuman`
--
ALTER TABLE `minuman`
  MODIFY `id_minuman` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pesan_makanan`
--
ALTER TABLE `pesan_makanan`
  MODIFY `id_pesan_makanan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pesan_minuman`
--
ALTER TABLE `pesan_minuman`
  MODIFY `id_pesan_minuman` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesan_makanan`
--
ALTER TABLE `pesan_makanan`
  ADD CONSTRAINT `pesan_makanan_ibfk_1` FOREIGN KEY (`id_makanan`) REFERENCES `makanan` (`id_makanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesan_makanan_ibfk_2` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesan_minuman`
--
ALTER TABLE `pesan_minuman`
  ADD CONSTRAINT `pesan_minuman_ibfk_1` FOREIGN KEY (`id_minuman`) REFERENCES `minuman` (`id_minuman`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesan_minuman_ibfk_2` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
