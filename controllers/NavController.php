<?php
/**
 * Created by PhpStorm.
 * User: jkosh
 * Date: 13.06.2017
 * Time: 23:07
 */

namespace app\controllers;

use app\models\Appointment;
use app\models\ArticleEn;
use app\models\Category;
use app\models\Trip;
use yii\web\HttpException;

use Yii;

class NavController extends AppController{

    public function actionIndex(){
//        $url = 'index';
        $statement = ArticleEn::find()->where(['category_id' => 14])->one();
        $categories = Category::find()->all();
        $articles = ArticleEn::find()->all();
        $this->setMeta('DanEriYachts', $statement->keywords, $statement->description);
        return $this->render('index',
            [
                'categories' => $categories,
                'articles' => $articles,
                'statement' =>$statement
            ]
        );
    }

    public function actionTrips(){
//        $url = 'index';
//        $model = Category::find()->where(['url' => $url])->one();
        $statement = ArticleEn::find()->where(['category_id' => 14])->one();
        $categories = Category::find()->where(['type' => Category::PLACE])->all();
        $i=0;
        $art_array=array();
            foreach ($categories as $category){
                $art = ArticleEn::find()->where(['category_id' => $category->id])->asArray()->one();
                $art_array[$category->id]=$art;
            }
        $this->setMeta(Yii::t('app', 'Trips').' | DanEriYachts', $statement->keywords, $statement->description);
        return $this->render('trips',
            [
                'categories' => $categories,
                'art_array' => $art_array,
                'statement' =>$statement
            ]
        );
    }


    public function actionTripView($id){

//        $pic_id =  Yii::$app->request->get('pic_id');

        $category = Category::find()->where(['id' => $id])->one();
        $article = ArticleEn::find()->where(['category_id' => $id])->one();

        $offers = Category::find()->where(['type' => Category::OFFERS])->all();
        $offer_articles = array();
        foreach($offers as $offer){
            $offer_articles[$offer->id] = ArticleEn::find()->where(['category_id' => $offer->id])->asArray()->one();
        }

        $events = [];
        $bookings = Trip::find()->where(['category_id' => $id])->all();
        foreach($bookings as $booking)
        {
            $event        = new \yii2fullcalendar\models\Event();
            $event->id    = $booking->id;
            $event->title = Yii::t('app', 'Trip to').' '.$article->title.'. ('.$booking->place.'/10)';
            $event->start = $booking->start;
            $event->end = $booking->end;
            if($booking->place<10)
                $event->url = \yii\helpers\Url::to(['new-booking', 'id' => $booking->id]);
            if($booking->place==0)
                $event->color = 'green';
            if($booking->place>0 AND $booking->place<=5)
                $event->color = '#ffa300';
            if($booking->place>5 AND $booking->place<10)
                $event->color = '#d86064';
            if($booking->place==10)
                $event->color = 'red';
            //        $event->description = 'This is a cool event';
            $events[]     = $event;
        }

            $this->setMeta($article->title.' | DanEriYachts', $article->keywords, $article->description);
            return $this->render('trip-view',
                [
                    'category' => $category,
                    'article' => $article,
                    'offers' => $offers,
                    'offer_articles' => $offer_articles,
                    'events' => $events
                ]
            );
    }

    public function actionOfferView($id){

//        $pic_id =  Yii::$app->request->get('pic_id');

        $category = Category::find()->where(['id' => $id])->one();
        $article = ArticleEn::find()->where(['category_id' => $id])->one();

        $trips = Category::find()->where(['type' => Category::PLACE])->all();
        $trip_articles = array();
        foreach($trips as $trip){
            $trip_articles[$trip->id] = ArticleEn::find()->where(['category_id' => $trip->id])->asArray()->one();
        }



        $this->setMeta($article->title.' | DanEriYachts', $article->keywords, $article->description);
        return $this->render('offer-view',
            [
                'category' => $category,
                'article' => $article,
                'trips' => $trips,
                'trip_articles' => $trip_articles
            ]
        );
    }


