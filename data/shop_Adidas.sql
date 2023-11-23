-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2023 at 02:55 AM
-- Server version: 5.7.25
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_Adidas`
--
DROP DATABASE IF EXISTS `shop_Adidas`;
CREATE DATABASE IF NOT EXISTS `shop_Adidas` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `shop_Adidas`;

CREATE TABLE `tbl_giay` (
  `MaGiay` int(10) NOT NULL,
  `TenGiay` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` text COLLATE utf8_unicode_ci NOT NULL,
  `Gia` float DEFAULT NULL,
  `SoLuongBan` int(100) NOT NULL,
  `DanhGia` int(1) NOT NULL,
  `LoaiGiay` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- Insert Data: `tbl_giay`
INSERT INTO `tbl_giay`(`MaGiay`, `TenGiay`, `MoTa`, `Gia`, `SoLuongBan`, `DanhGia`, `LoaiGiay`, `HinhAnh`) VALUES
(1, 'ADIDAS NEW FUTURE A103', 'Giày Adidas NF A103 : Là dòng giày chuyên dùng để chạy bộ. Với công nghệ bọt khí MultiCare thế hệ mới do chính Adidas nghiên cứu. Ngoài ra, sản phẩm còn thích hợp để sử dụng để làm phụ kiện cho cá nhân người sử dụng vì thiết kế cực kì trẻ trung, năng động.',2999000, 32, 4,'Nam','./ShopAdidas/assets/img/giay1.jpg'),
(2, 'GIÀY CAMPUS 00S', 'Thiết kế ấn tượng hơn. Con người táo bạo hơn. Lấy cảm hứng từ tư duy hiện đại, mẫu giày này biến hóa phong cách adidas Campus 80s biểu tượng để tạo nên một thiết kế mới mẻ phù hợp với phong cách và văn hóa thời nay. Chúng tôi đã làm mới kiểu dáng và phối màu trên thân giày bằng da. 3 Sọc kinh điển kết hợp với logo Y2K tạo nên một thiết kế Campus mới để bạn định hình phong cách.',2600000, 3594, 5, 'Nam', './ShopAdidas/assets/img/giay2.jpg'),
(3, 'GIÀY SUPERSTAR', 'Thiết kế ban đầu dành cho sân bóng rổ vào thập niên 70. Được các ngôi sao hip hop tôn sùng vào thập niên 80. Đôi giày adidas Superstar giờ đây đã trở thành biểu tượng của các tín đồ thời trang đường phố. Thiết kế mũi giày vỏ sò nổi tiếng thế giới mang đến phong cách chất lừ và khả năng bảo vệ. Giống như những gì đôi giày này đã thể hiện trên sân bóng rổ trong quá khứ.    Giờ đây, bạn có thể tự tin tham gia lễ hội âm nhạc hay dạo phố mà không sợ bị dẫm lên chân. Chi tiết 3 Sọc viền răng cưa và logo adidas Superstar đóng khung mang đậm phong cách nguyên bản chính hiệu.', 2600000, 3653, 5, 'Nam', './ShopAdidas/assets/img/giay4.jpg'),
(4, 'Giày Cổ Thấp Forum', 'Không chỉ là một đôi giày, mà chính là một tuyên ngôn. Dòng adidas Forum ra mắt năm 1984 và cực kỳ được ưa chuộng cả trên sân bóng rổ lẫn trong giới âm nhạc. Mẫu mới của dòng giày kinh điển này tái hiện tinh thần thập niên 80, nguồn năng lượng bùng nổ trên sân đấu cũng như thiết kế quai cổ chân chữ X đặc trưng, kết tinh thành phiên bản cổ thấp đậm chất đường phố.', 2500000, 1315, 5, 'Nam', 'https://assets.adidas.com/images/w_766,h_766,f_auto,q_auto,fl_lossy,c_fill,g_auto/8d3ab16a86e64571b405aad600bad099_9366/gi%C3%A0y-superstar.jpg'),
(5, 'GIÀY ULTRABOOST LIGHT', 'Trái Đất là sân chơi của mọi runner, và chúng ta chỉ có một Trái Đất mà thôi. Chính vì vậy đôi giày chạy bộ adidas này có thiết kế thân thiện với đại dương. Mẫu giày này đảm bảo yếu tố thoải mái vốn làm nên tên tuổi của thiết kế Ultraboost, cộng thêm một điểm nhấn quan trọng: Giày làm từ sợi Parley Ocean Plastic. Đệm Light BOOST hoàn trả năng lượng cho cảm giác nhẹ nhàng hơn bao giờ hết, cùng công nghệ adidas LEP tạo đà cho bạn trên từng bước chạy.', 5500000, 1500, 5, 'Nam', 'https://assets.adidas.com/images/w_383,h_383,f_auto,q_auto,fl_lossy,c_fill,g_auto/0163c12e6c764d5faf86afaa00e3b29c_9366/gi%C3%A0y-ultraboost-light.jpg'),
(6, 'GIÀY SAMBA OG', 'Sinh ra trên sân bóng, đôi Samba là biểu tượng vượt thời gian của phong cách đường phố. Mẫu giày này giữ nguyên những nét đặc trưng với thân giày bằng da mềm và các chi tiết phủ ngoài bằng da lộn.', 3300000, 2450, 5, 'Nữ', 'https://assets.adidas.com/images/w_383,h_383,f_auto,q_auto,fl_lossy,c_fill,g_auto/9b983d5bc09a4d4aba39a8bf011869ba_9366/gi%C3%A0y-samba-og.jpg'),
(7, 'GIÀY ĐÁ BÓNG FIRM GROUND COPA PURE.1', 'Tên gọi bộ môn thể thao vua là có lý do. adidas Copa Pure loại bỏ xao nhãng cho cảm giác thoải mái tuyệt đối và chạm bóng hoàn hảo. Đôi giày đá bóng siêu nhẹ này có mũi giày bằng da Fusionskin may chần kết hợp mượt mà với cổ giày bằng vải dệt cho cảm giác chạm bóng êm ái và độ ổn định vững chãi. Đế ngoài chuyên dụng đảm bảo đẳng cấp trên sân cỏ tự nhiên.',5500000, 11, 5, 'Nữ', 'https://assets.adidas.com/images/w_383,h_383,f_auto,q_auto,fl_lossy,c_fill,g_auto/c4958c356a3a4acdb8f3afa900f47061_9366/gi%C3%A0y-%C4%91%C3%A1-b%C3%B3ng-firm-ground-copa-pure.1.jpg'),
(8, 'GIÀY ĐÁ BÓNG TURF COPA PURE.3', 'Tên gọi bộ môn thể thao vua là có lý do. adidas Copa Pure loại bỏ xao nhãng cho cảm giác thoải mái tuyệt đối và chạm bóng hoàn hảo. Mẫu giày đá bóng này có thiết kế dễ xỏ, cùng mũi giày bằng da may chần sang chảnh giúp bạn giữ bóng trong tầm kiểm soát. Đế đinh bằng cao su bám chắc mặt cỏ nhân tạo cho bạn đẳng cấp vượt trội.', 2100000, 10, 4, 'Nữ', 'https://assets.adidas.com/images/w_383,h_383,f_auto,q_auto,fl_lossy,c_fill,g_auto/879d7e842b394acb97f7afa500a2f68e_9366/gi%C3%A0y-%C4%91%C3%A1-b%C3%B3ng-turf-copa-pure.3.jpg'),
(9, 'GIÀY HIKING TERREX FREE HIKER 2.0', 'Tìm về thiên nhiên trong vài giờ hoặc suốt cuối tuần với đôi giày hiking adidas này. Đế giữa BOOST hoàn trả năng lượng và mang lại cảm giác êm ái dài lâu trên địa hình đá gồ ghề, cùng thân giày bằng vải lưới với các mảng phủ ngoài không đường may cho độ ôm vừa vặn thoải mái như một đôi tất. Cổ giày bằng vải dệt kim co giãn và thích ứng giúp chặn bụi bẩn và đất cát lọt vào bên trong, cùng đế ngoài Continental™ Rubber duy trì độ bám chắc chắn trên mọi địa hình dù khô ráo hay ẩm ướt. Thân giày làm từ loại sợi hiệu năng cao có chứa tối thiểu 50% chất liệu Parley Ocean Plastic — rác thải nhựa tái chế thu gom từ các vùng đảo xa, bãi biển, khu dân cư ven biển và đường bờ biển, nhằm ngăn chặn ô nhiễm đại dương. 50% thành phần còn lại của sợi dệt là polyester tái chế.', 5000000, 21, 5, 'Nữ', 'https://assets.adidas.com/images/w_383,h_383,f_auto,q_auto,fl_lossy,c_fill,g_auto/31562baf3f4b43998eabafaa00e63616_9366/gi%C3%A0y-hiking-terrex-free-hiker-2.0.jpg'),
(10, 'GIÀY TENNIS SOLEMATCH CONTROL', 'Độ bền và ổn định đồng nghĩa với sự tự tin trên sân đấu. Đôi giày tennis adidas này giúp bạn kiểm soát thế trận với các vùng TPU được bố trí đặc biệt giúp nâng đỡ phần giữa bàn chân khi di chuyển sang hai bên và bảo vệ các vùng dễ mài mòn. Gót giày đúc 3D cho độ ôm chắc chắn, cùng đế giữa Bounce linh hoạt đảm bảo sải bước êm ái trong từng game, set và match. Ở bên dưới là đế ngoài Adiwear cứng cáp với vân bám kiểu mới cho phong độ thượng thừa.', 3500000, 4, 4, 'Nữ', 'https://assets.adidas.com/images/w_383,h_383,f_auto,q_auto,fl_lossy,c_fill,g_auto/0817500d231c41629775afa100919898_9366/gi%C3%A0y-tennis-solematch-control.jpg');

CREATE TABLE `tbl_nguoidung` (
  `MaNguoiDung` int(10) NOT NULL,
  `TenNguoiDung` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TenDangNhap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `QuyenHan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- Insert Data: `tbl_nguoidung`
INSERT INTO `tbl_nguoidung` (`MaNguoiDung`, `TenNguoiDung`, `TenDangNhap`, `MatKhau`, `QuyenHan`) VALUES
(1, 'Trần Văn A', 'tva', '123456', 1),
(2, 'Nguyễn Văn A', 'nva', '15648SAW', 1),
(3, 'Nguyễn Văn B', 'nvb', '12POISW', 0),
(4, 'Lý Thị C', 'ltc', '456987sw', 0);

ALTER TABLE `tbl_giay`
  ADD PRIMARY KEY (`MaGiay`);
  
ALTER TABLE `tbl_nguoidung`
  ADD PRIMARY KEY (`MaNguoiDung`),
  ADD UNIQUE KEY `unique` (`TenDangNhap`);
  
ALTER TABLE `tbl_giay`
  MODIFY `MaGiay` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `tbl_nguoidung`
  MODIFY `MaNguoiDung` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  
  
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
