<?

include "conf.php";

include "init.php";
//print_r($_SESSION);


echo '
<body>
    <div class="wrapper"></div>
';

include "left.php";

include "slider.php";
	  

echo '    <div class="content">
	';

	
include $str.".php";	
	
echo '    </div>
	';
	  
	include "footer.php";
  
?>