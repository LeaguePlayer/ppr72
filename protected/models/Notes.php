<?php

/**
 * This is the model class for table "notes".
 *
 * The followings are the available columns in table 'notes':
 * @property string $id
 * @property string $name
 * @property string $short_desc
 * @property string $full_desc
 * @property string $meta_title
 * @property string $meta_keys
 * @property string $meta_desc
 */
class Notes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Notes the static model class
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
		return 'notes';
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
			array('name, meta_title', 'length', 'max'=>255),
            array('short_desc, full_desc, meta_keys, meta_desc', 'length', 'max'=>10000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, short_desc, full_desc, meta_title, meta_keys, meta_desc', 'safe', 'on'=>'search'),
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
			'name' => 'Заголовок',
			'short_desc' => 'Краткое описание',
			'full_desc' => 'Полное описание',
			'meta_title' => 'META_Заголовок',
			'meta_keys' => 'META_Ключевые_слова',
			'meta_desc' => 'META_Описание',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('short_desc',$this->short_desc,true);
		$criteria->compare('full_desc',$this->full_desc,true);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_keys',$this->meta_keys,true);
		$criteria->compare('meta_desc',$this->meta_desc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}