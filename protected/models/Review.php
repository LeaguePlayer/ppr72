<?php

class Review extends CActiveRecord
{
    const PUB = 1;
    const NO_PUB = 0;

    public static  $statusLabel = array(
        "Не опубликовано",
        "Опубликовано"
    );

    public static function getStatusLabel($id = null){
        if($id != null){
            return self::$statusLabel[$id];
        }
        return self::$statusLabel;
    }

	public function tableName()
	{
		return 'reviews';
	}

	public function rules()
	{
		return array(
			array('name, date, text, status', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('name, img', 'length', 'max'=>255),
			array('id, name, img, date, text, status', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'img' => 'Картинка',
			'name' => 'Имя',
			'date' => 'Дата',
			'text' => 'Текст',
			'status' => 'Статус',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
