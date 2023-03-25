@include('header')

<div id="app">
    <products :data='@json($products)' :brands = '@json($brands)'/>
</div>


@include('footer')
