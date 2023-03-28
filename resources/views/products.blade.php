@include('header')

<div id="app">
    <products :data='@json($products)' :brands = '@json($brands)' :checked_brands = '@json($checked_brands)' :category = '@json($category)' :price_range = '@json($price_range)'/>
</div>


@include('footer')
