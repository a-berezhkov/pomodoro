$(document).ready(function () {
    console.log("fsdfs");
    $('#paste-from-profile').click(function () {
        $("#static-input-address").show();
        $("#dynamic-input-address").hide();
        autocompleteProfile();
    });
    $(".input-address").click(function () {
        showAddressForm();
    });

    $("#cart").val(JSON.stringify(localStorage));


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
            $("#orders-address_street").val(data.address_city+','+data.address_street);
            $("#orders-address_house").val(data.address_house);
            $("#orders-address_housing").val(data.address_housing);
            $("#orders-address_office").val(data.address_office);

        // $("#orders-google_id").select2("data", {id: 1, text: 2});
          //   console.log( $("#orders-google_id"));

            //$(".select2-container").text("fsdfsd");
           // $("#select").select2("val", "CA");

        }).fail(function (jqXHR, textStatus) {
        //alert("Request failed: " + textStatus);
        console.log('error, cart is empty cart.js, line 100')
    });
}

function saveDileveryProfile(){

}

function showAddressForm(){

        $("#static-input-address").toggle(function () {
        });
        $("#dynamic-input-address").toggle(function () {
        });


}
