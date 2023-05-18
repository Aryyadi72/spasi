-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 18, 2023 at 10:01 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sasirangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `id_detail_transaksi` int NOT NULL,
  `harga_satuan` varchar(100) NOT NULL,
  `jumlah` int NOT NULL,
  `total_harga` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `id_transaksi_masuk` int NOT NULL,
  `id_transaksi_keluar` int NOT NULL,
  `id_produk` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `level`) VALUES
(1, 'Admin'),
(2, 'Kasir'),
(3, 'Pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_telp`, `foto`, `username`, `password`, `id_level`) VALUES
(1, 'Bodet Lagi', 'Tambang Ulang', '0878123455', 'unnamed.png', 'bodetasw', 'd9b1d7db4cd6e70935368a1efb10e377', 3),
(4, 'Rika', 'Angsau Kyoto', '0878123455', 'unnamed5.png', 'rika', '202cb962ac59075b964b07152d234b70', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengelola`
--

CREATE TABLE `tb_pengelola` (
  `id_pengelola` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pengelola`
--

INSERT INTO `tb_pengelola` (`id_pengelola`, `nama`, `alamat`, `no_telp`, `foto`, `email`, `username`, `password`, `id_level`) VALUES
(1, 'Bodet', 'Tambang Ulang', '0878123455', 'unnamed.png', 'bodet@mail.com', 'bodet', 'd9b1d7db4cd6e70935368a1efb10e377', 1),
(2, 'Bodet Lagi Uhuyy', 'Tambang Ulang', '0878123455', 'Project_Logo_HMPTI_-_Copy.png', 'bodetuhuyy@mail.com', 'bodet', 'd9b1d7db4cd6e70935368a1efb10e377', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int NOT NULL,
  `harga_produk` varchar(100) NOT NULL,
  `deskripsi_produk` varchar(255) NOT NULL,
  `stok` int NOT NULL,
  `id_sasirangan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `harga_produk`, `deskripsi_produk`, `stok`, `id_sasirangan`) VALUES
(1, '20000', 'Sasirangan Kece Badai Best Seller', 20, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sasirangan`
--

CREATE TABLE `tb_sasirangan` (
  `id_sasirangan` int NOT NULL,
  `nama_sasirangan` varchar(100) NOT NULL,
  `jenis_sasirangan` varchar(100) NOT NULL,
  `foto_sasirangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_sasirangan`
--

INSERT INTO `tb_sasirangan` (`id_sasirangan`, `nama_sasirangan`, `jenis_sasirangan`, `foto_sasirangan`) VALUES
(2, 'Sasirangan Berang Berang', 'Motif Berang Berang', '31.jpg'),
(3, 'Sasirangan Jantung Paus', 'Motif Jantung Paus', '5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_keluar`
--

CREATE TABLE `tb_transaksi_keluar` (
  `id_transaksi_keluar` int NOT NULL,
  `tanggal_transaksi_keluar` date NOT NULL,
  `id_transaksi_proses` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_masuk`
--

CREATE TABLE `tb_transaksi_masuk` (
  `id_transaksi_masuk` int NOT NULL,
  `tanggal_transakasi_masuk` date NOT NULL,
  `jumlah` int NOT NULL,
  `total_harga` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `id_pelanggan` int NOT NULL,
  `id_produk` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_proses`
--

CREATE TABLE `tb_transaksi_proses` (
  `id_transaksi_proses` int NOT NULL,
  `tanggal_transaksi_proses` date NOT NULL,
  `id_pengelola` int NOT NULL,
  `id_transaksi_masuk` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ulasan`
--

CREATE TABLE `tb_ulasan` (
  `id_ulasan` int NOT NULL,
  `rating` int NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `id_pelanggan` int NOT NULL,
  `id_produk` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `fk_id_transaksi_masuk` (`id_transaksi_masuk`),
  ADD KEY `fk_id_transaksi_keluar` (`id_transaksi_keluar`),
  ADD KEY `fk_id_produk_detail` (`id_produk`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `fk_id_level_pelanggan` (`id_level`);

--
-- Indexes for table `tb_pengelola`
--
ALTER TABLE `tb_pengelola`
  ADD PRIMARY KEY (`id_pengelola`),
  ADD KEY `fk_id_level_pengelola` (`id_level`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `fk_id_sasirangan` (`id_sasirangan`);

--
-- Indexes for table `tb_sasirangan`
--
ALTER TABLE `tb_sasirangan`
  ADD PRIMARY KEY (`id_sasirangan`);

--
-- Indexes for table `tb_transaksi_keluar`
--
ALTER TABLE `tb_transaksi_keluar`
  ADD PRIMARY KEY (`id_transaksi_keluar`),
  ADD KEY `fk_keluar_proses` (`id_transaksi_proses`);

--
-- Indexes for table `tb_transaksi_masuk`
--
ALTER TABLE `tb_transaksi_masuk`
  ADD PRIMARY KEY (`id_transaksi_masuk`),
  ADD KEY `fk_id_pelanggan_masuk` (`id_pelanggan`),
  ADD KEY `fk_id_produk_masuk` (`id_produk`);

--
-- Indexes for table `tb_transaksi_proses`
--
ALTER TABLE `tb_transaksi_proses`
  ADD PRIMARY KEY (`id_transaksi_proses`),
  ADD KEY `fk_proses_pengelola` (`id_pengelola`),
  ADD KEY `fk_proses_masuk` (`id_transaksi_masuk`);

--
-- Indexes for table `tb_ulasan`
--
ALTER TABLE `tb_ulasan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `fk_id_pelanggan_ulasan` (`id_pelanggan`),
  ADD KEY `fk_id_produk_ulasan` (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  MODIFY `id_detail_transaksi` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pengelola`
--
ALTER TABLE `tb_pengelola`
  MODIFY `id_pengelola` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_sasirangan`
--
ALTER TABLE `tb_sasirangan`
  MODIFY `id_sasirangan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_transaksi_keluar`
--
ALTER TABLE `tb_transaksi_keluar`
  MODIFY `id_transaksi_keluar` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_transaksi_masuk`
--
ALTER TABLE `tb_transaksi_masuk`
  MODIFY `id_transaksi_masuk` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_transaksi_proses`
--
ALTER TABLE `tb_transaksi_proses`
  MODIFY `id_transaksi_proses` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_ulasan`
--
ALTER TABLE `tb_ulasan`
  MODIFY `id_ulasan` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD CONSTRAINT `fk_id_produk_detail` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_transaksi_keluar` FOREIGN KEY (`id_transaksi_keluar`) REFERENCES `tb_transaksi_keluar` (`id_transaksi_keluar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_transaksi_masuk` FOREIGN KEY (`id_transaksi_masuk`) REFERENCES `tb_transaksi_masuk` (`id_transaksi_masuk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD CONSTRAINT `fk_id_level_pelanggan` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pengelola`
--
ALTER TABLE `tb_pengelola`
  ADD CONSTRAINT `fk_id_level_pengelola` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `fk_id_sasirangan` FOREIGN KEY (`id_sasirangan`) REFERENCES `tb_sasirangan` (`id_sasirangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_transaksi_keluar`
--
ALTER TABLE `tb_transaksi_keluar`
  ADD CONSTRAINT `fk_keluar_proses` FOREIGN KEY (`id_transaksi_proses`) REFERENCES `tb_transaksi_proses` (`id_transaksi_proses`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_transaksi_masuk`
--
ALTER TABLE `tb_transaksi_masuk`
  ADD CONSTRAINT `fk_id_pelanggan_masuk` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_produk_masuk` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_transaksi_proses`
--
ALTER TABLE `tb_transaksi_proses`
  ADD CONSTRAINT `fk_proses_masuk` FOREIGN KEY (`id_transaksi_masuk`) REFERENCES `tb_transaksi_masuk` (`id_transaksi_masuk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_proses_pengelola` FOREIGN KEY (`id_pengelola`) REFERENCES `tb_pengelola` (`id_pengelola`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_ulasan`
--
ALTER TABLE `tb_ulasan`
  ADD CONSTRAINT `fk_id_pelanggan_ulasan` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_produk_ulasan` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
