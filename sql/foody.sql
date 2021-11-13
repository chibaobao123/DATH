-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2021 at 08:50 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foody`
--

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int(11) NOT NULL,
  `ma_monan` char(225) NOT NULL,
  `ten_monan` varchar(225) NOT NULL,
  `ma_nhahang` char(225) NOT NULL,
  `ten_nhahang` varchar(255) NOT NULL,
  `dia_chi` varchar(225) NOT NULL,
  `so_luong` int(100) NOT NULL,
  `img_monan` char(225) NOT NULL,
  `username` char(225) NOT NULL,
  `ngay_dat` char(225) NOT NULL,
  `gia_tien` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `don_hang`
--

INSERT INTO `don_hang` (`id`, `ma_monan`, `ten_monan`, `ma_nhahang`, `ten_nhahang`, `dia_chi`, `so_luong`, `img_monan`, `username`, `ngay_dat`, `gia_tien`) VALUES
(1, 'bundaumamtom', 'Bún đậu mắm tôm', 'NangMo', 'Nàng Mơ', '852 Quang Trung, Phường 8, Gò Vấp', 1, 'BunDauNangMo.jpg', 'baobaochi', 'Tue Oct 26 2021 14:35:59', 55000);

-- --------------------------------------------------------

--
-- Table structure for table `mon_an`
--

CREATE TABLE `mon_an` (
  `id` int(11) NOT NULL,
  `ma_monan` char(225) NOT NULL,
  `ten` varchar(225) NOT NULL,
  `gia_tien` int(225) NOT NULL,
  `img_monan` char(225) NOT NULL,
  `ma_nhahang` char(225) NOT NULL,
  `dia_chi` varchar(225) NOT NULL,
  `danh_gia` int(1) NOT NULL,
  `the_loai` varchar(225) NOT NULL,
  `da_ban` int(225) NOT NULL,
  `tinh_trang` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mon_an`
--

