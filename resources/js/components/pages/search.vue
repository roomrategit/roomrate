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
                    <select v-model="filters.type" class="m-select">
                        <option value="1">Квартиру</option>
                        <option value="2">Дом</option>
                        <option value="3">Комната</option>
                    </select>
                </fieldset>
                <div class="filter__radios">
                    <div class="filter__radio">
                        <input v-model="filters.size" value="4" type="radio" name="size">
                        <label>Студия</label>
                    </div>
                    <div class="filter__radio">
                        <input v-model="filters.size" value="5" type="radio" name="size">
                        <label>1</label>
                    </div>
                    <div class="filter__radio">
                        <input v-model="filters.size" value="6" type="radio" name="size">
                        <label>2</label>
                    </div>
                    <div class="filter__radio">
                        <input v-model="filters.size" value="7" type="radio" name="size">
                        <label>3</label>
                    </div>
                    <div class="filter__radio">
                        <input v-model="filters.size" value="8" type="radio" name="size">
                        <label>4+</label>
                    </div>
                </div>
                <fieldset class="filter__address fg">
                    <input type="text" placeholder="Адрес, ЖК или станция метро">
                </fieldset>
            </div>
            <button @click="search" class="filter__btn m-btn m-btn-accent">
                <span>Смотреть отзывы</span>
            </button>
        </div>
        <div class="search__grid">
            <div class="search__items">
              <div class="search-card" v-for="(advertisement, index) in advertisements" :key="index">
                    <a href="" class="search-card__img">
                        <img :src="advertisement.gallery[0]" alt="">
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
        advertisements: [],
        filters: {
            type: 1,
            size: 5
        }
      }
    },
    mounted(){
      this.getObjects()
    },
    methods: {

      getObjects(){

        let filterStr = "";

        for(let filter in this.filters){

            filterStr += this.filters[filter] + ","
        }
    
        axios.get( '/api/advertisements?filters=' + filterStr.slice(0, -1) ).then(res=>{  
                       
            this.advertisements = res.data.data

        }).catch(err => {

            console.log(err.response)            
        })         
      },
      search(){

          this.getObjects()
      }
    }
}
</script>

<style>

</style>