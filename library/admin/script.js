const body = document.querySelector("body"),
  sidebar = body.querySelector("nav"),
  toggle = body.querySelector(".toggle"),
  modeSwitch = body.querySelector(".toggle-switch"),
  modeText = body.querySelector(".mode-text");

let rs = new Array();
let arrLayThongTinHoaDon = [];

getDonHang();
getSanPhamAdmins();

toggle.addEventListener("click", () => {
  sidebar.classList.toggle("close");
});

modeSwitch.addEventListener("click", () => {
  body.classList.toggle("dark");

  if (body.classList.contains("dark")) {
    modeText.innerText = "Light mode";
  } else {
    modeText.innerText = "Dark mode";
  }
});

function openTab(evt, id) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  document.getElementById(id).style.display = "block";
  evt.currentTarget.className += " active";
}

function openTabSanPham(evt, id, btn) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabThemSanPham");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  btnThemSanPham = document.getElementsByClassName("btnThemSanPham");
  for (i = 0; i < tabcontent.length; i++) {
    btnThemSanPham[i].style.display = "none";
  }
  document.getElementById(id).style.display = "block";
  document.getElementById(btn).style.display = "inline-block";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
document.getElementById("btnThemMotSanPham").click();

function getDonHang() {
  let ma_nhahang = document.getElementById("maNhaHang").innerHTML.trim();
  // console.log(ma_nhahang);
  $.ajax({
    url: "../api/don_hang/don_hang_admin.php",
    type: "GET",
    cache: false,
    data: {
      action: "getDataOfProductsSelect",
      ma_nhahang: ma_nhahang,
    },
    success: function (data) {
      // console.log((data));
      let rs_data = $.parseJSON(data).filter((a) => a.tinh_trang != 5);
      let rs_data_tong = $.parseJSON(data);
      // console.log(rs)

      rs.push(rs_data_tong);
      // console.log(rs);

      getDonHangChoAdmins(rs_data);

      getMonAnTrongDonHangChoAdmin(rs_data);

      renderHoaDon(rs_data);
    },
  });
}

function getDonHangChoAdmins(rs) {
  // làm thủ công lấy ra giá trị tương ứng của từng tháng
  // let thang1 = rs.filter(a => a.ngay_dat.split("/")[1] == "1");
  // let thang2 = rs.filter(a => a.ngay_dat.split("/")[1] == "2");
  // let thang3 = rs.filter(a => a.ngay_dat.split("/")[1] == "3");
  // let thang4 = rs.filter(a => a.ngay_dat.split("/")[1] == "4");
  // let thang5 = rs.filter(a => a.ngay_dat.split("/")[1] == "5");
  // let thang6 = rs.filter(a => a.ngay_dat.split("/")[1] == "6");
  // let thang7 = rs.filter(a => a.ngay_dat.split("/")[1] == "7");
  // let thang8 = rs.filter(a => a.ngay_dat.split("/")[1] == "8");
  // let thang9 = rs.filter(a => a.ngay_dat.split("/")[1] == "9");
  // let thang10 = rs.filter(a => a.ngay_dat.split("/")[1] == "10");
  // let thang11 = rs.filter(a => a.ngay_dat.split("/")[1] == "11");
  // let thang12 = rs.filter(a => a.ngay_dat.split("/")[1] == "12");

  //dùng switch case để đếm số lượng đơn từng tháng
  const arrSoLuongDonHangMoiThang = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
  const thang = [
    "tháng 1",
    "tháng 2",
    "tháng 3",
    "tháng 4",
    "tháng 5",
    "tháng 6",
    "tháng 7",
    "tháng 8",
    "tháng 9",
    "tháng 10",
    "tháng 11",
    "tháng 12",
  ];

  for (let item of rs) {
    switch (Number(item.ngay_dat.split("/")[1])) {
      case 1:
        arrSoLuongDonHangMoiThang[0]++;
        break;
      case 2:
        arrSoLuongDonHangMoiThang[1]++;
        break;
      case 3:
        arrSoLuongDonHangMoiThang[2]++;
        break;
      case 4:
        arrSoLuongDonHangMoiThang[3]++;
        break;
      case 5:
        arrSoLuongDonHangMoiThang[4]++;
        break;
      case 6:
        arrSoLuongDonHangMoiThang[5]++;
        break;
      case 7:
        arrSoLuongDonHangMoiThang[6]++;
        break;
      case 8:
        arrSoLuongDonHangMoiThang[7]++;
        break;
      case 9:
        arrSoLuongDonHangMoiThang[8]++;
        break;
      case 10:
        arrSoLuongDonHangMoiThang[9]++;
        break;
      case 11:
        arrSoLuongDonHangMoiThang[10]++;
        break;
      case 12:
        arrSoLuongDonHangMoiThang[11]++;
        break;
    }
  }

  //dùng vòng lập for để đếm sô lượng đơn từng tháng
  // rs.sort((a,b) => {
  //     return Number(a.ngay_dat.split("/")[1]) - Number(b.ngay_dat.split("/")[1])
  // })
  // // console.log(rs)

  // for (let i = 0; i < rs.length; i++) {
  //     if (Number(rs[i].ngay_dat.split("/")[1]) !== prev) {

  //         arrSoLuongDonHangMoiThang.push(1);

  //         let giaTri = 'tháng ' + Number(rs[i].ngay_dat.split("/")[1])
  //         labels.push(giaTri)

  //     } else {

  //         arrSoLuongDonHangMoiThang[arrSoLuongDonHangMoiThang.length - 1]++;

  //     }

  //     prev = Number(rs[i].ngay_dat.split("/")[1]);
  // }
  // console.log("arrSoLuongDonHangMoiThang : ", arrSoLuongDonHangMoiThang);
  // console.log("labels : ", labels);

  // vẽ biểu đồ bằng thư viện chart.js
  const dataSource = {
    labels: thang,
    datasets: [
      {
        label: "Tổng số đơn ",
        backgroundColor: "rgb(255, 99, 132)",
        borderColor: "rgb(255, 99, 132)",
        //   fill: false,
        //   tension: 0.1,
        data: arrSoLuongDonHangMoiThang,
      },
    ],
  };

  const config = {
    type: "bar",
    data: dataSource,
    options: {},
  };

  const myChart = new Chart(document.getElementById("myChart"), config);
}

