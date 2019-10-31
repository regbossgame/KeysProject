var rnd=Rand(-50,51);
var en=0;

var so=0;

function Rand(min, max)
{
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

function play(){
var	audio = document.getElementById("mysound");
audio.pause();
audio.currentTime = 0;
audio.play();
	
}


function ruls(k,d){
	
if (k>0 || en==0){
	en=1;
	var rul=document.getElementById("rul");
	if (d==0){d=43-Rand(0,3);}

	d=(d-0.214);//0.18
	if (d<=3){d=3;}
	k+=d;
	so+=d;
	rul.scrollLeft=k;
	
	if (so>=150){so=0;play();}
	//if (k>150){
//		play();
	//	}
	//if (d*100)%21
	//play();
		
	if (k<(28*150-30)+rnd){
	setTimeout("ruls("+k+","+d+");",25);
	}else{setTimeout("gogo();",800);}
	
}
}

function gogo(){
	location.reload();
	
}


function getslider(){
	makeRequest('getslider.php','0','');
	setTimeout("getslider();",5000);
	
}

function makeRequest(url,type,params)
{
var http_request = false;
if (window.XMLHttpRequest) 
{ // Mozilla, Safari, ...
http_request = new XMLHttpRequest();
if (http_request.overrideMimeType) 
{
http_request.overrideMimeType('text/xml');
}
} 
else if (window.ActiveXObject) 
{ // IE
try 
{
http_request = new ActiveXObject("Msxml2.XMLHTTP");
} 
catch (e) 
{
try 
{
http_request = new ActiveXObject("Microsoft.XMLHTTP");
} catch (e) {}
}
}

if (!http_request) 
{
alert('Невозможно отобразить данные на странице');
return false;
}

http_request.onreadystatechange = function() { alertContents(http_request,type,params); };
http_request.open('POST', url, true);
http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
http_request.setRequestHeader("Content-length", params.length);
http_request.setRequestHeader("Connection", "close");
http_request.send(params);
}

function alertContents(http_request,type,params) 
{
if (http_request.readyState == 4) 
{
if (http_request.status == 200) 
{

rt=http_request.responseText;

document.getElementById('slider').innerHTML=rt;



}



}else{}//ещё разок если что
}