require('./bootstrap');
import { createApp } from 'vue';
import Latest from './components/LatestProductsComponent.vue'
import Welcome from './components/Welcome.vue'
import Product from './components/Product.vue'
import Register from './components/Register.vue'
import Products from './components/Products.vue'



let app=createApp()
app.component('latest-prod', Latest)
app.component('hello-world', Welcome)
app.component('product', Product)
app.component('register', Register)
app.component('products', Products)

app.mount('#app');

