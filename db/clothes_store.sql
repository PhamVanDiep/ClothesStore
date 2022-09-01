-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2022 at 10:04 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothes_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartID`, `userID`) VALUES
(9, 1),
(13, 1),
(3, 2),
(4, 3),
(5, 4),
(6, 5),
(7, 6),
(8, 7),
(1, 8),
(2, 9),
(12, 11),
(14, 11),
(15, 11);

-- --------------------------------------------------------

--
-- Table structure for table `cart_product`
--

CREATE TABLE `cart_product` (
  `cartID` int(11) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `name`) VALUES
(1, 'Áo thun '),
(2, 'Áo polo'),
(3, 'Áo khoác'),
(4, 'Áo Sơ mi'),
(5, 'Vest và Blazer'),
(6, 'Hoodie và Áo nỉ'),
(7, 'Áo len'),
(8, 'Áo croptop'),
(9, 'Đầm/váy'),
(10, 'Quần jean'),
(11, 'Áo dài'),
(12, 'Quần đùi'),
(13, 'Quần âu'),
(14, 'Phụ kiện');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventID` int(11) NOT NULL,
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

--
-- Dumping data for table `eventimage`
--

INSERT INTO `eventimage` (`eventID`, `urlImage`) VALUES
(4, 'event1.jpg'),
(4, 'event2.jpg'),
(4, 'event3.png'),
(3, 'event1.jpg'),
(3, 'event2.jpg'),
(3, 'event3.png'),
(2, 'event3.png'),
(1, 'event1.jpg'),
(1, 'event3.png');

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
(1, 1, '2022-06-21', 560000, 5, 'SPXVN02587281'),
(2, 2, '2022-06-22', 160000, 1, NULL),
(3, 2, '2022-06-14', 460000, 3, 'SPXVN02587281'),
(4, 3, '2022-06-14', 300000, 2, 'SPXVN025873473'),
(5, 3, '2022-06-01', 460000, 4, NULL),
(6, 4, '2022-06-20', 270000, 1, NULL),
(7, 8, '2022-07-12', 200000, 4, 'TÃ¢n mai'),
(8, 6, '2022-07-11', 300000, 4, 'HoÃ ng Mai'),
(10, 11, '2022-07-21', 1055000, 3, 'P5qrgNTJQGEf'),
(11, 11, '2022-07-21', 275000, 5, '0wYJ7pPInDFu'),
(12, 11, '2022-07-21', 1055000, 5, 'AF6cvlBXmwIn'),
(13, 11, '2022-07-21', 665000, 5, '7vVeNX8cXk4T'),
(14, 11, '2022-07-21', 925000, 5, 'NlADhOPT3HuN'),
(15, 11, '2022-07-21', 275000, 5, 'gb8NY3T655Af'),
(16, 11, '2022-07-21', 1055000, 1, 'Ni17yh9hxMrC'),
(17, 11, '2022-07-21', 665000, 1, 'sRq2lWtuZonf'),
(18, 11, '2022-07-21', 535000, 1, 'zHp49j7eHvDj'),
(19, 11, '2022-07-21', 535000, 1, 'WBJpAswrx7Eh'),
(20, 11, '2022-07-21', 1315000, 1, 'eDa53Gy3u2uH'),
(21, 1, '2022-08-02', 273000, 2, 'Aq8LaCl4KP96'),
(22, 1, '2022-08-02', 259000, 1, 'NL6Unj5lPXYq'),
(23, 11, '2022-08-02', 643000, 2, 'Vv1YhmXUQHB1');

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
  `productID` int(11) DEFAULT NULL,
  `orderID` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`productID`, `orderID`, `number`, `type`, `size`) VALUES
