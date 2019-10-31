<?
header("Content-Type: text/html;charset=utf-8");


require ('steamauth/steamauth.php');

if(isset($_SESSION['steamid'])) {
			include ('steamauth/userInfo.php');
}

include "bd.php";

$sql="SELECT gams FROM main WHERE id LIKE '331210'";
        $result = @mysql_query($sql,$db);
        $k=@mysql_num_rows($result);

if ($k>0){
	$gams=@mysql_result($result, 0,"gams");
}

//$lan=$_GET["l"];
//if ($lan==""){$lan="RU";}



function trans($txt){
$lan=$_SESSION["lang"];

include "lang.php";

	if ($lang[$lan][$txt]!=""){
		$txt=$lang[$lan][$txt];
	}
	
	return $txt;
	
}

function check_txt($txt)
{
$txt=str_replace("<","[",$txt);
$txt=str_replace(">","]",$txt);
$txt=str_replace("'",'"',$txt);

    return $txt;
}




$mname="Godcases - ";

$tit=array();
$tit["balance"]=$mname.trans("БАЛАНС");
$tit["deposit"]=$mname.trans("ДЕПОЗИТ");
$tit["main"]=$mname.trans("ГЛАВНАЯ");
$tit["inventory"]=$mname.trans("ИНВЕНТАРЬ");


?>