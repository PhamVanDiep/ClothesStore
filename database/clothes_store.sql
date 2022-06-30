-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 06:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `clothes_store_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `userID` int(11) DEFAULT NULL,
  `priceID` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`userID`, `priceID`, `number`) VALUES
(1, 701, 2),
(1, 2003, 2),
(1, 102, 1),
(1, 202, 3),
(1, 302, 1),
(1, 402, 2),
(1, 502, 1),
(1, 602, 2),
(1, 1501, 2),
(2, 102, 2),
(2, 202, 2),
(2, 302, 2),
(2, 402, 2),
(2, 502, 2),
(2, 602, 2),
(3, 102, 2),
(3, 202, 2),
(3, 302, 2),
(3, 402, 2),
(3, 502, 2),
(3, 602, 2),
(4, 102, 2),
(4, 202, 2),
(4, 302, 2),
(4, 402, 2),
(4, 502, 2),
(4, 602, 2),
(5, 102, 2),
(5, 202, 2),
(5, 302, 2),
(5, 402, 2),
(5, 502, 2),
(5, 602, 2),
(6, 102, 2),
(6, 202, 2),
(6, 302, 2),
(6, 402, 2),
(6, 502, 2),
(6, 602, 2),
(7, 102, 2),
(7, 202, 2),
(7, 302, 2),
(7, 402, 2),
(7, 502, 2),
(7, 602, 2),
(8, 102, 2),
(8, 202, 2),
(8, 302, 2),
(8, 402, 2),
(8, 502, 2),
(8, 602, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`name`) VALUES
( 'Áo thun '),
( 'Áo polo'),
( 'Áo khoác'),
( 'Áo Sơ mi'),
( 'Vest và Blazer'),
( 'Hoodie và Áo nỉ'),
( 'Áo len'),
( 'Áo croptop'),
( 'Đầm/váy'),
( 'Quần jean'),
( 'Áo dài'),
( 'Quần đùi'),
('Quần âu'),
('Phụ kiện');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `timeStart` date DEFAULT NULL,
  `timeEnd` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventID`, `name`, `timeStart`, `timeEnd`) VALUES
(1, 'Lễ Tình Nhân', '2022-02-14', '2022-02-15'),
(2, 'Quốc tế phụ nữ', '2022-03-08', '2022-03-09'),
(3, 'Giảm nhiệt Chill hè, ngập tràn deal hot', '2022-07-01', '2022-07-30'),
(4, 'Thứ 7 lên đồ', '2022-06-25', '2022-06-26');

-- --------------------------------------------------------

--
-- Table structure for table `eventimage`
--

