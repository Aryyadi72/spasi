-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2023 at 02:45 PM
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
-- Table structure for table `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id_keranjang` int NOT NULL,
  `jumlah` int NOT NULL,
  `total_harga` varchar(100) NOT NULL,
  `id_pelanggan` int NOT NULL,
  `id_produk` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_keranjang`
--

INSERT INTO `tb_keranjang` (`id_keranjang`, `jumlah`, `total_harga`, `id_pelanggan`, `id_produk`) VALUES
(13, 2, '40000', 1, 10),
(14, 3, '76500', 5, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `nama_pelanggan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `no_telp`, `foto`, `username`, `password`, `id_level`) VALUES
(1, 'Bodet', 'Tambang Ulang', '0878123455', 'unnamed.png', 'pelanggan', '202cb962ac59075b964b07152d234b70', 3),
(4, 'Rika', 'Angsau Kyoto', '0878123455', 'unnamed5.png', 'rika', '2f6b87bf490402877f19ee52998f2fa6', 3),
(5, 'Ayu', 'Pelaihari', '0878123456', 'kantor-1.png', 'ayu', '202cb962ac59075b964b07152d234b70', 3);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_pengelola`
--

INSERT INTO `tb_pengelola` (`id_pengelola`, `nama`, `alamat`, `no_telp`, `foto`, `email`, `username`, `password`, `id_level`) VALUES
(1, 'Admin', 'Tambang Ulang', '0878123455', 'unnamed.png', 'bodet@mail.com', 'admin', '202cb962ac59075b964b07152d234b70', 1),
(2, 'Kasir', 'Tambang Ulang', '0878123455', 'Project_Logo_HMPTI_-_Copy.png', 'bodetuhuyy@mail.com', 'kasir', '202cb962ac59075b964b07152d234b70', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int NOT NULL,
  `harga_produk` varchar(100) NOT NULL,
  `deskripsi_produk` varchar(255) NOT NULL,
  `stok` int NOT NULL,
  `tanggal_ditambahkan` date NOT NULL,
  `id_sasirangan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `harga_produk`, `deskripsi_produk`, `stok`, `tanggal_ditambahkan`, `id_sasirangan`) VALUES