function getMonAnTrongDonHangChoAdmin(rs) {
  function compare(a, b) {
    // Sử dụng toUpperCase() để chuyển các kí tự về cùng viết hoa
    var typeA = a.ma_monan.toUpperCase();
    var typeB = b.ma_monan.toUpperCase();

    let comparison = 0;
    if (typeA > typeB) {
      comparison = 1;
    } else if (typeA < typeB) {
      comparison = -1;
    }
    return comparison;
  }

  rs.sort(compare);
  // console.log(rs);

  let arrMonAn = [],
    soLuongMoAn = [],
    backgroundColor = [],
    prev;
  for (let i = 0; i < rs.length; i++) {
    if (rs[i].ma_monan !== prev) {
      arrMonAn.push(rs[i].ten_monan);
      soLuongMoAn.push(1);
      // let r = 255;
      // let g = Math.floor(Math.random() * 100) + 1;
      // let b = Math.floor(Math.random() * 100) + 15;

      // console.log(r,g,b)
      // let color = '(' + r + ',' + g + ',' + b + ')';
      // backgroundColor.push(color);
    } else {
      soLuongMoAn[soLuongMoAn.length - 1]++;
    }

    prev = rs[i].ma_monan;
  }
  // console.log("soLuongMoAn : ", soLuongMoAn);
  // console.log("arrMonAn : ", arrMonAn);
  // console.log("backgroundColor : ", backgroundColor);

  // vẽ biểu đồ bằng thư viện chart.js
  const dataSource = {
    labels: arrMonAn,
    datasets: [
      {
        backgroundColor: [
          "rgba(255, 99, 132, 0.2)",
          "rgba(54, 162, 235, 0.2)",
          "rgba(255, 206, 86, 0.2)",
          "rgba(75, 192, 192, 0.2)",
          "rgba(153, 102, 255, 0.2)",
          "rgba(255, 159, 64, 0.2)",
          "rgba(54, 162, 235, 0.2)",
          "rgba(255, 206, 86, 0.2)",
          "rgba(75, 192, 192, 0.2)",
          "rgba(153, 102, 255, 0.2)",
          "rgba(255, 159, 64, 0.2)",
        ],
        borderColor: [
          "rgba(255, 99, 132, 1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(75, 192, 192, 1)",
          "rgba(153, 102, 255, 1)",
          "rgba(255, 159, 64, 1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(75, 192, 192, 1)",
          "rgba(153, 102, 255, 1)",
          "rgba(255, 159, 64, 1)",
          "rgba(255, 99, 132, 1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(75, 192, 192, 1)",
          "rgba(153, 102, 255, 1)",
          "rgba(255, 159, 64, 1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(75, 192, 192, 1)",
          "rgba(153, 102, 255, 1)",
          "rgba(255, 159, 64, 1)",
        ],
        //   fill: false,
        //   tension: 0.1,
        data: soLuongMoAn,
        borderWidth: 1,
        cutout: "50%",
        borderRadius: 10,
      },
    ],
  };

  // doughnutLabelsLine plugin
  const doughnutLabelsLine = {
    id: "doughnutLabelsLine",
    afterDraw(chart, args, options) {
      const {
        ctx,
        chartArea: { top, bottom, left, right, width, height },
      } = chart;
      // console.log(chart.data.datasets);
      chart.data.datasets.forEach((dataset, i) => {
        chart.getDatasetMeta(i).data.forEach((datapoint, i) => {
          const { x, y } = datapoint.tooltipPosition();

          const halfwidth = width / 2;
          const halfheight = height / 2;

          const xLine = x >= halfwidth ? x + 50 : x - 50;
          const yLine = y >= halfheight ? y + 50 : y - 50;
          const extraLine = x >= halfwidth ? 10 : -10;

          //
          ctx.beginPath();
          ctx.moveTo(x, y);
          ctx.lineTo(xLine, yLine);
          ctx.lineTo(xLine + extraLine, yLine);
          ctx.strokeStyle = dataset.borderColor[i];
          ctx.stroke();

          const textWidth = ctx.measureText(chart.data.labels[i]).width;
          ctx.font = "16px Arial";

          // control the position
          const textPosition = x >= halfwidth ? "left" : "right";
          const plusFivePx = x >= halfwidth ? 10 : -10;
          ctx.textAlign = textPosition;
          ctx.textBaseline = "middle";
          ctx.fillStyle = dataset.borderColor[i];
          ctx.fillText(
            chart.data.labels[i],
            xLine + extraLine + plusFivePx,
            yLine
          );
        });
      });
    },
  };

  const config = {
    type: "doughnut",
    data: dataSource,
    options: {
      // layout: {
      //   padding: 20,
      // },
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        },
      },
    },
    plugins: [doughnutLabelsLine],
  };

  const doughnutMonAn = new Chart(
    document.getElementById("doughnutMonAn"),
    config
  );
}

function renderHoaDon(rs) {
  let arrHoaDon = [];

  // console.log(arrHoaDon, rs);

  function compareName(a, b) {
    // Sử dụng toUpperCase() để chuyển các kí tự về cùng viết hoa
    var typeA = a.username.toUpperCase();
    var typeB = b.username.toUpperCase();

    let comparison = 0;
    if (typeA > typeB) {
      comparison = 1;
    } else if (typeA < typeB) {
      comparison = -1;
    }
    return comparison;
  }

  function compareDate(a, b) {
    // Sử dụng toUpperCase() để chuyển các kí tự về cùng viết hoa
    var typeA = a.ngay_dat.toUpperCase();
    var typeB = b.ngay_dat.toUpperCase();

    let comparison = 0;
    if (typeA > typeB) {
      comparison = 1;
    } else if (typeA < typeB) {
      comparison = -1;
    }
    return comparison;
  }

  function compareState(a, b) {
    // Sử dụng toUpperCase() để chuyển các kí tự về cùng viết hoa
    var typeA = a.tinh_trang.toUpperCase();
    var typeB = b.tinh_trang.toUpperCase();

    let comparison = 0;
    if (typeA > typeB) {
      comparison = 1;
    } else if (typeA < typeB) {
      comparison = -1;
    }
    return comparison;
  }

  rs.sort(compareName);
  rs.sort(compareDate);
  rs.sort(compareState);
  // console.log(rs);

  let arr, user, date, prev;

  for (let i = 0; i < rs.length; i++) {
    if (rs[i].username !== prev) {
      arr = {
        name: rs[i].username,
        date: rs[i].ngay_dat,
        trangThai: rs[i].tinh_trang,
        shipper: rs[i].shipper,        
        data: [rs[i]],
      };

      arrHoaDon.push(arr);
    } else {
      if (rs[i].username === prev && rs[i].ngay_dat !== date) {
        arr = {
          name: rs[i].username,
          date: rs[i].ngay_dat,
          trangThai: rs[i].tinh_trang,
          shipper: rs[i].shipper,          
          data: [rs[i]],
        };

        arrHoaDon.push(arr);
      } else {
        user = arrHoaDon.find((a) => a.date === rs[i].ngay_dat);
        // console.log(user)
        user.data.push(rs[i]);
        // console.log(user)
      }
    }

    // console.log('arrHoaDon', arrHoaDon);

    prev = rs[i].username;

    date = rs[i].ngay_dat;
  }

  // console.log(user)

  // console.log('arrHoaDon', arrHoaDon);

  arrLayThongTinHoaDon = [...arrHoaDon];

  let dem = 1;
  let html = arrLayThongTinHoaDon.map((a) => {
    // console.log(a);
    let trang_thai = "";

    checkTrangThai(a.trangThai);

    function checkTrangThai(trangthai) {
      if (trangthai == 1) {
        trang_thai = `<span style="color:#ed5e54">CHỜ XÁC NHẬN</span>`;
      } else if (trangthai == 2) {
        trang_thai = `<span style="color:#c0a904">CHỜ LẤY HÀNG</span>`;
      } else if (trangthai == 3) {
        trang_thai = `<span style="color:#007bff">ĐANG GIAO</span>`;
      } else if (trangthai == 4) {
        trang_thai = `<span style="color:#04AA6D">ĐÃ NHẬN</span>`;
      } else if (trangthai == 5) {
        trang_thai = `<span style="color:red">ĐÃ HỦY</span>`;
      }
    }

    return `
      <tr class="tenKhachHangHoaDon" style="cursor: pointer;text-align:center" onclick=layThongTinHoaDon('${a.name}','${a.date}','${a.trangThai}')>
        <th scope="row">${dem++}</th>
        <td>${a.name}</td>
        <td>${a.date}</td>
        <td>${trang_thai}</td>
        <td>${a.shipper}</td>
        <td><i class='bx bx-receipt' onclick=layThongTinHoaDon('${a.name}','${a.date}','${a.trangThai}',${a.ly_do_huy})></i></td>
      </tr>
    `;
  });

  document.getElementById("tbody").innerHTML = html;
  // arrHoaDon = [];
  // console.log(arrHoaDon);
}