CREATE TABLE `eventimage` (
  `eventID` int(11) DEFAULT NULL,
  `urlImage` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `timeCreate` date DEFAULT NULL,
  `totalCost` int(11) DEFAULT NULL,
  `statusID` int(11) DEFAULT NULL,
  `delivery` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderID`, `userID`, `timeCreate`, `totalCost`, `statusID`, `delivery`) VALUES
(1, 1, '2022-06-21', 560000, 2, 'SPXVN02587281'),
(2, 2, '2022-06-22', 160000, 1, NULL),
(3, 2, '2022-06-14', 460000, 3, 'SPXVN02587281'),
(4, 3, '2022-06-14', 300000, 2, 'SPXVN025873473'),
(5, 3, '2022-06-01', 460000, 4, NULL),
(6, 4, '2022-06-20', 270000, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordervoucher`
--

CREATE TABLE `ordervoucher` (
  `voucherID` int(11) DEFAULT NULL,
  `orderID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ordervoucher`
--

INSERT INTO `ordervoucher` (`voucherID`, `orderID`) VALUES
(3, 1),
(8, 3),
(4, 6),
(2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `priceID` int(11) DEFAULT NULL,
  `orderID` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`priceID`, `orderID`, `number`) VALUES
(703, 1, 2),
(2203, 1, 1),
(2703, 2, 2),
(2003, 2, 1),
(1301, 3, 1),
(2602, 3, 2),
(1003, 4, 1),
(102, 4, 1),
(2101, 5, 1),
(1603, 5, 1),
(1203, 5, 1),
(2502, 5, 1),
(1603, 6, 1),
(1501, 6, 2),
(2502, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `priceID` int(11) NOT NULL,
  `productID` int(11) DEFAULT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `stoke` int(11) DEFAULT NULL,
  `oldPrice` int(11) DEFAULT NULL,
  `urlImage` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`priceID`, `productID`, `type`, `price`, `stoke`, `oldPrice`, `urlImage`) VALUES
(101, 1, 'Xanh ', 100000, 34, 160000, NULL),
(102, 1, 'Vàng be', 120000, 67, 170000, NULL),
(103, 1, 'Trắng', 130000, 4, 200000, NULL),
(201, 2, 'Xanh ', 100000, 34, 160000, NULL),
(202, 2, 'Vàng be', 120000, 67, 170000, NULL),
(203, 2, 'Trắng', 130000, 4, 200000, NULL),
(301, 3, 'Xanh ', 100000, 34, 160000, NULL),
(302, 3, 'Vàng be', 120000, 67, 170000, NULL),
(303, 3, 'Trắng', 130000, 4, 200000, NULL),
(401, 4, 'Xanh ', 100000, 34, 160000, NULL),
(402, 4, 'Vàng be', 120000, 67, 170000, NULL),
(403, 4, 'Trắng', 130000, 4, 200000, NULL),
(501, 5, 'Xanh ', 100000, 34, 160000, NULL),
(502, 5, 'Vàng be', 120000, 67, 170000, NULL),
(503, 5, 'Trắng', 130000, 4, 200000, NULL),
(601, 6, 'Xanh ', 100000, 34, 160000, NULL),
(602, 6, 'Vàng be', 120000, 67, 170000, NULL),
(603, 6, 'Trắng', 130000, 4, 200000, NULL),
(701, 7, 'Xanh ', 100000, 34, 160000, NULL),
(702, 7, 'Vàng be', 120000, 67, 170000, NULL),
(703, 7, 'Trắng', 130000, 4, 200000, NULL),
(801, 8, 'Xanh ', 100000, 34, 160000, NULL),
(802, 8, 'Vàng be', 120000, 67, 170000, NULL),
(803, 8, 'Trắng', 130000, 4, 200000, NULL),
(901, 9, 'Xanh ', 100000, 34, 160000, NULL),
(902, 9, 'Vàng be', 120000, 67, 170000, NULL),
(903, 9, 'Trắng', 130000, 4, 200000, NULL),
(1001, 10, 'Xanh ', 100000, 34, 160000, NULL),
(1002, 10, 'Vàng be', 120000, 67, 170000, NULL),
(1003, 10, 'Trắng', 130000, 4, 200000, NULL),
(1101, 11, 'Xanh ', 100000, 34, 160000, NULL),
(1102, 11, 'Vàng be', 120000, 67, 170000, NULL),
(1103, 11, 'Trắng', 130000, 4, 200000, NULL),
(1201, 12, 'Xanh ', 100000, 34, 160000, NULL),
(1202, 12, 'Vàng be', 120000, 67, 170000, NULL),
(1203, 12, 'Trắng', 130000, 4, 200000, NULL),
(1301, 13, 'Xanh ', 100000, 34, 160000, NULL),
(1302, 13, 'Vàng be', 120000, 67, 170000, NULL),
(1303, 13, 'Trắng', 130000, 4, 200000, NULL),
(1401, 14, 'Xanh ', 100000, 34, 160000, NULL),
(1402, 14, 'Vàng be', 120000, 67, 170000, NULL),
(1403, 14, 'Trắng', 130000, 4, 200000, NULL),
(1501, 15, 'Xanh ', 100000, 34, 160000, NULL),
(1502, 15, 'Vàng be', 120000, 67, 170000, NULL),
(1503, 15, 'Trắng', 130000, 4, 200000, NULL),
(1601, 16, 'Xanh ', 100000, 34, 160000, NULL),
(1602, 16, 'Vàng be', 120000, 67, 170000, NULL),
(1603, 16, 'Trắng', 130000, 4, 200000, NULL),
(1701, 17, 'Xanh ', 100000, 34, 160000, NULL),
(1702, 17, 'Vàng be', 120000, 67, 170000, NULL),
(1703, 17, 'Trắng', 130000, 4, 200000, NULL),
(1801, 18, 'Xanh ', 100000, 34, 160000, NULL),
(1802, 18, 'Vàng be', 120000, 67, 170000, NULL),
(1803, 18, 'Trắng', 130000, 4, 200000, NULL),
(1901, 19, 'Xanh ', 100000, 34, 160000, NULL),
(1902, 19, 'Vàng be', 120000, 67, 170000, NULL),
(1903, 19, 'Trắng', 130000, 4, 200000, NULL),
(2001, 20, 'Xanh ', 100000, 34, 160000, NULL),
(2002, 20, 'Vàng be', 120000, 67, 170000, NULL),
(2003, 20, 'Trắng', 130000, 4, 200000, NULL),
(2101, 21, 'Xanh ', 100000, 34, 160000, NULL),
(2102, 21, 'Vàng be', 120000, 67, 170000, NULL),
(2103, 21, 'Trắng', 130000, 4, 200000, NULL),
(2201, 22, 'Xanh ', 100000, 34, 160000, NULL),
(2202, 22, 'Vàng be', 120000, 67, 170000, NULL),
(2203, 22, 'Trắng', 130000, 4, 200000, NULL),
(2301, 23, 'Xanh ', 100000, 34, 160000, NULL),
(2302, 23, 'Vàng be', 120000, 67, 170000, NULL),
(2303, 23, 'Trắng', 130000, 4, 200000, NULL),
(2401, 24, 'Xanh ', 100000, 34, 160000, NULL),
(2402, 24, 'Vàng be', 120000, 67, 170000, NULL),
(2403, 24, 'Trắng', 130000, 4, 200000, NULL),
(2501, 25, 'Xanh ', 100000, 34, 160000, NULL),
(2502, 25, 'Vàng be', 120000, 67, 170000, NULL),
(2503, 25, 'Trắng', 130000, 4, 200000, NULL),
(2601, 26, 'Xanh ', 100000, 34, 160000, NULL),
(2602, 26, 'Vàng be', 120000, 67, 170000, NULL),
(2603, 26, 'Trắng', 130000, 4, 200000, NULL),
(2701, 27, 'Xanh ', 100000, 34, 160000, NULL),
(2702, 27, 'Vàng be', 120000, 67, 170000, NULL),
(2703, 27, 'Trắng', 130000, 4, 200000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `name`, `categoryID`, `description`) VALUES
(1, 'Áo Thun Tay Lỡ Oversize Nam Form Rộng', 1, 'THÔNG TIN SẢN PHẨM\r\n- Chất liệu: Vải TC ( 95% cotton và 5% Polyester ) Chất vải có sự co giãn tốt chống bị nhăn do có thành phần polyester nhưng vẫn giữ được tính chất như thấm hút mồ hôi tốt, mềm mịn, bóng và có độ bền cao của cotton\r\n- Form áo: OVERSIZE form rộng chuẩn TAY LỠ UNISEX cực đẹp. '),
(2, 'Áo thun nam tay ngắn cổ tròn chất thun lạnh co giãn 4 chiều ', 1, 'Chất Liệu :  \n- Chất thun lạnh , chất vải mềm , mịn , mặc thoải mái , đường chỉ may chắc chắn , không bị giản , nhão....\n- Công Nghệ In : Với công nghệ in chuyển nhiệt , chất liệu màu sẽ thấm trực tiếp lên vải  \n     -------------- \nƯu điểm : màu sắc , hình ảnh in lên áo cam kết đẹp và sắc nét hơn so với hình mẫu\n     ----------------- \nÁo thun nam, áo phông nam tay ngắn cổ tròn chất thun lạnh co giãn 4 chiều hình thành phố alex cool'),
(3, 'Áo thun oversize Odin Acid , áo phông cotton nam nữ unisex', 1, '- Chất liệu: Thun 100% Cotton cao cấp, thấm hút mồ hôi rất tốt, thoáng mát, bề mặt vải mịn, ko xù, ko gião\n- Hình in Decal công nghệ Nhật Bản siêu bền, thân thiện với da người\n- Đường may tỉ mỉ, chắc chắn\n- Thiết kế hiện đại, trẻ trung, năng động. Dễ phối đồ\n- Đủ size: M - L - XL'),
(4, 'ÁO THUN TRƠN OVERSIZE ĐỦ MÀU UNISEX (16 Màu)', 1, 'OVERSIZE CHIẾC ÁO KHÔNG THỂ THIẾU TRONG MỌI TỦ ĐỒ\nSắm đủ màu để mỗi ngày 1 bộ được không ạ\n-Chất liệu : Vải Cotton 65/35 co giãn 4 chiều. Mặt vải mịn màng, thoáng mát, thấm hút mồ hôi tốt. Độ phai màu và độ bền của vải cũng được nâng cao. Nên giặt tay và Không nên vắt quá mạnh áo thun sau khi giặt.'),
(5, 'Áo Thun Unisex Form Rộng Tay Lỡ Oversize NOCTURNAL Tee Nightlife Maniacs ', 1, 'NOCTURNAL ® Nightlife Maniacs Tee\r\n• Chất liệu : Preminum Cotton 100% / 240msg\r\n• Size: S / M / L / XL\r\n• Hình in: được in lụa cao cấp sắc nét.\r\n\r\nXem từng ảnh để thấy những chi tiết thú vị nhé!\r\n\r\nĐược chăm chút từ chất liệu, form dáng, đường may, hình in cho đến khâu đóng gói và hậu mãi, chiếc áo xinh xẻo này sẽ làm hài lòng cả những vị khách khó tính nhất'),
(6, 'Áo polo nam FEAER DENIM chất thoáng khí thoải mái vải cotton trơn BASIC', 2, '- Chất liệu: Cotton 100% mềm mịn, siêu mát, thấm hút mồ hôi nhanh, cảm giác vô cùng ấm áp vào mùa đông mà vẫn mát mẻ vào mùa hè\r\n- Hàng còn nguyên tem mác, cực sang chảnh (xem video trên ảnh sản phẩm). \r\n- Họa tiết Basic cao cấp. Khách hàng phối Jeans, Kaki, Short đều đẹp. Mặc dạo phố, du lịch hay đến các buổi tiệc đều mang đến sự tự tin đẳng cấp dành cho khách hàng.\r\n- Xuất xứ sản xuất tại Việt Nam\r\nSize M: Nặng 55-64kg ; Cao 1m60-1m74\r\nSize L: Nặng 65-74kg ; Cao 1m75-1m79\r\nSize XL: Nặng 75-84kg ; Cao 1m80-1m83\r\nSize XXL: Nặng 85-94kg ; Cao 1m83-1m87\r\nLưu ý: Đây là bảng thông số chọn size cơ bản, tùy thuộc và vào mỗi người mà có thể +/- 1 Size\r\n\r\n'),
(7, 'Áo Polo Wabisabi -WSA12', 2, 'Local brand bên mình đã được đăng ký bảo hộ thương hiệu vào tháng 9 năm 2021 . !  (WABISABI)\r\n\r\n- Định lượng vải 250g ,dày dặn hơn các brand thông thường  , vải được dệt theo phương pháp mới và đang rất hot tại hàn quốc  ! \r\n\r\n- Chất lượng vải  : 100% cotton 2 chiều\r\n\r\n- Bảng size WABISABI\r\n\r\nM : Dài :72 Rộng 56 | 1m45 - 1m58, Dưới 65kg\r\n\r\nL : Dài :74 Rộng 58 | 1m55 - 1m65,  65Kg trở lên '),
(8, 'Áo Polo Nam cổ bẻ tay ngắn basic MENTORIS', 2, 'Tên sản phẩm: Áo Polo Nam Ngắn Tay 5 Màu Kiểu Dáng Trẻ Trung Năng Động Thời Trang MENTORIS\r\n\r\n- Chất liệu: Thun\r\n\r\n- Màu sắc: TRẮNG - ĐEN - TÍM THAN - XANH DƯƠNG - XÁM\r\n\r\n- Thương hiệu: MENTORIS\r\n\r\n- Xuất xứ: Việt Nam '),
(9, 'Áo khoác dù 2 lớp cao cấp nam LADOS', 3, 'Chất liệu: Vải dù Nắng, chống gió cực tốt\r\n- Đường may tỉ mỉ tinh tế\r\n- Dây Kim loại, chắc chắn, kéo êm\r\n- Kiểu dáng rộng vừa thoải mái khi mặc, đơn giản dễ phối đồ\r\n- Màu sắc : 4 màu trẻ trung\r\n- Thích hợp cho đi chống nắng, hoặc thu đông, tránh gió\r\n- Thích hợp cho cả nam, nữ, mọi lứa tuổi'),
(10, 'Áo khoác unisex lót lông cừu ', 3, ' Tên sản phẩm : Áo khoác Unisex lót lông cừu xuất dư\r\n- Chất Liệu: chất dù xuất dư\r\n- Màu Sắc:   Đen + Be\r\n- Đặc Tính:  Chất vải áo là dù xuất dư nên dày dặn + 1 lớp lông cừu bên trong nên mặc rất ấm.'),
(11, 'Áo khoác bóng chày form rộng FASHION vải dù cao cấp', 3, 'Kiểu dáng: From dáng thể thao dễ mặc, năng động, trẻ trung.\r\n-Xuất xứ: Việt Nam\r\n-Thương hiệu: HP Fashion\r\n-Phong cách: Unisex - Nam nữ đều mặc được\r\n-Mực in: Công nghệ in Nhật Bản, không phai màu, bong tróc, chất lượng in cao cấp, thân thiện với da.\r\n'),
(12, 'Áo khoác nam nữ khoác gió Unisex City Cycle', 3, '1. Kiểu dáng: Áo khoác dù form rộng hàng Local Brand cao cấp có khóa kéo, dáng suông, form rộng oversize, có chun gấu có thể bo gấu lại hoặc để suông\r\n2. Chất liệu: Vải gió, vải dù Polieste chống nước, có thể đi mưa\r\n3. Tem mác thương hiệu City Cycle đính trên áo\r\n4. Đường may tiêu chuẩn phù hợp với hàng dệt may\r\n5. Màu sắc: Áo khoác gió unisex có 4 màu pastel basic dễ mặc dễ phối: Đen, Be, Hồng, Xanh\r\n6. Áo có 3 size M, L, XL cho người từ 45kg - 85kg'),
(13, 'Áo khoác dù 2 lớp Pigofashion chất dù xịn,2 túi trong rộng', 3, 'Áo Khoác Nam Dù Cán 2 Lớp cổ đứng có nút gài cao cấp - 2 túi rộng , với tính năng vượt trội vừa che nắng vào mùa hè hay giữ ấm vào mùa thu se lạnh. Chất liệu dù cán 2 lớp dày dặn vừa giúp thoáng mát, vừa tạo sự chắc chắn cho chiếc áo. Thiết kế áo đơn giản, trẻ trung phù hợp với nhiều lứa tuối. Áo có túi trong rộng rãi để đựng vật dụng nhỏ cần thiết.\n- Chất liệu dù cán 2 lớp cao cấp nhập khẩu, lớp vải lót trong thoáng khí tạo cảm giác mát mẻ khi mặc\n\n- Cổ đứng có phối viền tạo phong cách, Dây khóa nhẹ nhàng thuận tiện\n\n- Bên trong áo có túi rộng rãi tiện lợi\n\n- Phối bo thun tay và đáy áo giúp giữ kín tránh gió và bung áo khi đi đường.\n\n- Thân thiện với môi trường, không gây kích ứng da do có thành phần từ sợi bông tự nhiên.\n\n- Dễ dàng giặt, rửa và vệ sinh các vết bẩn bám trên vải'),
(14, 'Áo sơ mi nam nữ form rộng Unisex', 4, '1.Thông tin sản phẩm Áo sơ mi nam tay dài:\r\nForm áo: Form rộng – Phù hợp cho Cả Bạn Nam và Bạn Nữ\r\nMàu sắc: Đen – Trắng – Xanh Pastel – Xám ghi – Xanh Nhạt – Hồng \r\nThiết kế: Áo sơ mi trơn\r\nTrọng lượng: 250 g\r\nChất vải: Vải lụa poly cotton.\r\n-	Ưu điểm:Chống nhăn tuyệt đối, mềm mịn. Độ bền cao và giá thành rẻ.\r\n-	Nhược điểm: Thấm hút kém.'),
(15, 'Áo sơ mi kiểu 1 túi vải đũi dài tay dáng rộng siêu mát', 4, 'THÔNG TIN VỀ SẢN PHẨM\r\n- Kích thước:  Free Size (Tối đa 60kg- Tùy chiều cao)\r\n- Chất liệu:Vải đũi mỏng - Mặc siêu mát\r\n- Xuất xứ: Việt Nam\r\n- Chiều dài: 60cm'),
(16, 'Áo sơ mi nam tay dài VELVET FABRIC chất lụa nhung gân FEAER DENIM', 4, 'Thông tin chi tiết Áo sơ mi nam FEAER\r\n- Hàng Full tag, mác cực sang chảnh (xem video trên ảnh sản phẩm). \r\n- Chất liệu: Lụa Nhung gân  mềm mịn, siêu mát, thấm hút mồ hôi nhanh, sử dụng loại vải này còn mang lại cảm giác vô cùng ấm áp vào mùa đông mà vẫn mát mẻ vào mùa hè\r\n- Đường may tỉ mỉ, chắc chắn\r\n- Họa tiết trơn cổ điển. Khách hàng phối với Jeans, Kaki, Short đều được. Mặc dạo phố, du lịch hay đến các buổi tiệc đều mang đến sự thoải mái, tự tin đẳng cấp dành cho khách hàng.\r\n- Xuất xứ: Việt Nam do FEAER DENIM sản xuất'),
(17, 'Áo sơ mi nam FEAER chất lụa họa tiết lá đen Boo Boo', 4, 'Chi tiết Áo sơ mi Feaer\r\n- Chất liệu: Lụa Twill chéo mềm mịn, thoáng mát\r\n- Hàng còn nguyên tem mác, cực sang chảnh (xem video trên ảnh sản phẩm). \r\n- Họa tiết sọc trắng đen Khách hàng phối Jeans, Kaki, Short đều đẹp. Mặc dạo phố, du lịch hay đến các buổi tiệc đều mang đến sự tự tin đẳng cấp dành cho khách hàng.'),
(18, 'Áo Sơ Mi Nhung Tăm/ Nhung Gân Kupi tay dài', 4, 'Áo Sơ Mi Form rộng tay dài Unisex Mr Smile \r\n- Năm màu : Đen, Xanh Mint, Kem, Nâu Bò, Hồng Cam\r\n- Giá siêu mềm  , chất nhung tăm dày mịn \r\n- Chiếc áo đa năng 2 in 1 vừa có thể làm sơ mi vừa có thể làm áo khoác\r\n'),
(19, 'Áo khoác Blazer Nam Form rộng dài tay unisex basic chất Flannel', 5, 'Chất Liệu Vải :  Flannel xuất Hàn cao cấp 100%, co giãn 4 chiều, vải mềm, mịn, thoáng mát, không xù lông.\r\n    - Kĩ thuật may: Đường may chuẩn chỉnh, tỉ mỉ, chắc chắn\r\n    - Kiểu Dáng :Form Rộng Thoải Mái\r\n    - Full size nam nữ : 40 - 85 kg'),
(20, 'Áo vest nam thời trang hàng cao cấp chuẩn form', 5, '----------------------------------------------\n. Thông tin sản phẩm\nAO VEST được may chất liệu vải tuyết cao cấp dáng đứng, có lớp lót mềm.\n.Độ co dãn vừa phải làm người dùng cảm thấy thoải mái nhất có thể khi sử dụng Độ co dãn vừa phải làm người dùng cảm thấy thoải mái nhất có thể khi sử dụng\n. Chất liệu: Vải tuyết cao cấp \n. Xuất xứ: Việt Nam '),
(21, 'Bộ vest nam lịch lãm, vải đẹp, trẻ trung, sang trọng', 5, '-Thông tin sản phẩm\n-Bộ Vét đen, xanh than, xanh sáng , đỏ mận , xám đá\nghi sáng\nđược may chất liệu vải tuyết cao cấp dáng đứng, có lớp lót mềm.\n-Độ co dãn vừa phải làm người dùng cảm thấy thoải mái nhất có thể khi sử dụng Độ co dãn vừa phải làm người dùng cảm thấy thoải mái nhất có thể khi sử dụng\n-Màu: Xanh , Đen, xanh sáng, xanh hoà bình, đỏ mận, ghi, xám đá \n-Chất liệu: Vải tuyết mưa dày hàng cao cấp \n-Xuất xứ: Việt Nam '),
(22, 'Áo Blazer Nữ Dài Tay 2 Lớp Mẫu Mới Phong Cách Hàn Quốc Áo Vest', 5, 'ÁO VEST BLAZER NHIỀU MÀU\r\n\r\nCHẤT VẢI CỰC ĐẸP, FORM RỘNG, TỪ 40-60KG\r\nRộng vai : 38 .  Dài Áo: 70    Dài tay : 50'),
(23, 'ÁO HOODIE UNISEX Nam Nữ BASIC CAO CẤP', 6, 'Fullsize: Từ 40-95kg mặc đẹp . \n- Màu sắc: 9 màu Y hình.\n- Đường may kỹ, tinh tế, sắc xảo.\n- Form chuẩn Unisex Nam Nữ Couple đều mặc được.\n- Giao hàng tận nơi. Nhận hàng rồi thanh toán.\n- Cam kết: Chất lượng và Mẫu mã Sản phẩm giống với Hình ảnh.\n- Trả hàng hoàn tiền trong 3 ngày nếu sản phẩm bị lỗi.\n(Nếu Sản phẩm bị lỗi, mong Quý khách khoan Đánh giá, vui lòng inbox hoặc liên hệ Shop để được hỗ trợ đổi hàng hoặc Trả hàng/Hoàn tiền cho ạ!)'),
(24, 'Áo khoác Hoodie Nam, Hoodie Basic Unisex Nỉ From Rộng', 6, 'THÔNG TIN SẢN PHẨM\r\n● Chât vải Vải nỉ sự kết hợp của 2 chất liệu là vải và len có khả năng giữ ấm tốt do trên bề mặt được bao phủi bởi một lớp lông ngắn mềm mượt.\r\n● Giặt ko đổ lông hay bay màu\r\n● Mềm mại này mang đến sự thoải mái và dễ chịu cho người mặc. Với sự chà xát của những lớp lông ngắn trên da cũng không khiến cho bạn có cảm giác ngứa ngáy mà hoàn toàn thoải mái'),
(25, 'Áo Len Nam Cổ Lọ SUKIYA Chất Len mềm mịn kiểu dáng Hàn Quốc', 7, '*ÁO LEN NAM CỔ LỌ màu mới mới nhất 2021 Sukiya Fashion\r\n- Các sản phẩm áo len của Sukiya Fashion được làm bằng chất liệu len Lông Cừu mềm mại có bề mặt mềm mịn, thoát mồ hôi giữ ấm, nhanh tạo cảm giác vô cùng thoải mái cho người mặc và đặc biệt là không bị Xù Lông, Không phai màu, Giặt máy tốt. \r\n\r\n*THÔNG TIN SẢN PHẨM:\r\n- Chất liệu: 95% Sợi len lông Cừu, 5% Polyamide.\r\n- Màu sắc: Đỏ - xanh than - đen - Xám đậm -  Xám Ghi, Vàng bò, trắng, kem, xanh rêu\r\n- Size áo: M - L - XL - XXL'),
(26, 'Áo Cadigan len mỏng phong cách Hàn Quốc- KL01', 7, 'Tên sản phẩm: Áo Cadigan len mỏng phong cách Hàn Quốc\r\n  - Chất liệu: Len lông thỏ\r\n  - Kiểu dáng: Cadigan\r\n  - Chi tiết: Tay thụng\r\n  - Họa tiết: Trơn\r\n  - Màu sắc: Nâu - Trắng - Kem\r\n  - Thương hiệu: Siky\r\n  - Size: One size'),
(27, 'Áo Thun Croptop Phối Dây Rút Thời Trang Nữ Trẻ Trung Năng Động', 8, ' Thiết kế trẻ trung, năng động, hợp thời trang hot trend.\n- Vải thun cotton mềm mịn mát, thấm hút mồ hôi cực tốt.\n- Hình in sắc nét tỉ mỉ, không phai mờ, không bong tróc.\n- Kiểu dáng: Croptop, mặc ở nhà, đi chơi, hoạt động ngoài trời...đều phù hợp.\n- Size: M, L, XL, XXL, 2 màu Đen - Trắng.');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleID` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleID`, `name`) VALUES
(1, 'User'),
(2, 'Admin'),
(3, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `sizeID` int(11) NOT NULL,
  `productID` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`sizeID`, `productID`, `name`) VALUES
(101, 1, 'M'),
(102, 1, 'L'),
(103, 1, 'XL'),
(104, 1, 'XXL'),
(201, 2, 'M'),
(202, 2, 'L'),
(203, 2, 'XL'),
(204, 2, 'XXL'),
(301, 3, 'M'),
(302, 3, 'L'),
(303, 3, 'XL'),
(304, 3, 'XXL'),
(401, 4, 'M'),
(402, 4, 'L'),
(403, 4, 'XL'),
(404, 4, 'XXL'),
(501, 5, 'M'),
(502, 5, 'L'),
(503, 5, 'XL'),
(504, 5, 'XXL'),
(601, 6, 'M'),
(602, 6, 'L'),
(603, 6, 'XL'),
(604, 6, 'XXL'),
(701, 7, 'M'),
(702, 7, 'L'),
(703, 7, 'XL'),
(704, 7, 'XXL'),
(801, 8, 'M'),
(802, 8, 'L'),
(803, 8, 'XL'),
(804, 8, 'XXL'),
(901, 9, 'M'),
(902, 9, 'L'),
(903, 9, 'XL'),
(904, 9, 'XXL'),
(1001, 10, 'M'),
(1002, 10, 'L'),
(1003, 10, 'XL'),
(1004, 10, 'XXL'),
(1101, 11, 'M'),
(1102, 11, 'L'),
(1103, 11, 'XL'),
(1104, 11, 'XXL'),
(1201, 12, 'M'),
(1202, 12, 'L'),
(1203, 12, 'XL'),
(1204, 12, 'XXL'),
(1301, 13, 'M'),
(1302, 13, 'L'),
(1303, 13, 'XL'),
(1304, 13, 'XXL'),
(1401, 14, 'M'),
(1402, 14, 'L'),
(1403, 14, 'XL'),
(1404, 14, 'XXL'),
(1501, 15, 'M'),
(1502, 15, 'L'),
(1503, 15, 'XL'),
(1504, 15, 'XXL'),
(1601, 16, 'M'),
(1602, 16, 'L'),
(1603, 16, 'XL'),
(1604, 16, 'XXL'),
(1701, 17, 'M'),
(1702, 17, 'L'),
(1703, 17, 'XL'),
(1704, 17, 'XXL'),
(1801, 18, 'M'),
(1802, 18, 'L'),
(1803, 18, 'XL'),
(1804, 18, 'XXL'),
(1901, 19, 'M'),
(1902, 19, 'L'),
(1903, 19, 'XL'),
(1904, 19, 'XXL'),
(2001, 20, 'M'),
(2002, 20, 'L'),
(2003, 20, 'XL'),
(2004, 20, 'XXL'),
(2101, 21, 'M'),
(2102, 21, 'L'),
(2103, 21, 'XL'),
(2104, 21, 'XXL'),
(2201, 22, 'M'),
(2202, 22, 'L'),
(2203, 22, 'XL'),
(2204, 22, 'XXL'),
(2301, 23, 'M'),
(2302, 23, 'L'),
(2303, 23, 'XL'),
(2304, 23, 'XXL'),
(2401, 24, 'M'),
(2402, 24, 'L'),
(2403, 24, 'XL'),
(2404, 24, 'XXL'),
(2501, 25, 'M'),
(2502, 25, 'L'),
(2503, 25, 'XL'),
(2504, 25, 'XXL'),
(2601, 26, 'M'),
(2602, 26, 'L'),
(2603, 26, 'XL'),
(2604, 26, 'XXL'),
(2701, 27, 'M'),
(2702, 27, 'L'),
(2703, 27, 'XL'),
(2704, 27, 'XXL');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `statusID` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`statusID`, `name`) VALUES
(1, 'Chờ xác nhận'),
(2, 'Đang giao hàng'),
(3, 'Hoàn thành'),
(4, 'Đã hủy');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gmail` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phoneNumber` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `roleID` int(11) DEFAULT NULL,
  `urlAvatar` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `name`, `username`, `gmail`, `phoneNumber`, `gender`, `password`, `address`, `roleID`, `urlAvatar`) VALUES
