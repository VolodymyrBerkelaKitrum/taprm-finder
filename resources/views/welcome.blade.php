<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
<script type="text/javascript" src="{{ URL::asset('/js/script.js') }}"></script>
<link href="//db.onlinewebfonts.com/c/6c79f7fd645c0d39b4ca10428237984a?family=Azo+Sans" rel="stylesheet" type="text/css"/>

<div class="page-width">
    <head>
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsCWfyl2o-cTM849oNzsxmkkNhnnZN3nE&callback=initMap&libraries=&v=weekly"
            defer
        ></script>
        <link rel="stylesheet" type="text/css" href="./style.css"/>
        <script src="./index.js"></script>
    </head>
    <h3 style="text-align: center; ">Find your favorite, beer or brewer at your local retailers </h3>
    <div id="map-with-search">
        <div id="left-box" style="float: left">
            Test info
        </div>
        <div id="right-box">
            <div id="filters">
                <label for="beers" style="margin: auto 1% auto 0; font-size: 15px;">Filter results by:</label>
                <select name="beers" id="beers">
                    <option value="-33.890542, 151.274856">beer1</option>
                    <option value="-33.923036, 151.259052">beer2</option>
                </select>
                <label for="cities" style="margin: auto 1%; font-size: 15px;">Select products:</label>
                <select name="cities" id="cities">
                    <option value="New York">New York</option>
                    <option value="Chicago">Chicago</option>
                </select>
                <input id="search-input" type="text" placeholder="Search" name="search">
                <button id="search-btn-icon" type="submit">
                    <i class="fa fa-search" style="background:white;"></i>
                </button>
            </div>
            <br>
            <div id="map"></div>
        </div>

    </div>
</div>