function timKiemHoaDon() {
  let inp = document.getElementById('inpTimKiemHoaDon').value.trim();
  let ma_nhahang = document.getElementById("maNhaHang").innerHTML.trim();
  let  arrHoaDonTimKiem = [];
  // console.log(inp);
  // console.log(arrLayThongTinHoaDon);

  // console.log(str.toLocaleUpperCase().indexOf(st.toLocaleUpperCase()) > -1)

  let date = arrLayThongTinHoaDon.filter(a => a.date.toLocaleUpperCase().indexOf(inp.toLocaleUpperCase()) > -1);
  let name = arrLayThongTinHoaDon.filter(a => a.name.toLocaleUpperCase().indexOf(inp.toLocaleUpperCase()) > -1);

  for (let i of name){
    arrHoaDonTimKiem.push(i)
  }

  for (let i of date){
    arrHoaDonTimKiem.push(i)
  }
  // console.log(arrHoaDonTimKiem);


  let html = arrHoaDonTimKiem.map((a) => {
    // console.log(a);
    let trang_thai = "";
    let dem = 1;
    
    checkTrangThai(a.trangThai);

    function checkTrangThai(trangthai) {
      if (trangthai == 1) {
        trang_thai = `<span style="color:#ed5e54">CHỜ XÁC NHẬN</span>`;
      } else if (trangthai == 2) {
        trang_thai = `<span style="color:#c0a904">CHỜ LẤY HÀNG</span>`;
      } else if (trangthai == 3) {
        trang_thai = `<span style="color:#007bff">ĐANG GIAO</span>`;
      } else if (trangthai == 4) {
        trang_thai = `<span style="color:#04AA6D">ĐÃ NHẬN</span>`;
      } else if (trangthai == 5) {
        trang_thai = `<span style="color:red">ĐÃ HỦY</span>`;
      }
    }

    return `
      <tr class="tenKhachHangHoaDon" style="cursor: pointer;text-align:center" onclick=layThongTinHoaDon('${a.name}','${a.date}','${a.trangThai}')>
        <th scope="row">${dem++}</th>
        <td>${a.name}</td>
        <td>${a.date}</td>
        <td>${trang_thai}</td>
        <td>${a.shipper}</td>
        <td><i class='bx bx-receipt' onclick=layThongTinHoaDon('${a.name}','${a.date}','${a.trangThai}',${a.ly_do_huy})></i></td>
      </tr>
    `;
  });

  document.getElementById("tbody").innerHTML = html;

  
}

function renderHoaDonTheoTrangThai(trangThai, title) {
  let ma_nhahang = document.getElementById("maNhaHang").innerHTML.trim();
  // console.log(trangThai, title, ma_nhahang);
  $.ajax({
    url: "../api/don_hang/don_hang_admin.php",
    type: "GET",
    cache: false,
    data: {
      action: "getDataOfProductsSelectTrangThai",
      ma_nhahang: ma_nhahang,
      trangThai: trangThai,
    },
    success: function (data) {
      // console.log((data));
      let res = $.parseJSON(data);
      // console.log(res.length)
      if(res.length == 0) {
        document.getElementById("tbody").innerHTML = '<tr><td colspan="5" style="text-align:center">hiện tại chưa có thông tin hóa đơn !!!</td></tr>';
      }else {
        renderHoaDon(res);
      }
    },
  });

}

function layThongTinHoaDon(ten, ngayDat, trangthai) {
  console.log(ten,ngayDat,trangthai);

  let hoaDon = arrLayThongTinHoaDon.find(
    ({ name, date, trangThai }) =>
      name == ten && date == ngayDat && trangThai == trangthai
  );
  console.log(hoaDon);

  let dataHoaDon = hoaDon.data.map((a) => {
    // console.log(a)
    return `<tr>
        <td>${a.id}</td>
        <td><img src="../asset/img_products/${a.img_monan}" height="50" width="50"/></td>
        <td>${a.ten_monan}</td>
        <td>${a.ma_nhahang}</td>
        <td>${a.ngay_dat}</td>
        <td>${a.so_luong}</td>
      </tr>
    `;
  });

  let trang_thai = "",
    btn = "";
    lyDoHuyDon = "";

  checkTrangThai(trangthai, ten, ngayDat);

  function checkTrangThai(trangthai, ten, ngayDat) {
    if (trangthai == 1) {
      trang_thai = `<span style="color:#ffc107">CHỜ XÁC NHẬN BỞI CỬA HÀNG</span>`;
      btn = `<button class="btn btn-xacNhan" onclick=thayDoiTrangThai('${ten}','${ngayDat}','${trangthai}','xacNhanDonHang')>Xác nhận đơn hàng</button> 
      <button class="btn btn-light" onclick=thayDoiTrangThai('${ten}','${ngayDat}','${trangthai}','huyDon')>Hủy đơn</button>
      `;
    } else if (trangthai == 2) {
      trang_thai = `<span style="color:#ffc107">CHỜ LẤY HÀNG</span>`;
      btn = `<button class="btn btn-xuatHang" onclick=thayDoiTrangThai('${ten}','${ngayDat}','${trangthai}','xuatDonHang')>Xuất hàng</button>`;
    } else if (trangthai == 3) {
      trang_thai = `<span style="color:#007bff">ĐANG GIAO CHO KHÁCH HÀNG</span>`;
      btn = `<button class="btn cancelbtn" onclick=thayDoiTrangThai('${ten}','${ngayDat}','${trangthai}','huyDon')>Hủy đơn</button>`;
    } else if (trangthai == 4) {
      trang_thai = `<span style="color:#04AA6D">KHÁCH HÀNG ĐÃ NHẬN</span>`;
    } else if (trangthai == 5) {
      trang_thai = `<span style="color:red">ĐƠN HÀNG ĐÃ HỦY</span>`;
    }
  }

  let hoTen, sdt, diaChi, email,shipper;

  $.ajax({
    url: "../api/thongtin_khachhang/thongtin_khachhang.php",
    type: "GET",
    cache: false,
    data: {
      action: "thongtin_khachhang_username",
      ten: ten,
    },
    success: function (data) {
      // console.log((data));

      let rs = $.parseJSON(data);
      // console.log(rs)

      hoTen = rs[0].ten;
      sdt = rs[0].sdt;
      diaChi = rs[0].dia_chi;
      email = rs[0].email;
      shipper = hoaDon.shipper;

      let chiTietHoaDon = `<div class="grid wide">
              <div class="row">
                <div class="l-8 m-12 c-12 tbThongTinHoaDon">
                  <h1>Thông tin đơn hàng</h1>
                  <div class="boxThongTin" style="font-size:12px">
                    <table class="table" style="width:100%; text-align:center">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Hình ảnh</th>
                          <th>Tên món ăn</th>
                          <th>Mã nhà hàng</th>
                          <th>Ngày đặt</th>
                          <th>Số lượng</th>
                        </tr>
                      </thead>
                      <tbody>
                          ${dataHoaDon}
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="l-4 m-0 c-0">
                  <h1 style="text-align:right; padding-right:10px">thông tin khách hàng</h1>
                  <div class="boxThongTin">
                    <p>Tên khách hàng: </p>
                    <p style="text-align:right;font-weight:bold;padding:10px 5px;font-size:14px">${hoTen}</p>
                    <p>Số điện thoại: <span></span></p>
                    <p style="text-align:right;font-weight:bold;padding:10px 5px;font-size:14px">${sdt}</p>
                    <p>Địa chỉ: <span></span></p>
                    <p style="text-align:right;font-weight:bold;padding:10px 5px;font-size:14px">${diaChi}</p>
                    <p>Tình trạng:</p>
                    <p style="text-align:right;font-weight:bold;padding:10px 5px;">
                      ${trang_thai}
                    </p>
                    <p>Người giao hàng:</p>
                    <p style="text-align:right;font-weight:bold;padding:10px 5px;">
                      ${shipper}
                    </p>
                    ${lyDoHuyDon}
                  </div>
                </div>
              </div>
            </div>
          `;
      document.getElementById("modalHoaDon").style.display = "block";
      document.getElementById("chiTietHoaDon").innerHTML = chiTietHoaDon;
      document.getElementById("btnTrangThai").innerHTML = btn;
    },
  });
}


