<?php

namespace app\models;
 
use yii\base\Model;
 
 
class Form extends Model
{
	public $type;
	public $text;

	public function rules()
	{
		return [
			//['type' => 'required'],
			[['type', 'text'], 'required', 'message' => 'Поле обязательно'],
		];
	}
}