-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2024 at 12:47 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_umkm_pariwisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`username`, `password`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` bigint(20) NOT NULL,
  `nama_pemesan` varchar(125) NOT NULL,
  `nomor_hp` varchar(12) NOT NULL,
  `tanggal_mulai_wisata` date NOT NULL,
  `tanggal_pesanan` datetime NOT NULL,
  `durasi_wisata` int(11) NOT NULL,
  `id_paket_wisata` int(11) NOT NULL,
  `layanan_penginapan` tinyint(4) NOT NULL,
  `layanan_transportasi` tinyint(4) NOT NULL,
  `layanan_makanan` tinyint(4) NOT NULL,
  `jumlah_peserta` int(11) NOT NULL,
  `harga_paket` decimal(10,2) NOT NULL,
  `jumlah_tagihan` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `nama_pemesan`, `nomor_hp`, `tanggal_mulai_wisata`, `tanggal_pesanan`, `durasi_wisata`, `id_paket_wisata`, `layanan_penginapan`, `layanan_transportasi`, `layanan_makanan`, `jumlah_peserta`, `harga_paket`, `jumlah_tagihan`) VALUES
(10, 'nhjkdbkjas', '12331', '2024-08-16', '0000-00-00 00:00:00', 2, 0, 1, 1, 0, 1, 4400000.00, 4400000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
