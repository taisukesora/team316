<?php
App::uses('CakeEmail','Network/Email');

class WordsController extends AppController{
	public $helpers = array('Html', 'Form');



	public function index(){
		if ($this->request->is('post') || $this->request->is('pust')) {
            $this->Contact->set($this->request->data);
            if ($this->Contact->Validates()) {
            
                $vars = $this->request->data['Contact'];
            
                $email = new CakeEmail();
                // 送信設定
                $email->config('contact');    // $contact の設定を使う
                    // 送信元
                    //->from(array($this->request->data['Contact']['email'] => '○○お問い合わせ'))
                    // 送信先
                    $email->to($this->request->data['Contact']['send to



                    	']);
                    // BCC, お問い合わせした人にもコピーを送りたい時とか
                    // ->bcc($this->request->data['Contact']['email'])
                    // テンプレート変数設定
                    $email->viewVars($vars);
                    // 使用するテンプレートの設定, 本文の方 contact, レイアウト contact
                    $email->template('contact', 'contact');
                    // メール件名
                    $email->subject($this->request->data['Contact']['title']."発想支援ツール");
                // 送信
                // 送信したメールのヘッダーとメッセージを配列で返します
                if ($email->send()) {
                    $this->Session->setFlash('送信完了');
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash('送信失敗');
                }
            }
        }
		
		$random = Array();
		while(true) {
			$num = mt_rand(0, $this->Word->find('count'));
			if(!in_array($num, $random)){
				$random[] = $num;
			}
			if(count($random) > 3){
				break;
			}
		}
		$conditions = Array();
		foreach($random as $num) {
			$conditions[] = Array('id' => $num);
		}
		$result = $this->Word->find('list', Array('conditions' => Array('OR' => $conditions),
		 'fields' => Array('id', 'word')));
		$this->set('words', $result);




	}
}


class ContactController extends AppController
{
    public function index() {
        
    }
}