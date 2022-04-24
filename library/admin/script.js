const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})



modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
    }else{
        modeText.innerText = "Dark mode";
        
    }
});

getDonHangChoAdmin();

function getDonHangChoAdmin(){
    let ma_nhahang = "nhapham";
    $.ajax({
        url: '../api/don_hang/don_hang_admin.php',
        type: 'GET',
        cache: false,
        data: {
            action : 'getDataOfProductsSelect',
            ma_nhahang: ma_nhahang,
        },
        success: function(data) {
            // console.log(typeof(data));
            let rs = $.parseJSON(data);
            // console.log(rs)

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
            const arrSoLuongDonHangMoiThang = [0,0,0,0,0,0,0,0,0,0,0,0];
            const thang = [
                'tháng 1',
                'tháng 2',
                'tháng 3',
                'tháng 4',
                'tháng 5',
                'tháng 6',
                'tháng 7',
                'tháng 8',
                'tháng 9',
                'tháng 10',
                'tháng 11',
                'tháng 12'
            ];
            
            for (let item of rs){
                switch (Number(item.ngay_dat.split("/")[1])) {
                    case 1:
                        arrSoLuongDonHangMoiThang[0]++
                      break;
                    case 2:
                        arrSoLuongDonHangMoiThang[1]++
                      break;
                    case 3:
                        arrSoLuongDonHangMoiThang[2]++
                      break;
                    case 4:
                        arrSoLuongDonHangMoiThang[3]++
                      break;
                    case 5:
                        arrSoLuongDonHangMoiThang[4]++
                      break;
                    case 6:
                        arrSoLuongDonHangMoiThang[5]++
                      break;
                    case 7:
                        arrSoLuongDonHangMoiThang[6]++
                      break;
                    case 8:
                        arrSoLuongDonHangMoiThang[7]++
                      break;
                    case 9:
                        arrSoLuongDonHangMoiThang[8]++
                      break; 
                    case 10:
                        arrSoLuongDonHangMoiThang[9]++
                      break; 
                    case 11:
                        arrSoLuongDonHangMoiThang[10]++
                      break; 
                    case 12:
                        arrSoLuongDonHangMoiThang[11]++
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
                datasets: [{
                  label: 'Tổng số đơn : ' + rs.length,
                  backgroundColor: 'rgb(255, 99, 132)',
                  borderColor: 'rgb(255, 99, 132)',
                //   fill: false,
                //   tension: 0.1,
                  data: arrSoLuongDonHangMoiThang,
                }]
              };
            
              const config = {
                type: 'bar',
                data: dataSource,
                options: {}
              };
            
              const myChart = new Chart(
                document.getElementById('myChart'),
                config
              );
        }
    })
}

