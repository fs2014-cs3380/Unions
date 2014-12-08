<?php

/**
 * This is the model class for table "unions.event_space".
 *
 * The followings are the available columns in table 'unions.event_space':
 * @property integer $event_space_id
 * @property string $name
 * @property integer $floor_id
 * @property integer $capacity
 * @property string $image_path
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property Floor $floor
 * @property Reservation[] $reservations
 */
class EventSpace extends UActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'unions.event_space';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, floor_id, capacity', 'required'),
			array('floor_id, capacity, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			array('image_path', 'length', 'max'=>100),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('event_space_id, name, floor_id, capacity, image_path, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'floor' => array(self::BELONGS_TO, 'Floor', 'floor_id'),
			'reservations' => array(self::HAS_MANY, 'Reservation', 'event_space_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'event_space_id' => 'Event Space',
			'name' => 'Name',
			'floor_id' => 'Floor',
			'capacity' => 'Capacity',
			'image_path' => 'Image Path',
			'create_time' => 'Create Time',
			'create_user_id' => 'Create User',
			'update_time' => 'Update Time',
			'update_user_id' => 'Update User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('event_space_id',$this->event_space_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('floor_id',$this->floor_id);
		$criteria->compare('capacity',$this->capacity);
		$criteria->compare('image_path',$this->image_path,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EventSpace the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
