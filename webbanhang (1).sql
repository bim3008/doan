-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2020 at 12:44 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webbanhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminPass`, `adminEmail`) VALUES
(1, 'LeTruongDinh', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'bim3008@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(4, 'Iphone'),
(5, 'Samsung'),
(6, 'Huawei'),
(7, 'Oppo'),
(8, 'Ipad'),
(9, 'Casio'),
(10, 'Macbook'),
(11, 'Rolex'),
(12, 'Dell');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `sessionId` varchar(255) NOT NULL,
  `price` bigint(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image_cart` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(3, 'Điện Thoại'),
(4, 'Ipad'),
(5, 'Đồng hồ'),
(6, 'Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `customer_id`, `productId`, `comment`, `date`) VALUES
(1, 1, 12, 'OPPO A31 với ba camera mang đến cho bạn nhiều cách có được những tấm hình hoàn hảo hơn bao giờ hết. Camera chính 12MP giúp bạn luôn giữ được độ sắc nét trong những bức ảnh lớn, trong khi ống kính macro cho phép bạn phóng to những chi tiết nhỏ nhất. Thêm vào đó, camera tạo độ sâu mang đến những bức chân dung tuyệt vời hơn.\r\n\r\nOPPO A31 với ba camera mang đến cho bạn nhiều cách có được những tấm hình hoàn hảo hơn bao giờ hết. Camera chính 12MP giúp bạn luôn giữ được độ sắc nét trong những bức ảnh lớn, trong khi ống kính macro cho phép bạn phóng to những chi tiết nhỏ nhất. Thêm vào đó, camera tạo độ sâu mang đến những bức chân dung tuyệt vời hơn.\r\n\r\nOPPO A31 với ba camera mang đến cho bạn nhiều cách có được những tấm hình hoàn hảo hơn bao giờ hết. Camera chính 12MP giúp bạn luôn giữ được độ sắc nét trong những bức ảnh lớn, trong khi ống kính macro cho phép bạn phóng to những chi tiết nhỏ nhất. Thêm vào đó, camera tạo độ sâu mang đến những bức chân dung tuyệt vời hơn.\r\n\r\n', '2020-05-17 14:05:17'),
(2, 1, 10, 'Sản phẩm tuyệt vời ông mặt trời !!!!', '2020-05-17 15:14:56'),
(4, 3, 10, 'Sản phẩm không tuyệt vời đâu mọi người', '2020-05-17 15:23:52'),
(5, 1, 41, 'Laptop này đỉnh lắm mọi người ơi\r\n', '2020-05-19 09:45:56'),
(6, 1, 44, 'Tuyệt vời ông mặt trời ...!!!\r\n', '2020-05-19 10:24:14'),
(7, 4, 10, 'Đừng nghe lời thằng \"Lữ Bố\" nó là thằng vì gái giết cha đó mọi người.', '2020-05-19 10:29:17'),
(8, 180, 12, 'Sản phẩm tốt', '2020-06-07 12:29:22'),
(9, 180, 12, 'San pham tuyet voi ong mat troi. 5 sao cho chat luong\r\n', '2020-06-30 17:43:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` bigint(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_cs` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `address_cs` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `username`, `password_cs`, `email`, `fullname`, `address_cs`, `phone`) VALUES
(180, 'admin', '123', 'bimmm3008@gmail.com', 'Lê Trương Định', '26 Lê Văn Việt', '0364764002'),
(151570279824292, '', '', 'bettereveryday3008@gmail.com', 'Trương Định', 'Thành phố Hồ Chí Minh', '0902412091');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_oder`
--

CREATE TABLE `tbl_oder` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `image_order` varchar(255) NOT NULL,
  `status_order` int(11) DEFAULT 0 COMMENT 'Status = 0 : chưa xử lý\r\nstatus = 1 : đã xử lý',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_oder`
--

INSERT INTO `tbl_oder` (`id`, `productId`, `productName`, `customer_id`, `quantity`, `price`, `image_order`, `status_order`, `date`) VALUES
(63, 10, 'Iphone 11 Pro Max', 180, 1, 20000000, 'ttmzgeevfwhyy.jpg', 0, '2020-06-30 08:06:00'),
(66, 10, 'Iphone 11 Pro Max', 180, 1, 20000000, 'ttmzgeevfwhyy.jpg', 0, '2020-06-30 08:12:37'),
(72, 10, 'Iphone 11 Pro Max', 151570279824292, 1, 20000000, 'ttmzgeevfwhyy.jpg', 0, '2020-06-30 10:08:45'),
(73, 11, 'Huawai Nova 3i', 180, 1, 5000000, '636675937265892591_nova3i-XANH-1.jpg', 0, '2020-06-30 10:29:21'),
(74, 46, 'Samsung 8plus', 180, 1, 20000, 'samsung2.jpg', 0, '2020-06-30 10:35:43'),
(75, 12, 'Oppo A31', 180, 1, 15000000, 'a31.png', 0, '2020-06-30 10:36:45'),
(76, 11, 'Huawai Nova 3i', 151570279824292, 1, 5000000, '636675937265892591_nova3i-XANH-1.jpg', 0, '2020-06-30 10:39:18'),
(77, 10, 'Iphone 11 Pro Max', 151570279824292, 1, 20000000, 'ttmzgeevfwhyy.jpg', 0, '2020-06-30 10:39:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `description_product` text NOT NULL,
  `price` bigint(255) NOT NULL,
  `type_product` int(11) NOT NULL,
  `image_product` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `catId`, `brandId`, `description_product`, `price`, `type_product`, `image_product`, `productName`) VALUES
(7, 3, 4, '<p>Iphone X giảm gi&aacute; mạnh sau dich.</p>', 10000000, 1, 'iphone-x_4vez-cg.png', 'Iphone X'),
(8, 3, 5, '<p>Sam Sung S20&nbsp; đỉnh cao của c&ocirc;ng nghệ.</p>', 20000000, 0, 'samsung-galaxy-a71-a715-101579245937.jpg', 'Samsung S20'),
(9, 3, 7, '<p>Oppo đỉnh cao chụp h&igrave;nh</p>', 3000000, 0, '10043931_DTDD_OPPO_CPH1933-A5-2020-128GB-DEN_01.jpg', 'Oppo A1'),
(10, 3, 4, '<p>Iphone 11 Pro Max l&agrave; sự lựa chọn ho&agrave;n hảo cho những d&acirc;n chơi ngu lấy số.</p>', 20000000, 1, 'ttmzgeevfwhyy.jpg', 'Iphone 11 Pro Max'),
(11, 3, 6, '<p><span>Kh&aacute;ch h&agrave;ng c&oacute; nhu cầu mua Huawei Nova 3i c&oacute; cơ hội nhận được nhiều qu&agrave; tặng hấp dẫn</span></p>', 5000000, 1, '636675937265892591_nova3i-XANH-1.jpg', 'Huawai Nova 3i'),
(12, 3, 7, '<p><span>OPPO A31 với ba camera mang đến cho bạn nhiều c&aacute;ch c&oacute; được những tấm h&igrave;nh ho&agrave;n hảo hơn bao giờ hết. Camera ch&iacute;nh 12MP gi&uacute;p bạn lu&ocirc;n giữ được độ sắc n&eacute;t trong những bức ảnh lớn, trong khi ống k&iacute;nh macro cho ph&eacute;p bạn ph&oacute;ng to những chi tiết nhỏ nhất. Th&ecirc;m v&agrave;o đ&oacute;, camera tạo độ s&acirc;u mang đến những bức ch&acirc;n dung tuyệt vời hơn.</span></p>', 15000000, 1, 'a31.png', 'Oppo A31'),
(14, 3, 4, '<p>iPhone 8&nbsp;và iPhone 8 Plus là b&ocirc;̣ đ&ocirc;i đi&ecirc;̣n thoại cao c&acirc;́p, sở hữu thi&ecirc;́t k&ecirc;́ sang trọng đẳng c&acirc;́p đ&ecirc;́n từ thương hi&ecirc;̣u Apple. Đ&acirc;y là sản ph&acirc;̉m mang đ&ecirc;́n những trải nghi&ecirc;̣m tuy&ecirc;̣t vời khi sở hữu hàng loạt tính năng t&ocirc;́i t&acirc;n, hi&ecirc;̣u năng mạnh mẽ nhưng mức giá lại khá rẻ.&nbsp;</p>', 16000000, 0, 'iphone-8-plus1-13.jpg', 'Iphone 8 Plus'),
(16, 3, 5, '<p><span>iPhone 8&nbsp;và iPhone 8 Plus là b&ocirc;̣ đ&ocirc;i đi&ecirc;̣n thoại cao c&acirc;́p, sở hữu thi&ecirc;́t k&ecirc;́ sang trọng đẳng c&acirc;́p đ&ecirc;́n từ thương hi&ecirc;̣u Apple. Đ&acirc;y là sản ph&acirc;̉m mang đ&ecirc;́n những trải nghi&ecirc;̣m tuy&ecirc;̣t vời khi sở hữu hàng loạt tính năng t&ocirc;́i t&acirc;n, hi&ecirc;̣u năng mạnh mẽ nhưng mức giá lại khá rẻ.&nbsp;</span></p>', 7200000, 0, 'samsunga51.jpg', 'Samsung A51'),
(17, 4, 8, '<p><span>M&agrave;n h&igrave;nh Liquid Retina tr&agrave;n cạnh kh&ocirc;ng chỉ tuyệt đẹp, đầy m&ecirc; hoặc m&agrave; c&ograve;n mang tr&ecirc;n m&igrave;nh v&ocirc; v&agrave;n c&ocirc;ng nghệ ti&ecirc;n tiến. C&ocirc;ng nghệ ProMotion với tần số qu&eacute;t 120Hz gi&uacute;p bạn thao t&aacute;c mượt m&agrave; hơn bao giờ hết; c&ocirc;ng nghệ TrueTone mang đến m&agrave;u sắc lu&ocirc;n ch&iacute;nh x&aacute;c trong mọi điều kiện &aacute;nh s&aacute;ng. Những c&ocirc;ng nghệ h&agrave;ng đầu v&agrave; chế t&aacute;c tuyệt vời gi&uacute;p iPad Pro 2020 sở hữu m&agrave;n h&igrave;nh di động xuất sắc nhất thế giới.</span></p>', 11000000, 1, 'ipad.jpg', 'Ipad 11Pro Max'),
(18, 3, 4, '<p>Trước khi ra mắt, iPhone SE mới được đồn đại rằng sẽ sở hữu thiết kế tương tự như iPhone 8. V&agrave; quả thực iPhone SE mới c&oacute; thiết kế ch&iacute;nh x&aacute;c như vậy, đ&acirc;y giống như một chiếc iPhone 8 được n&acirc;ng cấp cấu h&igrave;nh b&ecirc;n trong hơn l&agrave; iPhone SE thế hệ tiếp theo.</p>\r\n<p>Theo những trải nghiệm ban đầu cho thấy, iPhone SE mới cho cảm gi&aacute;c cầm nắm nhỏ gọn kh&ocirc;ng kh&aacute;c g&igrave; iPhone 7 hay iPhone 8. Mặc d&ugrave; c&oacute; thiết kế cũ kh&ocirc;ng c&oacute; đột ph&aacute; g&igrave; nhưng iPhone SE mới đem đến bao ho&agrave;i niệm cho người d&ugrave;ng iPhone.</p>\r\n<p>Đặc biệt, thiết kế cũ sẽ gi&uacute;p Touch ID quay trở lại tr&ecirc;n iPhone. Apple n&oacute;i rằng đ&acirc;y l&agrave; Touch ID thế hệ 2 n&ecirc;n sẽ gi&uacute;p mở kh&oacute;a m&agrave;n h&igrave;nh nhanh hơn. Nhất l&agrave; trong m&ugrave;a dịch như thế n&agrave;y, người d&ugrave;ng ngần ngại mở khẩu trang để d&ugrave;ng Face ID th&igrave; Touch ID c&agrave;ng qu&yacute; gi&aacute; hơn bao giờ.</p>', 20000000, 0, 'se.jpg', 'Iphone SE 2020'),
(19, 5, 9, '<p><span>Trước khi ra mắt, iPhone SE mới được đồn đại rằng sẽ sở hữu thiết kế tương tự như iPhone 8. V&agrave; quả thực iPhone SE mới c&oacute; thiết kế ch&iacute;nh x&aacute;c như vậy, đ&acirc;y giống như một chiếc iPhone 8 được n&acirc;ng cấp cấu h&igrave;nh b&ecirc;n trong hơn l&agrave; iPhone SE thế hệ tiếp theo.</span></p>', 500000, 0, 'download.png', 'Đồng hồ Casio'),
(20, 6, 10, '<p><span>MacBook l&agrave; một m&aacute;y t&iacute;nh x&aacute;ch tay Macintosh đ&atilde; ngừng sản xuất được ph&aacute;t triển v&agrave; b&aacute;n bởi Apple Inc. Trong d&ograve;ng sản phẩm của Apple, n&oacute; được coi l&agrave; một thiết bị cao cấp hơn so với MacBook Air thế hệ thứ hai v&agrave; nằm dưới dải hiệu suất MacBook Pro</span></p>', 50000000, 0, 'shopping (1).jpg', 'Macbook Max Pro'),
(21, 3, 4, '<ul>\r\n<li>Trả g&oacute;p 1% chỉ từ 1,999,000đ&nbsp;<a href=\"https://fptshop.com.vn/tin-tuc/tin-khuyen-mai/mua-iphone-chinh-hang-tha-ga-tu-tu-ma-tra-tai-fpt-shop-113179\" target=\"_blank\">Xem chi tiết</a></li>\r\n</ul>\r\n<ul>\r\n<li>Trả g&oacute;p 0%</li>\r\n</ul>\r\n<ul>\r\n<li>Tặng g&oacute;i Bảo h&agrave;nh 3 năm&nbsp;<a href=\"https://fptshop.com.vn/tin-tuc/tin-khuyen-mai/fpt-shop-tang-3-nam-bao-hanh-cho-iphone-11-series-chinh-hang-119602\" target=\"_blank\">Xem chi tiết</a></li>\r\n</ul>\r\n<ul>\r\n<li>Thu cũ đổi mới tiết kiệm đến 14 triệu&nbsp;<a href=\"https://fptshop.com.vn/ctkm/len-doi-iphone\" target=\"_blank\">Xem chi tiết</a>&nbsp;+ Trợ gi&aacute; th&ecirc;m 2,000,000 &aacute;p dụng thu cũ đổi mới trả thẳng</li>\r\n</ul>\r\n<p class=\"tkmspbb\">Kh&aacute;ch h&agrave;ng được khuyến mại th&ecirc;m:</p>\r\n<ul>\r\n<li>Tặng PMH 500,000đ mua Airpods</li>\r\n</ul>\r\n<ul>\r\n<li>Giảm th&ecirc;m 200,000đ khi thanh to&aacute;n 100% gi&aacute; trị đơn h&agrave;ng qua VNPay-QR&nbsp;<a href=\"https://fptshop.com.vn/tin-tuc/tin-khuyen-mai/khach-hang-mua-iphone-tai-fpt-shop-duoc-giam-them-200-000-dong-khi-thanh-toan-bang-vnpay-qr-119600\" target=\"_blank\">Xem chi tiết</a></li>\r\n</ul>\r\n<ul>\r\n<li>Tặng 1 chai gel rửa tay kh&ocirc; 120 ml trị gi&aacute; 59,000đ khi mua Online</li>\r\n</ul>', 19000000, 0, 'iphone11.jpg', 'Iphone 11'),
(22, 3, 4, '<p><strong><span><span><a href=\"https://fptshop.com.vn/dien-thoai/iphone-7\" target=\"_blank\">iPhone 7</a>&nbsp;dường như đ&atilde; gay sốt ngay từ khi ra mắt bởi những n&acirc;ng cấp đ&aacute;ng gi&aacute; về tốc độ xử l&yacute;, khả năng chụp ảnh, t&iacute;nh năng chống nước, bụi hiện đại... iPhone 7 đ&atilde; trở th&agrave;nh ước mơ của rất nhiều người đam m&ecirc; c&ocirc;ng nghệ, đặc biệt l&agrave; với phi&ecirc;n bản dung lượng 32 GB c&oacute; gi&aacute; th&agrave;nh hợp l&yacute; hơn cả.</span></span></strong></p>', 7990000, 0, 'iphone7.jpg', 'Iphone 7 '),
(23, 4, 8, '<p><span>&ndash; CPU: Apple A12Z Bionic, Octa-core , iPadOS 14</span><br /><span>&ndash; RAM : 6GB</span><br /><span>&ndash; M&agrave;n h&igrave;nh: 1668 x 2388 pixels, 265 ppi ,120hz, True Tone</span><br /><span>&ndash; Bộ nhớ trong: 1 TB / 512GB / 256GB / 128GB</span><br /><span>&ndash; Camera sau: 12 MP &amp; 10MP,&nbsp; LED Flash, LiDAR scanner.</span><br /><span>&ndash; Camera trước: 7 MP, F2.2, 1080p@30fps</span><br /><span>&ndash; Wi-Fi ac, Bluetooth&nbsp;v5.0</span><br /><span>&ndash; K&iacute;ch thước: 247.6 x 178.5 x 5,9 mm</span><br /><span>&ndash; Khối lượng&nbsp;: 471g</span><br /><span>&ndash; Smart Connector, hỗ trợ b&agrave;n ph&iacute;m rời, Apple Pencil 2, 3.5mm</span><br /><span>&ndash; 4 loa ngo&agrave;i, 2 microphone</span><br /><span>&ndash; Pin: 10 tiếng.</span></p>', 19000000, 0, 'ipad 11 pro max.png', 'Ipad 11 Pro Max'),
(24, 4, 8, '<p><span>B&agrave;n ph&iacute;m Magic ch&iacute;nh l&agrave; phụ kiện kh&ocirc;ng thể thiếu d&agrave;nh cho M&aacute;y t&iacute;nh bảng iPad Pro 2020. B&agrave;n ph&iacute;m mang đến khả năng g&otilde; tốt nhất từng c&oacute; tr&ecirc;n iPad, b&agrave;n di chuột mở ra những thao t&aacute;c mới để l&agrave;m việc với iPadOS, cổng USB C để kết nối cổng sạc v&agrave; miếng da bảo vệ trước - sau. K&egrave;m với đ&oacute;&nbsp;</span><a href=\"https://24hstore.vn/huong-dan-ky-thuat/cam-bien-anh-sang-chuc-nang-bi-bo-quen-n2714\" target=\"_blank\">&aacute;nh s&aacute;ng</a><span>&nbsp;phản quang dường như gi&uacute;p b&agrave;n ph&iacute;m c&agrave;ng trở n&ecirc;n đẹp ho&agrave;n mỹ hơn.</span></p>', 8990000, 0, 'ipad keypoad.jpg', 'Ipad Keyboard'),
(25, 4, 8, '<p><span>M&agrave;n h&igrave;nh: Liquid Retina, 11&Prime;</span><br /><span>Hệ điều h&agrave;nh: iOS 12</span><br /><span>CPU: Apple A12X Bionic 64-bit</span><br /><span>RAM: 4 GB hoặc 6 GB (1TB)</span><br /><span>Bộ nhớ trong: 64, 256, 512 GB, 1TB</span><br /><span>Camera sau: 12 MP</span><br /><span>Camera trước: 7 MP</span><br /><span>Kết nối mạng: WiFi hoặc WiFi + Cellular</span><br /><span>Đ&agrave;m thoại: FaceTime</span><br /><span>Trọng lượng: 11&Prime;: 468 g</span></p>', 17000000, 0, 'ipad new.jpg', 'Ipad 2020'),
(26, 4, 8, '<p><span>M&agrave;n h&igrave;nh: Liquid Retina, 11&Prime;</span><br /><span>Hệ điều h&agrave;nh: iOS 12</span><br /><span>CPU: Apple A12X Bionic 64-bit</span><br /><span>RAM: 4 GB hoặc 6 GB (1TB)</span><br /><span>Bộ nhớ trong: 64, 256, 512 GB, 1TB</span><br /><span>Camera sau: 12 MP</span><br /><span>Camera trước: 7 MP</span><br /><span>Kết nối mạng: WiFi hoặc WiFi + Cellular</span><br /><span>Đ&agrave;m thoại: FaceTime</span><br /><span>Trọng lượng: 11&Prime;: 468 g</span></p>', 17000000, 0, 'ipad new.jpg', 'Ipad 2020'),
(27, 5, 11, '<p><span>T&igrave;nh trạng : Model 69178 sản xuất thập ni&ecirc;n 90, đồng hồ c&ograve;n rất cứng c&aacute;p nguy&ecirc;n zin Rolex Thụy sĩ.✔ Vỏ: V&agrave;ng đ&uacute;c 18k, Niềng: V&agrave;ng đ&uacute;c ...</span></p>', 100000000, 0, 'rulex.png', 'Đồng hồ Rulex'),
(28, 5, 11, '<p><span>Rolex Datejust&nbsp;36 128238&nbsp;</span><span>Mặt Số Ombre Xanh L&aacute;</span><span>&nbsp;</span><span>c&oacute; khả năng chuyển sắc tạo n&ecirc;n một cặp đ&ocirc;i v&ocirc; c&ugrave;ng ăn &yacute; v&agrave; ấn tượng. Với k&iacute;ch thước 36mm v&agrave; một d&acirc;y đeo từ v&agrave;ng v&agrave;ng 18k độc quyền Rolex, Day-Date 128238 mang đậm m&agrave;u sắc phi giới t&iacute;nh. Nếu tr&ecirc;n tay nam giới,&nbsp;Rolex Day-Date 128238&nbsp;sẽ củng cố sự quyền lực v&agrave; đẳng cấp, c&ograve;n nếu tr&ecirc;n tay c&aacute;c qu&yacute; c&ocirc;, chiếc đồng hồ&nbsp;n&agrave;y sẽ tạo n&ecirc;n vẻ c&aacute; t&iacute;nh, m&agrave; đặc biệt cuốn h&uacute;t.</span></p>', 750000000, 0, 'rulex 1.png', 'Rolex Datejust'),
(29, 5, 11, '<p><span>Chiếc đồng hồ Rolex Pearlmaster 34 81158 Mặt Số Vỏ Trai Trắng được chế t&aacute;c từ chất liệu v&agrave;ng 18ct, bộ vỏ Oyster đường k&iacute;nh 34 mm, c&oacute; mức&nbsp;chống nước l&ecirc;n tới 100m. Điều đ&aacute;ng ch&uacute; &yacute; nhất l&agrave; phần bezel v&agrave; tai c&agrave;ng được&nbsp;đ&iacute;nh những vi&ecirc;n&nbsp;kim&nbsp;cương cao cấp bậc nhất của Rolex tạo hiệu&nbsp;ứng&nbsp;bắt s&aacute;ng cực đẹp, l&agrave;m&nbsp;t&ocirc;n l&ecirc;n gi&aacute; trị thẩm mĩ cho chủ sở hữu. Tổng thể chiếc đồng hồ rất đơn giản nhưng kh&ocirc;ng k&eacute;m phần xa hoa v&agrave; lộng lẫy.</span></p>', 200000000, 0, 'rulex2.png', 'ROLEX PEARLMASTER '),
(30, 5, 11, '<p><span>Nếu bạn đang muốn t&igrave;m kiếm một mẫu đồng hồ nam t&iacute;nh, biểu tượng của tốc độ v&agrave; sự xa xỉ đi k&egrave;m với đẳng cấp sang trọng&nbsp; th&igrave; Rolex Cosmograph Daytona ch&iacute;nh l&agrave; lựa chọn chuẩn x&aacute;c d&agrave;nh cho bạn.</span></p>', 730000000, 0, 'ROLEX COSMOGRAPH.jpg', 'ROLEX COSMOGRAPH '),
(31, 5, 9, '<p><span>Mẫu đồng hồ Casio A168WEGB-1BDF nổi bật phần vỏ viền ngo&agrave;i bao phủ t&ocirc;ng m&agrave;u v&agrave;ng sang trọng nổi bật, kết hợp c&ugrave;ng mẫu d&acirc;y đeo kim loại m&agrave;u đen đầy thời trang c&aacute; t&iacute;nh.</span></p>', 2300000, 0, 'casio1jpg.jpg', 'Casio Học Sinh'),
(32, 5, 9, '<p><span>Mẫu đồng hồ Casio A168WEGB-1BDF nổi bật phần vỏ viền ngo&agrave;i bao phủ t&ocirc;ng m&agrave;u v&agrave;ng sang trọng nổi bật, kết hợp c&ugrave;ng mẫu d&acirc;y đeo kim loại m&agrave;u đen đầy thời trang c&aacute; t&iacute;nh.</span></p>', 1200000, 0, 'casio2.jpg', 'Casio Điện tử'),
(33, 5, 9, '<p><span>Mẫu đồng hồ Casio A168WEGB-1BDF nổi bật phần vỏ viền ngo&agrave;i bao phủ t&ocirc;ng m&agrave;u v&agrave;ng sang trọng nổi bật, kết hợp c&ugrave;ng mẫu d&acirc;y đeo kim loại m&agrave;u đen đầy thời trang c&aacute; t&iacute;nh.</span></p>', 1990000, 0, 'casio3.jpg', 'Casio A390'),
(37, 6, 10, '<p>MacBook l&agrave; một m&aacute;y t&iacute;nh x&aacute;ch tay Macintosh đ&atilde; ngừng sản xuất được ph&aacute;t triển v&agrave; b&aacute;n bởi Apple Inc. Trong d&ograve;ng sản phẩm của Apple, n&oacute; được coi l&agrave; một thiết bị cao cấp hơn so với MacBook Air thế hệ thứ hai v&agrave; nằm dưới dải hiệu suất MacBook Pro</p>', 21000000, 0, 'macbook1.png', 'Macbook Air 2020'),
(38, 6, 10, '<p>MacBook l&agrave; một m&aacute;y t&iacute;nh x&aacute;ch tay Macintosh đ&atilde; ngừng sản xuất được ph&aacute;t triển v&agrave; b&aacute;n bởi Apple Inc. Trong d&ograve;ng sản phẩm của Apple, n&oacute; được coi l&agrave; một thiết bị cao cấp hơn so với MacBook Air thế hệ thứ hai v&agrave; nằm dưới dải hiệu suất MacBook Pro</p>', 20000000, 0, 'macbook2.png', 'Macbook Air 2019'),
(40, 6, 12, '<p><span>&ndash; CPU: 1.6GHz Intel Core i5 Dual-Core (Broadwell)</span><br /><span>&ndash; Dung lượng ổ cứng SSD: 128GB</span><br /><span>&ndash; M&agrave;n h&igrave;nh: 11inch</span><br /><span>&ndash; RAM: 4GB 1600MHz LPDDR3</span><br /><span>&ndash; M&agrave;n h&igrave;nh: 11&Prime; LED-Backlit Glossy</span></p>', 17000000, 0, 'dell2.jpg', 'Dell Inspro 123'),
(41, 6, 12, '<p><span>&ndash; CPU: 1.6GHz Intel Core i5 Dual-Core (Broadwell)</span><br /><span>&ndash; Dung lượng ổ cứng SSD: 128GB</span><br /><span>&ndash; M&agrave;n h&igrave;nh: 11inch</span><br /><span>&ndash; RAM: 4GB 1600MHz LPDDR3</span><br /><span>&ndash; M&agrave;n h&igrave;nh: 11&Prime; LED-Backlit Glossy</span></p>', 19900000, 0, 'delljpg.jpg', 'Dell Inspro 321'),
(42, 6, 12, '<p><span>&ndash; CPU: 1.6GHz Intel Core i5 Dual-Core (Broadwell)</span><br /><span>&ndash; Dung lượng ổ cứng SSD: 128GB</span><br /><span>&ndash; M&agrave;n h&igrave;nh: 11inch</span><br /><span>&ndash; RAM: 4GB 1600MHz LPDDR3</span><br /><span>&ndash; M&agrave;n h&igrave;nh: 11&Prime; LED-Backlit Glossy</span></p>', 21500000, 0, 'dell3.jpg', 'Dell Inspro 789'),
(43, 6, 10, '<p>MacBook l&agrave; một m&aacute;y t&iacute;nh x&aacute;ch tay Macintosh đ&atilde; ngừng sản xuất được ph&aacute;t triển v&agrave; b&aacute;n bởi Apple Inc. Trong d&ograve;ng sản phẩm của Apple, n&oacute; được coi l&agrave; một thiết bị cao cấp hơn so với MacBook Air thế hệ thứ hai v&agrave; nằm dưới dải hiệu suất MacBook Pro</p>', 18800000, 0, 'dell3.jpg', 'Macbook Air 2020 News'),
(44, 6, 12, '<p>MacBook l&agrave; một m&aacute;y t&iacute;nh x&aacute;ch tay Macintosh đ&atilde; ngừng sản xuất được ph&aacute;t triển v&agrave; b&aacute;n bởi Apple Inc. Trong d&ograve;ng sản phẩm của Apple, n&oacute; được coi l&agrave; một thiết bị cao cấp hơn so với MacBook Air thế hệ thứ hai v&agrave; nằm dưới dải hiệu suất MacBook Pro</p>', 26500000, 0, 'dell4.jpg', 'DELL XPS  9380'),
(45, 3, 5, '<ul>\r\n<li>Trả g&oacute;p 0% qua&nbsp;<span>thẻ t&iacute;n dụng</span>&nbsp;(kh&ocirc;ng trả trước, trả h&agrave;ng th&aacute;ng chỉ&nbsp;<span>1.098.334&nbsp;₫</span>) hoặc qua&nbsp;<span>Paylater</span>&nbsp;(Trả trước&nbsp;<span>1.977.000&nbsp;₫</span>, trả h&agrave;ng th&aacute;ng chỉ&nbsp;<span>1.537.667&nbsp;₫</span>).</li>\r\n<li>Hoặc Trả g&oacute;p c&oacute; l&atilde;i suất với trả trước&nbsp;<span>659.000&nbsp;₫</span>, trả h&agrave;ng th&aacute;ng&nbsp;<span>997.397&nbsp;₫</span>&nbsp;qua nh&agrave; t&agrave;i ch&iacute;nh&nbsp;<span>Home Credit, FE Credit, HD Saison</span>&nbsp;(chỉ cần CMND + GPLX)</li>\r\n<li>Hoặc trả g&oacute;p - trả trước 0đ qua nh&agrave; t&agrave;i ch&iacute;nh&nbsp;<span>FE Credit</span>&nbsp;(Thủ tục chỉ cần CMND + Hộ khẩu )</li>\r\n</ul>', 20000000, 0, 'samsung1.jpg', 'Samsung S20s'),
(46, 3, 5, '<ul>\r\n<li>Trả g&oacute;p 0% qua&nbsp;<span>thẻ t&iacute;n dụng</span>&nbsp;(kh&ocirc;ng trả trước, trả h&agrave;ng th&aacute;ng chỉ&nbsp;<span>1.098.334&nbsp;₫</span>) hoặc qua&nbsp;<span>Paylater</span>&nbsp;(Trả trước&nbsp;<span>1.977.000&nbsp;₫</span>, trả h&agrave;ng th&aacute;ng chỉ&nbsp;<span>1.537.667&nbsp;₫</span>).</li>\r\n<li>Hoặc Trả g&oacute;p c&oacute; l&atilde;i suất với trả trước&nbsp;<span>659.000&nbsp;₫</span>, trả h&agrave;ng th&aacute;ng&nbsp;<span>997.397&nbsp;₫</span>&nbsp;qua nh&agrave; t&agrave;i ch&iacute;nh&nbsp;<span>Home Credit, FE Credit, HD Saison</span>&nbsp;(chỉ cần CMND + GPLX)</li>\r\n<li>Hoặc trả g&oacute;p - trả trước 0đ qua nh&agrave; t&agrave;i ch&iacute;nh&nbsp;<span>FE Credit</span>&nbsp;(Thủ tục chỉ cần CMND + Hộ khẩu )</li>\r\n</ul>', 20000, 0, 'samsung2.jpg', 'Samsung 8plus');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_oder`
--
ALTER TABLE `tbl_oder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=429;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151570279824293;

--
-- AUTO_INCREMENT for table `tbl_oder`
--
ALTER TABLE `tbl_oder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
