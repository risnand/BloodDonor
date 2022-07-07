-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2022 at 06:21 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donordarah`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `id_antrian` int(11) NOT NULL,
  `id_pendonor` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `id_stok` int(11) NOT NULL,
  `tanggal_antri` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`id_antrian`, `id_pendonor`, `id_lokasi`, `id_petugas`, `id_stok`, `tanggal_antri`, `status`) VALUES
(2, 2, 2, 8, 5, '2022-06-30', 'proses'),
(3, 3, 5, 6, 1, '2022-06-30', 'proses'),
(13, 127, 1, 1, 1, '2022-06-29', 'proses'),
(14, 1, 1, 1, 1, '2022-06-30', 'waiting'),
(27, 1, 1, 1, 1, '2022-07-04', 'Waiting'),
(28, 1, 1, 1, 1, '2022-07-04', 'Waiting'),
(35, 128, 1, 1, 1, '2022-07-04', 'Waiting');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(255) NOT NULL,
  `gaji` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `gaji`, `alamat`) VALUES
(1, 'Bambang', 2000000, 'Batu'),
(2, 'Sutrisno', 2500000, 'Surabaya'),
(3, 'Wahyudi', 2250000, 'Jakarta'),
(4, 'Sulis', 3000000, 'Surakarta'),
(5, 'Sandi', 4000000, 'Madiun'),
(6, 'Kasim', 2000000, 'Kediri'),
(7, 'Ananta', 2500000, 'Banjar'),
(8, 'Prabu', 2750000, 'Pekan Baru'),
(9, 'Dian', 3250000, 'Tangerang'),
(10, 'Triyo', 4000000, 'Palembang');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_rs` varchar(255) NOT NULL,
  `tanggal_diadakan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nama_rs`, `tanggal_diadakan`) VALUES
(1, 'Malang RS Karsa', '2022-07-01'),
(2, 'Batu RS Baptis', '2022-07-01'),
(3, 'Surabaya RS Bhayangkara', '2022-07-01'),
(4, 'Malang RS Brimedika', '2022-07-01'),
(5, 'Surabaya RS Royal', '2022-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `pendonor`
--

CREATE TABLE `pendonor` (
  `id_pendonor` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `nomor_telepon` varchar(11) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendonor`
--

INSERT INTO `pendonor` (`id_pendonor`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `nomor_telepon`, `pass`) VALUES
(1, 'Bagas', 'Jl. Abdul Rahman', 'Malang', '2001-01-01', 'Laki-Laki', '08567339421', 'Bagas123'),
(2, 'Sandi', 'Jl. Agus Salim', 'Surabaya', '2001-01-01', 'Laki-Laki', '08564012310', 'Sandi123'),
(3, 'Siti', 'Jl. Fatimah', 'Batu', '2001-01-01', 'Perempuan', '08567339772', 'Siti123'),
(4, 'Eko', 'Jl. Budiawan', 'Malang', '2001-01-01', 'Laki-Laki', '0856331421', 'Eko123'),
(5, 'Mirana', 'Jl. Sulis', 'Surabaya', '2001-01-01', 'Perempuan', '08565213526', 'Mirana123'),
(127, 'asd', 'assad', 'asdas', '2022-06-29', 'laki', '12414', '123'),
(128, 'nando', 'jl.wukir', 'batu', '2022-07-04', 'laki', '85649533268', 'nando123');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `gaji` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `gaji`, `alamat`) VALUES
(1, 'Bagus', 1000000, 'Malang'),
(2, 'Sri', 750000, 'Sumbawa'),
(3, 'Rini', 750000, 'Malang'),
(4, 'Dono', 1250000, 'Medan'),
(5, 'Setya', 1000000, 'Padang'),
(6, 'Dana', 800000, 'Batam'),
(7, 'Salsa', 750000, 'Jambi'),
(8, 'Surya', 900000, 'Bengkulu'),
(9, 'Tyas', 500000, 'Malang'),
(10, 'Nanang', 750000, 'Batu');

-- --------------------------------------------------------

--
-- Table structure for table `proses`
--

CREATE TABLE `proses` (
  `id_proses` int(11) NOT NULL,
  `id_antrian` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `tanggal_donor` date NOT NULL,
  `status_donor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proses`
--

INSERT INTO `proses` (`id_proses`, `id_antrian`, `id_dokter`, `tanggal_donor`, `status_donor`) VALUES
(12, 3, 4, '2022-07-06', 'done'),
(13, 2, 1, '2022-07-06', ''),
(14, 13, 1, '2022-07-07', '');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id_stok` int(11) NOT NULL,
  `gol_darah` varchar(5) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id_stok`, `gol_darah`, `jumlah`) VALUES
(1, 'A+', 2),
(2, 'B+', 0),
(3, 'O+', 0),
(4, 'AB+', 0),
(5, 'AB-', 0),
(6, 'O-', 0),
(7, 'B-', 0),
(8, 'A-', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id_antrian`),
  ADD KEY `id_pendonor` (`id_pendonor`),
  ADD KEY `id_lokasi` (`id_lokasi`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_stok` (`id_stok`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `pendonor`
--
ALTER TABLE `pendonor`
  ADD PRIMARY KEY (`id_pendonor`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `proses`
--
ALTER TABLE `proses`
  ADD PRIMARY KEY (`id_proses`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_antrian` (`id_antrian`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pendonor`
--
ALTER TABLE `pendonor`
  MODIFY `id_pendonor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `proses`
--
ALTER TABLE `proses`
  MODIFY `id_proses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `antrian`
--
ALTER TABLE `antrian`
  ADD CONSTRAINT `id_lokasi` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`),
  ADD CONSTRAINT `id_pendonor` FOREIGN KEY (`id_pendonor`) REFERENCES `pendonor` (`id_pendonor`),
  ADD CONSTRAINT `id_petugas` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`),
  ADD CONSTRAINT `id_stok` FOREIGN KEY (`id_stok`) REFERENCES `stok` (`id_stok`);

--
-- Constraints for table `proses`
--
ALTER TABLE `proses`
  ADD CONSTRAINT `id_antrian` FOREIGN KEY (`id_antrian`) REFERENCES `antrian` (`id_antrian`),
  ADD CONSTRAINT `id_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