(21, 1, 5, 'Đen trắng', 'XL'),
(13, 3, 6, 'Đen trắng', 'XL'),
(6, 7, 4, 'Đen trắng', 'XL'),
(6, 8, 7, 'Đen trắng', 'XL'),
(16, 8, 9, 'Đen trắng', 'XL'),
(6, 10, 5, '       Trắ', '       XL'),
(21, 10, 3, ' Đen', 'XXL'),
(16, 11, 2, 'Trắng', 'L'),
(6, 12, 5, '       Trắ', '       XL'),
(21, 12, 3, ' Đen', 'XXL'),
(21, 13, 3, ' Đen', 'XXL'),
(16, 13, 2, 'Trắng', 'L'),
(21, 14, 3, ' Đen', 'XXL'),
(16, 14, 2, 'Trắng', 'L'),
(16, 15, 2, 'Trắng', 'L'),
(6, 16, 5, '       Trắ', '       XL'),
(21, 16, 3, ' Đen', 'XXL'),
(21, 17, 3, ' Đen', 'XXL'),
(16, 17, 2, 'Trắng', 'L'),
(16, 18, 1, 'Trắng', 'XXL'),
(21, 18, 3, 'Xanh', 'XXL'),
(6, 19, 1, '   Xanh', '   XXL'),
(21, 19, 3, 'Xanh', 'XXL'),
(6, 20, 5, '       Trắ', '       XL'),
(21, 20, 5, ' Đen', 'XXL'),
(2, 21, 2, ' Trắng', 'XXL'),
(4, 22, 1, 'Xanh', 'XXL'),
(15, 22, 1, 'Xanh', 'XXL'),
(16, 23, 2, 'Trắng', 'L'),
(1, 23, 3, '      Tím', '      M');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `oldPrice` int(11) DEFAULT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `name`, `categoryID`, `price`, `oldPrice`, `description`) VALUES
(1, 'Áo Thun Tay Lỡ Oversize Nam Form Rộng', 8, 150000, 160000, 'THÔNG TIN SẢN PHẨM\r\n- Chất liệu: Vải TC ( 95% cotton và 5% Polyester ) Chất vải có sự co giãn tốt chống bị nhăn do có thành phần polyester nhưng vẫn giữ được tính chất như thấm hút mồ hôi tốt, mềm mịn, bóng và có độ bền cao của cotton\r\n- Form áo: OVERSIZE form rộng chuẩn TAY LỠ UNISEX cực đẹp.                                                                                                                                                                         '),
(2, 'Áo thun nam tay ngắn cổ tròn chất thun lạnh co giãn 4 chiều ', 1, 129000, 150000, 'Chất Liệu :  \r\n- Chất thun lạnh , chất vải mềm , mịn , mặc thoải mái , đường chỉ may chắc chắn , không bị giản , nhão....\r\n- Công Nghệ In : Với công nghệ in chuyển nhiệt , chất liệu màu sẽ thấm trực tiếp lên vải  \r\n     -------------- \r\nƯu điểm : màu sắc , hình ảnh in lên áo cam kết đẹp và sắc nét hơn so với hình mẫu\r\n     ----------------- \r\nÁo thun nam, áo phông nam tay ngắn cổ tròn chất thun lạnh co giãn 4 chiều hình thành phố alex cool                        '),
(3, 'Áo thun oversize Odin Acid , áo phông cotton nam nữ unisex', 1, 139000, 180000, '- Chất liệu: Thun 100% Cotton cao cấp, thấm hút mồ hôi rất tốt, thoáng mát, bề mặt vải mịn, ko xù, ko gião\r\n- Hình in Decal công nghệ Nhật Bản siêu bền, thân thiện với da người\r\n- Đường may tỉ mỉ, chắc chắn\r\n- Thiết kế hiện đại, trẻ trung, năng động. Dễ phối đồ\r\n- Đủ size: M - L - XL                        '),
(4, 'ÁO THUN TRƠN OVERSIZE ĐỦ MÀU UNISEX (16 Màu)', 1, 119000, 169000, 'OVERSIZE CHIẾC ÁO KHÔNG THỂ THIẾU TRONG MỌI TỦ ĐỒ\r\nSắm đủ màu để mỗi ngày 1 bộ được không ạ\r\n-Chất liệu : Vải Cotton 65/35 co giãn 4 chiều. Mặt vải mịn màng, thoáng mát, thấm hút mồ hôi tốt. Độ phai màu và độ bền của vải cũng được nâng cao. Nên giặt tay và Không nên vắt quá mạnh áo thun sau khi giặt.                        '),
(5, 'Áo Thun Unisex Form Rộng Tay Lỡ Oversize NOCTURNAL Tee Nightlife Maniacs ', 1, 99000, 129000, 'NOCTURNAL ® Nightlife Maniacs Tee\r\n• Chất liệu : Preminum Cotton 100% / 240msg\r\n• Size: S / M / L / XL\r\n• Hình in: được in lụa cao cấp sắc nét.\r\n\r\nXem từng ảnh để thấy những chi tiết thú vị nhé!\r\n\r\nĐược chăm chút từ chất liệu, form dáng, đường may, hình in cho đến khâu đóng gói và hậu mãi, chiếc áo xinh xẻo này sẽ làm hài lòng cả những vị khách khó tính nhất                        '),
(6, 'Áo polo nam FEAER DENIM chất thoáng khí thoải mái vải cotton trơn BASIC', 2, 159000, 169000, '- Chất liệu: Cotton 100% mềm mịn, siêu mát, thấm hút mồ hôi nhanh, cảm giác vô cùng ấm áp vào mùa đông mà vẫn mát mẻ vào mùa hè\r\n- Hàng còn nguyên tem mác, cực sang chảnh (xem video trên ảnh sản phẩm). \r\n- Họa tiết Basic cao cấp. Khách hàng phối Jeans, Kaki, Short đều đẹp. Mặc dạo phố, du lịch hay đến các buổi tiệc đều mang đến sự tự tin đẳng cấp dành cho khách hàng.\r\n- Xuất xứ sản xuất tại Việt Nam\r\nSize M: Nặng 55-64kg ; Cao 1m60-1m74\r\nSize L: Nặng 65-74kg ; Cao 1m75-1m79\r\nSize XL: Nặng 75-84kg ; Cao 1m80-1m83\r\nSize XXL: Nặng 85-94kg ; Cao 1m83-1m87\r\nLưu ý: Đây là bảng thông số chọn size cơ bản, tùy thuộc và vào mỗi người mà có thể +/- 1 Size\r\n\r\n                                                                                                                                                                                                '),
(7, 'Áo Polo Wabisabi -WSA12', 2, 169000, 199000, 'Local brand bên mình đã được đăng ký bảo hộ thương hiệu vào tháng 9 năm 2021 . !  (WABISABI)\r\n\r\n- Định lượng vải 250g ,dày dặn hơn các brand thông thường  , vải được dệt theo phương pháp mới và đang rất hot tại hàn quốc  ! \r\n\r\n- Chất lượng vải  : 100% cotton 2 chiều\r\n\r\n- Bảng size WABISABI\r\n\r\nM : Dài :72 Rộng 56 | 1m45 - 1m58, Dưới 65kg\r\n\r\nL : Dài :74 Rộng 58 | 1m55 - 1m65,  65Kg trở lên                         '),
(8, 'Áo Polo Nam cổ bẻ tay ngắn basic MENTORIS', 2, 99000, 119000, 'Tên sản phẩm: Áo Polo Nam Ngắn Tay 5 Màu Kiểu Dáng Trẻ Trung Năng Động Thời Trang MENTORIS\r\n\r\n- Chất liệu: Thun\r\n\r\n- Màu sắc: TRẮNG - ĐEN - TÍM THAN - XANH DƯƠNG - XÁM\r\n\r\n- Thương hiệu: MENTORIS\r\n\r\n- Xuất xứ: Việt Nam                         '),
(12, 'Áo khoác nam nữ khoác gió Unisex City Cycle', 3, 135000, 165000, '1. Kiểu dáng: Áo khoác dù form rộng hàng Local Brand cao cấp có khóa kéo, dáng suông, form rộng oversize, có chun gấu có thể bo gấu lại hoặc để suông\r\n2. Chất liệu: Vải gió, vải dù Polieste chống nước, có thể đi mưa\r\n3. Tem mác thương hiệu City Cycle đính trên áo\r\n4. Đường may tiêu chuẩn phù hợp với hàng dệt may\r\n5. Màu sắc: Áo khoác gió unisex có 4 màu pastel basic dễ mặc dễ phối: Đen, Be, Hồng, Xanh\r\n6. Áo có 3 size M, L, XL cho người từ 45kg - 85kg                        '),
(13, 'Áo khoác dù 2 lớp Pigofashion chất dù xịn,2 túi trong rộng', 3, 119000, 169000, 'Áo Khoác Nam Dù Cán 2 Lớp cổ đứng có nút gài cao cấp - 2 túi rộng , với tính năng vượt trội vừa che nắng vào mùa hè hay giữ ấm vào mùa thu se lạnh. Chất liệu dù cán 2 lớp dày dặn vừa giúp thoáng mát, vừa tạo sự chắc chắn cho chiếc áo. Thiết kế áo đơn giản, trẻ trung phù hợp với nhiều lứa tuối. Áo có túi trong rộng rãi để đựng vật dụng nhỏ cần thiết.\r\n- Chất liệu dù cán 2 lớp cao cấp nhập khẩu, lớp vải lót trong thoáng khí tạo cảm giác mát mẻ khi mặc\r\n\r\n- Cổ đứng có phối viền tạo phong cách, Dây khóa nhẹ nhàng thuận tiện\r\n\r\n- Bên trong áo có túi rộng rãi tiện lợi\r\n\r\n- Phối bo thun tay và đáy áo giúp giữ kín tránh gió và bung áo khi đi đường.\r\n\r\n- Thân thiện với môi trường, không gây kích ứng da do có thành phần từ sợi bông tự nhiên.\r\n\r\n- Dễ dàng giặt, rửa và vệ sinh các vết bẩn bám trên vải                                                '),
(14, 'Áo sơ mi nam nữ form rộng Unisex', 4, 159000, 189000, '1.Thông tin sản phẩm Áo sơ mi nam tay dài:\r\nForm áo: Form rộng – Phù hợp cho Cả Bạn Nam và Bạn Nữ\r\nMàu sắc: Đen – Trắng – Xanh Pastel – Xám ghi – Xanh Nhạt – Hồng \r\nThiết kế: Áo sơ mi trơn\r\nTrọng lượng: 250 g\r\nChất vải: Vải lụa poly cotton.\r\n-	Ưu điểm:Chống nhăn tuyệt đối, mềm mịn. Độ bền cao và giá thành rẻ.\r\n-	Nhược điểm: Thấm hút kém.                        '),
(15, 'Áo sơ mi kiểu 1 túi vải đũi dài tay dáng rộng siêu mát', 4, 125000, 155000, 'THÔNG TIN VỀ SẢN PHẨM\r\n- Kích thước:  Free Size (Tối đa 60kg- Tùy chiều cao)\r\n- Chất liệu:Vải đũi mỏng - Mặc siêu mát\r\n- Xuất xứ: Việt Nam\r\n- Chiều dài: 60cm                        '),
(16, 'Áo sơ mi nam tay dài VELVET FABRIC chất lụa nhung gân FEAER DENIM', 4, 89000, 129000, 'Thông tin chi tiết Áo sơ mi nam FEAER\r\n- Hàng Full tag, mác cực sang chảnh (xem video trên ảnh sản phẩm). \r\n- Chất liệu: Lụa Nhung gân  mềm mịn, siêu mát, thấm hút mồ hôi nhanh, sử dụng loại vải này còn mang lại cảm giác vô cùng ấm áp vào mùa đông mà vẫn mát mẻ vào mùa hè\r\n- Đường may tỉ mỉ, chắc chắn\r\n- Họa tiết trơn cổ điển. Khách hàng phối với Jeans, Kaki, Short đều được. Mặc dạo phố, du lịch hay đến các buổi tiệc đều mang đến sự thoải mái, tự tin đẳng cấp dành cho khách hàng.\r\n- Xuất xứ: Việt Nam do FEAER DENIM sản xuất                        '),
(17, 'Áo sơ mi nam FEAER chất lụa họa tiết lá đen Boo Boo', 4, 259000, 269000, 'Chi tiết Áo sơ mi Feaer\r\n- Chất liệu: Lụa Twill chéo mềm mịn, thoáng mát\r\n- Hàng còn nguyên tem mác, cực sang chảnh (xem video trên ảnh sản phẩm). \r\n- Họa tiết sọc trắng đen Khách hàng phối Jeans, Kaki, Short đều đẹp. Mặc dạo phố, du lịch hay đến các buổi tiệc đều mang đến sự tự tin đẳng cấp dành cho khách hàng.                                                '),
(18, 'Áo Sơ Mi Nhung Tăm/ Nhung Gân Kupi tay dài', 4, 129000, 169000, 'Áo Sơ Mi Form rộng tay dài Unisex Mr Smile \r\n- Năm màu : Đen, Xanh Mint, Kem, Nâu Bò, Hồng Cam\r\n- Giá siêu mềm  , chất nhung tăm dày mịn \r\n- Chiếc áo đa năng 2 in 1 vừa có thể làm sơ mi vừa có thể làm áo khoác\r\n                        '),
(19, 'Áo khoác Blazer Nam Form rộng dài tay unisex basic chất Flannel', 5, 329000, 369000, 'Chất Liệu Vải :  Flannel xuất Hàn cao cấp 100%, co giãn 4 chiều, vải mềm, mịn, thoáng mát, không xù lông.\r\n    - Kĩ thuật may: Đường may chuẩn chỉnh, tỉ mỉ, chắc chắn\r\n    - Kiểu Dáng :Form Rộng Thoải Mái\r\n    - Full size nam nữ : 40 - 85 kg                        '),
(20, 'Áo vest nam thời trang hàng cao cấp chuẩn form', 5, 359000, 399000, '----------------------------------------------\r\n. Thông tin sản phẩm\r\nAO VEST được may chất liệu vải tuyết cao cấp dáng đứng, có lớp lót mềm.\r\n.Độ co dãn vừa phải làm người dùng cảm thấy thoải mái nhất có thể khi sử dụng Độ co dãn vừa phải làm người dùng cảm thấy thoải mái nhất có thể khi sử dụng\r\n. Chất liệu: Vải tuyết cao cấp \r\n. Xuất xứ: Việt Nam                                                 '),
(21, 'Bộ vest nam lịch lãm, vải đẹp, trẻ trung, sang trọng', 5, 459000, 489000, '-Thông tin sản phẩm\r\n-Bộ Vét đen, xanh than, xanh sáng , đỏ mận , xám đá\r\nghi sáng\r\nđược may chất liệu vải tuyết cao cấp dáng đứng, có lớp lót mềm.\r\n-Độ co dãn vừa phải làm người dùng cảm thấy thoải mái nhất có thể khi sử dụng Độ co dãn vừa phải làm người dùng cảm thấy thoải mái nhất có thể khi sử dụng\r\n-Màu: Xanh , Đen, xanh sáng, xanh hoà bình, đỏ mận, ghi, xám đá \r\n-Chất liệu: Vải tuyết mưa dày hàng cao cấp \r\n-Xuất xứ: Việt Nam                                                 '),
(22, 'Áo Blazer Nữ Dài Tay 2 Lớp Mẫu Mới Phong Cách Hàn Quốc Áo Vest', 5, 629000, 669000, 'ÁO VEST BLAZER NHIỀU MÀU\r\n\r\nCHẤT VẢI CỰC ĐẸP, FORM RỘNG, TỪ 40-60KG\r\nRộng vai : 38 .  Dài Áo: 70    Dài tay : 50                        '),
(23, 'ÁO HOODIE UNISEX Nam Nữ BASIC CAO CẤP', 6, 199000, 229000, 'Fullsize: Từ 40-95kg mặc đẹp . \r\n- Màu sắc: 9 màu Y hình.\r\n- Đường may kỹ, tinh tế, sắc xảo.\r\n- Form chuẩn Unisex Nam Nữ Couple đều mặc được.\r\n- Giao hàng tận nơi. Nhận hàng rồi thanh toán.\r\n- Cam kết: Chất lượng và Mẫu mã Sản phẩm giống với Hình ảnh.\r\n- Trả hàng hoàn tiền trong 3 ngày nếu sản phẩm bị lỗi.\r\n(Nếu Sản phẩm bị lỗi, mong Quý khách khoan Đánh giá, vui lòng inbox hoặc liên hệ Shop để được hỗ trợ đổi hàng hoặc Trả hàng/Hoàn tiền cho ạ!)                        '),
(24, 'Áo khoác Hoodie Nam, Hoodie Basic Unisex Nỉ From Rộng', 6, 179000, 199000, 'THÔNG TIN SẢN PHẨM\r\n● Chât vải Vải nỉ sự kết hợp của 2 chất liệu là vải và len có khả năng giữ ấm tốt do trên bề mặt được bao phủi bởi một lớp lông ngắn mềm mượt.\r\n● Giặt ko đổ lông hay bay màu\r\n● Mềm mại này mang đến sự thoải mái và dễ chịu cho người mặc. Với sự chà xát của những lớp lông ngắn trên da cũng không khiến cho bạn có cảm giác ngứa ngáy mà hoàn toàn thoải mái                        '),
(25, 'Áo Len Nam Cổ Lọ SUKIYA Chất Len mềm mịn kiểu dáng Hàn Quốc', 7, 529000, 559000, '*ÁO LEN NAM CỔ LỌ màu mới mới nhất 2021 Sukiya Fashion\r\n- Các sản phẩm áo len của Sukiya Fashion được làm bằng chất liệu len Lông Cừu mềm mại có bề mặt mềm mịn, thoát mồ hôi giữ ấm, nhanh tạo cảm giác vô cùng thoải mái cho người mặc và đặc biệt là không bị Xù Lông, Không phai màu, Giặt máy tốt. \r\n\r\n*THÔNG TIN SẢN PHẨM:\r\n- Chất liệu: 95% Sợi len lông Cừu, 5% Polyamide.\r\n- Màu sắc: Đỏ - xanh than - đen - Xám đậm -  Xám Ghi, Vàng bò, trắng, kem, xanh rêu\r\n- Size áo: M - L - XL - XXL                        '),
(26, 'Áo Cadigan len mỏng phong cách Hàn Quốc- KL01', 7, 330000, 360000, 'Tên sản phẩm: Áo Cadigan len mỏng phong cách Hàn Quốc\r\n  - Chất liệu: Len lông thỏ\r\n  - Kiểu dáng: Cadigan\r\n  - Chi tiết: Tay thụng\r\n  - Họa tiết: Trơn\r\n  - Màu sắc: Nâu - Trắng - Kem\r\n  - Thương hiệu: Siky\r\n  - Size: One size                        '),
(27, 'Áo Thun Croptop Phối Dây Rút Thời Trang Nữ Trẻ Trung Năng Động', 8, 139000, 169000, ' Thiết kế trẻ trung, năng động, hợp thời trang hot trend.\r\n- Vải thun cotton mềm mịn mát, thấm hút mồ hôi cực tốt.\r\n- Hình in sắc nét tỉ mỉ, không phai mờ, không bong tróc.\r\n- Kiểu dáng: Croptop, mặc ở nhà, đi chơi, hoạt động ngoài trời...đều phù hợp.\r\n- Size: M, L, XL, XXL, 2 màu Đen - Trắng.                                                                        ');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `productID` int(11) NOT NULL,
  `urlimage` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`productID`, `urlimage`) VALUES
