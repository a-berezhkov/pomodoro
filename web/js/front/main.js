/**
 * Функция отображает корзину, если в ней есть товары
 */

// TODO Передавать домашний адрес
//var home = window.location.host;
//console.log(home);

/**
 *
 *
 * @constructor
 */
function EventListeners() {
    $('#shopping-basket').click(ShowBasket);
    $(".button-basket").click(addToBasket);
    $("#cart-basket").click(goToCart);
    $("#item-checkout").click(function () {
        location.href='/web/front/cart/delivery';
    });

}

function goToCart() {
    var items = [];
    for (var item in localStorage) {
        item = JSON.parse(localStorage.getItem(item));
        if (item !== null) {
            items.push(item);
        }
    }
   $.post( "/labin/2018_senior-pomidor/web/front/cart/cart", { data: items } );
    $.ajax({
        method: "POST",
        url: "/labin/2018_senior-pomidor/web/front/cart/cart",
        data: {data :items},
        async: false

    })
        .done(function (msg) {
            console.log("yes!");
            location.href='/web/front/cart/cart/'
        })
        .fail(function (msg) {
            console.log("No!");
        })
    ;

}

function ShowBasket() {
    var total = 0;
    var cart = document.getElementById('cart-stores');
    var div = document.createElement('div');

    div.id = "cart-drop"; //Добавлеям элемент dev с классом row
    cart.innerHTML = ''; //Очищаем все внутри элемнета cart-stores
    for (var item in localStorage) {
        item = JSON.parse(localStorage.getItem(item));
        if (item !== null) { //так как в localStorage еще есть методы
            total = total + parseInt(item.count_box) * parseInt(item.item_box_price);
            div.innerHTML = div.innerHTML +
                ' <div class="row">' +
                '<div class="col-md-5"><img src="' + item.item_image_link + '"' +
                '  width="100" height="70" alt=""></a></div>' +
                '<div class="col-md-7"><div class="item-name">' + item.item_name + '</div>' +
                '<div class="item-box_price">' + item.item_box_price + '</div>' +
                '<div class="item-count"> Количество:' + item.count_box + '</div>' +
                '<div class="item-box_weigh">Вес упаковки: ' + item.item_box_weight + '</div>' +
                '<div class="item-summa">Итого : ' + item.count_box * item.item_box_price + '</div>' +
                '</div><hr>';
        }
    }
    div.innerHTML = div.innerHTML +
        '<div id="cart-total" class="cart-total text-center"> Общий итог: ' + total + ' </div>' +
        '<button  id="cart-basket" class="btn button"   >Корзина</button>' +
        '<button id="item-checkout" class="btn button button-inverse"> Оформить заказ</button> </form>'
    ;
    cart.appendChild(div);
    $("#cart-basket").click(goToCart);
    $("#item-checkout").click(function () {
        location.href='/web//front/cart/delivery';
    });
}

function addToBasket() {
    var id = $(this).attr('item-id');
    var count_box = parseInt($('#count_box_' + $(this).attr('item-id')).val());

    if (localStorage.getItem('item-' + id)) {
        var unSerializeStore = JSON.parse(localStorage.getItem('item-' + id));
        count_box = unSerializeStore.count_box + count_box;
    }

    var store = {
        id: $(this).attr('item-id'),
        item_name: $(this).attr('item-name'),
        item_box_price: $(this).attr('item-box_price'),
        item_box_weight: $(this).attr('item-box_weight'),
        item_discount_box_price: $(this).attr('item-discount_box_price'),
        item_image_link: $(this).attr('item-image_link'),
        is_sale: $(this).attr('item-is_sale'),
        count_box: count_box
    };
    var serialStore = JSON.stringify(store);

    localStorage.setItem('item-' + id, serialStore);

    $(this).fadeOut(300).delay(200).fadeIn(400);
    setBadgeBasket();
}

function setBadgeBasket() {

    /*
        преобразование объекта в массив (необходимо для получения количества элементов)
     */

    var badge = $('span').is('#basket-badge');

    /*
       если значок badge уже существует на странице,
       добалвяем купленный отличающийся товар
       Иначе добавлем элемент badge
     */
    if (badge) {
        $('#basket-badge').html(localStorage.length);
    }
    else if (localStorage.length !== 0) {
        $("#shopping-basket a").append('<span id="basket-badge" class="label label-primary">' + localStorage.length + '</span>');
    }
}

/*
    Функция получает все данные из сессии о товарах в корзине
    и тображает элемент badge
 */
function initBadge() {
    $.ajax({
        type: "POST",
        url: "/labin/2018_senior-pomidor/web/front/cart/stores-by-session"

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
    EventListeners();
    //Handles menu drop down
    $('.dropdown-menu').find('form').click(function (e) {
        e.stopPropagation(); //https://developer.mozilla.org/ru/docs/Web/API/Event/stopPropagation
    });
});