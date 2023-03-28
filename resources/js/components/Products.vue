<script>
import Slider from '@vueform/slider'

export default {
    props: ['data', 'category', 'brands', 'price_range', 'checked_brands'],
    components: {
        Slider,
    },
    data() {
        return {
            value: [this.price_range[0], this.price_range[1]],
            orderby: [
                { name: 'цене, сначало недорогие', id: 1 },
                { name: 'цене, сначало дорогие', id: 2 },
                { name: 'наименованию А-Я', id: 3 },
                { name: 'наименованию Я-А', id: 4 }],
            order_id: 1,

        };
    },

    created() {

        // for navigation elements
        this.data['links'][0]['label'] = '<'
        this.data['links'][Object.keys(this.data['links']).length - 1]['label'] = '>'
        // --
       

        

    },
    methods: {
        orderClick: function (e) {
            this.order_id = e
        },
        sortClick: function () {




            var list = document.getElementsByClassName('form-check-input');
            var brands = new Array()
          
            Array.from(list).forEach(function (el) {
                if (el.checked) brands.push(el.id)
            });



            window.location.href = "http://127.0.0.1:8000/products/" + this.category + "/sort/?order_id=" + this.order_id + "&min_price=" + this.value[0] + "&max_price=" + this.value[1]  + "&brands=" + brands

        }

    }
}
</script>
<template>
    <div class="content mt-3 mb-3 radius-content px-3">
        <div class="catalog">
            <div class="catalog-filter">
                <div class="filter-row">
                    <h4>Сортировать по:</h4>
                    <div class="filter">
                        <div class="dropdown myselect">

                            <select class="form-select" v-on:change="orderClick($event.target.value)"
                                aria-label="Default select example">
                                <option v-for="item in this.orderby" v-bind:value="item.id">{{ item.name }}</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="filter-row">
                    <h4>Цена</h4><br>
                    <div style="padding-right: 10px;">
                        <Slider v-model="value" :max="20000" />

                    </div>

                </div>
                <div class="filter-row">
                    <h4>Бренды</h4>
                    <div class="filter">
                        <div v-for="item in this.brands" class="form-check">
                            <input v-if="this.checked_brands.includes(item[0].id)"   class="form-check-input" type="checkbox" value="" v-bind:id="item[0].id" checked>
                            <input v-else class="form-check-input" type="checkbox" value="" v-bind:id="item[0].id">

                            <label class="form-check-label" for="flexCheckDefault">
                                {{ item[0].name }}
                            </label>
                        </div>

                    </div>
                </div>

                <div class="filter-row d-flex justify-content-center">
                    <button class="btn btn-primary" @click="sortClick">Применить</button>
                </div>
            </div>
            <div class="catalog-products">
                <h3>Смартфоны</h3>
                <div class="products-view">
                    <button><i class="fa fa-th" aria-hidden="true"></i>
                    </button>
                    <button><i class="fa fa-th-list" aria-hidden="true"></i>
                    </button>

                </div>
                <div class="catalog-products-grid">
                    <div v-for="item in this.data.data" class="catalog-product-item">
                        <div class="catalog-product-image">
                            <img v-bind:src="'http://127.0.0.1:8000/imgs/' + item.mainimg" alt="">
                        </div>
                        <div class="catalog-product-price">{{ item.price }}₽</div>
                        <div class="catalog-product-name">
                            <a
                                v-bind:href="'http://127.0.0.1:8000/product/' + item.id + '-' + item.name.split(' ').join('-')">{{
                                    item.name
                                }}</a>
                        </div>
                        <div class="add-product">
                            <a href="#" class="add-product-link">В корзину
                            </a>
                        </div>
                    </div>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item" v-for="link in this.data.links"><a class="page-link" v-bind:href="link.url">

                                <div> {{ link.label }}</div>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>
</template>
<style src="@vueform/slider/themes/default.css"></style>
