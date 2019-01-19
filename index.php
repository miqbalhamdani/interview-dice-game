<?php

/**
 * @author     Muhammad Iqbal Hamdani
 * @version    1.1
 */

$player = [];
$player_dice = [6,6,6,6];
$round = 1;
$win = false;

while (!$win) {
	echo "------------------------------- Round ". $round ." ------------------------------- <br><br>";
	$round++;

	// rand dice
	for ($a=0; $a < 4; $a++) { 
		$player[$a] = [];

		for ($b=0; $b < $player_dice[$a]; $b++) { 
			array_push($player[$a], rand(1,6));
		}
	}

	echo "<u>After dice rolled:</u> <br>";
	for ($a=0; $a < 4; $a++) { 
		echo "Player ". $a .":  ". implode(",",$player[$a]) ."<br>";
	}

	// remove number 1 and 6
	for ($a=0; $a < 4; $a++) { 
		$plus[$a] = 0;
		foreach ($player[$a] as $key => $value) {
			if($value == 6) {
				unset($player[$a][$key]);
			}

			if($value == 1) {
				if ($player[3]) {
					unset($player[$a][$key]);
				} else {
					unset($player[$a][$key]);
				}
				$plus[$a]++;
			}
		}
	}

	// add 1 to other side
	for ($a=0; $a < 4; $a++) { 
		if($a == 3){
			for ($i=0; $i < $plus[3]; $i++) { 
				array_push($player[0], 1);
			}
		} else {
			for ($i=0; $i < $plus[$a]; $i++) { 
				array_push($player[$a+1], 1);
			}
		}
	}

	$player_dice = []; 
	echo "<br><u>After Dice moved/Removed:</u> <br>";
	for ($a=0; $a < 4; $a++) {  
		echo "Player ". $a .":  ". implode(",",$player[$a]) ."<br>";
		array_push($player_dice, count($player[$a]));

		if(count($player[$a]) == 0) {
			$win = true;
		}
	}
	echo "<br><br>";
}


