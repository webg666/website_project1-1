//responsive menu
const  clearStorage = () =>  {
    let session = sessionStorage.getItem('value');
    if (session == null) {
        localStorage.removeItem('text');
        signout();
    }
    sessionStorage.setItem('value', 1);
}
window.addEventListener('load', clearStorage);





let menu = document.querySelector('#menu-icon'); 
let navbar = document.querySelector('.navmenu'); 
menu.onclick = () => {

    navbar.classList.toggle('active');
    if(navbar.classList.contains('active')){
        document.getElementById('blur').style.filter='blur(2px)';
        menu.className="gg-close";
        
    }
    else{
        document.getElementById('blur').style.filter='none';
        menu.className="gg-menu";
    
    }
}

window.onclick=function()
{
    const menu1=document.getElementById('menu-icon')
    let search=document.getElementById("search_text")
    let sBtn=document.getElementById("searchbtn")
    let iconbag=document.getElementById("iconBag")
    let iconprofile=document.getElementById("iconProfile")
    let email_verify=document.getElementById("email_verify")
    const poplog = document.getElementById('login');
    const ldisplay = window.getComputedStyle(poplog).display;
    const popsign= document.getElementById('signup');
    const sdisplay= window.getComputedStyle(popsign).display;
    var login_form = document.getElementById('login_form');
    var signup_form = document.getElementById('signup_form');

    document.onmousedown=function()
    {
        
        if (navbar.classList.contains('active')){
        
            navbar.classList.toggle('active');
            document.getElementById('blur').style.filter='none';
            menu1.className="gg-menu";
        }
        if(search.classList.contains("search-active")){
            search.classList.remove("search-active")
            iconbag.classList.remove("icons-a")
            iconprofile.classList.remove("icons-a")
            
        }
        if (ldisplay=='block'){
            poplog.style.display='none';
            popsign.style.display='none';
            document.body.style.overflow='';
            document.getElementById('header').style.filter='';
            document.getElementById('header').style.position='';
            login_form.reset();   
            $(".fullscreen-container").fadeOut(200);
            enableScroll()
           
                }
        if (sdisplay=='block'){
            popsign.style.display='none';
            poplog.style.display='none';
            document.body.style.overflow='';
            document.getElementById('header').style.filter='';
            document.getElementById('header').style.position='';
            signup_form.reset(); 
            $(".fullscreen-container").fadeOut(200);     
            enableScroll()
        }

    }

    menu1.addEventListener('mousedown',event => event.stopPropagation())
    search.addEventListener('mousedown',event => event.stopPropagation())
    sBtn.addEventListener('mousedown',event => event.stopPropagation())
    poplog.addEventListener('mousedown',event => event.stopPropagation())
    popsign.addEventListener('mousedown',event => event.stopPropagation())
    email_verify.addEventListener('mousedown',event => event.stopPropagation())
};


//Search

function search(){
let search=document.getElementById("search_text");
let iconbag=document.getElementById("iconBag");
let iconprofile=document.getElementById("iconProfile");

if(search.classList.contains("search-active")){
    search.classList.remove("search-active")
    iconbag.classList.remove("icons-a")
    iconprofile.classList.remove("icons-a")
}
else if(search.classList.contains("search")){
        search.classList.add("search-active")
        iconbag.classList.add("icons-a")
        iconprofile.classList.add("icons-a")
        
    }
}



function poplogin(){

    if (localStorage.getItem("text")!="login"){
        document.getElementById('signup').style.display='none';
        document.getElementById('login').style.display='block';
        document.getElementById('header').style.position='static';
        document.getElementById("signup_password").type="password";
        document.getElementById("signup_pass").className = "fa-solid fa-eye";
        document.getElementById("login_password").type="password";
        document.getElementById("login_pass").className = "fa-solid fa-eye";
        document.getElementById('signup_form').reset();
        document.body.style.overflow='hidden';
        window.scrollTo(0,0);
        disableScroll()
    }
    else if(localStorage.getItem("text")=="login"){
        window.location.replace('http://localhost/website_project1/profile.php')
    }

    
}


function popsign(){
    document.getElementById('login').style.display='none';
    document.getElementById('signup').style.display='block';
    document.getElementById('header').style.position='static';
    document.getElementById('login_form').reset();
    document.body.style.overflow='hidden';
    disableScroll()
}





/*scroll up */
function scrollUp(){
    window.scrollTo({top: 0,behavior:"smooth" })
    

}

const scroll_up = document.getElementById("scroll-up");

