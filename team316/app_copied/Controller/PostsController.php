<?php

class PostsController extends AppController{
//	public $scaffold;
	public $helpers = array('Html', 'Form');

	public function index(){
		$this->set('posts', $this->Post->find('all'));
		$this->layout = 'admin';
		$this->set('title_for_layout', '記事一覧');
	}

	public function view($id = null){
		if(!$id){
			throw new NotFoundException(__('Invalid post'));
		}

		$post = $this->Post->findById($id);
		if(!$post){
			throw new NotFoundException(__('Invalid post'));
		}

		$this->set('post', $post);
	}

	public function add($image_id = null){

		$this->set('image_id', $image_id);

		if($this->request->is('post')){
			$this->Post->create();
			$this->request->data['Post']['image_id'] = $image_id;

			if($this->Post->save($this->request->data)){
				$this->Session->setFlash(__('Your post has been saved.'));
				return $this->redirect(array('controller' => 'images', 'action' => 'result', $image_id));
			}
			$this->Session->setFlash(__('Unable to add your post.'));	
		}
	}

	public function edit($id = null){
		if(!$id){
			throw new NotFoundException(__('Invalid post'));
		}

		$post = $this->Post->findById($id);
		if(!$post){
			throw new NotFoundException(__('Invalid post'));
		}

		if($this->request->is(array('post', 'put'))){
			$this->Post->image_id = $id;
			if($this->Post->save($this->request->data)){
				$this->Session->setFlash(__('Your post has been updated.'));
				return $this->redirect(array('controller' => 'images', 'action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to update your post.'));
		}

		if(!$this->request->data){
			$this->request->data = $post;
		}

	}

	public function delete($id){
		if($this->request->is('get')){
			throw new MethodNotAllowedException();
		}

		if($this->Post->delete($id)){
			$this->Session->setFlash(
				__('The post with id: %s has been deleted.', h($id)));
			return $this->redirect(array('action' => 'index'));
		}
	}
}