(1, 'Trần Kim Quốc Thắng', 'Qtee_01', 'Qtee01@gmail.com', '0123456678', 'Nam', 'uajzsaolaicopass', '50 Tạ Quang Bửu, Hai Bà Trưng Hà Nội', 1, NULL),
(2, 'Nguyễn Văn A', 'Athilams_01', 'Athilams@gmail.com', '01234534523', 'Nam', 'uajzsaolaicoopk', '50 Tạ Quang Bửu, Hai Bà Trưng Hà Nội', 1, NULL),
(3, 'Nguyễn Văn B1', 'testcase_1', 'Qtee03@gmail.com', '0123456678', 'Nam', 'uajzsaolaicopass', '70 Trường Chinh, Phường Phương Mai, Quận Đống Đa, Hà Nội', 1, NULL),
(4, 'Nguyễn Át Min', 'admin_01', 'admin1@gmail.com', '012333453', 'Nam', 'uajzsaolaicopass', '79 Tạ Quang Bửu', 2, NULL),
(5, 'Đinh Ngọc Huân', 'huanfb_01', 'huan1@gmail.com', '0123456678', 'Nam', 'uajzsaolaicopass', '63A P. Phương Liệt, Phương Liệt, Thanh Xuân, Hà Nội, Việt Nam', 1, NULL),
(6, 'Lê Doãn B', 'B_fb_01', 'Nam1@gmail.com', '01234566348', 'Nam', 'khcanpassdau', '58b Phương Liệt, Thanh Xuân, Hà Nội, Việt Nam', 1, NULL),
(7, 'Nguyễn Trọng Q', 'Quannt_01', 'Quannt@gmail.com', '01234583448', 'Nam', 'okaynhakhcanpassdau', '3 Đ. Trường Chinh, Đồng Tâm, Hoàn Kiếm, Hà Nội, Việt Nam', 1, NULL),
(8, 'Hoàng Anh Túc', 'Tuc_ht01', 'Tucanh@gmail.com', '0194566348', 'Nữ', 'khcanpassdaunhe', '325 P. Trần Đại Nghĩa, Trương Định, Hai Bà Trưng, Hà Nội, Việt Nam', 1, NULL),
(9, 'Trần Quang H', 'Huy_rf500', 'Huyaf@gmail.com', '0185656348', 'Nam', 'umthikhcopassdau', '14 Nguyễn Đức Cảnh, Tân Mai, Hoàng Mai, Hà Nội, Việt Nam', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `voucherID` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `discountPercent` int(11) DEFAULT NULL,
  `eventID` int(11) DEFAULT NULL,
  `maxDiscount` int(11) DEFAULT NULL,
  `minOrderPrice` int(11) DEFAULT NULL,
  `timeStart` date DEFAULT NULL,
  `timeEnd` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`voucherID`, `name`, `discountPercent`, `eventID`, `maxDiscount`, `minOrderPrice`, `timeStart`, `timeEnd`) VALUES
