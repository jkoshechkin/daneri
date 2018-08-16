<?php

namespace app\modules\languages\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;


class ListWidget extends Widget{

    public $tpl_lang;
    public $array_languages;

    public function init() {
        $language = Yii::$app->language; //текущий язык

        if ($this->tpl_lang === null){
            $this->tpl_lang='list';
        }

        //Создаем массив ссылок всех языков с соответствующими GET параметрами
        $array_lang = [];
        if($this->tpl_lang=='list')
            foreach (Yii::$app->getModule('languages')->languages as $key => $value){
                $array_lang += [$value => Html::a($key, ['languages/default/index', 'lang' => $value])];
            }
        else
            foreach (Yii::$app->getModule('languages')->languages as $key => $value){
                $array_lang += [$value => Html::a($key, ['languages/default/index', 'lang' => $value], ['class' => "dropdown-item"])];
            }
        //ссылку на текущий язык не выводим
        if(isset($array_lang[$language])) unset($array_lang[$language]);
        $this->array_languages = $array_lang;
    }

    public function run() {
        if($this->tpl_lang=='list')
            return $this->render('list',[
                'array_lang' => $this->array_languages
            ]);
        else
            return $this->render('but-list',[
                'array_lang' => $this->array_languages
            ]);
    }

}