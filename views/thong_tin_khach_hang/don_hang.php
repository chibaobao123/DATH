<div class='thongtin_chitiet_donhang container' style='display:none'>
    <div class='select-button-donhang '>
        <button class='ml-0'id='btn_quaylai' style='font-size:1.5rem;'><i class='fas fa-arrow-left pl-3 pr-3'></i>Quay lại</button>
    </div>

    <div id='' class='mt-1'>
        <div class='container table_sanpham text-light my-2 d-flex  align-items-center p-4' id='tinhTrangDonHang'>
            
        </div>

        <div class='container table_sanpham  text-light mt-1' >
            <div class='row title_sanpham_order  py-5' id= 'chi_tiet_san_pham'></div>
            <div class='chitiet_tien_sanpham pt-2 mt-2 container' id='thong_khach_hang_order'></div>
            <div class='tongtien_sanpham d-flex justify-content-end pb-2 mb-2'>
                <div class='tong_tien_content'>Tổng tiền:</div>
                <div class='tong_tien'></div>
            </div>
            <div class='d-flex bd-highlight mb-3'>
                <div class='mr-auto p-2 bd-highlight'>
                </div>
                <div class='p-2 bd-highlight'>
                    <div class='btn_lienhe_nhanhang pb-4 h-100 d-flex justify-content-end align-self-center'>
                        <button class='danhanhang'>Đã nhận hàng</button>
                        <button class='lienhenguoiban'>Liên hệ người bán</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type='text/javascript'>
    $(document).ready(function() {
        $('#btn_quaylai').on('click', function(){
            $('.thongtin_chitiet_donhang').toggle();
            $('.tongthe_sanpham_donhang').toggle();
        })
    })
</script>