window.addEventListener("scroll", () => {
    if (window.pageYOffset > 100){
        scroll_up.classList.add("active");
    }
    else{
        scroll_up.classList.remove("active");
    }

})

//Products
var path=window.location.pathname;
var page=path.split("/").pop();

if(page=="sproduct.html"){
var Mainimg = document.getElementById("main-img");
var Smallimg = document.getElementsByClassName("small-img");

Smallimg[0].onclick = function (){
    Mainimg.src = Smallimg[0].src;
}
Smallimg[1].onclick = function (){
    Mainimg.src = Smallimg[1].src;
}
Smallimg[2].onclick = function (){
    Mainimg.src = Smallimg[2].src;
}
Smallimg[3].onclick = function (){
    Mainimg.src = Smallimg[3].src;
}
Smallimg[4].onclick = function (){
    Mainimg.src = Smallimg[4].src;
}
}

username = addEventListener('input', check_signup);
password = addEventListener('input', check_signup);
email = addEventListener('input' ,check_signup);
function check_signup(){
    var check="true";

    if(document.URL!="http://localhost/website_project1/profile.php"){

    //username checker:
    let username = document.getElementById("username");
    var name1= document.head.appendChild(document.createElement("style"));
    var name2= document.head.appendChild(document.createElement("style"));

    if (username.value.length < 4){
        name1.innerHTML="#name span::before {background: brown;}";
        name2.innerHTML="#name input:valid ~ label, #name input:focus ~ label  {color: brown;}";
        check="false";
    }else{
        
        name1.innerHTML="#name span::before {background: green;}";
        name2.innerHTML="#name input:valid ~ label, #name input:focus ~ label  {color: green;}";
    }



    //password checker:
    let password = document.getElementById("signup_password");
    var pass1= document.head.appendChild(document.createElement("style"));
    var pass2= document.head.appendChild(document.createElement("style"));    

    if (password.value.length < 8){
        pass1.innerHTML="#pass span::before {background: brown;}";
        pass2.innerHTML="#pass input:valid ~ label, #pass input:focus ~ label  {color: brown;}";
        check="false";
    }else{
        
        pass1.innerHTML="#pass span::before {background: green;}";
        pass2.innerHTML="#pass input:valid ~ label, #pass input:focus ~ label  {color: green;}";
    }


    //email checker:
    let email = document.getElementById("email");
    var email_error= document.getElementById("email_error");
    var mail1= document.head.appendChild(document.createElement("style"));
    var mail2= document.head.appendChild(document.createElement("style"));
    var email_text = email_error.innerText || email_error.textContent;
    email_error.innerHTML = email_text;  
    var regExp_email= /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;


    if (!(email.value.match(regExp_email))&&(email.value.length>0)){
        email_error.innerHTML="Please enter a valid email address";
        mail1.innerHTML="#mail span::before {background: brown;}";
        mail2.innerHTML="#mail input:valid ~ label, #mail input:focus ~ label  {color: brown;}";
        email_error.style.display="block";
        check="false";
    }else if(email.value.length==0){
        mail1.innerHTML="#mail span::before {background: brown;}";
        mail2.innerHTML="#mail input:valid ~ label, #mail input:focus ~ label  {color: brown;}";
        email_error.style.display="none";
        check="false";

    }else{
        mail1.innerHTML="#mail span::before {background: green;}";
        mail2.innerHTML="#mail input:valid ~ label, #mail input:focus ~ label  {color: green;}";
        email_error.style.display="none";
    }

    //phone checker:
    let phone_number = document.getElementById("phone_number");
    var phone_error= document.getElementById("phone_error");
    var phone1= document.head.appendChild(document.createElement("style"));
    var phone2= document.head.appendChild(document.createElement("style"));
    var phone_text = phone_error.innerText || phone_error.textContent;
    phone_error.innerHTML = phone_text;  
    var regExp_phone= /^\d{10}$/;


    if (!(phone_number.value.match(regExp_phone))&&(phone_number.value.length>0)){
        phone_error.innerHTML = "Please enter a valid phone number";
        phone1.innerHTML="#phone span::before {background: brown;}";
        phone2.innerHTML="#phone input:valid ~ label, #phone input:focus ~ label  {color: brown;}";
        phone_error.style.display="block";
        check="false";
    }else if(phone_number.value.length==0){
        phone1.innerHTML="#phone span::before {background: brown;}";
        phone2.innerHTML="#phone input:valid ~ label, #phone input:focus ~ label  {color: brown;}";
        phone_error.style.display="none";
        check="false";
    }else{
        phone1.innerHTML="#phone span::before {background: green;}";
        phone2.innerHTML="#phone input:valid ~ label, #phone input:focus ~ label  {color: green;}";
        phone_error.style.display="none";
    }
    //date checker:
    let day = document.getElementById("day");
    var date1= document.head.appendChild(document.createElement("style"));
    var date2= document.head.appendChild(document.createElement("style"));  
    var today = new Date();
    var today_dd = today.getDate();
    var today_mm = today.getMonth() ; 
    var today_yyyy = today.getFullYear();
    today =  today_mm  + today_dd + today_yyyy ;
    var user_date=new Date(day.value);
    var user_dd = user_date.getDate();
    var user_mm = user_date.getMonth(); 
    var user_yyyy = user_date.getFullYear();
    user_date =  user_mm + user_dd + user_yyyy;
    

    year=today_yyyy-user_yyyy;

    if((year>16)&&(year<110)){
        date1.innerHTML="#date span::before {background: green;}";
        date2.innerHTML="#date input:valid ~ label, #date input:focus ~ label  {color: green;}";
        date_error.style.display="none";


    }
    else if((year==16)&&user_mm>=today_mm){
        if(user_dd>=today_dd){
            date1.innerHTML="#date span::before {background: green;}";
            date2.innerHTML="#date input:valid ~ label, #date input:focus ~ label  {color: green;}";
            date_error.style.display="none";
            
        }
    }

    else if (day.value.length<=0){
        date1.innerHTML="#date span::before {background: brown;}";
        date2.innerHTML="#date input:valid ~ label, #date input:focus ~ label  {color: brown;}";
        date_error.style.display="none";
        check="false";

    }
    else {
        date1.innerHTML="#date span::before {background: brown;}";
        date2.innerHTML="#date input:valid ~ label, #date input:focus ~ label  {color: brown;}";
        date_error.style.display="block";
        check="false";

    }
   

/*check for valid input*/
let bt=document.getElementById("submit_signup");
var bt_hover= document.head.appendChild(document.createElement("style"));
if (check=="true"){
    bt.disabled = false;
    bt.style.cursor="pointer";
    bt.style.opacity="1";
    bt_hover.innerHTML="#submit_signup:hover {border-color: brown;}";

}
else if(check=="false"){
    bt.disabled = true;
    bt.style.cursor="default";
    bt.style.opacity="0.8";
    bt_hover.innerHTML="#submit_signup:hover {border-color: none;}";
}
    }

}


