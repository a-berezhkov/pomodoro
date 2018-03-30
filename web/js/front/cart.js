/**
 *
 */
showItems();
function showItems() {
    var hot = document.getElementById('hot');
    var hot_div = document.createElement('div');
    hot_div.className = "row";
    for (var item in localStorage) {
        item = JSON.parse(localStorage.getItem(item));
        console.log(item);
        if (item !== null ) {
            if (parseInt(item.is_sale) === 1){
                hot_div.innerHTML =  hot_div.innerHTML +
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
    }
    hot.appendChild(hot_div);
    console.log("asdfdsf");
}
