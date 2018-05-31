//设置cookie
function setCookie(name,value,iDay){
    var newDate = new Date();
    
    newDate.setDate(newDate.getDate()+iDay);
//编码  把可能为中文的编码一下
    value = encodeURIComponent(value);
     
    document.cookie=name+"="+value+";expires="+newDate+";path=/";
}

//获取cookie
function getCookie(name){
     //解码
    var cookie = decodeURIComponent(document.cookie);
    var arr = cookie.split("; ");
    for(var i =0; i<arr.length; i++){
        var arr2 = arr[i].split("=");
        if(arr2[0] == name){
            return arr2[1];
        }
    }
}

//删除cookie
function removeCookie(name){
      setCookie(name,'',-100);
}