password_login = addEventListener('input', check_login);
email_login = addEventListener('input' ,check_login);

function check_login(){
    check_l="true";
    if (document.URL!="http://localhost/website_project1/profile.php"){
//password checker:
    let password = document.getElementById("login_password");
  
    if (password.value.length == 0 ){
        check_l="false";    
    }

//email checker:
    let email = document.getElementById("login_email");


    if (email.value.length == 0){
        check_l="false";
    

    }

/*check for valid input*/
    let bt=document.getElementById("submit_login");
    var bt_hover= document.head.appendChild(document.createElement("style"));
    if (check_l=="true"){
        bt.disabled = false;
        bt.style.cursor="pointer";
        bt.style.opacity="1";
        bt_hover.innerHTML="#submit_login:hover {border-color: brown;}";

    }
    else if(check_l=="false"){
        bt.disabled = true;
        bt.style.cursor="default";
        bt.style.opacity="0.8";
        bt_hover.innerHTML="#submit_login:hover {border-color: white;}";
    }
}
}
/*email verify */
code_verify = addEventListener('input', check_verify);

function check_verify(){

    let code = document.getElementById("code");    
    let bt=document.getElementById("submit_email");
    var bt_hover= document.head.appendChild(document.createElement("style"));

if(document.URL!="http://localhost/website_project1/profile.php"){
    if (code.value.length>0){
        bt.disabled = false;
        bt.style.cursor="pointer";
        bt.style.opacity="1";
        bt_hover.innerHTML="#submit_email:hover {border-color: brown;}";
        

    }
    else{
        bt.disabled = true;
        bt.style.cursor="default";
        bt.style.opacity="0.8";
        bt_hover.innerHTML="#submit_email:hover {border-color: white;}";
    }

}
}

function signup_pass(){
    var pass = document.getElementById("signup_password");
    var icon = document.getElementById("signup_pass")
    if (pass.type=="password"){
        pass.type="text";
        icon.className = "fa-solid fa-eye-slash";
    }else{
        pass.type="password";
        icon.className = "fa-solid fa-eye";
    }

}

