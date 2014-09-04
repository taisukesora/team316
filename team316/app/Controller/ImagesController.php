<?php

class ImagesController extends AppController{
	//public $scaffold;

	public function index(){
		$this->set('images', $this->Image->find('first'));
	}

	public function form(){
		$this->set('images', $this->Image->find('first'));
	}

}