(1, 'product_1.1.jpg'),
(1, 'product_1.2.jpg'),
(1, 'product_1.3.jpg'),
(1, 'product_1.4.jpg'),
(2, 'product_2.1.jpg'),
(2, 'product_2.2.jpg'),
(2, 'product_2.3.jpg'),
(2, 'product_2.4.jpg'),
(2, 'product_2.1.jpg'),
(2, 'product_2.2.jpg'),
(2, 'product_2.3.jpg'),
(2, 'product_2.4.jpg'),
(3, 'product_3.1.jpg'),
(3, 'product_3.2.jpg'),
(3, 'product_3.3.jpg'),
(3, 'product_3.4.jpg'),
(4, 'product_4.1.jpg'),
(4, 'product_4.2.jpg'),
(4, 'product_4.3.jpg'),
(4, 'product_4.4.jpg'),
(5, 'product_5.1.jpg'),
(5, 'product_5.2.jpg'),
(5, 'product_5.3.jpg'),
(5, 'product_5.4.jpg'),
(6, 'product_6.1.jpg'),
(6, 'product_6.2.jpg'),
(6, 'product_6.3.jpg'),
(6, 'product_6.4.jpg'),
(7, 'product_7.1.jpg'),
(7, 'product_7.2.jpg'),
(7, 'product_7.3.jpg'),
(7, 'product_7.4.jpg'),
(8, 'product_8.1.jpg'),
(8, 'product_8.2.jpg'),
(8, 'product_8.3.jpg'),
(8, 'product_8.4.jpg'),
(12, 'product_12.1.jpg'),
(12, 'product_12.2.jpg'),
(12, 'product_12.3.jpg'),
(12, 'product_12.4.jpg'),
(13, 'product_13.1.jpg'),
(13, 'product_13.2.jpg'),
(13, 'product_13.3.jpg'),
(13, 'product_13.4.jpg'),
(14, 'product_14.1.jpg'),
(14, 'product_14.2.jpg'),
(14, 'product_14.3.jpg'),
(14, 'product_14.4.jpg'),
(15, 'product_15.1.jpg'),
(15, 'product_15.2.jpg'),
(15, 'product_15.3.jpg'),
(15, 'product_15.4.jpg'),
(16, 'product_16.1.jpg'),
(16, 'product_16.2.jpg'),
(16, 'product_16.3.jpg'),
(16, 'product_16.4.jpg'),
(17, 'product_17.1.jpg'),
(17, 'product_17.2.jpg'),
(17, 'product_17.3.jpg'),
(17, 'product_17.4.jpg'),
(18, 'product_18.1.jpg'),
(18, 'product_18.2.jpg'),
(18, 'product_18.3.jpg'),
(18, 'product_18.4.jpg'),
(19, 'product_19.1.jpg'),
(19, 'product_19.2.jpg'),
(19, 'product_19.3.jpg'),
(19, 'product_19.4.jpg'),
(20, 'product_20.1.jpg'),
(20, 'product_20.2.jpg'),
(20, 'product_20.3.jpg'),
(20, 'product_20.4.jpg'),
(21, 'product_21.1.jpg'),
(21, 'product_21.2.jpg'),
(21, 'product_21.3.jpg'),
(21, 'product_21.4.jpg'),
(22, 'product_22.1.jpg'),
(22, 'product_22.2.jpg'),
(22, 'product_22.3.jpg'),
(22, 'product_22.4.jpg'),
(23, 'product_23.1.jpg'),
(23, 'product_23.2.jpg'),
(23, 'product_23.3.jpg'),
(23, 'product_23.4.jpg'),
(24, 'product_24.1.jpg'),
(24, 'product_24.2.jpg'),
(24, 'product_24.3.jpg'),
(24, 'product_24.4.jpg'),
(25, 'product_25.1.jpg'),
(25, 'product_25.2.jpg'),
(25, 'product_25.3.jpg'),
(25, 'product_25.4.jpg'),
(26, 'product_26.1.jpg'),
(26, 'product_26.2.jpg'),
(26, 'product_26.3.jpg'),
(26, 'product_26.4.jpg'),
(27, 'product_27.1.jpg'),
(27, 'product_27.2.jpg'),
(27, 'product_27.3.jpg'),
(27, 'product_27.4.jpg'),
(1, 'aothunnam3.jpg'),
(1, 'aothunnam5.jpg');

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
  `productID` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`productID`, `name`) VALUES
