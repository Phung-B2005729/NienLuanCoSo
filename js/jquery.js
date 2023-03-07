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
  window.load('lichchieuphim.html?id=0');
  } 

  // đặt vé

  function xoaghe(e,p){
        // đổi màu ghế
        var maughe = document.getElementById(e);
        maughe.style.background = "";
      // giảm tiền
      var tien = document.getElementById('tien'); 
      var nhantien = document.getElementById('nhan');
      var tongtien=parseInt(tien.value);
  
  
  
      // xoá ghế
      var tenghe = document.querySelector('#ghe');
        var label =tenghe.querySelectorAll("label."+e);
        var input =  tenghe.querySelectorAll('input.'+e);
        var dodainhan=label.length;
        var dodaiinput=input.length;
        var sl = document.getElementById('soghe');
        var tongsl = parseInt(sl.value);
      for(var i=0; i<dodainhan; i++){
        tenghe.removeChild(label[i]);
        tongtien= parseInt(tongtien)-parseInt(p);
        tongsl= tongsl - parseInt('1');
      }
      for(var i=0; i<dodaiinput; i++){
     //   console.log('lập '+i);
        tenghe.removeChild(input[i]);
      }
      tongtien=parseInt(tongtien);
      tongsl = parseInt(tongsl);
      sl.setAttribute("value",tongsl);
      tien.setAttribute("value",tongtien);
      nhantien.innerHTML=tongtien;
}

function taoghe(e,p){
      var maughe = document.getElementById(e);
      maughe.style.background = "Green";
      // lấy sớ lượng ghế

      var sl = document.getElementById('soghe');
      var tongsl;
    if(sl.value==''){
      tongsl=parseInt('1');
    
    }
    else{
      tongsl=parseInt(sl.value)+parseInt('1');
      
    }
         sl.setAttribute("value",tongsl);

      // thêm ghế
          var tenghe = document.getElementById('ghe'); // thêm ghế
        var dong = document.createElement("input");
        dong.setAttribute("value",""+e);
        dong.setAttribute("type","hidden");
        dong.setAttribute("name","ghe"+tongsl);
        dong.setAttribute("class",""+e);
        tenghe.appendChild(dong);
        dong.checked=true;
      // in nhãn ghế
        var nhanghe = document.createElement("label");
        nhanghe.innerText=e;
        nhanghe.setAttribute("class",""+e);
        tenghe.appendChild(nhanghe);

        // thêm nhãn tiền
        var tien = document.getElementById('tien'); 
        
    if(tien.value==''){
      tongtien= parseInt(p);
    }
    else{
      var tongtien = parseInt(tien.value);
      tongtien = parseInt(tongtien+p);
    }

          tien.setAttribute("value",tongtien);
          // in số tiền
          var nhantien = document.getElementById('nhan');
          tongtien=parseInt(tongtien);
          nhantien.innerHTML=tongtien;
}


function ghechon(e,p){

  let el = document.getElementsByClassName(""+e);

 // alert("  giá trị class e " + el.length);
//  alert(""+(el.length !=0));
var maughe = document.getElementById(e);

if(maughe.value=="CD1"){
  var ghedoitiep;
  var dodaichuoi=e.length;
  var stt;
  var e_ketiep;
  var stttiep;
  if((parseInt(e.slice(-1))%2)!=0){
    stt = parseInt(e.slice(-2))+1;
  }
  else{
    stt = parseInt(e.slice(-2))-1;
  }
  stttiep=stt;
  if(stt<=9){
    stttiep="0" + stt;
  }
  e_ketiep = e.charAt(0) + stttiep;
  
  let el_ketiep = document.getElementsByClassName(""+e_ketiep);
  if ((el.length != 0) &&(el_ketiep.length!=0) ) {
    
    xoaghe(e,p);
    xoaghe(e_ketiep,p);
    
  } else{
    taoghe(e,p);
    taoghe(e_ketiep,p);
    }
    
}
else{
  if ((el.length != 0)) {
    
    xoaghe(e,p);
    
    
  } else{
    taoghe(e,p);
    }
}
}

// bap nuoc
function chonbapnuoc(e,g,v){
  var sobapnuoc = document.getElementById('sobap');
  var tenbapnuoc = document.getElementById('bapnuoc'); // inset nhãn bắp nước
  var slbap = document.getElementById(''+e); // sl bắp nước
  slbap.value=v;
  var slc=0;
 var sl= parseInt(sobapnuoc.value) + parseInt(v);
  var nhanbap = document.getElementsByClassName('bap'+e); 
  if(v!=0){
                  if(nhanbap.length==0){
                    var nhan = document.createElement("label");
                    nhan.setAttribute("class","bap"+e);
                    nhan.innerHTML=+v+" "+e+",";
                    tenbapnuoc.appendChild(nhan);
                  }
                  else{
                    for(var i=0; i<nhanbap.length; i++){
                      var cu = nhanbap[i].innerText;
                    // alert("nhãn củ "+cu.charAt(0));
                    slc = parseInt(cu.charAt(0));
                      nhanbap[i].innerText=+v+" "+e+",";
                      
                    }
                  }  
              // thêm nhãn tiền
              var tien = document.getElementById('tien'); 
              if(tien.value==''){
                tongtien= parseInt(g)*v;
              }
              else{
                var tongtien = parseInt(tien.value);
              // alert("gia cu  "+ parseInt(g*(slc)))
                tongtien = parseInt(tongtien-(g*(slc))+(g*v));
              }

                    tien.setAttribute("value",tongtien);
                    // in số tiền
                    var nhantien = document.getElementById('nhan');
                    tongtien=parseInt(tongtien);
                    nhantien.innerHTML=tongtien;

    }
    else{ // khi sl về 0
      var nhan = document.getElementsByClassName('bap'+e);
                if(nhan.length!=0){
                
                  for(var i=0; i<nhan.length; i++){
                  var cu = nhan[i].innerText;
                  slc = parseInt(cu.charAt(0));
                    nhan[i].innerText=+v+" "+e+",";
                    tenbapnuoc.removeChild(nhan[i]);
                  }
                  

                }
                var tien = document.getElementById('tien'); 
                if(tien.value==''){
                  tongtien= parseInt(g)*v;
                }
                else{
                  var tongtien = parseInt(tien.value);
                // alert("gia cu  "+ parseInt(g*(slc)))
                  tongtien = parseInt(tongtien-(g*(slc))+(g*v));
                }
              
                      tien.setAttribute("value",tongtien);
                      // in số tiền
                      var nhantien = document.getElementById('nhan');
                      tongtien=parseInt(tongtien);
                      nhantien.innerHTML=tongtien;
              
    }
    sobapnuoc.value= parseInt(sl-slc);
  }

function doiphuongthuc(){
  var nhap = document.getElementById('nhstk');
  var stk = document.getElementById('stk');
  var pass = document.getElementById('nhpass'); // lây hàng stk
  var atm = document.getElementById('Thanh Toán Trực Tuyến Bằng Thẻ ATM');
  if(atm.checked==true){
    stk.hidden=false;
    nhap.required=true;
 //   nhap.disabled=false;
    pass.required=true;
  //  pass.disabled=false;
  }
  if(atm.checked==false){
    stk.hidden=true;
    nhap.required=false;
 //   nhap.disabled=true;
    pass.required=false;
 //   pass.disabled=true;
  }
}
function datve(e){
  alert(e.phuongthuc.value);
  return false;
}





 