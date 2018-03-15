<?php
/**
 * @var $suggests \app\front\models\Store
 * @var $suggest \app\front\models\Store
 */

use yii\helpers\Html;

$counterRow = 0;  //Счетчик для строк
$countPerRow = 4; //Количество колонок в одной строке

$script = <<< JS
    initBadge();
 
    $( "button" ).click(function() {
        console.log($(this).attr('item-id'));
            var item_id = $(this).attr('item-id');
         $.ajax({
        type: "POST",
        url: "/web/front/cart/add",
        data: {
            id: item_id
        }
         }) .done(function( data ) {
                     setBadgeBasket(data);
        }).fail(function( jqXHR, textStatus ) {
             alert( "Request failed: " + textStatus );
        });
    });
 
    function setBadgeBasket(data){
       
          var array = $.map(data.store, function(value, index) {
                return [value];
            });  
        
         var badge = $('span').is( '#basket-badge' );
         // Если элемент уже существует 
         if (badge){
             console.log('Element #basket-badge is found');
             console.log('count setBadgeBasket = '+array.length);
             $( '#basket-badge' ).html(array.length);
         } 
         else 
         {
                console.log('Element #basket-badge is not found');
              $( "#shopping-basket a" ).append('<span id="basket-badge" class="label label-primary">'+array.length+'</span>');
                 console.log('Element #basket-badge is created');
         }
    }
    
    function initBadge(){
         $.ajax({
        type: "POST",
        url: "/web/front/cart/stores-by-session",
         }) .done(function( data ) {
                setBadgeBasket(data);
        }).fail(function( jqXHR, textStatus ) {
             alert( "Request failed: " + textStatus );
        });
  
    }
JS;

$this->registerJs($script, yii\web\View::POS_READY)
?>

<? foreach ($suggests as $suggest) : ?>
    <?= $counterRow % $countPerRow == 0 ? '<div class="row">' : null; ?>
    <? $counterRow++; ?>
    <div class="col-md-3">
        <div class="suggest">
            <div class="picture text-center">
                <?= Html::img(\Yii::$app->imagemanager->getImagePath($suggest->logo_id, '440', '190', 'inset')); ?>
            </div>
            <div class="name text-center">
                <?= $suggest->name ?>
            </div>
            <div class="details">
                <div class="row current-suggestion">
                    <div class="col-md-6">
                        <div class="old-price text-center">
                            <s><?= $suggest->box_price ?></s>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="meta">
                            <?= $suggest->box_weight ?> КГ
                        </div>
                    </div>

                </div>
                <div class="row new-suggestion">
                    <div class="col-md-6 special-col text-right">
                        <div class="new-price text-center">
                            <div class="price"><?= $suggest->discount_box_price ?> ₽</div>
                        </div>
                    </div>
                    <div class="col-md-6 special-col">
                        <?= Html::button('В коризину', ['class' => 'btn button-busket', 'item-id' => $suggest->id]) ?>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <?= $counterRow % $countPerRow == 0 ? '</div>' : null; ?>
<? endforeach; ?>