function thayDoiTrangThai(ten, ngayDat, trangThai, action) {
  // console.log(ten,ngayDat,trangThai,action);
  $.ajax({
    url: "../api/don_hang/don_hang_admin.php",
    type: "POST",
    cache: false,
    data: {
      action: action,
      ten: ten,
      ngayDat: ngayDat,
      trangThai: trangThai,
    },
    success: function (msg) {
      // console.log(msg);
      let thongBao = document.getElementById("thongBao");
      if (msg == "Xác nhận đơn hàng thành công" || msg == "Xuất đơn thành công" || msg == "Đơn đã được hủy") {
        let ma_nhahang = document.getElementById("maNhaHang").innerHTML.trim();
        $.ajax({
          url: "../api/don_hang/don_hang_admin.php",
          type: "GET",
          cache: false,
          data: {
            action: "getDataOfProductsSelect",
            ma_nhahang: ma_nhahang,
          },
          success: function (data) {
            // console.log((data));
            let rs_data = $.parseJSON(data).filter((a) => a.tinh_trang != 5);
            console.log(rs)

            // rs.push(rs_data);
            // console.log(rs);
            renderHoaDon(rs_data);            
          },
        });

        thongbaotot(msg);

        thongBao.innerHTML = '<span style="color: #04AA6D">' + msg + "</span>";
        setTimeout(function () {
          thongBao.innerHTML = " ";
          document.getElementById('modalHoaDon').style.display='none'
        }, 2000);
      } else {
        thongbaoloi(msg);

        thongBao.innerHTML = '<span style="color: red">' + msg + "</span>";
        setTimeout(function () {
          thongBao.innerHTML = " ";
          document.getElementById('modalHoaDon').style.display='none'
        }, 2000);
      }
    },
  });
}

window.onclick = function (event) {
  // console.log(event)
  if (event.target == modalHoaDon) {
    modalHoaDon.style.display = "none";
  }

  if (event.target == modalThemSanPham) {
    modalThemSanPham.style.display = "none";
  }
};

function getSanPhamAdmins() {
  let ma_nhahang = document.getElementById("maNhaHang").innerHTML.trim();
  $.ajax({
    url: "../api/san_pham/san_pham.php",
    type: "GET",
    cache: false,
    data: {
      action: "getDataSanPhamOfMaSanpham",
      ma_nhahang: ma_nhahang,
    },
    success: function (data) {
      // console.log((data));
      let rs_data = $.parseJSON(data);
      // console.log(rs_data)

      function compareTinhTrang(a, b) {
        // Sử dụng toUpperCase() để chuyển các kí tự về cùng viết hoa
        var typeA = a.tinh_trang.toUpperCase();
        var typeB = b.tinh_trang.toUpperCase();
    
        let comparison = 0;
        if (typeA > typeB) {
          comparison = 1;
        } else if (typeA < typeB) {
          comparison = -1;
        }
        return comparison;
      }

      rs_data.sort(compareTinhTrang);
      // console.log(rs_data)

      let html = rs_data.map((a) => {
        let img = new Image();
        if (a.img_monan == "") {
          img = `<img src="https://via.placeholder.com/150" id="imgSanPham" class="card-img-top" alt="..." height="200" width="100%">`;
        } else {
          img = `<img src="../asset/img_products/${a.img_monan}" id="imgSanPham" class="card-img-top" alt="..." height="200" width="100%">`;
        }

        let btn_congcu = '';
        if(a.tinh_trang == '1'){
          btn_congcu = `
            <button type="button" class="btn btn-primary btnChinhSua" onclick=chinhSuaSanPham('${a.ma_monan}')>Chỉnh sửa</button>
            <button type="button" class="btn btn-danger btnXoa" onclick=xoaSanPham('${a.ma_monan}','${a.tinh_trang}')>Xóa</button>
            <button type="button" class="btn btn-success btnLuu" onclick=luuChinhSuaSanPham('${a.ma_monan}')>Lưu</button>
            <button type="button" class="btn btn-danger btnHuy" onclick=huyChinhSuaSanPham('${a.ma_monan}')>Hủy</button>
          `
        } else {
          btn_congcu = `
            <button type="button" class="btn btn-danger btnXoa" onclick=xoaSanPham('${a.ma_monan}','${a.tinh_trang}')>Phục hồi</button>
          `
        }

        return `
          <div class="l-3 m-6 c-6" style = "margin-top: 20px">
            <div class="card" style="width: 18rem;" id='${a.ma_monan}'>
              <div class="card-header" style="position:relative;">
                ${img}
                <span onclick=chonAnh('${a.ma_monan}') style="position:absolute;top:10px;right:10px;cursor: pointer;"><i class='bx bx-edit-alt' style="font-size:25px;color:#fff;background-color:#007bff;padding:10px;border-radius:50%;"></i></span>
                <span src="../asset/img_products/${a.img_monan}" style="display:none" id="tenImgSanPham">empty</span>
              </div>
              <div class="card-body" style="color:black;" >
                <p>Tên:</p>
                <input class="active" value='${a.ten}'/>
                <p>Gía tiền:</p>
                <input class="active" type="number" value='${a.gia_tien}'/>
                <p>Đã bán:</p>
                <input type="number" value='${a.da_ban}'/>
                <p>Đánh gía:</p>
                <input type="number" value='${a.danh_gia}'/>
                <p>Thể loại:</p>
                <input class="active" value='${a.the_loai}'/><br>
                <div class="holdBtn" style="margin-top: 20px">
                  ${btn_congcu}
                </div>
              </div>
            </div>
          </div>
        `;
      });

      let btn = `<span id="changeCardToListAndReverse_icon" onclick="changeCardToListAndReverse()"><i class='bx bx-credit-card-front'></i></span>`
      
      $("#changeCardToListAndReverse").html(btn)

      $("#sanPhamBody").html(html);

      let inp = document.querySelectorAll(
        "#sanPhamBody .card .card-body input"
      );
      let btnCancle = document.querySelectorAll(
        "#sanPhamBody .card .card-body .holdBtn button.btnHuy"
      );
      let btnLuu = document.querySelectorAll(
        "#sanPhamBody .card .card-body .holdBtn button.btnLuu"
      );
      let btnXoa = document.querySelectorAll(
        "#sanPhamBody .card .card-body .holdBtn button.btnXoa"
      );
      let btnEditPic = document.querySelectorAll(
        "#sanPhamBody .card .card-header span"
      );

      // console.log(btnCancle,inp)

      for (let i = 0; i < inp.length; i++) {
        inp[i].disabled = true;
      }

      for (let i = 0; i < btnCancle.length; i++) {
        btnCancle[i].style.display = "none";
        btnLuu[i].style.display = "none";
      }

      for (let i = 0; i < btnEditPic.length; i++) {
        btnEditPic[i].style.display = "none";
      }
    },
  });
}

