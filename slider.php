<?

$sql2="SELECT * FROM slider ORDER BY treg DESC";
    $result2 = @mysql_query($sql2,$db);
	$k2=@mysql_num_rows($result2);

	echo ' <script>setTimeout("getslider();",1500);</script><div class="top" id="slider">';
	
	for ($i2=0;$i2<$k2;$i2++){
	$nik=@mysql_result($result2, $i2,"nik");
	$id=@mysql_result($result2, $i2,"item");
	$user=@mysql_result($result2, $i2,"user");
	$nam1=@mysql_result($result2, $i2,"name1");
	$nam2=@mysql_result($result2, $i2,"name2");
	$grade=@mysql_result($result2, $i2,"grade");
	$cas=@mysql_result($result2, $i2,"cas");

     
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
      
    echo '</div>';

?>