@include('header')

<div id="app">
    <product :data='@json($product)'/>
</div>

@include('footer')
