<?
        $result = @mysql_query($sql,$db);
        $k=@mysql_num_rows($result);

for($i=0;$i<$k;$i++){
	$id=@mysql_result($result, $i,"id");
	$item=@mysql_result($result, $i,"item");
	$name1=@mysql_result($result, $i,"name1");
	$name2=@mysql_result($result, $i,"name2");
	$grade=@mysql_result($result, $i,"grade");
	$sum=@mysql_result($result, $i,"sum");
		
		
echo '
		<div class="inventory-item">
            <div class="item-plane">
              <p>'.trans($name1).'</p>
              <div class="img-block"><img src="images/items/'.$item.'.png"></div>
              <p>'.trans($name2).'  </p>
			  <div style="background:url(images/grades/'.$grade.'.png);height:5px;"></div>
            </div>
            <div class="button-block"><a href="sell.php?id='.$id.'">'.trans("продать").' $ '.$sum.'</a><a>'.trans("забрать").'</a></div>
          </div>
		  ';//<div class="button-block"><a></a><a>'.trans("забрать").'</a></div>
}	

?>