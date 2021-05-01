<?php
require_once('../libs/dbhelper.php');
require_once('../libs/utility.php');

?>
<?php
include('./header.php');
include('./navbar.php');
?>
<div class="container-fluid">
    <center>
        <h2>QUẢN LÝ HOÁ ĐƠN</h2>
    </center>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th width="50px">Mã Hoá Đơn </th>
                <th width="150px">Mã KH</th>
                <th width="150px">Mã NV</th>
                <th width="100px">Ngày Lập</th>
                <th width="100px">Tổng Tiền</th>
                <th width="100px">Địa Chỉ</th>
                <th width="100px">Trạng Thái</th>
                <th width="100px"></th>

            </tr>
        </thead>
        <?php
        //Lay danh sach danh muc tu database

        $sql = "select * from hoadon";
        $dshoadon = executeResult($sql);
        foreach ($dshoadon as $row) {
            $trangthai = '<td> <button  class="btn btn-danger" onclick="changetrangthai(' . $row['MaHD'] . ')">Đang xử lý</button> </td>';
            if ($row['TrangThai'] == 1) {
                $trangthai = '<td><button class="btn btn-primary"   onclick="changetrangthai2(' . $row['MaHD'] . ')">Đã xử lý</button></td>';
            }
        ?>
            <tbody>

                <td><?php echo $row['MaHD'];  ?></td>
                <td><?php echo $row['MaKH'];  ?></td>
                <td><?php echo $row['MaNV'];  ?></td>
                <td><?php echo $row['NgayLap'];  ?></td>
                <td><?php echo $row['TongTien'];  ?></td>
                <td><?php echo $row['DiaChiGiaoHang'];  ?></td>

                <?php echo $trangthai; ?>
                <td><a href="#" class="btn btn-success get_id" data-id='<?php echo $row["MaHD"] ?>' data-toggle="modal" data-target="#myModal">Chi
                        Tiết</a></td>




            </tbody>
        <?php
        }
        ?>
    </table>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">CHI TIẾT HOÁ ĐƠN</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body" id="load_data">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    



</div>



<script type="text/javascript">
    function changetrangthai(id) {
        var option = confirm('Bạn có muốn cập nhật trạng thái đơn hàng không ?')
        if (!option) {
            return;
        }

        console.log(id)
        $.post('ajax.php', {
            'MaHD': id,
            'action': 'change'
        }, function(data) {
            location.reload()
        })
    }

    function changetrangthai2(id) {
        var option = confirm('Bạn có muốn cập nhật trạng thái đơn hàng không ?')
        if (!option) {
            return;
        }

        console.log(id)
        $.post('ajax.php', {
            'MaHD': id,
            'action': 'change2'
        }, function(data) {
            location.reload()
        })
    }
</script>

<script>
        $(document).ready(function() {
            $(".get_id").click(function() {
                var ids = $(this).data('id');
                $.ajax({
                    url: "chitiethoadon.php",
                    method: 'post',
                    data: {
                        id : ids
                    },
                    success: function(data) {

                        $('#load_data').html(data);

                    }

                });
            });

        });
    
    </script>
    
    
<?php

include('./footer.php');
?>