<h2>Beer Name: </h2>
<p>{{ $beer->name }} || ${{ $beer->price }}</p>

<h3>Product Belongs to</h3>

<ul>
    @foreach($beer->locations as $location)
        <li>{{ $location->title }}</li>
    @endforeach
</ul>