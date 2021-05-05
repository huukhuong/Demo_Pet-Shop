-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 05:58 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `ctgiamgia`
--

CREATE TABLE `ctgiamgia` (
  `MaGiam` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `PhanTramGiam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cthoadon`
--

CREATE TABLE `cthoadon` (
  `MaHD` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL,
  `ThanhTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ctphieunhap`
--

CREATE TABLE `ctphieunhap` (
  `MaPN` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL,
  `ThanhTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `donvi`
--

CREATE TABLE `donvi` (
  `MaDV` int(11) NOT NULL,
  `TenDV` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donvi`
--

INSERT INTO `donvi` (`MaDV`, `TenDV`) VALUES
(1, 'Cái\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `giamgia`
--

CREATE TABLE `giamgia` (
  `MaGiam` int(11) NOT NULL,
  `NgayBD` date NOT NULL,
  `NgayKT` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `giamgia`
--

INSERT INTO `giamgia` (`MaGiam`, `NgayBD`, `NgayKT`) VALUES
(1, '2021-04-03', '2021-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` int(11) NOT NULL,
  `MaKH` int(11) NOT NULL,
  `MaNV` int(11) NOT NULL,
  `NgayLap` date NOT NULL,
  `TongTien` int(11) NOT NULL,
  `TrangThai` int(1) NOT NULL,
  `DiaChiGiaoHang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `MaKH`, `MaNV`, `NgayLap`, `TongTien`, `TrangThai`, `DiaChiGiaoHang`) VALUES
(5, 2, 1, '2021-05-01', 116000, 0, '247A Phan Văn Trị, Phường 12, Quận Gò Vấp, TP. Hồ Chí Minh'),
(6, 2, 1, '2021-05-01', 1659988, 0, '25 Phan Trung, Tân Biên, Biên Hoà, Đồng Nai');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `TenDangNhap` varchar(255) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `HoTen` varchar(255) NOT NULL,
  `GioiTinh` varchar(255) NOT NULL,
  `NgaySinh` date NOT NULL,
  `DienThoai` varchar(255) NOT NULL,
  `TinhTrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`id`, `TenDangNhap`, `MatKhau`, `HoTen`, `GioiTinh`, `NgaySinh`, `DienThoai`, `TinhTrang`) VALUES
(1, 'ngophukhang', 'f2ed37fd9e079ebf79dc6385b1c8648a', 'Ngô Phú Khang', 'Nam', '2001-05-09', '0948214801', 1),
(2, 'tranhuukhuong', 'db008fc3e7d771f5552644471a0e5c87', 'Trần Hữu Khương', 'Nam', '2001-10-25', '0786506577', 1),
(3, 'vohoangkiet', 'd1b61781cd7e2535e30b85cf286d39d5', 'Võ Hoàng Kiệt', 'Nam', '0000-00-00', '0396527908', 1),
(4, 'lethaithanhson', '77fe1e43c85a461244e81828a5694b90', 'Lê Thái Thanh Sơn', 'Nam', '2001-02-14', '0858686897', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

CREATE TABLE `loai` (
  `MaLoai` int(11) NOT NULL,
  `TenLoai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loai`
--

INSERT INTO `loai` (`MaLoai`, `TenLoai`) VALUES
(1, 'Thức Ăn '),
(2, 'Phụ Kiện');

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MaNCC` int(11) NOT NULL,
  `TenNCC` varchar(255) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `DienThoai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaNCC`, `TenNCC`, `DiaChi`, `DienThoai`) VALUES
(1, 'Thức ăn vinahey', '347 An Dương Vương , phường 4 , quận 5 TP HCM', '4432');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` int(11) NOT NULL,
  `HoTen` varchar(255) NOT NULL,
  `GioiTinh` varchar(3) NOT NULL,
  `ChucVu` varchar(255) NOT NULL,
  `TenDangNhap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `HoTen`, `GioiTinh`, `ChucVu`, `TenDangNhap`) VALUES
(1, 'Sau Đại Phát', 'Nam', 'Quản Lý', 'user001'),
(3, 'Ngô Khang', 'Nam', 'Trưởng Phòng 1', '');

-- --------------------------------------------------------

--
-- Table structure for table `phieunhap`
--

CREATE TABLE `phieunhap` (
  `MaPN` int(11) NOT NULL,
  `MaNCC` int(11) NOT NULL,
  `MaNV` int(11) NOT NULL,
  `TongTien` int(11) NOT NULL,
  `NgayNhap` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phieunhap`
--

INSERT INTO `phieunhap` (`MaPN`, `MaNCC`, `MaNV`, `TongTien`, `NgayNhap`) VALUES
(1, 1, 1, 2132313, '2021-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `TenSP` varchar(255) NOT NULL,
  `MaLoai` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonViTinh` int(11) DEFAULT NULL,
  `HinhAnh` varchar(255) NOT NULL,
  `DonGia` int(11) NOT NULL,
  `MoTaSanPham` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Bang San Pham';

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `MaLoai`, `SoLuong`, `DonViTinh`, `HinhAnh`, `DonGia`, `MoTaSanPham`) VALUES
(78, 'Thức ăn cho mèo tiêu hóa búi lông ROYAL CANIN Hairball Care', 1, 1, 1, './img/sanpham/thuc-an-cho-meo-tieu-hoa-bui-long-royal-canin-hairball-care-400x400.jpg', 55000, 'Thức ăn cho mèo kiểm soát búi lông ROYAL CANIN Hairball Care dành cho mèo từ 12 tháng tuổi trở lên.'),
(79, 'Thức ăn cho mèo trưởng thành ROYAL CANIN Fit and Active Adult', 1, 1, 1, './img/sanpham/thuc-an-cho-meo-truong-thanh-royal-canin-fit-and-active-adult-400g-400x400.jpg', 40000, 'Thức ăn cho mèo trưởng thành ROYAL CANIN Fit and Active Adult dành co mèo từ 12 tháng tuổi.'),
(80, 'Quần áo cho chó mèo AMBABY PET 2JXF192', 2, 1, 1, './img/sanpham/quan-ao-cho-cho-meo-ambaby-pet-2jxf192-400x400.jpg', 165000, 'Quần áo cho chó mèo AMBABY PET 2JXF192 là sản phẩm dành cho cả chó và mèo.'),
(81, 'Quần áo cho chó mèo AMBABY PET 2JXF248', 2, 1, 1, './img/sanpham/quan-ao-cho-cho-meo-ambaby-pet-2jxf248-400x400.jpg', 200000, 'Quần áo cho chó mèo AMBABY PET 2JXF248 là sản phẩm dành cho cả chó và mèo.'),
(82, 'Bánh thưởng cho chó vị dâu tây JERHIGH Strawberry Stick', 1, 1, 1, './img/sanpham/banh-thuong-cho-cho-vi-dau-tay-jerhigh-strawberry-stick-400x400.jpg', 65000, 'Bánh thưởng cho chó vị dâu tây JERHIGH Strawberry Stick phù hợp với tất cả các giống chó.'),
(83, 'Vòng cổ cho chó mèo kèm dây dắt AMBABY PET 1JXS051', 2, 1, 1, './img/sanpham/vong-co-cho-cho-meo-kem-day-dat-ambaby-pet-1jxs051-400x400.jpg', 155000, 'Vòng cổ cho chó mèo kèm dây dắt AMBABY PET 1JXS051 là sản phẩm dùng cho tất cả giống chó và mèo theo từng kích cỡ phù hợp.'),
(84, 'Quần áo cho chó mèo AMBABY PET 2JXF246', 2, 1, 1, './img/sanpham/quan-ao-cho-cho-meo-ambaby-pet-2jxf246-400x400.jpg', 170000, 'Quần áo cho chó mèo AMBABY PET 2JXF246 là sản phẩm dành cho cả chó và mèo.'),
(85, 'Thức ăn cho mèo triệt sản ROYAL CANIN Sterilised', 1, 1, 1, './img/sanpham/thuc-an-cho-meo-triet-san-royal-canin-sterilised-400x400.jpg', 47000, 'Thức ăn cho mèo triệt sản ROYAL CANIN Sterilised hỗ trợ các giống mèo đã triệt sản từ 12 tháng tuổi trở lên.'),
(86, 'Bánh thưởng cho chó vị chuối JERHIGH Banana Stick', 1, 1, 1, './img/sanpham/banh-thuong-cho-cho-vi-chuoi-jerhigh-banana-stick-400x400.jpg', 40000, 'Bánh thưởng cho chó JERHIGH Banana Stick hương vị thơm ngon từ chuối. Phù hợp với tất cả các giống chó.'),
(87, 'Thức ăn cho mèo Ragdoll trưởng thành ROYAL CANIN Ragdoll Adult', 1, 1, 1, './img/sanpham/thuc-an-cho-meo-ragdoll-truong-thanh-royal-canin-ragdoll-adult-400x400.jpg', 40000, 'Thức ăn cho mèo Ragdoll trưởng thành ROYAL CANIN Ragdoll Adult dành riêng cho giống mèo Ragdoll từ 12 tháng tuổi trở lên.'),
(88, 'Bánh thưởng cho chó vị thịt gà JERHIGH Chicken Jerky', 1, 1, 1, './img/sanpham/banh-thuong-cho-cho-vi-thit-ga-jerhigh-chicken-jerky-400x400.jpg', 55000, 'Bánh thưởng cho chó vị thịt gà JERHIGH Chicken Jerky phù hợp với tất cả các giống chó.'),
(89, 'Quần áo cho chó mèo AMBABY PET 2JXF171', 2, 1, 1, './img/sanpham/quan-ao-cho-cho-meo-ambaby-pet-2jxf171-400x400.jpg', 215000, 'Quần áo cho chó mèo AMBABY PET 2JXF171 là sản phẩm dành cho cả chó và mèo.'),
(90, 'Mũ cho chó mèo AMBABY PET 1JXS013', 2, 1, 1, './img/sanpham/mu-cho-cho-meo-ambaby-pet-1jxs013-400x400.jpg', 175000, 'Mũ cho chó mèo AMBABY PET 1JXS013 là sản phẩm dành cho tất cả giống chó và mèo.'),
(91, 'Thức ăn cho mèo trưởng thành ROYAL CANIN Indoor Adult', 1, 1, 1, './img/sanpham/thuc-an-cho-meo-truong-thanh-royal-canin-indoor-adult-400x400.jpg', 75000, 'Thức ăn cho mèo trưởng thành ROYAL CANIN Indoor Adult dành riêng cho mèo trưởng thành sống trong nhà từ 12 tháng tuổi trở lên.'),
(92, 'Xuong cho chó gặm vị thịt bò VEGEBRAND Orgo Beef Small Bone', 1, 1, 1, './img/sanpham/xuong-cho-cho-gam-vi-thit-bo-vegebrand-orgo-beef-small-bone-400x400.jpg', 40000, 'Xuong cho chó gặm vị thịt bò VEGEBRAND Orgo Beef Small Bone là sản phẩm thức ăn dành cho tất cả giống chó.'),
(93, 'Thức ăn cho mèo dưỡng lông ROYAL CANIN Hair & Skin', 1, 1, 1, './img/sanpham/thuc-an-cho-meo-duong-long-royal-canin-hair-skin-400g-400x400.jpg', 40000, 'Thức ăn cho mèo dưỡng lông ROYAL CANIN Hair & Skin cho tất cả giống mèo từ 12 tháng tuổi trở lên.'),
(94, 'Thức ăn cho mèo bảo vệ răng miệng ROYAL CANIN Oral Care', 1, 1, 1, './img/sanpham/thuc-an-cho-meo-bao-ve-rang-mieng-royal-canin-oral-care-400x400.jpg', 75000, 'Thức ăn cho mèo ROYAL CANIN Oral Care bảo vệ răng cho các giống mèo từ 12 tháng tuổi trở lên.'),
(95, 'Thức ăn cho mèo kiểm soát cân nặng ROYAL CANIN Weight Care', 1, 1, 1, './img/sanpham/thuc-an-cho-meo-kiem-soat-can-nang-royal-canin-weight-care-400x400.jpg', 40000, 'Thức ăn cho mèo kiểm soát cân nặng ROYAL CANIN Weight Care cho các giống mèo từ 12 tháng tuổi trở trên.'),
(96, 'Quần áo cho chó mèo AMBABY PET 2JXF162', 2, 1, 1, './img/sanpham/quan-ao-cho-cho-meo-ambaby-pet-2jxf162-400x400.jpg', 165000, 'Quần áo cho chó mèo AMBABY PET 2JXF162 là sản phẩm dành cho cả chó và mèo.'),
(97, 'Bánh thưởng cho chó vị rau chân vịt JERHIGH Spinach Stick', 1, 1, 1, './img/sanpham/banh-thuong-cho-cho-vi-rau-chan-vit-jerhigh-spinach-stick-400x400.jpg', 60000, 'Bánh thưởng cho chó vị rau chân vịt JERHIGH Spinach Stick dành cho tất cả các giống chó.'),
(98, 'Quần áo cho chó mèo AMBABY PET 2JXF108', 2, 1, 1, './img/sanpham/quan-ao-cho-cho-meo-ambaby-pet-2jxf108-400x400.jpg', 165000, 'Quần áo cho chó mèo AMBABY PET 2JXF108 là sản phẩm dành cho cả chó và mèo.'),
(99, 'Bánh thưởng cho chó vị gan gà JERHIGH Liver Stick', 1, 1, 1, './img/sanpham/banh-thuong-cho-cho-vi-gan-ga-jerhigh-liver-stick-400x400.jpg', 40000, 'Bánh thưởng cho chó vị gan gà JERHIGH Liver Stick phù hợp với tất cả các giống chó.'),
(100, 'Mũ cho chó mèo AMBABY PET 1JXS018', 2, 1, 1, './img/sanpham/mu-cho-cho-meo-ambaby-1jxs018-400x400.jpg', 90000, 'Mũ cho chó mèo AMBABY PET 1JXS018 là sản phẩm dành cho tất cả giống chó và mèo.'),
(101, 'Bánh thưởng cho chó vị thịt xông khói JERHIGH Bacon', 1, 1, 1, './img/sanpham/banh-thuong-cho-cho-vi-thit-xong-khoi-jerhigh-bacon-400x400.jpg', 50000, 'Bánh thưởng cho chó vị thịt xông khói JERHIGH Bacon mang lại nguồn năng lượng mới cho tất cả các giống chó.'),
(102, 'Thức ăn cho mèo trưởng thành ROYAL CANIN Indoor 27', 1, 1, 1, './img/sanpham/thuc-an-cho-meo-truong-thanh-royal-canin-indoor-27-400g-400x400.jpg', 60000, 'Thức ăn cho mèo trưởng thành ROYAL CANIN Indoor 27 dành cho tất cả giống mèo sống trong nhà trên 7 tuổi.'),
(103, 'Thức ăn cho mèo Ba Tư con ROYAL CANIN Persian Kitten', 1, 1, 1, './img/sanpham/thuc-an-cho-meo-ba-tu-con-royal-canin-persian-kitten-400x400.jpg', 55000, 'Thức ăn cho mèo Ba Tư con ROYAL CANIN Persian Kitten dành riêng cho mèo dưới 12 tháng tuổi.'),
(104, 'Yếm cho chó mèo kèm dây dắt AMBABY PET 1JXS004', 2, 1, 1, './img/sanpham/yem-cho-cho-meo-kem-day-dat-ambaby-pet-1jxs004-400x400.jpg', 125000, 'Yếm cho chó mèo kèm dây dắt AMBABY PET 1JXS004 là sản phẩm dành cho tất cả giống chó và mèo.'),
(105, 'Bánh thưởng cho chó vị cà rốt JERHIGH Carrot', 1, 1, 1, './img/sanpham/banh-thuong-cho-cho-vi-ca-rot-jerhigh-carrot-400x400.jpg', 50000, 'Bánh thưởng cho chó JERHIGH Carrot vị cà rốt dành cho tất cả các giống chó.'),
(106, 'Bánh thưởng cho chó vị bánh quy JERHIGH Cookie', 1, 1, 1, './img/sanpham/banh-thuong-cho-cho-vi-banh-quy-jerhigh-cookie-400x400.jpg', 40000, 'Bánh thưởng cho chó vị bánh quy JERHIGH Cookie mang lại nguồn năng lượng cho tất cả các giống chó.'),
(107, 'Bánh thưởng cho chó vị sữa JERHIGH Milky Sticks', 1, 1, 1, './img/sanpham/banh-thuong-cho-cho-vi-sua-jerhigh-milky-stick-400x400.jpg', 40000, 'Bánh thưởng cho chó vị sữa JERHIGH Milky Sticks phù hợp với tất cả các giống chó.'),
(108, 'Bánh thưởng cho chó vị cá JERHIGH Fish Stick', 1, 1, 1, './img/sanpham/banh-thuong-cho-cho-vi-ca-jerhigh-fish-stick-400x400.jpg', 45000, 'Bánh thưởng cho chó vị cá JERHIGH Fish Stick vị cá phù hợp với tất cả các giống chó.'),
(109, 'Mũ cho chó mèo AMBABY PET 1JXS055', 2, 1, 1, './img/sanpham/mu-cho-cho-meo-ambaby-pet-1jxs055-400x400.jpg', 175000, 'Mũ cho chó mèo AMBABY PET 1JXS055 là sản phẩm dành cho tất cả giống chó và mèo.'),
(110, 'Mũ cho chó mèo AMBABY PET 1JXS071', 2, 1, 1, './img/sanpham/mu-cho-cho-meo-ambaby-pet-1jxs071-400x400.jpg', 210000, 'Mũ cho chó mèo AMBABY PET 1JXS071 là sản phẩm dành cho tất cả giống chó và mèo.'),
(114, 'absdạ', 1, 8882, 1, './img/sanpham/178780744_2834336973546404_8362777027323813655_n.jpg', 21131, 'sadsa');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `TenDangNhap` varchar(255) NOT NULL,
  `MatKhau` text NOT NULL,
  `Quyen` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`TenDangNhap`, `MatKhau`, `Quyen`) VALUES
('admin', 'admin', 'adm'),
('ql01', 'ql01', 'mng');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ctgiamgia`
--
ALTER TABLE `ctgiamgia`
  ADD PRIMARY KEY (`MaGiam`,`MaSP`),
  ADD KEY `ctgiamgia_ibfk_1` (`MaGiam`),
  ADD KEY `ctgiamgia_ibfk_2` (`MaSP`);

--
-- Indexes for table `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`MaHD`,`MaSP`),
  ADD KEY `cthoadon_ibfk_1` (`MaHD`),
  ADD KEY `cthoadon_ibfk_2` (`MaSP`);

--
-- Indexes for table `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  ADD PRIMARY KEY (`MaPN`,`MaSP`),
  ADD KEY `ctphieunhap_ibfk_1` (`MaSP`);

--
-- Indexes for table `donvi`
--
ALTER TABLE `donvi`
  ADD PRIMARY KEY (`MaDV`);

--
-- Indexes for table `giamgia`
--
ALTER TABLE `giamgia`
  ADD PRIMARY KEY (`MaGiam`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `hoadon_ibfk_3` (`MaNV`),
  ADD KEY `hoadon_ibfk_4` (`MaKH`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MaNCC`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`);

--
-- Indexes for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`MaPN`),
  ADD KEY `phieunhap_ibfk_1` (`MaNCC`),
  ADD KEY `MaNV` (`MaNV`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `sanpham_ibfk_1` (`MaLoai`),
  ADD KEY `sanpham_ibfk_2` (`DonViTinh`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`TenDangNhap`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donvi`
--
ALTER TABLE `donvi`
  MODIFY `MaDV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `giamgia`
--
ALTER TABLE `giamgia`
  MODIFY `MaGiam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loai`
--
ALTER TABLE `loai`
  MODIFY `MaLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `MaNCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `MaPN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ctgiamgia`
--
ALTER TABLE `ctgiamgia`
  ADD CONSTRAINT `ctgiamgia_ibfk_1` FOREIGN KEY (`MaGiam`) REFERENCES `giamgia` (`MaGiam`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ctgiamgia_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD CONSTRAINT `cthoadon_ibfk_1` FOREIGN KEY (`MaHD`) REFERENCES `hoadon` (`MaHD`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cthoadon_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  ADD CONSTRAINT `ctphieunhap_ibfk_1` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ctphieunhap_ibfk_2` FOREIGN KEY (`MaPN`) REFERENCES `phieunhap` (`MaPN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_3` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hoadon_ibfk_4` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_ibfk_1` FOREIGN KEY (`MaNCC`) REFERENCES `nhacungcap` (`MaNCC`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `phieunhap_ibfk_2` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaLoai`) REFERENCES `loai` (`MaLoai`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`DonViTinh`) REFERENCES `donvi` (`MaDV`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
