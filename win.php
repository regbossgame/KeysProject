<?
$win=$_SESSION["wina"];
if ($win>0){$_SESSION["wina"]="-".$win;}

$kid=$rot[2];
if ($win>0){
//	if (1==1){
		echo '<img src="images/st1.png" width=50px style="position:absolute;margin-left:350px;margin-top:6px;">';
echo '<div id="rul" class="rul">

 ';
 


$a1=29;
while ($a1>0){
$sql="SELECT id FROM items WHERE cas LIKE '$kid' ORDER BY RAND() LIMIT ".$a1;
    $result = @mysql_query($sql,$db);
	$k=@mysql_num_rows($result);

//echo $sql;

	$gr="";
	for($i=0;$i<$k;$i++){
	$id=@mysql_result($result, $i,"id");
	//$grade=@mysql_result($result, $i,"grade");	
	//if ($id==$win){$gr=$grade;}
	echo "<div style='display:inline;height:170px;width:150px;'>
	<img src='images/items/".$id.".png' width=150px>
			
	</div>";
	$a1--;
	if ($a1==0){break;}
	}
}
	

	
	echo "<div style='display:inline;'><img onload='setTimeout(\"ruls(0,0);\",100);' src='images/items/".$win.".png' width=150px></div>";
	
	for($i=0;$i<$k;$i++){
	$id=@mysql_result($result, $i,"id");	
	echo "<div style='display:inline;'><img src='images/items/".$id.".png' width=150px></div>";
	}
	
	


echo '</div>
';

echo '<audio preload autoplay>
    <source src="sounds/start.wav" type="audio/wav">
 </audio>
	';


echo '<audio id="mysound" preload>
    <source src="sounds/slide.wav" type="audio/wav">
 </audio>
	';
}else{

$sql="SELECT zen FROM cas WHERE id LIKE '$kid'";
    $result = @mysql_query($sql,$db);
//	$k=@mysql_num_rows($result);
	$zen=@mysql_result($result, $i,"zen");	

$sql="SELECT id,grade,name1,name2,sum,item FROM inv WHERE item LIKE '".(-1*$win)."' AND user LIKE '".$_SESSION['steamid']."'";
    $result = @mysql_query($sql,$db);
	//$k=@mysql_num_rows($result);
	$id=@mysql_result($result, $i,"id");
	$item=@mysql_result($result, $i,"item");
	$grade=@mysql_result($result, $i,"grade");
	$name1=@mysql_result($result, $i,"name1");
	$name2=@mysql_result($result, $i,"name2");
	$sum=@mysql_result($result, $i,"sum");

	if ($_SESSION["enslider"]==0){
	if ($sum>0.5){
	$type="slider";
	include "gen_id.php";
	
	$sql2 = "INSERT INTO slider ( id,item,nik,user,name1,name2,grade,cas,treg ) VALUES ('$nid','$item','".$steamprofile['personaname']."','".$_SESSION['steamid']."','$name1','$name2','$grade','".$kid."','".time()."' )";
	$result2 = @mysql_query("$sql2",$db);	
	//echo ($result2*1)."|";

	$sql2="SELECT treg FROM slider ORDER BY treg DESC LIMIT 20";
    $result2 = @mysql_query($sql2,$db);
	$k2=@mysql_num_rows($result2);
	
	$treg2=@mysql_result($result2, ($k2-1),"treg");
	//echo $treg2."|".$k2;
	
	$sql2 = "DELETE FROM slider WHERE (treg<".$treg2.")";
	$result2 = @mysql_query("$sql2",$db);
	
	}
	}
	
	
	
	$_SESSION['enslider']=1;
	
echo '<div class="myblock"><h1>'.trans('ВАШ ВЫИГРЫШ').'!</h1>
<h2 style="font-size:24px;">'.$name1.'</h2>
<img src="images/items/'.(-1*$win).'.png" width=350px>
<br>
<h2 style="font-size:20px;">'.$name2.'</h2>
<img src="images/grades/'.$grade.'.png" width=350px height=5px>
<br>
<a href="opencase.php?id='.$kid.'" style="width:150px;">
<button class="mybutton" style="width:150px;">
'.trans('Ещё раз за').' $ '.$zen.'<br>
</button>
</a>


<a href="sell.php?id='.$id.'&ref='.$lan."-case-".$kid.'" style="width:150px;">
<button class="mybutton" style="width:150px;">'.trans("продать").' $ '.$sum.'</button></a>
<a style="width:150px;">
<button class="mybutton" style="width:150px;">'.trans("забрать").'</button></a>
<a href="sell.php?id='.$id.'&ref=opencase.php?id='.$kid.'" style="width:150px;">
<button class="mybutton" style="width:150px;">'.trans("продать и открыть").'</button></a>
</div>';

echo '<audio preload autoplay>
    <source src="sounds/win.wav" type="audio/wav">
 </audio>
	';
	
	}
?>