function login_pass(){
    var pass = document.getElementById("login_password");
    var icon = document.getElementById("login_pass")
    if (pass.type=="password"){
        pass.type="text";
        icon.className = "fa-solid fa-eye-slash";
    }else{
        pass.type="password";
        icon.className = "fa-solid fa-eye";
    }

}


function signout(){
    localStorage.removeItem("text");
    $.ajax({
        type: "GET",
        url: "logout.php",
        data: {h:"kot"},
        succes : function(){
            location.reload();
        }
    });
    window.location.replace('http://localhost/website_project1/index.html');

}

const search_products = () =>{
    const searchbox = document.getElementById("search-item").value.toUpperCase();
    const storeitems = document.getElementById("product-list");
    const product = document.querySelectorAll(".product");
    const pname = storeitems.getElementsByTagName("h2");

    for (var i=0; i < pname.length; i++){
        let match = product[i].getElementsByTagName('h2')[0];
        if(match){
            let textvalue = match.textContent || match.innerHTML;

            if (textvalue.toLocaleUpperCase().indexOf(searchbox)> -1){
                product[i].style.display = "";
            }else{
                product[i].style.display = "none";

            }
        }

    }

}







// Cart

let cartIcon = document.querySelector("#bag-ickon");
let cart = document.querySelector('.cart');
let closecart = document.querySelector("#close-cart");


cartIcon.onclick = () => {
    cart.classList.toggle('active');
};

closecart.onclick = () => {
    cart.classList.remove('active');
};





//Cart Working

var shippingRate =15.00;
var fadeTime = 300;

// Assign actions

$('.cart-quantity input').change(function(){
    updateQuantity(this);
})

$('.cart-remove').click( function() {
    removeItem(this);
  });

  //Recalculate cart

  function recalculateCart()
  {
    var subtotal = 0;

  $('.cart-box').each(function () {
    subtotal += parseFloat($(this).children('.total-title').text());
  });
  }

  /* Calculate totals */
  var subtotal ;
  var shipping = (subtotal > 0 ? shippingRate : 0);
  var total = subtotal  + shipping;

  /* Update totals display */
  $('.totals-value').fadeOut(fadeTime, function() {
    $('#cart-subtotal').html(subtotal.toFixed(2));
    $('#cart-tax').html(tax.toFixed(2));
    $('#cart-shipping').html(shipping.toFixed(2));
    $('#cart-total').html(total.toFixed(2));
    if(total == 0){
      $('.checkout').fadeOut(fadeTime);
    }else{
      $('.checkout').fadeIn(fadeTime);
    }
    $('.totals-value').fadeIn(fadeTime);
  });

/*disable scroll- enable scroll*/

var keys = {37: 1, 38: 1, 39: 1, 40: 1};

function preventDefault(e) {
  e.preventDefault();
}

function preventDefaultForScrollKeys(e) {
  if (keys[e.keyCode]) {
    preventDefault(e);
    return false;
  }
}


var supportsPassive = false;
try {
  window.addEventListener("test", null, Object.defineProperty({}, 'passive', {
    get: function () { supportsPassive = true; } 
  }));
} catch(e) {}

var wheelOpt = supportsPassive ? { passive: false } : false;
var wheelEvent = 'onwheel' in document.createElement('div') ? 'wheel' : 'mousewheel';

// Disable
function disableScroll() {
  window.addEventListener('DOMMouseScroll', preventDefault, false); 
  window.addEventListener(wheelEvent, preventDefault, wheelOpt); 
  window.addEventListener('touchmove', preventDefault, wheelOpt);
  window.addEventListener('keydown', preventDefaultForScrollKeys, false);
}

// Enable
function enableScroll() {
  window.removeEventListener('DOMMouseScroll', preventDefault, false);
  window.removeEventListener(wheelEvent, preventDefault, wheelOpt); 
  window.removeEventListener('touchmove', preventDefault, wheelOpt);
  window.removeEventListener('keydown', preventDefaultForScrollKeys, false);
}

$(function() {
    $("#iconProfile").click(function() {
      $(".fullscreen-container").fadeTo(200, 1);
    });
      
  });

/*loadings*/

function  loading_login(){
    let submit_login=document.getElementById("submit_login");
    submit_login.innerHTML ='<i  class="fa fa-spinner fa-spin"></i>';
    
}