(2, 'XXL'),
(2, ' XL'),
(2, ' L'),
(2, ' M'),
(3, 'XXL'),
(3, ' XL'),
(3, ' L'),
(3, ' M'),
(4, 'XXL'),
(4, ' XL'),
(4, ' L'),
(4, ' M'),
(5, 'XXL'),
(5, ' XL'),
(5, ' L'),
(5, ' M'),
(6, '    M'),
(6, '        L'),
(6, '        XL'),
(6, '    XXL'),
(7, 'XXL'),
(7, ' XL'),
(7, ' L'),
(7, ' M'),
(8, 'XXL'),
(8, ' XL'),
(8, ' L'),
(8, ' M'),
(12, 'XXL'),
(12, ' XL'),
(12, ' L'),
(12, ' M'),
(13, ' M'),
(13, '  L'),
(13, '  XL'),
(13, ' XXL'),
(14, 'XXL'),
(14, ' XL'),
(14, ' L'),
(14, ' M'),
(15, 'XXL'),
(15, ' XL'),
(15, ' L'),
(15, ' M'),
(16, 'XXL'),
(16, ' XL'),
(16, ' L'),
(16, ' M'),
(18, 'XXL'),
(18, ' XL'),
(18, ' L'),
(18, ' M'),
(17, ' M'),
(17, '  L'),
(17, '  XL'),
(17, ' XXL'),
(19, 'XXL'),
(19, ' XL'),
(19, ' L'),
(19, ' M'),
(21, ' M'),
(21, '  L'),
(21, '  XL'),
(21, ' XXL'),
(20, ' M'),
(20, '  L'),
(20, '  XL'),
(20, ' XXL'),
(22, 'XXL'),
(22, ' XL'),
(22, ' L'),
(22, ' M'),
(23, 'XXL'),
(23, ' XL'),
(23, ' L'),
(23, ' M'),
(24, 'XXL'),
(24, ' XL'),
(24, ' L'),
(24, ' M'),
(26, 'XXL'),
(26, ' XL'),
(26, ' L'),
(26, ' M'),
(25, 'XXL'),
(25, ' XL'),
(25, ' L'),
(25, ' M'),
(27, ' XXL'),
(27, '   XL'),
(27, '   L'),
(27, '  M'),
(1, '   XXL'),
(1, '       XL'),
(1, '       M'),
(1, '    L');

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
(2, 'Đã xác nhận'),
(3, 'Đang giao hàng'),
(4, 'Đã giao hàng'),
(5, 'Đã hủy');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `productID` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`productID`, `name`) VALUES
(2, 'Xanh'),
(2, ' Đỏ'),
(2, ' Trắng'),
(2, ' Đen'),
(3, 'Xanh'),
(3, ' Đỏ'),
(3, ' Trắng'),
(3, ' Đen'),
(4, 'Xanh'),
(4, ' Đỏ'),
(4, ' Trắng'),
(4, ' Đen'),
(5, 'Xanh'),
(5, ' Đỏ'),
(5, ' Trắng'),
(5, ' Đen'),
(6, '    Đen'),
(6, '        Trắng'),
(6, '        Đỏ'),
(6, '    Xanh'),
(7, 'Xanh'),
(7, ' Đỏ'),
(7, ' Trắng'),
(7, ' Đen'),
(8, 'Xanh'),
(8, ' Đỏ'),
(8, ' Trắng'),
(8, ' Đen'),
(12, 'Xanh'),
(12, ' Đỏ'),
(12, ' Trắng'),
(12, ' Đen'),
(13, ' Đen'),
(13, '  Trắng'),
(13, '  Đỏ'),
(13, ' Xanh'),
(14, 'Xanh'),
(14, ' Đỏ'),
(14, ' Trắng'),
(14, ' Đen'),
(15, 'Xanh'),
(15, ' Đỏ'),
(15, ' Trắng'),
(15, ' Đen'),
(16, 'Xanh'),
(16, ' Đỏ'),
(16, ' Trắng'),
(16, ' Đen'),
(18, 'Xanh'),
(18, ' Đỏ'),
(18, ' Trắng'),
(18, ' Đen'),
(17, ' Đen'),
(17, '  Trắng'),
(17, '  Đỏ'),
(17, ' Xanh'),
(19, 'Xanh'),
(19, ' Đỏ'),
(19, ' Trắng'),
(19, ' Đen'),
(21, ' Đen'),
(21, '  Trắng'),
(21, '  Đỏ'),
(21, ' Xanh'),
(20, ' Đen'),
(20, '  Trắng'),
(20, '  Đỏ'),
(20, ' Xanh'),
(22, 'Xanh'),
(22, ' Đỏ'),
(22, ' Trắng'),
(22, ' Đen'),
(23, 'Xanh'),
(23, ' Đỏ'),
(23, ' Trắng'),
(23, ' Đen'),
(24, 'Xanh'),
(24, ' Đỏ'),
(24, ' Trắng'),
(24, ' Đen'),
(26, 'Xanh'),
(26, ' Đỏ'),
(26, ' Trắng'),
(26, ' Đen'),
(25, 'Xanh'),
(25, ' Đỏ'),
(25, ' Trắng'),
(25, ' Đen'),
(27, ' Xanh'),
(27, '   Đỏ'),
(27, '   Trắng'),
(27, '  Đen'),
(1, '   Xanh'),
(1, '       Đỏ'),
(1, '       Tím'),
(1, '    Trắng');

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
  `urlAvatar` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `googleId` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `name`, `username`, `gmail`, `phoneNumber`, `gender`, `password`, `address`, `roleID`, `urlAvatar`, `googleId`) VALUES
