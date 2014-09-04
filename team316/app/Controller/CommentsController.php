<?php

class CommentsController extends AppController{
//	public $scaffold;
	public $helpers = array('Html', 'Form');

	
	
	public function add(){
		if($this->request->is('post')){
			$this->Comment->create();
			if($this->Comment->save($this->request->data)){
				$this->Session->setFlash(__('Your post has been saved.'));
				return $this->redirect(array('controller' => 'posts', 
					'action' => 'view', $this->data['Comment']['post_id']));
			}
			$this->Session->setFlash(__('Unable to add your post.'));	
		}
	}

	public function delete($id){
		if($this->request->is('get')){
			throw new MethodNotAllowedException();
		}

		if($this->Controller->delete($id)){
			$this->Session->setFlash(
				__('The post with id: %s has been deleted.', h($id)));
			return $this->redirect(array('controller' => 'posts', 'action' => 'index'));
		}
	}

}
