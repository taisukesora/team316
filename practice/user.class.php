<?php

//オブジェクト指向

class User{
	public $name;
	private $email;

	public function __construct($name, $email){
		$this->name = $name;
		$this->email = $email;
	}

	public function sayHi(){
		echo "hi! my name is ".$this->name;
	}
}

class SuperUser extends User{
	public function superSayHi(){
		echo "HIIIII my name is ".$this->name;
	}
}

