<?php
/**
 * @var $item \app\front\models\Store
 * @var$form yii\widgets\ActiveForm
 * @var $this yii\web\View
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use kartik\select2\Select2;
use yii\helpers\Url;

$this->title = Yii::t('user', 'Delivery');
$this->params['breadcrumbs'][] = $this->title;
$API_KEY = \Yii::$app->params['API_GOOGLE_MAP_KEY'];

$this->registerJsFile('/web/js/front/delivery.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

?>


<div class="page page-cart"> <!-- TODO change class page-cart to page-delivery ----->
    <div class="row">
        <div class="col-md-3">
            <?= $this->render('_menu') ?>
        </div>
        <div class="col-md-9">

            <div class="form bordered">

            <?= \app\widgets\Alert::widget() ?>
            <div class="row">
                <div class="col-md-12">
                    <?= $this->render('_top_menu', ['delivery' => 'active', 'cart' => 'active']) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <b>Адрес доставки</b>
                    <p>
                        (Доставка в пределах КАД осуществляется беслатно)
                    </p>
                </div>
                <div class="col-md-4">
                    <?= Html::a('Вставить из профиля', '#', ['class' => 'btn button', 'id' => 'paste-from-profile']) ?>
                </div>
            </div>
            <? $form = ActiveForm::begin([
                'action' => Url::toRoute('/front/orders/create'),
                'method' => 'post',

            ]) ?>
            <div id="dynamic-input-address">
                <div class="row">

                    <div class="col-md-4 .col-md-offset-4">
                        <?= Html::a('Заполнить адрес вручную', '#', ['class' => 'input-address']) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'google_id')->widget(Select2::classname(), [
                            //    'initValueText' => \yii\helpers\ArrayHelper::map(\app\front\models\user\Profile::find()->where(['user_id'=>1])->all(),'address','address'),
//                    'options'       => [
//                        'id'          => 'google_id',
//                    ],
                            'pluginEvents' => [
                                'select2:select' => "function() { 
                            $('#address-street').val($(this).text());
         
		            }",
                            ],
                            'pluginOptions' => [
                                'allowClear' => true,
                                'minimumInputLength' => 3,
                                'language' => [
                                    'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                                ],
                                'ajax' => [
                                    'url' => Url::to(['/front/api/get-address-by-google-maps']),
                                    'dataType' => 'json',
                                    'data' => new JsExpression('function(params) { return {q:params.term}; }'),
                                ],
                                'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                                'templateResult' => new JsExpression('function(direction) { return direction.text; }'),
                                'templateSelection' => new JsExpression('function (direction) { return direction.text; }'),
                            ],
                        ])->label(false); ?>
                    </div>
                </div>
            </div>
            <div id="static-input-address" style="display: none;">
                <div class="row">

                    <div class="col-md-4 .col-md-offset-4">
                        <?= Html::a('Заполнить вдрес автоматически', '#', ['class' => 'input-address']) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'address_street')->textInput() ?>


                    </div>
                    <div class="col-md-2">
                        <?= $form->field($model, 'address_house')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-2">
                        <?= $form->field($model, 'address_housing')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-2">
                        <?= $form->field($model, 'address_office')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'address_phone')->widget(yii\widgets\MaskedInput::class, [
                            'mask' => '+7 (999)-999-9999',
                        ]) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'delivery_date')->widget(\kartik\widgets\DatePicker::classname(), [
                        'type' => \kartik\widgets\DatePicker::TYPE_INLINE,

                        // 'value' => date("Y-m-d", strtotime('+2 days')),
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-d',
                            'todayHighlight' => true,

                        ],
                        'options' => [
                            // you can hide the input by setting the following
                            'class' => 'hide'
                        ]
                    ]); ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'delivery_interval')->radioList(['8-13' => '8-13', '14-19' => '14-19']) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'comment')->textarea() ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                </div>

                <?= Html::hiddenInput('cart-items', null, ['id' => 'cart']) ?>


                <?= Html::submitButton('Сохранить адрес доставки и продолжить', ['class' => 'btn btn-success']) ?>
            </div>

            <? ActiveForm::end() ?>
            </div>
        </div>
    </div>
</div>

