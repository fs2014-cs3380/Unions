<?php

/**
 * This is the model class for table "unions.user".
 *
 * The followings are the available columns in table 'unions.user':
 * @property integer $user_id
 * @property string $email_address
 * @property string $sso
 * @property string $personal_info
 * @property string $last_login
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property UserAuth $userAuth
 * @property Reservation[] $reservations
 * @property Item[] $unions.items
 */
class User extends UActiveRecord
{

    public $password;
    public $password_repeat;

    protected function afterSave()
    {
        if ($this->isNewRecord)
            $auth = new UserAuth();
        else
            $auth = $this->userAuth;

        $auth->user_id = $this->user_id;
        $auth->hashPassword($this->password);
        $auth->save();

        return parent::afterSave();
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'unions.user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('email_address', 'unique'),
            array('email_address', 'email'),
			array('email_address, password, password_repeat', 'required'),
			array('email_address', 'length', 'max'=>80),
            array('password', 'compare'),
			array('sso', 'length', 'max'=>30),
			array('personal_info, last_login, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, email_address, sso, personal_info, last_login, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'userAuth' => array(self::HAS_ONE, 'UserAuth', 'user_id'),
			'reservations' => array(self::HAS_MANY, 'Reservation', 'user_id'),
			'unions.items' => array(self::MANY_MANY, 'Item', 'item_claim(user_id, item_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'email_address' => 'Email Address',
			'sso' => 'Sso',
			'personal_info' => 'Personal Info',
			'last_login' => 'Last Login',
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

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('email_address',$this->email_address,true);
		$criteria->compare('sso',$this->sso,true);
		$criteria->compare('personal_info',$this->personal_info,true);
		$criteria->compare('last_login',$this->last_login,true);
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
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
