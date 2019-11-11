function loadXMLDoc(value) {
    var xmlhttp;
    if (window.XMLHttpRequest) xmlhttp = new XMLHttpRequest();
    else xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var responseText = xmlhttp.responseText;
            document.getElementById('error_tendangnhap').innerHTML = responseText;
            disabled_btnSubmit();
        }
    }
    xmlhttp.open("POST", "checkUserExisted.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("tendangnhap=" + value);
}

function handle_tendangnhap() {
    var form = document.forms["fDangky"];
    var tendangnhap = form["tendangnhap"].value;
    if (tendangnhap == '') {
        document.getElementById('error_tendangnhap').innerHTML = "* Bat buoc"
        return false;
    } else {
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
    loadXMLDoc(tendangnhap);
    return true;
}

function handle_matkhau() {
    var form = document.forms["fDangky"];
    var matkhau = form["matkhau"].value;
    if (matkhau == '') {
        document.getElementById('error_matkhau').innerHTML = "* Bat buoc"
        return false;
    } else {
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
                for (var i in matkhau) {
                    var c = matkhau[i];
                    count += ('0' <= c && c <= '9');
                }
                if (count == matkhau.length || count == 0) {
                    document.getElementById('error_matkhau').innerHTML = "* Mat khau gom so va ki tu"
                    return false;
                }
            }
        }
    }
    disabled_btnSubmit();
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
    disabled_btnSubmit();
    return true;
}

function handle_hinhanh() {
    var form = document.forms["fDangky"];
    var hinhanh = form["hinhanh"].value;

    if (!hinhanh) {
        document.getElementById('error_hinhanh').innerHTML = "* Bat buoc"
        return false;
    }
    disabled_btnSubmit();
    return true;
}

function handle_focus(id) {
    document.getElementById('error_global').innerHTML = ''
    document.getElementById(id).innerHTML = ''
    document.getElementById('btnSubmit').disabled = true;
}

function validateForm() {
    var ok_tendangnhap = handle_tendangnhap();
    var ok_matkhau = handle_matkhau();
    var ok_matkhau2 = handle_matkhau2();
    var ok_hinhanh = handle_hinhanh();
    var ok = ok_tendangnhap && ok_matkhau && ok_matkhau2 && ok_hinhanh;
    if (!ok) {
        document.getElementById('error_global').innerHTML = "* Vui long nhap day du, chinh xac thong tin"
    }
    return ok;
}

function disabled_btnSubmit() {
    var err_1 = document.getElementById('error_tendangnhap').innerHTML;
    var err_2 = document.getElementById('error_matkhau').innerHTML;
    var err_3 = document.getElementById('error_matkhau2').innerHTML;
    var err_4 = document.getElementById('error_hinhanh').innerHTML;
    if (!err_1 && !err_2 && !err_3 && !err_4) document.getElementById('btnSubmit').disabled = false;
    else document.getElementById('btnSubmit').disabled = true;
}