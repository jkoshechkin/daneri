<?php
/**
 * Created by PhpStorm.
 * User: jkosh
 * Date: 26.11.2017
 * Time: 21:21
 */

namespace app\modules\admin\components;

//use app\models\Request;
//use app\modules\user\models\Zayavka;
use yii\base\Widget;
use Yii;

class AdminPanelWidget extends Widget{

    public $tpl_admin;
//    public $user;
    public $userHtml;

    public function init()
    {
        parent::init();
        if ($this->tpl_admin === null){
            $this->tpl_admin='admin-panel';
        }
        $this->tpl_admin.= '.php';
    }

    public function run(){
        //get cache
//        $news = Yii::$app->cache->get('news');
//        if($news) return $news;

//        if (Yii::$app->user->identity->type_id==1)
//            $this->user = Fizlico::find()->where(['log_id' => Yii::$app->user->identity->id])->one();
//        if (Yii::$app->user->identity->type_id==2)
//            $this->user = Indpr::find()->where(['log_id' => Yii::$app->user->identity->id])->one();
//        if (Yii::$app->user->identity->type_id==3)
//            $this->user = Urlico::find()->where(['log_id' => Yii::$app->user->identity->id])->one();

        $this->userHtml = $this->getAdminPanelHtml();
        //set cache
//        Yii::$app->cache->set('news', $this->newsHtml, 3600);
        return $this->userHtml;
    }

    protected  function getAdminPanelHtml(){
//        $request_count=Request::find()->where(['adm_saw' => '1'])->count();
//        $zayavka_count=Zayavka::find()->where(['adm_new' => '1'])->count();
//        debug($request_count);
        $str = $this->catToTemplate();

        return $str;
    }

    protected function catToTemplate(){
//        debug($item);
        ob_start();
        include __DIR__.'/admin_tpl/'.$this->tpl_admin;
        return ob_get_clean();
    }
}