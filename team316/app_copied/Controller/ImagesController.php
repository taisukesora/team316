<?php

class ImagesController extends AppController{
	//public $scaffold;

	public function index(){
		$this->set('images', $this->Image->find('first'));
	}

	public function result($id = null, $date = null){
		$options = array(
			'conditons' => array(
				'id' => $id)
		);
		$this->set('images', $this->Image->find('first', $options));

	}

}