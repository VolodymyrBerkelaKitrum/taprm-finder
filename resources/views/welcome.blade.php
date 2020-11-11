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
                    <label for="search_by" style="margin: auto 1% auto 0; font-size: 15px;">Filter results by:</label>
                    <select name="search_by" id="search_by">
                        <option value="default" selected>Filter results by:</option>
                        <option value="product" >Product</option>
                        <option value="brewery">Brewery</option>
                    </select>
                </div>
                <div id="box-select">
                    <label for="products_breweries" id="teeeest" style="margin: auto 1%; font-size: 15px;">Select products:</label>
                    <select name="products_breweries" id="products_breweries">
                        <option value="default" selected>Select Products</option>
                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"
                                type="text/javascript"></script>
                        <script type="text/javascript">

                            function returnDiv(div, first, second, third, fourth, fifth ){

                                return $(div).append('<div class="brewery-info-template" id="brewery-info-template"><span id="name"><h2>' + first + '</h2><span id="image"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKcAAAADCAYAAAD2mx8UAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAlSURBVHgB7dJBAQAACAIxNIf9M9gOavC4Zdj4zwIKrYBS5EStADZFAti1sFJ3AAAAAElFTkSuQmCC"><br></span><span id="brewery-image"><br><img src="' + second + '"></span><span id="location">' + third + '</span><span id="phone"><br>' + fourth + '<br></span><span id="button"><button id="'+fifth+'">VIEW INVENTORY</button></span></span></div>');

                            }

                            function ajaxRequest(i){
                                $.ajax({
                                    type: "GET",
                                    url: '/location/' + i,
                                }).done(function (test1) {
                                    $("#left-box").html(test1);
                                    return test1;
                                });
                            }

                            function fillDropdawn(arr, arr2, products_breweries) {
                                arr.forEach(function (item, index) {
                                        let optionObj = document.createElement("option");
                                        optionObj.textContent = item;
                                        optionObj.value = arr2[index];
                                        console.log(optionObj, '-----', item, "asdkjasdhaksjdhakjsdkajshdkajsdkajsdkajsdhkajsdh");
                                        return document.getElementById(products_breweries).appendChild(optionObj);
                                    })
                            };
                            var beersArray = <?= json_encode($beers) ?>;
                            var beerNamesArray = [];
                            var breweryNamesArray = [];
                            var beerIDsArray = [];
                            var breweryIDsArray = [];
                            var locationsTitlesArray = <?= json_encode($breweries); ?>;
                            for (let i = 0; i < beersArray.length; ++i) {
                                beerNamesArray.push(beersArray[i]['name']);
                                beerIDsArray.push(beersArray[i]['id']);
                            }
                            for (let i = 0; i < locationsTitlesArray.length; ++i) {
                                breweryNamesArray.push(locationsTitlesArray[i]['title']);
                                breweryIDsArray.push(locationsTitlesArray[i]['id']);
                            }

                            $(document).ready(function () {
                                $("#search_by").val('default');
                                fillDropdawn(beerNamesArray, beerIDsArray, "products_breweries");
                            });

                            $("#search_by").on('change', function () {
                                $("#products_breweries").empty();
                                console.log($("#search_by").val());
                                if ($("#search_by").val() == 'product') {
                                    fillDropdawn(beerNamesArray,beerIDsArray, "products_breweries");
                                } else if ($("#search_by").val() == 'brewery') {
                                    $("#products_breweries").empty();
                                    fillDropdawn(breweryNamesArray, breweryIDsArray, "products_breweries");
                                }

                            });



                            $(document).on('change', '#search_by', function (){
                                var chosenval = $("#search_by").val();
                                console.log(chosenval);
                                if(chosenval == 'product' ) {
                                    for (let i = 1; i < 5; i++) {
                                        $(document).on("click", "#" + i + "", function () {
                                              var tt =  ajaxRequest(i);

                                        });
                                    }
                                    $("#teeeest").text("Select beers");
                                    $(".search-block-with-button").css("display", "flex");
                                    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                                        $(".search-block-with-button").css("display", "none");
                                    } else {
                                        $(".search-block-with-button").css("display", "flex");
                                    }
                                } else if (chosenval=='brewery') {
                                    for(let i = 1; i <5; i++) {
                                        $(document).on( "click", "#" + i +"", function(){
                                            $.ajax({
                                                type: "GET",
                                                url: '/breweryLocation/' + i,
                                            }).done(function( test1 ) {
                                                $("#left-box").html(test1);
                                            });
                                        });
                                    }
                                    $("#teeeest").text("Select breweries");
                                    $(".search-block-with-button").css("display", "none");
                                }

                            })


                            $(document).on( "click", "#search-btn-icon", function() {
                                var inputedText = $("#search-input").val()
                                console.log(inputedText);
                                $.ajax({
                                    type: "GET",
                                    url: '/beer-search/'+inputedText,
                                }).done(function( response ) {
                                    if(response == 'Empty'){
                                        $("#left-box").html("<p style='direction: ltr; text-align: center;'>No results for <b>" + inputedText + "<b></p>");

                                    } else {
                                        var test = Object.keys(response);
                                        $("#left-box").html("");

                                        var MarkersCoordinates  = [];
                                        for (let q = 0; q < test.length; ++q) {
                                            var coordinates = [response[q]["lat"], response[q]["lon"]];
                                            MarkersCoordinates.push(coordinates);
                                            returnDiv("#left-box",response[q]["title"],  response[q]["image_url"], response[q]["address"], response[q]["phone"],response[q]["id"] )
                                        }
                                        setMarkers(MarkersCoordinates);
                                    }

                                });
                            });


                                $(document).on( "click", "#back", function() {
                                let products_breweries_id = $("#products_breweries").val();
                                let beer_id = $("#search_by").val();
                                if(beer_id == 'product'){
                                    if(products_breweries_id === "default") {
                                        $("#left-box").html("");
                                        var response = <?php echo json_encode($locations) ?>;
                                        var locations_keys = Object.keys(response);
                                        for(let q = 0; q<locations_keys.length; q++) {
                                            returnDiv("#left-box",response[q]["title"],  response[q]["image_url"], response[q]["address"], response[q]["phone"],response[q]["id"] )
                                        }
                                    } else {
                                        $.ajax({
                                            type: "GET",
                                            url: '/beer/' + products_breweries_id,
                                        }).done(function( response ) {
                                            var test = Object.keys(response);
                                            $("#left-box").html("");

                                            var MarkersCoordinates  = [];
                                            for (let q = 0; q < test.length; ++q) {
                                                var coordinates = [response[q]["lat"], response[q]["lon"]];
                                                MarkersCoordinates.push(coordinates);
                                                returnDiv("#left-box",response[q]["title"],  response[q]["image_url"], response[q]["address"], response[q]["phone"],response[q]["id"] )
                                            }
                                            setMarkers(MarkersCoordinates);
                                        });
                                    }
                                } else if(beer_id == 'brewery') {
                                    if(beer_id === "default") {
                                        $("#left-box").html("");
                                        let id = $("#products_breweries").val();
                                        var response = <?php echo json_encode($breweryLocations) ?>;
                                        var locations_keys = Object.keys(response);
                                        for(let q = 0; q<locations_keys.length; q++) {
                                            returnDiv("#left-box",response[q]["title"],  response[q]["image_url"], response[q]["address"], response[q]["phone"],response[q]["id"] )
                                        }
                                    } else {
                                        $.ajax({
                                            type: "GET",
                                            url: '/brewery-search/' + products_breweries_id,
                                        }).done(function( response ) {
                                            var test = Object.keys(response);
                                            $("#left-box").html("");

                                            var MarkersCoordinates  = [];
                                            for (let q = 0; q < test.length; ++q) {
                                                var coordinates = [response[q]["lat"], response[q]["lon"]];
                                                MarkersCoordinates.push(coordinates);
                                                returnDiv("#left-box",response[q]["title"],  response[q]["image_url"], response[q]["address"], response[q]["phone"],response[q]["id"] )
                                            }
                                            setMarkers(MarkersCoordinates);
                                        });
                                    }
                                }
                            });
                            $(document).on( "change", "#products_breweries", function(){
                                let choosenvariant = $("#search_by").val();
                                if(choosenvariant=="product") {
                                    let id = $("#products_breweries").val();
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
                                            returnDiv("#left-box",response[q]["title"],  response[q]["image_url"], response[q]["address"], response[q]["phone"],response[q]["id"] )
                                        }
                                        setMarkers(MarkersCoordinates);
                                    });
                                } else if (choosenvariant=="brewery") {
                                    let id = $("#products_breweries").val();
                                    $.ajax({
                                        type: "GET",
                                        url: '/brewery-search/' + id,
                                    }).done(function( response ) {
                                        var test = Object.keys(response);
                                        $("#left-box").html("");
                                        var MarkersCoordinates  = [];
                                        for (let q = 0; q < test.length; ++q) {
                                            var coordinates = [response[q]["lat"], response[q]["lon"]];
                                            MarkersCoordinates.push(coordinates);
                                            returnDiv("#left-box",response[q]["title"],  response[q]["image_url"], response[q]["address"], response[q]["phone"],response[q]["id"] )
                                        }
                                        setMarkers(MarkersCoordinates);
                                    });
                                }

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



