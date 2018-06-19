<?php
/**
 * Created by PhpStorm.
 * User: yuri
 * Date: 19.06.18
 * Time: 10:04
 */

namespace app\commands;


use app\components\SearchFlight;
use yii\console\Controller;
use yii\console\ExitCode;

class SearchFlightController extends Controller
{
    public function actionSearchAndSave()
    {
        $searchFlight = new SearchFlight();
        echo print_r($searchFlight->sendAndSave(), true);

        return ExitCode::OK;
    }
}