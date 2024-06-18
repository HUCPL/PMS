
    var source, destination;
    var directionsDisplay;
    var options = {
        //types: ['(cities)'],
        //componentRestrictions: { country: "in" }
    };
    var directionsService = new google.maps.DirectionsService();
    google.maps.event.addDomListener(window, 'load', function () {
        var location = document.getElementById('location');
        var roundFrom = document.getElementById('roundFrom');
        var roundTo = document.getElementById('roundTo');
        var city_from = document.getElementById('city_from');
        var city_via = document.getElementById('city_via');
        var city_to = document.getElementById('city_to');
        var city_via_0 = document.getElementById('city_via_0');
        var city_via_1 = document.getElementById('city_via_1');
        var city_via_2 = document.getElementById('city_via_2');
        var city_via_3 = document.getElementById('city_via_3');
        var city_via_4 = document.getElementById('city_via_4');

        directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });

        new google.maps.places.Autocomplete(location, options);
        new google.maps.places.Autocomplete(roundFrom, options);
        new google.maps.places.Autocomplete(roundTo, options);
        new google.maps.places.Autocomplete(city_from, options);
        new google.maps.places.Autocomplete(city_via, options);
        new google.maps.places.Autocomplete(city_to, options);
        new google.maps.places.Autocomplete(city_via_0, options);
        new google.maps.places.Autocomplete(city_via_1, options);
        new google.maps.places.Autocomplete(city_via_2, options);
        new google.maps.places.Autocomplete(city_via_3, options);
        new google.maps.places.Autocomplete(city_via_4, options);
    });
    function GetRoute() {
        debugger;
        var lat = 0.0;
        var long = 0.0;
        var geocoder = new google.maps.Geocoder();
        //*********DIRECTIONS AND ROUTE**********************//
        source = document.getElementById("location").value;
        destination = document.getElementById("txtDestination").value;

        var request = {
            origin: source,
            destination: destination,
            travelMode: google.maps.TravelMode.DRIVING
        };
        directionsService.route(request, function (response, status) {
            debugger;
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
            }
        });
        geocoder.geocode({ 'address': source }, function (results, status) {
            debugger;
            if (status == google.maps.GeocoderStatus.OK) {
                lat = results[0].geometry.viewport.na.j;
                long = results[0].geometry.viewport.ia.j;
            }
        });
        //*********DISTANCE AND DURATION**********************//
        var service = new google.maps.DistanceMatrixService();
        debugger;
        service.getDistanceMatrix({
            origins: [source],
            destinations: [destination],
            travelMode: google.maps.TravelMode.DRIVING,
            unitSystem: google.maps.UnitSystem.METRIC,
            avoidHighways: false,
            avoidTolls: false
        }, function (response, status) {
            debugger;
            if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
                var distance = response.rows[0].elements[0].distance.text;
                var duration = response.rows[0].elements[0].duration.text;
                $("#dvDistance").html("Calculated Distance from " + source + " to " + destination + " is <span style='color: #dd4814;'>" + distance + "</span>");
                $("#origin").html(source);
                $("#destination").html(destination);
                $("#distance").html(distance);
                $("#driving-time").html("Calculated Duration from " + source + " to " + destination + " is <span style='color: #dd4814;'>" + duration + "</span>");
            } else {
                alert("Unable to find the distance via road.");
            }
        });
        debugger;
        var Delhi = new google.maps.LatLng(lat, long);
        var mapOptions = {
            zoom: 2,
            center: Delhi,
        };
        map = new google.maps.Map(document.getElementById('dvmap'), mapOptions);
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById('dvPanel'));
        ///initMap();
    }

    function refresh() { var service = new
    google.maps.DistanceMatrixService(); debugger; service.getDistanceMatrix({
    origins: [source], destinations: [destination], travelMode:
    google.maps.TravelMode.DRIVING, unitSystem: google.maps.UnitSystem.METRIC,
    avoidHighways: false, avoidTolls: false }, function (response, status) {
    debugger; if (status == google.maps.DistanceMatrixStatus.OK &&
    response.rows[0].elements[0].status != "ZERO_RESULTS") { var distance =
    response.rows[0].elements[0].distance.text; var duration =
    response.rows[0].elements[0].duration.text;
    $("#dvDistance").html("Calculated Distance from " + source + " to " +
    destination + " is <span style='color: #dd4814;'>" + distance +
    "</span>"); $("#origin").html(source);
    $("#destination").html(destination); $("#distance").html(distance);
    $("#driving-time").html("Calculated Duration from " + source + " to " +
    destination + " is <span style='color: #dd4814;'>" + duration +
    "</span>"); } else { alert("Unable to find the distance via road."); } });
    }

    /*
    function populate(selector) {
        var select = $(selector);
        var hours, minutes, ampm;
        for (var i = 420; i <= 1320; i += 15) {
            hours = Math.floor(i / 60);
            minutes = i % 60;
            if (minutes < 10) {
                minutes = '0' + minutes; // adding leading zero
            }
            ampm = hours % 24 < 12 ? 'AM' : 'PM';
            hours = hours % 12;
            if (hours === 0) {
                hours = 12;
            }
            select.append($('<option></option>')
                .attr('value', hours + ':' + minutes + ' ' + ampm)
                .text(hours + ':' + minutes + ' ' + ampm));
        }
    }
    */