<script>
import Slider from '@vueform/slider'

export default {
    props: ['data', 'brands' ],
    components: {
      Slider,
    },
    data() {
        return {
            value: [20, 20000]
        };
    },

    created() {

        // for navigation elements
        this.data['links'][0]['label'] = '<'
        this.data['links'][Object.keys(this.data['links']).length - 1]['label'] = '>'
        // --
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
                        <div class="dropdown">
                            <button class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                цене, сначало дорогие
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">цене, сначало недорогие</a></li>
                                <li><a class="dropdown-item" href="#">наименованию А-Я</a></li>
                                <li><a class="dropdown-item" href="#">наименованию Я-А</a></li>
                            </ul>
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
                            <input class="form-check-input" type="checkbox" value="" v-bind:id="item">
                            <label class="form-check-label" for="flexCheckDefault">
                                {{ item }}
                            </label>
                        </div>
                        
                    </div>
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
