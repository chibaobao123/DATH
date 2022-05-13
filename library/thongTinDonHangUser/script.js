function sapXep(rs){
    // console.log(rs)
    function compareName(a, b) {
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

    rs.sort(compareName);
    // console.log(rs);


    let arrUser = [],
        arrNgay,
        arr,
        user,
        date,
        prev;

    for(let i of rs) {
        if (i.ma_nhahang !== prev) {

        
            arr = {
                ten_nhahang: i.ten,
                ma_nhahang: i.ma_nhahang,
                img: i.img_nhahang,
                name: i.username,
                date: i.ngay_dat,
                trangThai: i.tinh_trang,
                dia_chi: i.dia_chi,
                sdt: i.sdt,
                data: [i]
            }

            arrUser.push(arr);

        } else {
            if(i.ngay_dat !== date) {
                arr = {
                    ten_nhahang: i.ten,
                    ma_nhahang: i.ma_nhahang,
                    img: i.img_nhahang,
                    name: i.username,
                    date: i.ngay_dat,
                    trangThai: i.tinh_trang,
                    dia_chi: i.dia_chi,
                    sdt: i.sdt,
                    data: [i]
                }
    
                arrUser.push(arr);
            }else{
                user = arrUser.filter((a) => a.date === i.ngay_dat);
                // console.log(user)
                user[0].data.push(i);
                // console.log(user)
            }
        }

        // console.log('arrUser', arrUser);


        prev = i.ma_nhahang; 
        
        date = i.ngay_dat;

    }

    // for (let i = 0; i < rs.length; i++) {
    
        

    // }

    
    // console.log(user)

    // console.log('arrUser', arrUser);
    return arrUser;
}