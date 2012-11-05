<?php

class CalcSectionsController extends ONSController
{
  private $views = array(
    'introduction' => 'url',
    'definingSportsNutrition' => 'url',
    'calories' => 'url',
    'nutritionGoal' => 'url',
    'hydration' => 'url',
    'meals' => 'url',
    'nutritionRatios' => 'url',
    'nutrientRatioFoodSources' => 'url',
    'sleepRest' => 'url',
    'startPlan' => 'url',
    'servingSize' => 'url',
    'smartPhoneApp' => 'url',
    'beforeAfterPics' => 'url',
    'printProfile' => 'url',
  );
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionRenderSection()
	{
	  $view = $_GET['view'];
	  switch ($view) {
	    case 'introduction':
	      $data = $this->getIntroductionData();
	      break;
	    case 'definingSportsNutrition':
	      $data = $this->getDefiningSportsNutritionData();
	      break;
	    case 'calories':
	      $data = $this->getCaloriesData();
	      break;
	    case 'nutritionGoal':
	      $data = $this->getNutritionGoalData();
	      break;
	    case 'hydration':
	      $data = $this->getHydrationData();
	      break;
	    case 'meals':
	      $data = $this->getMealsData();
	      break;
	    case 'nutritionRatios':
	      $data = $this->getNutritionRatiosData();
	      break;
	    case 'nutrientRatioFoodSources':
	      $data = $this->getNutrientRatioFoodSourcesData();
	      break;
	    case 'sleepRest':
	      $data = $this->getSleepRestData();
	      break;
	    case 'startPlan':
	      $data = $this->getStartPlanData();
	      break;
	  //ADD REST OF OPTIONS HERE
	  }
	  /*data from the above functions must be an array of format:
	  array(
	    'imgUrl' => 'url of image',
	    'viewToRender' => 'name of view file',
	    'subViewVars' => array(
	        'variables needed for the sub view'
	     ),
	  );
	  
	  */
		$this->render('calcLayout', $data);
	}
	
	public function getIntroductionData()
	{
	  return array(
	    'imgUrl' => "/images/calcSections/introduction.jpg",
	    'viewToRender' => 'introduction',
	    'subViewVars' => array('testVar' => 'test variable print'),
	  );
	}
	
	public function getDefiningSportsNutritionData()
	{
	  
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
        'actions'=>array('index', 'renderSection'),
        'users'=>array('?'),
      ),
      array('deny'),
    );
  }
  
}
