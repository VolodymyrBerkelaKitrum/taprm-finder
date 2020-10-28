<h2>Location Name: </h2>
<p>{{ $location->title }}</p>

<h3>Location Belongs to</h3>

<ul>
    @foreach($location->beers as $bear)
        <li>{{ $bear->name }}</li>
    @endforeach
</ul>