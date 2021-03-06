<?php

class CalculatorController extends ONSController
{

	public function actionIndex()
	{
		$this->render('index');
	}
	
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
        'actions'=>array('index'),
        'users'=>array('?'),
      ),
      array('deny'),
    );
  }
  
}
