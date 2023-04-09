<!DOCTYPE html>
<html lang="en">

<head>

    <title><? echo $title ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="/css/app.css" rel="stylesheet" />

</head>

<body>
    <header>
        <div class="header-ad">
            <div class="content">
                <div class="social-link">
                    <a class="social-link-item"><i class="fa fa-telegram" aria-hidden="true"></i>
                    </a>
                    <a class="social-link-item"><i class="fa fa-vk" aria-hidden="true"></i>
                    </a>
                    <a class="social-link-item"><i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="search-workers">
                    <a href="#">Работа в Tech-DPR</a>
                </div>
                <div class="phones">
                    <a>+7 (949) 453-19-81</a>
                </div>
                <div class="phones">
                    <a>+7 (949) 453-19-79</a>
                </div>
                <div style="font-weight: 500;">
                    Ежедневно 9:00-18:00
                </div>


            </div>
        </div>
        <div class="content">
            <div class="header-row">
                <div class="header-top">
                    <a href="/">Главная</a>
                    <a href="">Покупателям</a>
                    <a href="">Гарантии и возврат</a>
                    <a href="">Доставка и оплата</a>
                </div>
                <div class="mobile-header">
                    <img src="http://127.0.0.1:8000/imgs/logo.png" alt="">
                </div>
                <div class="header-bottom">
                    <div class="header-bottom-left">
                        <div class="header-logo">
                            <img src="http://127.0.0.1:8000/imgs/logo.png" alt="">

                        </div>
                        <div class="header-dropdown">
                            <button data-path="one" class="dropbtn">
                                Категории
                            </button>
                            <ul data-target="one" class="mydropdown-menu" aria-labelledby="dropdownMenuButton">
                                @foreach (session('categories') as $category)
                                <li><a class="mydropdown-item" href="http://127.0.0.1:8000/products/{{ $category['name']  }}">{{ ucfirst($category['rus_name']) }}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <form action="/search" method="get" class="form-search needs-validation" validate>
                    <div class="header-search">
                            <input type="text" name="name" id="search_input" placeholder="Введите название товара" required />
                            <button type="submit"><i class="fa fa-search" required aria-hidden="true"></i></button>
                    </div>
                    </form>

                    <div class="header-cart">
                        <a class="header-link" href="/cart">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            Корзина
                        </a>
                        <div class="cart-qty">
                            <p class="cart-qty-p">{{ session('cart_count') }}</p>
                        </div>
                    </div>

                    @auth
                    <div class="header-account">
                        <a class="header-link" href="/profile">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <div style="text-overflow: ellipsis; overflow: hidden;  white-space: nowrap; width: 100%;">{{auth()->user()->name}}</div>

                        </a>
                    </div>
                    @endauth

                    @guest
                    <div class="header-account">
                        <a class="header-link" href="/profile">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            Вход
                        </a>
                    </div>
                    @endguest

                </div>
            </div>
        </div>

    </header>
