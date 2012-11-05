<?php

/**
 * This is the model class for table "userGuidebookInputs".
 *
 * The followings are the available columns in table 'userGuidebookInputs':
 * @property integer $id
 * @property integer $userId
 * @property string $creationTime
 * @property string $bodyWeight
 * @property string $height
 * @property string $waist
 * @property string $avgMealsPerDay
 * @property string $activityLevel
 * @property string $idealWeight
 * @property string $sport
 * @property string $season
 * @property string $goal
 *
 * The followings are the available model relations:
 * @property Users $user
 */
class UserGuidebookInputs extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserGuidebookInputs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'userGuidebookInputs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userId, creationTime', 'required'),
			array('userId', 'numerical', 'integerOnly'=>true),
			array('bodyWeight, height, waist, avgMealsPerDay, activityLevel, idealWeight, sport', 'length', 'max'=>45),
			array('season', 'length', 'max'=>3),
			array('goal', 'length', 'max'=>9),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, userId, creationTime, bodyWeight, height, waist, avgMealsPerDay, activityLevel, idealWeight, sport, season, goal', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'user' => array(self::BELONGS_TO, 'Users', 'userId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'userId' => 'User',
			'creationTime' => 'Creation Time',
			'bodyWeight' => 'Body Weight',
			'height' => 'Height',
			'waist' => 'Waist',
			'avgMealsPerDay' => 'Avg Meals Per Day',
			'activityLevel' => 'Activity Level',
			'idealWeight' => 'Ideal Weight',
			'sport' => 'Sport',
			'season' => 'Season',
			'goal' => 'Goal',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('userId',$this->userId);
		$criteria->compare('creationTime',$this->creationTime,true);
		$criteria->compare('bodyWeight',$this->bodyWeight,true);
		$criteria->compare('height',$this->height,true);
		$criteria->compare('waist',$this->waist,true);
		$criteria->compare('avgMealsPerDay',$this->avgMealsPerDay,true);
		$criteria->compare('activityLevel',$this->activityLevel,true);
		$criteria->compare('idealWeight',$this->idealWeight,true);
		$criteria->compare('sport',$this->sport,true);
		$criteria->compare('season',$this->season,true);
		$criteria->compare('goal',$this->goal,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}