<div class='container text-white my-4 py-5 px-0 profile_khachhang rounded rounded-pill' id='profile_khachhang'></div>

<div class="modal fade" id="form_chinhsua_img" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div id="btn-chon-anh" class='d-flex justify-content-center'>
                    <button id='chon_anh' class=''>Chọn ảnh từ thư viện</button>
                </div>
                <div id="old_img_avatar" class='d-flex justify-content-center'>

                </div>
                <form action="upload.php"
                    id="form_upload_anh" 
                    method="post"
                    enctype="multipart/form-data">

                    <input type="file"
                        class="d-none"
                        id="chossen_file_img">

                    <input type="submit" 
                        class="d-none"
                        id="submit" 
                        value="Cập nhật ảnh">
                </form>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        

        getProfile();

        function getProfile() {
            var ten_khachhang = $('.ten-khach-hang-navbar-hide').text();
                // console.log(ten_khachhang);

            $.ajax({
            url: '../api/thongtin_khachhang/thongtin_khachhang.php?user='+ten_khachhang,
            type: 'GET',
            cache: false,
            data: {
                action : 'thongtin_khachhang',
                ten : ten_khachhang,
            },
            success: function(data) {
                // console.log(data);
                var data_profile = $.parseJSON(data);
                addProfile(data_profile);
            }
            });
        }

        function addProfile(data) {
            let html = "";
            let old_img_avatar = "";
            for (let i = 0; i < data.length; i++) {
                html += "<div class='row'>";
                    html += "<div class='col-3 d-flex justify-content-center align-items-center container-img-avatar-profile'>";

                    if(data[i].avatar == ''){
                        html += "<img class='img-avatar-profile rounded-circle' src='https://via.placeholder.com/150' height='200' width='200'/>";
                        old_img_avatar += "<img class='img-avatar-profile-preview rounded-circle' src='https://via.placeholder.com/150' height='200' width='200'/>";
                    } else {
                        html += "<img class='img-avatar-profile rounded-circle' src='../asset/img_user/" + data[i].avatar +"' height='200' width='200'/>";
                        old_img_avatar += "<img class='img-avatar-profile-preview rounded-circle' src='../asset/img_user/" + data[i].avatar +"' height='200' width='200'/>";
                    }

                    html += "<div class='middle'>";
                    html += "<button class='btn btn-secondary' data-toggle='modal' data-target='#form_chinhsua_img'>Chỉnh sửa</button>";
                    html += "</div>";
                    html+= "</div>";
                    html += "<div class='col-5'>";
                        html += "<div class='px-0'>";
                            html += "<div class='hovaten_profile py-2'>";
                            html += "<b>Họ và tên : </b> <span class='hovaten'>"+ data[i].ten +"</span>";
                            html+= "</div>";
                            html += "<div class='sex_profile py-2'>";
                            html += "<b>Giới tính : </b> <span class='sex'>"+ data[i].sex +"</span>"; 
                            html+= "</div>";
                            html += "<div class='sdt_profile py-2'>";
                            html += "<b>Số điện : </b> <span class='sdt'>"+ data[i].sdt +"</span>"; 
                            html+= "</div>";
                            html += "<div class='email__profile py-2'>";
                            html += "<b>Email : </b> <span class='email'>"+ data[i].email +"</span>";
                            html+= "</div>";
                            html += "<div class='diachi_profile py-2'>";
                            html += "<b>Địa chỉ : </b> <span class='diachi'>" + data[i].dia_chi + "</span>"; 
                            html+= "</div>";
                        html+= "</div>";
                    html+= "</div>";
                    html += "<div class='col-4'>";
                        html += "<div class='sodon_profile py-2'>";
                        html += "<b>Số đơn : </b> <span class='sodon'>" + data[i].so_don + "</span>";
                        html+= "</div>";
                        html += "<div class='diemtichluy_profile py-2'>";
                        html += "<b>Số điểm tích lũy : </b> <span class='sodon'>" + data[i].diem_tich_luy + "</span>";
                        html+= "</div>";
                        html += "<div class='sodon_profile py-2'>";

                        if(data[i].diem_tich_luy >= 0 && data[i].diem_tich_luy < 1000){
                            html += "<b>Thành viên : </b> <span class='sodon text-warning'>Vàng <i class='fas fa-crown'></i></span><br/>";
                        } else if(data[i].diem_tich_luy > 1000 && data[i].diem_tich_luy < 2000){
                            html += "<b>Thành viên : </b> <span class='sodon text-warning'>Vàng <i class='fas fa-crown'></i></span><br/>";
                        } else if(data[i].diem_tich_luy > 2000 && data[i].diem_tich_luy < 3000){
                            html += "<b>Thành viên : </b> <span class='sodon text-warning'>Vàng <i class='fas fa-crown'></i></span><br/>";
                        } else if(data[i].diem_tich_luy > 3000){
                            html += "<b>Thành viên : </b> <span class='sodon text-warning'>Vàng <i class='fas fa-crown'></i></span><br/>";
                        }

                        html += "</div>";
                        html += "<button type='button' class='btn btn-primary mt-3' data-toggle='modal' data-target='#form_sua_thong_tin'>Sửa thông tin</button>"
                    html += "</div>";
                html += "</div>";
            }
            
            // console.log(html)

            $('.profile_khachhang').html(html)
            $('#old_img_avatar').html(old_img_avatar)
        }

        $('#chon_anh').click(function() {

            $('#chossen_file_img').trigger('click');

            $('#chossen_file_img').on('change', function(e) {

                event.preventDefault();

                const previewImage = $('.img-avatar-profile-preview');

                var b = $('#chossen_file_img').val();

                // console.log(b);

                const file = this.files[0];
                console.log(file);

                if (file) {
                    const reader = new FileReader();

                    reader.addEventListener("load", function() {
                        console.log(this.result);
                        previewImage.attr("src", this.result);
                    });

                    reader.readAsDataURL(file);
                }
                    
            })
        })

        
    })
</script>