(10, '20000', 'Sasirangan Bagus Ajib', 18, '2023-05-25', 3),
(11, '25500', 'Model sasirangan baru', 30, '2023-06-13', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sasirangan`
--

CREATE TABLE `tb_sasirangan` (
  `id_sasirangan` int NOT NULL,
  `nama_sasirangan` varchar(100) NOT NULL,
  `jenis_sasirangan` varchar(100) NOT NULL,
  `foto_sasirangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_sasirangan`
--

INSERT INTO `tb_sasirangan` (`id_sasirangan`, `nama_sasirangan`, `jenis_sasirangan`, `foto_sasirangan`) VALUES
(2, 'Sasirangan Berang Berang', 'Motif Berang Berang', '31.jpg'),
(3, 'Sasirangan Jantung Paus', 'Motif Jantung Paus', '5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_struk`
--

CREATE TABLE `tb_struk` (
  `id_struk` int NOT NULL,
  `file_struk` varchar(255) NOT NULL,
  `id_transaksi_masuk` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_titik_pengiriman`
--

CREATE TABLE `tb_titik_pengiriman` (
  `id_titik_pengiriman` int NOT NULL,
  `alamat_tujuan` varchar(100) NOT NULL,
  `latlong` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_transaksi_masuk` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_batal`
--

CREATE TABLE `tb_transaksi_batal` (
  `id_transaksi_batal` int NOT NULL,
  `tanggal_transaksi_batal` date NOT NULL,
  `id_pengelola` int NOT NULL,
  `id_transaksi_masuk` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_keluar`
--

CREATE TABLE `tb_transaksi_keluar` (
  `id_transaksi_keluar` int NOT NULL,
  `tanggal_transaksi_proses` date NOT NULL,
  `id_pengelola` int NOT NULL,
  `tanggal_transaksi_keluar` date NOT NULL,
  `id_transaksi_masuk` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_transaksi_keluar`
--

INSERT INTO `tb_transaksi_keluar` (`id_transaksi_keluar`, `tanggal_transaksi_proses`, `id_pengelola`, `tanggal_transaksi_keluar`, `id_transaksi_masuk`) VALUES
(1, '2023-06-19', 2, '2023-06-19', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_masuk`
--

CREATE TABLE `tb_transaksi_masuk` (
  `id_transaksi_masuk` int NOT NULL,
  `tanggal_transakasi_masuk` date NOT NULL,
  `jumlah` int NOT NULL,
  `metode_pembayaran` varchar(100) NOT NULL,
  `metode_pengiriman` varchar(100) NOT NULL,
  `total_harga` varchar(100) NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `id_pelanggan` int NOT NULL,
  `id_produk` int NOT NULL,
  `id_invoice` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_transaksi_masuk`
--

INSERT INTO `tb_transaksi_masuk` (`id_transaksi_masuk`, `tanggal_transakasi_masuk`, `jumlah`, `metode_pembayaran`, `metode_pengiriman`, `total_harga`, `keterangan`, `status`, `id_pelanggan`, `id_produk`, `id_invoice`) VALUES
(12, '2023-06-19', 2, 'Cash', 'Ambil di Tempat', '40000', 'Pesanan sedang Diproses', 'Selesai', 5, 10, NULL),
(13, '2023-06-20', 2, 'Cash', 'Ambil di Tempat', '40000', 'Harga belum termasuk ongkir, ongkir akan di update setelah pesanan diterima oleh Kasir.', 'Dikirim', 1, 10, NULL),
(14, '2023-06-20', 2, 'Cash', 'Ambil di Tempat', '40000', 'Harga belum termasuk ongkir, ongkir akan di update setelah pesanan diterima oleh Kasir.', 'Dikirim', 1, 10, NULL),
(15, '2023-06-20', 3, 'Cash', 'Ambil di Tempat', '76500', 'Harga belum termasuk ongkir, ongkir akan di update setelah pesanan diterima oleh Kasir.', 'Dikirim', 1, 11, NULL),
(16, '2023-06-20', 4, 'Cash', 'Ambil di Tempat', '102000', 'Harga belum termasuk ongkir, ongkir akan di update setelah pesanan diterima oleh Kasir.', 'Dikirim', 1, 11, NULL),
(17, '2023-06-20', 2, 'Cash', 'Ambil di Tempat', '40000', 'Harga belum termasuk ongkir, ongkir akan di update setelah pesanan diterima oleh Kasir.', 'Dikirim', 1, 10, NULL),
(18, '2023-06-20', 2, 'Cash', 'Ambil di Tempat', '40000', 'Harga belum termasuk ongkir, ongkir akan di update setelah pesanan diterima oleh Kasir.', 'Dikirim', 5, 10, NULL),
(19, '2023-06-20', 3, 'Cash', 'Ambil di Tempat', '76500', 'Harga belum termasuk ongkir, ongkir akan di update setelah pesanan diterima oleh Kasir.', 'Dikirim', 5, 11, NULL),
(20, '2023-06-20', 3, 'Transfer', 'Kirim ke Alamat Tujuan', '60000', 'Harga belum termasuk ongkir, ongkir akan di update setelah pesanan diterima oleh Kasir.', 'Dikirim', 1, 10, NULL),
(21, '2023-06-20', 2, 'Transfer', 'Kirim ke Alamat Tujuan', '51000', 'Harga belum termasuk ongkir, ongkir akan di update setelah pesanan diterima oleh Kasir.', 'Dikirim', 1, 11, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_proses`
--

CREATE TABLE `tb_transaksi_proses` (
  `id_transaksi_proses` int NOT NULL,
  `tanggal_transaksi_proses` date NOT NULL,
  `id_pengelola` int NOT NULL,
  `id_transaksi_masuk` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_ulasan`
--

INSERT INTO `tb_ulasan` (`id_ulasan`, `rating`, `deskripsi`, `id_pelanggan`, `id_produk`) VALUES
(1, 3, 'Bagus', 5, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `fk_keranjang_pelanggan` (`id_pelanggan`),
  ADD KEY `fk_keranjang_produk` (`id_produk`);

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
-- Indexes for table `tb_struk`
--
ALTER TABLE `tb_struk`
  ADD PRIMARY KEY (`id_struk`),
  ADD KEY `fk_struk_masuk` (`id_transaksi_masuk`);

--
-- Indexes for table `tb_titik_pengiriman`
--
ALTER TABLE `tb_titik_pengiriman`
  ADD PRIMARY KEY (`id_titik_pengiriman`),
  ADD KEY `fk_lokasi_masuk` (`id_transaksi_masuk`);

--
-- Indexes for table `tb_transaksi_batal`
--
ALTER TABLE `tb_transaksi_batal`
  ADD PRIMARY KEY (`id_transaksi_batal`),
  ADD KEY `fk_batal_pengelola` (`id_pengelola`),
  ADD KEY `fk_batal_masuk` (`id_transaksi_masuk`);

--
-- Indexes for table `tb_transaksi_keluar`
--
ALTER TABLE `tb_transaksi_keluar`
  ADD PRIMARY KEY (`id_transaksi_keluar`),
  ADD KEY `fk_masuk_keluar` (`id_transaksi_masuk`);

--
-- Indexes for table `tb_transaksi_masuk`
--
ALTER TABLE `tb_transaksi_masuk`
  ADD PRIMARY KEY (`id_transaksi_masuk`),
  ADD KEY `fk_masuk_produk` (`id_produk`),
  ADD KEY `fk_masuk_pelanggan` (`id_pelanggan`);

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
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id_keranjang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pengelola`
--
ALTER TABLE `tb_pengelola`
  MODIFY `id_pengelola` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_sasirangan`
--
ALTER TABLE `tb_sasirangan`
  MODIFY `id_sasirangan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_struk`
--
ALTER TABLE `tb_struk`
  MODIFY `id_struk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_titik_pengiriman`
--
ALTER TABLE `tb_titik_pengiriman`
  MODIFY `id_titik_pengiriman` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_transaksi_batal`
--
ALTER TABLE `tb_transaksi_batal`
  MODIFY `id_transaksi_batal` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_transaksi_keluar`
--
ALTER TABLE `tb_transaksi_keluar`
  MODIFY `id_transaksi_keluar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_transaksi_masuk`
--
ALTER TABLE `tb_transaksi_masuk`
  MODIFY `id_transaksi_masuk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_transaksi_proses`
--
ALTER TABLE `tb_transaksi_proses`
  MODIFY `id_transaksi_proses` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_ulasan`
--
ALTER TABLE `tb_ulasan`
  MODIFY `id_ulasan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD CONSTRAINT `fk_keranjang_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_keranjang_produk` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `tb_struk`
--
ALTER TABLE `tb_struk`
  ADD CONSTRAINT `fk_struk_masuk` FOREIGN KEY (`id_transaksi_masuk`) REFERENCES `tb_transaksi_masuk` (`id_transaksi_masuk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_titik_pengiriman`
--
ALTER TABLE `tb_titik_pengiriman`
  ADD CONSTRAINT `fk_lokasi_masuk` FOREIGN KEY (`id_transaksi_masuk`) REFERENCES `tb_transaksi_masuk` (`id_transaksi_masuk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_transaksi_batal`
--
ALTER TABLE `tb_transaksi_batal`
  ADD CONSTRAINT `fk_batal_pengelola` FOREIGN KEY (`id_pengelola`) REFERENCES `tb_pengelola` (`id_pengelola`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_transaksi_keluar`
--
ALTER TABLE `tb_transaksi_keluar`
  ADD CONSTRAINT `fk_masuk_keluar` FOREIGN KEY (`id_transaksi_masuk`) REFERENCES `tb_transaksi_masuk` (`id_transaksi_masuk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_transaksi_masuk`
--
ALTER TABLE `tb_transaksi_masuk`
  ADD CONSTRAINT `fk_masuk_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_masuk_produk` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

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
