<?
echo '<div class="inventory-block">
        <h2>'.trans("СПИСОК КЕЙСОВ").'</h2>
        <div class="inventory">';
        
  $sql="SELECT * FROM cas ORDER BY zen ASC";
        $result = @mysql_query($sql,$db);
        $k=@mysql_num_rows($result);

for($i=0;$i<$k;$i++){
	$id=@mysql_result($result, $i,"id");
	$name=@mysql_result($result, $i,"name");
	$zen=@mysql_result($result, $i,"zen");
	
		
echo '
		<div class="inventory-item">
            <div class="item-plane">
              <p>'.trans($name).'</p>
              <div class="img-block"><img src="images/cases/'.$id.'.png"></div>
              
            </div>
            <div class="button-block" style="width:344px;margin:0px;"><a href="'.$lan.'-case-'.$id.'">'.trans("открыть за").' $ '.$zen.'</a></div>
          </div>
		  ';//<div class="button-block"><a></a><a>'.trans("забрать").'</a></div>
}		  
        echo '</div>
      </div>
';


?>