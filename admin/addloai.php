<?php
require_once('../libs/dbhelper.php');
$maloai = $tenloai = $id  = '';
if (isset($_GET['id'])) {
	$idsp      = $_GET['id'];
	$sql     = 'select * from loai where MaLoai = ' . $idsp;
	$product = executeSingleResult($sql);
	if ($product != null) {
		$maloai = $product['MaLoai'];
	 	$tenloai = $product['TenLoai'];
	}
}

if (!empty($_POST)) {
	if (isset($_POST['tenloai'])) {
		$tenloai = $_POST['tenloai'];
		$tenloai = str_replace('"', '\\"', $tenloai);
	}
	if (isset($_POST['maloai'])) {
		$maloai = $_POST['maloai'];
		$maloai = str_replace('"', '\\"', $maloai);
	}

	if (isset($_POST['id'])) {
		$id = $_POST['id'];
	}

	if (!empty($tenloai)) {

		//Luu vao database
		if ($id == '') {
			$sql = 'insert into loai (TenLoai) values ( "' . $tenloai . '")';
		} else {
			$sql = 'update loai set  TenLoai = "' . $tenloai . '" where MaLoai = "' . $id . '" ';
		}
		execute($sql);

		header('Location: ./loaisp.php');

		die();
	}
}

if (isset($_GET['id'])) {
	$id      = $_GET['id'];
	$sql     = 'select * from loai where id = ' . $id;
	$product = executeSingleResult($sql);
	if ($product != null) {
		$tenloai = $product['TenLoai'];
		$maloai = $product['MaLoai'];
	}
}

?>



<?php
include('./header.php'); 
include('./navbar.php'); 
?>
<?php
require_once('../libs/dbhelper.php');
require_once('../libs/utility.php');
?>
<div class="container-fluid">

<center>
		<h2>QUẢN LÝ LOẠI</h2>
	</center>
	<form method="post">
		<div class="form-group">
			<label for="temsp">Tên Loại:</label>
			<input type="text" name="id" value="<?= $id ?>" hidden="true">
			<input required="true" type="text" class="form-control" id="tenloai" name="tenloai" value="<?= $tenloai ?>">
		</div>


		<button class="btn btn-success">Lưu</button>
	</form>

</div>
  <?php

include('./footer.php');
?>