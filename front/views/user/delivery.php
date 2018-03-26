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

$script = <<< JS
  $('.button__profile').click(function(){
        $.ajax({
        type: "POST",
        url: "/web/front/api/get-profile"
    }).done(function (data) {
        if (data !== false) {
         $('#google_id').hide();
//            $("#google_id").select2("val", data.address);
          $("#google_id").select2("trigger", "select", {
         data: { id: "5", name: 'dfsdfsdsdf  '}
});
            
            
           $("#address-street:hidden").show();
           $("#address-street").show();
         
         
            $('#orders-address_phone').val(data.phone);
            console.log(data);
            
        } else {
            $('#cart-stores').html('В коризне пока пусто =(. Но здесь могла бы быть ваша реклама');
        }

    }).fail(function (jqXHR, textStatus) {
            console.log('Не удалось получить информацию о корзине от сервера =(')
    });
  } );
JS;

$this->registerJs($script, yii\web\View::POS_READY);
?>

<div class="delivery-form">
    <div class="row">
        <div class="col-md-3">
            <?= $this->render('_menu') ?>
        </div>
        <div class="col-md-9">
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
                    <?= Html::a('Вставить из профиля', '#', ['class' => 'delivery-form button__profile']) ?>
                </div>
            </div>
            <? $form = ActiveForm::begin([
                'action' => Url::toRoute('/front/orders/create'),
                'method' => 'post'
            ]) ?>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'address_street')->hiddenInput(['id' => 'address-street'])->label(false) ?>
                    <?= $form->field($model, 'google_id')->widget(Select2::classname(), [
                        // 'initValueText' => $someDesc, // set the initial display text
                        'options' => [
                            'id' => 'google_id',
                        ],
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
                    ])->label('Address '); ?>
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
                    <?= $form->field($model, 'address_phone')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'delivery_date')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'delivery_interval')->dropDownList(['8-13' => '8-13', '14-19' => '14-19']) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'comment')->textarea() ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                </div>


                <? ActiveForm::end() ?>

                <?= Html::submitButton(Yii::t('app', 'Next'), ['class' => 'delivery-form__button']) ?>
            </div>


        </div>
    </div>

</div>