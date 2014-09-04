<?php

class CommentController extends AppController {

	public function index(){
		$this->set('comment', $this->Comment->find('all'));
		$data = array(
			'city' => 'Shibuya',
			'train' => array(
				'JR',
				'Tokyu',
				'Tokyo Metro',
				'Keio'
				)
			);
		$this->set($data);
		$this->render();
		//$this->redirect('http://yahoo.co.jp');
		// $this->flash('CakePHPのサイトへ移動します','http://yahoo.co.jp');

	}

	public function form(){
		if($this->request->is('post')){
			$keyword = $this->request->data['age'];
		}
	}




}