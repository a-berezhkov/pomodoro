$(document).ready(function () {
    console.log("fsdfs");
    $('#paste-from-profile').click(function () {
        autocompleteProfile();
    });

});


function autocompleteProfile(){
    console.log("fsdfs");
    $.ajax({
        type: "POST",
        url: "/web/front/api/get-profile"

    })
        .done(function (data) {
            console.log(data);
            console.log($("#google_id"));
            $("#orders-address_phone").val(data.phone);

            $("#orders-google_id").select2("data", {id: 1, text: 2});
             console.log( $("#orders-google_id"));

            //$(".select2-container").text("fsdfsd");
           // $("#select").select2("val", "CA");

        }).fail(function (jqXHR, textStatus) {
        //alert("Request failed: " + textStatus);
        console.log('error, cart is empty cart.js, line 100')
    });
}

function saveDileveryProfile(){

}
