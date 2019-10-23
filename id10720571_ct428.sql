-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2019 at 05:26 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `id10720571_ct428`
--

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE IF NOT EXISTS `sanpham` (
  `idsp` int(11) NOT NULL AUTO_INCREMENT,
  `tensp` varchar(255) NOT NULL,
  `chitietsp` varchar(255) NOT NULL,
  `giasp` int(11) NOT NULL,
  `hinhanhsp` varchar(255) NOT NULL,
  `idtv` int(11) NOT NULL,
  PRIMARY KEY (`idsp`),
  KEY `FK_sanpham_thanhvien` (`idtv`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`idsp`, `tensp`, `chitietsp`, `giasp`, `hinhanhsp`, `idtv`) VALUES
(7, 'iphone11promax', 'description', 40000000, '../../assets/product/ip11promax.jpg', 7),
(9, 'Dell', 'Dell for Dell', 18000000, '../../assets/product/dell.jpg', 12),
(10, 'Acer', 'Acer for Acer', 17500000, '../../assets/product/acer.jpg', 12),
(11, 'Asus', 'Asus for Asus', 16000000, '../../assets/product/asus.jpg', 12),
(12, 'HP', 'HP for HP', 14000000, '../../assets/product/hp.jpg', 12),
(13, 'Macbook Pro 2020', 'Thông số kỹ thuật\r\n* Bộ vi xử lý: 2.6GHz 6‑core 9th‑generation Intel Core i7 processor, Turbo Boost up to 4.5GHz\r\n* Bộ nhớ: 16GB 2400MHz DDR4 memory\r\n* Ổ lưu trữ: 256GB SSD storage\r\n* Màn hình: 15.4-inch Retina display with True Tone, Touch Bar, Touch ID,', 100000000, '../../assets/product/MBP_2019.jpg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `thanhvien`
--

CREATE TABLE IF NOT EXISTS `thanhvien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tendangnhap` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `gioitinh` varchar(5) NOT NULL,
  `nghenghiep` varchar(255) NOT NULL,
  `sothich` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `thanhvien`
--

INSERT INTO `thanhvien` (`id`, `tendangnhap`, `matkhau`, `hinhanh`, `gioitinh`, `nghenghiep`, `sothich`) VALUES
(7, 'dcongtinh', 'c4ca4238a0b923820dcc509a6f75849b', '../../assets/avatar/corgi.png', 'Nam', 'Sinh viên', 'Du lịch, Âm nhạc'),
(8, 'pnmthao', 'c4ca4238a0b923820dcc509a6f75849b', '../../assets/avatar/corgi.png', 'Nữ', 'Giáo viên', 'The thao, Du lịch, Âm nhạc, Thời trang'),
(9, 'test', 'c4ca4238a0b923820dcc509a6f75849b', '../../assets/avatar/corgi.png', 'Nam', 'Học sinh', 'Thể thao'),
(11, 'test1', 'c4ca4238a0b923820dcc509a6f75849b', '../../assets/avatar/corgi.png', 'Nữ', 'Sinh viên', 'Thể thao, Du lịch, Âm nhạc, Thời trang'),
(12, '_test_', 'c4ca4238a0b923820dcc509a6f75849b', '../../assets/avatar/avatar.PNG', 'Nam', 'Sinh viên', 'Thể thao, Du lịch, Âm nhạc'),
(13, 'a', '0cc175b9c0f1b6a831c399e269772661', '../../assets/avatar/acer.jpg', 'Nữ', 'Giáo viên', 'Du lịch, Âm nhạc');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_sanpham_thanhvien` FOREIGN KEY (`idtv`) REFERENCES `thanhvien` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
