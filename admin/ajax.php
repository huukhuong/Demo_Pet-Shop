<?php
require_once('../libs/dbhelper.php');
$getsoluong = $dssanpham = $update = $getmasp = '';
if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['id'])) {
					$id = $_POST['id'];

					$sql = 'delete from sanpham where MaSP = ' . $id;
					execute($sql);
				}
				break;
			case 'change': // xử lý hoá donw => đã xử lý
				if (isset($_POST['MaHD'])) {
					$id = $_POST['MaHD'];

					// 1 đã xử lý
					$sql = 'update hoadon set TrangThai = 1 where MaHD = ' . $id;
					execute($sql);
					$getmasp = 'SELECT MaSP,SoLuong FROM cthoadon where MaHD =' . $id;
					$dssanpham = executeResult($getmasp);
					foreach ($dssanpham as $item) {
					//	$getsoluong = 'select SoLuong from sanpham where MaSP =' . $item['MaSP'];
						$update = 'update sanpham set SoLuong  = (Soluong-' . $item['SoLuong'] . ') where MaSP = ' . $item['MaSP'];
						execute($update);
					}
					// bị bug không hiểu sao k set tăng giảm số lượng sản phẩm được

				}
				break;
			case 'change2': // xử lý hoá donw => đang xử lý
				if (isset($_POST['MaHD'])) {
					$id = $_POST['MaHD'];
					// 0 đang xử lý 
					// 1 đã xử lý
					$sql = 'update hoadon set TrangThai = 0 where MaHD = ' . $id;

					execute($sql);
					$getmasp = 'SELECT MaSP,SoLuong FROM cthoadon where MaHD =' . $id;
					$dssanpham = executeResult($getmasp);
					foreach ($dssanpham as $item) {
					//	$getsoluong = 'select SoLuong from sanpham where MaSP =' . $item['MaSP'];
						$update = 'update sanpham set SoLuong  = (Soluong +' . $item['SoLuong'] . ') where MaSP = ' . $item['MaSP'];
						execute($update);
					}

				}
				break;

			case 'deleteloai': // xử lý hoá donw => đang xử lý
				if (isset($_POST['id'])) {
					$id = $_POST['id'];
					// 0 đang xử lý 
					// 1 đã xử lý
					$sql = 'delete from loai where MaLoai = ' . $id;
					execute($sql);
				}
				break;
			case 'deletencc': // xử lý hoá donw => đang xử lý
				if (isset($_POST['id'])) {
					$id = $_POST['id'];
					// 0 đang xử lý 
					// 1 đã xử lý
					$sql = 'delete from nhacungcap where MaNCC	 = ' . $id;
					execute($sql);
				}
				break;
			case 'deletenv': // xử lý hoá donw => đang xử lý
				if (isset($_POST['id'])) {
					$id = $_POST['id'];
					// 0 đang xử lý 
					// 1 đã xử lý
					$sql = 'delete from nhanvien where MaNV	 = ' . $id;
					execute($sql);
				}
				break;
			case 'deletekh': // xử lý hoá donw => đang xử lý
				if (isset($_POST['id'])) {
					$id = $_POST['id'];
					// 0 đang xử lý 
					// 1 đã xử lý
					$sql = 'delete from khachang where MaKH	 = ' . $id;
					execute($sql);
				}
				break;
			case 'deletedv': // xử lý hoá donw => đang xử lý
				if (isset($_POST['id'])) {
					$id = $_POST['id'];
					// 0 đang xử lý 
					// 1 đã xử lý
					$sql = 'delete from donvi where MaDV	 = ' . $id;
					execute($sql);
				}
				break;
			case 'deletephieunhap': // xử lý hoá donw => đang xử lý
				if (isset($_POST['id'])) {
					$id = $_POST['id'];
					// 0 đang xử lý 
					// 1 đã xử lý
					$sql = 'delete from phieunhap where MaPN	 = ' . $id;
					execute($sql);
				}
				break;

			case 'unlockaccount': // xử lý hoá donw => đang xử lý
				if (isset($_POST['id'])) {
					$id = $_POST['id'];
					// 0 đang xử lý 
					// 1 đã xử lý
					$sql = 'update khachhang set TinhTrang = 1 where id = ' . $id;
					execute($sql);
				}
				break;

			case 'lockaccount': // xử lý hoá donw => đang xử lý
				if (isset($_POST['id'])) {
					$id = $_POST['id'];
					// 0 đang xử lý 
					// 1 đã xử lý
					$sql = 'update khachhang set TinhTrang = 0 where id = ' . $id;
					execute($sql);
				}
				break;
		}
	}
}
