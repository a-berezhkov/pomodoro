/**
 *
 * Вызов методов и последовательность
 * 0. window.onload - вешаем события добавления/удаления на counter
 * 1. showItems() - отображение товров из localStorage
 * 2. если меняется количество товаров  updateItem()
 * 3. если товар удаляется - deleteItem()
 */
showItems(); //показываем товары из localStorage

/**
 * Метод вешает события обновления количества товаров
 * и их удаления на два id - #hot и #ordinary
 */
window.onload = function () {
    deleteItem();
    $("#hot .count_box").change(function () {
        updateItem($(this), '#hot');
    });
    $("#ordinary .count_box").change(function () {
        updateItem($(this), '#ordinary');
    });
};

/**
 * Функция автоматически обновляет суммарные показатели расчетов
 *
 */
function updateItem(class_count_box, parent_id) {

    /**
     * Обновления значений в localStorage
     */
    var item = class_count_box.attr('data-item');
    var local_item = JSON.parse(localStorage.getItem(item));
    local_item.count_box = class_count_box.val();
    localStorage.setItem(item, JSON.stringify(local_item));

    /**
     * Обнволения суммы  и сумарного веса каждого товара
     */
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

    /**
     * Обновление промежуточных итогов и суммы по все покупкам
     */
    if (parent_id === '#hot') {
        updateIntermediateTotal($(parent_id + " .total-price"), $("#discount-total-price"), 'text');
        updateIntermediateTotal($(parent_id + " .count_box"), $("#discount-count-box"), 'val');
        updateIntermediateTotal($(parent_id + " .item-total-weight"), $("#discount-weight"), 'text');
    } else if (parent_id === '#ordinary') {
        updateIntermediateTotal($(parent_id + " .total-price"), $("#ordinary-total-price"), 'text');
        updateIntermediateTotal($(parent_id + " .count_box"), $("#ordinary-count-box"), 'val');
        updateIntermediateTotal($(parent_id + " .item-total-weight"), $("#ordinary-weight"), 'text');
    }

}

/**
 * Обновление промежуточных и итоговых сумм
 */
function updateTotals() {
    // Hot total
    var discount_total_price = parseInt($("#discount-total-price").text());
    var discount_count_box = parseInt($("#discount-count-box").text());
    var discount_weight = parseInt($("#discount-weight").text());
    //ordinary total
    var ordinary_total_price = parseInt($("#ordinary-total-price").text());
    var ordinary_count_box = parseInt($("#ordinary-count-box").text());
    var ordinary_weight = parseInt($("#ordinary-weight").text());
    // total
    $("#total-price").text(discount_total_price + ordinary_total_price);
    $("#total-count").text(discount_count_box + ordinary_count_box);
    $("#total-weight").text(discount_weight + ordinary_weight);

}

/**
 *
 * @param element element form
 * @param selector element to
 */

function updateIntermediateTotal(element, selector, type) {
    var total = 0;
    if (type === 'text') {
        element.each(function () {
            total += parseInt($(this).text());
        });
        selector.text(total);
    } else if (type === 'val') {
        element.each(function () {
            total += parseInt($(this).val());
        });
        selector.text(total);
    }
    updateTotals();


}


/**
 * Функция удаляет элемент из корзины и localStorage
 */
