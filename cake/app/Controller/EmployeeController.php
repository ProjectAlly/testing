<?php
	class EmployeeController extends AppController{
		public $name = 'Employee';
		public $helpers = array('Html','Form');
		public $components = array('Session');

		
		public $uses = array('UserInfo', 'Register');
		
		public function index() {
			$title_for_layout = 'Home';
			$this->set(compact('title_for_layout'));

			$this -> set('users', $this->Register->find('all' ,array('conditions' => 
																	array('Register.id >' => 'Register.id',
																	'Register.status' => '1'))));
		} 
	}
?>