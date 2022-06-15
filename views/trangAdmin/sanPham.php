<div class="congCu grid wide">
    <div class="row">
        <div class="l-8 m-12 c-12">
            <h1>Công cụ xử lý</h1>
        </div>
        <div class="l-4 m-0 c-0" style="display:flex; justify-content: flex-end; padding : 0 20px;">
            <button class="btn btn-primary" onclick="document.getElementById('changeCardToListAndReverse_icon').click()" id="changeCardToListAndReverse"><span id="changeCardToListAndReverse_icon" onclick="changeCardToListAndReverse()"><i class='bx bx-credit-card-front'></i></span></button>
            <button class="btn btn-success" onclick="document.getElementById('modalThemSanPham').style.display='block'"><i class='bx bx-add-to-queue' ></i></button>
        </div>
    </div>
</div>

<div class="grid wide" style="max-width: 1350px;">
    <div class="row sanPhamBody" id="sanPhamBody">

    </div>
</div>


<div style="padding: 16px; margin-top:50px ;display:none;" id="formThayDoiAnhSanPham">
    <div class="modal-body ">
        <form 
            id="form_upload_anh" 
            method="post"
            class='d-flex justify-content-center'
            enctype="multipart/form-data">

            <input type="file"  
                class="d-none"
                id="chossen_file_img">

            <input type="submit" 
                id="chon_anh_submit" 
                value="Cập nhật ảnh">
        </form>
    </div>
</div>
   

<div id="modalThemSanPham" class="modal">
    <div class="modalContent animateHoaDon" >
        <div class="cancleIconBody">
            <span onclick="document.getElementById('modalThemSanPham').style.display='none'" class="closeIcon" title="Close Modal">&times;</span>
        </div>

        <div style="padding: 16px; margin-top:50px;" id="themSanPham">
            <div style="margin:10px">
                <button type="button" class="btn btn-light" id="btnThemMotSanPham" onclick="openTabSanPham(event, 'themMotSanPham', 'btnthemMotSanPham')">thêm sản phẩm</button>
                <button type="button" class="btn btn-light" id="btnThemNhieuSanPham" onclick="openTabSanPham(event, 'themNhieuSanPham', 'btnthemNhieuSanPham')">thêm nhiều sản phẩm</button>
            </div>

            <div class="congCu grid wide tabThemSanPham" id="themMotSanPham">
                <h1 class="">Thêm sản phẩm mới</h1>
                <div class="row">
                    <div class="l-6 m-6 c-12" style="border-right:3px solid #adadad;height: 400px;display:flex; justify-content:center; align-items:center;cursor:pointer;">
                        <div class="holdImg" style="padding:20px;display:flex; justify-content:center; align-items:center;" onclick="chonAnhThemSanPham()">
                            <i class='bx bx-image-add' style="font-size: 30px;padding: 30px; border:3px solid #adadad; color: #adadad; border-radius:50%"></i>
                            <img src="" style="display:none" width="70%" id="holdImg"/>
                            <span id="holdImgName" style="display:none"></span>
                        </div>
                    </div>
                    <div class="l-6 m-6 c-12">
                        <form style="padding: 20px;" >
                            <div class="form-group">
                                <label for="" class="">Tên sản phâm:</label>
                                <input type="text" class="form-control" placeholder="Nhập tên sản phẩm tại đây" required/>
                            </div>
                            <div class="form-group">
                                <label for="" class="">Gía sản phâm:</label>
                                <input class="form-control" type="number" placeholder="Nhập giá sản phẩm tại đây" required/>
                            </div>
                            <div class="form-group">
                                <label for="" class="">Thể loại sản phâm:</label>
                                <input class="form-control" type="text" placeholder="Nhập thể loại sản phẩm tại đây" required/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="congCu grid wide tabThemSanPham tabThemNhieuSanPham" id="themNhieuSanPham" >
                <h1 class="" style="display:inline-block;">Thêm sản phẩm mới</h1>
                <button id="themHangThemSanPham" onclick="themHangChoTableThemSanPham()" class="btn btn-success" style="margin: 0 20px"><i class='bx bx-plus-medical'></i></button>
                <table class="table-hoaDon table" style = "margin: 10px 0; padding: 16px; overflow:auto">
                    <thead class="thead-light">
                        <tr style="color:#fff">
                            <th scope="col">hình ảnh</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Thể loại</th>
                        </tr>
                    </thead>
                    <tbody id="tbody_ThemSanPham" class="tbody_ThemSanPham" style="text-align: center">
                        <tr>
                            <td id="img_themSanPham_0">
                                <input type="file" id="fileInput_0" accept="image/png, image/jpeg" onchange="chonAnhChoThemNhieuSanPham('img_themSanPham__0','previewImg_0','fileInput_0')">
                                <label for="fileInput_0" style="cursor:pointer">
                                    <i class='bx bx-plus-medical'></i> &nbsp; Tải ảnh lên
                                </label>
                                <img id="previewImg_0" class="previewImg_none"  src="https://via.placeholder.com/150" height="50" width="50"/>
                            </td>
                            <td><input type="text" placeholder="Điền tên vào đây...."/></td>
                            <td><input type="number" placeholder="Điền giá vào đây...."/></td>
                            <td><input type="text" placeholder="Điền thể loại sản phẩm vào đây...."/></td>
                        </tr>
                        
                    </tbody>
                </table> 
            </div>
        </div>
        <div  style="background-color:#f1f1f1; padding: 16px;">
            <button type="button" onclick="document.getElementById('modalThemSanPham').style.display='none'" class="btn cancelbtn">Cancel</button>
            <button type="button" class="btnThemSanPham btn btn-success" id="btnthemMotSanPham"  onclick="themSanPham()">Thêm sản phẩm mới</button>
            <button type="button" class="btnThemSanPham btn btn-success" id="btnthemNhieuSanPham"  onclick="themNhieuSanPham()">Thêm tất cả sản phẩm mới</button>
            <div id="thongBaoThemSanPham" style="display:inline-block;"></div>
        </div>
    </div>
</div>
