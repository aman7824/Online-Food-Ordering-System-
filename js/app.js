// working on showing password starts

let password =  document.getElementById('password');
let check =  document.getElementById('check_password');

if(check){
    check.addEventListener('click', function(){
        if(check.checked){
            password.type = "text";
        }else{
            password.setAttribute('type', 'password');
        }
    });
}
// working on showing password ends
// working on notification starts