function  loading_signup(){
    let submit_signup=document.getElementById("submit_signup");
    submit_signup.innerHTML ='<i  class="fa fa-spinner fa-spin"></i>';
}

function  loading_verify(){
    let submit_email=document.getElementById("submit_email");
    submit_email.innerHTML ='<i  class="fa fa-spinner fa-spin"></i>';
}

function loading_edit(){
    let submit_edit=document.getElementById("save");
    submit_edit.innerHTML ='<i  class="fa fa-spinner fa-spin"></i>';

}

/* profile */
function  order(){
    document.getElementById('settings').style.display='none';
    document.getElementById('content').style.display='none';
    document.getElementById('edit').style.display='none';
    document.getElementById('change_pass').style.display='none';
    document.getElementById('edit_form').reset();
    document.getElementById('orders').style.display='block';
    document.getElementById('setting').style.boxShadow='';
    document.getElementById('setting').style.color='';
    document.getElementById('order').style.boxShadow='none';
    document.getElementById('order').style.color='bisque';

}

function  settings(){
    document.getElementById('content').style.display='none';
    document.getElementById('orders').style.display='none';
    document.getElementById('edit').style.display='none';
    document.getElementById('change_pass').style.display='none';
    document.getElementById('edit_form').reset();
    document.getElementById('settings').style.display='block';
    document.getElementById('order').style.boxShadow='';
    document.getElementById('order').style.color='';
    document.getElementById('setting').style.boxShadow='none';
    document.getElementById('setting').style.color='bisque';

}


function edit(){
    document.getElementById('content').style.display='none';
    document.getElementById('orders').style.display='none';
    document.getElementById('settings').style.display='none';
    document.getElementById('change_pass').style.display='none';
    document.getElementById('edit').style.display='block';
    check_edit();
}

function cancel(){
    document.getElementById('content').style.display='none';
    document.getElementById('orders').style.display='none';
    document.getElementById('edit').style.display='none';
    document.getElementById('change_pass').style.display='none';
    document.getElementById('edit_form').reset();
    document.getElementById('settings').style.display='block';

}

function change_passBTN(){
    document.getElementById('content').style.display='none';
    document.getElementById('orders').style.display='none';
    document.getElementById('edit').style.display='none';
    document.getElementById('settings').style.display='none';
    document.getElementById('pass_form').reset();
    document.getElementById('change_pass').style.display='block';
    var pass1 = document.getElementById("password_1");
    var btn = document.getElementById("show1")
    var pass2 = document.getElementById("password_2");
    var btn2 = document.getElementById("show2")
    var pass3 = document.getElementById("password_3");
    var btn3 = document.getElementById("show3")
    pass1.type="password";
    btn.innerHTML = "SHOW";
    pass2.type="password";
    btn2.innerHTML = "SHOW";
    pass3.type="password";
    btn3.innerHTML = "SHOW";
    pass_check();

}

/* SHOW BTNS */
function show_pass1(){
    var pass1 = document.getElementById("password_1");
    var btn = document.getElementById("show1")
    if (pass1.type=="password"){
        pass1.type="text";
        btn.innerHTML = "HIDE";
    }else{
        pass1.type="password";
        btn.innerHTML = "SHOW";
    }

}

function show_pass2(){
    var pass2 = document.getElementById("password_2");
    var btn = document.getElementById("show2")
    if (pass2.type=="password"){
        pass2.type="text";
        btn.innerHTML = "HIDE";
    }else{
        pass2.type="password";
        btn.innerHTML = "SHOW";
    }

}

function show_pass3(){
    var pass3 = document.getElementById("password_3");
    var btn = document.getElementById("show3")
    if (pass3.type=="password"){
        pass3.type="text";
        btn.innerHTML = "HIDE";
    }else{
        pass3.type="password";
        btn.innerHTML = "SHOW";
    }


}

username = addEventListener('input', check_edit);

email_edit = addEventListener('input', check_edit);


