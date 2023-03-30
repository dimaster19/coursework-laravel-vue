<script>
export default {
    props: ['products', 'totalprice'],

    mounted() {
        console.log (this.products)
        console.log (this.totalprice)
    }
}
</script>
<template>
    <div class="content mt-3 mb-3">
     <h1>Корзина</h1>
     <div class="cart-items">
       
                 <div v-if="this.products !== null" v-for="item in this.products"  class="cart-item " :id="item.id">
                     <div class="cart-product">
                         <div class="cart-product-img">
                            <img v-bind:src="'http://127.0.0.1:8000/imgs/' + item.mainimg" alt="">
                         </div>
                         <div class="cart-product-name">
                            <a v-bind:href="'http://127.0.0.1:8000/product/' + item.id + '-' + item.name.split(' ').join('-')">{{ item.name }}</a>
                         </div>
                     </div>
                     <div class="cart-count item-to-cart"><input type="number" id="itemCount" class="form-control" min="1" value="1" :max="item.count"></div>
                     <div class="cart-total">
                         <p>{{ item.price }}</p>
                     </div>
                     <div class="cart-remove">
                         <a href="" class="del-product-link" :data-id="item.id"><i class="fa fa-minus" aria-hidden="true"></i>
                         </a>
                     </div>
                 </div>
                 <div v-else>
                    <h3>{{ this.desc }}</h3>
                 </div>
      
         <div class="cart-item d-flex w-100" style="justify-content: center">
             <div style="font-size: 18px; font-weight: 700; margin: 0 20px" id="totalPrioce">Итого: <span style="color: green">{{ totalprice }} ₽</span></div>
             <div style="font-size: 18px; font-weight: 700; margin: 0 20px" id="totalCount">Количество: <span style="color: green">0</span></div>
 
         </div>
     </div>
 
     <div class="cart-form">
         <form>
             <div class="cart-form-col">
                 <div class="mb-3">
                     <label for="inputName" class="form-label">Ваше имя</label>
                     <input type="text" class="form-control" id="inputName">
                 </div>
                 <div class="mb-3">
                     <label for="inputPhone" class="form-label">Телефон</label>
                     <input type="text" class="form-control" id="inputPhone" value="+ 7 (949)">
                 </div>
             </div>
             <div class="cart-form-col">
                 <div class="mb-3">
                     <label for="inputPhone" class="form-label">Комментарий к заказку</label>
                     <textarea class="form-control"></textarea>
 
                 </div>
                 <div class="mb-3">
                     <div class="form-check">
                         <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                         <label class="form-check-label" for="flexRadioDefault1">
                             Доставка
                         </label>
                     </div>
                     <div class="form-check">
                         <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                         <label class="form-check-label" for="flexRadioDefault2">
                             Самовывоз
                         </label>
                     </div>
                 </div>
 
             </div>
         </form>
         <button type="button" class="btn btn-primary">Подтвердить заказ</button>
     </div>
 </div>
 </template>