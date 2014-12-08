<?php

/**
 * This is the model class for table "unions.attraction".
 *
 * The followings are the available columns in table 'unions.attraction':
 * @property integer $attraction_id
 * @property string $name
 * @property string $image_path
 * @property integer $lim_id
 * @property string $information_url
 * @property string $url_display_name
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 * @property integer $building_id
 *
 * The followings are the available model relations:
 * @property Building $building
 */
class Attraction extends UActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'unions.attraction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, building_id', 'required'),
			array('lim_id, create_user_id, update_user_id, building_id', 'numerical', 'integerOnly'=>true),
			array('name, image_path, information_url', 'length', 'max'=>100),
			array('url_display_name', 'length', 'max'=>60),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('attraction_id, name, image_path, lim_id, information_url, url_display_name, create_time, create_user_id, update_time, update_user_id, building_id', 'safe', 'on'=>'search'),
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
			'building' => array(self::BELONGS_TO, 'Building', 'building_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'attraction_id' => 'Attraction',
			'name' => 'Name',
			'image_path' => 'Image Path',
			'lim_id' => 'Lim',
			'information_url' => 'Information Url',
			'url_display_name' => 'Url Display Name',
			'create_time' => 'Create Time',
			'create_user_id' => 'Create User',
			'update_time' => 'Update Time',
			'update_user_id' => 'Update User',
			'building_id' => 'Building',
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

		$criteria->compare('attraction_id',$this->attraction_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('image_path',$this->image_path,true);
		$criteria->compare('lim_id',$this->lim_id);
		$criteria->compare('information_url',$this->information_url,true);
		$criteria->compare('url_display_name',$this->url_display_name,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);
		$criteria->compare('building_id',$this->building_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Attraction the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
