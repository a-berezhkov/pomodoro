<?php
/**
 * Created by PhpStorm.
 * User: Ziablik
 * Date: 12.04.2018
 * Time: 19:28
 */

namespace app\admin\models;


use yii\base\Model;

class DateForm extends Model
{
    public $doDate;
    public $toDate;

    public function rules()
    {
        return [
            [['doDate', 'toDate'], 'required'],
            [['doDate', 'toDate'], 'safe'],
            [['doDate', 'toDate'], 'datetime'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'doDate' => \Yii::t('app', 'Do Date'),
            'toDate' => \Yii::t('app', 'To Date'),
        ];
    }
}