function chinhSuaSanPham(maMonAn) {
  let inp = document.querySelectorAll(
    `#sanPhamBody #${maMonAn} .card-body input.active`
  );
  let btnCancle = document.querySelectorAll(
    `#sanPhamBody #${maMonAn} .card-body .holdBtn button.btnHuy`
  );
  let btnLuu = document.querySelectorAll(
    `#sanPhamBody #${maMonAn} .card-body .holdBtn button.btnLuu`
  );
  let btnXoa = document.querySelectorAll(
    `#sanPhamBody #${maMonAn} .card-body .holdBtn button.btnXoa`
  );
  let btnEdit = document.querySelectorAll(
    `#sanPhamBody #${maMonAn} .card-body .holdBtn button.btnChinhSua`
  );

  let btnEditPic = document.querySelectorAll(
    `#sanPhamBody #${maMonAn} .card-header span`
  );

  let spanTenImg = document.querySelectorAll(
    `#sanPhamBody #${maMonAn} .card-header #tenImgSanPham`
  );
  // console.log(spanTenImg)

  for (let i = 0; i < inp.length; i++) {
    inp[i].disabled = false;
  }

  for (let i = 0; i < btnCancle.length; i++) {
    btnCancle[i].style.display = "inline-block";
  }

  for (let i = 0; i < btnLuu.length; i++) {
    btnLuu[i].style.display = "inline-block";
  }

  for (let i = 0; i < btnEditPic.length; i++) {
    btnEditPic[i].style.display = "block";
  }

  for (let i = 0; i < spanTenImg.length; i++) {
    spanTenImg[i].style.display = "none";
  }

  for (let i = 0; i < btnEdit.length; i++) {
    btnEdit[i].style.display = "none";
  }

  for (let i = 0; i < btnXoa.length; i++) {
    btnXoa[i].style.display = "none";
  }
}

function huyChinhSuaSanPham(maMonAn) {
  let inp = document.querySelectorAll(
    `#sanPhamBody #${maMonAn} .card-body input`
  );
  let btnCancle = document.querySelectorAll(
    `#sanPhamBody #${maMonAn} .card-body .holdBtn button.btnHuy`
  );
  let btnLuu = document.querySelectorAll(
    `#sanPhamBody #${maMonAn} .card-body .holdBtn button.btnLuu`
  );
  let btnEdit = document.querySelectorAll(
    `#sanPhamBody #${maMonAn} .card-body .holdBtn button.btnChinhSua`
  );
  let btnEditPic = document.querySelectorAll(
    `#sanPhamBody #${maMonAn} .card-header span`
  );
  // console.log(btnCancle,inp)

  for (let i = 0; i < inp.length; i++) {
    inp[i].disabled = true;
  }

  for (let i = 0; i < btnCancle.length; i++) {
    btnCancle[i].style.display = "none";
  }

  for (let i = 0; i < btnLuu.length; i++) {
    btnLuu[i].style.display = "none";
  }

  for (let i = 0; i < btnEditPic.length; i++) {
    btnEditPic[i].style.display = "none";
  }

  for (let i = 0; i < btnEdit.length; i++) {
    btnEdit[i].style.display = "inline-block";
  }

  for (let i = 0; i < btnXoa.length; i++) {
    btnXoa[i].style.display = "inline-block";
  }
}

function luuChinhSuaSanPham(maMonAn) {
  let inp = document.querySelectorAll(
    `#sanPhamBody #${maMonAn} .card-body input.active`
  );

  const nameImage = document.querySelector(
    `#sanPhamBody #${maMonAn} .card-header #tenImgSanPham`
  );

  // console.log(inp)
  // console.log(nameImage.innerHTML);

  // for (let i of inp) {
  //   console.log(i.value);
  // }

  let arr = {};

  var xac_nhan = confirm("Bạn có chắc muốn lưu !!!");
  if (xac_nhan) {
    if (nameImage.innerHTML == "empty") {
      arr = {
        ma_monan: maMonAn,
        ten: inp[0].value,
        gia: inp[1].value,
        the_loai: inp[2].value,
      };
      postThongTinSanPham(arr, maMonAn);
      huyChinhSuaSanPham(maMonAn);
    } else {
      arr = {
        ma_monan: maMonAn,
        ten: inp[0].value,
        gia: inp[1].value,
        the_loai: inp[2].value,
      };
      postThongTinSanPham(arr, maMonAn);
      capNhatAnhSanPham(event, maMonAn);

    }
  }

  // console.log(arr);

  // $.ajax({
  //   url: "../api/san_pham/san_pham.php",
  //   type: "POST",
  //   cache: false,
  //   data: {
  //     action: "capNhatTenSan",
  //     object: object,
  //   },
  //   success: function (msg) {

  //   }
  // })
}

function xoaSanPham(ma_monan, tinh_trang){
  let num;
  if(tinh_trang == '1'){
    num = 2;
  } else if(tinh_trang == '2'){
    num = 1;
  }

  $.ajax({
    url: "../api/san_pham/san_pham.php",
    type: "POST",
    cache: false,
    data: {
      action: "anHienSanPham",
      num: num,
      maMonAn: ma_monan,
    },
    success: function (msg) {
      // console.log(msg)
      if (msg == "success") {
        getSanPhamAdmins();
      }
    },
  });
}

function postThongTinSanPham(arr, maMonAn) {
  $.ajax({
    url: "../api/san_pham/san_pham.php",
    type: "POST",
    cache: false,
    data: {
      action: "capNhatTenSanPham",
      arr: arr,
    },
    success: function (msg) {
      // console.log(msg)
      if (msg == "success") {
        huyChinhSuaSanPham(maMonAn);
      }
    },
  });
}

function chonAnh(maMonAn) {
  $("#chossen_file_img").trigger("click");

  $("#chossen_file_img").on("change", function (e) {
    e.preventDefault();

    const previewImage = document.querySelector(
      `#sanPhamBody #${maMonAn} .card-header #imgSanPham`
    );
    const nameImage = document.querySelector(
      `#sanPhamBody #${maMonAn} .card-header #tenImgSanPham`
    );
    // console.log(previewImage)

    var b = $("#chossen_file_img").val();
    // console.log(b);

    const file = this.files[0];
    // console.log(this.files)
    // console.log(file.name);

    if (file) {
      const reader = new FileReader();
      // console.log(reader);

      reader.readAsDataURL(file);

      reader.addEventListener("load", function () {
        // console.log(this.result);
        previewImage.src = this.result;
        nameImage.innerHTML = file.name;
        nameImage.style.display = "none";
      });
    }
  });
}

