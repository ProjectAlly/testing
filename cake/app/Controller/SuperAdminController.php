<?php
	class SuperAdminController extends AppController{
		public $name = 'SuperAdmin';
		public $helpers = array('Html','Form');
		public $components = array('Session');

		
		public $uses = array('UserInfo', 'Register');
		
		public function beforeFilter() {
			$name = $this->Session->read('name');
			if (isset($name)) {
				
			}
			else {
				$this->redirect(array('controller' => 'Home', 'action' => 'index'));
			}
		}
		
		public function index() {
			$title_for_layout = 'Home';
			
		}
		 
		public function removeUser($id = null) {
			$this->Register->id = $id;
			$this->Register->delete($id);
			$this->redirect(array('controller' => 'SuperAdmin', 'action' => 'pendingUsers'));
		}
		
		public function approveUser($id = null) {
			$this->Register->id = $id;
			$this->Register->updateAll(array('Register.status' => '1'), array('Register.id' => $id));
			$this->redirect(array('controller' => 'SuperAdmin', 'action' => 'pendingUsers'));
		}
		
		public function pendingUsers() {
			$this->set(compact('title_for_layout'));
			$this->set('users', $this->Register->find('all', array('conditions' => array('Register.id >' => 'Register.id'))));
		}
	
	}
?>