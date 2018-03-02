<?php
		// Set number of each suit and value to 0
		$hcards = 0;
		$dcards = 0;
		$ccards = 0;
		$scards = 0;
		$cardsa = 0;
		$cards2 = 0;
		$cards3 = 0;
		$cards4 = 0;
		$cards5 = 0;
		$cards6 = 0;
		$cards7 = 0;
		$cards8 = 0;
		$cards9 = 0;
		$cards10 = 0;
		$cardsj = 0;
		$cardsq = 0;
		$cardsk = 0;
		
$payouts = $_SESSION['payouts'];
$bet = $_SESSION['bet'];
$PcardNums = array();
	
	foreach($_SESSION['cards'] AS $player) {
		$cardV = explode(":",$player);
		
		//Renumber cards for purpose of checking for straight
		$tempC = $cardV[1];
		if ($cardV[1] == "J") {$tempC = "11";}
		if ($cardV[1] == "Q") {$tempC = "12";}
		if ($cardV[1] == "K") {$tempC = "13";}
		if ($cardV[1] == "A") {$tempC = "14";}
		$PcardNums[] = $tempC;
		if ($cardV[1] == "A") {$PcardNums[] = "1";}
		
		// count number of each suit
		if ($cardV[0] == "h") {$hcards = $hcards + 1;}
		if ($cardV[0] == "d") {$dcards = $dcards + 1;}
		if ($cardV[0] == "c") {$ccards = $ccards + 1;}
		if ($cardV[0] == "s") {$scards = $scards + 1;}
		//count the number of each value
		if ($cardV[1] == "A") {$cardsa = $cardsa + 1;}
		if ($cardV[1] == "2") {$cards2 = $cards2 + 1;}
		if ($cardV[1] == "3") {$cards3 = $cards3 + 1;}
		if ($cardV[1] == "4") {$cards4 = $cards4 + 1;}
		if ($cardV[1] == "5") {$cards5 = $cards5 + 1;}
		if ($cardV[1] == "6") {$cards6 = $cards6 + 1;}
		if ($cardV[1] == "7") {$cards7 = $cards7 + 1;}
		if ($cardV[1] == "8") {$cards8 = $cards8 + 1;}
		if ($cardV[1] == "9") {$cards9 = $cards9 + 1;}
		if ($cardV[1] == "10") {$cards10 = $cards10 + 1;}
		if ($cardV[1] == "J") {$cardsj = $cardsj + 1;}
		if ($cardV[1] == "Q") {$cardsq = $cardsq + 1;}
		if ($cardV[1] == "K") {$cardsk = $cardsk + 1;}
		
	}
// echo "<br>Hearts: ".$hcards."<br>";
// echo "Diamonds: ".$dcards."<br>";
// echo "Clubs: ".$ccards."<br>";
// echo "Spades: ".$scards."<br>";

// echo "Aces: ".$cardsa."<br>";

//Define possible hands
$onepair = 0;
$twopair = 0;
$threekind = 0;
$straight = 0;
$royalstraight = 0;
$flush = 0;
$fullhouse = 0;
$fourkind = 0;
$fouracewith2 = 0;
$fourace = 0;
$four234witha = 0;
$four234 = 0;
$four5k = 0;
$straightflush = 0;
$royalflush = 0;
$message = "No Win";
$newCredits = 0;

//check for a pair
$pair1 = 0; // used for cards that can gain points for a single pair
$pair2 = 0; // used for cards that can only get points if theres 2 pairs
if ($cardsa == 2) {$pair1 = $pair1 + 1; $pair2 = $pair2 + 1;}
if ($cards2 == 2) {$pair2 = $pair2 + 1;}
if ($cards3 == 2) {$pair2 = $pair2 + 1;}
if ($cards4 == 2) {$pair2 = $pair2 + 1;}
if ($cards5 == 2) {$pair2 = $pair2 + 1;}
if ($cards6 == 2) {$pair2 = $pair2 + 1;}
if ($cards7 == 2) {$pair2 = $pair2 + 1;}
if ($cards8 == 2) {$pair2 = $pair2 + 1;}
if ($cards9 == 2) {$pair2 = $pair2 + 1;}
if ($cards10 == 2) {$pair2 = $pair2 + 1;}
if ($cardsj == 2) {$pair1 = $pair1 + 1; $pair2 = $pair2 + 1;}
if ($cardsq == 2) {$pair1 = $pair1 + 1; $pair2 = $pair2 + 1;}
if ($cardsk == 2) {$pair1 = $pair1 + 1; $pair2 = $pair2 + 1;}

if ($pair2 == 2) {
	//echo "Two Pair"; 
	$twopair = 1;
	$message = "You got two pair";
	$newCredits = $bet*$payouts['twopair'];}
