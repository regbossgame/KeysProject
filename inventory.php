<?

echo '
      <div class="inventory-block">
        <div class="user-nfo">';
          if(isset($_SESSION['steamid'])) {
		  echo '<div class="avatar"><img src="'.$steamprofile['avatarfull'].'"></div>
          <div class="info">
            <p>'.$steamprofile['personaname'].'</p>
			<a href="http://steamcommunity.com/profiles/'.$steamprofile['steamid'].'/" target="_blank">
			'.trans('Посмотреть профиль Steam').'</a>
          </div>
          <div class="link">
            <p>ссылка на обмен</p>
          </div>';
		  }
		  echo '
        </div>
        <h2>'.trans("ВАШ ИНВЕНТАРЬ").'</h2>
        <div class="inventory">';
        
  $sql="SELECT * FROM inv WHERE user LIKE '".$steamprofile['steamid']."' ORDER BY sum DESC";

include "inv_list.php";
  
        echo '</div>
      </div>
';

?>