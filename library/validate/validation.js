
function kiemtrausername(u) {
	if (u == "") {
		thongbaoloi("Tên tai khoản không được để trống !");
		return false;
	}
	if (/^[a-zA-Z0-9]+$/.test(u)) {
		return true;
	}
	thongbaoloi("Tên tài khoản không được để trống !!!");
	return false;
}

function kiemtraten(ten) {
	if (ten == "" ) {
		thongbaoloi("Tên không được bỏ trống!!!");
		return false;
	}
	if (ten.length < 7) {
		thongbaoloi("Tên không được ít hơn 7 kí tự!!!");
		return false;
	}
	return true;
}

function kiemtraemail(email) {
	if (email == "") {
		thongbaoloi("Email không được để trống !");
		return false;
	}
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
		return (true)
	}
	thongbaoloi("Bạn đã nhập một địa chỉ email không hợp lệ !!!");
	return (false);
}

function kiemtrasdt(sdt) {
	if (sdt == "") {
		thongbaoloi("Số điện thoại không được để trống !!!");
		return false;
	}
	if (sdt.length < 10 || sdt.length > 11) {
		thongbaoloi("Số điện thoại không hợp lệ !!!");
		return false;
	}
	return true;
}

function kiemtramatkhau(mk) {
	if (mk.trim() == "") {
		thongbaoloi("Mật khẩu không được bỏ trống!!!");
		return false;
	}
	if (mk.trim().length < 6) {
		thongbaoloi("Mật khẩu phải nhiều hơn 6 ký tự!!!");
		return false;
	}

	return true;
}