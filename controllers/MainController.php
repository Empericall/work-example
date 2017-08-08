<?php
/**
 * Created by PhpStorm.
 * User: Emperical
 */
namespace app\controllers;


use Yii;
use yii\web\Controller;
use app\models\Providers\RatingServiceProvider;

class MainController extends Controller
{
   
   /*.... Other controller actions ....*/

    public function actionRatings()
    {
        $model = RatingServiceProvider::boot();
        
        return $this->render('ratings', [
            'model' => $model,
        ]);
    }

    /*.... Other controller actions ....*/

}
