<?php

namespace app\modules\admin\controllers;

use app\models\Appointment;
use app\models\Trip;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends AppAdminController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
//        debug(date('Y-m-d'));

        $ttrips = Trip::find()->where(['like', 'start', date('Y-m-d')])->orderBy(['start' => SORT_ASC])->all();
        $appointments = [];
        foreach ($ttrips as $ttrip){
            $items = Appointment::find()->where(['trip_id' => $ttrip->id])->all();
            foreach ($items as $item)
                $appointments[]=$item;
        }

//        debug($appointments);
//
//        debug($ttrips);
//
        return $this->render('index', [
            'ttrips' => $ttrips,
            'appointments' => $appointments
        ]);
    }
}
