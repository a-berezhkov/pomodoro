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
   $( "#shopping-basket" ).click(function() {
         $.ajax({
        type: "POST",
        url: "/web/front/cart/cart",

         }) .done(function( data ) {
              $( '#cart-stores' ).html(data);
        }).fail(function( jqXHR, textStatus ) {
             alert( "Request failed: " + textStatus );
        });
    });
   
    $( "button" ).click(function() {
             
         $.ajax({
        type: "POST",
        url: "/web/front/cart/add",
        data: {
            id: $(this).attr('item-id'),
            item_name : $(this).attr('item-name'),
            item_box_price : $(this).attr('item-box_price'),
            item_box_weight : $(this).attr('item-box_weight'),
            item_discount_box_price : $(this).attr('item-discount_box_price'),
            item_image_link : $(this).attr('item-image_link'),

        }
         }) .done(function( data ) {
                    setBadgeBasket(data);
        }).fail(function( jqXHR, textStatus ) {
             alert( "Request failed: " + textStatus );
        });
    });
    
    /*
        Функция отображает значок рядом с корзиной и количесвто товара
        @var data массив данных из сессии
        @var data.store товары 
        @example json data  
         "store":{  
                 "1":{  
                        "data":{  
                                 "id":"1",
                                 "item_name":"1",
                                 "item_box_price":"7640.00",
                                 "item_box_weight":"20",
                                 "item_discount_box_price":"6940"
                                 "item_image_link":"/web/assets/images/fc/fc3297_store--.png"
                                },
                         "count":2  // количество товаров
                        },
                 "2":{ ... }
                    }
                }
     */
    function setBadgeBasket(data){
          
        /*
            преобразование объекта в массив (необходимо для получения количества элементов)
         */
          var array = $.map(data.store, function(value, index) {
                return [value];
            });  
        
         var badge = $('span').is( '#basket-badge' );
         
         /*
            если значок badge уже существует на странице,
            добалвяем купленный отличающийся товар
            Иначе добавлем элемент badge 
          */
         if (badge){
             $( '#basket-badge' ).html(array.length);
         }
         else {
              $( "#shopping-basket a" ).append('<span id="basket-badge" class="label label-primary">'+array.length+'</span>');
         }
    }
    /*
        Функция получает все данные из сессии о товарах в корзине
        и тображает элемент badge
     */
    function initBadge(){
    $.ajax({
        type: "POST",
        url: "/web/front/cart/stores-by-session",
         })
         .done(function( data ) {
                setBadgeBasket(data);
        }).fail(function( jqXHR, textStatus ) {
             alert( "Request failed: " + textStatus );
        });
  
    }
    $(document).ready(function(){
    //Handles menu drop down
    $('.dropdown-menu').find('form').click(function (e) {
        e.stopPropagation();
    });
}); 
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
                        <?= Html::button('В коризину',
                            [
                                    'class' => 'btn button-busket',
                                    'item-id' => $suggest->id,
                                    'item-name' => $suggest->name,
                                    'item-box_price' => $suggest->box_price,
                                    'item-box_weight' => $suggest->box_weight,
                                    'item-discount_box_price' => $suggest->discount_box_price,
                                    'item-image_link' => \Yii::$app->imagemanager->getImagePath($suggest->logo_id, '440', '190', 'inset'),
                            ])
                        ?>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <?= $counterRow % $countPerRow == 0 ? '</div>' : null; ?>
<? endforeach; ?>
