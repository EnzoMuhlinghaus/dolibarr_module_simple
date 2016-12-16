<?php
class Grade{

	static function get($societe){
		$capital = $societe->capital;
		$zip = $societe->state_code;
		$pt = 0;

		$liste_grade = ["26" => 5, "07" => 5, "38" => 4, "69" => 4, "42" => 3, "73" => 2, "74" => 1, "01" => 1];

		$pt = $liste_grade[$zip];

		$grade = "";
		if($capital > 300000){
			$pt++;
		}
		if ($capital > 150000) {
			$pt++;
		}
		if ($capital > 100000) {
			$pt++;
		}
		if ($capital > 50000) {
			$pt++;
		}
		if ($capital < 50000) {
			$pt++;
		}

		if($pt > 10){
			$grade = "A";
		}
		elseif ($pt > 8) {
			$grade = "B";
		}
		elseif ($pt > 6) {
			$grade = "C";
		}
		elseif ($pt > 4) {
			$grade = "D";
		}
		elseif ($pt < 4) {
			$grade = "E";
		}


		return $grade;
	}
}