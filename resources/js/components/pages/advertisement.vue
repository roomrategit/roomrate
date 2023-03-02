<template>
    <registration-component v-if="register_modal" @status="modalClose" ></registration-component>
    <main class="content">

        <section class="apart">
            <div class="container">
                <div class="apart__top">
                    <div class="apart__info">
                        <h1 class="display1">
                            {{  this.advertisement.title  }}
                        </h1>
                        <div class="apart__reviews">
                            <div class="rating-num">
                                <img src="/public/static/img/star.svg" alt="">
                                <span class="text18"> {{  this.advertisement.rating  }} </span>
                            </div>
                            <span class="text18"> {{ this.advertisement_count }} отзывов </span>
                        </div>
                    </div>

                    <div class="apart__desc text18">
                        Чтобы оставить отзыв, необходимо
                        <a style="cursor:pointer;">войти</a> <br>
                        или
                        <a style="cursor:pointer;" v-on:click="getRefisterForm()" >зарегистрироваться</a>
                    </div>

                </div>

                <div class="gallery">
                    <div class="gallery-card"> 
                        <a href="/public/static/img/gallery.webp" data-fancybox="gallery" class="gallery-card__img">
                            <img src="/public/static/img/gallery.webp" alt="">
                        </a>
                    </div>

                    <div class="gallery-card">
                        <a href="/public/static/img/gallery2.webp" data-fancybox="gallery" class="gallery-card__img">
                            <img src="/public/static/img/gallery2.webp" alt="">
                        </a>
                    </div>

                    <div class="gallery-card">
                        <a href="/public/static/img/gallery3.webp" data-fancybox="gallery" class="gallery-card__img">
                            <img src="/public/static/img/gallery3.webp" alt="">
                        </a>
                    </div>

                    <div class="gallery-card">
                        <a href="/public/static/img/gallery4.webp" data-fancybox="gallery" class="gallery-card__img">
                            <img src="/public/static/img/gallery4.webp" alt="">
                        </a>
                    </div>

                    <div class="gallery-card">
                        <a href="/public/static/img/gallery5.webp" data-fancybox="gallery" class="gallery-card__img">
                            <img src="/public/static/img/gallery5.webp" alt="">
                        </a>
                    </div>
                </div>

                <div class="stat">
                    <div class="stat__top">
                        <div class="rating-num">
                            <img src="/public/static/img/star.svg" alt="">
                            <span class="text26">
                                {{  this.advertisement.rating  }}
                            </span>
                        </div>
                        <span class="text26">
                            {{ this.advertisement_count }} отзывов
                        </span>
                    </div>
                    <div class="stat__items">

                        <div class="stat-card">
                            <div class="stat-card__title text18">
                                Чистота
                            </div>
                            <div class="stat-card__nums">
                                <div class="stat-card__progress">
                                    <span data-current="4.8" data-max="5" class="stat-card__progress-fill"></span>
                                </div>
                                <div class="stat-card__ball">
                                    <div class="text18">
                                        4.8
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-card__title text18">
                                Местоположение
                            </div>
                            <div class="stat-card__nums">
                                <div class="stat-card__progress">
                                    <span data-current="5.0" data-max="5" class="stat-card__progress-fill"></span>
                                </div>
                                <div class="stat-card__ball">
                                    <div class="text18">
                                        5.0
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-card__title text18">
                                Общение
                            </div>
                            <div class="stat-card__nums">
                                <div class="stat-card__progress">
                                    <span data-current="2.0" data-max="5" class="stat-card__progress-fill"></span>
                                </div>
                                <div class="stat-card__ball">
                                    <div class="text18">
                                        2.0
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-card__title text18">
                                Оправдание цены
                            </div>
                            <div class="stat-card__nums">
                                <div class="stat-card__progress">
                                    <span data-current="3.0" data-max="5" class="stat-card__progress-fill"></span>
                                </div>
                                <div class="stat-card__ball">
                                    <div class="text18">
                                        3.0
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="feedback">

                    <div class="feedback__items">

                        <div class="feedback-card" v-for="(advertisement, index) in this.advertisement.reviews" :key="index">
                            <div class="feedback-card__top">
                                    <div class="feedback-card__user">
                                        <div class="avatar">
                                            <img src="/public/static/img/avatar.webp" alt="">
                                        </div>
                                        <div class="feedback-card__user-info">
                                            <div class="feedback-card__user-name">
                                                <span class="text16 bold-text">
                                                    {{  advertisement.user.name  }}
                                                </span>
                                            </div>
                                            <div class="feedback-card__user-date">
                                                <span class="text14 gray-text">
                                                    апрель 2020 г.
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="like">
                                        <span class="like__icon"></span>
                                        <span class="like__count text18">
                                            117
                                        </span>
                                    </div>
                                </div>
                            <div class="feedback-card__text text16">
                                <p>
                                {{  advertisement.description  }}
                                </p>
                            </div>

                            <div class="feedback-card__images">

                                <div class="feedback-card__img">
                                    <a href="/public/static/img/feedback.webp" data-fancybox="gallery1" class="feedback-card__img-wrap">
                                        <img src="/public/static/img/feedback.webp" alt="">
                                    </a>
                                </div>

                                <div class="feedback-card__img">
                                    <a href="/public/static/img/feedback2.webp" data-fancybox="gallery1" class="feedback-card__img-wrap">
                                        <img src="/public/static/img/feedback2.webp" alt="">
                                    </a>
                                </div>

                                <div class="feedback-card__img">
                                    <a href="/public/static/img/feedback3.webp" data-fancybox="gallery1" class="feedback-card__img-wrap">
                                        <img src="/public/static/img/feedback3.webp" alt="">
                                    </a>
                                </div>    
                            </div>
                        </div>

                    </div>
                    <div class="feedback__nav">
                        <a href="" class="feedback__btn m-btn shadow m-btn-accent">
                            <span>Смотреть все отзывы</span>
                        </a>
                    </div>
                </div>

            </div>
            
        </section>
        
    </main>
</template>

<script>
import RegistrationComponent from "../bloks/registration"
import axios from 'axios'
export default {

data(){
    return{
        advertisement: [],
        advertisement_count: 0,
        register_modal:false
    }
    },
    mounted(){
        this.getObjects()
    },
    methods: {

        getObjects(){

            axios.get( '/api/advertisements/' + this.$route.params.id ).then(res=>{  
                            
                this.advertisement = res.data.data
                this.advertisement_count = res.data.data.reviews.length        
            })        
        },
        getRefisterForm(){
           this.register_modal = true;   
        },
        modalClose(){
            this.register_modal = false;
        }
    },  
    components:{
        RegistrationComponent,
    } 
}
</script>

<style>

</style>