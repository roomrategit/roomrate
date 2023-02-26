<template>
        <main class="content">

<section class="search">
    <div class="container">
        <h1 class="search__title display1">
            Результаты поиска
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
        <div class="search__grid">
            <div class="search__items">
              <div class="search-card" v-for="(advertisement, index) in advertisements" :key="index">
                    <a href="" class="search-card__img">
                        <img src="public/static/img/apart.webp" alt="">
                    </a>
                    <div class="search-card__content">
                        <router-link :to="'/advertisement/' + advertisement.id" style="text-decoration:none;">{{  advertisement.title }}</router-link>
                        <div class="search-card__desc text18 gray-text">
                             {{  advertisement.description  }}
                        </div>
                        <div class="search-card__bottom">
                        <div class="text18 gray-text">
                            Рейтинг:
                        </div>
                        <div class="rating-num">
                            <img src="public/static/img/star.svg" alt="">
                            <span class="text18">
                              {{  advertisement.rating  }}
                            </span>
                        </div>
                      </div>
                  </div>
              </div>
            </div>
            <div class="map"></div>
        </div>
    </div>
</section>

</main>
</template>
  
<script>
import axios from 'axios'
export default {

    data(){
      return{
        advertisements: []
      }
    },
    mounted(){
      this.getObjects()
    },
    methods: {

      getObjects(){

        axios.get( '/api/advertisements' ).then(res=>{  
                        
          this.advertisements = res.data.data
        })        
      }
    }
}
</script>

<style>

</style>