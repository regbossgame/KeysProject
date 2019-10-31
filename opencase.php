<?
//include "refa.php";
ini_set('session.gc_maxlifetime', 360000);
ini_set('session.cookie_lifetime', 360000);
//session_start();
require ('steamauth/steamauth.php');

if(isset($_SESSION['steamid'])) {
			include ('steamauth/userInfo.php');


			
if ($steamprofile['steamid']==$_SESSION['steamid']){


$kid=$_GET["id"];

$css = array();

for ($i=1;$i<=10;$i++){
	$css[$i]=$i*10;
}

if (in_array($kid,$css)){



include "bd.php";

$sql="SELECT * FROM cas WHERE id LIKE '$kid'";
        $result = @mysql_query($sql,$db);
        $k=@mysql_num_rows($result);

		
		
if ($k>0){
	$zen=@mysql_result($result, 0,"zen");

$sql="SELECT sum FROM users WHERE id LIKE '".$_SESSION['steamid']."'";
    $result = @mysql_query($sql,$db);
    
	$sum=@mysql_result($result, 0,"sum");
	
	if ($sum>=$zen){
		

$sql="SELECT * FROM main WHERE id LIKE '331210'";
        $result = @mysql_query($sql,$db);
        $k=@mysql_num_rows($result);



if ($k>0){
$vin=@mysql_result($result, 0,"vin");
$los=@mysql_result($result, 0,"los");
$proc=@mysql_result($result, 0,"proc");
$gams=@mysql_result($result, 0,"gams");
$gams++;


$t1=round(($los/$vin)*100,2);
if ($t1<$proc){
	$t1=10000000*($t1/$proc);
	if ($t1<0){$t1=1;}
}else{$t1=10000000;}

$rnd=rand(0,$t1)/100000.00;
	

$sql="SELECT * FROM items WHERE cas LIKE '$kid' ORDER BY sum ASC";
    $result = @mysql_query($sql,$db);
	$k=@mysql_num_rows($result);


	
$mas=array();
$nam1=array();
$nam2=array();
$grade=array();
$suma=array();
$ids=array();
$line=array();


$s1=0;
for($i=0;$i<$k;$i++){
	$mas[$i]=@mysql_result($result, $i,"sum");
	$ids[$i]=@mysql_result($result, $i,"id");
	$nam1[$i]=@mysql_result($result, $i,"name1");
	$nam2[$i]=@mysql_result($result, $i,"name2");
	$grade[$i]=@mysql_result($result, $i,"grade");
	$suma[$i]=@mysql_result($result, $i,"sum");
	$mas[$i]=1.00/$mas[$i];
	$s1+=$mas[$i];
}
$rez=-1;
$t1=0;
$line[-1]=-1;

for($i=0;$i<$k;$i++){
$t1+=((($mas[$i])/$s1))*100;
$line[$i]=$t1;
if ($rez==-1){
	if ($rnd>$line[$i-1] && $rnd<=$line[$i]){$rez=$i;break;}
}	
	
}



$vin+=$suma[$rez];
$los+=$zen;

$sum-=$zen;
	$sql="UPDATE users SET sum='".$sum."', open=open+1, vin=vin+'".$suma[$rez]."', los=los+'".$zen."', prof=(vin-los) WHERE id LIKE '".$_SESSION['steamid']."'";
	$result = @mysql_query("$sql",$db);


$sql="UPDATE main SET vin='".$vin."', los='".$los."', gams='".$gams."'";
$result = @mysql_query("$sql",$db);
	
$type="inv";
include "gen_id.php";

$sql = "INSERT INTO inv ( id,item,user,name1,name2,grade,sum ) VALUES ('$nid','".$ids[$rez]."', '".$_SESSION['steamid']."','".$nam1[$rez]."','".$nam2[$rez]."','".$grade[$rez]."','".$suma[$rez]."' )";
 $result = @mysql_query("$sql",$db);

 
 $_SESSION["wina"]=$ids[$rez];
//echo "rnd=".$rnd." rez=".$rez." sql=".$sql;	
 
 $_SESSION['enslider']=0;
 
 HEADER("LOCATION: /".$_SESSION["lang"]."-win-".$kid);
	
	
}		

	}else{echo "Low money -> ".$sum."<br><a href='index.php'>return</a>";}

	}

}

}

}else{HEADER("LOCATION: steam.php?login");}



?>