-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 02:08 AM
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
-- Database: `shopgiaythethao`
--
DROP DATABASE IF EXISTS `shopgiaythethao`;
CREATE DATABASE IF NOT EXISTS `shopgiaythethao` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `shopgiaythethao`;
-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `id_nguoidung` int(11) NOT NULL,
  `id_giay` int(11) NOT NULL,
  `ngayphanhoi` date NOT NULL,
  `noidung` text NOT NULL,
  `danhgia` enum('1','2','3','4','5') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `tendanhmuc` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendanhmuc`) VALUES
(1, 'Nam'),
(2, 'Nữ');

-- --------------------------------------------------------

--
-- Table structure for table `giay`
--

CREATE TABLE `giay` (
  `id` int(11) NOT NULL,
  `tengiay` varchar(100) NOT NULL,
  `id_thuonghieu` int(11) NOT NULL,
  `mota` text NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  `gianhap` decimal(10,2) NOT NULL,
  `giagoc` decimal(10,2) NOT NULL,
  `giaban` decimal(10,2) NOT NULL,
  `hinhanh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giay`
--

INSERT INTO `giay` (`id`, `tengiay`, `id_thuonghieu`, `mota`, `id_danhmuc`, `gianhap`, `giagoc`, `giaban`, `hinhanh`) VALUES
(11, 'Giày 1', 3, 'Không', 2, 45000.00, 50000.00, 55000.00, 'images/Product/'),
(12, 'Giày 2', 1, 'Không', 1, 50000.00, 50000.00, 70000.00, 'images/Product/');

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `id` int(11) NOT NULL,
  `id_nguoidung` int(11) NOT NULL,
  `id_giay` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(11) NOT NULL,
  `id_nguoidung` int(11) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `ngaylap` date NOT NULL,
  `tongtien` decimal(10,2) NOT NULL DEFAULT 0.00,
  `ghichu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`id`, `id_nguoidung`, `diachi`, `ngaylap`, `tongtien`, `ghichu`) VALUES
(3, 1, 'Không có', '2023-12-17', 0.00, 'Không có'),
(4, 4, 'Không có', '2023-12-17', 0.00, 'Không có'),
(5, 5, 'Không có', '2023-12-17', 0.00, 'Không có');

-- --------------------------------------------------------

--
-- Table structure for table `hoadonchitiet`
--

CREATE TABLE `hoadonchitiet` (
  `id` int(11) NOT NULL,
  `id_hoadon` int(11) NOT NULL,
  `id_giay` int(11) NOT NULL,
  `dongia` decimal(10,2) NOT NULL,
  `soluong` int(11) NOT NULL,
  `size` tinyint(2) NOT NULL,
  `thanhtien` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `tennguoidung` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `loai` tinyint(1) NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT 1,
  `hinhanh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `tennguoidung`, `email`, `matkhau`, `sdt`, `loai`, `trangthai`, `hinhanh`) VALUES
(1, 'Dương Thiên Phúc', 'dtphuc_21th@student.agu.edu.vn', '123', '0123456789', 1, 1, ''),
(2, 'Phan Quang Thái', 'pqthai_21th@student.agu.edu.vn', '123', '0147852369', 2, 1, ''),
(3, 'Nguyễn Thị Thúy Vi', 'nttvi_21th@student.agu.edu,vn', '123', '0159875236', 3, 1, ''),
(4, 'Mr Nothing', 'abc@abc.com', '123', '01245686868', 1, 1, 'images/Users/10-11-2023-12-22-42-AM.png'),
(5, 'Mr Nothing 2', 'nsb@gmail.com', '123', '1478523699', 3, 1, 'images/Users/10-11-2023-12-22-42-AM.png');

-- --------------------------------------------------------

--
-- Table structure for table `size_soluong`
--

CREATE TABLE `size_soluong` (
  `id` int(11) NOT NULL,
  `id_giay` int(11) NOT NULL,
  `size` tinyint(2) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `id` int(11) NOT NULL,
  `tenthuonghieu` varchar(100) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `hinhanh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thuonghieu`
--

INSERT INTO `thuonghieu` (`id`, `tenthuonghieu`, `diachi`, `email`, `sdt`, `hinhanh`) VALUES
(1, 'Adidas', 'Đức', 'adidas@mail.com', '0156324484', 'images/Brand/Adidas-removebg-preview.png'),
(2, 'Nike', 'Hoa Kỳ', 'nike@gmail.com', '0123456789', 'images/Brand/Nike.png'),
(3, 'Gucci', 'Italia', 'gucci@gmail.com', '0902548763', 'images/Brand/Gucci-removebg-preview.png'),
(4, 'Converse', 'Hoa Kỳ', 'converse@gmail.com', '0325874698', 'images/Brand/Conv-removebg-preview.png'),
(5, 'MLB', 'Hàn Quốc', 'MLB@gmail.com', '0231569845', 'images/Brand/MLB-removebg-preview.png'),
(6, 'New Balance', 'Boston, Massachusetts, Hoa Kỳ', 'newbalance@gmail.com', '0254631254', 'images/Brand/NBL.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phanhoi_nguoidung` (`id_nguoidung`),
  ADD KEY `phanhoi_giay` (`id_giay`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giay`
--
ALTER TABLE `giay`
  ADD PRIMARY KEY (`id`),
  ADD KEY `giay_thuonghieu` (`id_thuonghieu`),
  ADD KEY `giay_danhmuc` (`id_danhmuc`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `giohang_giay` (`id_giay`),
  ADD KEY `giohang_nguoidung` (`id_nguoidung`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hoadon_nguoidung` (`id_nguoidung`);

--
-- Indexes for table `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hoadonct_giay` (`id_giay`),
  ADD KEY `hoadonct_hoadon` (`id_hoadon`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size_soluong`
--
ALTER TABLE `size_soluong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sizesoluong_giay` (`id_giay`);

--
-- Indexes for table `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `giay`
--
ALTER TABLE `giay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `size_soluong`
--
ALTER TABLE `size_soluong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `phanhoi_giay` FOREIGN KEY (`id_giay`) REFERENCES `giay` (`id`),
  ADD CONSTRAINT `phanhoi_nguoidung` FOREIGN KEY (`id_nguoidung`) REFERENCES `nguoidung` (`id`);

--
-- Constraints for table `giay`
--
ALTER TABLE `giay`
  ADD CONSTRAINT `giay_danhmuc` FOREIGN KEY (`id_danhmuc`) REFERENCES `danhmuc` (`id`),
  ADD CONSTRAINT `giay_thuonghieu` FOREIGN KEY (`id_thuonghieu`) REFERENCES `thuonghieu` (`id`);

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_giay` FOREIGN KEY (`id_giay`) REFERENCES `giay` (`id`),
  ADD CONSTRAINT `giohang_nguoidung` FOREIGN KEY (`id_nguoidung`) REFERENCES `nguoidung` (`id`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_nguoidung` FOREIGN KEY (`id_nguoidung`) REFERENCES `nguoidung` (`id`);

--
-- Constraints for table `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD CONSTRAINT `hoadonct_giay` FOREIGN KEY (`id_giay`) REFERENCES `giay` (`id`),
  ADD CONSTRAINT `hoadonct_hoadon` FOREIGN KEY (`id_hoadon`) REFERENCES `hoadon` (`id`);

--
-- Constraints for table `size_soluong`
--
ALTER TABLE `size_soluong`
  ADD CONSTRAINT `sizesoluong_giay` FOREIGN KEY (`id_giay`) REFERENCES `giay` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
