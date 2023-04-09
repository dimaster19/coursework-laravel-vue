<script>

export default {
    props: ['products', 'search'],
    data() {
        return {
          
        };
    },
   created() {
    console.log(this.products)

   },
   mounted() {
    var search_input = document.getElementById('search_input')
    console.log (search_input)
    search_input.value = this.search
   },

    methods: {

    },
};
</script>

<template>
    <div class="content mt-5 mb-5 radius-content py-3 px-3" style="min-height: 300px">
        <h3>Результаты поиска</h3>
        <div class="products">

            <div v-for="one in this.products" class="product-item" v-bind:id="one.id">
                <div class="product-image">
                    <img v-bind:src="'imgs/' + one.mainimg" v-bind:alt="one.name">
                </div>
                <div class="product-price">{{ one.price }}₽</div>
                <div class="product-name"><a v-bind:href="'/product/' + one.id + '-' + one.name.split(' ').join('-')">{{
                    one.name }}</a></div>
                <div class="add-product">
                    <a @click.prevent="toCartClick($event.target)" href="" v-bind:data-id="one.id"
                        class="add-product-link">В
                        корзину
                    </a>

                </div>


            </div>

        </div>
    </div>
</template>