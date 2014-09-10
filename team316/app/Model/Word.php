<?php

class Word extends AppModel{
	
	public $validate = array(
		'email' => array(
			array('rule' =>'email', 'message' => 'incorrect email')),
		'body' => array(
			array('rule' => 'notEmpty', 'message' => 'body required')
			)
		);
}