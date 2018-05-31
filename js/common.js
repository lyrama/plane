function isPC() {
	var ua = navigator.userAgent.toLowerCase();
	if(ua.indexOf('mobi') != -1) {

		// 手机浏览器
		return false;

	} else {
		// 非手机浏览器
		console.log('非手机  PC')
		return true
	}
}

function isIOS() {
	var ua = navigator.userAgent.toLowerCase();

	console.log('手机')
	if(ua.indexOf('iphone') != -1 || ua.indexOf('ipad')) {
		console.log('ios')
		return true;
	} else if(ua.indexOf('android') != -1) {
		console.log('安卓')
		return false;
	}

}

//获取search中某一个  字段   
//?id=9888&name=a&age=18
function getUrlParam(str) {
	var arr = location.search.slice(1).split('&')
	//console.log(arr);

	for(var i = 0; i < arr.length; i++) {
		var p = arr[i]; //id=1111    name=aaa
		//console.log(p)
		var t = p.split('=');
		//console.log(t)
		if(t[0] == str) {
			return t[1]
		}

	}

}