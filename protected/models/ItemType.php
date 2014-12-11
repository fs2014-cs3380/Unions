<?php

/**
 * This is the model class for table "item_type".
 *
 * The followings are the available columns in table 'item_type':
 * @property integer $item_type_id
 * @property string $name
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 * @property string $status
 *
 * The followings are the available model relations:
 * @property string $statusItem[] $items
 */
class ItemType extends UActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'unions.item_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('create_user_id, update_user_id,', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('status', 'safe', 'on'=>'search'),
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
            'items' => array(self::HAS_MANY, 'Item', 'item_type_id'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'item_type_id' => 'Item Type',
			'name' => 'Name',
			'create_time' => 'Create Time',
			'create_user_id' => 'Create User',
			'update_time' => 'Update Time',
			'update_user_id' => 'Update User',
			'status' => 'Status',
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

		$criteria->compare('LOWER(status)',strtolower($this->status),true);
        $criteria->order = 'status DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ItemType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    public static function getItemTypeOptions(){
        return CHtml::listData(ItemType::model()->findAll(), 'item_type_id', 'name');
    }
    public static function getStatusOptions(){

        return array("Pending"=>"Pending", "Approved"=>"Approved", "Declined"=>"Declined");
    }
    public function ajaxStatusOptions()
    {
        echo CHtml::activeDropDownList($this,'status', $this->getStatusOptions(),array(
            'ajax' => array(
                'type'=>'POST',
                'url'=>Yii::app()->createUrl('itemtype/statusUpdate'),
                'update'=>'#outlet',
                'data'=>'js:jQuery(this).serialize() + "&id='.$this->item_type_id.'"',
                'success'=>'function(data) {
                    $("#main-content").html(data);
                }',
            ),
            'id' => 'Item_type-'.$this->item_type_id,
        ));
    }
}
