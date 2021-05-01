-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 01, 2021 lúc 05:27 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `petshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctgiamgia`
--

CREATE TABLE `ctgiamgia` (
  `MaGiam` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `PhanTramGiam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadon`
--

CREATE TABLE `cthoadon` (
  `MaHD` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL,
  `ThanhTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cthoadon`
--

INSERT INTO `cthoadon` (`MaHD`, `MaSP`, `SoLuong`, `DonGia`, `ThanhTien`) VALUES
(5, 1, 1, 100000, 100000),
(5, 3, 1, 16000, 16000),
(6, 6, 12, 49999, 599988),
(6, 35, 4, 240000, 960000),
(6, 44, 2, 50000, 100000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctphieunhap`
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
-- Cấu trúc bảng cho bảng `giamgia`
--

CREATE TABLE `giamgia` (
  `MaGiam` int(11) NOT NULL,
  `NgayBD` date NOT NULL,
  `NgayKT` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giamgia`
--

INSERT INTO `giamgia` (`MaGiam`, `NgayBD`, `NgayKT`) VALUES
(1, '2021-04-03', '2021-04-30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
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
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `MaKH`, `MaNV`, `NgayLap`, `TongTien`, `TrangThai`, `DiaChiGiaoHang`) VALUES
(5, 2, 1, '2021-05-01', 116000, 0, '247A Phan Văn Trị, Phường 12, Quận Gò Vấp, TP. Hồ Chí Minh'),
(6, 2, 1, '2021-05-01', 1659988, 0, '25 Phan Trung, Tân Biên, Biên Hoà, Đồng Nai');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
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
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `TenDangNhap`, `MatKhau`, `HoTen`, `GioiTinh`, `NgaySinh`, `DienThoai`, `TinhTrang`) VALUES
(1, 'ngophukhang', 'f2ed37fd9e079ebf79dc6385b1c8648a', 'Ngô Phú Khang', 'Nam', '2001-05-09', '0948214801', 1),
(2, 'tranhuukhuong', 'db008fc3e7d771f5552644471a0e5c87', 'Trần Hữu Khương', 'Nam', '2001-10-25', '0786506577', 1),
(3, 'vohoangkiet', 'd1b61781cd7e2535e30b85cf286d39d5', 'Võ Hoàng Kiệt', 'Nam', '0000-00-00', '0396527908', 1),
(4, 'lethaithanhson', '77fe1e43c85a461244e81828a5694b90', 'Lê Thái Thanh Sơn', 'Nam', '2001-02-14', '0858686897', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `MaLoai` int(11) NOT NULL,
  `TenLoai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`MaLoai`, `TenLoai`) VALUES
(1, 'Thức Ăn '),
(2, 'Phụ Kiện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MaNCC` int(11) NOT NULL,
  `TenNCC` varchar(255) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `DienThoai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaNCC`, `TenNCC`, `DiaChi`, `DienThoai`) VALUES
(1, 'Thức ăn vinahey', '347 An Dương Vương , phường 4 , quận 5 TP HCM', '4432');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` int(11) NOT NULL,
  `HoTen` varchar(255) NOT NULL,
  `GioiTinh` varchar(3) NOT NULL,
  `ChucVu` varchar(255) NOT NULL,
  `TenDangNhap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `HoTen`, `GioiTinh`, `ChucVu`, `TenDangNhap`) VALUES
(1, 'Sau Đại Phát', 'Nam', 'Quản Lý', 'user001'),
(3, 'Ngô Khang', 'Nam', 'Trưởng Phòng 1', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `MaPN` int(11) NOT NULL,
  `MaNCC` int(11) NOT NULL,
  `MaNV` int(11) NOT NULL,
  `TongTien` int(11) NOT NULL,
  `NgayNhap` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phieunhap`
--

INSERT INTO `phieunhap` (`MaPN`, `MaNCC`, `MaNV`, `TongTien`, `NgayNhap`) VALUES
(1, 1, 1, 2132313, '2021-05-19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `TenSP` varchar(255) NOT NULL,
  `MaLoai` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonViTinh` varchar(255) NOT NULL,
  `HinhAnh` varchar(255) NOT NULL,
  `DonGia` int(11) NOT NULL,
  `MoTaSanPham` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Bang San Pham';

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `MaLoai`, `SoLuong`, `DonViTinh`, `HinhAnh`, `DonGia`, `MoTaSanPham`) VALUES
(1, 'Thức ăn cho chó', 1, 1000, 'Cái', '', 100000, 'Thức ăn cho chó ROYAL CANIN  German Shepherd Puppy dành riêng cho giống chó Béc giê (GSD) con dưới 15 tháng tuổi.'),
(2, 'Thức ăn cho chó con ROYAL CANIN German Shepherd Puppy', 1, 1000, 'Hộp', './img/thucan/thucanROYALCANIN.jpg', 15000, 'Thức ăn cho chó ROYAL CANIN  German Shepherd Puppy dành riêng cho giống chó Béc giê (GSD) con dưới 15 tháng tuổi.'),
(3, 'Thức ăn cho chó con JOSERA Young Star', 1, 1000, 'Hộp', './img/thucan/thuc-an-cho-cho-con-josera-young-star-400x400.jpg', 16000, ' Thức ăn cho chó JOSERA  Josidog Junior hoàn chỉnh cho chó phát triển'),
(4, 'Thức ăn cho chó già ROYAL CANIN Poodle Adult 8+', 1, 1000, 'Hộp', './img/thucan/thuc-an-cho-cho-gia-royal-canin-poodle-adult-8-400x400.jpg', 18000, 'Thức ăn cho chó  già ROYAL CANIN Poodle Adult 8+ hoàn chỉnh cho chó phát triển.'),
(5, 'Thức ăn cho chó vị thịt vịt ANF Organic 6 Free Duck', 1, 1000, 'Hộp', './img/thucan/thuc-an-cho-cho-vi-thit-vit-anf-organic-6-free-duck-0-400x400.jpg', 95000, 'Thức ăn cho chó vị thịt vịt ANF Organic 6 Free Duck hoàn chỉnh cho chó phát triển.'),
(6, 'Mũ cho chó mèo AMBABY PET 1JXS071', 2, 20, 'VNĐ', './img/dochoi/mu-cho-cho-meo-ambaby-pet-1jxs071-400x400.jpg', 49999, 'Mũ cho chó mèo AMBABY PET  1JXS071 là sản phẩm dành cho tất cả giống chó và mèo'),
(7, 'Quần áo cho chó mèo AMBABY PET 2JXF163', 2, 20, 'Cái', './img/dochoi/quan-ao-cho-cho-meo-ambaby-pet-2jxf163-400x400.jpg', 249999, 'Quần áo cho chó mèo AMBABY PET  2JXF163 là sản phẩm dành cho cả chó và mèo.'),
(8, 'Mũ cho chó mèo AMBABY PET 1JXS00', 2, 20, 'Cái', './img/dochoi/mu-cho-cho-meo-ambaby-pet-1jxs003-400x400.jpg', 19999, 'Mũ cho chó mèo AMBABY PET 1JXS00 là sản phẩm dành cho tất cả giống chó và mèo'),
(9, 'Quần áo cho chó mèo AMBABY PET 2JXF171', 2, 20, 'Cái', './img/dochoi/quan-ao-cho-cho-meo-ambaby-pet-2jxf171-400x400.jpg', 249999, 'Quần áo cho chó mèo AMBABY PET 2JXF171 là sản phẩm dành cho cả chó và mèo.'),
(10, 'Xích cho chó đai ngực phản quang HAND IN HAND Reflective & Adjustable', 2, 20, 'Cái', './img/dochoi/xich-cho-cho-dai-nguc-phan-quang-hand-in-hand-reflective-adjustable-0-400x400.jpg', 199999, ' Xích cho chó đai ngực phản quang HAND IN HAND  Reflective & Adjustable là sản phẩm dành cho tất cả giống chó'),
(11, 'Dây dắt cho chó mèo tự động DELE 001S', 2, 20, 'Cái', './img/dochoi/day-dat-cho-cho-meo-tu-dong-dele-001s-400x400.jpg', 349999, ' Dây dắt cho chó mèo tự động DELE  001S là sản phẩm phù hợp cho những giống chó dưới 15kg'),
(12, 'Dây dắt cho chó mèo tự động DELE 005G\r\n', 2, 500, 'Cái', './img/dochoi/day-dat-cho-cho-meo-tu-dong-dele-005g-400x400.jpg', 79000, ' Dây dắt cho chó mèo tự động DELE  005G là sản phẩm phù hợp cho những giống chó dưới 15kg'),
(13, 'Dây dắt cho chó mèo tự động DELE 005G', 2, 500, 'Cái', './img/dochoi/day-dat-cho-cho-meo-tu-dong-dele-005g-400x400.jpg', 79000, ' Dây dắt cho chó mèo tự động DELE  005G là sản phẩm phù hợp cho những giống chó dưới 15kg'),
(14, 'Quần áo cho chó mèo AMBABY PET 2JXF248', 2, 500, 'Cái', './img/dochoi/quan-ao-cho-cho-meo-ambaby-pet-2jxf248-400x400.jpg', 89000, 'Quần áo cho chó mèo AMBABY PET 2JXF248 là sản phẩm dành cho cả chó và mèo. là sản phẩm dành cho cả chó và mèo. là sản phẩm dành cho cả chó và mèo.'),
(15, 'Mũ cho chó mèo AMBABY PET 1JXS081', 2, 500, 'Cái', './img/dochoi/day-dat-cho-cho-meo-tu-dong-dele-005g-400x400.jpg', 79000, 'Mũ cho chó mèo AMBABY PET 1JXS081 là sản phẩm dành cho tất cả giống chó và mèo'),
(16, 'Tã bỉm cho chó mèo cái 1 – 3kg VET’S BEST Disposable Diapers XXSmall', 2, 500, 'Cái', './img/dochoi/ta-bim-cho-cho-meo-cai-1-3kg-vets-best-disposable-diapers-xxsmall-400x400.jpg', 89000, 'Tã bỉm cho chó mèo cái 1 – 3kg VETS BEST Disposable Diapers XXSmall là giải pháp đơn giản và hiệu quả cho thú cưng của bạn bị tiểu tiện bừa bãi và khi chó cái đến giai đoạn đèn đỏ. Tã bỉm cho chó có kích thước vừa vặn với thú cưng 1 – 3 kg. Sản phẩm có đường chỉ cho biết độ ẩm để bạn biết khi nào cần thay bỉm cho chó. Mỗi chiếc tã đều có một rào chắn hạn chế sự rò rỉ nước ra ngoài. An toàn lông và cố định vị trí cho chó dễ dàng đi vệ sinh mọi lúc mọi nơi. Kích thước: 22 – 40cm.'),
(17, 'Miếng lót cho chó đi vệ sinh IRIS Clean Pet Sheets CPS-42W', 2, 500, 'Cái', './img/dochoi/mieng-lot-cho-cho-di-ve-sinh-iris-clean-pet-sheets-cps-42w-400x400.jpg', 99000, ' Miếng lót cho chó đi vệ sinh IRIS  Clean Pet Sheets CPS-42W được dùng cho tất cả giống chó. Bịch 42 miếng.'),
(27, 'Thức ăn cho chó trưởng thành Nature\'s Protection Lifestyle cá trắng 1.5kg', 1, 1, 'Túi', './img/sanpham/4665_unnamed11.jpg', 280000, 'Nature’s Protection Lifestyle Grain Free White Fish Thức ăn không ngũ cốc giàu cá trắng dành cho chó trưởng thành thuộc tất cả các giống chó 1,5 kg'),
(28, 'Thức ăn dành cho chó trưởng thành thuộc giống chó nhỏ Nature’s Protection cá hồi 500 gram ', 1, 1, 'Túi', './img/sanpham/4658_unnamed7.jpg', 136000, 'Nature’s Protection Mini Extra Salmon Thức ăn giàu cá hồi dành cho chó trưởng thành thuộc giống chó nhỏ 500 gram'),
(29, 'Thức ăn dành cho chó trưởng thành thuộc giống chó nhỏ Nature’s Protection cá hồi 500 gram ', 1, 1, 'Túi', './img/sanpham/4658_unnamed7.jpg', 136000, 'Nature’s Protection Mini Extra Salmon Thức ăn giàu cá hồi dành cho chó trưởng thành thuộc giống chó nhỏ 500 gram'),
(30, 'Thức ăn hạt hữu cơ cho chó vị cừu ANF 6 Free 400g', 1, 1, 'Túi', './img/sanpham/4684_vi-cuu-1581503190.jpg', 150000, 'Hạt có thành phần tự nhiên cung cấp carbohydrates, chất xơ, các chất vitamin, khoáng chất và có tác dụng chống oxy hóa, chống lão hóa, chống ung thư, giảm lượng đường trong máu và cholesterol và tốt cho thận'),
(31, 'Thức ăn hạt hữu cơ cho chó vị cá hồi ANF 6 Free 400g', 1, 1, 'Túi', './img/sanpham/4683_vi-ca-hoi-1581503019.jpg', 200000, 'Sản phẩm thức ăn hạt cho chó lớn hơn 6 tháng tuổi ANF 6 Free Organic vị cá hồi được cấu tạo từ nguồn nguyên liệu vô cùng an toàn, đảm bảo cho sức khỏe của thú cưng.'),
(32, 'Thức ăn dành cho chó trưởng thành Araton thịt cừu 3 kg ', 1, 1, 'Túi', './img/sanpham/4672_unnamed14.jpg', 240000, 'Thích hợp cho hệ tiêu hóa nhạy cảm: Dinh dưỡng hoàn hảo được bổ sung thịt cừu, là nguồn cung cấp proteins, với các đặc tính tốt cho tiêu hóa nhằm giúp phân nhỏ và định hình ổn định.'),
(33, 'Thức ăn hạt hữu cơ cho chó vị vịt ANF 6 Free 400g', 1, 1, 'Túi', './img/sanpham/4685_vi-vit-1581502938.jpg', 230000, 'Sản phẩm ANF - Thức ăn hạt cho chó vị vịt được cấu tạo bởi những nguyên liệu tự nhiên, có đầy đủ các thành phần dưỡng chất cho cơ thể của mọi chú chó. Chúng tôi cam kết không sử dụng những chất gây hại hay hóa học nhưng chỉ sử dụng nguyên liệu đã qua khâu kiểm tra sát sao để chế biến ra sản phẩm tốt nhất trên thị trường.'),
(34, 'Thức ăn dành cho chó trưởng thành Araton cá hồi 3 kg ', 1, 1, 'Túi', './img/sanpham/4673_674b58a45293d91211588d4d35bb2e38.jpg', 410000, 'Hàm lượng vitamin E tối ưu, một chất chống oxy hóa tự nhiên, giúp tăng cường hệ thống miễn dịch và khả năng kháng bệnh của thú cưng. Dinh dưỡng hoàn hảo được bổ sung thịt cừu, là nguồn cung cấp proteins, với các đặc tính tốt cho tiêu hóa nhằm giúp phân nhỏ và định hình ổn định.'),
(35, 'Thức ăn dành cho mèo trưởng thành Araton cá hồi 1.5 kg ', 1, 1, 'Túi', './img/sanpham/4674_ART45646-425x600.jpg', 240000, 'Tốt cho da và lông: Một tỷ lệ hỗn hợp cân bằng gồm axit béo Omega-3 và Omega-6, biotin, kẽm và vitamin B6 giúp duy trì làn da khỏe mạnh và lông bóng mượt.'),
(36, 'Thức ăn cho mèo con Catsrang Kitten 1.5kg', 1, 1, 'Túi', './img/sanpham/4335_catsrang-5-kg-1581587183.jpg', 240000, 'Hàm lượng vitamin E tối ưu, một chất chống oxy hóa tự nhiên, giúp tăng cường hệ thống miễn dịch và khả năng kháng bệnh của thú cưng.'),
(37, 'Thức ăn dành cho mèo trưởng thành Nature’s Protection thịt gia cầm 400 gram ', 1, 1, 'Túi', './img/sanpham/4661_NP_Indoor-400g-424x600.jpg', 146000, 'Sản phẩm giàu chất xơ, đặc biệt dễ tiêu hóa giúp ngăn ngừa sự hình thành búi lông trong dạ dày, an toàn và dễ dàng loại bỏ chúng khỏi đường ruột. Tốt cho đường tiết niệu: Giảm lượng magiê giúp tránh sự hình thành các tinh thể sỏi trong đường tiết niệu.'),
(38, 'Thức ăn cho mèo con dưới 1 năm tuổi Nature’s Protection tôm Krill 400 gram ', 1, 1, 'Túi', './img/sanpham/4660_NP_Kitten-400g-424x600.jpg', 136000, 'Công thức được nghiên cứu bởi các bác sĩ thú y và chuyên gia dinh dưỡng, giúp mèo con vượt qua giai đoạn cai sữa khó khăn trong điều kiện tối ưu, đảm bảo một khởi đầu tốt trong cuộc sống.'),
(39, 'Áo thun hạc chanel sọc xanh size 4', 2, 1, 'Cái', './img/sanpham/4606_121066314_1308414889496585_5054189178317612641_o.jpg', 80000, 'Với thiết kế tinh tế của áo thun, Boss sẽ nổi bật và ấm áp hơn khi cùng Sen dạo phố đón những cơn gió đầu mùa.'),
(40, 'Áo thun hạc chanel sọc xanh size 4', 2, 1, 'Cái', './img/sanpham/4606_121066314_1308414889496585_5054189178317612641_o.jpg', 80000, 'Với thiết kế tinh tế của áo thun, Boss sẽ nổi bật và ấm áp hơn khi cùng Sen dạo phố đón những cơn gió đầu mùa.'),
(41, 'Áo thun cổ cao snooppy vàng size 9', 2, 1, 'Cái', './img/sanpham/4539_untitled_1.jpg', 100000, 'Với thiết kế tinh tế của áo thun, Boss sẽ nổi bật và ấm áp hơn khi cùng Sen dạo phố đón những cơn gió đầu mùa.'),
(42, 'Áo thun cổ cao LV đỏ size 6', 2, 1, 'Cái', './img/sanpham/4553_untitled_1.jpg', 70000, 'Với thiết kế tinh tế của áo thun, Boss sẽ nổi bật và ấm áp hơn khi cùng Sen dạo phố đón những cơn gió đầu mùa.'),
(43, 'Áo trụ thêu chanel xanh size 7', 2, 1, 'Cái', './img/sanpham/4613_z2238924461397_191891a38008316f165b374cac933674.jpg', 60000, 'Với thiết kế tinh tế của áo thun, Boss sẽ nổi bật và ấm áp hơn khi cùng Sen dạo phố đón những cơn gió đầu mùa.'),
(44, 'Áo thun sát nách trái cam size 5', 2, 1, 'Cái', './img/sanpham/4587_121621255_1311962282475179_4880399607097555200_o.jpg', 50000, 'Với thiết kế tinh tế của áo thun, Boss sẽ nổi bật và ấm áp hơn khi cùng Sen dạo phố đón những cơn gió đầu mùa.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `TenDangNhap` varchar(255) NOT NULL,
  `MatKhau` text NOT NULL,
  `Quyen` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`TenDangNhap`, `MatKhau`, `Quyen`) VALUES
('admin', 'admin', 'adm'),
('ql01', 'ql01', 'mng');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ctgiamgia`
--
ALTER TABLE `ctgiamgia`
  ADD PRIMARY KEY (`MaGiam`,`MaSP`),
  ADD KEY `ctgiamgia_ibfk_1` (`MaGiam`),
  ADD KEY `ctgiamgia_ibfk_2` (`MaSP`);

--
-- Chỉ mục cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`MaHD`,`MaSP`),
  ADD KEY `cthoadon_ibfk_1` (`MaHD`),
  ADD KEY `cthoadon_ibfk_2` (`MaSP`);

--
-- Chỉ mục cho bảng `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  ADD PRIMARY KEY (`MaPN`,`MaSP`),
  ADD KEY `ctphieunhap_ibfk_1` (`MaSP`);

--
-- Chỉ mục cho bảng `giamgia`
--
ALTER TABLE `giamgia`
  ADD PRIMARY KEY (`MaGiam`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `hoadon_ibfk_3` (`MaNV`),
  ADD KEY `hoadon_ibfk_4` (`MaKH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MaNCC`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`MaPN`),
  ADD KEY `phieunhap_ibfk_1` (`MaNCC`),
  ADD KEY `MaNV` (`MaNV`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `sanpham_ibfk_1` (`MaLoai`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`TenDangNhap`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `giamgia`
--
ALTER TABLE `giamgia`
  MODIFY `MaGiam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `MaLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `MaNCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `MaPN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ctgiamgia`
--
ALTER TABLE `ctgiamgia`
  ADD CONSTRAINT `ctgiamgia_ibfk_1` FOREIGN KEY (`MaGiam`) REFERENCES `giamgia` (`MaGiam`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ctgiamgia_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD CONSTRAINT `cthoadon_ibfk_1` FOREIGN KEY (`MaHD`) REFERENCES `hoadon` (`MaHD`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cthoadon_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  ADD CONSTRAINT `ctphieunhap_ibfk_1` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ctphieunhap_ibfk_2` FOREIGN KEY (`MaPN`) REFERENCES `phieunhap` (`MaPN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_3` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hoadon_ibfk_4` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_ibfk_1` FOREIGN KEY (`MaNCC`) REFERENCES `nhacungcap` (`MaNCC`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `phieunhap_ibfk_2` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaLoai`) REFERENCES `loai` (`MaLoai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
