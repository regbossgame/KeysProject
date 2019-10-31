<?

$t1="";
$t2="";
if ($str=="deposite" || $str=="balance"){
	$t1=" active";
}

if ($str=="inventory"){
	$t2=" active";
}


echo '<div class="sidebar">
';
/*
$urla=$_SERVER['REQUEST_URI'];
$nlan="ru";
if (strpos($urla,"lang=")==false){
	if (strpos($urla,"?")!=false){$urla.="&lang=".$nlan;}
	if (strpos($urla,"?")==false){$urla.="?lang=".$nlan;}
}else{
	if (strpos($urla,"&lang=".$lan)!=false){$urla=str_replace("&lang=".$lan,"&lang=".$nlan,$urla);}
	if (strpos($urla,"?lang=".$lan)!=false){$urla=str_replace("?lang=".$lan,"?lang=".$nlan,$urla);}
}
*/
$urla=$_SERVER['REQUEST_URI'];
$nlan="ru";
$t1="";
if ($nlan!=$lan){
$urla=str_replace("/".$lan,"/".$nlan,$urla);
}else{$t1=" style='border:1px solid #ABABAB';";}
echo '<a href="'.$urla.'"><img src="images/langs/RU.jpg"'.$t1.'></a>
';

$urla=$_SERVER['REQUEST_URI'];
$nlan="en";
$t1="";
if ($nlan!=$lan){
	$urla=str_replace("/".$lan,"/".$nlan,$urla);
}else{$t1=" style='border:1px solid #ABABAB';";}

echo '	  <a href="'.$urla.'"><img src="images/langs/EN.jpg"'.$t1.'></a>
	  <header> <a href="./">
          <h1>GOODCASES</h1></a></header>
      <div class="sidebar-blocks">
        <div class="sidebar-blocks__head">
          <p>'.trans('МЕНЮ').'</p>
        </div>';
		if(isset($_SESSION['steamid'])) {
		
		$sql2="SELECT sum FROM users WHERE id LIKE '".$steamprofile['steamid']."'";
        $result2 = @mysql_query($sql2,$db);
        //$k=@mysql_num_rows($result2);
		//echo $k."|".$steamprofile['steamid'];
		$sum=@mysql_result($result2, 0,"sum");
		
		echo '<a class="sidebar-blocks__item sidebar-blocks__item--user" href="/"><img src="'.$steamprofile['avatarfull'].'" style="width:45px;height:45px;"><span style="float:left;">$ '.$sum.'<br>'.$steamprofile['personaname'].'  </span></a>
		';}else{
		echo '<a class="sidebar-blocks__item sidebar-blocks__item--enter" href="steam.php?login"><span class="fa fa-steam"></span><span>'.trans('ВОЙТИ ЧЕРЕЗ').' <strong>STEAM</strong></span></a>';
		}
		if(isset($_SESSION['steamid'])) {
		echo '<a class="sidebar-blocks__item'.$t1.'" href="/'.$lan.'-balance"><span class="fa fa-dollar"></span><span>'.trans('Депозит').'</span></a>
		<a class="sidebar-blocks__item'.$t2.'" href="/'.$lan.'-inventory"><span class="fa fa-suitcase"></span><span>'.trans('Инвентарь').'</span></a><a class="sidebar-blocks__item" href="steam.php?logout">
		<span class="fa fa-steam"></span><span>'.trans('Выйти').'    </span></a>
      ';
		}
		/*
		if(isset($_SESSION['steamid'])) {
		
		
		echo '<a class="sidebar-blocks__item sidebar-blocks__item--user" href="/?cat=balance">'.$steamprofile['personaname'].'<img src="'.$steamprofile['avatarfull'].'"><span>$ 130  </span></a>';
		}else{	echo '<a class="sidebar-blocks__item sidebar-blocks__item--user" href="steam.php?login"><span>ВОЙТИ ЧЕРЕЗ <strong>STEAM</strong> </span></a>'; }
		
			echo '<a class="sidebar-blocks__item sidebar-blocks__item--enter"><span class="fa fa-steam"></span><span>';
		
			echo '<strong></strong>   </span></a>';
		
		echo '<a class="sidebar-blocks__item'.$t1.'" href="/?cat=balance"><span class="fa fa-dollar"></span><span>Депозит</span></a>
		<a class="sidebar-blocks__item'.$t2.'" href="/?cat=inventory"><span class="fa fa-suitcase"></span><span>Инвентарь</span></a>
		<a class="sidebar-blocks__item" href="steam.php?logout"><span class="fa fa-steam"></span><span>';
		
		echo 'Выйти    </span></a>';
		*/
		
      echo '</div>
      <div class="sidebar-blocks">
        <div class="sidebar-blocks__head">
          <p>'.trans('БОНУСЫ').'                </p>
        </div><a class="sidebar-blocks__item"><span class="fa fa-bullhorn"></span><span>'.trans('Акции').'</span></a><a class="sidebar-blocks__item"><span class="fa fa-share-alt"></span><span>'.trans('Реферальная система').'</span></a>
      </div>
      <div class="sidebar-blocks">
        <div class="sidebar-blocks__head">
          <p>'.trans('СТАТИСТИКА').'                </p>
        </div>
        <div class="sidebar-blocks__stat"><span>'.trans('открыто кейсов').':</span><span>'.($gams+1000).'</span></div>
        <div class="sidebar-blocks__stat"><span>'.trans('онлайн').':</span><span>313</span></div>
        <ul class="sidebar-blocks__social">
          <li><a class="fa fa-facebook"></a></li>
          <li><a class="fa fa-twitter"></a></li>
          <li><a class="fa fa-vk"></a></li>
          <li><a class="fa fa-steam"> </a></li>
        </ul>
		
        <div class="copyright" style="color:#FFFFFF;">
          <center>
		  <br>
		  <br>
		  <p>support@godcases</p>
          <p>GODCASES 2017.</p>
		  </center>
        </div>
      
      </div>
      
    </div>';

?>