elseif ($pair1 == 1) {
	//echo "One Pair"; 
	$onepair = 1;
	$message = "You got a pair";
	$newCredits = $bet*$payouts['pair'];}

//check for 3 of a kind
$pair3 = 0;
if ($cardsa == 3) {$pair3 = $pair3 + 1;}
if ($cards2 == 3) {$pair3 = $pair3 + 1;}
if ($cards3 == 3) {$pair3 = $pair3 + 1;}
if ($cards4 == 3) {$pair3 = $pair3 + 1;}
if ($cards5 == 3) {$pair3 = $pair3 + 1;}
if ($cards6 == 3) {$pair3 = $pair3 + 1;}
if ($cards7 == 3) {$pair3 = $pair3 + 1;}
if ($cards8 == 3) {$pair3 = $pair3 + 1;}
if ($cards9 == 3) {$pair3 = $pair3 + 1;}
if ($cards10 == 3) {$pair3 = $pair3 + 1;}
if ($cardsj == 3) {$pair3 = $pair3 + 1;}
if ($cardsq == 3) {$pair3 = $pair3 + 1;}
if ($cardsk == 3) {$pair3 = $pair3 + 1;}
if ($pair3 == 1) {
	//echo "Three of a kind"; 
	$threekind = 1;
	$message = "You got three of a kind";
	$newCredits = $bet*$payouts['threekind'];}

//check for Full House
if ($pair2 == 1 && $pair3 == 1) {
	//echo "Full House"; 
	$fullhouse = 1;
	$threekind = 0;
	$onepair = 0;
	$message = "You got a full house";
	$newCredits = $bet*$payouts['fullhouse'];}


//check for a flush
	if ($scards == 5 || $ccards == 5 || $dcards == 5 || $hcards == 5) {
	//echo "FLUSH";
	$flush = 1;
	$message = "You got a flush";
	$newCredits = $bet*$payouts['flush'];
	}

sort($PcardNums);

foreach ($PcardNums AS $newCard) {
	// echo $newCard." ";	
}

//check for 4 of a kind
	$pair4 = 0;
	if ($cardsa == 4) {$pair4 = $pair4 + 1;}
	if ($cards2 == 4) {$pair4 = $pair4 + 1;}
	if ($cards3 == 4) {$pair4 = $pair4 + 1;}
	if ($cards4 == 4) {$pair4 = $pair4 + 1;}
	if ($cards5 == 4) {$pair4 = $pair4 + 1;}
	if ($cards6 == 4) {$pair4 = $pair4 + 1;}
	if ($cards7 == 4) {$pair4 = $pair4 + 1;}
	if ($cards8 == 4) {$pair4 = $pair4 + 1;}
	if ($cards9 == 4) {$pair4 = $pair4 + 1;}
	if ($cards10 == 4) {$pair4 = $pair4 + 1;}
	if ($cardsj == 4) {$pair4 = $pair4 + 1;}
	if ($cardsq == 4) {$pair4 = $pair4 + 1;}
	if ($cardsk == 4) {$pair4 = $pair4 + 1;}
	
	if ($pair4 == 1) {
		//echo "Four of a kind"; 
		$fourkind = 1;
		$newCredits = $bet*$payouts['four5ks'];
		// check if player has 4 aces
		if ($cardsa == 4) {
			// check if kicker is 2,3,4
			if ($PcardNums[4] == 2 || $PcardNums[4] == 3 || $PcardNums[4] == 4) {
				$fouracewith2 = 1; $fourkind = 0;
				$newCredits = $bet*$payouts['foura234'];
			} else {$fourace = 1; $fourkind = 0; $newCredits = $bet*$payouts['foura'];}
		}
		// check if player has 4 twos
		if ($cards2 == 4) {
			//check if kicker is ace, 3, 4
			if ($PcardNums[0] == 1 || $PcardNums[4] == 3 || $PcardNums[4] == 4) {
				$four234witha = 1; $fourkind = 0;
				$newCredits = $bet*$payouts['four234a'];
			} else {$four234 = 1; $fourkind = 0; $newCredits = $bet*$payouts['four234'];} 
		}
		//check if player has 4 threes
		if ($cards3 == 4) {
			// check if kicker is ace, 2, 4
			if ($PcardNums[0] == 1 || $PcardNums[0] == 2 || $PcardNums[4] == 4) {
				$four234witha = 1; $fourkind = 0;
				$newCredits = $bet*$payouts['four234a'];
			} else {$four234 = 1; $fourkind = 0; $newCredits = $bet*$payouts['four234'];} 
		}
		//check if player has 4 fours
		if ($cards4 == 4) {
			// check if kicker is ace, 2, 3
			if ($PcardNums[0] == 1 || $PcardNums[0] == 2 || $PcardNums[0] == 3) {
				$four234witha = 1; $fourkind = 0;
				$newCredits = $bet*$payouts['four234a'];
			} else {$four234 = 1; $fourkind = 0; $newCredits = $bet*$payouts['four234'];} 
		}
		$message = "You got four of a kind";
	}


