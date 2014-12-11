<?php

/**
 * This is the model class for table "item".
 *
 * The followings are the available columns in table 'item':
 * @property integer $item_id
 * @property string $location
 * @property string $description
 * @property string $found_user
 * @property string $found_date
 * @property integer $item_type_id
 * @property integer $status
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 */
class Item extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'unions.item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('location, description, found_user, found_date, item_type_id', 'required'),
			array('item_type_id, status, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
            array('status', 'default', 'value'=>1),
			array('location, description', 'length', 'max'=>255),
			array('found_user', 'length', 'max'=>45),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('item_id, location, description, found_user, found_date, item_type_id, status, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'item_id' => 'Item',
			'location' => 'Location',
			'description' => 'Description',
			'found_user' => 'Found User',
			'found_date' => 'Found Date',
			'item_type_id' => 'Item Type',
			'status' => 'Status',
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

		$criteria->compare('item_id',$this->item_id);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('found_user',$this->found_user,true);
		$criteria->compare('found_date',$this->found_date,true);
		$criteria->compare('item_type_id',$this->item_type_id);
		$criteria->compare('status',$this->status);
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
	 * @return Item the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