(1, 'SAMDOHE001', 20, 3, 50000, 100000, '2022-07-01', '2022-07-30'),
(2, 'HAPPYWOMANDAY50k', 10, 2, 50000, 100000, '2022-03-08', '2022-03-09'),
(3, 'HAPPYWOMANDAY20k', 10, 2, 20000, 50000, '2022-03-08', '2022-03-09'),
(4, 'VALENTINE100k', 10, 2, 100000, 500000, '2022-02-14', '2022-02-15'),
(5, 'VALENTINE50k', 25, 2, 50000, 200000, '2022-02-14', '2022-02-15'),
(6, 'VALENTINE10k', 100, 2, 10000, 0, '2022-02-14', '2022-02-15'),
(7, 'THUBAYLENDO10K', 50, 4, 20000, 20000, '2022-06-25', '2022-06-26'),
(8, 'THUBAYLENDO50k', 25, 4, 50000, 200000, '0000-00-00', '2022-06-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `FK_userID_Cart` (`userID`),
  ADD KEY `FK_priceID_cart` (`priceID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventID`) AUTO_INCREMENT;

--
-- Indexes for table `eventimage`
--
ALTER TABLE `eventimage`
  ADD KEY `PK_eventID` (`eventID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `FK_order_user` (`userID`),
  ADD KEY `FK_order_status` (`statusID`);

--
-- Indexes for table `ordervoucher`
--
ALTER TABLE `ordervoucher`
  ADD KEY `FK_voucherID` (`voucherID`),
  ADD KEY `FK_orderID` (`orderID`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD KEY `FK_orderDetail_price` (`priceID`),
  ADD KEY `FK_orderDetail_order` (`orderID`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`priceID`),
  ADD KEY `FK_productID_price` (`productID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `FK_category` (`categoryID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`sizeID`),
  ADD KEY `FK_productID` (`productID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`statusID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `roleID` (`roleID`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`voucherID`),
  ADD KEY `FK_event` (`eventID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_priceID_cart` FOREIGN KEY (`priceID`) REFERENCES `price` (`priceID`),
  ADD CONSTRAINT `FK_userID_Cart` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `eventimage`
--
ALTER TABLE `eventimage`
  ADD CONSTRAINT `PK_eventID` FOREIGN KEY (`eventID`) REFERENCES `event` (`eventID`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_order_status` FOREIGN KEY (`statusID`) REFERENCES `status` (`statusID`),
  ADD CONSTRAINT `FK_order_user` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `ordervoucher`
--
ALTER TABLE `ordervoucher`
  ADD CONSTRAINT `FK_orderID` FOREIGN KEY (`orderID`) REFERENCES `order` (`orderID`),
  ADD CONSTRAINT `FK_voucherID` FOREIGN KEY (`voucherID`) REFERENCES `voucher` (`voucherID`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `FK_orderDetail_order` FOREIGN KEY (`orderID`) REFERENCES `order` (`orderID`),
  ADD CONSTRAINT `FK_orderDetail_price` FOREIGN KEY (`priceID`) REFERENCES `price` (`priceID`);

--
-- Constraints for table `price`
--
ALTER TABLE `price`
  ADD CONSTRAINT `FK_productID_price` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_category` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`);

--
-- Constraints for table `size`
--
ALTER TABLE `size`
  ADD CONSTRAINT `FK_productID` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `role` (`roleID`);

--
-- Constraints for table `voucher`
--
ALTER TABLE `voucher`
  ADD CONSTRAINT `FK_event` FOREIGN KEY (`eventID`) REFERENCES `event` (`eventID`);
COMMIT;
