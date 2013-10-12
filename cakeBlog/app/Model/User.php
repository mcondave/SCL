<?php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {


    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            ),
            'That username has already been taken'=>array(
                'rule' => 'isUnique',
                'message' => 'That username has already been taken'
            )
        ),

        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
    );

    public function beforeSave($options = array()) {
	    if (isset($this->data[$this->alias]['password'])) {
	        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
	    }
        $this->invalidate('password_confirmation', 'Your passwords do not match');
	    return true;
	}

}