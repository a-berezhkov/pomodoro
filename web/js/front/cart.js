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
        ;   updateItem($(this), '#ordinary');
    })

    if (localStorage.length === 0){
        console.log(localStorage.length);
        $("#btn-checkout").attr('disabled',true);
        $("#btn-checkout").attr('href',"#");
    } else {
        $("#btn-checkout").prop('disabled', false);
    }

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
    var parentRow = class_count_box.closest("tr");
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
    var discount_total_price = $("#discount-total-price").text() ? parseInt($("#discount-total-price").text()) : 0;
    var discount_count_box = $("#discount-count-box").text() ? parseInt($("#discount-count-box").text()) : 0;
    var discount_weight = $("#discount-weight").text() ? parseInt($("#discount-weight").text()) : 0;
    //ordinary total
    var ordinary_total_price = $("#ordinary-total-price").text() ?  parseInt($("#ordinary-total-price").text()) : 0;
    var ordinary_count_box = $("#ordinary-count-box").text() ? parseInt($("#ordinary-count-box").text()) : 0;
    var ordinary_weight = $("#ordinary-weight").text() ? parseInt($("#ordinary-weight").text()) : 0;
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
                var parent_element = element.parent().parent().parent().parent().attr('id');
                //console.log(element);
              ///  console.log(parent_element);
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
    var hot_table = document.getElementById('hot_table');
    var hot = document.getElementById('hot');
    var hot_div = document.createElement('table');
    hot_div.className = "table table-products";
    hot_div.innerHTML =
        '<tr class="heading">' +
        '<td class="text-center">Наименование</td>' +
        '<td class="text-center"></td>' +
        '<td class="text-center">Количесвто</td>' +
        '<td class="text-center">Вес шт.</td>' +
        '<td class="text-center">Вес всего (кг)</td>' +
        '<td class="text-center">Цена</td>' +
        '<td class="text-center">Сумма</td>' +
        '</tr>';
    for (var item_name in localStorage) {
        item = JSON.parse(localStorage.getItem(item_name));
        if (item !== null) {
            if (parseInt(item.is_sale) === 1) {
                // Расчет показателей
                discountCountBox = (discountCountBox + parseInt(item.count_box));
                discountWeight = discountWeight + (item.item_box_weight * item.count_box);
                discountTotalPrice = discountTotalPrice + (parseInt(item.item_discount_box_price) * item.count_box);
                // создание элемента для вставки
                hot_div.innerHTML = hot_div.innerHTML +
                    //'<table class="">' +
                    '<tr>' +
                    '<td class="col-md-3 text-center"><i class="fa fa-trash" data-item="'+item_name+'" aria-hidden="true"></i> <img src="' + item.item_image_link + '"' +
                    '  width="100" height="70" alt=""></a></td>' +
                    '<td class="col-md-1 text-center">' + item.item_name + '</td>' +
                    '<td class="col-md-2 text-center">' +
                    '<input class="count_box" data-item="' + item_name + '" type="number" name="count_box" value="' + item.count_box + '" min="1" max="100"' +
                    '                                   step="1"></td>' +
                    '<td class="col-md-1 box_weight text-center">' + item.item_box_weight + '</td>' +
                    '<td class="col-md-1 item-total-weight text-center">' + (item.item_box_weight * item.count_box) + '</td>' +
                    '<td class="col-md-2 text-center" id="price">' + item.item_discount_box_price + ' ₽' + '</td>' +
                    '<td class="col-md-2 total-price text-center" > ' + (item.item_discount_box_price * item.count_box) + ' ₽' + '</td>' +
                    //'';
                    '</tr>';
                //'</table>';
            }
        }
    }

    var hot_total = document.createElement('div');
    if (discountCountBox !== 0) {
        hot_total.innerHTML +=
            '<div class="total text-right">' +
            '<div>Промежуточнный итог: <span id="discount-total-price">' + discountTotalPrice + '</span></div>' +
            '<div>Количество упаковок: <span id="discount-count-box">' + discountCountBox + '</span></div>' +
            '<div>Общий вес (нетто): <span id="discount-weight">' + discountWeight + ' </span>' +
            '</div>';
    } else {
        hot_total.innerHTML +=
            '<div>Пока тут ничего нет(</div>';
    }

    hot_wrapper = document.createElement('div');
    hot_wrapper.className = 'table-responsive';
    hot_wrapper.innerHTML = hot_div.outerHTML;

    //hot_table.appendChild(hot_div);
    hot.appendChild(hot_wrapper);
    hot.appendChild(hot_total);
    //==================================End HOT Items ===============================================//
    //==================================Ordinary Items ==============================================//
    var ordinary = document.getElementById('ordinary');
    var ordinary_div = document.createElement('table');
    ordinary_div.className = "table table-products";
    ordinary_div.innerHTML =
        '<tr class="heading">' +
        '<td class="text-center">Наименование</td>' +
        '<td class="text-center"></td>' +
        '<td class="text-center">Количесвто</td>' +
        '<td class="text-center">Вес шт.</td>' +
        '<td class="text-center">Вес всего (кг)</td>' +
        '<td class="text-center">Цена</td>' +
        '<td class="text-center">Сумма</td>' +
        '</tr>';
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
                    '<tr>' +
                    //'<td class="col-md-1 text-center"></td>' +
                    '<td class="col-md-3 text-center"><i class="fa fa-trash" data-item="'+item_name+'" aria-hidden="true"></i> <img src="' + item.item_image_link + '"' +
                    '  width="100" height="70" alt=""></a></td>' +
                    '<td class="col-md-1 text-center">' + item.item_name + '</td>' +
                    '<td class="col-md-2 text-center">' +
                    '<input class="count_box" data-item="' + item_name + '" type="number" name="count_box" value="' + item.count_box + '" min="1" max="100"' +
                    '                                   step="1"></td>' +
                    '<td class="col-md-1 box_weight text-center">' + item.item_box_weight + '</td>' +
                    '<td class="col-md-1 item-total-weight text-center">' + (item.item_box_weight * item.count_box) + '</td>' +
                    '<td class="col-md-2 text-center" id="price">' + item.item_box_price + ' ₽' + '</td>' +
                    '<td class="col-md-2 total-price text-center" > ' + (item.item_box_price * item.count_box) + ' ₽' + '</td>' +
                    '</tr>';
                //'</div>';
            }
        }
    }

    var ordinary_total = document.createElement('div');
    if (ordinaryCountBox !== 0) {
        ordinary_total.innerHTML +=
            '<div class="total text-right">' +
            '<div>Промежуточнный итог: <span id="ordinary-total-price">' + ordinaryTotalPrice + '</span></div>' +
            '<div>Количество упаковок: <span id="ordinary-count-box">' + ordinaryCountBox + '</span></div>' +
            '<div>Общий вес (нетто): <span id="ordinary-weight">' + ordinaryWeight + ' </span>' +
            '</div>';
    } else {
        ordinary_total.innerHTML += '<div>Пока тут ничего нет(</div>';
    }

    ordinary_wrapper = document.createElement('div');
    ordinary_wrapper.className = 'table-responsive';
    ordinary_wrapper.innerHTML = ordinary_div.outerHTML;

    ordinary.appendChild(ordinary_wrapper);
    ordinary.appendChild(ordinary_total);
    //==================================END Ordinary Items ===========================================//
    var total = document.getElementById('total');
    if ((ordinaryTotalPrice !== 0) || (discountTotalPrice !== 0)){
        total.innerHTML =
            '<hr/>' +
            '<div class="total super-total text-right">' +
            '<div>Итог: <span id="total-price">' + (ordinaryTotalPrice + discountTotalPrice) + '</span></div>' +
            '<div>Количество упаковок: <span id="total-count">' + (ordinaryCountBox + discountCountBox) + '</span></div>' +
            '<div>Общий вес (нетто): <span id="total-weight">' + (ordinaryWeight + discountWeight) + ' </span></div>' +
            '</div>';

    }

}