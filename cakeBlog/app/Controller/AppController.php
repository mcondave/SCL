<?php
class AppController extends Controller {
    public $components = array(
    	'Session',
    	'Auth'=>array(
    		'loginRedirect'=>array('controller' => 'users', 'action' => 'index'),
    		'logoutRedirect'=>array('controller' => 'posts', 'action' => 'index'),
    		'authError'=>"You can't access that page",
    		'authorize'=>array('Controller')
    	)
    );

    public function isAuthorized($user) {
    	// Admin can access every action
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }

        return false;
    }

    public function beforeFilter() {
    	$this->Auth->allow('index', 'view');
        $this->set('logged_in', $this->Auth->loggedIn());
        $this->set('current_user', $this->Auth->user());
    }
}