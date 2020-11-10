<style>
    #left-box {
        direction: ltr!important;
    }
    #back {
        border-radius: 0;
        background-color: #FEBD19;
        color: white;
        padding: 3%;
        border-color: #FEBD19;
        display: block;
        margin: 0 auto;
        font-size: 15px;
    }
</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"
        type="text/javascript"></script>

<h2>{{ $breweryLocation->title }}</h2>
<p>{{ $breweryLocation->address }}, {{$breweryLocation->phone}}</p>
<p>{{ $breweryLocation->lon }}, {{$breweryLocation->lat}}</p>


<p>Inventory:</p>
<ul id="test">
</ul>



<button id="back">Back</button>
<script>

    $(document).ready(function (){
        console.log(4444);
        let id = 13;
        $.ajax({
            type: "GET",
            url: '/brewery/' + id + '/beers' ,
        }).done(function( response ) {
            var locations_keys = Object.keys(response);
            for (let i =0; i<locations_keys.length; ++i)
            {
                $("#test").append('<li>'+ response[i]['name'] +'</li>');


            }
            console.log(response[0]['name'], 'jksdfjsdhfksdhksdfsfksldfksfsdhlfsdhfjlhsdfl');
        });
    });


    var MarkersCoordinates  = [];
    var coordinates = [{{ $breweryLocation->lat }}, {{ $breweryLocation->lon }}];
    MarkersCoordinates.push(coordinates);
    setMarkers(MarkersCoordinates);
</script>
