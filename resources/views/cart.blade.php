@include('header')

<div id="app">
    <cart :products='@json($products)' :totalprice='@json($totalprice)'/>
</div>
@include('footer')
