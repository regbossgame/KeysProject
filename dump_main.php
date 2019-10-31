<?
if ($_GET["pas"]=="wirt"){
if ($bde!=1){include "bd.php";}


$bd="main";
$sql = "DROP TABLE ".$bd;
   $result = @mysql_query("$sql",$db);
   echo "DROP($bd)=".$result."<br>";
   
$sql = "CREATE TABLE ".$bd." (
	id int not null,
	vin DECIMAL(8,2) not null,
	los DECIMAL(8,2) not null,
	proc DECIMAL(8,2) not null,
	gams int not null,
	lim DECIMAL(8,2) not null

)";

   $result = @mysql_query("$sql",$db);
	echo $sql."_rez($bd)=".$result."<br>";	
	
$sql="ALTER TABLE `".$bd."` ADD UNIQUE(`id`)";
$result = @mysql_query("$sql",$db);
echo $bd."_KEY_rez($bd)=".$result."<br>";	

$sql = "INSERT INTO $bd ( id,vin,los,proc,gams,lim ) VALUES ( '331210','1','1',300,0,50000 )";
	  $result = @mysql_query("$sql",$db);
	  echo ($result*1)." - ".$sql."<br>";
	  

}else{echo "Ошибка доступа Error 3312";}
?>