$(document).ready(function() {
    var $addressA = $("#addressA");
    var $addressB = $("#addressB");
    var $saveRoute = $("#saveRoute");
    var listAddress = [$addressA, $addressB];
    arrayAddresses = [];
    var isAddressParsed = true;
    var $resultDiv = $("#resultDiv");
    var $formNewRoute = $("#formNewRoute");
    var $routeId = $("#routeId");
    var $calcRouteCost = $("#calcRouteCost");
    var routePrice = 0;

    function getGeoObject(geocoder) {

        return geocoder._kb['GeoObjectCollection']['featureMember'][0]['GeoObject'];
    }

    function getAddressArray($address) {

        geocoder = new ymaps.geocode($address.val(), {json: true});
        geocoder.then(function() {

            var arrayAddress = {};
            var geoObject = getGeoObject(geocoder);
            if(geoObject) {
                arrayAddress['point'] = geoObject['Point']['pos'];
                arrayAddress['title'] = geoObject['description']+" "+geoObject['name'];

                arrayAddresses.push(arrayAddress);
            }
            isAddressParsed = true;
        });

    }

    function saveAddressesToRoute() {

        var timer = setInterval(function(){
            if(arrayAddresses.length == 2) {
                clearInterval(timer);

                $.ajax({
                    type: "POST",
                    url: $formNewRoute.attr('action'),
                    dataType: 'json',
                    data: { addresses: arrayAddresses, routeId: $routeId.val() },
                    success: function(resp){

                        if(resp['price']) {
                            routePrice = resp['price'];
                            $calcRouteCost.css('display', '');
                            alert("Адреса сохранены");
                        }
                    }
                });
            }
        }, 500);
    }

    function parseAddresses() {
        var i = 0;

        var timer = setInterval(function(){
            if (isAddressParsed) {
                isAddressParsed = false;
                getAddressArray(listAddress[i]);
                i++;
                if (i==listAddress.length) {
                    clearInterval(timer);
                    saveAddressesToRoute();
                }

            }
        }, 500);
    }

    function calculateRouteCost() {
        ymaps.route([arrayAddresses[0]['point'], arrayAddresses[1]['point']])
            .then(function (router) {
                var distance = router.getLength();
                var cost = distance*routePrice;

                $resultDiv.append($('<div>').html('Расстояние маршрута '+distance+" м."));
                $resultDiv.append($('<div>').html('Стоимость поездки '+cost+" р."));
            });
    }

    $calcRouteCost.on("click", calculateRouteCost);

    $saveRoute.on("click", parseAddresses);
});

