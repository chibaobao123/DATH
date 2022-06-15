<div class="chonTrangThaiHoaDon grid wide" style="margin:20px 40px">
    <div class="row">
        <div class="l-8 m-12 c-12">
            <button onclick=" renderHoaDonTheoTrangThai('', 'Tất cả đơn hàng')">TẤT CẢ</button>
            <button onclick=" renderHoaDonTheoTrangThai('1', 'Đơn hàng đang được chờ xác nhận')">CHỜ XÁC NHẬN</button>
            <button onclick=" renderHoaDonTheoTrangThai('2', 'Đơn hàng đang trong quá trình đợi')">CHỜ LẤY HÀNG</button>
            <button onclick=" renderHoaDonTheoTrangThai('3', 'Đơn hàng đang được giao')">ĐANG GIAO</button>
            <button onclick=" renderHoaDonTheoTrangThai('4', 'Đơn hàng đang được giao')">ĐÃ NHẬN HÀNG</button>
            <button onclick=" renderHoaDonTheoTrangThai('5', 'Đơn hàng đã hủy')">ĐÃ HỦY</button>
        </div>
        <div class="timKiemHoaDon l-4 m-0 c-0 ">
            <input type="text" id="inpTimKiemHoaDon" onkeyup="timKiemHoaDon()" name="timKiemHoa" class="form-control" placeholder="Tìm kiếm hóa đơn tại đây"/>
            <button class="btnTimKiemHoaDon btn btn-secondary" style='padding:5px 20px'><i class='bx bx-search'></i></button>
        </div>
    </div>
</div>
<table class="table-hoaDon">
    <thead class="thead-light">
        <tr style="color:#fff">
            <th scope="col">id</th>
            <th scope="col">Tên khách hàng</th>
            <th scope="col">Ngày đặt hàng</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Người giao hàng</th>
            <th scope="col">Công cụ</th>
        </tr>
    </thead>
    <tbody id="tbody">
    </tbody>
</table> 


<div id="modalHoaDon" class="modalHoaDon">
    <div class="modalContent animateHoaDon">
        <div class="cancleIconBody">
            <span onclick="document.getElementById('modalHoaDon').style.display='none'" class="closeIcon" Đơn hàng đang được giao="Close Modal">&times;</span>
        </div>

        <div style="padding: 16px; margin-top:50px" id="chiTietHoaDon">

        </div>
        <div  style="background-color:#f1f1f1; padding: 16px;">
            <button type="button" onclick="document.getElementById('modalHoaDon').style.display='none'" class="btn cancelbtn">Cancel</button>
            <div id="btnTrangThai" style="display:inline-block"></div>
            <div id="thongBao" style="display:inline-block;"></div>
        </div>
    </div>
</div>
