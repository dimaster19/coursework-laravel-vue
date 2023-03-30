<script>
import axios from 'axios'

export default {

    data() {
        return {
            latest: null,
        };
    },
    mounted() {
        axios
            .post('/getpopular')
            .then(response => {

                this.latest = response.data

            })
            .catch(error => {
                console.log(error);
            })
    },
    methods: {
        toCartClick: function (e) {

            let id = e.getAttribute('data-id')
            axios
                .get('http://127.0.0.1:8000/addtocart', {
                    params: {
                        id: id
                    }
                })
                .then(response => {
                    console.log (response)
                    if (response.data == false) alert('Товар уже есть в корзине')
                    else {
                        var qty = document.getElementsByClassName('cart-qty-p')[0]
                        qty.textContent = response.data
                    }

                })
                .catch(error => {
                    console.log(error);
                })

        },

        delFromCartClick: function (e) {

            let id = e.getAttribute('data-id')
            axios
                .get('http://127.0.0.1:8000/addtocart', {
                    params: {
                        id: id
                    }
                })
                .then(response => {
                    if (response.data == 0) alert('Товар уже есть в корзине')
                    else {
                        var qty = document.getElementsByClassName('cart-qty-p')[0]
                        qty.textContent = response.data
                    }


                })
                .catch(error => {
                    console.log(error);
                })

        }
    },
};
</script>

<template>
    <div class="products-heading">
        <h1>
            <svg width="38" height="16" viewBox="0 0 38 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="38" height="16" rx="8" fill="#FFCE1F"></rect>
            </svg>
            <p style="margin-bottom: 0!important;">Новинки</p>
        </h1>
    </div>
    <div class="products">

        <div v-for="one in this.latest" class="product-item" v-bind:id="one.id">
            <div class="product-image">
                <img v-bind:src="'imgs/' + one.mainimg" v-bind:alt="one.name">
            </div>
            <div class="product-price">{{ one.price }}₽</div>
            <div class="product-name"><a v-bind:href="'/product/' + one.id + '-' + one.name.split(' ').join('-')">{{
                one.name }}</a></div>
            <div class="add-product">
                <a @click.prevent="toCartClick($event.target)" href="" v-bind:data-id="one.id" class="add-product-link">В
                    корзину
                </a>

            </div>


        </div>

    </div>
</template>