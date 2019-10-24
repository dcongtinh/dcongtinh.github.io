function handle_tendangnhap() {
    var form = document.forms["fDangky"];
    var tendangnhap = form["tendangnhap"].value;
    
    if (tendangnhap == '') {
        document.getElementById('error_tendangnhap').innerHTML = "* Bat buoc"
        return false;
    }
    else {
        if (tendangnhap.length < 6 || tendangnhap.length > 15) {
            document.getElementById('error_tendangnhap').innerHTML = "* Do dai tu 6 den 15 ki tu"
            return false;
        }
        var regex = /^[a-zA-Z][a-zA-Z0-9]{5,14}$/
        if (!regex.test(tendangnhap)) {
            document.getElementById('error_tendangnhap').innerHTML = "* Ten dang nhap ko hop le"
            return false;
        }
    }
    return true;
}

function handle_matkhau() {
    var form = document.forms["fDangky"];
    var matkhau = form["matkhau"].value;
    if (matkhau == '') {
        document.getElementById('error_matkhau').innerHTML = "* Bat buoc"
        return false;
    }
    else {
        if (matkhau.length < 6 || matkhau.length > 15) {
            document.getElementById('error_matkhau').innerHTML = "* Do dai tu 6 den 15 ki tu"
            return false;
        } else {
            var regex = /^[a-zA-Z0-9]{6,15}$/
            if (!regex.test(matkhau)) {
                document.getElementById('error_matkhau').innerHTML = "* Mat khau gom so va ki tu"
                return false;
            } else {
                var count = 0;
                for (var i in matkhau){
                    var c =  matkhau[i];
                    count += ('0' <= c && c <= '9');
                }
                if (count == matkhau.length || count == 0){
                    document.getElementById('error_matkhau').innerHTML = "* Mat khau gom so va ki tu"
                    return false;
                }
            }
        }
    }
    return true;
}

function handle_matkhau2() {
    var form = document.forms["fDangky"];
    var matkhau = form["matkhau"].value;
    var matkhau2 = form["matkhau2"].value;
    if (matkhau == '') {
        document.getElementById('error_matkhau2').innerHTML = "* Bat buoc"
        return false;
    } else {
        if (matkhau != matkhau2) {
            document.getElementById('error_matkhau2').innerHTML = "* Mat khau khong khop";
            return false;
        }
    }
    return true;
}

function handle_hinhanh(){
    var form = document.forms["fDangky"];
    var hinhanh = form["hinhanh"].value;
    if (!hinhanh){
        document.getElementById('error_hinhanh').innerHTML = "* Bat buoc"
        return false;
    }
    document.getElementById('error_hinhanh').innerHTML = ""
    return true;
}

function handle_focus(id) {
    document.getElementById('error_global').innerHTML = ''
    document.getElementById(id).innerHTML = ''
}

function validateForm(){
    var ok_tendangnhap = handle_tendangnhap();
    var ok_matkhau =handle_matkhau();
    var ok_matkhau2 =  handle_matkhau2();
    var ok_hinhanh = handle_hinhanh();
    var ok = ok_tendangnhap && ok_matkhau &&ok_matkhau2 && ok_hinhanh;
    if (!ok) {
        document.getElementById('error_global').innerHTML = "* Vui long nhap day du, chinh xac thong tin"
    }
    return ok;
}