$(document).ready(function()
{
    $('#form_register').submit(function(){
 
        // BƯỚC 1: Lấy dữ liệu từ form
        var username    = $.trim($('#username').val());
        var password    = $.trim($('#password').val());
        var re_password = $.trim($('#re_password').val());
        var email       = $.trim($('#email').val());
        var phone       = $.trim($('#phone').val());
        var address     = $.trim($('#address').val());
 
        // BƯỚC 2: Validate dữ liệu
        // Biến cờ hiệu
        var flag = true;
 
        // Username
        if (username == '' || username.length < 4){
            $('#username_error').text('Tên đăng nhập phải lớn hơn 4 ký tự');
            flag = false;
        }
        else{
            $('#username_error').text('');
        }
 
        // Password
        if (password.length <= 0){
            $('#password_error').text('Bạn phải nhập mật khẩu');
            flag = false;
        }
        else{
            $('#password_error').text('');
        }
 
        // Re password
        if (password != re_password){
            $('#re_password_error').text('Mật khẩu nhập lại không đúng');
            flag = false;
        }
        else{
            $('#re_password_error').text('');
        }
 
        // Email
        if (!isEmail(email)){
            $('#email_error').text('Email không được để trống và phải đúng định dạng');
            flag = false;
        }
        else{
            $('#email_error').text('');
        }
 
        return flag;
    });
});


function isEmail(emailStr)
{
        var emailPat=/^(.+)@(.+)$/
        var specialChars="\\(\\)<>@,;:\\\\\\\"\\.\\[\\]"
        var validChars="\[^\\s" + specialChars + "\]"
        var quotedUser="(\"[^\"]*\")"
        var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/
        var atom=validChars + '+'
        var word="(" + atom + "|" + quotedUser + ")"
        var userPat=new RegExp("^" + word + "(\\." + word + ")*$")
        var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$")
        var matchArray=emailStr.match(emailPat)
        if (matchArray==null) {
                return false
        }
        var user=matchArray[1]
        var domain=matchArray[2]
 
        // See if "user" is valid
        if (user.match(userPat)==null) {
            return false
        }
        var IPArray=domain.match(ipDomainPat)
        if (IPArray!=null) {
            // this is an IP address
                  for (var i=1;i<=4;i++) {
                    if (IPArray[i]>255) {
                        return false
                    }
            }
            return true
        }
        var domainArray=domain.match(domainPat)
        if (domainArray==null) {
            return false
        }
 
        var atomPat=new RegExp(atom,"g")
        var domArr=domain.match(atomPat)
        var len=domArr.length
 
        if (domArr[domArr.length-1].length<2 ||
            domArr[domArr.length-1].length>3) {
           return false
        }
 
        if (len<2)
        {
           return false
        }
 
        return true;
}