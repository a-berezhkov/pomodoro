<?php
/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 24.03.2018
 * Time: 12:46
 */

namespace app\front\models;


class Api
{
    /**
     * Функция получает строку запроса $q и возвращает список мест из Google API
     * @param $q string
     * @link https://developers.google.com/places/web-service/autocomplete?hl=ru
     * @return array
     */
    public static function getPlacesByGoogleMap($q)
    {
        $API_KEY  = \Yii::$app->params['API_GOOGLE_MAP_KEY'];
        $url      = 'https://maps.googleapis.com/maps/api/place/autocomplete/json?input=' . $q . '&language=ru&&key=' . $API_KEY;
        $response = file_get_contents($url);
        $obj      = json_decode($response);
        foreach ($obj->predictions as $ob) {

            $direction[] = ['id' => $ob->place_id, 'text' => $ob->description];

        }
        $direction['results'] = $direction; //массив для dropdown
        $direction['all']     = $obj; // весь массив

        return $direction;
    }
}