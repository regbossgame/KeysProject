<?
$databasename = "boewic_keys";
$databaseuser = "boewic_keys";
$databasepasswd = "next2008next2008";

$sqllocal = "localhost";

   $db = @mysql_connect("$sqllocal", "$databaseuser", "$databasepasswd") or die("Ошибка соединения с БД ;(");;
   @mysql_select_db("$databasename",$db);

$rr=@mysql_set_charset("utf8",$db);
 //@mysql_query('SET NAMES ',$db);

 //$sql = "CHARACTER SET cp1251 COLLATE cp2151_general_ci;";
$result = @mysql_query("$sql",$db);

$mip = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : ((!empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : getenv('REMOTE_ADDR')); 

//86400
?>