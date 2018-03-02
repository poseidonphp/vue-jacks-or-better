<?php
session_start();
if(isset($_GET['a']) && $_GET['a'] == "deal") {
	if($_SESSION['credits'] >= $_SESSION['bet']) {
		echo "<input type='button' value='DEAL' onclick=\"javascript:deal();\" style='padding:6px;' />";
	}
}
if(isset($_GET['a']) && $_GET['a'] == "draw") {
echo "<input type='button' value='DRAW' style='padding:6px' onclick=\"javascript:drawCards('a');\" />";
}
?>