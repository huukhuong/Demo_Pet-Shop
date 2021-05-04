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
        <h2>QUẢN LÝ SẢN PHẨM</h2>
    </center>
    <a href="./addproduct.php">
        <button class="btn btn-success" style="margin-bottom: 15px;">Thêm Sản Phẩm</button>
    </a>
    <!-- <form>
        <select name="sapxep" id="sapxep">
            <option value="tang">TANG</option>
            <option value="giam">GIAM</option>
            
        </select>
        <input type="submit" value="submit">
    </form> -->
    <div class="table-responsive" id="product-pagination">
        <!-- ĐỔ DATABASE PHÂN TRANG -->
    </div>

</div>
<script type="text/javascript">
    function deleteProduct(id) {
        var option = confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?')
        if (!option) {
            return;
        }

        console.log(id)
        $.post('ajax.php', {
            'id': id,
            'action': 'delete'
        }, function(data) {
            location.reload()
        })
    }

    loadData_pagination('ASC');
    
    var typeSort = 'ASC';
    var column = 'MaSP';

    function changeIdSort() {
        column = 'MaSP';
        typeSort = typeSort == 'DESC' ? 'ASC' : 'DESC';
        loadData_pagination();
    }

    function changeNameSort() {
        typeSort = typeSort == 'DESC' ? 'ASC' : 'DESC';
        column = 'TenSP';
        loadData_pagination();
    }

    function changeQuantitySort() {
        typeSort = typeSort == 'DESC' ? 'ASC' : 'DESC';
        column = 'SoLuong';
        loadData_pagination();
    }

    function changePriceSort() {
        typeSort = typeSort == 'DESC' ? 'ASC' : 'DESC';
        column = 'DonGia';
        loadData_pagination();
    }

    function loadData_pagination(page) {
        console.log(column)
        $.ajax({
            url: "./service/product-pagination.php",
            method: "GET",
            data: {
                page: page,
                column: column,
                type: typeSort
            },
            success: function(data) {
                $('#product-pagination').html(data);
            }
        });
    }

</script>

<?php

include('./footer.php');
?>