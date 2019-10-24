-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2019 lúc 01:40 PM
-- Phiên bản máy phục vụ: 8.0.11
-- Phiên bản PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ct428`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `idsp` int(11) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `chitietsp` varchar(255) NOT NULL,
  `giasp` int(11) NOT NULL,
  `hinhanhsp` varchar(255) NOT NULL,
  `idtv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`idsp`, `tensp`, `chitietsp`, `giasp`, `hinhanhsp`, `idtv`) VALUES
(7, 'iphone11promax', 'description', 40000000, '../../assets/product/ip11promax.jpg', 7),
(11, 'Asus', 'Asus for Asus', 16000000, '../../assets/product/asus.jpg', 12),
(12, 'HP', 'HP for HP', 14000000, '../../assets/product/hp.jpg', 12),
(13, 'Macbook Pro 2020', 'Thông số kỹ thuật\r\n* Bộ vi xử lý: 5.0GHz 12‑core 9th‑generation Intel Core i9 processor,\r\n* Bộ nhớ: 32GB 3600MHz DDR4 memory\r\n* Ổ lưu trữ: 2TB SSD storage\r\n* Màn hình: 15.4-inch Retina display with True Tone, Touch Bar, Touch ID.', 100000000, '../../assets/product/MBP_2019.jpg', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `id` int(11) NOT NULL,
  `tendangnhap` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `gioitinh` varchar(5) NOT NULL,
  `nghenghiep` varchar(255) NOT NULL,
  `sothich` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`id`, `tendangnhap`, `matkhau`, `hinhanh`, `gioitinh`, `nghenghiep`, `sothich`) VALUES
(7, 'dcongtinh', 'c4ca4238a0b923820dcc509a6f75849b', '../../assets/avatar/corgi.png', 'Nam', 'Sinh viên', 'Du lịch, Âm nhạc'),
(8, 'pnmthao', 'c4ca4238a0b923820dcc509a6f75849b', '../../assets/avatar/corgi.png', 'Nữ', 'Giáo viên', 'The thao, Du lịch, Âm nhạc, Thời trang'),
(9, 'test', 'c4ca4238a0b923820dcc509a6f75849b', '../../assets/avatar/corgi.png', 'Nam', 'Học sinh', 'Thể thao'),
(11, 'test1', 'c4ca4238a0b923820dcc509a6f75849b', '../../assets/avatar/corgi.png', 'Nữ', 'Sinh viên', 'Thể thao, Du lịch, Âm nhạc, Thời trang'),
(12, '_test_', 'c4ca4238a0b923820dcc509a6f75849b', '../../assets/avatar/avatar.PNG', 'Nam', 'Sinh viên', 'Thể thao, Du lịch, Âm nhạc'),
(13, 'a', '0cc175b9c0f1b6a831c399e269772661', '../../assets/avatar/acer.jpg', 'Nữ', 'Giáo viên', 'Du lịch, Âm nhạc'),
(14, 'test_2', 'c4ca4238a0b923820dcc509a6f75849b', '../../assets/avatar/poster.png', 'Nam', 'Học sinh', ''),
(15, 'test2', 'c4ca4238a0b923820dcc509a6f75849b', '../../assets/avatar/IMG_5651.JPG', 'Nam', 'Học sinh', ''),
(16, 'test3', 'c4ca4238a0b923820dcc509a6f75849b', '../../assets/avatar/poster.png', 'Nam', 'Học sinh', ''),
(17, 'test4', 'c4ca4238a0b923820dcc509a6f75849b', '../../assets/avatar/IMG_5651.JPG', 'Nam', 'Học sinh', ''),
(18, 'test5', 'c4ca4238a0b923820dcc509a6f75849b', '../../assets/avatar/IMG_5651.JPG', 'Nữ', 'Sinh viên', 'Du lịch');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idsp`),
  ADD KEY `FK_sanpham_thanhvien` (`idtv`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idsp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_sanpham_thanhvien` FOREIGN KEY (`idtv`) REFERENCES `thanhvien` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
