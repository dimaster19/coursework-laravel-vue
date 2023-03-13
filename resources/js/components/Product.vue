<script>
import { resetTracking } from '@vue/reactivity';
import axios from 'axios'

export default {
    props: ['data'],
    data() {
        return {
            flag: 0,
            slider: null
        };
    },
    created() {
        this.data.imgs = this.data.imgs.split(',');
  
        
    },

    mounted() {
        var arr = new Array;
        var i = 0

        this.data.imgs.forEach(function (entry) {
            arr[i] = i+1
            i++

        });

        this.slider = arr;

    },
    methods: {

    },
};
</script>

<template>
    <div class="content product-content mt-3 mb-3 radius-content">
        <div class="item-block">
            <div class="item-pics">
                <div class="item-main-pic">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" v-bind:data-bs-slide-to="0"
                                class="active" aria-current="true"
                                v-bind:aria-label="'Slide ' + this.data.mainimg"></button>
                            <button v-for="num in this.slider" type="button" data-bs-target="#carouselExampleIndicators"
                                v-bind:data-bs-slide-to="num" v-bind:aria-label="'Slide ' + num"></button>

                        </div>

                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img v-bind:src="'http://127.0.0.1:8000/imgs/' + this.data.mainimg" class="d-block w-100"
                                    v-bind:alt="this.data.mainimg">
                            </div>
                            <div v-for="img in this.data.imgs" v-bind:id="img" class="carousel-item">
                                <img v-bind:src="'http://127.0.0.1:8000/imgs/' + img" class="d-block w-100"
                                    v-bind:alt="img">
                            </div>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Предыдущий</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Следующий</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="item-title">
                <h3>{{ this.data.name }}</h3>
                <h3><strong>{{ this.data.price }}&nbsp&#8381</strong></h3>
                <div class="articul">
                    Артикул:&nbsp
                    <div class="articul-num">{{ this.data.id }}</div>
                </div>
                <div v-if="this.data.id > 0">
                    <div class="availability mt-2">
                        <div class="availability-true">Есть в наличии</div>
                    </div>
                    <form action="" class="item-to-cart mt-2">
                        <input type="number" id="itemCounr" class="form-control" min="1" value="1"
                            v-bind:max="this.data.count">
                        <button type="submit" class="btn btn-primary">В корзину</button>
                    </form>
                </div>
                <div v-else>
                    <div class="availability mt-2">
                        <div class="availability-false">Нет в наличии</div>
                    </div>
                    <form action="" class="item-to-cart mt-2">
                        <input type="number" id="itemCounr" class="form-control" min="0" value="0" max="0">
                        <button type="submit" class="btn btn-primary" disabled>В корзину</button>
                    </form>
                </div>


            </div>
        </div>
        <div class="item-bottom mt-3">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                        type="button" role="tab" aria-controls="pills-home" aria-selected="true">Описание</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                        type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Характеристики</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
                        type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Отзывы</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    {{ this.data.desc }}</div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
            </div>
        </div>

    </div>
</template>