    public function actionOffers(){
//        $url = 'index';
//        $model = Category::find()->where(['url' => $url])->one();
        $statement = ArticleEn::find()->where(['category_id' => 14])->one();
        $categories = Category::find()->where(['type' => Category::OFFERS])->all();
        $i=0;
        $art_array=array();
        foreach ($categories as $category){
            $art = ArticleEn::find()->where(['category_id' => $category->id])->asArray()->one();
            $art_array[$category->id]=$art;
        }
        $this->setMeta(Yii::t('app', 'Our offer').' | DanEriYachts', $statement->keywords, $statement->description);
        return $this->render('offers',
            [
                'categories' => $categories,
                'art_array' => $art_array,
                'statement' =>$statement
            ]
        );
    }

    public function actionBooking(){

        $statement = ArticleEn::find()->where(['category_id' => 15])->one();
        $items = array();
        $categories = Category::find()->where(['type' => Category::PLACE])->all();
        foreach ($categories as $category){
            $article = ArticleEn::find()->where(['category_id' => $category->id])->select(['category_id', 'title'])->asArray()->one();
            $items[$category->id] = $article;
        }

        $events = [];
        $bookings = Trip::find()->all();
        foreach($bookings as $booking)
        {
            $event        = new \yii2fullcalendar\models\Event();
            $event->id    = $booking->id;
            $event->title = Yii::t('app', 'Trip to').' '.$items[$booking->category_id]['title'].'. ('.$booking->place.'/10)';
            $event->start = $booking->start;
            $event->end = $booking->end;

            if($booking->place<10 AND $event->start > date("Y-m-d H:i:s"))
                $event->url = \yii\helpers\Url::to(['new-booking', 'id' => $booking->id]);
            if($booking->place==0)
                $event->color = 'green';
            if($booking->place>0 AND $booking->place<=5)
                $event->color = '#ffa300';
            if($booking->place>5 AND $booking->place<10)
                $event->color = '#d86064';
            if($booking->place==10)
                $event->color = 'red';
    //        $event->description = 'This is a cool event';
            $events[]     = $event;
        }
        $this->setMeta(Yii::t('app', 'Booking').' | DanEriYachts', $statement->keywords, $statement->description);
        return $this->render('booking', [
            'events' => $events,
            'statement' =>$statement
        ]);
    }

    public function actionNewBooking($id){

        $trip = Trip::find()->where(['id' => $id])->one();
        $category = ArticleEn::find()->where(['category_id' => $trip->category_id])->one();
        if($trip->place < \app\models\Trip::MAX_COUNT  AND $trip->start > date("Y-m-d H:i:s")){

            $appointment = new Appointment();

            if ($appointment->load(Yii::$app->request->post())) {

                if(($appointment->count + $trip->place) <= Trip::MAX_COUNT){
                    $appointment->trip_id = $trip->id;
                    $trip->place+=$appointment->count;
                    $appointment->save();
                    $trip->save();

                    Yii::$app->mailer->compose('new-booking', ['appointment' => $appointment, 'trip' => $trip, 'category' => $category])
                        ->setFrom(['info@daneriyachts.com' => 'DanEriYachts'])
                        ->setTo('info@grsales.gr')
                        ->setSubject('Новая запись')
                        ->send();

                    Yii::$app->session->setFlash('success', Yii::t('app', 'You have successfully signed up to trip on').' '.$category->title.' '.Yii::$app->formatter->asDatetime($trip->start), false);

                    return $this->redirect(['booking']);
                }else{
                    Yii::$app->session->setFlash('danger', Yii::t('app', 'Number of seats exceeded.'));
                }
            }

            $this->setMeta(Yii::t('app', 'Reservation').' | DanEriYachts');
            return $this->render('new-booking', [
                'appointment' => $appointment,
                'trip' => $trip,
                'category' => $category
            ]);
        }else{
            Yii::$app->session->setFlash('danger', $category->title.' '.Yii::t('app', 'on').' '.Yii::$app->formatter->asDatetime($trip->start).' '.Yii::t('app', 'trip reservation is closed.'));
            return $this->redirect(['booking']);
        }

    }

    public function actionContacts(){

        $statement = ArticleEn::find()->where(['category_id' => 16])->one();
        $this->setMeta(Yii::t('app', 'Contacts').' | DanEriYachts', $statement->keywords, $statement->description);
        return $this->render('contacts', [
            'statement' =>$statement
        ]);
    }

}