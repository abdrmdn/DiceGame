<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

include 'player.php';


Class DiceGame{
	var $players;
	var $players_number;
	function __construct() {
		$names=['A','B','C','D'];
		$this->players_number=4;
		$this->players = array();
		for ($i=0; $i < $this->players_number; $i++) { 
			$this->players[$i]=new Player($names[$i],6);
		}
	}

	function run()
	{
		$winner=false;
		$round_number=0;
		while(!$winner && $round_number<50)
		{
			echo '<br><br>round '.$round_number++.' : <br>';
			foreach ($this->players as $key => $value) {
				$value->rollDices();
				$value->showDicesInHand();
			}
			foreach ($this->players as $key => $value) {
				$value->checkHand($this->players[((($key+$this->players_number)-1)%$this->players_number)]);
			}
			foreach ($this->players as $key => $value) {
			if($value->isWinner()){$winner=true;}
			}

		}
	}

}

$Game=new DiceGame();
$Game->run();

?>