//CHECK FOR A STRAIGHT
	if ($PcardNums[0] <> "1") {
		// echo "Checking for straight with NO Ace";
		if ($PcardNums[1] == $PcardNums[0] + 1) {
			if ($PcardNums[2] == $PcardNums[1] + 1) {
				if ($PcardNums[3] == $PcardNums[2] + 1) {
					if ($PcardNums[4] == $PcardNums[3] + 1) {
						//echo "Straight";
						$straight = 1;
						$message = "You got a straight";
						$newCredits = $bet*$payouts['straight'];
					}
				}
			}
		}
	} 
	else {
		// echo "Checking for straight WITH an Ace";
		// Check for a straight TO the Ace
		if ($PcardNums[2] == $PcardNums[1] + 1) {
			if ($PcardNums[3] == $PcardNums[2] + 1) {
				if ($PcardNums[4] == $PcardNums[3] + 1) {
					if ($PcardNums[5] == $PcardNums[4] + 1) {
						//echo "Straight";
						$straight = 1;
						$royalstraight = 1;
						$message = "You got a straight";
						$newCredits = $bet*$payouts['straight'];
					}
				}
			}
		}	
		// Check for a straight Starting with Ace
		if ($PcardNums[1] == $PcardNums[0] + 1) {
			if ($PcardNums[2] == $PcardNums[1] + 1) {
				if ($PcardNums[3] == $PcardNums[2] + 1) {
					if ($PcardNums[4] == $PcardNums[3] + 1) {
						//echo "Straight";
						$straight = 1;
						$message = "You got a straight";
						$newCredits = $bet*$payouts['straight'];
					}
				}
			}
		}
	}

// CHECK FOR STRAIGHT FLUSH
	if ($straight == 1 && $flush == 1) {
		$straightflush = 1;
		$straight = 0;
		$flush = 0;
		$message = "You got a straight flush";
		$newCredits = $bet*$payouts['straightflush'];
		//echo "Straight Flush";
	}

// CHECK FOR ROYAL FLUSH
	if ($royalstraight == 1 && $flush == 1) {
		$royalflush = 1;
		$flush = 0;
		$straight = 0;
		$message = "You got a royal flush";
		$newCredits = $bet*$payouts['royalflush'];
		//echo "ROYAL FLUSH";
	}

$_SESSION['newCredits'] = $newCredits;

