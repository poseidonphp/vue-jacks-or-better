<?php
session_start();
$bet = .25;
$_SESSION['bet'] = $bet;
$_SESSION['credits'] = 20.00;
// SET THE PAYOUT VALUES FOR A SINGLE BET
$payouts = array();
	$payouts['pair'] = 1;
	$payouts['twopair'] = 1;
	$payouts['threekind'] = 3;
	$payouts['straight'] = 4;
	$payouts['flush'] = 6;
	$payouts['fullhouse'] = 9;
	$payouts['four5ks'] = 50;
	$payouts['four234'] = 80;
	$payouts['four234a'] = 160;
	$payouts['foura'] = 160;
	$payouts['foura234'] = 400;
	$payouts['straightflush'] = 50;
	$payouts['royalflush'] = 250;

$_SESSION['payouts'] = $payouts;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <!-- Just an example of test output to demonstrate capability. -->
 <head>
 <script type="text/javascript" src="includes/jquery.js"></script>
 <script type="text/javascript" src="includes/jquerycorner.js"></script>

<script language="javascript"> 
function togglejs(examNum) {
	var ele = document.getElementById(examNum);
	// var text = document.getElementById("displayText");
	if(ele.style.display == "block") {
    		ele.style.display = "none";
	//	text.innerHTML = "show";
  	}
	else {
		ele.style.display = "block";
	//	text.innerHTML = "hide";
	}
} 


</script>
<style type="text/css">
.semiClear {
	opacity:.75;
	filter: alpha(opacity=75);
	-moz-opacity: 0.75;	
}
</style>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Double Double Bonus Jacks or Better</title>
 </head>

 <body bgcolor="#CCCCCC">
 <center>
 <div align="center" id="outer" style="background-color:#960; width:650px">
 	<div align="center" id="inner" style="background-color:#FF9">



 

<div align="center" id="cards">
<table align="center" width="500" cellspacing="0" cellpadding="0" border="0">
	<tr>
    <td colspan="6"><center><img src="images/top_jacksorbetter.png"></center></td>
    </tr>
    
  <tr bgcolor="#960" align="center">
    	<td width="250"><strong>Hand</strong></td>
        <td><strong>.25</strong></td>
        <td><strong>.50</strong></td>
        <td><strong>.75</strong></td>
        <td><strong>1.00</strong></td>
        <td><strong>1.25</strong></td>
  </tr>
	<tr >
    	<td>Royal Flush</td>
        <td id="center"><?php echo $payouts['royalflush']; ?></td>
        <td id="center"><?php echo $payouts['royalflush']*2; ?></td>
        <td id="center"><?php echo $payouts['royalflush']*3; ?></td>
        <td id="center"><?php echo $payouts['royalflush']*4; ?></td>
        <td id="center"><?php echo $payouts['royalflush']*5; ?></td>
    </tr>
    <tr >
    	<td>Straight Flush</td>
        <td id="center"><?php echo $payouts['straightflush']; ?></td>
        <td id="center"><?php echo $payouts['straightflush']*2; ?></td>
        <td id="center"><?php echo $payouts['straightflush']*3; ?></td>
        <td id="center"><?php echo $payouts['straightflush']*4; ?></td>
        <td id="center"><?php echo $payouts['straightflush']*5; ?></td>
    </tr>
    <tr >
      <td>Four Aces with 2,3,4</td>
      <td id="center"><?php echo $payouts['foura234']; ?></td>
        <td id="center"><?php echo $payouts['foura234']*2; ?></td>
        <td id="center"><?php echo $payouts['foura234']*3; ?></td>
        <td id="center"><?php echo $payouts['foura234']*4; ?></td>
      <td id="center"><?php echo $payouts['foura234']*5; ?></td>
    </tr>
    <tr >
      <td>Four Aces</td>
     <td id="center"><?php echo $payouts['foura']; ?></td>
        <td id="center"><?php echo $payouts['foura']*2; ?></td>
        <td id="center"><?php echo $payouts['foura']*3; ?></td>
        <td id="center"><?php echo $payouts['foura']*4; ?></td>
      <td id="center"><?php echo $payouts['foura']*5; ?></td>
    </tr>
    <tr >
      <td>Four 2s, 3s, or 4s with Ace, 2, 3, or 4</td>
       <td id="center"><?php echo $payouts['four234a']; ?></td>
        <td id="center"><?php echo $payouts['four234a']*2; ?></td>
        <td id="center"><?php echo $payouts['four234a']*3; ?></td>
        <td id="center"><?php echo $payouts['four234a']*4; ?></td>
      <td id="center"><?php echo $payouts['four234a']*5; ?></td>
    </tr>
    <tr  >
      <td>Four 2s, 3s, or 4s</td>
      <td id="center"><?php echo $payouts['four234']; ?></td>
        <td id="center"><?php echo $payouts['four234']*2; ?></td>
        <td id="center"><?php echo $payouts['four234']*3; ?></td>
        <td id="center"><?php echo $payouts['four234']*4; ?></td>
      <td id="center"><?php echo $payouts['four234']*5; ?></td>
    </tr>
    <tr >
      <td>Four 5s through Kings</td>
       <td id="center"><?php echo $payouts['four5ks']; ?></td>
        <td id="center"><?php echo $payouts['four5ks']*2; ?></td>
        <td id="center"><?php echo $payouts['four5ks']*3; ?></td>
        <td id="center"><?php echo $payouts['four5ks']*4; ?></td>
      <td id="center"><?php echo $payouts['four5ks']*5; ?></td>
    </tr>
    <tr >
      <td>Full House</td>
       <td id="center"><?php echo $payouts['fullhouse']; ?></td>
        <td id="center"><?php echo $payouts['fullhouse']*2; ?></td>
        <td id="center"><?php echo $payouts['fullhouse']*3; ?></td>
        <td id="center"><?php echo $payouts['fullhouse']*4; ?></td>
      <td id="center"><?php echo $payouts['fullhouse']*5; ?></td>
    </tr>
    <tr >
      <td>Flush</td>
       <td id="center"><?php echo $payouts['flush']; ?></td>
        <td id="center"><?php echo $payouts['flush']*2; ?></td>
        <td id="center"><?php echo $payouts['flush']*3; ?></td>
        <td id="center"><?php echo $payouts['flush']*4; ?></td>
      <td id="center"><?php echo $payouts['flush']*5; ?></td>
    </tr>
    <tr >
      <td>Straight</td>
      <td id="center"><?php echo $payouts['straight']; ?></td>
        <td id="center"><?php echo $payouts['straight']*2; ?></td>
        <td id="center"><?php echo $payouts['straight']*3; ?></td>
        <td id="center"><?php echo $payouts['straight']*4; ?></td>
      <td id="center"><?php echo $payouts['straight']*5; ?></td>
    </tr>
    <tr >
      <td>Three of a Kind</td>
      <td id="center"><?php echo $payouts['threekind']; ?></td>
        <td id="center"><?php echo $payouts['threekind']*2; ?></td>
        <td id="center"><?php echo $payouts['threekind']*3; ?></td>
        <td id="center"><?php echo $payouts['threekind']*4; ?></td>
      <td id="center"><?php echo $payouts['threekind']*5; ?></td>
    </tr>
    <tr >
      <td>Two Pairs</td>
       <td id="center"><?php echo $payouts['twopair']; ?></td>
        <td id="center"><?php echo $payouts['twopair']*2; ?></td>
        <td id="center"><?php echo $payouts['twopair']*3; ?></td>
        <td id="center"><?php echo $payouts['twopair']*4; ?></td>
      <td id="center"><?php echo $payouts['twopair']*5; ?></td>
    </tr>
    <tr >
      <td>Pair of Jacks or better</td>
      <td id="center"><?php echo $payouts['pair']; ?></td>
        <td id="center"><?php echo $payouts['pair']*2; ?></td>
        <td id="center"><?php echo $payouts['pair']*3; ?></td>
        <td id="center"><?php echo $payouts['pair']*4; ?></td>
      <td id="center"><?php echo $payouts['pair']*5; ?></td>
    </tr>