function check_edit(){
        var check="true";
        if (document.URL=="http://localhost/website_project1/profile.php"){
        const edit = document.getElementById('edit');
        const edit_d = window.getComputedStyle(edit).display;


        //username checker:
        let username = document.getElementById("username_edit");
        var name_errorEdit= document.getElementById("name_errorEdit");
        
    
        if (username.value.length < 4){
            name_errorEdit.innerHTML="username must be >4 characters";
            check="false";
        }else{
            
            name_errorEdit.innerHTML="";
            
        }
        //email checker:
        let email_edit = document.getElementById("email_edit");
        var email_errorEdit= document.getElementById("email_errorEdit");
        var email_text = email_errorEdit.innerText || email_errorEdit.textContent;
        email_errorEdit.innerHTML = email_text;  
        var regExp_email= /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    
    
        if (!(email_edit.value.match(regExp_email))||(email_edit.value.length==0)){
            email_errorEdit.innerHTML="please enter a valid email address";
            check="false";
        }else{
            
            email_errorEdit.innerHTML="";
            
        }

        //phone checker:
        let phone_edit = document.getElementById("phone_edit");
        var phone_errorEdit= document.getElementById("phone_errorEdit");
        var phone_text = phone_errorEdit.innerText || phone_errorEdit.textContent;
        phone_errorEdit.innerHTML = phone_text;  
        var regExp_phone= /^\d{10}$/;


        if (!(phone_edit.value.match(regExp_phone))||(phone_edit.value.length==0)){
            phone_errorEdit.innerHTML = "Please enter a valid phone number";
            check="false";
        }else{
            phone_errorEdit.innerHTML = "";
        }


        //date checker:
        let date_edit = document.getElementById("date_edit");
        var date_errorEdit = document.getElementById("date_errorEdit");
        var date_text = date_errorEdit.innerText || date_errorEdit.textContent;
        date_errorEdit.innerHTML = phone_text; 
        var today = new Date();
        var today_dd = today.getDate();
        var today_mm = today.getMonth() ; 
        var today_yyyy = today.getFullYear();
        today =  today_mm  + today_dd + today_yyyy ;
        var user_date=new Date(date_edit.value);
        var user_dd = user_date.getDate();
        var user_mm = user_date.getMonth(); 
        var user_yyyy = user_date.getFullYear();
        user_date =  user_mm + user_dd + user_yyyy;
        

        year=today_yyyy-user_yyyy;

        if((year>16)&&(year<110)){
            date_errorEdit.innerHTML = "";
        }else if((year==16)&&user_mm>=today_mm){
            if(user_dd>=today_dd){
                date_errorEdit.innerHTML = "";
                }
            
            }else{

                date_errorEdit.innerHTML = "You have to be at least 16 years old";
                check="false"
            }

    /*check for valid input*/
    let save=document.getElementById("save");
    if (check=="true"){
        save.disabled = false;
        save.style.cursor="pointer";
        save.style.opacity="1";

    }
    else if(check=="false"){
        save.disabled = true;
        save.style.cursor="default";
        save.style.opacity="0.7";
    }
}
}

password_c = addEventListener('input', pass_check);



function pass_check(){
    check2 = "true";
    if (document.URL=="http://localhost/website_project1/profile.php"){
    let pass1 = document.getElementById("password_1");
    var pass1_errorEdit= document.getElementById('pass1_errorEdit');
    var pass1_text = pass1_errorEdit.innerText || pass1_errorEdit.textContent;
    pass1_errorEdit.innerHTML = pass1_text;  

    if(pass1.value==0){
        pass1_errorEdit.innerHTML = 'Please fill out this field.';
        check2 = "false";
    }
    else{

        pass1_errorEdit.innerHTML = '';
    }


    let pass2 = document.getElementById("password_2");
    var pass2_errorEdit= document.getElementById('pass2_errorEdit');
    var pass2_text = pass2_errorEdit.innerText || pass2_errorEdit.textContent;
    pass2_errorEdit.innerHTML = pass2_text;  

    if(pass2.value==0){
        pass2_errorEdit.innerHTML = 'Please fill out this field.';
        check2 = "false";
        
    }
    else{
        pass2_errorEdit.innerHTML = '';
        
    }



    let pass3 = document.getElementById("password_3");
    var pass3_errorEdit= document.getElementById('pass3_errorEdit');
    var pass3_text = pass3_errorEdit.innerText || pass3_errorEdit.textContent;
    pass3_errorEdit.innerHTML = pass3_text;  

    if(pass3.value==0){
        pass3_errorEdit.innerHTML = 'Please fill out this field.';
        check2 = "false";
    }
    else{

        pass3_errorEdit.innerHTML = '';
    }

    /*check for valid input*/
    let save2=document.getElementById("save_pass");
    if (check2=="true"){
        save2.disabled = false;
        save2.style.cursor="pointer";
        save2.style.opacity="1";

    }
    else if(check2=="false"){
        save2.disabled = true;
        save2.style.cursor="default";
        save2.style.opacity="0.7";
    }
}


}