function deleteItem() {
    $(".fa-trash").click(function () {
        var item = $(this).attr('data-item');
        if (confirm("Вы действительно хотите это сделать?")) {
            localStorage.removeItem(item);
            $(this).parent().parent().hide("slow", function () {
                var element = $(this);
                var parent_element = element.parent().parent().attr('id');
                $(this).remove();
                var count_box = element.find(".count_box").val();
                var item_total_weight = element.find(".item-total-weight").text();
                var total_price = element.find(".total-price").text();
                if (parent_element === 'hot') {
                    $("#discount-total-price").text(function () {
                        return parseInt($(this).text()) - parseInt(total_price);
                    });
                    $("#discount-count-box").text(function () {
                        return parseInt($(this).text()) - parseInt(count_box);
                    });
                    $("#discount-weight").text(function () {
                        return parseInt($(this).text()) - parseInt(item_total_weight);
                    });
                } else if (parent_element === 'ordinary') {
                    $("#ordinary-total-price").text(function () {
                        return parseInt($(this).text()) - parseInt(total_price);
                    });
                    $("#ordinary-count-box").text(function () {
                        return parseInt($(this).text()) - parseInt(count_box);
                    });
                    $("#ordinary-weight").text(function () {
                        return parseInt($(this).text()) - parseInt(item_total_weight);
                    });
                }
                setBadgeBasket();
                updateTotals();
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
    var hot_div = document.createElement('table');
    hot_div.className = "table table-products";
    for (var item_name in localStorage) {
        item = JSON.parse(localStorage.getItem(item_name));
        if (item !== null) {
            if (parseInt(item.is_sale) === 1) {
                // Расчет показателей
                discountCountBox = (discountCountBox + parseInt(item.count_box));
                discountWeight = discountWeight + (item.item_box_weight * item.count_box);
                discountTotalPrice = discountTotalPrice + (item.item_discount_box_price * item.count_box);
                // создание элемента для вставки
                hot_div.innerHTML = hot_div.innerHTML +
                    //'<table class="">' +
                    '<tr>' +
                    '<td class="col-md-1 text-center"><i class="fa fa-trash" data-item="' + item_name + '" aria-hidden="true"></i></div>' +
                    '<td class="col-md-2 text-center"><img src="' + item.item_image_link + '"' +
                    '  width="100" height="70" alt=""></a></div>' +
                    '<td class="col-md-1 text-center">' + item.item_name + '</div>' +
                    '<td class="col-md-2 text-center">' +
                    '<input class="count_box" data-item="' + item_name + '" type="number" name="count_box" value="' + item.count_box + '" min="1" max="100"' +
                    '                                   step="1"></td>' +
                    '<td class="col-md-1 box_weight text-center">' + item.item_box_weight + '</td>' +
                    '<td class="col-md-1 item-total-weight text-center">' + (item.item_box_weight * item.count_box) + '</td>' +
                    '<td class="col-md-2 text-center" id="price">' + item.item_box_price + '</td>' +
                    '<td class="col-md-2 total-price text-center"  > ' + (item.item_box_price * item.count_box) + '</td>' +
                    //'';
                    '</tr>';
                    //'</table>';
            }
        }
    }
    if (discountCountBox !== 0){
        hot_div.innerHTML = hot_div.innerHTML +
            '<div>Промежуточнный итог: <div id="discount-total-price">' + discountTotalPrice + '</div></div>' +
            '<div>Количество упаковок: <div id="discount-count-box">' + discountCountBox + '</div></div>' +
            '<div>Общий вес (нетто): <div id="discount-weight">' + discountWeight + ' </div>';
    } else {
        hot_div.innerHTML = hot_div.innerHTML +
            '<div>Пока тут ничего нет(</div>';
    }

    hot.appendChild(hot_div);
    //==================================End HOT Items ===============================================//
    //==================================Ordinary Items ==============================================//
    var ordinary = document.getElementById('ordinary');
    var ordinary_div = document.createElement('div');
    ordinary_div.className = "row";
    for (var item_name in localStorage) {
        item = JSON.parse(localStorage.getItem(item_name));
        if (item !== null) {
            if (parseInt(item.is_sale) === 0) {
                // Расчет показателей
                ordinaryCountBox = ordinaryCountBox + parseInt(item.count_box);
                ordinaryWeight = ordinaryWeight + parseInt(item.item_box_weight * item.count_box);
                ordinaryTotalPrice = ordinaryTotalPrice + parseInt(item.item_box_price * item.count_box);
                // создание элемента для вставки
                ordinary_div.innerHTML = ordinary_div.innerHTML +
                    // '<div class="row">' +
                    '<div class="col-md-1"><i class="fa fa-trash" data-item="' + item_name + '" aria-hidden="true"></i></div>' +
                    '<div class="col-md-2"><img src="' + item.item_image_link + '"' +
                    '  width="100" height="70" alt=""></a></div>' +
                    '<div class="col-md-2">' + item.item_name + '</div>' +
                    '<div class="col-md-1">' +
                    '<input class="count_box" data-item="' + item_name + '" type="number" name="count_box" value="' + item.count_box + '" min="1" max="100"' +
                    '                                   step="1"></div>' +
                    '<div class="col-md-1 box_weight">' + item.item_box_weight + '</div>' +
                    '<div class="col-md-1 item-total-weight">' + (item.item_box_weight * item.count_box) + '</div>' +
                    '<div class="col-md-2" id="price">' + item.item_box_price + '</div>' +
                    '<div class="col-md-2 total-price"  > ' + (item.item_box_price * item.count_box) + '</div>' +
                    '';
                    //'</div>';
            }
        }
    }
    if (ordinaryCountBox !== 0) {
        ordinary_div.innerHTML = ordinary_div.innerHTML +
            '<div>Промежуточнный итог: <div id="ordinary-total-price">' + ordinaryTotalPrice + '</div></div>' +
            '<div>Количество упаковок: <div id="ordinary-count-box">' + ordinaryCountBox + '</div></div>' +
            '<div>Общий вес (нетто): <div id="ordinary-weight">' + ordinaryWeight + ' </div></div>';
    }
    else {
        ordinary_div.innerHTML = ordinary_div.innerHTML +
            '<div>Пока тут ничего нет(</div>';
    }
    ordinary.appendChild(ordinary_div);
    //==================================END Ordinary Items ===========================================//
    var total = document.getElementById('total');
    if ((ordinaryTotalPrice !== 0) && (discountTotalPrice !== 0)){
        total.innerHTML =
            '<div>Итог: <div id="total-price">' + (ordinaryTotalPrice + discountTotalPrice) + '</div></div>' +
            '<div>Количество упаковок: <div id="total-count">' + (ordinaryCountBox + discountCountBox) + '</div></div>' +
            '<div>Общий вес (нетто): <div id="total-weight">' + (ordinaryWeight + discountWeight) + ' </div></div>';

    }

}
