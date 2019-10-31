<?
//if ($type==""){$type="users";include "bd.php";}
$file_name="csv/".$type.".csv";

if (file_exists($file_name)){

$fp = fopen($file_name, "r");
//echo $file_name."<br>";
$mc=array();

$columns = fgets($fp, 999);
$columns = rtrim($columns);
$columns = ltrim($columns);
$columns = str_replace("﻿","",$columns);
$mc=explode(';',$columns);
$j=count($mc);
$rt="";
for($i=0;$i<$j;$i++){
//if (strpos($mc[$i],"id")){$mc[$i]="id";}
	if ($i<$j-1){$rt.=$mc[$i].",";}else{$rt.=$mc[$i];}
}
//echo "|".$mc[0]."|";
$columns =$rt;

$ma=array();

$kk=-1;
while (!feof($fp))
{
$kk++;

$mt = fgets($fp, 999);
$mt = rtrim($mt);
$mt = ltrim($mt);
if ($mt!=""){
$ma=explode(';',$mt);

// ﻿id
$rt="";
for($i=0;$i<$j;$i++){
	
	if ($mc[$i]=="id" && $ma[$i]==0){
		include "gen_id.php";
		$ma[$i]=$nid;
	}
	
	if ($i<$j-1){$rt.="'".$ma[$i]."',";}else{$rt.="'".$ma[$i]."'";}
}

      $sql = "INSERT INTO $bd ( $columns ) VALUES ( ".$rt." )";
	  $result = @mysql_query("$sql",$db);
	  echo ($result*1)." - ".$sql."<br>";

}//mt
}

 fclose($fp);
}else{echo "Файла нет, не гружу - ".$file_name;}
?>