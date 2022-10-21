-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2022 at 12:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jwd-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_pemesanan`
--

CREATE TABLE `data_pemesanan` (
  `id` int(3) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `no_id` int(16) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tglkunjung` date NOT NULL,
  `tempat_wisata` varchar(256) NOT NULL,
  `pengunjung_dewasa` int(11) NOT NULL,
  `pengunjung_anak` int(11) NOT NULL,
  `hargatiket` varchar(10) NOT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pemesanan`
--

INSERT INTO `data_pemesanan` (`id`, `nama`, `no_id`, `no_hp`, `tglkunjung`, `tempat_wisata`, `pengunjung_dewasa`, `pengunjung_anak`, `hargatiket`, `total_bayar`) VALUES
(1, 'Guntur', 1211223, '081122306544', '2022-10-27', 'Puncak', 2, 2, '15000', 30000),
(2, 'Raya', 1124568, '01234567', '2022-10-02', 'Museum Roma', 2, 1, '125000', 562500),
(3, 'Ribut Wibowo Rahayu', 1122334455, '08127106544', '2022-10-05', 'Negeri Dongeng', 3, 2, '25000', 100000),
(4, 'Wibowo', 1234, '08127106544', '2022-10-06', 'Monas', 3, 1, '30000', 105000),
(5, 'Raya', 1124568, '01234567', '2022-10-02', 'Raja Ampat', 4, 2, '50000', 225000);

-- --------------------------------------------------------

--
-- Table structure for table `tempat_wisata`
--

CREATE TABLE `tempat_wisata` (
  `id` int(3) NOT NULL,
  `tempat_wisata` varchar(256) NOT NULL,
  `hargatiket` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tempat_wisata`
--

INSERT INTO `tempat_wisata` (`id`, `tempat_wisata`, `hargatiket`) VALUES
(2, 'Pulau Komodo', '50000'),
(3, 'Ancol', '11000'),
(4, 'Museum Roma', '125000'),
(5, 'Raja Ampat', '50000'),
(6, 'Puncak', '15000'),
(7, 'Negeri Dongeng', '150000'),
(8, 'Monas', '30000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_pemesanan`
--
ALTER TABLE `data_pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempat_wisata`
--
ALTER TABLE `tempat_wisata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_pemesanan`
--
ALTER TABLE `data_pemesanan`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tempat_wisata`
--
ALTER TABLE `tempat_wisata`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
