<script>
export default {
    props: ['data'],
}
</script>
<template>
    <div class="content mt-3 mb-3 radius-content">
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
                    <div class="range-slider" id="polzunok"></div>
                    <span class="range-label" id="result-polzunok"></span>

                </div>
                <div class="filter-row">
                    <h4>Бренды</h4>
                    <div class="filter">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Бренд №1
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                                Бренд №2
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
                    <div v-for="item in this.data" class="catalog-product-item">
                        <div class="catalog-product-image">
                            <img v-bind:src="'http://127.0.0.1:8000/imgs/' + item.mainimg" alt="">
                        </div>
                        <div class="catalog-product-price">{{ item.price }}</div>
                        <div class="catalog-product-name">
                            <a v-bind:href="'http://127.0.0.1:8000/product/' + item.id + '-' + item.name.split(' ').join('-')">{{item.name }}</a>
                        </div>
                        <div class="add-product">
                            <a href="#" class="add-product-link">В корзину
                            </a>
                        </div>
                    </div>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
</div></template>