<?php

/**
 * This is the model class for table "tblPeople".
 *
 * The followings are the available columns in table 'tblPeople':
 * @property string $PersonnelNumber
 * @property string $FirstName
 * @property string $LastName
 * @property string $Title
 * @property string $MiddleInitial
 * @property string $EMailAddress
 * @property string $Phone
 * @property string $Fax
 * @property string $Address1
 * @property string $Address2
 * @property string $City
 * @property string $State
 * @property string $ZipCode
 * @property string $Country
 * @property string $NetworkID
 * @property string $GroupID
 * @property string $GroupName
 * @property string $GroupType
 */
class People extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblPeople';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PersonnelNumber, EMailAddress, GroupID', 'required'),
			array('PersonnelNumber', 'length', 'max'=>20),
			array('FirstName, LastName, Title, Phone, Fax, Address1, Address2, City, State, Country, NetworkID, GroupID, GroupName, GroupType', 'length', 'max'=>50),
			array('MiddleInitial, ZipCode', 'length', 'max'=>10),
			array('EMailAddress', 'length', 'max'=>75),
            array('GroupID, GroupName', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('PersonnelNumber, FirstName, LastName, Title, MiddleInitial, EMailAddress, Phone, Fax, Address1, Address2, City, State, ZipCode, Country, NetworkID, GroupID, GroupName, GroupType', 'safe', 'on'=>'search'),
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
			'PersonnelNumber' => 'Personnel Number',
			'FirstName' => 'First Name',
			'LastName' => 'Last Name',
			'Title' => 'Title',
			'MiddleInitial' => 'Middle Initial',
			'EMailAddress' => 'Email Address',
			'Phone' => 'Phone',
			'Fax' => 'Fax',
			'Address1' => 'Address1',
			'Address2' => 'Address2',
			'City' => 'City',
			'State' => 'State',
			'ZipCode' => 'Zip Code',
			'Country' => 'Country',
			'NetworkID' => 'Network',
			'GroupID' => 'Group',
			'GroupName' => 'Group Name',
			'GroupType' => 'Group Type',
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

		$criteria->compare('PersonnelNumber',$this->PersonnelNumber,true);
		$criteria->compare('FirstName',$this->FirstName,true);
		$criteria->compare('LastName',$this->LastName,true);
		$criteria->compare('Title',$this->Title,true);
		$criteria->compare('MiddleInitial',$this->MiddleInitial,true);
		$criteria->compare('EMailAddress',$this->EMailAddress,true);
		$criteria->compare('Phone',$this->Phone,true);
		$criteria->compare('Fax',$this->Fax,true);
		$criteria->compare('Address1',$this->Address1,true);
		$criteria->compare('Address2',$this->Address2,true);
		$criteria->compare('City',$this->City,true);
		$criteria->compare('State',$this->State,true);
		$criteria->compare('ZipCode',$this->ZipCode,true);
		$criteria->compare('Country',$this->Country,true);
		$criteria->compare('NetworkID',$this->NetworkID,true);
		$criteria->compare('GroupID',$this->GroupID,true);
		$criteria->compare('GroupName',$this->GroupName,true);
		$criteria->compare('GroupType',$this->GroupType,true);

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
	 * @return People the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public static function getAllGroups(){
        $criteria = new CDbCriteria;
        $criteria->distinct = true;
        $criteria->select = array('GroupName', 'GroupID');
        $criteria->order = 'GroupName';
        $results = self::model()->findAll($criteria);
        return CHtml::listData($results, 'GroupID', 'GroupName');
        /*foreach($results as $result){
            $data[] = $result->GroupName;
        }
        return $data;*/

    }
}
