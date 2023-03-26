@include('header')

<div id="app">
    <products :data='@json($products)' :brands = '@json($brands)' :category = '@json($category)' :price_range = '@json($price_range)'/>
</div>


@include('footer')
