<?
if ($_GET["pas"]=="wirt"){
if ($bde!=1){include "bd.php";}


$bd="slider";
$sql = "DROP TABLE ".$bd;
   $result = @mysql_query("$sql",$db);
   echo "DROP($bd)=".$result."<br>";
   
$sql = "CREATE TABLE ".$bd." (
	id int not null,
	item int not null,
	nik varchar(50) not null,
	user varchar(20) not null,
	name1 varchar(50) not null,
	name2 varchar(50) not null,
	grade varchar(6) not null,
	cas int not null,
	treg varchar(12) not null
	
)";

   $result = @mysql_query("$sql",$db);
	echo $sql."_rez($bd)=".$result."<br>";	
	
$sql="ALTER TABLE `".$bd."` ADD UNIQUE(`id`)";
$result = @mysql_query("$sql",$db);
echo $bd."_KEY_rez($bd)=".$result."<br>";	

$sql="SELECT name1,name2,grade,id FROM items WHERE cas LIKE '10' AND (sum>0.40) ORDER BY RAND() LIMIT 20";
    $result = @mysql_query($sql,$db);
	$k=@mysql_num_rows($result);

	for ($i=0;$i<$k;$i++){
	$nam1=@mysql_result($result, $i,"name1");
	$nam2=@mysql_result($result, $i,"name2");
	$id=@mysql_result($result, $i,"id");
	$grade=@mysql_result($result, $i,"grade");
	
	$type=$bd;
	include "gen_id.php";
	

	$sql2 = "INSERT INTO $bd ( id,item,nik,user,name1,name2,grade,cas,treg ) VALUES ('$nid','$id','Orochi','76561198051018611','$nam1','$nam2','$grade','10','".(time()-$i)."' )";
	  $result2 = @mysql_query("$sql2",$db);
	  echo ($result2*1)." - ".$sql2."<br>";
}




}else{echo "Ошибка доступа Error 3312";}
?>