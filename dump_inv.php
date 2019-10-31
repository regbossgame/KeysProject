<?
if ($_GET["pas"]=="wirt"){
if ($bde!=1){include "bd.php";}


$bd="inv";
$sql = "DROP TABLE ".$bd;
   $result = @mysql_query("$sql",$db);
   echo "DROP($bd)=".$result."<br>";
   
$sql = "CREATE TABLE ".$bd." (
	id int not null,
	item int not null,
	user varchar(20) not null,
	name1 varchar(50) not null,
	name2 varchar(50) not null,
	grade varchar(6) not null,
	sum DECIMAL(8,2) not null
	
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