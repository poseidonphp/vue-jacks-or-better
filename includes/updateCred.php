<?php
session_start();
if(isset($_GET['a']) && $_GET['a'] == "draw") {
	$_SESSION['credits'] = $_SESSION['credits'] + $_SESSION['newCredits'];	
}
setlocale(LC_MONETARY, 'en_US');

echo "Credits: $".number_format($_SESSION['credits'], 2, '.', ',');

?>