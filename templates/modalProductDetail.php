
<!-- MODAL INFO PRODUCT -->
<div class="modal fade" tabindex="-1" role="dialog" id="detailModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chi tiết sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="detail-main">
                    <div class="detail-image">
                        <img src="" alt="Hinh-anh" id="detail-img" style="width: 100%;">
                    </div>
                    <div class="detail-content">
                        <input type="number" hidden id="maSP">
                        <h3 id="detail-title">Tên món</h3>
                        <p id="detail-description">Mô tả</p>
                        <span id="detail-quantity">
                            <label for="quantity">Số lượng:</label>
                            <input type="number" class="detail-input mx-2" id="quantity" name="quantity" value="1" min="1" max="10">
                            <input type="number" id="max-quantity" hidden>
                        </span>
                        <div class="detail-price">
                            <h4>Đơn giá:</h4>
                            <h4 id="price-total"></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn"onclick="themVaoGio();">Thêm vào giỏ hàng</button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL INFO PRODUCT -->