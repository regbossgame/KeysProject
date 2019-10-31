<?

ini_set('session.gc_maxlifetime', 360000);
ini_set('session.cookie_lifetime', 360000);
//session_start();
require ('steamauth/steamauth.php');

if(isset($_SESSION['steamid'])) {
			include ('steamauth/userInfo.php');


			
if ($steamprofile['steamid']==$_SESSION['steamid']){

$kid=$_GET["id"];

include "bd.php";

$sql="SELECT sum FROM inv WHERE id LIKE '$kid' AND user LIKE '".$_SESSION['steamid']."'";
    $result = @mysql_query($sql,$db);
	$k=@mysql_num_rows($result);
//	echo $sql." r=".($result*1)." k=".$k;
	
	if ($k>0){

$sum=@mysql_result($result, 0,"sum");

$sql = "DELETE FROM inv WHERE id LIKE '$kid'";
$result = @mysql_query("$sql",$db);

//echo $sql." r=".($result*1)." k=".$k;

//if (($result*1)!=0){
	$sql="UPDATE users SET sum=sum+".$sum." WHERE id LIKE '".$_SESSION['steamid']."'";
	$result = @mysql_query("$sql",$db);
//	echo $sql." r=".($result*1)." k=".$k." sum=".$sum;
//}


}
}

$ref=$_GET['ref'];
if ($ref==""){
HEADER("LOCATION: ".$_SERVER['HTTP_REFERER']);
}else{
HEADER("LOCATION: ".$ref);
//http://godcases.com/en-case-10	
}


//echo $_SERVER['HTTP_REFERER'];
}else{HEADER("LOCATION: steam.php?login");}

?>