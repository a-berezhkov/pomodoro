/**
 *
 */
showItems();
window.onload = function() {
    $( ".fa-trash" ).click(function() {
        var item = $(this).attr('data-item');
         if (confirm("Вы действительно хотите это сделать?")){
              localStorage.removeItem(item);
             $(this).parent().parent().hide("slow" );
             setBadgeBasket();
             // todo update count and total
         }

       // alert($(this).attr('data-item'));
    });
};
function showItems() {
    //начальные значения для расчета сумм показателей
    var discountCountBox = 0;
    var discountWeight = 0;
    var discountTotalPrice = 0;

    var ordinaryCountBox = 0;
    var ordinaryWeight = 0;
    var ordinaryTotalPrice = 0;
    // начало создания вставки
    //==================================HOT Items ===============================================//
    var hot = document.getElementById('hot');
    var hot_div = document.createElement('div');
    hot_div.className = "row";
    for (var item_name in localStorage) {
        item = JSON.parse(localStorage.getItem(item_name));
        console.log(item);
        if (item !== null ) {
            if (parseInt(item.is_sale) === 1){
                // Расчет показателей
                discountCountBox = discountCountBox + item.count_box;
                discountWeight = discountWeight + (item.item_box_weight * item.count_box);
                discountTotalPrice = discountTotalPrice + (item.item_discount_box_price *item.count_box);
                // создание элемента для вставки
                hot_div.innerHTML =  hot_div.innerHTML +
                    '<div class="row">' +
                    '<div class="col-md-1"><i class="fa fa-trash" data-item="'+item_name+'" aria-hidden="true"></i></div>' +
                    '<div class="col-md-2"><img src="' + item.item_image_link + '"' +
                    '  width="100" height="70" alt=""></a></div>' +
                    '<div class="col-md-3">' + item.item_name + '</div>' +
                    '<div class="col-md-2">' + item.count_box + '</div>' +
                    '<div class="col-md-2">' + item.item_box_weight + '</div>' +
                    '<div class="col-md-2"><s>'+item.item_box_price +'</s><br>' + item.item_discount_box_price + '</div>' +
                    '<hr></div>';
            }
        }
    }
    hot_div.innerHTML =  hot_div.innerHTML +
        '<div class="item-summa">Промежуточнный итог: ' + discountTotalPrice + '</div>' +
        '<div class="item-summa">Количество упаковок: '+ discountCountBox +'</div>' +
        '<div class="item-summa">Общий вес (нетто): '+ discountWeight +' </div>';
    hot.appendChild(hot_div);
    //==================================End HOT Items ===============================================//
    //==================================Ordinary Items ==============================================//
    var ordinary = document.getElementById('ordinary');
    var ordinary_div = document.createElement('div');
    ordinary_div.className = "row";
    for (var item_name in localStorage) {
        item = JSON.parse(localStorage.getItem(item_name));
        if (item !== null ) {
            if (parseInt(item.is_sale) === 0){
                // Расчет показателей
                ordinaryCountBox = ordinaryCountBox + item.count_box;
                ordinaryWeight = ordinaryWeight + (item.item_box_weight * item.count_box);
                ordinaryTotalPrice = ordinaryTotalPrice + (item.item_box_price *item.count_box);
                // создание элемента для вставки
                ordinary_div.innerHTML =  ordinary_div.innerHTML +
                    '<div class="row">' +
                    '<div class="col-md-1"><i class="fa fa-trash" data-item="'+item_name+'" aria-hidden="true"></i></div>' +
                    '<div class="col-md-2"><img src="' + item.item_image_link + '"' +
                    '  width="100" height="70" alt=""></a></div>' +
                    '<div class="col-md-3">' + item.item_name + '</div>' +
                    '<div class="col-md-2">' + item.count_box + '</div>' +
                    '<div class="col-md-2">' + item.item_box_weight + '</div>' +
                    '<div class="col-md-2">' + item.item_box_price + '</div>' +
                    '<hr></div>';
            }
        }
    }
    ordinary_div.innerHTML =  ordinary_div.innerHTML +
        '<div class="item-summa">Промежуточнный итог: ' + ordinaryTotalPrice + '</div>' +
        '<div class="item-summa">Количество упаковок: '+ ordinaryCountBox +'</div>' +
        '<div class="item-summa">Общий вес (нетто): '+ ordinaryWeight +' </div>';
    ordinary.appendChild(ordinary_div);
    //==================================END Ordinary Items ===========================================//
    var total = document.getElementById('total');
    total.innerHTML =
        '<div class="item-summa">Итог: ' + (ordinaryTotalPrice+discountTotalPrice) + '</div>' +
        '<div class="item-summa">Количество упаковок: '+ (ordinaryCountBox+discountCountBox) +'</div>' +
        '<div class="item-summa">Общий вес (нетто): '+ (ordinaryWeight+discountWeight) +' </div>';
    console.log("asdfdsf");
}
