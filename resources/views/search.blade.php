@include('header')
<div id="app">
<poisk :products='@json($products)' :search='@json($name)'/>
</div>
@include('footer')
