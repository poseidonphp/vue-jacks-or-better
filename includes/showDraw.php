
<?php
session_start();
$deck = $_SESSION['deck'];

// DEBUGGING
	/*
	echo "<pre>";
	print_r($_SESSION['newCards']);
	echo "</pre>";
	*/
$newDrawCards = 0;
	if($_SESSION['newCards'][0] == "") {$newDrawCards = $newDrawCards + 1;}
	if($_SESSION['newCards'][1] == "") {$newDrawCards = $newDrawCards + 1;}
	if($_SESSION['newCards'][2] == "") {$newDrawCards = $newDrawCards + 1;}
	if($_SESSION['newCards'][3] == "") {$newDrawCards = $newDrawCards + 1;}
	if($_SESSION['newCards'][4] == "") {$newDrawCards = $newDrawCards + 1;}

// DEBUGGING
	//echo "New Draw Cards: ".$newDrawCards."<br>";
if ($newDrawCards >= 1) {
	$drawCards = array_rand($deck, $newDrawCards);
	
	if ($newDrawCards == 1) {
		$newCardV = $deck[$drawCards];
		$newCards[] = $newCardV;
		$cardV = explode(":",$newCardV);
		$showCard[] = "<img src='images/".$cardV[0].$cardV[1].".png'>"; 	
	} 
	else {
		$newCards = array();
		foreach($drawCards as $dc) {
			$newCardV = $deck[$dc];
			$newCards[] = $newCardV;
			$cardV = explode(":",$newCardV);
			//DISPLAY THE CARDS
				$showCard[] = "<img src='images/".$cardV[0].$cardV[1].".png'>"; 	
		}
	}
}

// DEBUGGING 
	/*
	echo "<pre>";
	print_r($drawCards);
	echo "</pre>";
	*/
	


$cardPic = array();

if($_SESSION['newCards'][0] == "") {$_SESSION['newCards'][0] = current($newCards); next($newCards);
	$_SESSION['cards'][0] = $_SESSION['newCards'][0];}
	
if($_SESSION['newCards'][1] == "") {$_SESSION['newCards'][1] = current($newCards); next($newCards);
	$_SESSION['cards'][1] = $_SESSION['newCards'][1];}
	
if($_SESSION['newCards'][2] == "") {$_SESSION['newCards'][2] = current($newCards); next($newCards);
	$_SESSION['cards'][2] = $_SESSION['newCards'][2];}
	
if($_SESSION['newCards'][3] == "") {$_SESSION['newCards'][3] = current($newCards); next($newCards);
	$_SESSION['cards'][3] = $_SESSION['newCards'][3];}
	
if($_SESSION['newCards'][4] == "") {$_SESSION['newCards'][4] = current($newCards); next($newCards);
	$_SESSION['cards'][4] = $_SESSION['newCards'][4];}
	

foreach($_SESSION['cards'] as $showCards) {
	$cardV = explode(":",$showCards);
	$showNCard[] = "<img src='images/".$cardV[0].$cardV[1].".png'>"; 
}
include 'checkHand.php';

// print_r($showNCard);
?>
<div id="finalCards" style="position:relative;">
<div id="finalHand" style="position:absolute;">
	<table align="center" width="650" border="0" cellpadding="0" cellspacing="0">
		<tr height="80"><td colspan="3">&nbsp;</td></tr>
        <tr height="40" valign="middle">
        	<td width="30">&nbsp;</td>
            <td valign="middle" align="center" bgcolor="#FFCC00" class="semiClear">&nbsp;</td>
            <td width="30">&nbsp;</td>
        </tr>
    </table>
</div>
<div id="finalHandText" style="position:absolute;">
	<table align="center" width="650" border="0" cellpadding="0" cellspacing="0">
		<tr height="80"><td colspan="3">&nbsp;</td></tr>
        <tr height="40" valign="middle">
        	<td width="30">&nbsp;</td>
            <td align="center"><font style="font-size:28px; color:#000"><strong>
            	<?php echo $message; ?>
            </strong></font></td>
            <td width="30">&nbsp;</td>
        </tr>
    </table>
</div>
    <table align="center" width="500" border="0" cellpadding="0" cellspacing="0">
        <tr height="140" valign="bottom">
            <td align="center"><div id="card1"><?php echo $showNCard[0]; ?></div></td>
            <td align="center"><div id="card2"><?php echo $showNCard[1]; ?></div></td>
            <td align="center"><div id="card3"><?php echo $showNCard[2]; ?></div></td>
            <td align="center"><div id="card4"><?php echo $showNCard[3]; ?></div></td>
            <td align="center"><div id="card5"><?php echo $showNCard[4]; ?></div></td>
        </tr>
    </table>
</div>


