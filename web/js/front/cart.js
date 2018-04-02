/**
 *
 */
showItems(); //показываем товары из localStorage

window.onload = function () {
     deleteItem();

    $(".count_box").change(function () {
        var class_count_box = $(this);
        updateItem(class_count_box);



        var item = $(this).attr('data-item');
        var local_item = JSON.parse(localStorage.getItem(item));

         local_item.count_box = $(this).val();

        localStorage.setItem(item,JSON.stringify(local_item));

    });
};

/**
 * Функция автоматически обновляет суммарные показатели расчетов
 *
 */
function updateItem(class_count_box) {

    var parentRow = class_count_box.closest(".row");
    var countInputVal = parseInt(parentRow.find(".count_box").val());
    //Рачитаваем суммарный вес
    var boxWeight = parseInt(parentRow.find(".box_weight").text());
    var totalWeightByItem = countInputVal * boxWeight;
    parentRow.find(".item-total-weight").text(totalWeightByItem);
    //Расчет суммарной стоимости
    var ItemPrice = parseInt(parentRow.find("#price").text());
    var totalPriceByItem = countInputVal * ItemPrice;
    parentRow.find(".total-price").text(totalPriceByItem);


    updateTotals($(".total-price"),$("#discount-total-price"),'text');
    updateTotals($(".count_box"),$("#discount-count-box"),'val');
    updateTotals($(".item-total-weight"),$("#discount-weight"),'text');

}

/**
 *
 * @param element element form
 * @param selector element to
 */

function updateTotals(element,selector,type) {
    var total = 0;
    if (type === 'text'){
        element.each(function() {
            total += parseInt( $(this).text());
        });
        selector.text(total);
    } else if (type === 'val') {
        element.each(function() {
            total += parseInt( $(this).val());
        });
        selector.text(total);
    }


}
/**
 *  Функция обновляет количество товаров в коризине
 *  И перечнь товаров, после чего снова вешает событие "удалить"
 */


function refreshData() {
    setBadgeBasket();
    var hot = document.getElementById('hot');
    hot.innerHTML = '';
    var ordinary = document.getElementById('ordinary');
    ordinary.innerHTML = '';
     showItems();
     deleteItem();
}

/**
 * Функция удаляет элемент из корзины и localStorage
 */
function deleteItem() {
    $( ".fa-trash" ).click(function() {



        var item = $(this).attr('data-item');
         if (confirm("Вы действительно хотите это сделать?")){
              localStorage.removeItem(item);
             $(this).parent().parent().hide("slow",function() {
                 refreshData();
             });
         }
    });
};

/**
 * Отображение товаров
 */
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
                discountCountBox = (discountCountBox + parseInt(item.count_box));
                discountWeight = discountWeight + (item.item_box_weight * item.count_box);
                discountTotalPrice = discountTotalPrice + (item.item_discount_box_price *item.count_box);
                // создание элемента для вставки
                hot_div.innerHTML =  hot_div.innerHTML +
                    '<div class="row">' +
                    '<div class="col-md-1"><i class="fa fa-trash" data-item="'+item_name+'" aria-hidden="true"></i></div>' +
                    '<div class="col-md-2"><img src="' + item.item_image_link + '"' +
                    '  width="100" height="70" alt=""></a></div>' +
                    '<div class="col-md-2">' + item.item_name + '</div>' +
                    '<div class="col-md-1">' +
                    '<input class="count_box" data-item="'+item_name+'" type="number" name="count_box" value="'+item.count_box+'" min="1" max="100"' +
                    '                                   step="1"></div>' +
                    '<div class="col-md-1 box_weight">' + item.item_box_weight     + '</div>' +
                    '<div class="col-md-1 item-total-weight">' + (item.item_box_weight * item.count_box)    + '</div>' +
                    '<div class="col-md-2" id="price">'  + item.item_discount_box_price + '</div>' +
                    '<div class="col-md-2 total-price"  > ' + (item.item_discount_box_price * item.count_box)  + '</div>' +
                    '</div><hr>';
            }
        }
    }

    hot_div.innerHTML =  hot_div.innerHTML +
        '<div>Промежуточнный итог: <div id="discount-total-price">' + discountTotalPrice + '</div></div>' +
        '<div>Количество упаковок: <div id="discount-count-box">'+ discountCountBox +'</div></div>' +
        '<div>Общий вес (нетто): <div id="discount-weight">'+ discountWeight +' </div>';
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
        '<div id="ordinary-total-price">Промежуточнный итог: ' + ordinaryTotalPrice + '</div>' +
        '<div id="ordinary-count-box">Количество упаковок: '+ ordinaryCountBox +'</div>' +
        '<div id="ordinary-weight">Общий вес (нетто): '+ ordinaryWeight +' </div>';
    ordinary.appendChild(ordinary_div);
    //==================================END Ordinary Items ===========================================//
    var total = document.getElementById('total');
    total.innerHTML =
        '<div id="total-price">Итог: ' + (ordinaryTotalPrice+discountTotalPrice) + '</div>' +
        '<div id="total-count">Количество упаковок: '+ (ordinaryCountBox+discountCountBox) +'</div>' +
        '<div id="total-weight">Общий вес (нетто): '+ (ordinaryWeight+discountWeight) +' </div>';
    // todo plus items by values
}