function chonAnhThemSanPham() {
  $("#chossen_file_img").trigger("click");

  $("#chossen_file_img").on("change", function (e) {
    e.preventDefault();

    const previewImage = document.querySelector(
      `#modalThemSanPham #themSanPham #holdImg`
    );
    const iconAdd = document.querySelector(
      `#modalThemSanPham #themSanPham .holdImg i`
    );
    const nameImage = document.querySelector(
      `#modalThemSanPham #themSanPham .holdImg span`
    );
    // console.log(previewImage)

    // var b = $("#chossen_file_img").val();
    // console.log(b);

    const file = this.files[0];
    // console.log(this.files)
    // console.log(file.name);

    if (file) {
      const reader = new FileReader();
      // console.log(reader);

      reader.readAsDataURL(file);

      reader.addEventListener("load", function () {
        // console.log(this.result);
        previewImage.src = this.result;
        previewImage.style.display = "block";
        nameImage.innerHTML = file.name;
        nameImage.style.display = "none";
        iconAdd.style.display = "none";
      });
    }
  });
}

function capNhatAnhSanPham(e, maMonAn) {
  // console.log(e, maMonAn);
  e.preventDefault();

  let form_data = new FormData();
  let img = $("#chossen_file_img")[0].files;
  // console.log(form_data,img);

  if (img.length == 1) {
    form_data.append("my_image", img[0]);
    // console.log(img[0])
    // console.log(form_data);

    $.ajax({
      url: "../api/san_pham/san_pham.php",
      type: "POST",
      cache: false,
      data: form_data,
      contentType: false,
      processData: false,
      success: function (res) {
        // console.log(res);

        let data = JSON.parse(res);

        let path_old_img = document.querySelector(
          `#sanPhamBody #${maMonAn} .card-header #tenImgSanPham`
        ).src;

        let ma_monan = maMonAn;

        $.ajax({
          url: "../api/san_pham/san_pham.php",
          type: "POST",
          cache: false,
          data: {
            action: "upload_sanPham_img_admin",
            data: data,
            ma_monan: ma_monan,
            path: path_old_img,
          },
          success: function (res) {
            console.log(res);
            getSanPhamAdmins();
          },
        });
      },
    });
  } else if (img.length > 1) {
    thongbaoloi("Vui lòng chỉ một hình ảnh.");
  } else {
    thongbaoloi("Vui lòng chọn một hình ảnh.");
  }
}

function themSanPham() {
  let arr = [];
  let inp = document.querySelectorAll("#themSanPham form input");
  for (let i of inp) {
    if (i.value.trim() == "") {
      thongbaoloi("Vui lòng điển đầy đủ thông tin !!!");
      return;
    } else {
      arr.push(i.value.trim());
    }
  }

  let ma_nhahang = document.getElementById("maNhaHang").innerHTML;
  let imgName = document.getElementById("holdImgName").innerHTML.trim();

  arr.push(ma_nhahang.trim());

  // console.log(arr);

  if (imgName == "") {
    $.ajax({
      url: "../api/san_pham/san_pham.php",
      type: "POST",
      cache: false,
      data: {
        action: "themSanPham",
        arr: arr,
      },
      success: function (msg) {
        if (!msg.includes("error")) {
          thongbaotot("Thêm sản phảm thành công!!!");
          document.getElementById("modalThemSanPham").style.display = "none";
        }
      },
    });
  } else {
    $.ajax({
      url: "../api/san_pham/san_pham.php",
      type: "POST",
      cache: false,
      data: {
        action: "themSanPham",
        arr: arr,
      },
      success: function (msg) {
        // console.log(msg);
        if (msg != "error") {
          themAnhSanPham(event, msg);
        }
      },
    });
  }
}

function themAnhSanPham(e, maMonAn) {
  // console.log(e, maMonAn);
  e.preventDefault();

  let form_data = new FormData();
  let img = $("#chossen_file_img")[0].files;
  console.log(img);

  if (img.length == 1) {
    form_data.append("my_image", img[0]);
    // console.log(img[0])
    // console.log(form_data);

    $.ajax({
      url: "../api/san_pham/san_pham.php",
      type: "POST",
      cache: false,
      data: form_data,
      contentType: false,
      processData: false,
      success: function (res) {
        // console.log(res);

        let data = JSON.parse(res);

        let ma_monan = maMonAn;

        $.ajax({
          url: "../api/san_pham/san_pham.php",
          type: "POST",
          cache: false,
          data: {
            action: "upImgSanPhamMoi",
            data: data,
            ma_monan: ma_monan,
          },
          success: function (res) {
            // console.log(res);
            getSanPhamAdmins();
            thongbaotot("thêm sản phẩm thành công");
            document.querySelector('#themMotSanPham #holdImgName').style.display = 'none';
            document.querySelector('#themMotSanPham img').style.display = 'none';
            document.querySelector('#themMotSanPham img').src = '';
            document.querySelector('#themMotSanPham input').value = '';
            const iconAdd = document.querySelector(`#modalThemSanPham #themSanPham .holdImg i`).style.display= "block";
          },
        });
      },
    });
  } else if (img.length > 1) {
    thongbaoloi("Vui lòng chỉ một hình ảnh.");
  } else {
    thongbaoloi("Vui lòng chọn một hình ảnh.");
  }
}

function themNhieuSanPham() {
  let table = document.getElementById("tbody_ThemSanPham");
  let slHang = document.querySelectorAll(
    `.tabThemNhieuSanPham table .tbody_ThemSanPham tr`
  ).length;
  let arr = [];
  let res = true;
  // console.log(table)
  for (let i = 0; i < table.rows.length; i++) {
    let img_id = `fileInput_${i}`;
    let ten = table.rows[i].cells[1].children[0].value.trim();
    let gia = table.rows[i].cells[2].children[0].value.trim();
    let the_loai = table.rows[i].cells[3].children[0].value.trim();
    // console.log(img_id, ten, gia, the_loai)
    let msg = themNhieuSanPhamAPI(img_id, ten, gia, the_loai);
    if(!msg){
      res = false;
      return
    }
  }

  // console.log(res)

  if(res){
    thongbaotot("Thêm sản phảm thành công!!!");
    let inputText = document.querySelectorAll(
      `.tabThemNhieuSanPham table .tbody_ThemSanPham tr input[type='text']`
    )

    let inputNumber = document.querySelectorAll(
      `.tabThemNhieuSanPham table .tbody_ThemSanPham tr input[type='number']`
    )

    let previewImg = document.querySelectorAll(
      `.tabThemNhieuSanPham table .tbody_ThemSanPham tr td img.previewImg_none`
    )

    for (let i = 0; i < inputText.length; i++) {
      inputText[i].value = ''
    }
    for (let i = 0; i < inputNumber.length; i++) {
      inputNumber[i].value = ''
    }
    for (let i = 0; i < previewImg.length; i++) {
      previewImg[i].src = ' '
      previewImg[i].style.display = 'none'
    }

  }

}

function themNhieuSanPhamAPI(img_id, ten, gia, the_loai) {
  // console.log(img_id, ten, gia, the_loai);
  event.preventDefault();

  let form_data = new FormData();
  let img = document.getElementById(`${img_id}`).files;
  // console.log(img);
  // console.log(form_data);
  let msg = true;
  if (img.length == 1) {
    form_data.append("my_image", img[0]);
    // console.log(img[0])
    // console.log(form_data);

    $.ajax({
      url: "../api/san_pham/san_pham.php",
      type: "POST",
      cache: false,
      data: form_data,
      contentType: false,
      processData: false,
      success: function (res) {
        // console.log(res);

        let data = JSON.parse(res);
        let ma_nhahang = document.getElementById("maNhaHang").innerHTML.trim();

        $.ajax({
          url: "../api/san_pham/san_pham.php",
          type: "POST",
          cache: false,
          data: {
            action: "upload_nhieu_sanpham",
            data: data,
            img_id,
            ten,
            gia,
            the_loai,
            ma_nhahang
          },
          success: function (res) {
            if(res == "success"){
              getSanPhamAdmins();
              msg =  true
            } else {
              msg = false;
            }
          },
        });
      },
    });
  } else if (img.length > 1) {
    msg = false;
    thongbaoloi("Vui lòng chỉ một hình ảnh.");
  } else {
    msg = false;
    thongbaoloi("Vui lòng chọn một hình ảnh.");
  }
  return msg
}

