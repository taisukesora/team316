<?php
class ChatsController extends AppController{
	public $helper = array('Html', 'Form');

	public function index(){
		$this->set('chats', $this->Chat->find('all'));

		if($this->request->is('post')){
			$this->Chat->create();
			if($this->Chat->save($this->request->data)){
				$this->Session->setFlash(__('Your post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to add your post'));
		}
	}	
	public function edit($id = null){
		if(!$id){
			throw new NotFoundException(__('Invalid post'));
		}

		$chat = $this->Chat->findById($id);
		if(!$chat){
			throw new NotFoundException(__('Invalid post'));
		}

		if($this->request->is(array('post', 'put'))){
			$this->Chat->id = $id;
			if($this->Chat->save($this->request->data)){
				$this->Session->setFlash(__('Your post has been updated'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to update your post.'));
		}
		if(!$this->request->data){
			$this->request->data = $chat;
		}
	}

	public function delete($id){
		if($this->request->is('get')){
			throw new MethodNotAllowedException();
		}

		if($this->Chat->delete($id)){
			$this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)));
			return $this->redirect(array('action' => 'index'));
		}
	}
}

