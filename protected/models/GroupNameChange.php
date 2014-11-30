<?php

/**
 * This is the model class for table "tblGroupNameChange".
 *
 * The followings are the available columns in table 'tblGroupNameChange':
 * @property integer $group_id
 * @property string $new_name
 * @property string $old_name
 * @property integer $status
 * @property string $create_pawprint
 */
class GroupNameChange extends CActiveRecord
{

    public function beforeValidate(){
        $model = People::model()->find("GroupID = '$this->group_id';");
        $this->old_name = $model->GroupName;

        return parent::beforeSave();
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblGroupNameChange';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('group_id, new_name, old_name', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('new_name, old_name, create_pawprint', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('group_id, new_name, old_name, status, create_pawprint', 'safe', 'on'=>'search'),
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
			'group_id' => 'Group',
			'new_name' => 'New Name',
			'old_name' => 'Department',
			'status' => 'Status',
			'create_pawprint' => 'Create Pawprint',
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

		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('new_name',$this->new_name,true);
		$criteria->compare('old_name',$this->old_name,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_pawprint',$this->create_pawprint,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @return CDbConnection the database connection used for this class
	 */
	public function getDbConnection()
	{
		return Yii::app()->db_ems;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GroupNameChange the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


}