INSERT INTO `mon_an` (`id`, `ma_monan`, `ten`, `gia_tien`, `img_monan`, `ma_nhahang`, `dia_chi`, `danh_gia`, `the_loai`, `da_ban`, `tinh_trang`) VALUES
(1, 'bundaumamtom', 'Bún đậu mắm tôm', 55000, 'BunDauNangMo.jpg', 'nangMo', '852 Quang Trung, Phường 8, Gò Vấp', 5, 'món ăn, bún đậu mắm tôm', 1213, 1),
(2, 'ColdBrewDauTam', 'Cold brew dâu tằm', 40000, 'coldBrewDauTam.jpg', 'nhapham', '93/30 Hoàng Hoa Thám, quận Bình Thạnh, phường 3', 5, 'quán nước, món nước', 125, 1),
(3, 'phinDrip', 'Phin Drip', 30000, 'phinDrip.jpg', 'nhapham', '93/30 Hoàng Hoa Thám, quận Bình Thạnh, phường 3', 4, 'món nước', 90, 1),
(4, 'traAtiso', 'Trà Atiso', 40000, 'traAtiso.jpg', 'nhapham', '93/30 Hoàng Hoa Thám, quận Bình Thạnh, phường 3', 3, 'món nước ', 32, 1),
(5, 'suaGao', 'Sữa Gạo', 35000, 'suaGao.jpg', 'nhapham', '93/30 Hoàng Hoa Thám, quận Bình Thạnh, phường 3', 4, 'món nước', 21, 1),
(6, 'caPheSua', 'Cà Phê Sữa ', 35000, 'caPheSua.jpg', 'nhapham', '93/30 Hoàng Hoa Thám, quận Bình Thạnh, phường 3', 4, 'món nước ', 45, 1),
(7, 'expresso', 'Exresso', 35000, 'expresso.jpg', 'nhapham', '93/30 Hoàng Hoa Thám, quận Bình Thạnh, phường 3', 3, 'món nước ', 55, 1),
(8, 'latte', 'Latte', 45000, 'latte.jpg', 'nhapham', '93/30 Hoàng Hoa Thám, quận Bình Thạnh, phường 3', 4, 'món nước ', 65, 1),
(9, 'americano', 'Americano', 40000, 'americano.jpg', 'nhapham', '93/30 Hoàng Hoa Thám, quận Bình Thạnh, phường 3', 3, 'món nước ', 23, 1),
(10, 'caPheSuongSam', 'Ca Phê Sương Sâm', 40000, 'capheSuongsam.jpg', 'nhapham', '93/30 Hoàng Hoa Thám, quận Bình Thạnh, phường 3', 4, 'món nước ', 45, 1),
(11, 'suaGaoKemDua', 'Sữa Gạo Kem Dừa ', 45000, 'suagaokemdua.jpg', 'nhapham', '93/30 Hoàng Hoa Thám, quận Bình Thạnh, phường 3', 3, 'món nước', 45, 1),
(12, 'caramelMacchiato', 'Caramel Macchiato', 50000, 'caramelMacchiato.jpg', 'nhapham', '93/30 Hoàng Hoa Thám, quận Bình Thạnh, phường 3', 3, 'món nước', 33, 1),
(13, 'caPheChanh', 'Cà phê chanh', 45000, 'caPheChanh.jpg', 'nhapham', '93/30 Hoàng Hoa Thám, quận Bình Thạnh, phường 3', 4, 'món nước', 45, 1),
(14, 'coldBrewAtiso', 'Cold brew atiso', 45000, 'coldBrewAtiso', 'nhapham', '93/30 Hoàng Hoa Thám, quận Bình Thạnh, phường 3', 4, 'món nước ', 56, 1),
(16, 'caPheChuoi', 'Cà phê chuối', 50000, 'caPheChuoi', 'nhapham', '93/30 Hoàng Hoa Thám, quận Bình Thạnh, phường 3', 3, 'món nước ', 45, 1),
(17, 'suaGaoSuongSam', 'Sữa gạo sương sâm', 40000, 'suaGaoSuongSam.jpg', 'nhapham', '93/30 Hoàng Hoa Thám, quận Bình Thạnh, phường 3', 4, 'món nước ', 45, 1),
(18, 'capucchino', 'Capucchino', 40000, 'capucchino.jpg', 'nhapham', '93/30 Hoàng Hoa Thám, quận Bình Thạnh, phường 3', 4, 'món nước', 89, 1),
(19, 'mocha', 'Mocha', 40000, 'mocha.jpg', 'nhapham', '93/30 Hoàng Hoa Thám, quận Bình Thạnh, phường 3', 4, 'món nước ', 30, 1),
(20, 'tacEp', 'Tắc ép', 40000, 'tacEp.jpg', 'nhapham', '93/30 Hoàng Hoa Thám, quận Bình Thạnh, phường 3', 4, 'món nước ', 67, 1),
(21, 'sinhToChuoiDauTam', 'Sinh tố chuối dâu tằm', 50000, 'sinhToChuoiDauTam.jpg', 'nhapham', '93/30 Hoàng Hoa Thám, quận Bình Thạnh, phường 3', 4, 'món nước, sinh tố', 29, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nha_hang`
--

CREATE TABLE `nha_hang` (
  `id` int(11) NOT NULL,
  `ma_nhahang` char(100) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `sdt` char(11) NOT NULL,
  `dia_chi` varchar(225) NOT NULL,
  `img_nhahang` char(100) NOT NULL,
  `the_loai` varchar(100) NOT NULL,
  `gio_mo_cua` char(100) NOT NULL,
  `gio_dong_cua` char(100) NOT NULL,
  `gia_tien_thap` char(100) NOT NULL,
  `gia_tien_cao` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nha_hang`
--

INSERT INTO `nha_hang` (`id`, `ma_nhahang`, `ten`, `sdt`, `dia_chi`, `img_nhahang`, `the_loai`, `gio_mo_cua`, `gio_dong_cua`, `gia_tien_thap`, `gia_tien_cao`) VALUES
(1, 'ador', 'A\'Dor', '0127557878', '118 Đường 3/2, Quận 10, Phường 12', 'ADor.jpg', 'Quán Nước', '8:00', '22:00', '40.000', '200.000'),
(2, 'nhapham', 'Nhà Phạm', '0127557878', '93/30 Hoàng Hoa Thám, quận Bình Thạnh, phường 3', 'NhaPham.jpg', 'Quán nước', '8:00', '18:00', '30.000', '100.000'),
(3, 'baristaCollective', 'Barista Collective', '0909789255', '41 Hồ Xuân Hương, Quận 3, Phường 6', 'baristaCollective.jpg', 'Quán nước', '7:00', '19:00', '40.000', '300.000'),
(4, 'workshop', 'The Workshop Coffee', '0909789244', '27 Ngô Đức Kế, Bến Nghé, Quận 1', 'workshop.jpg', 'Quán nước', '8:00', '17:00', '50.000', '500.000'),
(5, 'thaiYen', 'Thái Yên', '0989750180', '79/2/1 Phan Kế Bính, Qhường Đa Kao, Quận 1 ', 'ThaiYen.jpg', 'Quán nước ', '8:00', '21:00', '30.000', '100.000'),
(6, '22coffee', 'The 22 Coffee', '', '22 Đường Hoa Cau, Phường 7, Phú Nhuận', '22coffee.jpg', 'Quán nước', '9:00', '21:00', '40.000', '100.000'),
(7, 'nangMo', 'Bún đậu Nàng Mơ', '0127557878', '852 Quang Trung, Phường 8, Gò Vấp', 'nangMo.jpg', 'Quán ăn', '9:00', '21:00', '10.000', '200.000'),
(8, 'busan', 'Busan Korean Food', '0915199288', '5 Lê Văn Duyệt, Phường 3, Bình Thạnh', 'busan.jpg', 'Quán ăn', '10:00', '21:00', '40.000', '300.000'),
(9, 'sumobbq', 'Sumo BBQ', '0127557584', '59B Cao Thắng, Quận 3', 'sumobbq.jpg', 'Quán ăn', '11:00', '22:00', '239.000', '378.000'),
(10, 'kingbbq', 'King BBQ', '0905485613', '205 Phan Xích Long, P. 2, Quận Phú Nhuận', 'kingbbq.jpg', 'Quán ăn', '10:00', '21:15', '150.000', '450.000'),
(11, 'manwah', 'MANWAH ', '02873006383', 'Manwah Lotte Phan Văn Trị - Lô 1F2 Tầng 1, TTTM Lotte Mart Gò Vấp, Số 18 Phan Văn Trị, Phường 10, Quận Gò Vấp', 'manwah.jpg', 'Quán ăn', '10:00', '22:00', '150.000', '500.000'),
(12, 'thuyenvien', 'Thuyền Viên', '02838432643', '11-13 Nguyễn Văn Đậu, Phường 5, Phú Nhuận, Thành phố Hồ Chí Minh, Việt Nam', 'thuyenVien.jpg', 'quán ăn, quán chay', '7:00', '22:00', '20000', '200000');

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `username` char(100) NOT NULL,
  `email` char(100) NOT NULL,
  `sdt` char(11) NOT NULL,
  `password` char(100) NOT NULL,
  `rank` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tai_khoan`
--

INSERT INTO `tai_khoan` (`id`, `ten`, `username`, `email`, `sdt`, `password`, `rank`) VALUES
(2, 'Huynh Trinh Thai Long', 'thailong', 'thailong.py2014@gmail.com', '0503154786', 'e10adc3949ba59abbe56e057f20f883e', 1),
(3, 'Chí Bảo Bảo', 'baobaochi', 'baobaochi631999@gmail.com', '0703934583', 'e10adc3949ba59abbe56e057f20f883e', 1),
(4, 'Phạm Nguyễn Minh Hiếu', 'hieuhieu', 'hieuhieu@gmail.com', '0132654782', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `thong_tin_khach_hang`
--

CREATE TABLE `thong_tin_khach_hang` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `email` char(100) NOT NULL,
  `sdt` char(11) NOT NULL,
  `sex` varchar(4) NOT NULL,
  `dia_chi` varchar(100) NOT NULL,
  `avatar` char(100) NOT NULL,
  `rank` int(1) NOT NULL,
  `diem_tich_luy` int(100) NOT NULL,
  `so_don` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thong_tin_khach_hang`
--

INSERT INTO `thong_tin_khach_hang` (`id`, `ten`, `email`, `sdt`, `sex`, `dia_chi`, `avatar`, `rank`, `diem_tich_luy`, `so_don`) VALUES
(1, 'Huynh Trinh Thai Long', 'thailong.py2014@gmail.com', '0503154786', '', '100 đường số 3, quận Bình thạnh, phường 3', '', 1, 0, 0),
(2, 'Chí Bảo Bảo', 'baobaochi631999@gmail.com', '0703934583', 'nam', '28 đường số 2, quận Gò Vâp, phường 3', 'IMG-618a23be5650e5.02531344.jpg', 1, 0, 0),
(3, 'Phạm Nguyễn Minh Hiếu', 'hieuhieu@gmail.com', '0132654782', '', '123 Kha Vạn Cân, quận Thủ Đức, phường Linh Đông', '', 1, 0, 0),
(4, 'Ngo Phuoc Loc', 'phuocloc@gmail.com', '0503154755', '', '100 Phan Xích Long, quận Phú Nhuận, phường 3', '', 1, 0, 0),
(5, 'Ngo Phuoc Loc', 'phuocloc@gmail.com', '0503154755', '', '100 Phan Xích Long, quận Phú Nhuận, phường 3', '', 1, 0, 0),
(6, 'Ngo Phuoc Loc', 'phuocloc@gmail.com', '0503154755', '', '100 Phan Xich Long, quận Phú Nhuận, phường 3', '', 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mon_an`
--
ALTER TABLE `mon_an`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nha_hang`
--
ALTER TABLE `nha_hang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thong_tin_khach_hang`
--
ALTER TABLE `thong_tin_khach_hang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mon_an`
--
ALTER TABLE `mon_an`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `nha_hang`
--
ALTER TABLE `nha_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `thong_tin_khach_hang`
--
ALTER TABLE `thong_tin_khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
