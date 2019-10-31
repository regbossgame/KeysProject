<?

 require ('steamauth/steamauth.php');
 
 if(isset($_SESSION['steamid'])) {

  include ('steamauth/userInfo.php');
  
  include "bd.php";
  
  $sql="SELECT id FROM users WHERE id LIKE '".$steamprofile['steamid']."'";
        $result2 = @mysql_query($sql,$db);
        $k=@mysql_num_rows($result2);
if ($k<=0){
	$sql = "INSERT INTO users (id,log,sum,open,vin,los,prof,treg ) VALUES ( '".$steamprofile['steamid']."','".$steamprofile['personaname']."','0','0','0','0','".time()."')";
	$result = @mysql_query("$sql",$db);
}
    
}  

HEADER("LOCATION: /index.php");

?>