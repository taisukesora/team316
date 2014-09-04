<?php

class TasksController extends AppController{
	public $scaffold;
	//public $hasMany = array('Note');


	public function index(){

		//データをモデルから取得してビューへ渡す
		$options = array(
			'conditions' => array(
				'Task.status' => 0
			)
		);



		$tasks_data = $this->Task->find('all',$options);
		$this->set('tasks_data',$tasks_data);

		//index.ctpの表示
		$this->render('index');
	}

	public function done(){
		$id = $this->request->pass[0];
		$this->Task->id = $id;
		$this->Task->saveField('status', 1);
		$msg = sprintf(
			'task %s finished ', $id);


		$this->flash($msg,'/Tasks/index');
	}

	public function create(){
		if($this->request->is('post')){
			$data = array(
				'name' => $this->request->data['name'],
				'body' => $this->request->data['body'],
			);

			//データを登録
			$id = $this->Task->save($data);
			if($id == false){
				$this->render('create');
				return;
			}
			$msg = sprintf('タスク %s を登録しました', $this->Task->id);

			$this->flash($msg, '/Tasks/index');
			return;
		}
		$this->render('create');
	}

	public function test(){
		$options = array(
			//'conditions' => array('body' => 'aaa'),
			'order' => array('Task.id asc')

			);
		// $data = $this->Task->find('all', $options);
		$data = $this->Task->find('list', $options);
		debug($data);
	}

	public function edit(){
		$id = $this->request->pass[0];
		$options = array(
			'Task.id' => $id,
			'Task.status' => 0
			);
		$task = $this->Task->find('first', $options);

		if($task == false){
			$this->Session->setFlash('タスクが見つかりません');
			$this->redirect('/Tasks/index');
		}

		if($this->request->is('post')){
			$data = array(
				'id' => $id,
				'name' => $this->request->data['Task']['name'],
				'body' => $this->request->data['Task']['body']);
			if($this->Task->save($data)){
				$this->Session->setFlash('更新しました');
				$this->redirect('/Tasks/index');
			}
		}else{
			$this->request->data = $task;
		}

	}

}