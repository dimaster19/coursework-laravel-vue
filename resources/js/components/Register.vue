<template>
    <div class="content mt-3 mb-3 radius-content py-3 px-3">
        <form method="post" action="/signup" class="row g-3 needs-validation" validate>
            <input type="hidden" name="_token" :value="csrf">
            <div class="col-md-6">
                <input type="text" class="form-control" name="name" placeholder="Имя, Фамилия" required maxlength="255"
                    value="">
            </div>
            <div class="col-md-6">
                <input type="email" class="form-control" name="email" placeholder="Адрес почты" required maxlength="255"
                    value="">
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control" name="password" placeholder="Придумайте пароль" required
                    maxlength="255" minlength="8" value="">
            </div>
            <div class="col-12 d-flex">
                <button type="submit" class="btn btn-primary">Регистрация</button>
                <a class="mx-2" style="margin: 5px 0;" href="/signin">Уже есть аккаунт?</a>

            </div>
        </form>
    </div>
</template>
 
<script>
export default {
    data: () => ({
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    }),
}
</script>