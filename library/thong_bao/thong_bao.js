function thongbao(msg) {
	$.toast({
		heading: 'Thông báo',
		text: msg,
		icon: 'info'
	});
};

function thongbaotot(msg) {
	$.toast({
		heading: 'Thành công!!!',
		text: msg,
		icon: 'success'
	});
};

function thongbaoloi(msg) {
	$.toast({
		heading: 'Lỗi',
		text: msg,
		icon: 'error'
	});
};