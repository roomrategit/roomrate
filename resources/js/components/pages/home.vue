<template>
          <main class="content">

<section class="main" style="background-image: url(public/static/img/main-bg.jpg);">
    <div class="container">
        <div class="main__inner">
            <h1 class="main__title display1">
                Делитесь опытом и узнавайте живые отзывы об арендодателях - каждый день!
            </h1>

            <div class="filter">
                <div class="filter__fields">
                    <fieldset class="filter__type fg">
                        <select class="m-select">
                            <option selected>Квартиру</option>
                            <option>Дом</option>
                            <option>Комната</option>
                        </select>
                    </fieldset>
                    <div class="filter__radios">
                        <div class="filter__radio">
                            <input type="radio" name="size">
                            <label>Студия</label>
                        </div>
                        <div class="filter__radio">
                            <input type="radio" name="size">
                            <label>1</label>
                        </div>
                        <div class="filter__radio">
                            <input type="radio" name="size">
                            <label>2</label>
                        </div>
                        <div class="filter__radio">
                            <input type="radio" name="size">
                            <label>3</label>
                        </div>
                        <div class="filter__radio">
                            <input type="radio" name="size">
                            <label>4+</label>
                        </div>
                    </div>
                    <fieldset class="filter__address fg">
                        <input type="text" placeholder="Адрес, ЖК или станция метро">
                    </fieldset>
                </div>
                <button class="filter__btn m-btn m-btn-accent">
                    <span>Смотреть отзывы</span>
                </button>
            </div>
        </div>
    </div>
</section>

</main>
</template>
  
<script>
export default {
    
}
</script>

<style>

</style>