function themHangChoTableThemSanPham() {
  let slHang = document.querySelectorAll(
    `.tabThemNhieuSanPham table .tbody_ThemSanPham tr`
  ).length;
  let tbody = document.querySelector(
    `.tabThemNhieuSanPham table .tbody_ThemSanPham`
  );
  // console.log(slHang);
  let td_number = slHang;

  let td_Id = `img_themSanPham_${td_number}`;
  let previewImg = `previewImg_${td_number}`;
  let fileInput = `fileInput_${td_number}`;

  let row = tbody.insertRow(slHang);
  let cell1 = row.insertCell(0);
  let cell2 = row.insertCell(1);
  let cell3 = row.insertCell(2);
  let cell4 = row.insertCell(3);
  cell1.innerHTML = `<input type="file" id="${fileInput}" accept="image/png, image/jpeg" onchange="chonAnhChoThemNhieuSanPham('${td_Id}','${previewImg}','${fileInput}')">
                      <label for="${fileInput}" style="cursor:pointer">
                          <i class='bx bx-plus-medical'></i> &nbsp; Tải ảnh lên
                      </label>
                      <img id="${previewImg}" class="previewImg_none"  src="https://via.placeholder.com/150" height="50" width="50"/>`;
  cell1.setAttribute("id", td_Id);
  cell2.innerHTML = `<input type="text" placeholder="Điền tên vào đây...."/>`;
  cell3.innerHTML = `<input type="number" placeholder="Điền giá vào đây...."/>`;
  cell4.innerHTML = `<input type="text" placeholder="Điền thể loại sản phẩm vào đây...."/>`;
}

function chonAnhChoThemNhieuSanPham(id, preview, fileInp) {
  // event.preventDefault();

  let inpFile = document.getElementById(`${fileInp}`);
  let previewImage = document.getElementById(`${preview}`);
  // console.log(inpFile)
  // console.log(previewImage)

  const file = inpFile.files[0];
  // console.log(this.files)
  // console.log(file.name);
  // console.log(inpFile.files);

  if (file) {
    const reader = new FileReader();
    // console.log(reader);

    reader.readAsDataURL(file);

    reader.addEventListener("load", function () {
      // console.log(this);
      // console.log(this.result);
      previewImage.src = this.result;
      previewImage.style.display = "block";
    });
  }
}

function changeCardToListAndReverse(){
  let ma_nhahang = document.getElementById("maNhaHang").innerHTML.trim();
  $.ajax({
    url: "../api/san_pham/san_pham.php",
    type: "GET",
    cache: false,
    data: {
      action: "getDataSanPhamOfMaSanpham",
      ma_nhahang: ma_nhahang,
    },
    success: function (data) {
      // console.log((data));
      let rs_data = $.parseJSON(data);
      // console.log(rs_data)

      function compareTinhTrang(a, b) {
        // Sử dụng toUpperCase() để chuyển các kí tự về cùng viết hoa
        var typeA = a.tinh_trang.toUpperCase();
        var typeB = b.tinh_trang.toUpperCase();
    
        let comparison = 0;
        if (typeA > typeB) {
          comparison = 1;
        } else if (typeA < typeB) {
          comparison = -1;
        }
        return comparison;
      }

      rs_data.sort(compareTinhTrang);
      // console.log(rs_data)


      let sanPham = rs_data.map(a => {
        let img = new Image();
        let fileInput = 'sanPhamList_' + a.ma_monan;
        let previewImg = 'previewImg_' + a.ma_monan;
        let tr_id = 'td_listSanPham_' + a.ma_monan;
        let old_path = "old_path_img" + a.ma_monan;
        let tinhTrang;

        if (a.img_monan == "") {
          img = `<img src="https://via.placeholder.com/150" id="${previewImg}" style="cursor: pointer;" onclick="document.getElementById('${fileInput}').click()" class="card-img-top" alt="..." height="50" width="100%">
                <img src="https://via.placeholder.com/150" id="${old_path}" style="display:none"/>
                <input 
                style="display:none;"
                type="file" id="${fileInput}" 
                accept="image/png, image/jpeg" 
                onchange="chonAnhChoSPList('${previewImg}','${fileInput}')">
          `;
        } else {
          img = `<img src="../asset/img_products/${a.img_monan}" id="${previewImg}" style="cursor: pointer;" onclick="document.getElementById('${fileInput}').click()" class="card-img-top" alt="..." height="50" width="100%">
                <img src="../asset/img_products/${a.img_monan}" id="${old_path}" style="display:none"/>
                <input 
                style="display:none;"
                type="file" id="${fileInput}" 
                accept="image/png, image/jpeg" 
                onchange="chonAnhChoSPList('${previewImg}','${fileInput}')">
          `;
        }

        let btn = '';

        if(a.tinh_trang == 2){
          tinhTrang = '<span class="text-danger">Đã xóa</span>';
          btn = `<button class='btn btn-danger' title='Xóa sản phẩm' onclick=anHienSanPhamTrongList('1','${a.ma_monan}')><i class='bx bx-show'></i></button>`
        } else {
          tinhTrang = '';
          btn = `<button class='btn btn-danger' title='khôi phục sản phẩm' onclick=anHienSanPhamTrongList('2','${a.ma_monan}')><i class='bx bx-x'></i></button>`
        }

        
        
        // console.log(a)

        return `
          <tr id=${tr_id}>
            <td>${img}</td>
            <td><input class="active" type="text" style = "width:100%; paddding:10px 5px" value="${a.ten}"/></td>
            <td><input class="active" type="text" style = "width:100%; paddding:10px 5px" value="${a.gia_tien}"/></td>
            <td><input type="text" style = "width:100%; paddding:10px 5px" value="${a.da_ban}" disabled/></td>
            <td><input type="text" style = "width:100%; paddding:10px 5px" value="${a.danh_gia}" disabled/></td>
            <td><input class="active" type="text" style = "width:100%; paddding:10px 5px" value="${a.the_loai}"/></td>
            <td>${tinhTrang}</td>
            <td class="congCuListSanPham" id="congCuListSanPham" tr_id="${tr_id}">
              <span class="congCuListSanPham_btn">
                <button  onclick="LuuSanPhamTrongList('${a.ma_monan}','${tr_id}','${previewImg}','${old_path}','${fileInput}')" class="btn btn-success" title="Lưu thông tin"><i class='bx bx-check-double' ></i></button>
                ${btn}
              </span>
              <input type="checkbox" class="congCuListSanPham_checkbox" name="${a.ma_monan}" value="${a.ma_monan}" style="display:none">
            </td>
          </tr>
        `
      });

      let html = `
        <table class="table table-hoaDon">
          <thead class="thead-light">
            <tr style="color:#fff">
              <th scope="col">Hình ảnh</th>
              <th scope="col">Tên sản phẩm</th>
              <th scope="col">Gía bán</th>
              <th scope="col">Đã bán</th>
              <th scope="col">Đánh giá</th>
              <th scope="col">Thể loại</th>
              <th scope="col">Tình trạng</th>
              <th scope="col">
                <button class="btn btn-secondary" id="btn_checkbox" onclick="congCuListSanPham()"><i class='bx bx-checkbox'></i></button>
                <button class="btn btn-secondary" id="btn_briefcase" onclick="congCuListSanPham() "style="display:none"><i class='bx bx-briefcase-alt-2' ></i></button><br>
                <button class="btn btn-primary" id="checkedAllCheckBoxInListSP" onclick="checkedAllCheckBoxInListSP() "style="display:none"><i class='bx bx-check-square'></i></button><br>
                <button class="btn btn-success" id="luuThongTinSanPhamDuocCheck" title="Lưu tất cả" onclick="luuThongTinSanPhamDuocCheck() "style="display:none"><i class='bx bx-check-double' ></i></button> 
                <button class="btn btn-danger" id="xoaThongTinSanPhamDuocCheck" title="Xóa tất cả" onclick="xoaThongTinSanPhamDuocCheck() "style="display:none"><i class='bx bx-x'></i></button> 
              </th>
            </tr>
          </thead>
          <tbody>
            ${
              sanPham
            }
          </tbody>
        </table>
      `
      
      let btn = `<span id="changeCardToListAndReverse_icon" onclick="getSanPhamAdmins()"><i class='bx bx-credit-card-front'></i></span>`
      
      $("#changeCardToListAndReverse").html(btn)
      $("#sanPhamBody").html(html);
    }
  });
}


