function show_beizhu(){
    $("#DDTABLE a").bind("click",function(){ 
        var hol = $(this).attr("rel"); 
        var data = "action=getbeizhu&id="+hol; 
       
        $.getJSON("server.php?d="+Math.random()+"&",data, function(json){  
			$("#title").html(json.gname); 
            $("#text").html(json.beizhu); 
       });  
	show(); 
    }); 

}

function show_chanpin(){
    $("#DDTABLE a").bind("click",function(){ 
        var hol = $(this).attr("rel"); 
        var data = "action=getchanpin&id="+hol; 
       
        $.getJSON("server.php?d="+Math.random()+"&",data, function(json){  
			$("#title").html(json.cname); 
            $("#text").html(json.guige); 
       });  
	show(); 
    }); 

}

function show_kpzl(){
    $("#DDTABLE a").bind("click",function(){ 
        var hol = $(this).attr("rel"); 
        var data = "action=getkpzl&id="+hol; 
       
        $.getJSON("server.php?d="+Math.random()+"&",data, function(json){  
			$("#kpzl_name").html(json.name); 
            $("#kpzl_shuihao").html(json.shuihao); 
			$("#kpzl_dizhi").html(json.dizhi); 
			$("#kpzl_zhanghao").html(json.zhanghao); 
			$("#kpzl_beizhu").html(json.beizhu); 
       });  
	showkpzl(); 
    }); 

}


function show(){
	var iWidth = document.documentElement.clientWidth;	//获取浏览器宽度
	var iHeight = document.documentElement.clientHeight;	//获取浏览器高度
 
	var oShow = document.getElementById('show');
		oShow.style.display = 'block';
        oShow.style.left = (iWidth-302)/2+"px";	//居中横坐标
		oShow.style.top = (iHeight-202)/2+"px";	//居中纵坐标
	var oClose = document.createElement("span");
		oClose.innerHTML = "XXXXX";
		oShow.appendChild(oClose);
		oClose.onclick = function(){
			oShow.style.display = 'none';
			oShow.removeChild(this);
		}
} 


function showkpzl(){
	var iWidth = document.documentElement.clientWidth;	//获取浏览器宽度
	var iHeight = document.documentElement.clientHeight;	//获取浏览器高度
 
	var oShow = document.getElementById('kpzl');
		oShow.style.display = 'block';
        oShow.style.left = (iWidth-302)/2+"px";	//居中横坐标
		oShow.style.top = (iHeight-202)/2+"px";	//居中纵坐标
	var oClose = document.createElement("span");
		oClose.innerHTML = "XXXXX";
		oShow.appendChild(oClose);
		oClose.onclick = function(){
			oShow.style.display = 'none';
			oShow.removeChild(this);
		}
} 

