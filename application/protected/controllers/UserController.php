<?php

class UserController extends ONSController
{
	public function actionIndex()
	{
		$this->render('account');
	}

	public function actionProfile()
	{
		$this->render('profile');
	}
	
	public function actionNewUser()
	{
		if(isset($_POST['User'])){
	    $userData = $_POST['User'];
		  
		  if (!$userData['password'] == $userData['cPassword']) {
	      throw new Exception('Password and Confirm Password field are not the same.');
	    }
		  $user = Users::createFromArray($userData);
		  if (!empty($userData['password'])) {
				if (PasswordHelper::isValidPasswordPattern($userData['password'])) {
					$user->salt = PasswordHelper::generateRandomSalt();
					$user->password = PasswordHelper::hashPassword($user->password, $user->salt);
				}
				else {
					throw new Exception('Password must contain at least one uppercase, one lowercase, one number, and be at least 9 characters long.');
				}
			}
			
		  if ($user->save()) {
		    var_dump('Saved!');
		  }
		  else {
		    var_dump($user->errors);
		    var_dump('Not Saved');
		  }
		} else {
		  $this->render('newUser');
		}
	}
	
	public function actionVerifyEmail()
	{
	  $email = $_GET['email'];
	  $id = $_GET['id'];
		if (isset($_GET['User'])) {
		  if (!$_GET['User']['password'] == $_GET['User']['cPassword']) {
	      throw new Exception('Password and Confirm Password field are not the same.');
	    }
		  $user = Users::createFromArray($_GET['User']);
		  if (!empty($_GET['User']['password'])) {
				if (PasswordHelper::isValidPasswordPattern($_GET['User']['password'])) {
					$user->salt = PasswordHelper::generateRandomSalt();
					$user->password = PasswordHelper::hashPassword($user->password, $user->salt);
				}
				else {
					throw new Exception('Password must contain at least one uppercase, one lowercase, one number, and be at least 9 characters long.');
				}
			}
			
		  if ($user->save()) {
		    var_dump('Saved!');
		  }
		  else {
		    var_dump('Not Saved');
		  }
		} else {
		  $this->render('loginForm');
		}
	}


	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
	public function filters()
  {
    return array( 'accessControl' ); // perform access control for CRUD operations
  }

  public function accessRules()
  {
    return array(
      array('allow', // allow authenticated users to access all actions
        'users'=>array('@'),
      ),
      array('allow',
        'actions'=>array('showUserForm'),
        'users'=>array('?'),
      ),
      array('deny'),
    );
  }
}
