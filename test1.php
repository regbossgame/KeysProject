<?

include "bd.php";
$caso=$_GET['id'];
//for($i1=0;$i1<3000;$i1++){
	{

//$sql="SELECT sum,id,name1,name2 FROM items WHERE cas LIKE '$caso' ORDER BY sum ASC";
    //$result = @mysql_query($sql,$db);
	//$k=@mysql_num_rows($result);

$mas=array();
$nam=array();
$ids=array();


$mas[0]=1;
$mas[1]=1;
$mas[2]=4;
$mas[3]=4;
$mas[4]=8;
$mas[5]=11;

$k=6;


//for($i=0;$i<$k;$i++){
	//$mas[$i]=@mysql_result($result, $i,"sum");
	//$ids[$i]=@mysql_result($result, $i,"id");
	//$nam[$i]=@mysql_result($result, $i,"name1");
	//$nam[$i].=" | ".@mysql_result($result, $i,"name2");
//}

$line=array();



$a3=$k;

$s1=0;

/*

25   100
5 	   x

$a=1;
for ($i=1;$i<=36;$i++){
	$a*=$i;
}

echo "A=".$a."<br>";


$b=1;
for ($i=1;$i<=5;$i++){
	$b*=$i;
}
10+15+15+7+3

*/
//echo "B=".$b."<br>";

//echo (1/($a/$b));


for ($i=0;$i<$a3;$i++){
	$mas[$i]=1/$mas[$i];
	$s1+=$mas[$i];
}

echo "<h4>sumKf=".$s1."</h4>";

for ($i=0;$i<$a3;$i++){
	echo $i.") ".$nam[$i]." --- $ ".(1/$mas[$i])." - >".round(((($mas[$i])/$s1))*100,4)." %<br>";
}


$sql="SELECT * FROM main";
   $result = @mysql_query($sql,$db);
//$k=@mysql_num_rows($result);

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

echo "<strong>STAB_Rnd=".$t1." -> ".($t1/100000)." !</strong><br>";
$rnd=rand(0,$t1)/100000.00;

echo "RND=".$rnd."<br>LINE=";

$rez=-1;
$t1=0;
$line[-1]=-1;
for ($i=0;$i<$a3;$i++){
$t1+=((($mas[$i])/$s1))*100;
$line[$i]=$t1;
if ($rez==-1){
	if ($rnd>$line[$i-1] && $rnd<=$line[$i]){$rez=$i;echo "<strong>VIN</strong>";}
}
echo $line[$i]."| ";
}
echo "<br>rez=".$rez."|<br>";
echo "<br><h4>Выигрыш!</h4>".$nam[$rez]." $".(1/$mas[$rez])."<br><img src='images/items/".$ids[$rez].".png' width=256px>";


$vin+=(1/$mas[$rez]);
$los+=4.0;

$sql="UPDATE main SET vin='".$vin."', los='".$los."', gams='".$gams."'";
$result = @mysql_query("$sql",$db);

echo "<br>vin=".$vin."<br>los=".$los."<br><strong>PROFIT=".round(($los/$vin)*100,2)." %</strong><br>
$ ".($los-$vin)."
<br> GAMES=".$gams;

}

?>