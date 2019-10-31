<?
$ef7=true;
while ($ef7){
$nid=Rand(103312,999999);
$ef7=false;
		$sql29="SELECT id FROM $type WHERE id LIKE '$nid'";
		$result29 = @mysql_query($sql29,$db);
        $k29=@mysql_num_rows($result29);
		if ($k29>0){$ef7=true;}
		
}
?>