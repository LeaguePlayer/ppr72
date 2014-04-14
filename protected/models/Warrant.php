<?php

/**
 * This is the model class for table "warrant".
 *
 * The followings are the available columns in table 'warrant':
 * @property string $id
 * @property string $img
 * @property string $short_desc
 */
class Warrant extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Warrant the static model class
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
		return 'warrant';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('img', 'required'),
			array('img, short_desc', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, img, short_desc', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'img' => 'Изображение',
			'short_desc' => 'Описание (будет сноска)',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('short_desc',$this->short_desc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}