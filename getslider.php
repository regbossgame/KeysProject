<?
include "bd.php";

echo ' <div class="top" id="slider">';

$sql="SELECT * FROM slider ORDER BY treg DESC";
    $result = @mysql_query($sql,$db);
	$k=@mysql_num_rows($result);

		
	for ($i=0;$i<$k;$i++){
	$nik=@mysql_result($result, $i,"nik");
	$id=@mysql_result($result, $i,"item");
	$user=@mysql_result($result, $i,"user");
	$nam1=@mysql_result($result, $i,"name1");
	$nam2=@mysql_result($result, $i,"name2");
	$grade=@mysql_result($result, $i,"grade");
	$cas=@mysql_result($result, $i,"cas");

     
	 echo '<div class="top__item">
            <a href="'.$lan.'-case-'.$cas.'">
		<p class="nik">'.$nik.'</p><img src="images/items/'.$id.'.png" width="50" height="37" alt="">
        <p>'.$nam1.'</p>
        <p style="font-size:8pt;">'.$nam2.'
        </p></a>
		<div style="background:url(images/grades/'.$grade.'.png);height:5px;"></div>
      </div>
	  ';
	}


?>