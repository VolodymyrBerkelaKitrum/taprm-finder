<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}"/>
<script type="text/javascript" src="{{ URL::asset('/js/script.js') }}"></script>
<link href="//db.onlinewebfonts.com/c/6c79f7fd645c0d39b4ca10428237984a?family=Azo+Sans" rel="stylesheet"
      type="text/css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<div class="page-width">
    <head>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsCWfyl2o-cTM849oNzsxmkkNhnnZN3nE&callback=initMap&libraries=&v=weekly" defer></script>
    </head>
    <div id="map-with-search">
        <div id="left-box">
            <?php
            foreach ($locations as $location) {
                echo '<div class="brewery-info-template" id="brewery-info-template"><span id="name"><h2>' . $location->title . '</h2><span id="image"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKcAAAADCAYAAAD2mx8UAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAlSURBVHgB7dJBAQAACAIxNIf9M9gOavC4Zdj4zwIKrYBS5EStADZFAti1sFJ3AAAAAElFTkSuQmCC"><br></span><span id="brewery-image"><br><img id="test21312312" src="' . $location->image_url . '"></span><span id="location">' . $location->address . '</span><span id="phone"><br>' . $location->phone . '<br></span><span id="button"><button id ="'.$location->id.'" >VIEW INVENTORY</button></span></span></div>';
            }
            ?>
        </div>
        <div id="right-box">
            <div id="filters">
                <div id="box-select">
                    <label for="beers" style="margin: auto 1% auto 0; font-size: 15px;">Filter results by:</label>
                    <select name="beers" id="beers">
                        <option value="default" selected>Filter results by:</option>
                        <option value="product" >Product</option>
                        <option value="brewery">Brewery</option>
                    </select>
                </div>
                <div id="box-select">
                    <label for="cities" style="margin: auto 1%; font-size: 15px;">Select products:</label>
                    <select name="cities" id="cities">
                        <option value="default" selected>Select Products</option>
                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"
                                type="text/javascript"></script>
                        <script type="text/javascript">

                            function fillDropdawn(arr, arr2, cities) {
                                arr.forEach(function (item, index) {
                                        let optionObj = document.createElement("option");
                                        optionObj.textContent = item;
                                        optionObj.value = arr2[index];
                                        console.log(optionObj, '-----', item, "asdkjasdhaksjdhakjsdkajshdkajsdkajsdkajsdhkajsdh");
                                        return document.getElementById(cities).appendChild(optionObj);
                                    })
                            };
                            var beersArray = <?= json_encode($beers) ?>;
                            var beerNamesArray = [];
                            var beerIDsArray = [];
                            var locationsTitlesArray = ['q', 'w'];
                            for (let i = 0; i < beersArray.length; ++i) {
                                beerNamesArray.push(beersArray[i]['name']);
                                beerIDsArray.push(beersArray[i]['id']);
                            }

                            $(document).ready(function () {
                                $("#beers").val('product');
                                fillDropdawn(beerNamesArray, beerIDsArray, "cities");
                            });

                            $("#beers").on('change', function () {
                                $("#cities").empty();
                                console.log($("#beers").val());
                                if ($("#beers").val() == 'product') {
                                    fillDropdawn(beerNamesArray,beerIDsArray, "cities");
                                } else if ($("#beers").val() == 'brewery') {
                                    $("#cities").empty();
                                    fillDropdawn(locationsTitlesArray, beerIDsArray, "cities");
                                }
                            });
                            for(let i = 1; i < 5; i++) {
                                $(document).on( "click", "#" + i +"", function(){
                                    $.ajax({
                                        type: "GET",
                                        url: '/location/' + i,
                                    }).done(function( test1 ) {
                                        $("#left-box").html(test1);
                                        console.log(test1, "asdadasdasdasdasdasdsa");
                                    });
                                });
                            }



                            $(document).on( "click", "#back", function() {
                                let id = $("#cities").val();

                                if(id === "default") {
                                    $("#left-box").html("");
                                    var response = <?php echo json_encode($locations) ?>;
                                    var locations_keys = Object.keys(response);
                                    for(let q = 0; q<locations_keys.length; q++) {
                                        $("#left-box").append('<div class="brewery-info-template" id="brewery-info-template"><span id="name"><h2>' + response[q]["title"] + '</h2><span id="image"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKcAAAADCAYAAAD2mx8UAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAlSURBVHgB7dJBAQAACAIxNIf9M9gOavC4Zdj4zwIKrYBS5EStADZFAti1sFJ3AAAAAElFTkSuQmCC"><br></span><span id="brewery-image"><br><img src="' + response[q]["image_url"] + '"></span><span id="location">' + response[q]["address"] + '</span><span id="phone"><br>' + response[q]["phone"] + '<br></span><span id="button"><button id="'+response[q]["id"]+'">VIEW INVENTORY</button></span></span></div>');
                                    }

                                } else {
                                    $.ajax({
                                        type: "GET",
                                        url: '/beer/' + id,
                                    }).done(function( response ) {
                                        var test = Object.keys(response);
                                        $("#left-box").html("");

                                        var MarkersCoordinates  = [];
                                        for (let q = 0; q < test.length; ++q) {
                                            var coordinates = [response[q]["lat"], response[q]["lon"]];
                                            MarkersCoordinates.push(coordinates);
                                            $("#left-box").append('<div class="brewery-info-template" id="brewery-info-template"><span id="name"><h2>' + response[q]["title"] + '</h2><span id="image"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKcAAAADCAYAAAD2mx8UAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAlSURBVHgB7dJBAQAACAIxNIf9M9gOavC4Zdj4zwIKrYBS5EStADZFAti1sFJ3AAAAAElFTkSuQmCC"><br></span><span id="brewery-image"><br><img src="' + response[q]["image_url"] + '"></span><span id="location">' + response[q]["address"] + '</span><span id="phone"><br>' + response[q]["phone"] + '<br></span><span id="button"><button id="'+response[q]["id"]+'">VIEW INVENTORY</button></span></span></div>');
                                        }
                                        setMarkers(MarkersCoordinates);
                                    });
                                }

                            });

                            $(document).on( "change", "#cities", function(){
                                let id = $("#cities").val();
                                $.ajax({
                                    type: "GET",
                                    url: '/beer/' + id,
                                }).done(function( response ) {
                                    var test = Object.keys(response);
                                    $("#left-box").html("");

                                    var MarkersCoordinates  = [];
                                    for (let q = 0; q < test.length; ++q) {
                                        var coordinates = [response[q]["lat"], response[q]["lon"]];
                                        MarkersCoordinates.push(coordinates);
                                        $("#left-box").append('<div class="brewery-info-template" id="brewery-info-template"><span id="name"><h2>' + response[q]["title"] + '</h2><span id="image"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKcAAAADCAYAAAD2mx8UAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAlSURBVHgB7dJBAQAACAIxNIf9M9gOavC4Zdj4zwIKrYBS5EStADZFAti1sFJ3AAAAAElFTkSuQmCC"><br></span><span id="brewery-image"><br><img src="' + response[q]["image_url"] + '"></span><span id="location">' + response[q]["address"] + '</span><span id="phone"><br>' + response[q]["phone"] + '<br></span><span id="button"><button id="'+response[q]["id"]+'">VIEW INVENTORY</button></span></span></div>');
                                    }
                                    setMarkers(MarkersCoordinates);
                                });
                            });
                        </script>
                    </select>
                </div>
                <div class="search-block-with-button">
                    <input id="search-input" type="text" placeholder="Search" name="search"
                           style="margin-left: 1%; display: flex;">
                    <button id="search-btn-icon" type="submit"><i class="fa fa-search" style="background:white;"></i>
                    </button>
                </div>
            </div>
            <br>
            <div id="map">
            </div>
            <br>
            <span id="info-label">*Please be sure to call the locations ahead of time as some may be seasonal or out of stock. </span>

        </div>
    </div>
</div>


