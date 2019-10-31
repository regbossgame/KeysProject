<?
if ($_GET["pas"]=="wirt"){
if ($bde!=1){include "bd.php";}


$bd="users";
$sql = "DROP TABLE ".$bd;
   $result = @mysql_query("$sql",$db);
   echo "DROP($bd)=".$result."<br>";
   
$sql = "CREATE TABLE ".$bd." (
	id varchar(20) not null,
	log varchar(40) not null,
	sum DECIMAL(8,2) not null,
	vin DECIMAL(8,2) not null,
	los DECIMAL(8,2) not null,
	prof DECIMAL(8,2) not null,
	open int not null,
	treg varchar(12) not null
)";

   $result = @mysql_query("$sql",$db);
	echo $sql."_rez($bd)=".$result."<br>";	

	
$sql="ALTER TABLE `".$bd."` ADD UNIQUE(`id`)";
$result = @mysql_query("$sql",$db);
echo $bd."_KEY_rez($bd)=".$result."<br>";	

$type=$bd;
include "reader.php";


}else{echo "Ошибка доступа Error 3312";}
?>