function initMap() {

    var locations = [
        ['New York', 40.7398442, -73.979838, 4]
    ];

    console.log(locations[0][1]);
    console.log(locations[0][2]);
    console.log(locations);

    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 15,
        center: new google.maps.LatLng(40.7398442, -73.979838),
    });

    var icon = {
        url: "images/marker.png", // url
        scaledSize: new google.maps.Size(50, 50),
        origin: new google.maps.Point(0,0), // origin
        anchor: new google.maps.Point(0, 0) // anchor
    };

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map,
            icon: icon
        });
    }

}

function setMarkers(cordinates) {

    console.log(cordinates[0][0], cordinates[0][1]);

    console.log(cordinates);

    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 2,
        center: new google.maps.LatLng(cordinates[0][0], cordinates[0][1]),
    });

    var icon = {
        url: "images/marker.png",
        scaledSize: new google.maps.Size(50, 50),
        origin: new google.maps.Point(0,0),
        anchor: new google.maps.Point(0, 0)
    };

    for (i = 0; i < cordinates.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(cordinates[i][0], cordinates[i][1]),
            map: map,
            icon: icon
        });
    }

}

