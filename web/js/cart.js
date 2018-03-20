
/**
 * Функция отображает корзину, если в ней есть товары
 */

// TODO Передавать домашний адрес
home = 'http://localhost/labin/2018_senior-pomidor/web/front';

$('#shopping-basket' ).click(function() {
$.ajax({
    type: "POST",
    url: home + "/cart/cart"
}).done(function (data) {
    if (data !== false) {
        console.log(data);
        $('#cart-stores').show().html(data);
    }

}).fail(function (jqXHR, textStatus) {
    alert("Request failed: " + textStatus);
});
})
;

$(".button-busket").click(function () {

    $.ajax({
        type: "POST",
        url: home + "/cart/add",
        data: {
            id: $(this).attr('item-id'),
            item_name: $(this).attr('item-name'),
            item_box_price: $(this).attr('item-box_price'),
            item_box_weight: $(this).attr('item-box_weight'),
            item_discount_box_price: $(this).attr('item-discount_box_price'),
            item_image_link: $(this).attr('item-image_link'),

        }
    }).done(function (data) {
        setBadgeBasket(data);
    }).fail(function (jqXHR, textStatus) {
        alert("Request failed: " + textStatus + "<br/>" + this.url);
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
function setBadgeBasket(data) {

    /*
        преобразование объекта в массив (необходимо для получения количества элементов)
     */
    var array = $.map(data.store, function (value, index) {
        return [value];
    });

    var badge = $('span').is('#basket-badge');

    /*
       если значок badge уже существует на странице,
       добалвяем купленный отличающийся товар
       Иначе добавлем элемент badge
     */
    if (badge) {
        $('#basket-badge').html(array.length);
    }
    else if (array.length !== 0) {
        $("#shopping-basket a").append('<span id="basket-badge" class="label label-primary">' + array.length + '</span>');
    }
}

/*
    Функция получает все данные из сессии о товарах в корзине
    и тображает элемент badge
 */
function initBadge() {
    $.ajax({
        type: "POST",
        url: "/web/front/cart/stores-by-session"

    })
        .done(function (data) {
            setBadgeBasket(data);
        }).fail(function (jqXHR, textStatus) {
        //alert("Request failed: " + textStatus);
        console.log('error, cart is empty cart.js, line 100')
    });

}

$(document).ready(function () {
    initBadge();
    //Handles menu drop down
    $('.dropdown-menu').find('form').click(function (e) {
        e.stopPropagation(); //https://developer.mozilla.org/ru/docs/Web/API/Event/stopPropagation
    });
});