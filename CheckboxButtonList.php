<?php

/**
 * @link http://yii2.percipero.com/
 * @copyright Copyright (c) 2008 Percipero
 * @license 
 */
 
namespace common\components;

use yii\base\Widget;
use yii\helpers\Html;

class CheckboxButtonList extends Widget{

	public $name, $selection = null, $items = [], $options = [];

	public function init()
	{
		$this->getView()->registerCss("
			.ck-button {
				margin:4px;
				background-color:#EFEFEF;
				border-radius:4px;
				border:1px solid #D0D0D0;
				overflow:auto;
				float:left;
				height: 2em;
			}
			
			.ck-button:hover {
				margin:4px;
				background-color:#EFEFEF;
				border-radius:4px;
				border:1px solid #008d4c;
				overflow:auto;
				float:left;
				color:#008d4c;
			}
			
			.ck-button label {
				float:left;
				width:4.0em;
			}
			
			.ck-button label span {
				text-align:center;
				padding:3px 0px;
				display:block;
			}
			
			.ck-button label input {
				position:absolute;
				top:-160px;
			}
			
			.ck-button input:checked + span {
				background-color:#00a65a;
				color:#fff;
			}
		");
        parent::init();

    }

    public function run(){
        return Html::checkboxList($this->name,$this->selection, $this->items, ['item'=>function ($index, $label, $name, $checked, $value){
	 			return Html::tag('div', 
	 					Html::label(
	 							Html::checkbox($name, $checked,['value'=>$value]).
	 							Html::tag('span', substr($label,0,1))
	 							)
	 					,
	 					['class'=>'ck-button']
	 					);
	 	}]);
    }
}
    
