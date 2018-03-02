<?php

session_start();
$_SESSION['cards'] = "";
$_SESSION['newCards'][0] = "";
$_SESSION['newCards'][1] = "";
$_SESSION['newCards'][2] = "";
$_SESSION['newCards'][3] = "";
$_SESSION['newCards'][4] = "";
function newDeck($numJokers = 0)
 {

  // Returns $deck: array of 52 standard deck of 4-suit cards plus $numJokers jokers, shuffled (key starts at zero)
  // in format of e.g. $deck[4] = "A &spades;" = ace of spades (fifth card)
  $suitCards = array("J", "Q", "K", "A");
  $suitCards = array_merge($suitCards, range(2, 10));
  $hearts = array();
  $spades = array();
  $diamonds = array();
  $clubs = array();
  foreach($suitCards as $card)
  {
   $hearts[] = "<img src='images/h".trim($card).".png'>";
   $heartv[] = "h:".$card;
   $spades[] = "<img src='images/s".trim($card).".png'>";
   $spadev[] = "s:".$card;
   $diamonds[] = "<img src='images/d".trim($card).".png'>";
   $diamondv[] = "d:".$card;
   $clubs[] = "<img src='images/c".trim($card).".png'>";
   $clubv[] = "c:".$card;
  }
  $jokers = array();
  for($i = 0; $i < $numJokers; $i++)
   $jokers[] = "<span style=\"color: #8467D7;\">JOKER</span>";
  $deck = array_merge($heartv, $spadev, $clubv, $diamondv, $jokers);
  
  
  shuffle($deck);
  return $deck;
 }
 
 function deal($deck, $numHands, $numCards)
 {
  // Returns $hand: two-dimensional array, first key being player ID and second being card number (both starting from zero)
  // e.g. $hand[2][4] = "6 &hearts;" = six of hearts (third hand, fifth card)
  // To return, use extract, e.g. extract(deal($deck, 2, 13)); (also returns $deck)
  $hand = array();
  for($i = 0; $i < $numHands; $i++)
  {
   for($j = 0; $j < $numCards; $j++)
   {
    $hand[$i][$j] = next($deck);
    if($i == 0 && $j == 0)
     $hand[0][0] = prev($deck);
   }
  }
  $deck = array_splice($deck, ($numHands * $numCards));
  $_SESSION['deck'] = $deck;
  return compact("hand", "deck");
  
}

 $deck = newDeck();
 extract(deal($deck, 1, 5));
 
  $p1 = array();
	$p1[0] = $hand[0][0];
	$p1[1] = $hand[0][1];
	$p1[2] = $hand[0][2];
	$p1[3] = $hand[0][3];
	$p1[4] = $hand[0][4];
	$_SESSION['cards'] = $p1;
	
	$showCard = array();
	foreach($p1 AS $player) {
		$cardV = explode(":",$player);
		//DISPLAY THE CARDS
			$showCard[] = "<img src='images/".$cardV[0].$cardV[1].".png'>"; 
			
	}
//$_SESSION['showCard'] = $showCard[];

include 'checkHand.php';

$subtract = $_SESSION['bet'];

$_SESSION['credits'] = $_SESSION['credits'] - $subtract;


?>

<table align="center" width="500" border="0" cellpadding="0" cellspacing="0">
	<tr height="140" valign="bottom">
    	<td align="center"><div id="card1"><?php echo $showCard[0]; ?></div><div style="display:none" id="hold1">HOLD</div></td>
        <td align="center"><div id="card2"><?php echo $showCard[1]; ?></div><div style="display:none" id="hold2">HOLD</div></td>
        <td align="center"><div id="card3"><?php echo $showCard[2]; ?></div><div style="display:none" id="hold3">HOLD</div></td>
        <td align="center"><div id="card4"><?php echo $showCard[3]; ?></div><div style="display:none" id="hold4">HOLD</div></td>
        <td align="center"><div id="card5"><?php echo $showCard[4]; ?></div><div style="display:none" id="hold5">HOLD</div></td>
	</tr>
    <tr>
    	<td align="center"><input onclick="javascript:holdCards(0); togglejs('hold1')" type="button" value="Hold" style="padding:4px" /></td>
        <td align="center"><input onclick="javascript:holdCards(1); togglejs('hold2')" type="button" value="Hold" style="padding:4px" /></td>
        <td align="center"><input onclick="javascript:holdCards(2); togglejs('hold3')" type="button" value="Hold" style="padding:4px" /></td>
        <td align="center"><input onclick="javascript:holdCards(3); togglejs('hold4')" type="button" value="Hold" style="padding:4px" /></td>
        <td align="center"><input onclick="javascript:holdCards(4); togglejs('hold5')" type="button" value="Hold" style="padding:4px" /></td>
    </tr>
</table>