</table>

<table align="center" width="500" border="0" cellpadding="0" cellspacing="0">
	<tr height="140" valign="bottom">
    	<td align="center"><img src="images/b2fv.png" /></td>
        <td align="center"><img src="images/b2fv.png" /></td>
        <td align="center"><img src="images/b2fv.png" /></td>
        <td align="center"><img src="images/b2fv.png" /></td>
        <td align="center"><img src="images/b2fv.png" /></td>
	</tr>
</table>

</div>
<div id="dealButton">
<input type="button" value="DEAL" onclick="javascript:deal();" style="padding:6px;" />
</div>

<div id="hold">
</div>
<center>
<table width="500" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center">
            <div id="bet">
			<input type="button" value="Bet One" onclick="javascript:bet1('bet1')" style="padding:6px" /><br />
 			Current Bet: .25
            </div>
        </td>
    
        <td align="center" >
            <div id="credits">
   			Credits: <?php	
   			echo "$".number_format($_SESSION['credits'], 2, '.', ','); ?>
    		</div>
        </td>
    </tr>
</table>
</center>
<div id="draw">
</div>
<br />
<br />

 </div>
 </div>
 </center>
 <script>
 $('#inner').corner("bite 15px").parent().css('padding', '8px').corner("round 15px")


function holdCards(a) {
		$("#hold").load("includes/holdCards.php?a="+a+"");
}

function drawCards(a) {
		$("#cards").load("includes/showDraw.php?a="+a+"");
		$("#credits").load("includes/updateCred.php?a=draw");
		$("#bet").load("includes/bet1.php?a=draw");
		$("#dealButton").load("includes/showDeal.php?a=deal");
}

function deal() {
		$("#cards").load("includes/deal.php");
		$("#credits").load("includes/updateCred.php");
		$("#bet").load("includes/bet1.php?a=hide");
		$("#dealButton").load("includes/showDeal.php?a=draw");
}
function bet1(a) {
		$("#bet").load("includes/bet1.php?a="+a+"");
		$("#dealButton").load("includes/showDeal.php?a=deal");
}
</script>
 </body>
</html>