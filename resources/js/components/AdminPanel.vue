<script>
export default {
    data() {
        return {
            data_id: null,
            modal_data: null,
            tab_data: null,
            tab_name: null,
            tab_columns: null
        };
    },
    created() {
        axios
                .get('http://127.0.0.1:8000/getdb', {
                    params: {
                        dbname: 'products'
                    }
                })
                .then(response => {
                    this.tab_data = response.data[0]
                    this.tab_data['links'][0]['label'] = '<'
                    this.tab_data['links'][Object.keys(this.tab_data['links']).length - 1]['label'] = '>'
                    this.tab_name = 'products'
                    this.tab_columns = response.data[1]
                    

                })
                .catch(error => {
                    console.log(error);
                })
    }
    
        ,
    methods: {
        modalClick: function (e) {
            this.data_id = e.id;
            if (this.data_id != 'slider') {
                axios
                    .get('http://127.0.0.1:8000/getdbdata', {
                        params: {
                            id: this.data_id
                        }
                    })
                    .then(response => {
                        console.log(response.data)
                        this.modal_data = response.data
                    })
                    .catch(error => {
                        console.log(error);
                    })
            }

        },
        tabClick: function (e) {
            axios
                .get('http://127.0.0.1:8000/getdb', {
                    params: {
                        dbname: e.getAttribute('data-id')
                    }
                })
                .then(response => {
                    this.tab_data = response.data[0]
                    this.tab_data['links'][0]['label'] = '<'
                    this.tab_data['links'][Object.keys(this.tab_data['links']).length - 1]['label'] = '>'
                    this.tab_name = e.getAttribute('data-id')
                    this.tab_columns = response.data[1]
                })
                .catch(error => {
                    console.log(error);
                })

        },

    }
}
</script>

<template>
    <div class="content mt-5 mb-5 radius-content py-3 px-3" style="min-height: 300px">

        <div class="catalog-products-grid" style="grid-auto-rows: 240px!important; ">
            <div class="catalog-product-item d-flex" style="background-color:#ffa218; justify-content:center;">
                <button v-on:click="modalClick($event.target)" id="products" data-bs-toggle="modal"
                    data-bs-target="#dbModal" style="width:100%; background-color: transparent;">Товары</button>

            </div>
            <div class="catalog-product-item d-flex" style="background-color:#ffa218; justify-content:center;">
                <button v-on:click="modalClick($event.target)" id="categories" data-bs-toggle="modal"
                    data-bs-target="#dbModal" style="width:100%; background-color: transparent;">Категории</button>

            </div>
            <div class="catalog-product-item d-flex" style="background-color:#ffa218; justify-content:center;">
                <button v-on:click="modalClick($event.target)" id="slider" data-bs-toggle="modal" data-bs-target="#dbModal"
                    style="width:100%; background-color: transparent;">Слайдер</button>

            </div>
            <div class="catalog-product-item d-flex" style="background-color:#ffa218; justify-content:center;">
                <button v-on:click="modalClick($event.target)" id="orders" data-bs-toggle="modal" data-bs-target="#dbModal"
                    style="width:100%; background-color: transparent;">Заказы</button>

            </div>
            <div class="catalog-product-item d-flex" style="background-color:#ffa218; justify-content:center;">
                <button v-on:click="modalClick($event.target)" id="manufactures" data-bs-toggle="modal"
                    data-bs-target="#dbModal" style="width:100%; background-color: transparent;">Производители</button>

            </div>
            <div class="catalog-product-item d-flex" style="background-color:#ffa218; justify-content:center;">
                <button v-on:click="modalClick($event.target)" id="users" data-bs-toggle="modal" data-bs-target="#dbModal"
                    style="width:100%; background-color: transparent;">Пользователи</button>

            </div>
        </div>

        <div class="modal fade" id="dbModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="dbModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dbModalLabel">{{ this.data_id }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                    </div>
                    <div class="modal-body">

                        <div class="item-bottom mt-3">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                        aria-selected="true">Добавить</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">Изменить</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact" type="button" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">Удалить</button>
                                </li>
                            </ul>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-panel fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <form>

                                        <div v-for="data in this.modal_data" class="mb-3">
                                            <div
                                                v-if="data !== 'email_verified_at' && data !== 'id' && data !== 'created_at' && data !== 'updated_at' && data !== 'remember_token'">
                                                <label class="form-label">{{ data }}</label>
                                                <input type="text" class="form-control db-input" :id="data">
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="tab-panel fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">...</div>
                                <div class="tab-panel fade" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">...</div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Отправить</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Вывод таблиц -->
        <div class="item-bottom mt-3">
            <ul class="nav nav-pills mb-3" style="border: 1px solid #ffa218; border-radius: 8px;" id="pills-tab"
                role="tablist">
                <li class="nav-item" role="presentation">
                    <button v-on:click="tabClick($event.target)" class="nav-link active" data-id="products" data-bs-toggle="pill"
                        data-bs-target="#2pills-products" type="button" role="tab" aria-controls="2pills-products"
                        aria-selected="true">Товары</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button v-on:click="tabClick($event.target)" class="nav-link" data-id="categories" data-bs-toggle="pill"
                        data-bs-target="#2pills-categories" type="button" role="tab" aria-controls="2pills-categories"
                        aria-selected="false">Категории</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button v-on:click="tabClick($event.target)" class="nav-link" data-id="orders" data-bs-toggle="pill"
                        data-bs-target="#2pills-orders" type="button" role="tab" aria-controls="2pills-orders"
                        aria-selected="false">Заказы</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button v-on:click="tabClick($event.target)" class="nav-link" data-id="manufactures"
                        data-bs-toggle="pill" data-bs-target="#2pills-manufactures" type="button" role="tab"
                        aria-controls="2pills-manufactures" aria-selected="false">Производители</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button v-on:click="tabClick($event.target)" class="nav-link" data-id="users" data-bs-toggle="pill"
                        data-bs-target="#2pills-users" type="button" role="tab" aria-controls="2pills-users"
                        aria-selected="false">Пользователи</button>
                </li>

            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-panel"
                    :id="'2pills-' + this.tab_name" role="tabpanel" :aria-labelledby="'2pills-' + this.tab_name + '-tab'">
                {{ this.tab_name }}
                    <table class="table table-striped">
                        <thead>
                            <tr >
                                <th v-for="data in this.tab_columns" scope="col" ><div v-if="data !== 'email_verified_at' && data !== 'id'  && data !== 'remember_token'">{{data }}</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="data in this.tab_data.data">
                                <td v-for="test in data" >{{ test }}</td>

                            </tr>
                           
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item" v-for="link in this.tab_data.links"><a class="page-link" v-bind:href="link.url">

                                <div> {{ link.label }}</div>
                            </a>
                        </li>
                    </ul>
                </nav>
                </div>
             
            </div>

        </div>
    </div>
</template>