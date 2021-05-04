<?php
require_once('../libs/dbhelper.php');
$madv = $tendv = $id  = '';
if (isset($_GET['id'])) {
	$idsp      = $_GET['id'];
	$sql     = 'select * from donvi where MaDV = ' . $idsp;
	$product = executeSingleResult($sql);
	if ($product != null) {
		$madv = $product['MaDV'];
	 	$tendv = $product['TenDV'];
	}
}

if (!empty($_POST)) {
	if (isset($_POST['tendv'])) {
		$tendv = $_POST['tendv'];
		$tendv = str_replace('"', '\\"', $tendv);
	}
	if (isset($_POST['madv'])) {
		$madv = $_POST['madv'];
		$madv = str_replace('"', '\\"', $madv);
	}

	if (isset($_POST['id'])) {
		$id = $_POST['id'];
	}

	if (!empty($tendv)) {

		//Luu vao database
		if ($id == '') {
			$sql = 'insert into donvi (TenDV) values ( "' . $tendv . '")';
		} else {
			$sql = 'update donvi set  TenDV = "' . $tendv . '" where MaDV = "' . $id . '" ';
		}
		execute($sql);

		header('Location: ./donvi.php');

		die();
	}
}

if (isset($_GET['id'])) {
	$id      = $_GET['id'];
	$sql     = 'select * from donvi where MaDV = ' . $id;
	$product = executeSingleResult($sql);
	if ($product != null) {
		$tendv = $product['TenDV'];
		$madv = $product['MaDV'];
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
			<label for="tensp">Tên Đơn Vị:</label>
			<input type="text" name="id" value="<?= $id ?>" hidden="true">
			<input required="true" type="text" class="form-control" id="tendv" name="tendv" value="<?= $tendv ?>">
		</div>


		<button class="btn btn-success">Lưu</button>
	</form>

</div>
  <?php

include('./footer.php');
?>