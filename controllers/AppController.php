<?php
/**
 * Created by PhpStorm.
 * User: jkosh
 * Date: 27.04.2017
 * Time: 15:45
 */

namespace app\controllers;
use yii\web\Controller;


class AppController extends Controller
{
    protected function setMeta($title = null, $keywords = null, $description = null){
        $this->view->title = $title;
        $this->view ->registerMetaTag(['name'=>'keywords','content'=>"$keywords"]);
        $this->view ->registerMetaTag(['name'=>'description','content'=>"$description"]);
    }


}