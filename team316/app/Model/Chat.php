<?php
class Chat extends AppModel{
	public $validate = array(
		'commenter' => array(
			'rule' => 'notEmpty'),
		'body' => array(
			'rule' => 'notEmpty'
			)
	);
}