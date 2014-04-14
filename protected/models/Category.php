<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property string $id
 * @property integer $id_type
 * @property integer $name
 * @property string $meta_title
 * @property string $meta_keys
 * @property string $meta_html
 * @property string $meta_desc
 * @property string $last_update
 */
class Category extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Category the static model class
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
		return 'category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_type, name', 'required'),
			array('id_type', 'numerical', 'integerOnly'=>true),
			array('meta_title, last_update, name', 'length', 'max'=>255),
            array('meta_keys, meta_html, meta_desc', 'length', 'max'=>5000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_type, name, meta_title, meta_keys, meta_html, meta_desc, last_update', 'safe', 'on'=>'search'),
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
			'id_type' => 'Отновится к разделу',
			'name' => 'Название подраздела',			
			'meta_html' => 'META_Текст',
			'meta_title' => 'META_Заголовок',
			'meta_keys' => 'META_Ключевые_слова',
			'meta_desc' => 'META_Описание',
			'last_update' => 'Последнее обновление',
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
		$criteria->compare('id_type',$this->id_type);
		$criteria->compare('name',$this->name);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_keys',$this->meta_keys,true);
		$criteria->compare('meta_html',$this->meta_html,true);
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
    
    public static function getCollection()
    {
        $data_obj = self::model()->findAll();
        foreach ($data_obj as $data)
        {
            $solution = fnc::getCategoryService($data->id_type);
            $result[$solution][$data->id] = $data->name;
        }
        return $result;
    }
}