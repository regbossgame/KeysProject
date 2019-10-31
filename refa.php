<?
ini_set('session.gc_maxlifetime', 360000);
ini_set('session.cookie_lifetime', 360000);
session_start();

$url=$_SERVER['REQUEST_URI'];
$loc=false;
if (strpos($url,"index.php")!=false){$url=str_replace("index.php","",$url);$loc=true;}
$deflan="en";
$url=str_replace("/","",$url);
$rot=explode("-",$url);
$LA = array("ru", "en");

//echo $url."=";
//print_r($rot);

//inventory=|inventoiry+? ??????
if (!in_array($rot[0],$LA)){
		if ($_SESSION["lang"]==""){
		$_SESSION["lang"]=$deflan;
		$url.="/".$deflan;
		}else{
			$url.="/".$_SESSION["lang"];
		}
		
		//if ($rot[1]!=""){$url.="-".$rot[1];}
		$loc=true;
}else{
	$_SESSION["lang"]=$rot[0];
//	if ($rot[1]!=""){$url.="-".$rot[1];$loc=true;}
}


if ($rot[1]==""){$str="main";}else{$str=$rot[1];}
/*
$str=$_GET["cat"];
if ($str==""){$str="main";}

//$lan=$_GET["lang"];
if ($lan==""){
	if ($_SESSION["lang"]!=""){
	$lan=$_SESSION["lang"];}else{$lan="ru";}
	}
$_SESSION["lang"]=$lan;


$loc=false;

if ($lan!=$deflan){
if (strpos($url,"lang=")==false){
	if (strpos($url,"?")!=false){$url.="&lang=".$lan;$loc=true;}
	if (strpos($url,"?")==false){$url.="?lang=".$lan;$loc=true;}
	
}
}else{
	if (strpos($url,"&lang=".$deflan)!=false){$url=str_replace("&lang=".$deflan,"",$url);$loc=true;}
	if (strpos($url,"?lang=".$deflan)!=false){$url=str_replace("?lang=".$deflan,"",$url);$loc=true;}
}
*/
//if (strpos($url,".ru")!=false){$url=str_replace(".ru",".com",$url);$loc=true;}


$url=$_SERVER['SERVER_NAME'].$url;
if ($loc){HEADER("LOCATION: http://".$url);}
$lan=$_SESSION["lang"];
//echo $url."|".($loc*1)."|".$_SERVER["PATH_INFO"];
?>