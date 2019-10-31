<?
  
$kid=$rot[2];
  
  $sql="SELECT * FROM cas WHERE id LIKE '$kid'";
        $result = @mysql_query($sql,$db);
        $k=@mysql_num_rows($result);

if ($k>0){
	$i=0;
	$id=@mysql_result($result, $i,"id");
	$name=@mysql_result($result, $i,"name");
	$zen=@mysql_result($result, $i,"zen");
	$css=@mysql_result($result, $i,"css");

echo '<center>
      <div class="inventory-block">
        <div class="user-nfo">
		<h2>'.trans($name).'</h2>
	  
        </div>';
		
//echo '<div style="width:600px;text-align:center;">
echo '<img src="images/cases/'.$id.'.png" style="margin-left:-45px;"><br>

<br>
		<a href="opencase.php?id='.$id.'" class="mybutton" style="font-size:14pt;">'.trans("открыть за").' $ '.$zen.'</a>

';


        echo '<h2>'.trans("СОДЕРЖИМОЕ КЕЙСА").'</h2>
        <div class="inventory">';
        
  $sql="SELECT * FROM items WHERE cas LIKE '".$kid."'";

include "item_list.php";
  


        echo '</div>
      </div></center>
';
}//else{}

?>