function chonAnhChoSPList(preview, fileInp) {
  // event.preventDefault();

  let inpFile = document.getElementById(`${fileInp}`);
  let previewImage = document.getElementById(`${preview}`);
  // console.log(inpFile)
  // console.log(previewImage)

  const file = inpFile.files[0];
  // console.log(this.files)
  // console.log(file.name);
  // console.log(inpFile.files);

  if (file) {
    const reader = new FileReader();
    // console.log(reader);

    reader.readAsDataURL(file);

    reader.addEventListener("load", function () {
      // console.log(this);
      // console.log(this.result);
      previewImage.src = this.result;
    });
  }
}

function LuuSanPhamTrongList(ma_monan,tr_id,previewImg,old_path,fileInput) {
  let inp = document.querySelectorAll(
    ` #${tr_id} input.active`
  );

  // console.log(inp)

  let arr = {};

  var xac_nhan = confirm("Bạn có chắc muốn lưu !!!");

  if (xac_nhan) {
    arr = {
      ma_monan: ma_monan,
      ten: inp[0].value,
      gia: inp[1].value,
      the_loai: inp[2].value,
    };
    postThongTinSanPhamTrongList(arr, ma_monan);
    capNhatAnhSanPhamTrongList(event, ma_monan,previewImg,old_path,fileInput);
  }
}

function postThongTinSanPhamTrongList(arr, maMonAn) {
  $.ajax({
    url: "../api/san_pham/san_pham.php",
    type: "POST",
    cache: false,
    data: {
      action: "capNhatTenSanPham",
      arr: arr,
    },
    success: function (msg) {
      // console.log(msg)
      if (msg == "success") {
        changeCardToListAndReverse()
      }
    },
  });
}

function capNhatAnhSanPhamTrongList(e, maMonAn, previewImg,old_path,fileInput) {
  console.log(e, maMonAn, previewImg,old_path,fileInput);
  e.preventDefault();

  let form_data = new FormData();

  let img_id = $(`#${fileInput}`)
  // console.log(form_data,img_id);

  if (img_id.length == 1) {

    let img = $(`#${fileInput}`)[0].files;
    // console.log(img)

    form_data.append("my_image", img[0]);
    // console.log(img[0])
    // console.log(form_data);

    $.ajax({
      url: "../api/san_pham/san_pham.php",
      type: "POST",
      cache: false,
      data: form_data,
      contentType: false,
      processData: false,
      success: function (res) {
        // console.log(res);

        let data = JSON.parse(res);

        let path_old_img = document.querySelector(
          `#${old_path}`
        ).src;

        let ma_monan = maMonAn;

        $.ajax({
          url: "../api/san_pham/san_pham.php",
          type: "POST",
          cache: false,
          data: {
            action: "upload_sanPham_img_admin",
            data: data,
            ma_monan: ma_monan,
            path: path_old_img,
          },
          success: function (res) {
            console.log(res);
          },
        });
      },
    });
  } else if (img_id.length > 1) {
    thongbaoloi("Vui lòng chỉ một hình ảnh.");
  } else {
    return;
  }
}

function anHienSanPhamTrongList(num, maMonAn){
  // console.log(num, maMonAn)
  $.ajax({
    url: "../api/san_pham/san_pham.php",
    type: "POST",
    cache: false,
    data: {
      action: "anHienSanPham",
      num: num,
      maMonAn: maMonAn,
    },
    success: function (msg) {
      // console.log(msg)
      if (msg == "success") {
        changeCardToListAndReverse()
      }
    },
  });
}

function congCuListSanPham() {
  
  $('.congCuListSanPham input[type="checkbox"]').toggle()
  $('.congCuListSanPham .congCuListSanPham_btn').toggle()
  $('#btn_checkbox').toggle()
  $('#btn_briefcase').toggle()
  $('#luuThongTinSanPhamDuocCheck').toggle()
  $('#xoaThongTinSanPhamDuocCheck').toggle()
  $('#checkedAllCheckBoxInListSP').toggle()
}

function checkedAllCheckBoxInListSP(){
  let arrCheckBox = document.querySelectorAll('.congCuListSanPham input[type=checkbox].congCuListSanPham_checkbox');
  // console.log(arrCheckBox)

  for (var checkbox of arrCheckBox) {
    checkbox.checked = true;
  }

}

function luuThongTinSanPhamDuocCheck() {
  let arrCheckBox = document.querySelectorAll('.congCuListSanPham input[type=checkbox].congCuListSanPham_checkbox:checked');
  // console.log(arrCheckBox);
  for (var checkbox of arrCheckBox) {
    let tr_id = checkbox.parentNode.getAttribute('tr_id');
    let input = document.querySelectorAll(`#${tr_id} input.active`);
    console.log(input);
    
    let arr = {};

    var xac_nhan = confirm("Bạn có chắc muốn lưu " + arrCheckBox.length + " sản phẩm !!!");

    if (xac_nhan) {
      arr = {
        ma_monan: tr_id,
        ten: input[0].value,
        gia: input[1].value,
        the_loai: input[2].value,
      };
      postThongTinSanPhamTrongList(arr, ma_monan);
      capNhatAnhSanPhamTrongList(event, ma_monan,previewImg,old_path,fileInput);
    }
  }
}

function xoaThongTinSanPhamDuocCheck() {
  let arrCheckBox = document.querySelectorAll('.congCuListSanPham input[type=checkbox].congCuListSanPham_checkbox:checked');
  for (var checkbox of arrCheckBox) {
    let ma_monan = checkbox.getAttribute('name');
    console.log(ma_monan);

    $.ajax({
      url: "../api/san_pham/san_pham.php",
      type: "POST",
      cache: false,
      data: {
        action: "anHienSanPham",
        num: 2,
        maMonAn: ma_monan,
      },
      success: function (msg) {
        // console.log(msg)
        if (msg == "success") {
          changeCardToListAndReverse()
        }
      },
    });
  }
}

