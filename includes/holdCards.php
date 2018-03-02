<?php
session_start();
$cardNum = $_GET['a'];

if ($_SESSION['newCards'][$cardNum] == $_SESSION['cards'][$cardNum]) {
	$_SESSION['newCards'][$cardNum] = "";
}
else {
$_SESSION['newCards'][$cardNum] = $_SESSION['cards'][$cardNum];
}

// echo $_SESSION['newCards'][$cardNum];
/*
echo $_SESSION['newCards'][0];
echo $_SESSION['newCards'][1];
echo $_SESSION['newCards'][2];
echo $_SESSION['newCards'][3];
echo $_SESSION['newCards'][4];
*/
?>