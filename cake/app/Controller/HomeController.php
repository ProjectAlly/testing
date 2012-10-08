<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class HomeController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Home';
	public $helpers = array('Html','Form');
	public $components = array('Session');

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('UserInfo', 'Register');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function index() {
		$title_for_layout = 'Home';
		$this->set(compact('title_for_layout'));
		if(!empty($this->data)){
			if($this->Register->save($this->data)){
				echo "successful";
				$this->redirect(array('controller' => 'Home', 'action' => 'message'));
			} else {
				$this->Session->setFlash('Your stuff has been saved.');
			}
		}
	}
	
	public function authenticate() {
		//echo "here";
		//$test1 = $this->data['UserInfo']['inputEmail'];
		$test = $this->UserInfo->Find('first',array('conditions' => 
												array('UserInfo.inputEmail' => $this->data['UserInfo']['inputEmail'],
													  'UserInfo.inputPassword' => $this->data['UserInfo']['inputPassword'],
													  'UserInfo.status' => '1')));
		
												
		echo "<pre>";
		
		$this->Session->write('name',$test['UserInfo']['userName']);
		$this->Session->write('role',$test['UserInfo']['userRole']);
		//print_r($test);
		
		if ($test == null)
		{
			$this->redirect(array('controller' => 'Home', 'action' => 'loginfailure'));
		}
		else 
		{
			switch ($test['UserInfo']['userRole'])
			{
				case 1:
					$this->redirect(array('controller' => 'SuperAdmin', 'action' => 'index'));
					break;
				case 2:
					$this->redirect(array('controller' => 'Admin', 'action' => 'index'));
					break;
				case 3:
					$this->redirect(array('controller' => 'Employee', 'action' => 'index'));
					break;
				default:
					echo "User";
					break;
			}
		}
		//echo $test['UserInfo']['accessPermission']; 
		exit();
		//print_r($this->UserInfo->Find('first'));
	}
	
	public function logout() {
		$this->Session->destroy();
		$this->redirect(array('controller' => 'home', 'action' => 'index'));
	}
	
	public function userProfile($id = null) {
		$this->Register->id = $id;
		$this->set('user', $this->Register->find('first', array('conditions' => array('Register.id' => $id))));
	}
	
	
	public function test() {
		echo "you successfully registered with projectally....kindly wait till admin approves yours request.";
	}
	
	public function message() {
		
	}
	
	public function loginfailure() {
		
	}
}
