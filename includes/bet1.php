<?php
session_start();
if(isset($_GET['a']) && $_GET['a'] == "reset") {
	$_SESSION['bet'] = .25;
	if($_SESSION['credits'] >= $_SESSION['bet']) {
		echo "<input type='button' value='Bet One' onclick=\"javascript:bet1('bet1')\" style='padding:6px' /><br>";
	}
}
if(isset($_GET['a']) && $_GET['a'] == "bet1") {
	if($_SESSION['credits'] >= $_SESSION['bet']) {
		if($_SESSION['bet'] < 1.00) {
			echo "<input type='button' value='Bet One' onclick=\"javascript:bet1('bet1')\" style='padding:6px' /><br>";
		}
	}
	$_SESSION['bet'] = $_SESSION['bet']+.25;
}


if(isset($_GET['a']) && $_GET['a'] == "hide") {

}

if(isset($_GET['a']) && $_GET['a'] == "draw") {
		echo "<input type='button' value='Bet One' onclick=\"javascript:bet1('reset')\" style='padding:6px' /><br>";
}

	echo "Current Bet: ".$_SESSION['bet'];
?>