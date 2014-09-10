<?php

class Contact extends AppModel{

	public $useTable = false;

	//validation rule
	public $validate = array(
		'email' => array(
			array('rule' =>'email', 'message' => 'incorrect email')),
		'body' => array(
			array('rule' => 'notEmpty', 'message' => 'body required')
			)
		);
}