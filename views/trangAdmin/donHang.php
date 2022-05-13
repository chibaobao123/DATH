
<table class="table-hoaDon">
    <thead class="thead-light">
        <tr style="color:#fff">
            <th scope="col">id</th>
            <th scope="col">Tên khách hàng</th>
            <th scope="col">Ngày</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Công cụ</th>
        </tr>
    </thead>
    <tbody id="tbody">
    </tbody>
</table> 


<div id="modalHoaDon" class="modalHoaDon">
    <div class="modalContent animateHoaDon">
        <div class="cancleIconBody">
            <span onclick="document.getElementById('modalHoaDon').style.display='none'" class="closeIcon" title="Close Modal">&times;</span>
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
