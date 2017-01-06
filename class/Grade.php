<?php
class Grade{

	static function get($societe){
		$capital = $societe->capital;
		$zip = $societe->state_code;
		$risque = $societe->array_options['options_risque'];
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

		$pt+= (100-$risque)/10;

		if($pt > 16){
			$grade = "A";
		}
		elseif ($pt > 14) {
			$grade = "B";
		}
		elseif ($pt > 12) {
			$grade = "C";
		}
		elseif ($pt > 8) {
			$grade = "D";
		}
		elseif ($pt < 8) {
			$grade = "E";
		}


		return $grade;
	}
}