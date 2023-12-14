-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 14, 2023 lúc 04:54 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopgiaythethao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
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
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `tendanhmuc` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendanhmuc`) VALUES
(1, 'Nam'),
(2, 'Nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giay`
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id` int(11) NOT NULL,
  `id_nguoidung` int(11) NOT NULL,
  `id_giay` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` varchar(50) NOT NULL,
  `id_nguoidung` int(11) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `ngaylap` date NOT NULL,
  `tongtien` decimal(10,2) NOT NULL,
  `ghichu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonchitiet`
--

CREATE TABLE `hoadonchitiet` (
  `id` int(11) NOT NULL,
  `id_hoadon` varchar(50) NOT NULL,
  `id_giay` int(11) NOT NULL,
  `dongia` decimal(10,2) NOT NULL,
  `soluong` int(11) NOT NULL,
  `size` tinyint(2) NOT NULL,
  `thanhtien` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `tennguoidung` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `loai` tinyint(1) NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `hinhanh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size_soluong`
--

CREATE TABLE `size_soluong` (
  `id` int(11) NOT NULL,
  `id_giay` int(11) NOT NULL,
  `size` tinyint(2) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuonghieu`
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
-- Đang đổ dữ liệu cho bảng `thuonghieu`
--

INSERT INTO `thuonghieu` (`id`, `tenthuonghieu`, `diachi`, `email`, `sdt`, `hinhanh`) VALUES
(1, 'Adidas', 'Đức', 'adidas@mail.com', '0156324484', 'images/Brand/Adidas-removebg-preview.png'),
(2, 'Nike', 'Hoa Kỳ', 'nike@gmail.com', '0123456789', 'images/Brand/Nike.png'),
(3, 'Gucci', 'Italia', 'gucci@gmail.com', '0902548763', 'images/Brand/Gucci-removebg-preview.png'),
(4, 'Converse', 'Hoa Kỳ', 'converse@gmail.com', '0325874698', 'images/Brand/Conv-removebg-preview.png'),
(5, 'MLB', 'Hàn Quốc', 'MLB@gmail.com', '0231569845', 'images/Brand/MLB-removebg-preview.png'),
(6, 'New Balance', 'Boston, Massachusetts, Hoa Kỳ', 'newbalance@gmail.com', '0254631254', 'images/Brand/NBL.png'),
(7, 'Puma', 'Herzogenaurach, Bavaria, Đức', 'puma@gmail.com', '0125749611', 'images/Brand/Puma.png'),
(8, 'Reebok', 'Bolton, Lancashire, Hoa Kỳ', 'reebok@gmail.com', '0125846952', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phanhoi_nguoidung` (`id_nguoidung`),
  ADD KEY `phanhoi_giay` (`id_giay`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giay`
--
ALTER TABLE `giay`
  ADD PRIMARY KEY (`id`),
  ADD KEY `giay_thuonghieu` (`id_thuonghieu`),
  ADD KEY `giay_danhmuc` (`id_danhmuc`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `giohang_giay` (`id_giay`),
  ADD KEY `giohang_nguoidung` (`id_nguoidung`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hoadon_nguoidung` (`id_nguoidung`);

--
-- Chỉ mục cho bảng `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD KEY `hoadonct_hoadon` (`id_hoadon`),
  ADD KEY `hoadonct_giay` (`id_giay`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `size_soluong`
--
ALTER TABLE `size_soluong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sizesoluong_giay` (`id_giay`);

--
-- Chỉ mục cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `giay`
--
ALTER TABLE `giay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `size_soluong`
--
ALTER TABLE `size_soluong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `phanhoi_giay` FOREIGN KEY (`id_giay`) REFERENCES `giay` (`id`),
  ADD CONSTRAINT `phanhoi_nguoidung` FOREIGN KEY (`id_nguoidung`) REFERENCES `nguoidung` (`id`);

--
-- Các ràng buộc cho bảng `giay`
--
ALTER TABLE `giay`
  ADD CONSTRAINT `giay_danhmuc` FOREIGN KEY (`id_danhmuc`) REFERENCES `danhmuc` (`id`),
  ADD CONSTRAINT `giay_thuonghieu` FOREIGN KEY (`id_thuonghieu`) REFERENCES `thuonghieu` (`id`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_giay` FOREIGN KEY (`id_giay`) REFERENCES `giay` (`id`),
  ADD CONSTRAINT `giohang_nguoidung` FOREIGN KEY (`id_nguoidung`) REFERENCES `nguoidung` (`id`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_nguoidung` FOREIGN KEY (`id_nguoidung`) REFERENCES `nguoidung` (`id`);

--
-- Các ràng buộc cho bảng `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD CONSTRAINT `hoadonct_giay` FOREIGN KEY (`id_giay`) REFERENCES `giay` (`id`),
  ADD CONSTRAINT `hoadonct_hoadon` FOREIGN KEY (`id_hoadon`) REFERENCES `hoadon` (`id`);

--
-- Các ràng buộc cho bảng `size_soluong`
--
ALTER TABLE `size_soluong`
  ADD CONSTRAINT `sizesoluong_giay` FOREIGN KEY (`id_giay`) REFERENCES `giay` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
