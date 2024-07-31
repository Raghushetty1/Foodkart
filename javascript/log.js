
function validate() {
    var user = document.getElementById('log').value;
    var pass = document.getElementById("password").value;
    if ((user == "admin") && (pass == "admin")) {
        window.alert("Logging in");
        sessionStorage.setItem("admin", "$user");
        window.location.href= 'admin/admin.php';
    }
    else {
        window.alert("Username or password Incorrect");
    }
}
function pwdcmpr(){
    window.alert('hiiii');
    var pwd1=document.getElementById('pwd').value;
    var pwd2=document.getElementById('cnfrm').value;
    if(pwd1!=pwd2)
    {
        window.alert('Passwords do not match!!!');
    }
}
