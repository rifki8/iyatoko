<?php
	//Konstata "BASE_URL"
	define("BASE_URL","http://localhost/iyatoko/");

	function rupiah($nilai = 0){
		$string = "Rp, ". number_format($nilai);
		return $string;
	}
?>
