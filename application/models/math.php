<?php

class Math extends CI_Model{
	public function add($add1,$add2){
		return $add1+$add2;
	}

	public function sub($add1,$add2){
		return $add1-$add2;
	}
}