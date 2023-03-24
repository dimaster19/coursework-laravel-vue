@include('header')

<div id="app">
<div class="content mt-3 mb-3 radius-content py-3 px-3">

    <div class="d-flex justify-content-between">
        <h2>Аккаунт</h2>
        <a href="/logout" class="font-size:16px;  cursor: pointer;">Выйти</a>
    </div>


    <div class="item-bottom mt-3">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Информация</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Заказы</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Бонусы</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <form action=""  class="row g-3 needs-validation" validate>
                    <div class="col-md-6">
                        <input disabled type="email" name="email" aria-label="E-mail" placeholder="{{auth()->user()->email}}" required="" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <input disabled type="text" aria-label="Имя" name="name" placeholder="{{auth()->user()->name}}" value="" required="" class="form-control">
                    </div>
                    <div disabled class="col-12 d-flex" style="align-items: center;">
                        <button disabled class="btn btn-primary" type="submit">Сохранить</button>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
        </div>
    </div>



</div>

</div>

@include('footer')
