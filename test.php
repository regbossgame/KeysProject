<?


ini_set('session.gc_maxlifetime', 360000);
ini_set('session.cookie_lifetime', 360000);
session_start();

$url=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];


$lan=$_GET["lang"];
if ($lan==""){
	if ($_SESSION["lang"]!=""){
	$lan=$_SESSION["lang"];}else{$lan="RU";}
	}
$_SESSION["lang"]=$lan;


$loc=false;

if ($lan!="RU"){
if (strpos($url,"lang=")==false){
	if (strpos($url,"?")!=false){$url.="&lang=".$lan;$loc=true;}
	if (strpos($url,"?")==false){$url.="?lang=".$lan;$loc=true;}
	
}
}else{
	if (strpos($url,"&lang=RU")!=false){$url=str_replace("&lang=RU","",$url);$loc=true;}
	if (strpos($url,"?lang=RU")!=false){$url=str_replace("?lang=RU","",$url);$loc=true;}
}

//if (strpos($url,".ru")!=false){$url=str_replace(".ru",".com",$url);$loc=true;}
if (strpos($url,"index.php")!=false){$url=str_replace("index.php","",$url);$loc=true;}


if ($loc){HEADER("LOCATION: http://".$url);}
echo $url."|".$loc*1;

?>