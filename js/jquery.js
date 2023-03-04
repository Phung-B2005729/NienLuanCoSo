const today = new Date();
const ngay = today.getDate();
const thang = today.getMonth();
const nam = today.getFullYear();
//const ngaysin = document.getElementById("inputdate");
//const ngaysinh = new Date(ngaysin.value);
 // console.log(ngaysinh.getDate());
 //console.log(ngay);
function ktremail(email){
    var emailReg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(emailReg.test(email.value)==false){
      alert("Email khong hop le");
    email.focus();
      return false;
    }
  }
  function ktrmatkhau(pw){
    if(pw.value.length<8){
      alert("mat khau it nhat 8 ki tu");
      pw.focus();
      return false;
    }
  }
  function ktrName(name){
    if(name.value.length<4){
      alert("Vui long nhap ho ten it nhat 4 ky tu");
      name.focus();
      return false;
    }
  }
  function ktrsdt(sdt){
    var dt = /[Z0-9._-]$/;
    if(dt.test(sdt.value) == false){
      alert("số điện thoại không hợp lệ");
      sdt.focus();
      return false;
    }
    if((sdt.value.length>11)||(sdt.value.length<10)){
      alert("số điện thoại không hợp lệ");
      sdt.focus();
      return false;
    }
}
function ktrngaysinh(ns){
  var date = (today.getMonth()+1)+'/'+(today.getDate())+'/'+(today.getFullYear());
  if(ns.value==''){
    alert("Vui lòng nhập vào ngày sinh của bạn");
    ns.focus();
    return false;
  }
  if((ns.value >= date)==true){
    alert("Ngày sinh không hợp lệ");
    ns.focus();
    return false;
  }
}
function ktdangky(form){
    if(ktrName(form.fullname)==false){
        return false;
    }
    if(form.user.value.length<4){
      alert("username ít nhất 4 ký tự");
      form.user.focus();
      return false;
    }
    if(ktremail(form.email)==false){
        return false;
      }
      if(ktrsdt(form.phone)==false){
        return false;
      }
      if(ktrmatkhau(form.password)==false){
        return false;
      }
      if(ktrmatkhau(form.re_password)==false){
        return false;
      }
      if(form.password.value!=form.re_password.value){
        alert("Mật khẩu nhập lại không đúng");
        form.re_password.focus();
        return false;
      }
      const ngaysinh= new Date(form.birthday.value);
       const ngaychon=ngaysinh.getDate();
      const thangchon=ngaysinh.getMonth();
      const namchon=ngaysinh.getFullYear();
       if((namchon>nam)||((namchon==nam)&&(thangchon>thang))||((namchon==nam)&&(thangchon==thang)&&(ngaychon>=ngay))){
          alert("Ngày sinh của bạn không hợp lệ!! Vượt quá ngày hiện tại");
          form.birthday.focus();
          return false;
       }
      
      if(form.khuvuc.value==''){
        alert("Vui lòng chọn khu vực của bạn");
        form.khuvuc.focus();
        return false;
      }
      return true;
      
  }


  function timcumrap(e){
   var id_rap=e.value;
  alert("doi su kien");
  window.load('lichchieuphim.html?id=0');
  } 
  function ghechon(e){
    e.style.background = "Green";
   var tenghe = document.getElementById('ghe');
   var dong = document.createElement("p");
  dong.innerHTML=e.value;
  dong.setAttribute("class",""+e.value);
    tenghe.appendChild(dong); 
  }
  function ghebo(e){
    e.style.background="";
    var ptext = document.getElementsByClassName(e.value);
    var tenghe = document.getElementById('ghe');
    for(var i=0; i<ptext.length; i++){
      ptext[i].innerHTML='';
    }
  }

 