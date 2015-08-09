<?php
// include 'diceRoller.php';

Class Player{

	// var $roller;
	var $player_name;
	var $player_dices;

	function __construct($name,$dices_amount){
		// $this->roller=new DiceRoller();
		$this->player_name=$name;
		$this->player_dices=array();
		for ($i=0; $i < $dices_amount; $i++) { 
			$this->player_dices[]=0;
		}
	}


	public function rollDices()
	{
		foreach ($this->player_dices as $key => &$value) {
			$value=rand(1,6);
		}
	}
	public function showDicesInHand()
	{	
		echo "player ".$this->player_name."(".sizeof($this->player_dices).") : ";
		foreach ($this->player_dices as $key => $value) {
			echo $value.',';
		}
		echo '<br>';
	}
	public function isWinner()
	{
		if(sizeof($this->player_dices)>0)
			return false;
		else
		{
			echo 'player '.$this->player_name.' is a winner!<br>';
			return true;
		}
	}

	public function checkHand(&$player_onLeft)
	{
		foreach ($this->player_dices as $key => $value) {
			if($value==6){
				unset($this->player_dices[$key]);
			}elseif($value==1){
				unset($this->player_dices[$key]);
				$player_onLeft->addDice($value-1);
			}
			else
			{}
		}
	}

	public function addDice($dice_value)
	{
		$this->player_dices[]=$dice_value;
	}
}

?>