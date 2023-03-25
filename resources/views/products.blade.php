@include('header')

<div id="app">
    <products :data='@json($products)'/>
</div>


@include('footer')
