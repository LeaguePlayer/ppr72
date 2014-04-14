<?php

/**
 * This is the model class for table "services".
 *
 * The followings are the available columns in table 'services':
 * @property string $id
 * @property integer $id_category
 * @property string $title
 * @property string $short_desc
 * @property string $full_desc
 * @property string $img
 * @property string $meta_title
 * @property string $meta_keys
 * @property string $meta_desc
 * @property string $last_update
 */
class Services extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Services the static model class
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
		return 'services';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_category, title', 'required'),
			array('id_category, presence', 'numerical', 'integerOnly'=>true),
			array('title, img,cost, meta_title, last_update', 'length', 'max'=>255),
            array('meta_keys, meta_desc, short_desc, full_desc', 'length', 'max'=>5000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_category, presence,cost, title, short_desc, full_desc, img, meta_title, meta_keys, meta_desc, last_update', 'safe', 'on'=>'search'),
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
            'cnt'=>array(self::STAT, 'Services', 'id_category'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_category' => 'Раздел',
			'title' => 'Название',
			'short_desc' => 'Краткое описание',
			'full_desc' => 'Полное описание',
			'img' => 'Изображение',
			'meta_title' => 'META_Заголовок',
			'meta_keys' => 'META_Ключевые_слова',
			'meta_desc' => 'META_Описание',
			'last_update' => 'Последнее обновление',
            'presence' => 'В наличии?',
			'cost' => 'Стоимость услуги от',
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
		$criteria->compare('id_category',$this->id_category);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('short_desc',$this->short_desc,true);
		$criteria->compare('full_desc',$this->full_desc,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_keys',$this->meta_keys,true);
		$criteria->compare('meta_desc',$this->meta_desc,true);
		$criteria->compare('last_update',$this->last_update,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    
    protected function beforeSave()
    {
        $this->last_update = date('Y-m-d');        
        return true;
    }
}