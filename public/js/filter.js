function filter(){
    //[form,name,email,phone,pass,pass2,radio,check]
    $('.form--register').onsubmit = (a)=>{
        check = true;
        error = $$('.form--register .form-message');
        check_name = /^[a-zA-Z_]$/;
        check_email = /^[0-9a-zA-Z]{5,100}@[a-zA-Z.]{5,100}$/;
        check_pass = /^[0-9a-zA-Z]{5,100}$/;
        check_phone = /^0[0-9]{10,11}$/;

        if( $('#name_dk').value.length == 0){
            check = false;
            error[0].innerHTML = "bạn nhập rỗng";
        }else{
            error[0].innerHTML = "";
        }
        if($('#email_dk').value.length == 0){
            check = false;
            error[1].innerHTML = "bạn nhập rỗng";
        }else if(check_email.test($('#email_dk').value) == false){
            check = false;
            error[1].innerHTML = "bạn nhập sai ký tự";
        }else{
            error[1].innerHTML = "";
        }
        if( $('#password_dk').value.length == 0){
            check = false;
            error[2].innerHTML = "bạn nhập rỗng";
        }else{
            error[2].innerHTML = "";
        }
    
        if(check == false){
           a.preventDefault();
        }
        
        return check;
        
    }
    $('.form--login').onsubmit = (a)=>{
        check = true;
        error = $$('.form--login .form-message');
        
        if($('#email').value.length == 0){
            check = false;
            error[0].innerHTML = "bạn nhập rỗng";
        }
        else{
            error[0].innerHTML = "";
        }
        if( $('#password').value.length == 0){
            check = false;
            error[1].innerHTML = "bạn nhập rỗng";
        }else{
            error[1].innerHTML = "";
        }
    
        if(check == false){
           a.preventDefault();
        }

        return check;
    }
    
}
filter();