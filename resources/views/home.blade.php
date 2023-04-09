@include('header')


<div id="carouselExampleFade" class="carousel slide carousel-fade mb-4" data-bs-ride="carousel">
    <div class="carousel-inner">
    @foreach ($carousel_imgs as $img)
        <div class="carousel-item">
            <a href="" class=""><img src="imgs/{{$img -> imgs}}" style="max-height: 550px;" class="d-block w-100" alt="..."></a>
        </div>
    @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="content">

    <div class="main-categories">
        @foreach (session('categories') as $category)


        <div class="category">
            <a href="http://127.0.0.1:8000/products/{{ $category['name']  }}" class="link-categories">
                <div class="block-categories">
                    <div class="categories-img">
                        <img src="imgs/category1.jpg" alt="">
                    </div>
                    <div class="categories-name">
                    {{ $category['rus_name'] }}
                    </div>
                </div>
            </a>
        </div>
        @endforeach


    </div>

    <div id="app">
        <latest-prod />
    </div>

</div>

@include('footer')