(1, 'Trần Kim Quốc Thắng', 'Qtee_01', 'Qtee01@gmail.com', '0123456678', 'Nam', 'uajzsaolaicopass', '50 Tạ Quang Bửu, Hai Bà Trưng Hà Nội', 1, 'public/res/img/info/1.jpg', NULL),
(2, 'Nguyễn Văn A', 'Athilams_01', 'Athilams@gmail.com', '01234534523', 'Nam', 'uajzsaolaicoopk', '50 Tạ Quang Bửu, Hai Bà Trưng Hà Nội', 1, NULL, NULL),
(3, 'Nguyễn Văn B1', 'testcase_1', 'Qtee03@gmail.com', '0123456678', 'Nam', 'uajzsaolaicopass', '70 Trường Chinh, Phường Phương Mai, Quận Đống Đa, Hà Nội', 1, NULL, NULL),
(4, 'Nguyễn Át Min', 'admin_01', 'admin1@gmail.com', '012333453', 'Nam', 'uajzsaolaicopass', '79 Tạ Quang Bửu', 2, 'public/res/img/info/4.png', NULL),
(5, 'Đinh Ngọc Huân', 'huanfb_01', 'huan1@gmail.com', '0123456678', 'Nam', 'uajzsaolaicopass', '63A P. Phương Liệt, Phương Liệt, Thanh Xuân, Hà Nội, Việt Nam', 1, NULL, NULL),
(6, 'Lê Doãn B', 'B_fb_01', 'Nam1@gmail.com', '01234566348', 'Nam', 'khcanpassdau', '58b Phương Liệt, Thanh Xuân, Hà Nội, Việt Nam', 1, NULL, NULL),
(7, 'Nguyễn Trọng Q', 'Quannt_01', 'Quannt@gmail.com', '01234583448', 'Nam', 'okaynhakhcanpassdau', '3 Đ. Trường Chinh, Đồng Tâm, Hoàn Kiếm, Hà Nội, Việt Nam', 1, NULL, NULL),
(8, 'Hoàng Anh Túc', 'Tuc_ht01', 'Tucanh@gmail.com', '0194566348', 'Nữ', 'khcanpassdaunhe', '325 P. Trần Đại Nghĩa, Trương Định, Hai Bà Trưng, Hà Nội, Việt Nam', 1, NULL, NULL),
(9, 'Trần Quang H', 'Huy_rf500', 'Huyaf@gmail.com', '0185656348', 'Nam', 'umthikhcopassdau', '14 Nguyễn Đức Cảnh, Tân Mai, Hoàng Mai, Hà Nội, Việt Nam', 1, NULL, NULL),
(10, 'Văn Điệp Phạm', 'Văn Điệp Phạm', 'phamdiepa1k55@gmail.com', NULL, NULL, '', NULL, 1, '', ''),
(11, 'cristiano lingardinho', 'cristiano lingardinho', '', '0123123123', 'Nam', '', 'Số 1, Đại Cồ Việt', 1, '', '');

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
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD KEY `cartID` (`cartID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventID`);

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
  ADD KEY `FK_orderDetail_product` (`productID`),
  ADD KEY `FK_orderDetail_order` (`orderID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `FK_category` (`categoryID`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD KEY `FK_product_image` (`productID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD KEY `FK_productID` (`productID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`statusID`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD KEY `FK_productID2` (`productID`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `statusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `voucherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD CONSTRAINT `cart_product_ibfk_1` FOREIGN KEY (`cartID`) REFERENCES `cart` (`cartID`),
  ADD CONSTRAINT `cart_product_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);

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
  ADD CONSTRAINT `FK_orderDetail_product` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_category` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`);

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `FK_product_image` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);

--
-- Constraints for table `size`
--
ALTER TABLE `size`
  ADD CONSTRAINT `FK_productID` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);

--
-- Constraints for table `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `FK_productID2` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
