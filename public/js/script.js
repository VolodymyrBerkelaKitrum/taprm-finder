function initMap() {

    var locations = [
        ['New York', 40.7398442, -73.979838, 4],
        ['Coogee Beach', -33.923036, 151.259052, 5],
        ['Cronulla Beach', -34.028249, 151.157507, 3],
        ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
        ['Maroubra Beach', -33.950198, 151.259302, 1]
    ];

    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 10,
        center: new google.maps.LatLng(40.7398442, -73.979838),
    });

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
        });
    }

}