?>
<style type="text/css">
<!--
#center {
	text-align: center;
}
-->
</style>


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
	<tr  <?php if($royalflush == 1) {echo "bgcolor='#FF99FF'";} ?>>
    	<td>Royal Flush</td>
        <td id="center"><?php echo $payouts['royalflush']; ?></td>
        <td id="center"><?php echo $payouts['royalflush']*2; ?></td>
        <td id="center"><?php echo $payouts['royalflush']*3; ?></td>
        <td id="center"><?php echo $payouts['royalflush']*4; ?></td>
        <td id="center"><?php echo $payouts['royalflush']*5; ?></td>
    </tr>
    <tr  <?php if($straightflush == 1) {echo "bgcolor='#FF99FF'";} ?>>
    	<td>Straight Flush</td>
        <td id="center"><?php echo $payouts['straightflush']; ?></td>
        <td id="center"><?php echo $payouts['straightflush']*2; ?></td>
        <td id="center"><?php echo $payouts['straightflush']*3; ?></td>
        <td id="center"><?php echo $payouts['straightflush']*4; ?></td>
        <td id="center"><?php echo $payouts['straightflush']*5; ?></td>
    </tr>
    <tr  <?php if($fouracewith2 == 1) {echo "bgcolor='#FF99FF'";} ?>>
      <td>Four Aces with 2,3,4</td>
      <td id="center"><?php echo $payouts['foura234']; ?></td>
        <td id="center"><?php echo $payouts['foura234']*2; ?></td>
        <td id="center"><?php echo $payouts['foura234']*3; ?></td>
        <td id="center"><?php echo $payouts['foura234']*4; ?></td>
      <td id="center"><?php echo $payouts['foura234']*5; ?></td>
    </tr>
    <tr  <?php if($fourace == 1) {echo "bgcolor='#FF99FF'";} ?>>
      <td>Four Aces</td>
     <td id="center"><?php echo $payouts['foura']; ?></td>
        <td id="center"><?php echo $payouts['foura']*2; ?></td>
        <td id="center"><?php echo $payouts['foura']*3; ?></td>
        <td id="center"><?php echo $payouts['foura']*4; ?></td>
      <td id="center"><?php echo $payouts['foura']*5; ?></td>
    </tr>
    <tr  <?php if($four234witha == 1) {echo "bgcolor='#FF99FF'";} ?>>
      <td>Four 2s, 3s, or 4s with Ace, 2, 3, or 4</td>
       <td id="center"><?php echo $payouts['four234a']; ?></td>
        <td id="center"><?php echo $payouts['four234a']*2; ?></td>
        <td id="center"><?php echo $payouts['four234a']*3; ?></td>
        <td id="center"><?php echo $payouts['four234a']*4; ?></td>
      <td id="center"><?php echo $payouts['four234a']*5; ?></td>
    </tr>
    <tr  <?php if($four234 == 1) {echo "bgcolor='#FF99FF'";} ?>>
      <td>Four 2s, 3s, or 4s</td>
      <td id="center"><?php echo $payouts['four234']; ?></td>
        <td id="center"><?php echo $payouts['four234']*2; ?></td>
        <td id="center"><?php echo $payouts['four234']*3; ?></td>
        <td id="center"><?php echo $payouts['four234']*4; ?></td>
      <td id="center"><?php echo $payouts['four234']*5; ?></td>
    </tr>
    <tr  <?php if($fourkind == 1) {echo "bgcolor='#FF99FF'";} ?>>
      <td>Four 5s through Kings</td>
       <td id="center"><?php echo $payouts['four5ks']; ?></td>
        <td id="center"><?php echo $payouts['four5ks']*2; ?></td>
        <td id="center"><?php echo $payouts['four5ks']*3; ?></td>
        <td id="center"><?php echo $payouts['four5ks']*4; ?></td>
      <td id="center"><?php echo $payouts['four5ks']*5; ?></td>
    </tr>
    <tr  <?php if($fullhouse == 1) {echo "bgcolor='#FF99FF'";} ?>>
      <td>Full House</td>
       <td id="center"><?php echo $payouts['fullhouse']; ?></td>
        <td id="center"><?php echo $payouts['fullhouse']*2; ?></td>
        <td id="center"><?php echo $payouts['fullhouse']*3; ?></td>
        <td id="center"><?php echo $payouts['fullhouse']*4; ?></td>
      <td id="center"><?php echo $payouts['fullhouse']*5; ?></td>
    </tr>
    <tr  <?php if($flush == 1) {echo "bgcolor='#FF99FF'";} ?>>
      <td>Flush</td>
       <td id="center"><?php echo $payouts['flush']; ?></td>
        <td id="center"><?php echo $payouts['flush']*2; ?></td>
        <td id="center"><?php echo $payouts['flush']*3; ?></td>
        <td id="center"><?php echo $payouts['flush']*4; ?></td>
      <td id="center"><?php echo $payouts['flush']*5; ?></td>
    </tr>
    <tr  <?php if($straight == 1) {echo "bgcolor='#FF99FF'";} ?>>
      <td>Straight</td>
      <td id="center"><?php echo $payouts['straight']; ?></td>
        <td id="center"><?php echo $payouts['straight']*2; ?></td>
        <td id="center"><?php echo $payouts['straight']*3; ?></td>
        <td id="center"><?php echo $payouts['straight']*4; ?></td>
      <td id="center"><?php echo $payouts['straight']*5; ?></td>
    </tr>
    <tr   <?php if($threekind == 1) {echo "bgcolor='#FF99FF'";} ?>>
      <td>Three of a Kind</td>
      <td id="center"><?php echo $payouts['threekind']; ?></td>
        <td id="center"><?php echo $payouts['threekind']*2; ?></td>
        <td id="center"><?php echo $payouts['threekind']*3; ?></td>
        <td id="center"><?php echo $payouts['threekind']*4; ?></td>
      <td id="center"><?php echo $payouts['threekind']*5; ?></td>
    </tr>
    <tr  <?php if($twopair == 1) {echo "bgcolor='#FF99FF'";} ?>>
      <td>Two Pairs</td>
       <td id="center"><?php echo $payouts['twopair']; ?></td>
        <td id="center"><?php echo $payouts['twopair']*2; ?></td>
        <td id="center"><?php echo $payouts['twopair']*3; ?></td>
        <td id="center"><?php echo $payouts['twopair']*4; ?></td>
      <td id="center"><?php echo $payouts['twopair']*5; ?></td>
    </tr>
    <tr  <?php if($onepair == 1) {echo "bgcolor='#FF99FF'";} ?>>
      <td>Pair of Jacks or better</td>
      <td id="center"><?php echo $payouts['pair']; ?></td>
        <td id="center"><?php echo $payouts['pair']*2; ?></td>
        <td id="center"><?php echo $payouts['pair']*3; ?></td>
        <td id="center"><?php echo $payouts['pair']*4; ?></td>
      <td id="center"><?php echo $payouts['pair']*5; ?></td>
    </tr>
</table>


